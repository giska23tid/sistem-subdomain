<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Permohonan;
use App\Models\Subdomain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            'pemutus'
        ])
        ->where('jenis_permohonan', 'pendaftaran')
        ->findOrFail($id);

        return view('petugas.detail-permohonan', compact('permohonan'));
    }

    /**
     * Menerima permohonan dan membuat data subdomain.
     */
    public function terima($id)
    {
        abort_unless(
            Auth::check() && Auth::user()->role === 'petugas',
            403
        );

        DB::transaction(function () use ($id) {
            $permohonan = Permohonan::where('jenis_permohonan', 'pendaftaran')
                ->lockForUpdate()
                ->findOrFail($id);

            if ($permohonan->status !== 'diajukan') {
                abort(422, 'Permohonan ini sudah pernah diproses.');
            }

            $sudahAda = Subdomain::where(
                'nama_subdomain',
                $permohonan->nama_subdomain
            )->exists();

            if ($sudahAda) {
                throw new \RuntimeException(
                    'Nama subdomain tersebut sudah terdaftar.'
                );
            }

            Subdomain::create([
                'opd_id' => $permohonan->opd_id,
                'permohonan_id' => $permohonan->id,
                'nama_subdomain' => $permohonan->nama_subdomain,
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
        });

        return redirect()
            ->route('petugas.detail-permohonan', $id)
            ->with('success', 'Permohonan berhasil diterima dan subdomain telah didaftarkan.');
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

        $permohonan = Permohonan::where('jenis_permohonan', 'pendaftaran')
            ->findOrFail($id);

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
