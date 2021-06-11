<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

Route::middleware(['auth:sanctum', 'isAdmin'])->group(function() {
    Route::get('/user', function() {
        return "Logged";
    });
}); 

Route::post('login', [UserController::class, 'login']);
Route::post('register',[UserController::class, 'register']);