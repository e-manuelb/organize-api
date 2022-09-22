<?php

namespace App\Domains\User\Subdomains\Origin\Providers;

use App\Domains\User\Subdomains\Origin\Repositories\CreateOriginRepository;
use App\Domains\User\Subdomains\Origin\Repositories\Interfaces\CreateOriginRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CreateOriginRepositoryInterface::class, CreateOriginRepository::class);
    }
}
