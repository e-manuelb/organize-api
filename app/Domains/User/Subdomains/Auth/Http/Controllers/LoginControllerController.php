<?php

namespace App\Domains\User\Subdomains\Auth\Http\Controllers;

use App\Domains\User\Subdomains\Auth\Http\Controllers\Interfaces\LoginControllerInterface;
use App\Domains\User\Subdomains\Auth\Http\Requests\LoginRequest;
use App\Domains\User\Subdomains\Auth\Http\Resources\LoginResource;
use App\Domains\User\Subdomains\Auth\Services\LoginService;
use App\Http\Controllers\Controller;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Response;

class LoginControllerController extends Controller implements LoginControllerInterface
{
    protected LoginService $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function __invoke(LoginRequest $request): LoginResource
    {
        try {
            return new LoginResource([
                'access_token' => $this->loginService->handle($request->all())
            ]);
        } catch (AuthenticationException $e) {
            abort(Response::HTTP_UNPROCESSABLE_ENTITY, 'The given data was invalid.');
        }
    }
}
