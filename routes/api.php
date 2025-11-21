<?php

use App\Http\Controllers\Api\AdminLoginController;
use App\Http\Controllers\Api\UserLoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/users/login', UserLoginController::class);
Route::post('/admin/login', AdminLoginController::class);
