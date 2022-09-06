<?php

use App\Domains\User\Http\Controllers\CreateUserController;
use App\Domains\User\Http\Controllers\UpdateUserController;
use Illuminate\Support\Facades\Route;

Route::post('/create', CreateUserController::class);

Route::group(['middleware' => 'authenticated'], function () {
    Route::put('/update/{id}', UpdateUserController::class);
});
