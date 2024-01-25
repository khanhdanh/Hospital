
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;

Route::middleware(['auth', 'role:super-admin'])->group(function() {
    Route::resource('admin/service', 'ServiceController');
	Route::get('/admin/services', [ServiceController::class, 'index'])->name('service.view');
	Route::post('/admin/service/store', 'ServiceController@store')->name('service.store');
	Route::post('/admin/service/store/validate', 'ServiceController@storeValidate')->name('service.store.validate');
	Route::patch('/admin/service/{service}/update', 'ServiceController@update')->name('service.update');
	Route::delete('/admin/service/{service}/delete', 'ServiceController@delete')->name('service.delete');

});
