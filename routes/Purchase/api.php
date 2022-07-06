<?php

use App\Http\Controllers\Purchase\CreatePurchaseController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'authenticated'], function () {
    Route::post('/create', CreatePurchaseController::class);
});
