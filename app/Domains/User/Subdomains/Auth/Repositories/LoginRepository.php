<?php

namespace App\Domains\User\Subdomains\Auth\Repositories;

use App\Domains\User\Subdomains\Auth\Http\Resources\LoginResource;
use App\Domains\User\Subdomains\Auth\Models\User;
use App\Domains\User\Subdomains\Auth\Repositories\Interfaces\LoginRepositoryInterface;
use Illuminate\Http\Response;

class LoginRepository implements LoginRepositoryInterface
{
    public function login(User $user): string
    {
        return $user->createToken('auth-token')->plainTextToken;
    }
}
