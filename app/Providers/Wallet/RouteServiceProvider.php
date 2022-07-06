<?php

namespace App\Providers\Wallet;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api/wallet')
                ->group(base_path('routes/Wallet/api.php'));
        });
    }
}
