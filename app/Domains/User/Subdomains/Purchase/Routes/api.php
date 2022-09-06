<?php

use App\Domains\User\Subdomains\Purchase\Http\Controllers\CreatePurchaseController;
use App\Domains\User\Subdomains\Purchase\Http\Controllers\DeletePurchaseController;
use App\Domains\User\Subdomains\Purchase\Http\Controllers\ListPurchasesController;
use App\Domains\User\Subdomains\Purchase\Http\Controllers\UpdatePurchaseController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'authenticated'], function () {
    Route::post('/create', CreatePurchaseController::class);
    Route::get('/list', ListPurchasesController::class);
    Route::put('/update/{id}', UpdatePurchaseController::class);
    Route::delete('/delete/{id}', DeletePurchaseController::class);
});
