<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// Rute default mengarah ke halaman welcome bawaan Laravel
Route::get('/', function () {
    return view('welcome');
});

// Rute untuk halaman UTS kamu (Dashboard IoT)
Route::get('/dashboard', [DashboardController::class, 'index']);