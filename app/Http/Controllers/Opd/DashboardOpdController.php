<?php

namespace App\Http\Controllers\Opd;

use App\Http\Controllers\Controller;
use App\Models\Permohonan;
use App\Models\Subdomain;
use Illuminate\Http\Request;

class DashboardOpdController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        abort_unless($user && $user->role === 'opd', 403);

        $opdId = $user->opd_id;

        abort_unless($opdId, 403, 'Akun OPD belum terhubung dengan data OPD.');

        // Total permohonan pendaftaran
        $totalPendaftaran = Permohonan::where('opd_id', $opdId)
            ->where('jenis_permohonan', 'pendaftaran')
            ->count();

        // Total permohonan perubahan nama
        $totalPerubahan = Permohonan::where('opd_id', $opdId)
            ->where('jenis_permohonan', 'perubahan')
            ->count();

        // Total berdasarkan status keputusan
        $totalDiajukan = Permohonan::where('opd_id', $opdId)
            ->where('status', 'diajukan')
            ->count();

        $totalDiterima = Permohonan::where('opd_id', $opdId)
            ->where('status', 'diterima')
            ->count();

        $totalDitolak = Permohonan::where('opd_id', $opdId)
            ->where('status', 'ditolak')
            ->count();

        // Lima permohonan terbaru milik OPD yang login
        $permohonanTerbaru = Permohonan::where('opd_id', $opdId)
            ->latest()
            ->take(5)
            ->get();

        // Daftar subdomain milik OPD yang login
        $subdomains = Subdomain::where('opd_id', $opdId)
            ->orderByDesc('created_at')
            ->get();

        return view('opd.dashboard', compact(
            'totalPendaftaran',
            'totalPerubahan',
            'totalDiajukan',
            'totalDiterima',
            'totalDitolak',
            'permohonanTerbaru',
            'subdomains'
        ));
    }
}
