<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

Route::get('/{any}', [LandingController::class, 'index'])->where('any','.*');