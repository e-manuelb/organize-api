<?php

use App\Domains\User\Subdomains\Auth\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::post('/login', LoginController::class);
