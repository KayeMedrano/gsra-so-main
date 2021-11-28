<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('welcome');
});

Route::get('forgotpassword', function () {
	return view('forgotpassword');
});
Route::resource('reports', 'soController');
Route::resource('forgotpassword', 'ForgotPasswordController');

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::get('home', 'App\Http\Controllers\ChartController@index')->name('chart.index');
Route::get('reports', 'App\Http\Controllers\soController@index');
Route::get('reports', 'App\Http\Controllers\soController@report');

Route::get('/sa_settings', 'App\Http\Controllers\UserController@edit')->name('sa_settings.edit');
Route::post('/sa_settings', 'App\Http\Controllers\Usercontroller@update_img')->name('sa_settings.update_img');
Route::get('/sa_settings', 'App\Http\Controllers\UserController@updateprof')->name('sa_settings.updateprof');
Route::post('/sa_settings', 'App\Http\Controllers\UserController@update')->name('sa_settings.update');
Route::get('/report/id/{AccountID}', 'App\Http\Controllers\soController@show');

Route::get('/so_password', 'App\Http\Controllers\soController@edit')->name('so_password.edit');
Route::post('/so_password', 'App\Http\Controllers\soController@update')->name('so_password.update');
Route::post('/sp_password', 'App\Http\Controllers\spController@update')->name('sp_password.update');
Route::get('/sp_password', 'App\Http\Controllers\spController@edit')->name('sp_password.edit');

Route::post('update/forgotpassword', [App\Http\Controllers\ForgotPasswordController::class, 'update'])->name('forgotpassword');
Route::get('edit/forgotpassword', [App\Http\Controllers\ForgotPasswordController::class, 'edit'])->name('forgotpassword');

Route::get('/home', [App\Http\Controllers\ChartController::class, 'charts'])->name('home');
