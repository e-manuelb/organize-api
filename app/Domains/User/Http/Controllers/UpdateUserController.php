<?php

namespace App\Domains\User\Http\Controllers;

use App\Domains\User\Http\Controllers\Interfaces\UpdateUserInterface;
use App\Domains\User\Http\Requests\UserRequest;
use App\Domains\User\Http\Resources\UserResource;
use App\Domains\User\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UpdateUserController extends Controller implements UpdateUserInterface
{
    public function __invoke(UserRequest $request): UserResource
    {
        $user = (new User())->findOrFail(auth()->id());

        $data = $request->all();

        if ($request->has('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return new UserResource($data);
    }
}
