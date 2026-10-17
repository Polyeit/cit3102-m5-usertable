<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserTableController;
use Illuminate\Support\Facades\Route;

// Public
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    Route::get('/user-tables', [UserTableController::class, 'index']);
    Route::post('/user-tables', [UserTableController::class, 'store']);
    Route::get('/user-tables/{userTable}', [UserTableController::class, 'show']);
    Route::put('/user-tables/{userTable}', [UserTableController::class, 'update']);
    Route::delete('/user-tables/{userTable}', [UserTableController::class, 'destroy']);
});
