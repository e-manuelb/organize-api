<?php

namespace App\Domains\Admin\Subdomains\User\Http\Controllers\Interfaces;

use App\Domains\Admin\Subdomains\User\Http\Requests\UserRequest;
use App\Domains\Admin\Subdomains\User\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;

interface UserControllerInterface
{
    public function create(UserRequest $request): UserResource;

    public function index(): UserResource;

    public function show(int $id): UserResource;

    public function update(UserRequest $request, int $id): UserResource;

    public function delete(int $id): JsonResponse;
}
