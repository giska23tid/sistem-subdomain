<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dokumen_permohonan', function (Blueprint $table) {
            $table->id();

            $table->foreignId('permohonan_id')
                  ->constrained('permohonan_subdomains')
                  ->cascadeOnDelete();

            $table->string('jenis_dokumen');
            $table->string('nama_file');
            $table->string('path_file');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dokumen_permohonan');
    }
};