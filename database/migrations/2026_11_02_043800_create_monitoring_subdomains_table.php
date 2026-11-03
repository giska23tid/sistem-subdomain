<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('monitoring_subdomains', function (Blueprint $table) {
            $table->id();

            $table->foreignId('subdomain_id')
                  ->constrained('subdomains')
                  ->cascadeOnDelete();

            $table->foreignId('petugas_id')
                  ->constrained('users')
                  ->cascadeOnDelete();

            $table->date('tanggal_monitoring');

            $table->enum('status_pemeriksaan', [
                'aktif',
                'nonaktif'
            ]);

            $table->text('catatan')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('monitoring_subdomains');
    }
};