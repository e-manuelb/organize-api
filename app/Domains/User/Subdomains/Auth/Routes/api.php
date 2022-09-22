<?php

use App\Domains\User\Subdomains\Auth\Http\Controllers\LoginControllerController;
use Illuminate\Support\Facades\Route;

Route::post('/login', LoginControllerController::class);
