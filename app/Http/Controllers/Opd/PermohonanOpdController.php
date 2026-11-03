<?php

namespace App\Http\Controllers\Opd;

use App\Http\Controllers\Controller;
use App\Models\Permohonan;
use App\Models\DokumenPermohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PermohonanOpdController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();

        // Pastikan akun yang mengirim adalah akun OPD.
        abort_unless(
            $user && $user->role === 'opd' && $user->opd_id,
            403
        );

        // Validasi data formulir dan dokumen.
        $validated = $request->validate([
            'subdomain' => [
                'required',
                'string',
                'max:50',
                'regex:/^[a-z0-9](?:[a-z0-9-]{0,48}[a-z0-9])?$/',
                Rule::unique('subdomains', 'nama_subdomain'),
                Rule::unique('permohonan_subdomains', 'nama_subdomain')
                    ->whereIn('status', ['diajukan', 'diterima']),
            ],

            'kegunaan' => [
                'required',
                'string',
                'max:2000'
            ],

            'surat' => [
                'required',
                'file',
                'mimes:pdf,jpg,jpeg,png',
                'max:2048'
            ],

            'pengelola' => [
                'required',
                'file',
                'mimes:pdf,jpg,jpeg,png',
                'max:2048'
            ],

            'asn' => [
                'required',
                'file',
                'mimes:pdf,jpg,jpeg,png',
                'max:2048'
            ],
        ], [
            'subdomain.required' => 'Nama subdomain wajib diisi.',
            'subdomain.regex' => 'Nama subdomain hanya boleh menggunakan huruf kecil, angka, dan tanda hubung. Tidak boleh diawali atau diakhiri tanda hubung.',
            'subdomain.unique' => 'Nama subdomain tersebut sudah digunakan atau sedang diajukan.',

            'kegunaan.required' => 'Kegunaan layanan wajib diisi.',

            '*.required' => 'Ketiga dokumen persyaratan wajib diunggah.',
            '*.mimes' => 'Dokumen harus berformat PDF, JPG, JPEG, atau PNG.',
            '*.max' => 'Ukuran setiap dokumen maksimal 2 MB.',
        ]);

        $filePaths = [];

        try {
            DB::transaction(function () use (
                $validated,
                $request,
                $user,
                &$filePaths
            ) {

                // Simpan data permohonan.
                $permohonan = Permohonan::create([
                    'opd_id' => $user->opd_id,
                    'user_id' => $user->id,
                    'jenis_permohonan' => 'pendaftaran',
                    'nama_subdomain' => strtolower($validated['subdomain']),
                    'kegunaan' => $validated['kegunaan'],
                    'status' => 'diajukan',
                ]);

                // Jenis dokumen yang harus disimpan.
                $dokumen = [
                    'surat' => 'surat_permohonan',
                    'pengelola' => 'surat_penunjukan_pengelola',
                    'asn' => 'kartu_asn',
                ];

                // Simpan file dan data dokumen.
                foreach ($dokumen as $field => $jenis) {

                    $file = $request->file($field);

                    $path = $file->store(
                        'dokumen-permohonan',
                        'public'
                    );

                    if (!$path) {
                        throw new \RuntimeException(
                            'Gagal menyimpan dokumen ' . $jenis
                        );
                    }

                    $filePaths[] = $path;

                    DokumenPermohonan::create([
                        'permohonan_id' => $permohonan->id,
                        'jenis_dokumen' => $jenis,
                        'nama_file' => $file->getClientOriginalName(),
                        'path_file' => $path,
                    ]);
                }
            });

        } catch (\Throwable $e) {

            // Hapus file jika transaksi database gagal.
            foreach ($filePaths as $path) {
                Storage::disk('public')->delete($path);
            }

            throw $e;
        }

        // Kembali ke halaman pendaftaran dengan pesan berhasil.
        return redirect()
            ->route('prototype.pendaftaran')
            ->with(
                'success',
                'Permohonan pendaftaran subdomain berhasil dikirim.'
            );
    }
}
