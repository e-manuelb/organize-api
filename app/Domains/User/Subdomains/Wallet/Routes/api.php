<?php

use App\Domains\User\Subdomains\Wallet\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'authenticated'], function () {
    Route::post('/', WalletController::class);
});
