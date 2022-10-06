<?php

use App\Domains\User\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/', [UserController::class, 'create']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::put('/{id}', [UserController::class, 'update']);
});
