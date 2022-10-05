<?php

namespace App\Domains\User\Subdomains\Purchase\Providers;

use App\Domains\User\Subdomains\Purchase\Repositories\Interfaces\PurchaseRepositoryInterface;
use App\Domains\User\Subdomains\Purchase\Repositories\PurchaseRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(PurchaseRepositoryInterface::class, PurchaseRepository::class);
    }
}
