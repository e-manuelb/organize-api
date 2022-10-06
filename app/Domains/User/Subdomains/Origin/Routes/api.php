<?php

use App\Domains\User\Subdomains\Origin\Http\Controllers\OriginController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('/', [OriginController::class, 'create']);
    Route::get('/', [OriginController::class, 'getForUser']);
});
