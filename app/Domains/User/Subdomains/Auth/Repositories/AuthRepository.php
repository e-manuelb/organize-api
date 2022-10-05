<?php

namespace App\Domains\User\Subdomains\Auth\Repositories;

use App\Domains\User\Subdomains\Auth\Repositories\Interfaces\AuthRepositoryInterface;
use App\Domains\User\Subdomains\Auth\Models\User;

class AuthRepository implements AuthRepositoryInterface
{
    public function login(User $user): string
    {
        return $user->createToken('auth-token')->plainTextToken;
    }
}
