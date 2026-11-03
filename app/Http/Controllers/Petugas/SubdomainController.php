<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Subdomain;
use Illuminate\Http\Request;

class SubdomainController extends Controller
{
    public function index(Request $request)
    {
        abort_unless(auth()->user()->role === 'petugas', 403);

        // Mengambil seluruh data untuk ringkasan
        $total = Subdomain::count();

        $aktif = Subdomain::where('status', 'aktif')->count();

        $nonaktif = Subdomain::where('status', 'nonaktif')->count();

        // Mengambil data subdomain beserta OPD pemiliknya
        $query = Subdomain::with('opd');

        // Pencarian berdasarkan nama subdomain atau nama OPD
        if ($request->filled('search')) {
            $keyword = $request->search;

            $query->where(function ($q) use ($keyword) {
                $q->where('nama_subdomain', 'like', "%{$keyword}%")
                    ->orWhereHas('opd', function ($opdQuery) use ($keyword) {
                        $opdQuery->where('nama_opd', 'like', "%{$keyword}%");
                    });
            });
        }

        // Filter berdasarkan status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $subdomains = $query
            ->orderByDesc('created_at')
            ->paginate(10)
            ->withQueryString();

        return view('petugas.subdomain', compact(
            'subdomains',
            'total',
            'aktif',
            'nonaktif'
        ));
    }
}
