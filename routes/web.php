<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware'=>'auth'], function()
{

	Route::get('/', 'App\Http\Controllers\InquiryController@index')->name('content.index');
	Route::post('/entry', 'App\Http\Controllers\InquiryController@entry')->name('content.entry');

	Route::get('logout', function()
	{
		Auth::logout();
		return redirect() -> to('/');
	});
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
