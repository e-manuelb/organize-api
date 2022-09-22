<?php

namespace App\Domains\User\Subdomains\Auth\Http\Controllers\Interfaces;

use App\Domains\User\Subdomains\Auth\Http\Requests\LoginRequest;
use App\Domains\User\Subdomains\Auth\Http\Resources\LoginResource;

interface LoginControllerInterface
{
    public function __invoke(LoginRequest $request): LoginResource;
}
