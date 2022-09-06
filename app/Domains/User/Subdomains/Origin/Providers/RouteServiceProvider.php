<?php

namespace App\Domains\User\Subdomains\Origin\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api/origin')
                ->group(base_path('app/Domains/User/Subdomains/Origin/Routes/api.php'));
        });
    }
}
