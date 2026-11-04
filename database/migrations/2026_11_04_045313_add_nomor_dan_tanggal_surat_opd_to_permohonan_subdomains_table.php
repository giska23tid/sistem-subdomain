<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('permohonan_subdomains', function (Blueprint $table) {
            $table->string('nomor_surat_opd', 100)->nullable()
                ->after('nama_subdomain');

            $table->date('tanggal_surat_opd')->nullable()
                ->after('nomor_surat_opd');
        });
    }

    public function down(): void
    {
        Schema::table('permohonan_subdomains', function (Blueprint $table) {
            $table->dropColumn([
                'nomor_surat_opd',
                'tanggal_surat_opd',
            ]);
        });
    }
};