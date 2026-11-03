<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Subdomain extends Model
{
    protected $table = 'subdomains';

    protected $guarded = [];

    protected $casts = [
        'tanggal_aktif' => 'date',
        'tanggal_nonaktif' => 'date',
    ];

    public function opd(): BelongsTo
    {
        return $this->belongsTo(Opd::class, 'opd_id');
    }

    public function permohonan(): BelongsTo
    {
        return $this->belongsTo(Permohonan::class, 'permohonan_id');
    }

    public function monitorings(): HasMany
    {
        return $this->hasMany(Monitoring::class, 'subdomain_id');
    }

    public function monitoringTerakhir(): HasOne
    {
        return $this->hasOne(Monitoring::class, 'subdomain_id')
                    ->latestOfMany('tanggal_monitoring');
    }
}
