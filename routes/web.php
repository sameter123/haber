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


Route::group(['prefix' => '/admin'], function() {
    /*
     * Site Anasayfa
     */
    Route::get('/panel', 'AdminController@index')->middleware('auth');
    Route::get('/', 'AdminController@index');
    Route::get('/anasayfa', 'AdminController@index');

    /*
     * Site Ayarları
     */
    Route::get('/ayarlar', 'AdminController@settings');
    Route::post('/ayarlar', 'AdminController@settings_post');

    /*
     * Üyelik işlemleri
     */
    Route::get('/uye-ekle', 'AdminController@uyekayit');
    Route::post('/uye-ekle', 'AdminController@uyekayit_post');
    Route::get('/uye-listesi', 'AdminController@uyelistesi');
    Route::get('/uye-duzenle/{ne}', 'AdminController@uye_duzenle');
    Route::post('/uye-duzenle/{ne}', 'AdminController@uye_duzenle_post');

    Route::get('/hesap-ayarlari', 'AdminController@hesap_ayarlari');
    Route::post('/hesap-ayarlari', 'AdminController@hesap_ayarlari_post');
    Route::get('/cikis', 'LoginController@logout')->middleware('auth');

    /*
     * Kategori İşlemleri
     */
    Route::get('/kategoriler', 'AdminController@kategoriler');
    Route::get('/kategori-ekle', 'AdminController@kategori_ekle');
    Route::post('/kategori-ekle', 'AdminController@kategori_ekle_post');
    Route::get('/kategori-duzenle/{ne}', 'AdminController@kategori_duzenle');
    Route::post('/kategori-duzenle/{ne}', 'AdminController@kategori_duzenle_post');

    /*
    * Haber İşlemleri
    */
    Route::get('/haberler', 'AdminController@haberler');
    Route::get('/haber-ekle', 'AdminController@haber_ekle');
    Route::post('/haber-ekle', 'AdminController@haber_ekle_post');
    Route::get('/haber-duzenle/{ne}', 'AdminController@haber_duzenle');
    Route::post('/haber-duzenle/{ne}', 'AdminController@haber_duzenle_post');

    /*
    * Yorum İşlemleri
    */

    Route::get('/yorumlar', 'AdminController@yorumlar');
    Route::get('/yorum-duzenle/{ne}', 'AdminController@yorum_duzenle');
    Route::post('/yorum-duzenle/{ne}', 'AdminController@yorum_duzenle_post');

    /*
    * Sayfa İşlemleri
    */

    Route::get('/sayfalar', 'AdminController@sayfalar');
    Route::get('/sayfa-duzenle{ne}', 'AdminController@sayfa_duzenle');
    Route::get('/sayfa-duzenle{ne}', 'AdminController@sayfa_duzenle_post');

});
