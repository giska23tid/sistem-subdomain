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

class DetailPerubahanController extends Controller
{
    /**
     * Menampilkan detail permohonan perubahan.
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
            'suratTindakLanjut',
        ])
            ->where('jenis_permohonan', 'perubahan')
            ->findOrFail($id);

        return view('petugas.detail-perubahan', compact('permohonan'));
    }

    /**
     * Menerima permohonan perubahan nama subdomain.
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
            'ip_address' => [
                'required',
                'string',
                'ip',
                'max:45',
            ],
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
                    'perubahan'
                )
                    ->lockForUpdate()
                    ->findOrFail($id);

                if ($permohonan->status !== 'diajukan') {
                    throw ValidationException::withMessages([
                        'permohonan' => 'Permohonan ini sudah diproses.',
                    ]);
                }

                // Memeriksa subdomain lama milik OPD.
                $subdomainLama = Subdomain::where(
                    'nama_subdomain',
                    $permohonan->subdomain_lama
                )
                    ->where('opd_id', $permohonan->opd_id)
                    ->where('status', 'aktif')
                    ->lockForUpdate()
                    ->first();

                if (!$subdomainLama) {
                    throw ValidationException::withMessages([
                        'permohonan' => 'Subdomain lama tidak ditemukan atau sudah nonaktif.',
                    ]);
                }

                // Memastikan nama subdomain baru belum digunakan.
                $namaBaru = strtolower($permohonan->nama_subdomain);

                $sudahDigunakan = Subdomain::where(
                    'nama_subdomain',
                    $namaBaru
                )->exists();

                if ($sudahDigunakan) {
                    throw ValidationException::withMessages([
                        'permohonan' => 'Nama subdomain baru sudah digunakan.',
                    ]);
                }

                // Menonaktifkan subdomain lama.
                $subdomainLama->update([
                    'status' => 'nonaktif',
                    'tanggal_nonaktif' => now()->toDateString(),
                    'keterangan' => 'Dinonaktifkan karena perubahan nama subdomain.',
                ]);

                // Membuat subdomain baru.
                Subdomain::create([
                    'opd_id' => $permohonan->opd_id,
                    'permohonan_id' => $permohonan->id,
                    'nama_subdomain' => $namaBaru,
                    'ip_address' => $validated['ip_address'],
                    'status' => 'aktif',
                    'tanggal_aktif' => now()->toDateString(),
                    'keterangan' => 'Subdomain baru hasil permohonan perubahan.',
                ]);

                // Memperbarui status permohonan.
                $permohonan->update([
                    'status' => 'diterima',
                    'petugas_id' => Auth::id(),
                    'tanggal_diperiksa' => now(),
                    'catatan' => null,
                ]);

                // Memuat data subdomain baru untuk kebutuhan surat.
                $permohonan->load('subdomain');

                // Menerbitkan surat persetujuan secara otomatis.
                $suratService->terbitkanPersetujuan($permohonan);

                return $permohonan;
            });

            // Memuat data pemohon dan surat setelah transaksi berhasil.
            $permohonan->load([
                'pengaju',
                'suratTindakLanjut',
            ]);

            // Memastikan surat sudah tersedia sebelum notifikasi dikirim.
            if (!$permohonan->suratTindakLanjut) {
                throw new \RuntimeException(
                    'Data surat tindak lanjut belum ditemukan.'
                );
            }

            // Mengirim notifikasi kepada OPD.
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
                'permohonan' => 'Permohonan perubahan belum berhasil diterima atau surat PDF gagal diterbitkan. Silakan periksa kembali.',
            ]);
        }

        return redirect()
            ->route('petugas.detail-perubahan', $id)
            ->with(
                'success',
                'Permohonan perubahan berhasil diterima, subdomain lama dinonaktifkan, surat PDF diterbitkan, dan notifikasi telah diproses.'
            );
    }

    /**
     * Menolak permohonan perubahan dengan alasan.
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
            $permohonan = DB::transaction(function () use (
                $id,
                $validated
            ) {
                $permohonan = Permohonan::where(
                    'jenis_permohonan',
                    'perubahan'
                )
                    ->lockForUpdate()
                    ->findOrFail($id);

                if ($permohonan->status !== 'diajukan') {
                    throw ValidationException::withMessages([
                        'permohonan' => 'Permohonan ini sudah diproses.',
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

            // Memuat data pemohon.
            $permohonan->load('pengaju');

            // Mengirim notifikasi penolakan kepada OPD.
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
                'permohonan' => 'Permohonan berhasil diperiksa, tetapi notifikasi belum berhasil diproses.',
            ]);
        }

        return redirect()
            ->route('petugas.detail-perubahan', $id)
            ->with(
                'success',
                'Permohonan perubahan berhasil ditolak dan notifikasi telah diproses.'
            );
    }
}
