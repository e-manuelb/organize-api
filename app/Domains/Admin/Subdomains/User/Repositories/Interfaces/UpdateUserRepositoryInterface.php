<?php

namespace App\Domains\Admin\Subdomains\User\Repositories\Interfaces;

use App\Domains\Admin\Subdomains\User\Models\User;

interface UpdateUserRepositoryInterface
{
    public function update(array $data, int $id): User;
}
