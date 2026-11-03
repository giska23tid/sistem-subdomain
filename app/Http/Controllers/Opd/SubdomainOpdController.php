<?php

namespace App\Http\Controllers\Opd;

use App\Http\Controllers\Controller;
use App\Models\Subdomain;
use Illuminate\Http\Request;

class SubdomainOpdController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        abort_unless($user && $user->role === 'opd', 403);

        $opdId = $user->opd_id;

        abort_unless($opdId, 403, 'Akun OPD belum terhubung dengan data OPD.');

        $subdomains = Subdomain::where('opd_id', $opdId)
            ->with([
                'permohonan',
                'monitorings' => function ($query) {
                    $query->orderBy('tanggal_monitoring', 'desc')
                        ->orderBy('created_at', 'desc');
                },
            ])
            ->orderByDesc('created_at')
            ->get();

        $totalSubdomain = $subdomains->count();
        $totalAktif = $subdomains->where('status', 'aktif')->count();
        $totalNonaktif = $subdomains->where('status', 'nonaktif')->count();

        return view('opd.subdomain', compact(
            'subdomains',
            'totalSubdomain',
            'totalAktif',
            'totalNonaktif'
        ));
    }
}
