
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\Opd\DashboardOpdController;
use App\Http\Controllers\Opd\PermohonanOpdController;
use App\Http\Controllers\Opd\PerubahanSubdomainController;

use App\Http\Controllers\Petugas\DashboardPetugasController;
use App\Http\Controllers\Petugas\LaporanMonitoringController;
use App\Http\Controllers\Petugas\PermohonanPendaftaranController;
use App\Http\Controllers\Petugas\DetailPermohonanController;
use App\Http\Controllers\Petugas\PermohonanPerubahanController;
use App\Http\Controllers\Petugas\DetailPerubahanController;
use App\Http\Controllers\Petugas\SubdomainController;
use App\Http\Controllers\Petugas\MonitoringController;
use App\Http\Controllers\Opd\SubdomainOpdController;
use App\Http\Controllers\Petugas\SuratTindakLanjutController;


// ==================================================
// LANDING PAGE
// ==================================================

Route::get('/', function () {
    return view('auth.pilih-login');
})->name('pilih-login');


// ==================================================
// LOGIN
// ==================================================

Route::get('/login', function () {
    return redirect()->route('pilih-login');
})->name('login');

Route::get('/login/opd', function () {
    return view('auth.login-opd');
})->name('login.opd');

Route::get('/login/petugas', function () {
    return view('auth.login-petugas');
})->name('login.petugas');

Route::post('/login/opd', [AuthController::class, 'loginOpd'])
    ->name('login.opd.submit');

Route::post('/login/petugas', [AuthController::class, 'loginPetugas'])
    ->name('login.petugas.submit');



// ==================================================
// REGISTER
// ==================================================

Route::get('/register/opd', function () {
    return view('auth.register-opd');
})->name('register.opd');

Route::get('/register/petugas', function () {
    return view('auth.register-petugas');
})->name('register.petugas');

// Registrasi Petugas
// Registrasi Petugas
Route::post('/register/petugas', [
    AuthController::class,
    'registerPetugas'
])->name('register.petugas.submit');

// Registrasi OPD
Route::post('/register/opd', [
    AuthController::class,
    'registerOpd'
])->name('register.opd.submit');


// ==================================================
// LOGOUT
// ==================================================

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


// ==================================================
// HALAMAN OPD
// ==================================================

Route::middleware('auth')->group(function () {

    // Dashboard OPD
    Route::get('/prototype/opd', [DashboardOpdController::class, 'index'])
        ->name('prototype.opd');


    // PENDAFTARAN SUBDOMAIN
    Route::get('/prototype/pendaftaran', function () {
        abort_unless(auth()->user()->role === 'opd', 403);

        return view('opd.pendaftaran');
    })->name('prototype.pendaftaran');

    Route::post('/prototype/pendaftaran', [
        PermohonanOpdController::class,
        'store'
    ])->name('opd.permohonan.store');


    // PERUBAHAN NAMA SUBDOMAIN
    Route::get('/prototype/perubahan', [
        PerubahanSubdomainController::class,
        'index'
    ])->name('prototype.perubahan');

    Route::post('/prototype/perubahan', [
        PerubahanSubdomainController::class,
        'store'
    ])->name('opd.permohonan.perubahan.store');


    // DAFTAR SUBDOMAIN OPD
    Route::get('/prototype/subdomain', [
        SubdomainOpdController::class,
        'index'
    ])->name('prototype.subdomain');

    // DOWNLOAD SURAT TINDAK LANJUT OPD
    Route::get('/prototype/opd/permohonan/{id}/surat', [
        SuratTindakLanjutController::class,
        'downloadOpd'
    ])->name('opd.surat.download');

    // Mengunduh surat oleh OPD
    Route::get(
        '/prototype/opd/surat/{id}/download',
        [SuratTindakLanjutController::class, 'downloadOpd']
    )->name('opd.surat.download');

    Route::post(
        '/prototype/opd/notifikasi/{id}/dibaca',
        [DashboardOpdController::class, 'tandaiDibaca']
    )->name('opd.notifikasi.dibaca');

    Route::post(
        '/prototype/opd/notifikasi/dibaca-semua',
        [DashboardOpdController::class, 'tandaiSemuaDibaca']
    )->name('opd.notifikasi.dibacaSemua');

});


