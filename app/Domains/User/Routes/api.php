<?php

use App\Domains\Admin\Subdomains\User\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/', [UserController::class, 'create']);

Route::group(['middleware' => 'authenticated'], function () {
    Route::put('/{id}', [UserController::class, 'update']);
});
