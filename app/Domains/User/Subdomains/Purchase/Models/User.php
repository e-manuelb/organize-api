<?php

namespace App\Domains\User\Subdomains\Purchase\Models;

use App\Domains\User\Subdomains\Purchase\Models\Interfaces\UserInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements UserInterface
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    protected $hidden = [
        'password',
    ];

    public function purchase(): HasMany
    {
        return $this->hasMany(Purchase::class);
    }

    public function wallet(): HasMany
    {
        return $this->hasMany(Wallet::class);
    }

    public function origin(): HasMany
    {
        return $this->hasMany(Origin::class);
    }
}
