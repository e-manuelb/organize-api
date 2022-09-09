<?php

namespace App\Domains\User\Http\Controllers;

use App\Domains\User\Http\Controllers\Interfaces\CreateUserInterface;
use App\Domains\User\Http\Requests\UserRequest;
use App\Domains\User\Http\Resources\UserResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Domains\User\Models\User;
use App\Models\Roles;


class CreateUserController extends Controller implements CreateUserInterface
{
    public function __invoke(UserRequest $request): UserResource
    {
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $data['role_id'] = Roles::USER;

        $user = (new User())->create($data);

        return new UserResource($user);
    }
}
