<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Route::post('/auth/register', [UserController::class, 'createUser']);
Route::post('/login', [UserController::class, 'createUser']);
