<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;

Route::middleware(['auth', 'role:super-admin'])->group(function () {

    Route::get('/view/staffs', [StaffController::class, 'index'])->name('staffs.view');
    Route::post('/store/staffs', [StaffController::class, 'store'])->name('staffs.store');
    Route::patch('/update/staffs/{staffs}', [StaffController::class, 'update'])->name('staffs.update');
    Route::delete('/delete/staffs/{staffs}', [StaffController::class, 'delete'])->name('staffs.delete');
});
