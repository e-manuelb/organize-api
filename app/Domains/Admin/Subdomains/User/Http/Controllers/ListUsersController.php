<?php

namespace App\Domains\Admin\Subdomains\User\Http\Controllers;

use App\Domains\Admin\Subdomains\User\Http\Controllers\Interfaces\ListUsersInterface;
use App\Domains\Admin\Subdomains\User\Http\Resources\UserResource;
use App\Domains\Admin\Subdomains\User\Models\User;
use App\Http\Controllers\Controller;

class ListUsersController extends Controller implements ListUsersInterface
{
    public function __invoke(): UserResource
    {
        $users = (new User())->get();

        return new UserResource($users);
    }
}
