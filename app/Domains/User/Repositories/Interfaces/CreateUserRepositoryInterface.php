<?php

namespace App\Domains\User\Repositories\Interfaces;

use App\Domains\User\Models\User;

interface CreateUserRepositoryInterface
{
    public function create(array $data): User;
}