// ==================================================
// HALAMAN PETUGAS DISKOMINFOTIK
// ==================================================

Route::middleware('auth')->group(function () {

    // DASHBOARD PETUGAS
    Route::get('/prototype/petugas', [
        DashboardPetugasController::class,
        'index'
    ])->name('prototype.petugas');


    // DAFTAR PERMOHONAN PENDAFTARAN
    Route::get('/prototype/petugas/pendaftaran', [
        PermohonanPendaftaranController::class,
        'index'
    ])->name('petugas.pendaftaran');


    // DETAIL PERMOHONAN PENDAFTARAN
    Route::get('/prototype/petugas/pendaftaran/{id}', [
        DetailPermohonanController::class,
        'show'
    ])->name('petugas.detail-permohonan');


    // MENERIMA PERMOHONAN PENDAFTARAN
    Route::post('/prototype/petugas/pendaftaran/{id}/terima', [
        DetailPermohonanController::class,
        'terima'
    ])->name('petugas.permohonan.terima');


    // MENOLAK PERMOHONAN PENDAFTARAN
    Route::post('/prototype/petugas/pendaftaran/{id}/tolak', [
        DetailPermohonanController::class,
        'tolak'
    ])->name('petugas.permohonan.tolak');


    // DAFTAR PERMOHONAN PERUBAHAN
    Route::get('/prototype/petugas/perubahan', [
        PermohonanPerubahanController::class,
        'index'
    ])->name('petugas.perubahan');


    // DETAIL PERMOHONAN PERUBAHAN
    Route::get('/prototype/petugas/perubahan/{id}', [
        DetailPerubahanController::class,
        'show'
    ])->name('petugas.detail-perubahan');


    // MENERIMA PERMOHONAN PERUBAHAN
    Route::post('/prototype/petugas/perubahan/{id}/terima', [
        DetailPerubahanController::class,
        'terima'
    ])->name('petugas.perubahan.terima');


    // MENOLAK PERMOHONAN PERUBAHAN
    Route::post('/prototype/petugas/perubahan/{id}/tolak', [
        DetailPerubahanController::class,
        'tolak'
    ])->name('petugas.perubahan.tolak');


    // DATA SUBDOMAIN
    Route::get('/prototype/petugas/subdomain', [
        SubdomainController::class,
        'index'
    ])->name('petugas.subdomain');


    // HALAMAN MONITORING
    Route::get('/prototype/petugas/monitoring', [
        MonitoringController::class,
        'index'
    ])->name('petugas.monitoring');


    // SIMPAN HASIL MONITORING
    Route::post('/prototype/petugas/monitoring/{id}', [
        MonitoringController::class,
        'store'
    ])->name('petugas.monitoring.store');


    // DOWNLOAD LAPORAN PDF BARU
    Route::get('/prototype/petugas/monitoring/download', [
        LaporanMonitoringController::class,
        'downloadBaru'
    ])->name('petugas.monitoring.download');


    // RIWAYAT LAPORAN MONITORING
    Route::get('/prototype/petugas/laporan-monitoring', [
        LaporanMonitoringController::class,
        'index'
    ])->name('petugas.laporan');


    // DOWNLOAD ULANG LAPORAN
    Route::get('/prototype/petugas/laporan-monitoring/{id}/download', [
        LaporanMonitoringController::class,
        'downloadUlang'
    ])->name('petugas.laporan.download');

    // ==================================================
    // SURAT TINDAK LANJUT PERMOHONAN
    // ==================================================

    // DOWNLOAD SURAT PENDAFTARAN
    Route::get('/prototype/petugas/pendaftaran/{id}/surat', [
        SuratTindakLanjutController::class,
        'downloadPetugas'
    ])->name('petugas.surat.pendaftaran');

    // DOWNLOAD SURAT PERUBAHAN
    Route::get('/prototype/petugas/perubahan/{id}/surat', [
        SuratTindakLanjutController::class,
        'downloadPetugas'
    ])->name('petugas.surat.perubahan');

    // SURAT TINDAK LANJUT

    // Mengunduh surat oleh Petugas
    Route::get(
        '/prototype/petugas/surat/{id}/download',
        [SuratTindakLanjutController::class, 'downloadPetugas']
    )->name('petugas.surat.download');

});
