<?php

namespace App\Domains\User\Subdomains\Origin\Providers;

use App\Domains\User\Subdomains\Origin\Repositories\OriginRepository;
use App\Domains\User\Subdomains\Origin\Repositories\Interfaces\OriginRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(OriginRepositoryInterface::class, OriginRepository::class);
    }
}
