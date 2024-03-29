<?php

namespace App\Domains\Admin\Subdomains\User\Http\Controllers;

use App\Domains\Admin\Subdomains\User\Http\Controllers\Interfaces\UserControllerInterface;
use App\Domains\Admin\Subdomains\User\Http\Resources\UserResource;
use App\Domains\Admin\Subdomains\User\Http\Requests\UserRequest;
use App\Domains\Admin\Subdomains\User\Services\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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

    public function index(Request $request): UserResource
    {
        $params = collect($request->only('user_id', 'first_name', 'middle_name', 'last_name', 'email'));

        return new UserResource($this->userService->list($params));
    }

    public function show(int $id): UserResource
    {
        return new UserResource($this->userService->getByID($id));
    }

    public function update(UserRequest $request, int $id): UserResource
    {
        return new UserResource($this->userService->update($request->validated(), $id));
    }

    public function delete(int $id): JsonResponse
    {
        $this->userService->delete($id);

        return response()->json([
            'message' => "User $id was deleted successfully."
        ]);
    }
}
