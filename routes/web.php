<?php

use Illuminate\Support\Facades\Auth;
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



Route::get('/giris', 'LoginController@login')->name('giris');
Route::post('/giris', 'LoginController@login_post');
Route::get('/admin', 'MainController@get_home');


Auth::routes();

Route::get('/panel', 'AdminController@index')->middleware('auth');

