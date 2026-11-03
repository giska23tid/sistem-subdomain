<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Permohonan;
use App\Models\Subdomain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class DetailPerubahanController extends Controller
{
    // Menampilkan detail permohonan perubahan
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
            'pemutus'
        ])
        ->where('jenis_permohonan', 'perubahan')
        ->findOrFail($id);

        return view('petugas.detail-perubahan', compact('permohonan'));
    }

    // Menerima permohonan perubahan
    public function terima($id)
    {
        abort_unless(
            Auth::check() && Auth::user()->role === 'petugas',
            403
        );

        DB::transaction(function () use ($id) {
            $permohonan = Permohonan::where(
                'jenis_permohonan',
                'perubahan'
            )
            ->lockForUpdate()
            ->findOrFail($id);

            if ($permohonan->status !== 'diajukan') {
                throw ValidationException::withMessages([
                    'permohonan' => 'Permohonan ini sudah diproses.'
                ]);
            }

            // Periksa subdomain lama milik OPD yang bersangkutan
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
                    'permohonan' => 'Subdomain lama tidak ditemukan atau sudah nonaktif.'
                ]);
            }

            // Pastikan nama subdomain baru belum digunakan
            $namaBaru = strtolower($permohonan->nama_subdomain);

            $sudahDigunakan = Subdomain::where(
                'nama_subdomain',
                $namaBaru
            )->exists();

            if ($sudahDigunakan) {
                throw ValidationException::withMessages([
                    'permohonan' => 'Nama subdomain baru sudah digunakan.'
                ]);
            }

            // Nonaktifkan subdomain lama
            $subdomainLama->update([
                'status' => 'nonaktif',
                'tanggal_nonaktif' => now()->toDateString(),
                'keterangan' => 'Dinonaktifkan karena perubahan nama subdomain.'
            ]);

            // Aktifkan subdomain baru
            Subdomain::create([
                'opd_id' => $permohonan->opd_id,
                'permohonan_id' => $permohonan->id,
                'nama_subdomain' => $namaBaru,
                'status' => 'aktif',
                'tanggal_aktif' => now()->toDateString(),
                'keterangan' => 'Subdomain baru hasil permohonan perubahan.'
            ]);

            // Perbarui status permohonan
            $permohonan->update([
                'status' => 'diterima',
                'petugas_id' => Auth::id(),
                'tanggal_diperiksa' => now(),
                'catatan' => null
            ]);
        });

        return redirect()
            ->route('petugas.detail-perubahan', $id)
            ->with('success', 'Permohonan perubahan subdomain berhasil diterima.');
    }

    // Menolak permohonan perubahan
    public function tolak(Request $request, $id)
    {
        abort_unless(
            Auth::check() && Auth::user()->role === 'petugas',
            403
        );

        $validated = $request->validate([
            'catatan' => ['required', 'string', 'max:2000']
        ], [
            'catatan.required' => 'Alasan penolakan wajib diisi.',
            'catatan.max' => 'Alasan penolakan maksimal 2000 karakter.'
        ]);

        $permohonan = Permohonan::where(
            'jenis_permohonan',
            'perubahan'
        )->findOrFail($id);

        if ($permohonan->status !== 'diajukan') {
            return back()->withErrors([
                'permohonan' => 'Permohonan ini sudah diproses.'
            ]);
        }

        $permohonan->update([
            'status' => 'ditolak',
            'petugas_id' => Auth::id(),
            'tanggal_diperiksa' => now(),
            'catatan' => $validated['catatan']
        ]);

        return redirect()
            ->route('petugas.detail-perubahan', $id)
            ->with('success', 'Permohonan perubahan subdomain berhasil ditolak.');
    }
}
