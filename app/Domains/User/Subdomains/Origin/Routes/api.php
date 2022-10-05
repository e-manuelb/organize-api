<?php

use App\Domains\User\Subdomains\Origin\Http\Controllers\OriginController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'authenticated'], function () {
    Route::post('/', [OriginController::class, 'create']);
});
