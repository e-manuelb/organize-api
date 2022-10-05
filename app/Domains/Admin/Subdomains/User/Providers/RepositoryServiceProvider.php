<?php

namespace App\Domains\Admin\Subdomains\User\Providers;

use App\Domains\Admin\Subdomains\User\Repositories\Interfaces\UserRepositoryInterface;
use App\Domains\Admin\Subdomains\User\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }
}
