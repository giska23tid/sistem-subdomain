<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\LaporanMonitoring;
use App\Models\Subdomain;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanMonitoringController extends Controller
{
    // Menampilkan halaman riwayat laporan
    public function index()
    {
        $laporans = LaporanMonitoring::latest()->get();

        return view('petugas.laporan-monitoring', compact('laporans'));
    }

    // Mengambil data subdomain terbaru dari database
    private function dataSubdomain()
    {
        return Subdomain::with(['opd', 'monitoringTerakhir'])
            ->orderBy('nama_subdomain')
            ->get()
            ->map(function ($item) {
                return [
                    'opd' => $item->opd->nama_opd ?? '-',
                    'domain' => $item->nama_subdomain,
                    'status' => ucfirst($item->status),
                    'hasil_monitoring' => $item->monitoringTerakhir
                        ? ucfirst($item->monitoringTerakhir->status_pemeriksaan)
                        : 'Belum diperiksa',
                    'tanggal_monitoring' => $item->monitoringTerakhir
                        ? $item->monitoringTerakhir->tanggal_monitoring->format('d-m-Y')
                        : '-',
                    'catatan' => $item->monitoringTerakhir->catatan ?? '-',
                ];
            })
            ->toArray();
    }

    // Membuat laporan baru dan mengunduh PDF
    public function downloadBaru()
    {
        $subdomains = $this->dataSubdomain();

        $total = count($subdomains);

        $aktif = collect($subdomains)
            ->where('status', 'Aktif')
            ->count();

        $nonaktif = collect($subdomains)
            ->where('status', 'Nonaktif')
            ->count();

        $tanggal = now();

        $laporan = LaporanMonitoring::create([
            'nama_laporan' => 'Laporan Monitoring Subdomain - ' .
                $tanggal->format('d-m-Y H:i'),
            'tanggal_laporan' => $tanggal->toDateString(),
            'total_subdomain' => $total,
            'subdomain_aktif' => $aktif,
            'subdomain_nonaktif' => $nonaktif,
            'data_subdomain' => $subdomains,
        ]);

        return $this->buatPdf($laporan);
    }

    // Mengunduh kembali laporan yang sudah tersimpan
    public function downloadUlang($id)
    {
        $laporan = LaporanMonitoring::findOrFail($id);

        return $this->buatPdf($laporan);
    }

    // Membuat PDF berdasarkan snapshot laporan
    private function buatPdf($laporan)
    {
        $pdf = Pdf::loadView('petugas.laporan-monitoring-pdf', [
            'subdomains' => $laporan->data_subdomain,
            'total' => $laporan->total_subdomain,
            'aktif' => $laporan->subdomain_aktif,
            'nonaktif' => $laporan->subdomain_nonaktif,
            'tanggal' => $laporan->created_at,
        ])->setPaper('a4', 'portrait');

        return $pdf->download(
            'Laporan-Monitoring-' . $laporan->id . '.pdf'
        );
    }
}
