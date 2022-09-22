<?php

use App\Domains\User\Subdomains\Origin\Http\Controllers\CreateOriginControllerController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'authenticated'], function () {
    Route::post('/create', CreateOriginControllerController::class);
});
