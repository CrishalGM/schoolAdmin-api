<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\API\Branches\BranchIndexController;

Route::namespace('Auth')->prefix('/auth')
    ->group(function () {
        Route::post('/login', [LoginController::class, 'handle']);
        Route::post('/logout', [LogoutController::class, 'handle']);
});

Route::middleware('auth')->group(function () {
    Route::prefix('/branches')->group(function () {
        Route::get('/', [BranchIndexController::class, 'handle']);
    });
});
