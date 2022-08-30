<?php

use App\Http\Controllers\User\User\CreateUserController;
use App\Http\Controllers\User\User\UpdateUserController;
use Illuminate\Support\Facades\Route;

Route::post('/create', CreateUserController::class);

Route::group(['middleware' => 'authenticated'], function () {
    Route::put('/update/{id}', UpdateUserController::class);
});
