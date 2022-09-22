<?php

namespace App\Domains\User\Subdomains\Auth\Services\Interfaces;

interface LoginServiceInterface
{
    public function handle(array $data): ?string;
}
