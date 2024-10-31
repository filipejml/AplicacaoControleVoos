<?php

use App\Http\Controllers\FlightController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('flights', FlightController::class);

