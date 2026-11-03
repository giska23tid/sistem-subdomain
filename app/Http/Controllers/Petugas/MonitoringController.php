<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Subdomain;
use App\Models\Monitoring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonitoringController extends Controller
{
    // Menampilkan halaman monitoring
    public function index(Request $request)
    {
        abort_unless(
            $request->user()->role === 'petugas',
            403
        );

        $total = Subdomain::count();

        $aktif = Subdomain::where('status', 'aktif')->count();

        $nonaktif = Subdomain::where('status', 'nonaktif')->count();

        $subdomains = Subdomain::with([
            'opd',
            'monitoringTerakhir'
        ])
        ->orderByDesc('created_at')
        ->get();

        return view('petugas.monitoring', compact(
            'total',
            'aktif',
            'nonaktif',
            'subdomains'
        ));
    }

    // Menyimpan hasil pemeriksaan
   public function store(Request $request, $id)
    {
        abort_unless($request->user()->role === 'petugas', 403);

        $request->validate([
            'status_pemeriksaan' => ['required', 'in:aktif,nonaktif'],
            'catatan' => ['nullable', 'string', 'max:2000'],
        ]);

        $subdomain = Subdomain::findOrFail($id);

        DB::transaction(function () use ($request, $subdomain) {

            // Simpan hasil monitoring
            Monitoring::create([
                'subdomain_id' => $subdomain->id,
                'petugas_id' => $request->user()->id,
                'tanggal_monitoring' => now()->toDateString(),
                'status_pemeriksaan' => $request->status_pemeriksaan,
                'catatan' => $request->catatan,
            ]);

            // Perbarui status utama subdomain
            $subdomain->update([
                'status' => $request->status_pemeriksaan,
                'tanggal_nonaktif' => $request->status_pemeriksaan === 'nonaktif'
                    ? now()->toDateString()
                    : null,
            ]);
        });

        return redirect()
            ->route('petugas.monitoring')
            ->with('success', 'Hasil monitoring dan status subdomain berhasil diperbarui.');
}}
