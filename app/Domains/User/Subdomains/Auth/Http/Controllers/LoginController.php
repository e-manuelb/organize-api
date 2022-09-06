<?php

namespace App\Domains\User\Subdomains\Auth\Http\Controllers;

use App\Domains\User\Subdomains\Auth\Http\Controllers\Interfaces\LoginInterface;
use App\Domains\User\Subdomains\Auth\Http\Requests\LoginRequest;
use App\Domains\User\Subdomains\Auth\Http\Resources\LoginResource;
use App\Domains\User\Subdomains\Auth\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class LoginController extends Controller implements LoginInterface
{
    public function __invoke(LoginRequest $request): LoginResource
    {
        $user = (new User())->where('email', '=', $request->email)->first();

        $this->checkCredentials();

        $authToken = $user->createToken('auth-token')->plainTextToken;

        return new LoginResource([
            'access_token' => $authToken
        ]);
    }

    protected function checkCredentials(): void
    {
        $credentials = request(['email', 'password']);

        if (!auth()->attempt($credentials)) {
            abort(Response::HTTP_UNPROCESSABLE_ENTITY, 'The given data was invalid.');
        }
    }
}
