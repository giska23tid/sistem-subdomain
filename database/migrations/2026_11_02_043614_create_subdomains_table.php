<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subdomains', function (Blueprint $table) {
            $table->id();

            $table->foreignId('opd_id')
                  ->constrained('opds')
                  ->cascadeOnDelete();

            $table->foreignId('permohonan_id')
                  ->nullable()
                  ->constrained('permohonan_subdomains')
                  ->nullOnDelete();

            $table->string('nama_subdomain')->unique();

            $table->enum('status', ['aktif', 'nonaktif'])
                  ->default('aktif');

            $table->date('tanggal_aktif')->nullable();
            $table->date('tanggal_nonaktif')->nullable();

            $table->text('keterangan')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subdomains');
    }
};