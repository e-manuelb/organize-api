<?php

namespace App\Domains\User\Subdomains\Auth\Services\Interfaces;

interface AuthServiceInterface
{
    public function login(array $data): ?string;
}
