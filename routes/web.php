<?php

use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $appointments = App\Models\Appointment::whereDate('date', today())
        ->orderBy('time', 'asc')
        ->get();
    return view('welcome', compact('appointments'));
});

//appointments routs
Route::resource('appointments', AppointmentController::class);
