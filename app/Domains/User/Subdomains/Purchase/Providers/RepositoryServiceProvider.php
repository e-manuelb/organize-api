<?php

namespace App\Domains\User\Subdomains\Purchase\Providers;

use App\Domains\User\Subdomains\Purchase\Repositories\CreatePurchaseRepository;
use App\Domains\User\Subdomains\Purchase\Repositories\DeletePurchaseRepository;
use App\Domains\User\Subdomains\Purchase\Repositories\Interfaces\CreatePurchaseRepositoryInterface;
use App\Domains\User\Subdomains\Purchase\Repositories\Interfaces\DeletePurchaseRepositoryInterface;
use App\Domains\User\Subdomains\Purchase\Repositories\Interfaces\ListPurchasesRepositoryInterface;
use App\Domains\User\Subdomains\Purchase\Repositories\Interfaces\UpdatePurchaseRepositoryInterface;
use App\Domains\User\Subdomains\Purchase\Repositories\ListPurchasesRepository;
use App\Domains\User\Subdomains\Purchase\Repositories\UpdatePurchaseRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CreatePurchaseRepositoryInterface::class, CreatePurchaseRepository::class);
        $this->app->bind(DeletePurchaseRepositoryInterface::class, DeletePurchaseRepository::class);
        $this->app->bind(ListPurchasesRepositoryInterface::class, ListPurchasesRepository::class);
        $this->app->bind(UpdatePurchaseRepositoryInterface::class, UpdatePurchaseRepository::class);
    }
}
