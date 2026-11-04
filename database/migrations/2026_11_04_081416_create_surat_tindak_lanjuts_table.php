<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surat_tindak_lanjuts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('permohonan_id')
                ->constrained('permohonan_subdomains')
                ->cascadeOnDelete();

            $table->enum('jenis_surat', [
                'persetujuan',
                'penolakan'
            ]);

            $table->string('nomor_surat', 150);
            $table->date('tanggal_surat');

            $table->string('file_pdf');

            $table->foreignId('petugas_id')
                ->constrained('users')
                ->restrictOnDelete();

            $table->timestamps();

            $table->unique(
                ['permohonan_id'],
                'surat_permohonan_unique'
            );

            $table->unique(
                ['nomor_surat'],
                'surat_nomor_unique'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surat_tindak_lanjuts');
    }
};