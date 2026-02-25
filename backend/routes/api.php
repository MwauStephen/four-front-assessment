<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\WalletController;
use App\Http\Controllers\Api\TransactionController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
//route for creating a user
Route::post('/users', [UserController::class, 'store']);
//route for getting a user profile
Route::get('/users/{user}/profile', [UserController::class, 'show']);
//route for creating a wallet
Route::post('/users/{user}/wallets', [WalletController::class, 'store']);
//route for getting a wallet
Route::get('/wallets/{wallet}', [WalletController::class, 'show']);
//route for creating a transaction
Route::post('/wallets/{wallet}/transactions', [TransactionController::class, 'store']);
