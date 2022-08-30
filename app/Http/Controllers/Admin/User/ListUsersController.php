<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Models\User;

class ListUsersController extends Controller
{
    public function __invoke(): UserResource
    {
        $users = (new User())->get();

        return new UserResource($users);
    }
}
