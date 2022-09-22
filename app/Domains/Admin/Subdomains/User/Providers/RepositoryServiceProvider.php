<?php

namespace App\Domains\Admin\Subdomains\User\Providers;

use App\Domains\Admin\Subdomains\User\Repositories\CreateUserRepository;
use App\Domains\Admin\Subdomains\User\Repositories\DeleteUserRepository;
use App\Domains\Admin\Subdomains\User\Repositories\Interfaces\CreateUserRepositoryInterface;
use App\Domains\Admin\Subdomains\User\Repositories\Interfaces\DeleteUserRepositoryInterface;
use App\Domains\Admin\Subdomains\User\Repositories\Interfaces\ListUsersRepositoryInterface;
use App\Domains\Admin\Subdomains\User\Repositories\Interfaces\UpdateUserRepositoryInterface;
use App\Domains\Admin\Subdomains\User\Repositories\ListUsersRepository;
use App\Domains\Admin\Subdomains\User\Repositories\UpdateUserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CreateUserRepositoryInterface::class, CreateUserRepository::class);
        $this->app->bind(DeleteUserRepositoryInterface::class, DeleteUserRepository::class);
        $this->app->bind(ListUsersRepositoryInterface::class, ListUsersRepository::class);
        $this->app->bind(UpdateUserRepositoryInterface::class, UpdateUserRepository::class);
    }
}
