<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laporan_monitoring', function (Blueprint $table) {
            $table->id();
            $table->string('nama_laporan');
            $table->date('tanggal_laporan');
            $table->unsignedInteger('total_subdomain')->default(0);
            $table->unsignedInteger('subdomain_aktif')->default(0);
            $table->unsignedInteger('subdomain_nonaktif')->default(0);
            $table->json('data_subdomain');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_monitoring');
    }
};
