<?php

namespace App\Domains\User\Subdomains\Wallet\Providers;

use App\Domains\User\Subdomains\Wallet\Repositories\WalletRepository;
use App\Domains\User\Subdomains\Wallet\Repositories\Interfaces\WalletRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(WalletRepositoryInterface::class, WalletRepository::class);
    }
}
