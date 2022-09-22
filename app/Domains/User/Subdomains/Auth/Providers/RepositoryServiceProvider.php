<?php

namespace App\Domains\User\Subdomains\Auth\Providers;

use App\Domains\User\Subdomains\Auth\Repositories\Interfaces\LoginRepositoryInterface;
use App\Domains\User\Subdomains\Auth\Repositories\LoginRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(LoginRepositoryInterface::class, LoginRepository::class);
    }
}
