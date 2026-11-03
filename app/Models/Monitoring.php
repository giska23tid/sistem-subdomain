<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Monitoring extends Model
{
    protected $table = 'monitoring_subdomains';

    protected $guarded = [];

    protected $casts = [
        'tanggal_monitoring' => 'date',
    ];

    public function subdomain(): BelongsTo
    {
        return $this->belongsTo(Subdomain::class, 'subdomain_id');
    }

    public function petugas(): BelongsTo
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }
}
