<?php

namespace App\Domains\User\Http\Controllers;

use App\Domains\User\Http\Controllers\Interfaces\UpdateUserControllerInterface;
use App\Domains\User\Http\Requests\UserRequest;
use App\Domains\User\Http\Resources\UserResource;
use App\Domains\User\Models\User;
use App\Domains\User\Services\UpdateUserService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UpdateUserControllerController extends Controller implements UpdateUserControllerInterface
{
    protected UpdateUserService $updateUserService;

    public function __construct(UpdateUserService $updateUserService)
    {
        $this->updateUserService = $updateUserService;
    }

    public function __invoke(UserRequest $request): UserResource
    {
        return new UserResource($this->updateUserService->handle($request->all(), auth()->id()));
    }
}
