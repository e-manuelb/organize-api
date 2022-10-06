<?php

use App\Domains\User\Subdomains\Wallet\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('/', WalletController::class);
});
