<?php

namespace App\Domains\Admin\Subdomains\User\Http\Controllers;

use App\Domains\Admin\Subdomains\User\Http\Controllers\Interfaces\CreateUserControllerInterface;
use App\Domains\Admin\Subdomains\User\Http\Requests\UserRequest;
use App\Domains\Admin\Subdomains\User\Http\Resources\UserResource;
use App\Domains\Admin\Subdomains\User\Models\User;
use App\Domains\Admin\Subdomains\User\Services\CreateUserService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class CreateUserController extends Controller implements CreateUserControllerInterface
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
