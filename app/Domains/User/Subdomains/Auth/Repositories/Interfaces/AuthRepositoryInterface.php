<?php

namespace App\Domains\User\Subdomains\Auth\Repositories\Interfaces;

use App\Domains\User\Subdomains\Auth\Models\User;

interface AuthRepositoryInterface
{
    public function createToken(User $user): ?string;
}
