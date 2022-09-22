<?php

namespace App\Domains\Admin\Subdomains\User\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface ListUsersRepositoryInterface
{
    public function list(): Collection;
}
