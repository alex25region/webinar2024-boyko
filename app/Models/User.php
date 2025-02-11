<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'firstname',
        'lastname',
        'is_admin',
        'email',
        'phone',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'is_admin' => 'boolean',
        ];
    }

//    public function name(): Attribute
//    {
//        return Attribute::make(get: fn($value) => mb_ucfirst($value));
//    }

    public function scopeAdmin(Builder $query): void
    {
        $query->where('is_admin', 1);
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function networks(): HasMany
    {
        return $this->hasMany(Network::class);
    }

    // JWT
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
