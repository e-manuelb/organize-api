<?php

namespace App\Domains\Admin\Subdomains\User\Http\Controllers;

use App\Domains\Admin\Subdomains\User\Http\Controllers\Interfaces\UpdateUserInterface;
use App\Domains\Admin\Subdomains\User\Http\Requests\UserRequest;
use App\Domains\Admin\Subdomains\User\Http\Resources\UserResource;
use App\Domains\Admin\Subdomains\User\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UpdateUserController extends Controller implements UpdateUserInterface
{
    public function __invoke(UserRequest $request, int $id): UserResource
    {
        $user = (new User())->findOrFail($id);

        $data = $request->all();

        if ($request->has('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return new UserResource($user);
    }
}
