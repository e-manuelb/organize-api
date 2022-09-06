<?php

use App\Domains\User\Subdomains\Origin\Http\Controllers\CreateOriginController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'authenticated'], function () {
    Route::post('/create', CreateOriginController::class);
});
