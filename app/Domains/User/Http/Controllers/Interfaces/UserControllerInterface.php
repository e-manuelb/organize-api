<?php

namespace App\Domains\User\Http\Controllers\Interfaces;

use App\Domains\User\Http\Requests\UserRequest;
use App\Domains\User\Http\Resources\UserResource;

interface UserControllerInterface
{
    public function create(UserRequest $request): UserResource;

    public function update(UserRequest $request): UserResource;
}
