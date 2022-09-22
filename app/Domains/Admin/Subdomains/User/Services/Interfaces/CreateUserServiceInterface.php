<?php

namespace App\Domains\Admin\Subdomains\User\Services\Interfaces;

use App\Domains\Admin\Subdomains\User\Models\User;

interface CreateUserServiceInterface
{
    public function handle(array $data): User;
}
