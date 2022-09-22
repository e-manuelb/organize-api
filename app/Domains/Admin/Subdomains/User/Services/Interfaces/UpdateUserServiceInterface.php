<?php

namespace App\Domains\Admin\Subdomains\User\Services\Interfaces;

use App\Domains\Admin\Subdomains\User\Models\User;

interface UpdateUserServiceInterface
{
    public function handle(array $data, int $id): User;
}
