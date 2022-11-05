<?php

namespace App\Domains\User\Subdomains\Auth\Http\Controllers;

use App\Domains\User\Subdomains\Auth\Http\Controllers\Interfaces\AuthControllerInterface;
use App\Domains\User\Subdomains\Auth\Http\Resources\LoginResource;
use App\Domains\User\Subdomains\Auth\Http\Requests\LoginRequest;
use App\Domains\User\Subdomains\Auth\Services\AuthService;
use Illuminate\Auth\AuthenticationException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class AuthController extends Controller implements AuthControllerInterface
{
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginRequest $request): LoginResource
    {
        try {
            return new LoginResource([
                'access_token' => $this->authService->login($request->only('email', 'password')),
            ]);
        } catch (AuthenticationException $e) {
            abort(Response::HTTP_UNPROCESSABLE_ENTITY, 'The given data was invalid.');
        }
    }
}
