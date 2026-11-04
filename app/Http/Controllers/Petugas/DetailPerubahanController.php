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
    public function terima(Request $request, $id)
    {
        abort_unless(
            Auth::check() && Auth::user()->role === 'petugas',
            403
        );

        // Validasi IP Address/Server
        $validated = $request->validate([
            'ip_address' => [
                'required',
                'string',
                'ip',
                'max:45'
            ],
        ], [
            'ip_address.required' => 'IP Address/Server wajib diisi.',
            'ip_address.ip' => 'Format IP Address tidak valid.',
            'ip_address.max' => 'IP Address maksimal 45 karakter.',
        ]);

        DB::transaction(function () use ($id, $validated) {

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

            // Buat data subdomain baru beserta IP Address/Server
            Subdomain::create([
                'opd_id' => $permohonan->opd_id,
                'permohonan_id' => $permohonan->id,
                'nama_subdomain' => $namaBaru,
                'ip_address' => $validated['ip_address'],
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
            ->with(
                'success',
                'Permohonan perubahan subdomain berhasil diterima dan data IP Address/Server telah disimpan.'
            );
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
