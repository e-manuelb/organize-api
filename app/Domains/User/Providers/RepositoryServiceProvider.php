<?php

namespace App\Domains\User\Providers;

use App\Domains\User\Repositories\Interfaces\UserRepositoryInterface;
use App\Domains\User\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }
}
