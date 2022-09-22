<?php

namespace App\Domains\Admin\Subdomains\User\Repositories\Interfaces;

use App\Domains\Admin\Subdomains\User\Models\User;

interface CreateUserRepositoryInterface
{
    public function create(array $data): User;
}
