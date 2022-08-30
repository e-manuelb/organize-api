<?php

namespace App\Http\Controllers\User\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdateUserController extends Controller
{
    public function __invoke(UserRequest $request, int $id): UserResource
    {
        $user = (new User())->findOrFail($id);

        $data = $request->all();

        $data['password'] = Hash::make($request->password);

        $user->update($data);

        return new UserResource($data);
    }
}
