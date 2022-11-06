<?php

namespace App\Domains\User\Http\Controllers;

use App\Domains\User\Http\Controllers\Interfaces\UserControllerInterface;
use App\Domains\User\Http\Resources\UserResource;
use App\Domains\User\Http\Requests\UserRequest;
use App\Domains\User\Services\UserService;
use App\Http\Controllers\Controller;

class UserController extends Controller implements UserControllerInterface
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function create(UserRequest $request): UserResource
    {
        return new UserResource($this->userService->create($request->validated()));
    }

    public function update(UserRequest $request): UserResource
    {
        return new UserResource($this->userService->update($request->validated(), auth()->id()));
    }
}
