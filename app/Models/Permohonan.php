<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Permohonan extends Model
{
    protected $table = 'permohonan_subdomains';

    protected $guarded = [];

    protected $casts = [
        'tanggal_diperiksa' => 'datetime',
    ];

    public function opd(): BelongsTo
    {
        return $this->belongsTo(Opd::class, 'opd_id');
    }

    public function pengaju(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pemutus(): BelongsTo
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }

    public function dokumens(): HasMany
    {
        return $this->hasMany(DokumenPermohonan::class, 'permohonan_id');
    }

    public function subdomain(): HasOne
    {
        return $this->hasOne(Subdomain::class, 'permohonan_id');
    }
}
