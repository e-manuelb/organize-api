<?php

use App\Domains\User\Subdomains\Wallet\Http\Controllers\CreateWalletController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'authenticated'], function () {
    Route::post('/create', CreateWalletController::class);
});
