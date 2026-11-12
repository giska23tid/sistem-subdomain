<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tambahkan kolom ke tabel opds jika belum tersedia
        if (!Schema::hasColumn('opds', 'nama_penanggung_jawab')) {
            Schema::table('opds', function (Blueprint $table) {
                $table->string('nama_penanggung_jawab')->nullable();
            });
        }

        if (!Schema::hasColumn('opds', 'nip')) {
            Schema::table('opds', function (Blueprint $table) {
                $table->string('nip', 30)->nullable();
            });
        }

        // Tambahkan role ke tabel users jika belum tersedia
        if (!Schema::hasColumn('users', 'role')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('role')->default('petugas');
            });
        }

        // Tambahkan opd_id beserta relasinya jika belum tersedia
        if (!Schema::hasColumn('users', 'opd_id')) {
            Schema::table('users', function (Blueprint $table) {
                $table->foreignId('opd_id')
                    ->nullable()
                    ->constrained('opds')
                    ->nullOnDelete();
            });
        }
    }

    public function down(): void
    {
        // Tidak menghapus kolom pada rollback agar data
        // yang sudah tersimpan tidak terhapus secara tidak sengaja.
    }
};
