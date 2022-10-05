<?php

namespace App\Domains\User\Services\Interfaces;

use App\Domains\User\Models\User;

interface UserServiceInterface
{
    public function create(array $data): User;

    public function update(array $data, int $id): User;
}
