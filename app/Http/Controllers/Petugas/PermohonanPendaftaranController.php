<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermohonanPendaftaranController extends Controller
{
    public function index(Request $request)
    {
        // Pastikan hanya petugas yang dapat mengakses halaman ini.
        abort_unless(
            Auth::check() && Auth::user()->role === 'petugas',
            403
        );

        // Ambil seluruh permohonan pendaftaran dari database.
        $query = Permohonan::with(['opd', 'pengaju'])
            ->where('jenis_permohonan', 'pendaftaran')
            ->latest();

        // Filter berdasarkan pencarian OPD atau nama subdomain.
        if ($request->filled('search')) {
            $keyword = $request->search;

            $query->where(function ($q) use ($keyword) {
                $q->where('nama_subdomain', 'like', "%{$keyword}%")
                    ->orWhereHas('opd', function ($opdQuery) use ($keyword) {
                        $opdQuery->where(
                            'nama_opd',
                            'like',
                            "%{$keyword}%"
                        );
                    });
            });
        }

        // Filter berdasarkan status permohonan.
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $permohonans = $query->paginate(10)->withQueryString();

        // Data ringkasan permohonan.
        $totalCount = Permohonan::where(
            'jenis_permohonan',
            'pendaftaran'
        )->count();

        $pendingCount = Permohonan::where(
            'jenis_permohonan',
            'pendaftaran'
        )->where('status', 'diajukan')->count();

        $processedCount = Permohonan::where(
            'jenis_permohonan',
            'pendaftaran'
        )->whereIn('status', ['diterima', 'ditolak'])->count();

        return view('petugas.pendaftaran', compact(
            'permohonans',
            'totalCount',
            'pendingCount',
            'processedCount'
        ));
    }
}
