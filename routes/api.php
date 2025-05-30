<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HelloController;

Route::post('/login', [LoginController::class, 'login']);
Route::get('/hello', [HelloController::class, 'index']); 