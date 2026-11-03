<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Opd extends Model
{
    protected $table = 'opds';

    protected $guarded = [];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'opd_id');
    }

    public function permohonanSubdomains(): HasMany
    {
        return $this->hasMany(Permohonan::class, 'opd_id');
    }

    public function subdomains(): HasMany
    {
        return $this->hasMany(Subdomain::class, 'opd_id');
    }
}