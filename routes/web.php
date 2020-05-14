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

Route::get('/', 'MainController@index');

Route::get('/giris', 'LoginController@login')->name('giris');
Route::post('/giris', 'LoginController@login_post');
Route::get('/kayit-ol', 'LoginController@register')->name('kayit-ol');
Route::post('/kayit-ol', 'LoginController@register_post');


Auth::routes();
Route::get('/panel', 'AdminController@index')->middleware('auth');
Route::get('/cikis', 'LoginController@logout')->middleware('auth');
Route::group(['prefix' => '/admin'], function() {
    Route::get('/', 'AdminController@index');
    Route::get('/anasayfa', 'AdminController@index');
    Route::get('/ayarlar', 'AdminController@settings');
    Route::post('/ayarlar', 'AdminController@settings_post');
    Route::get('/uye-ekle', 'AdminController@uyekayit');
    Route::post('/uye-ekle', 'AdminController@uyekayit_post');

});

