<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\OrderController;

Route::middleware(['auth:sanctum', 'isAdmin'])->group(function() {
    Route::apiResource('products', ProductController::class)->except('index','show');
    Route::apiResource('users', UserController::class)->except('store');
    Route::apiResource('orders', OrderController::class)->only('store');

    Route::get('me', [UserController::class,'me']);
}); 

// Auth routes
Route::post('login', [UserController::class, 'login']);
Route::post('register',[UserController::class, 'register']);

// Product path
Route::get('products', [ProductController::class, 'index']);
Route::get('products/{product:slug}', [ProductController::class, 'show']);