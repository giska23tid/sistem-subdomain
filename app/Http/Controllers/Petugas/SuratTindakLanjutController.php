<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Permohonan;
use App\Models\SuratTindakLanjut;
use App\Models\NomorSuratSequence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\ValidationException;

class SuratTindakLanjutController extends Controller
{
    /**
     * Menerbitkan surat tindak lanjut.
     */
    public function terbitkan($id)
    {
        abort_unless(
            Auth::check() && Auth::user()->role === 'petugas',
            403
        );

        $permohonan = Permohonan::with([
            'opd',
            'pengaju',
            'pemutus',
            'dokumens',
            'subdomain',
        ])->findOrFail($id);

        // Pastikan permohonan sudah diputuskan.
        if (!in_array($permohonan->status, ['diterima', 'ditolak'])) {
            return back()->withErrors([
                'surat' => 'Permohonan harus diputuskan terlebih dahulu.'
            ]);
        }

        $jenisSurat = $permohonan->status === 'diterima'
            ? 'persetujuan'
            : 'penolakan';

        // Periksa apakah surat sudah pernah diterbitkan.
        if ($permohonan->suratTindakLanjut) {
            return back()->with(
                'success',
                'Surat untuk permohonan ini sudah pernah diterbitkan.'
            );
        }

        // Surat persetujuan harus memiliki data subdomain dan IP.
        if ($jenisSurat === 'persetujuan') {
            $subdomain = $permohonan->subdomain;

            if (!$subdomain || !$subdomain->ip_address) {
                return back()->withErrors([
                    'surat' => 'Data subdomain atau IP Address/Server belum tersedia.'
                ]);
            }
        }

        $tanggalSurat = now();

        try {
            DB::transaction(function () use (
                $permohonan,
                $jenisSurat,
                $tanggalSurat
            ) {
                // Membuat baris urutan jika belum tersedia.
                NomorSuratSequence::firstOrCreate(
                    [
                        'jenis_surat' => $jenisSurat,
                        'tahun' => $tanggalSurat->year,
                    ],
                    [
                        'nomor_terakhir' => 0,
                    ]
                );

                // Mengunci urutan nomor agar tidak digunakan bersamaan.
                $sequence = NomorSuratSequence::where(
                    'jenis_surat',
                    $jenisSurat
                )
                ->where('tahun', $tanggalSurat->year)
                ->lockForUpdate()
                ->firstOrFail();

                $nomorBerikutnya = $sequence->nomor_terakhir + 1;

                $sequence->update([
                    'nomor_terakhir' => $nomorBerikutnya,
                ]);

                $nomorSurat = '500.12.15.1/DISKOMINFOTIK/'
                    . $nomorBerikutnya;

                // Membuat dokumen PDF.
                $pdf = Pdf::loadView('surat.tindak-lanjut', [
                    'permohonan' => $permohonan,
                    'jenisSurat' => $jenisSurat,
                    'nomorSurat' => $nomorSurat,
                    'tanggalSurat' => $tanggalSurat,
                ])->setPaper('a4', 'portrait');

                $namaFile = 'surat-' . $permohonan->id . '-'
                    . $jenisSurat . '.pdf';

                $pathFile = 'surat-tindak-lanjut/'
                    . $tanggalSurat->year . '/'
                    . $namaFile;

                // Menyimpan PDF pada storage public.
                Storage::disk('public')->put(
                    $pathFile,
                    $pdf->output()
                );

                // Menyimpan informasi surat ke database.
                SuratTindakLanjut::create([
                    'permohonan_id' => $permohonan->id,
                    'jenis_surat' => $jenisSurat,
                    'nomor_surat' => $nomorSurat,
                    'tanggal_surat' => $tanggalSurat->toDateString(),
                    'file_pdf' => $pathFile,
                    'petugas_id' => Auth::id(),
                ]);
            });

        } catch (\Throwable $e) {
            report($e);

            return back()->withErrors([
                'surat' => 'Surat belum berhasil diterbitkan. Silakan periksa kembali data dan konfigurasi PDF.'
            ]);
        }

        return back()->with(
            'success',
            'Surat tindak lanjut berhasil diterbitkan dan sudah dapat diakses oleh OPD.'
        );
    }

    /**
     * Mengunduh surat oleh Petugas.
     */
    public function downloadPetugas($id)
    {
        abort_unless(
            Auth::check() && Auth::user()->role === 'petugas',
            403
        );

        $surat = SuratTindakLanjut::findOrFail($id);

        if (!Storage::disk('public')->exists($surat->file_pdf)) {
            abort(404, 'File surat tidak ditemukan.');
        }

        // Mengubah karakter "/" menjadi "-" untuk nama file
        $namaFile = str_replace(
            ['/', '\\'],
            '-',
            $surat->nomor_surat
        );

        return Storage::disk('public')->download(
            $surat->file_pdf,
            $namaFile . '.pdf'
        );
    }
    /**
     * Mengunduh surat oleh OPD yang mengajukan permohonan.
     */
    public function downloadOpd($id)
    {
        abort_unless(
            Auth::check() && Auth::user()->role === 'opd',
            403
        );

        $surat = SuratTindakLanjut::whereHas('permohonan', function ($query) {
            $query->where('user_id', Auth::id());
        })->findOrFail($id);

        if (!Storage::disk('public')->exists($surat->file_pdf)) {
            abort(404, 'File surat tidak ditemukan.');
        }

        // Mengubah karakter "/" menjadi "-" untuk nama file
        $namaFile = str_replace(
            ['/', '\\'],
            '-',
            $surat->nomor_surat
        );

        return Storage::disk('public')->download(
            $surat->file_pdf,
            $namaFile . '.pdf'
        );
    }
}
