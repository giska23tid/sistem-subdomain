<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('permohonan_subdomains', function (Blueprint $table) {
            $table->text('kegunaan')->nullable()->after('nama_subdomain');
        });
    }

    public function down(): void
    {
        Schema::table('permohonan_subdomains', function (Blueprint $table) {
            $table->dropColumn('kegunaan');
        });
    }
};