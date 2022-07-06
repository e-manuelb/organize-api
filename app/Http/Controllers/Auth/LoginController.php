<?php

namespace App\Http\Controllers\Auth;

use App\Http\Resources\Auth\LoginResource;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Models\User;

class LoginController extends Controller
{
    /**
     *
     * Login method
     *
     * @param LoginRequest $request
     * @return LoginResource
     */

    public function __invoke(LoginRequest $request): LoginResource
    {
        $user = (new User())->where('email', '=', $request->email)->first();

        $this->checkCredentials();

        $authToken = $user->createToken('auth-token')->plainTextToken;

        return new LoginResource([
            'access_token' => $authToken
        ]);
    }

    private function checkCredentials(): void
    {
        $credentials = request(['email', 'password']);

        if (!auth()->attempt($credentials)) {
            abort(Response::HTTP_UNPROCESSABLE_ENTITY, 'The given data was invalid.');
        }
    }
}
