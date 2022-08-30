<?php

use App\Http\Controllers\User\Wallet\CreateWalletController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'authenticated'], function () {
    Route::post('/create', CreateWalletController::class);
});
