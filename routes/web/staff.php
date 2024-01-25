<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;

Route::middleware(['auth', 'role:super-admin'])->group(function () {

    Route::get('/admin/staffs', [StaffController::class, 'index'])->name('staffs.view');
	Route::post('/admin/staffs/store', 'StaffController@store')->name('staffs.store');
	Route::post('/admin/staffs/store/validate', 'StaffController@storeValidate')->name('staffs.store.validate');
	Route::patch('/admin/staffs/{staff}/update', 'StaffController@update')->name('staffs.update');
	Route::delete('/admin/staffs/{staff}/delete', 'StaffController@delete')->name('staffs.delete');
});
