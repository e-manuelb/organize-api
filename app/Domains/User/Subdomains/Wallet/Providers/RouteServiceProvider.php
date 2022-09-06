<?php

namespace App\Domains\User\Subdomains\Wallet\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api/wallet')
                ->group(base_path('app/Domains/User/Subdomains/Wallet/Routes/api.php'));
        });
    }
}
