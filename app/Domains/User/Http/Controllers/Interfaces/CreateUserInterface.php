<?php

namespace App\Domains\User\Http\Controllers\Interfaces;

use App\Domains\User\Http\Requests\UserRequest;
use App\Domains\User\Http\Resources\UserResource;

interface CreateUserInterface
{
    public function __invoke(UserRequest $request): UserResource;
}
