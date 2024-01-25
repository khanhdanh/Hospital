<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;

Route::middleware(['auth', 'role:super-admin'])->group(function () {

    Route::get('/view/staffs', [StaffController::class, 'index'])->name('staff.view');
    Route::post('/store/staffs', [StaffController::class, 'store'])->name('staff.store');
    Route::patch('/update/staffs/{staff}', [StaffController::class, 'update'])->name('staff.update');
    Route::delete('/delete/staffs/{staff}', [StaffController::class, 'delete'])->name('staff.delete');
});
