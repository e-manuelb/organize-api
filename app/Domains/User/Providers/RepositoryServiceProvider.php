<?php

namespace App\Domains\User\Providers;

use App\Domains\User\Repositories\CreateUserRepository;
use App\Domains\User\Repositories\Interfaces\CreateUserRepositoryInterface;
use App\Domains\User\Repositories\Interfaces\UpdateUserRepositoryInterface;
use App\Domains\User\Repositories\UpdateUserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CreateUserRepositoryInterface::class, CreateUserRepository::class);
        $this->app->bind(UpdateUserRepositoryInterface::class, UpdateUserRepository::class);
    }
}
