<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermohonanPerubahanController extends Controller
{
    public function index(Request $request)
    {
        // Pastikan hanya petugas yang dapat mengakses halaman
        abort_unless(
            Auth::check() && Auth::user()->role === 'petugas',
            403
        );

        // Mengambil seluruh permohonan perubahan dari database
        $query = Permohonan::with([
            'opd',
            'pengaju'
        ])
        ->where('jenis_permohonan', 'perubahan');

        // Pencarian nama OPD, subdomain lama, dan subdomain baru
        if ($request->filled('search')) {
            $keyword = $request->search;

            $query->where(function ($q) use ($keyword) {
                $q->where('nama_subdomain', 'like', "%{$keyword}%")
                  ->orWhere('subdomain_lama', 'like', "%{$keyword}%")
                  ->orWhereHas('opd', function ($opd) use ($keyword) {
                      $opd->where('nama_opd', 'like', "%{$keyword}%");
                  });
            });
        }

        // Filter status permohonan
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Data tabel
        $permohonans = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        // Ringkasan jumlah permohonan
        $totalPermohonan = Permohonan::where(
            'jenis_permohonan',
            'perubahan'
        )->count();

        $perluDiperiksa = Permohonan::where(
            'jenis_permohonan',
            'perubahan'
        )->where('status', 'diajukan')->count();

        $diterima = Permohonan::where(
            'jenis_permohonan',
            'perubahan'
        )->where('status', 'diterima')->count();

        $ditolak = Permohonan::where(
            'jenis_permohonan',
            'perubahan'
        )->where('status', 'ditolak')->count();

        return view('petugas.perubahan', compact(
            'permohonans',
            'totalPermohonan',
            'perluDiperiksa',
            'diterima',
            'ditolak'
        ));
    }
}
