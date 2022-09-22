<?php

namespace App\Domains\User\Http\Controllers;

use App\Domains\User\Http\Controllers\Interfaces\CreateUserControllerInterface;
use App\Domains\User\Http\Requests\UserRequest;
use App\Domains\User\Http\Resources\UserResource;
use App\Domains\User\Services\CreateUserService;
use App\Http\Controllers\Controller;

class CreateUserControllerController extends Controller implements CreateUserControllerInterface
{
    protected CreateUserService $createUserService;

    public function __construct(CreateUserService $createUserService)
    {
        $this->createUserService = $createUserService;
    }

    public function __invoke(UserRequest $request): UserResource
    {
        return new UserResource($this->createUserService->handle($request->all()));
    }
}
