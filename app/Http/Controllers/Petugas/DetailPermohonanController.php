<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Permohonan;
use App\Models\Subdomain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use App\Notifications\StatusPermohonanNotification;
use App\Services\SuratTindakLanjutService;

class DetailPermohonanController extends Controller
{
    /**
     * Menampilkan detail permohonan pendaftaran.
     */
    public function show($id)
    {
        abort_unless(
            Auth::check() && Auth::user()->role === 'petugas',
            403
        );

        $permohonan = Permohonan::with([
            'opd',
            'pengaju',
            'dokumens',
            'pemutus',
            'subdomain',
        ])
        ->where('jenis_permohonan', 'pendaftaran')
        ->findOrFail($id);

        return view('petugas.detail-permohonan', compact('permohonan'));
    }

    /**
     * Menerima permohonan dan membuat data subdomain.
     */
    
    public function terima(
        Request $request,
        SuratTindakLanjutService $suratService,
        $id
    ) {
        abort_unless(
            Auth::check() && Auth::user()->role === 'petugas',
            403
        );

        $validated = $request->validate([
            'ip_address' => ['required', 'string', 'ip', 'max:45'],
        ], [
            'ip_address.required' => 'IP Address/Server wajib diisi.',
            'ip_address.ip' => 'Format IP Address tidak valid.',
            'ip_address.max' => 'IP Address maksimal 45 karakter.',
        ]);

        try {
            $permohonan = DB::transaction(function () use (
                $id,
                $validated,
                $suratService
            ) {
                $permohonan = Permohonan::where(
                    'jenis_permohonan',
                    'pendaftaran'
                )
                ->lockForUpdate()
                ->findOrFail($id);

                if ($permohonan->status !== 'diajukan') {
                    throw ValidationException::withMessages([
                        'permohonan' => 'Permohonan ini sudah pernah diproses.',
                    ]);
                }

                $namaSubdomain = strtolower($permohonan->nama_subdomain);

                if (Subdomain::where('nama_subdomain', $namaSubdomain)->exists()) {
                    throw ValidationException::withMessages([
                        'permohonan' => 'Nama subdomain tersebut sudah terdaftar.',
                    ]);
                }

                Subdomain::create([
                    'opd_id' => $permohonan->opd_id,
                    'permohonan_id' => $permohonan->id,
                    'nama_subdomain' => $namaSubdomain,
                    'ip_address' => $validated['ip_address'],
                    'status' => 'aktif',
                    'tanggal_aktif' => now()->toDateString(),
                    'keterangan' => $permohonan->kegunaan,
                ]);

                $permohonan->update([
                    'status' => 'diterima',
                    'petugas_id' => Auth::id(),
                    'tanggal_diperiksa' => now(),
                    'catatan' => null,
                ]);

                // Muat data subdomain terbaru.
                $permohonan->load('subdomain');

                // Terbitkan surat persetujuan secara otomatis.
                $suratService->terbitkanPersetujuan($permohonan);

                return $permohonan;
            });

            // Kirim notifikasi setelah transaksi berhasil.
            $permohonan->load('pengaju', 'suratTindakLanjut');

            if ($permohonan->pengaju) {
                $permohonan->pengaju->notify(
                    new StatusPermohonanNotification(
                        $permohonan,
                        $permohonan->suratTindakLanjut
                    )
                );
            }

        } catch (ValidationException $e) {
            throw $e;
        } catch (\Throwable $e) {
            report($e);

            return back()->withErrors([
                'permohonan' => 'Permohonan belum berhasil diterima atau surat PDF gagal diterbitkan. Silakan periksa kembali.',
            ]);
        }

        return redirect()
            ->route('petugas.detail-permohonan', $id)
            ->with(
                'success',
                'Permohonan berhasil diterima, surat PDF telah diterbitkan, dan notifikasi telah diproses.'
            );
    }

    /**
     * Menolak permohonan dengan alasan.
     */
 
    public function tolak(Request $request, $id)
    {
        abort_unless(
            Auth::check() && Auth::user()->role === 'petugas',
            403
        );

        $validated = $request->validate([
            'catatan' => ['required', 'string', 'max:2000'],
        ], [
            'catatan.required' => 'Alasan penolakan wajib diisi.',
            'catatan.max' => 'Alasan penolakan maksimal 2000 karakter.',
        ]);

        try {
            $permohonan = DB::transaction(function () use ($id, $validated) {
                $permohonan = Permohonan::where(
                    'jenis_permohonan',
                    'pendaftaran'
                )
                ->lockForUpdate()
                ->findOrFail($id);

                if ($permohonan->status !== 'diajukan') {
                    throw ValidationException::withMessages([
                        'permohonan' => 'Permohonan ini sudah pernah diproses.',
                    ]);
                }

                $permohonan->update([
                    'status' => 'ditolak',
                    'petugas_id' => Auth::id(),
                    'tanggal_diperiksa' => now(),
                    'catatan' => $validated['catatan'],
                ]);

                return $permohonan;
            });

            $permohonan->load('pengaju');

            if ($permohonan->pengaju) {
                $permohonan->pengaju->notify(
                    new StatusPermohonanNotification($permohonan)
                );
            }

        } catch (ValidationException $e) {
            throw $e;
        } catch (\Throwable $e) {
            report($e);

            return back()->withErrors([
                'permohonan' => 'Status permohonan berhasil diperiksa, tetapi notifikasi belum berhasil diproses.',
            ]);
        }

        return redirect()
            ->route('petugas.detail-permohonan', $id)
            ->with('success', 'Permohonan berhasil ditolak dan notifikasi telah diproses.');
    }
}