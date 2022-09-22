<?php

namespace App\Domains\Admin\Subdomains\User\Http\Controllers;

use App\Domains\Admin\Subdomains\User\Http\Controllers\Interfaces\ListUsersControllerInterface;
use App\Domains\Admin\Subdomains\User\Http\Resources\UserResource;
use App\Domains\Admin\Subdomains\User\Models\User;
use App\Domains\Admin\Subdomains\User\Services\ListUsersService;
use App\Http\Controllers\Controller;

class ListUsersController extends Controller implements ListUsersControllerInterface
{
    protected ListUsersService $listUsersService;

    public function __construct(ListUsersService $listUsersService)
    {
        $this->listUsersService = $listUsersService;
    }

    public function __invoke(): UserResource
    {
        return new UserResource($this->listUsersService->handle());
    }
}
