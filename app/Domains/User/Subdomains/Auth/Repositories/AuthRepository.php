<?php

namespace App\Domains\User\Subdomains\Auth\Repositories;

use App\Domains\User\Subdomains\Auth\Repositories\Interfaces\AuthRepositoryInterface;
use App\Domains\User\Subdomains\Auth\Models\User;
use Illuminate\Support\Str;

class AuthRepository implements AuthRepositoryInterface
{
    public function createToken(User $user): string
    {
        return $user->createToken('API Token')->accessToken;
    }
}
