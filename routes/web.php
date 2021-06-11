<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingController;

Auth::routes();
Route::redirect('admin', 'login');

Route::get('/', [LandingController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');