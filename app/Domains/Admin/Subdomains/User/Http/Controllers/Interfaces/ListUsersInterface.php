<?php

namespace App\Domains\Admin\Subdomains\User\Http\Controllers\Interfaces;

use App\Domains\Admin\Subdomains\User\Http\Resources\UserResource;

interface ListUsersInterface
{
    public function __invoke(): UserResource;
}