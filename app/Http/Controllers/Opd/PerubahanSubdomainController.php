<?php

namespace App\Http\Controllers\Opd;

use App\Http\Controllers\Controller;
use App\Models\Subdomain;
use App\Models\Permohonan;
use App\Models\DokumenPermohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PerubahanSubdomainController extends Controller
{
    /**
     * Menampilkan halaman pengajuan perubahan nama subdomain.
     */
    public function index()
    {
        $user = Auth::user();

        abort_unless(
            $user && $user->role === 'opd' && $user->opd_id,
            403
        );

        // Mengambil subdomain aktif milik OPD yang sedang login.
        $subdomains = Subdomain::where('opd_id', $user->opd_id)
            ->where('status', 'aktif')
            ->orderBy('nama_subdomain')
            ->get();

        return view('opd.perubahan', compact('subdomains'));
    }

    /**
     * Menyimpan pengajuan perubahan nama subdomain.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        abort_unless(
            $user && $user->role === 'opd' && $user->opd_id,
            403
        );

        // Validasi data dan dokumen pengajuan.
        $validated = $request->validate([
            'subdomain_lama' => [
                'required',
                'string',
                Rule::exists('subdomains', 'nama_subdomain')
                    ->where('opd_id', $user->opd_id)
                    ->where('status', 'aktif'),
            ],

            'subdomain_baru' => [
                'required',
                'string',
                'max:50',
                'regex:/^[a-z0-9](?:[a-z0-9-]{0,48}[a-z0-9])?$/',
                'different:subdomain_lama',

                Rule::unique('subdomains', 'nama_subdomain'),

                Rule::unique('permohonan_subdomains', 'nama_subdomain')
                    ->whereIn('status', ['diajukan', 'diterima']),
            ],

            'surat' => [
                'required',
                'file',
                'mimes:pdf,jpg,jpeg,png',
                'max:2048',
            ],

            'pengelola' => [
                'required',
                'file',
                'mimes:pdf,jpg,jpeg,png',
                'max:2048',
            ],

            'asn' => [
                'required',
                'file',
                'mimes:pdf,jpg,jpeg,png',
                'max:2048',
            ],

        ], [
            'subdomain_lama.required' =>
                'Silakan pilih subdomain yang akan diubah.',

            'subdomain_lama.exists' =>
                'Subdomain yang dipilih tidak ditemukan atau tidak aktif.',

            'subdomain_baru.required' =>
                'Nama subdomain baru wajib diisi.',

            'subdomain_baru.regex' =>
                'Nama subdomain hanya boleh menggunakan huruf kecil, angka, dan tanda hubung. Tidak boleh diawali atau diakhiri tanda hubung.',

            'subdomain_baru.different' =>
                'Nama subdomain baru harus berbeda dari nama lama.',

            'subdomain_baru.unique' =>
                'Nama subdomain tersebut sudah digunakan atau sedang diajukan.',

            'surat.required' =>
                'Surat permohonan perubahan nama subdomain wajib diunggah.',

            'pengelola.required' =>
                'Surat penunjukan pengelola subdomain wajib diunggah.',

            'asn.required' =>
                'Fotokopi kartu ASN wajib diunggah.',

            '*.mimes' =>
                'Dokumen harus berformat PDF, JPG, JPEG, atau PNG.',

            '*.max' =>
                'Ukuran setiap dokumen maksimal 2 MB.',
        ]);

        // Menyiapkan daftar file untuk keperluan penghapusan
        // apabila proses penyimpanan mengalami kegagalan.
        $filePaths = [];

        try {
            DB::transaction(function () use (
                $request,
                $validated,
                $user,
                &$filePaths
            ) {
                // Memastikan subdomain lama masih aktif
                // dan benar-benar milik OPD yang sedang login.
                $subdomainLama = Subdomain::where(
                    'nama_subdomain',
                    $validated['subdomain_lama']
                )
                    ->where('opd_id', $user->opd_id)
                    ->where('status', 'aktif')
                    ->lockForUpdate()
                    ->first();

                if (!$subdomainLama) {
                    throw new \RuntimeException(
                        'Subdomain lama tidak ditemukan atau sudah tidak aktif.'
                    );
                }

                // Membuat data permohonan perubahan.
                $permohonan = Permohonan::create([
                    'opd_id' => $user->opd_id,
                    'user_id' => $user->id,
                    'jenis_permohonan' => 'perubahan',
                    'subdomain_lama' => $subdomainLama->nama_subdomain,
                    'nama_subdomain' => strtolower(
                        $validated['subdomain_baru']
                    ),
                    'status' => 'diajukan',
                ]);

                // Daftar dokumen persyaratan Pasal 35.
                $dokumen = [
                    'surat' => 'surat_permohonan',
                    'pengelola' => 'surat_penunjukan_pengelola',
                    'asn' => 'kartu_asn',
                ];

                // Menyimpan seluruh dokumen ke storage.
                foreach ($dokumen as $field => $jenis) {

                    $file = $request->file($field);

                    $path = $file->store(
                        'dokumen-permohonan',
                        'public'
                    );

                    if (!$path) {
                        throw new \RuntimeException(
                            'Gagal menyimpan dokumen ' . $jenis . '.'
                        );
                    }

                    $filePaths[] = $path;

                    // Menyimpan informasi dokumen ke database.
                    DokumenPermohonan::create([
                        'permohonan_id' => $permohonan->id,
                        'jenis_dokumen' => $jenis,
                        'nama_file' => $file->getClientOriginalName(),
                        'path_file' => $path,
                    ]);
                }
            });

        } catch (\Throwable $e) {

            // Menghapus file yang sudah terunggah
            // jika transaksi database gagal.
            foreach ($filePaths as $path) {
                Storage::disk('public')->delete($path);
            }

            throw $e;
        }

        // Kembali ke halaman perubahan dengan pesan berhasil.
        return redirect()
            ->route('prototype.perubahan')
            ->with(
                'success',
                'Permohonan perubahan nama subdomain berhasil dikirim.'
            );
        }
}
