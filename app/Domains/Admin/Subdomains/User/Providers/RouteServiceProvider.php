<?php

namespace App\Domains\Admin\Subdomains\User\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api/admin/user')
                ->group(base_path('app/Domains/Admin/Subdomains/User/Routes/api.php'));
        });
    }
}
