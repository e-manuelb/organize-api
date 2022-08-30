<?php

namespace App\Providers\User\Purchase;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api/purchase')
                ->group(base_path('routes/User/Purchase/api.php'));
        });
    }
}
