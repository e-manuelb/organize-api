<?php

use App\Http\Controllers\Admin\User\CreateUserController;
use App\Http\Controllers\Admin\User\DeleteUserController;
use App\Http\Controllers\Admin\User\ListUsersController;
use App\Http\Controllers\Admin\User\UpdateUserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'admin'], function () {
    Route::get('/', ListUsersController::class);
    Route::post('/create', CreateUserController::class);
    Route::put('/update/{id}', UpdateUserController::class);
    Route::delete('/delete/{id}', DeleteUserController::class);
});
