<?php

use App\Http\Controllers\User\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::post('/login', LoginController::class);
