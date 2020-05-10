<?php

Route::get('/', function () {
    return view('welcome');
});



/*
 * üye işlemleri
 */
Route::get('/giris', 'MainController@login')->name('giris');
Route::post('/giris', 'MainController@login_post');

Route::get('/sifremi-unuttum', 'MainController@reset_pass')->name('sifremi-unuttum');
Route::post('/sifremi-unuttum', 'MainController@reset_pass_post');

Route::get('/sifre-yenile', 'MainController@rewrite_pass')->name('sifre-yenile');
Route::post('/sifre-yenile', 'MainController@rewrite_pass_post');

Route::get('/cikis', 'MainController@logout')->name('cikis');
/*
 * Üye işlemleri sonu
 */



Auth::routes();

Route::get('/anasayfa', 'HomeController@index')->name('home')->middleware('auth');

/*
 * Moderatör - Yönetici bilgileri için alanlar
 */
Route::get('/profil-bilgileri', 'HomeController@profil_bilgileri')->middleware('auth');
Route::post('/profil-bilgileri', 'HomeController@profil_bilgileri_post')->middleware('auth');
Route::get('/sifre-guncelle', 'HomeController@sifre_guncelle')->middleware('auth');
Route::post('/sifre-guncelle', 'HomeController@sifre_guncelle_post')->middleware('auth');
/*
 * Moderatör - Yönetici bilgileri için alanlar sonu
 */
