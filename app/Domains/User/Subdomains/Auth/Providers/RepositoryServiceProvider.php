<?php

namespace App\Domains\User\Subdomains\Auth\Providers;

use App\Domains\User\Subdomains\Auth\Repositories\Interfaces\AuthRepositoryInterface;
use App\Domains\User\Subdomains\Auth\Repositories\AuthRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
    }
}
