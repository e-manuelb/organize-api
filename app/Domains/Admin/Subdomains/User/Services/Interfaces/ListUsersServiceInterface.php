<?php

namespace App\Domains\Admin\Subdomains\User\Services\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface ListUsersServiceInterface
{
    public function handle(): Collection;
}
