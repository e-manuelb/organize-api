<?php

namespace App\Domains\User\Subdomains\Wallet\Providers;

use App\Domains\User\Subdomains\Wallet\Repositories\CreateWalletRepository;
use App\Domains\User\Subdomains\Wallet\Repositories\Interfaces\CreateWalletRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CreateWalletRepositoryInterface::class, CreateWalletRepository::class);
    }
}
