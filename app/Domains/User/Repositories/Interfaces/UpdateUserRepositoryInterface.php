<?php

namespace App\Domains\User\Repositories\Interfaces;

use App\Domains\User\Models\User;

interface UpdateUserRepositoryInterface
{
    public function update(array $data, int $id): User;
}
