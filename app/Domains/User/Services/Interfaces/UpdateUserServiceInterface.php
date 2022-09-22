<?php

namespace App\Domains\User\Services\Interfaces;

use App\Domains\User\Models\User;

interface UpdateUserServiceInterface
{
    public function handle(array $data, int $id): User;
}
