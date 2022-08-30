<?php

use App\Http\Controllers\Purchase\CreatePurchaseController;
use App\Http\Controllers\Purchase\DeletePurchaseController;
use App\Http\Controllers\Purchase\ListPurchasesController;
use App\Http\Controllers\Purchase\UpdatePurchaseController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'authenticated'], function () {
    Route::post('/create', CreatePurchaseController::class);
    Route::get('/list', ListPurchasesController::class);
    Route::put('/update/{id}', UpdatePurchaseController::class);
    Route::delete('/delete/{id}', DeletePurchaseController::class);
});
