<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permohonan_subdomains', function (Blueprint $table) {
            $table->id();

            // OPD yang mengajukan permohonan
            $table->foreignId('opd_id')
                  ->constrained('opds')
                  ->cascadeOnDelete();

            // Pengguna yang mengajukan
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->cascadeOnDelete();

            // Jenis permohonan
            $table->enum('jenis_permohonan', [
                'pendaftaran',
                'perubahan'
            ]);

            // Nama subdomain yang diminta
            $table->string('nama_subdomain');

            // Subdomain lama khusus permohonan perubahan
            $table->string('subdomain_lama')->nullable();

            // Status permohonan
            $table->enum('status', [
                'diajukan',
                'diterima',
                'ditolak'
            ])->default('diajukan');

            // Petugas yang memeriksa
            $table->foreignId('petugas_id')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete();

            // Alasan penolakan atau catatan petugas
            $table->text('catatan')->nullable();

            // Waktu pemeriksaan
            $table->timestamp('tanggal_diperiksa')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('permohonan_subdomains');
    }
};