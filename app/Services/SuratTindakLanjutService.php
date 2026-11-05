<?php

namespace App\Services;

use App\Models\NomorSuratSequence;
use App\Models\Permohonan;
use App\Models\SuratTindakLanjut;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class SuratTindakLanjutService
{
    public function terbitkanPersetujuan(Permohonan $permohonan): SuratTindakLanjut
    {
        if ($permohonan->status !== 'diterima') {
            throw ValidationException::withMessages([
                'surat' => 'Surat hanya dapat diterbitkan untuk permohonan yang diterima.',
            ]);
        }

        $permohonan->load([
            'opd',
            'pengaju',
            'pemutus',
            'dokumens',
            'subdomain',
        ]);

        $subdomain = $permohonan->subdomain;

        if (!$subdomain || !$subdomain->ip_address) {
            throw ValidationException::withMessages([
                'surat' => 'Data subdomain atau IP Address/Server belum tersedia.',
            ]);
        }

        // Jika surat sudah tersedia, gunakan surat yang sama.
        $suratLama = SuratTindakLanjut::where(
            'permohonan_id',
            $permohonan->id
        )->first();

        if ($suratLama) {
            return $suratLama;
        }

        $tanggalSurat = now();
        $pathFile = null;

        try {
            return DB::transaction(function () use (
                $permohonan,
                $tanggalSurat,
                &$pathFile
            ) {
                // Mengunci data permohonan agar tidak diterbitkan bersamaan.
                $permohonanTerkunci = Permohonan::whereKey($permohonan->id)
                    ->lockForUpdate()
                    ->firstOrFail();

                $suratLama = SuratTindakLanjut::where(
                    'permohonan_id',
                    $permohonanTerkunci->id
                )->first();

                if ($suratLama) {
                    return $suratLama;
                }

                NomorSuratSequence::firstOrCreate(
                    [
                        'jenis_surat' => 'persetujuan',
                        'tahun' => $tanggalSurat->year,
                    ],
                    [
                        'nomor_terakhir' => 0,
                    ]
                );

                $sequence = NomorSuratSequence::where(
                    'jenis_surat',
                    'persetujuan'
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

                $pdf = Pdf::loadView('surat.tindak-lanjut', [
                    'permohonan' => $permohonan,
                    'jenisSurat' => 'persetujuan',
                    'nomorSurat' => $nomorSurat,
                    'tanggalSurat' => $tanggalSurat,
                ])->setPaper('a4', 'portrait');

                $namaFile = 'surat-' . $permohonan->id
                    . '-persetujuan.pdf';

                $pathFile = 'surat-tindak-lanjut/'
                    . $tanggalSurat->year . '/'
                    . $namaFile;

                $tersimpan = Storage::disk('public')->put(
                    $pathFile,
                    $pdf->output()
                );

                if (!$tersimpan) {
                    throw new \RuntimeException(
                        'File PDF gagal disimpan.'
                    );
                }

                return SuratTindakLanjut::create([
                    'permohonan_id' => $permohonan->id,
                    'jenis_surat' => 'persetujuan',
                    'nomor_surat' => $nomorSurat,
                    'tanggal_surat' => $tanggalSurat->toDateString(),
                    'file_pdf' => $pathFile,
                    'petugas_id' => Auth::id(),
                ]);
            });
        } catch (\Throwable $e) {
            // Hapus file jika transaksi penerbitan gagal.
            if ($pathFile && Storage::disk('public')->exists($pathFile)) {
                Storage::disk('public')->delete($pathFile);
            }

            throw $e;
        }
    }
}
