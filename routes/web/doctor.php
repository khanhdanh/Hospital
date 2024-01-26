<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;

Route::middleware(['auth', 'role:super-admin'])->group(function () {
    Route::resource('admin/doctor', 'DoctorController');
    Route::get('/view/doctors', [DoctorController::class, 'index'])->name('doctor.view');
    Route::post('/store/doctor', [DoctorController::class, 'store'])->name('doctor.store');
    Route::patch('/update/doctor/{doctor}', [DoctorController::class, 'update'])->name('doctor.update');
    Route::delete('/delete/doctor/{doctor}', [DoctorController::class, 'delete'])->name('doctor.delete');
});
