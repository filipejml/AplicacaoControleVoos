<?php

use App\Http\Controllers\FlightController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('flights', FlightController::class);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/', [FlightController::class, 'welcome'])->name('home');
