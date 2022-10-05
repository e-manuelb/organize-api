<?php

namespace App\Domains\User\Repositories\Interfaces;

use App\Domains\User\Models\User;

interface UserRepositoryInterface
{
    public function create(array $data): User;

    public function update(array $data, int $id): User;
}
