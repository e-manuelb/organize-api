<?php

namespace App\Domains\Admin\Subdomains\User\Http\Controllers\Interfaces;

use App\Domains\Admin\Subdomains\User\Http\Requests\UserRequest;
use App\Domains\Admin\Subdomains\User\Http\Resources\UserResource;

interface UpdateUserControllerInterface
{
    public function __invoke(UserRequest $request, int $id): UserResource;
}
