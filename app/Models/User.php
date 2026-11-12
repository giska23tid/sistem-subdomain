<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'name',
    'nip',
    'email',
    'password',
    'role',
    'opd_id'
])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function opd(): BelongsTo
    {
        return $this->belongsTo(Opd::class, 'opd_id');
    }

    public function permohonanDiajukan(): HasMany
    {
        return $this->hasMany(Permohonan::class, 'user_id');
    }

    public function permohonanDiperiksa(): HasMany
    {
        return $this->hasMany(Permohonan::class, 'petugas_id');
    }

    public function monitoring(): HasMany
    {
        return $this->hasMany(Monitoring::class, 'petugas_id');
    }
}
