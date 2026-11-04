<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Permohonan;
use App\Models\Subdomain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

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
    public function terima(Request $request, $id)
    {
        abort_unless(
            Auth::check() && Auth::user()->role === 'petugas',
            403
        );

        // Validasi IP Address/Server.
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

        DB::transaction(function () use ($id, $validated) {

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

            // Pastikan nama subdomain belum terdaftar.
            $namaSubdomain = strtolower($permohonan->nama_subdomain);

            $sudahAda = Subdomain::where(
                'nama_subdomain',
                $namaSubdomain
            )->exists();

            if ($sudahAda) {
                throw ValidationException::withMessages([
                    'permohonan' => 'Nama subdomain tersebut sudah terdaftar.',
                ]);
            }

            // Membuat data subdomain beserta IP Address/Server.
            Subdomain::create([
                'opd_id' => $permohonan->opd_id,
                'permohonan_id' => $permohonan->id,
                'nama_subdomain' => $namaSubdomain,
                'ip_address' => $validated['ip_address'],
                'status' => 'aktif',
                'tanggal_aktif' => now()->toDateString(),
                'keterangan' => $permohonan->kegunaan,
            ]);

            // Memperbarui status permohonan.
            $permohonan->update([
                'status' => 'diterima',
                'petugas_id' => Auth::id(),
                'tanggal_diperiksa' => now(),
                'catatan' => null,
            ]);
        });

        return redirect()
            ->route('petugas.detail-permohonan', $id)
            ->with(
                'success',
                'Permohonan berhasil diterima dan data IP Address/Server telah disimpan.'
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
            'catatan' => [
                'required',
                'string',
                'max:2000',
            ],
        ], [
            'catatan.required' => 'Alasan penolakan wajib diisi.',
            'catatan.max' => 'Alasan penolakan maksimal 2000 karakter.',
        ]);

        $permohonan = Permohonan::where(
            'jenis_permohonan',
            'pendaftaran'
        )->findOrFail($id);

        if ($permohonan->status !== 'diajukan') {
            return back()->withErrors([
                'catatan' => 'Permohonan ini sudah pernah diproses.',
            ]);
        }

        $permohonan->update([
            'status' => 'ditolak',
            'petugas_id' => Auth::id(),
            'tanggal_diperiksa' => now(),
            'catatan' => $validated['catatan'],
        ]);

        return redirect()
            ->route('petugas.detail-permohonan', $id)
            ->with('success', 'Permohonan berhasil ditolak.');
    }
}
