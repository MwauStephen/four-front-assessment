<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\WalletController;
use App\Http\Controllers\Api\TransactionController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{user}/profile', [UserController::class, 'show']);

Route::post('/users/{user}/wallets', [WalletController::class, 'store']);
Route::get('/wallets/{wallet}', [WalletController::class, 'show']);

Route::post('/wallets/{wallet}/transactions', [TransactionController::class, 'store']);
