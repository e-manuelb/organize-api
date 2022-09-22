<?php

use App\Domains\User\Subdomains\Purchase\Http\Controllers\CreatePurchaseControllerController;
use App\Domains\User\Subdomains\Purchase\Http\Controllers\DeletePurchaseControllerController;
use App\Domains\User\Subdomains\Purchase\Http\Controllers\ListPurchasesControllerController;
use App\Domains\User\Subdomains\Purchase\Http\Controllers\UpdatePurchaseControllerController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'authenticated'], function () {
    Route::post('/create', CreatePurchaseControllerController::class);
    Route::get('/list', ListPurchasesControllerController::class);
    Route::put('/update/{id}', UpdatePurchaseControllerController::class);
    Route::delete('/delete/{id}', DeletePurchaseControllerController::class);
});
