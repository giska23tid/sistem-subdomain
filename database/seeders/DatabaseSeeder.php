<?php

namespace Database\Seeders;

use App\Models\Opd;
use App\Models\Subdomain;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $disdik = Opd::create(['nama' => 'Dinas Pendidikan dan Kebudayaan']);
        $dinkes = Opd::create(['nama' => 'Dinas Kesehatan']);
        Opd::create(['nama' => 'Dinas Perhubungan']);

        User::create([
            'name'     => 'Petugas Diskominfotik',
            'username' => 'petugas',
            'email'    => 'petugas@contoh.go.id',
            'password' => Hash::make('password'),
            'role'     => 'petugas',
        ]);

        User::create([
            'name'     => 'Pengelola Dinas Pendidikan',
            'username' => 'disdik',
            'email'    => 'disdik@contoh.go.id',
            'password' => Hash::make('password'),
            'role'     => 'opd',
            'opd_id'   => $disdik->id,
        ]);

        User::create([
            'name'     => 'Pengelola Dinas Kesehatan',
            'username' => 'dinkes',
            'email'    => 'dinkes@contoh.go.id',
            'password' => Hash::make('password'),
            'role'     => 'opd',
            'opd_id'   => $dinkes->id,
        ]);

        Subdomain::create([
            'opd_id'          => $dinkes->id,
            'nama'            => 'kesehatan',
            'status'          => 'aktif',
            'diaktifkan_pada' => now(),
            'keterangan'      => 'Data awal.',
        ]);
    }
}