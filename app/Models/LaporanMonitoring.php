<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanMonitoring extends Model
{
    protected $table = 'laporan_monitoring';

    protected $fillable = [
        'nama_laporan',
        'tanggal_laporan',
        'total_subdomain',
        'subdomain_aktif',
        'subdomain_nonaktif',
        'data_subdomain',
    ];

    protected $casts = [
        'tanggal_laporan' => 'date',
        'data_subdomain' => 'array',
    ];
}
