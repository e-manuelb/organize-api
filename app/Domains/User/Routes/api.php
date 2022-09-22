<?php

use App\Domains\User\Http\Controllers\CreateUserControllerController;
use App\Domains\User\Http\Controllers\UpdateUserControllerController;
use Illuminate\Support\Facades\Route;

Route::post('/create', CreateUserControllerController::class);

Route::group(['middleware' => 'authenticated'], function () {
    Route::put('/update/{id}', UpdateUserControllerController::class);
});
