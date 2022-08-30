<?php

use App\Http\Controllers\User\Origin\CreateOriginController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'authenticated'], function () {
    Route::post('/create', CreateOriginController::class);
});
