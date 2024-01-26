<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


/****    APPOINTMENT SECTION   ****/
Route::resource('appointment', 'AppointmentController');
Route::get('admin/appointment/list', [AdminController::class, 'list'])->name('admin.list');
Route::get('/admin/appointments', [AppointmentController::class, 'index'])->name('appointment.view');
Route::post('admin/appointment/store', 'AppointmentController@store')->name('appointment.store');
