<?php

use App\Domains\User\Subdomains\Purchase\Http\Controllers\PurchaseController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'authenticated'], function () {
    Route::post('/', [PurchaseController::class, 'create']);
    Route::get('/', [PurchaseController::class, 'index']);
    Route::get('/{id}', [PurchaseController::class, 'show']);
    Route::put('/{id}', [PurchaseController::class, 'update']);
    Route::delete('/{id}', [PurchaseController::class, 'delete']);
});
