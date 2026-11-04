<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nomor_surat_sequences', function (Blueprint $table) {
            $table->id();

            $table->enum('jenis_surat', [
                'persetujuan',
                'penolakan'
            ]);

            $table->year('tahun');
            $table->unsignedInteger('nomor_terakhir')->default(0);

            $table->timestamps();

            $table->unique(
                ['jenis_surat', 'tahun'],
                'jenis_tahun_unique'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nomor_surat_sequences');
    }
};