<?php

namespace App\Domains\Admin\Subdomains\User\Http\Controllers;

use App\Domains\Admin\Subdomains\User\Http\Controllers\Interfaces\CreateUserInterface;
use App\Domains\Admin\Subdomains\User\Http\Requests\UserRequest;
use App\Domains\Admin\Subdomains\User\Http\Resources\UserResource;
use App\Domains\Admin\Subdomains\User\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class CreateUserController extends Controller implements CreateUserInterface
{
    public function __invoke(UserRequest $request): UserResource
    {
        $data = $request->all();

        $data['password'] = Hash::make($request->password);

        $user = (new User())->create($data);

        return new UserResource($user);
    }
}
