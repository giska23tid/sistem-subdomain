<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Permohonan;
use App\Models\Subdomain;
use Illuminate\Http\Request;

class DashboardPetugasController extends Controller
{
    public function index(Request $request)
    {
        abort_unless($request->user()->role === 'petugas', 403);

        // Ringkasan permohonan
        $permohonanMasuk = Permohonan::where('status', 'diajukan')->count();

        $permohonanDiterima = Permohonan::where('status', 'diterima')->count();

        // Ringkasan subdomain
        $subdomainTerdaftar = Subdomain::count();

        // Subdomain yang belum pernah dimonitoring atau
        // hasil monitoring terakhirnya tidak aktif
        $perluMonitoring = Subdomain::where(function ($query) {
            $query->whereDoesntHave('monitorings')
                ->orWhereHas('monitoringTerakhir', function ($monitoring) {
                    $monitoring->where('status_pemeriksaan', 'nonaktif');
                });
        })->count();

        // Mengambil permohonan pendaftaran dan perubahan terbaru
        $pendaftaran = Permohonan::with(['opd', 'pengaju'])
            ->where('jenis_permohonan', 'pendaftaran')
            ->latest()
            ->get();

        $perubahan = Permohonan::with(['opd', 'pengaju'])
            ->where('jenis_permohonan', 'perubahan')
            ->latest()
            ->get();

        // Menggabungkan kedua jenis permohonan
        $permohonanTerbaru = $pendaftaran
            ->concat($perubahan)
            ->sortByDesc('created_at')
            ->take(5);

        return view('petugas.dashboard', compact(
            'permohonanMasuk',
            'permohonanDiterima',
            'subdomainTerdaftar',
            'perluMonitoring',
            'permohonanTerbaru'
        ));
    }
}
