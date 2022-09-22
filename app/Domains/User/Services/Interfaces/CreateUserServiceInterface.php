<?php

namespace App\Domains\User\Services\Interfaces;

use App\Domains\User\Models\User;

interface CreateUserServiceInterface
{
    public function handle(array $data): User;
}
