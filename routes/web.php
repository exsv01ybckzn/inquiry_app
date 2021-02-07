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

Route::get('/', 'App\Http\Controllers\InquiryController@index')->name('content.index');
Route::post('/confirm', 'App\Http\Controllers\InquiryController@confirm')->name('content.confirm');
Route::post('/send', 'App\Http\Controllers\InquiryController@send')->name('content.send');

