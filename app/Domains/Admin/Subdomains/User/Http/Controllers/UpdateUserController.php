<?php

namespace App\Domains\Admin\Subdomains\User\Http\Controllers;

use App\Domains\Admin\Subdomains\User\Http\Controllers\Interfaces\UpdateUserControllerInterface;
use App\Domains\Admin\Subdomains\User\Http\Requests\UserRequest;
use App\Domains\Admin\Subdomains\User\Http\Resources\UserResource;
use App\Domains\Admin\Subdomains\User\Models\User;
use App\Domains\Admin\Subdomains\User\Services\UpdateUserService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UpdateUserController extends Controller implements UpdateUserControllerInterface
{
    protected UpdateUserService $updateUserService;

    public function __construct(UpdateUserService $updateUserService)
    {
        $this->updateUserService = $updateUserService;
    }

    public function __invoke(UserRequest $request, int $id): UserResource
    {
        return new UserResource($this->updateUserService->handle($request->all(), $id));
    }
}
