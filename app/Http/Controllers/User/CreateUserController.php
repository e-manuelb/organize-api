<?php

namespace App\Http\Controllers\User;

use App\Http\Resources\User\UserResource;
use App\Http\Requests\User\UserRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUserController extends Controller
{
    public function __invoke(UserRequest $request): UserResource
    {
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);

        return new UserResource($user);
    }
}
