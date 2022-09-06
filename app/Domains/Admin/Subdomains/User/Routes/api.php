<?php

use App\Domains\Admin\Subdomains\User\Http\Controllers\CreateUserController;
use App\Domains\Admin\Subdomains\User\Http\Controllers\DeleteUserController;
use App\Domains\Admin\Subdomains\User\Http\Controllers\ListUsersController;
use App\Domains\Admin\Subdomains\User\Http\Controllers\UpdateUserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'admin'], function () {
    Route::get('/', ListUsersController::class);
    Route::post('/create', CreateUserController::class);
    Route::put('/update/{id}', UpdateUserController::class);
    Route::delete('/delete/{id}', DeleteUserController::class);
});
