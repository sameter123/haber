<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/urun/{urun}', 'MainController@urun');
Route::get('/calisma/{calisma}', 'MainController@calisma');
Route::get('/haber/{haber}', 'MainController@haber');

Route::get('/giris', 'MainController@login')->name('giris');
Route::get('/login', 'MainController@login');
Route::post('/giris', 'MainController@login_post');

Route::get('/sifremi-unuttum', 'MainController@reset_pass')->name('sifremi-unuttum');
Route::post('/sifremi-unuttum', 'MainController@reset_pass_post');

Route::get('/sifre-yenile', 'MainController@rewrite_pass')->name('sifre-yenile');
Route::post('/sifre-yenile', 'MainController@rewrite_pass_post');

Route::get('/cikis', 'MainController@logout')->name('cikis');



Auth::routes();

Route::post('/iletForm', 'HomeController@api_iletForm')->name('iletForm')->middleware('auth');

Route::get('/anasayfa', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/profil-bilgileri', 'HomeController@profil_bilgileri')->middleware('auth');
Route::post('/profil-bilgileri', 'HomeController@profil_bilgileri_post')->middleware('auth');
Route::get('/sifre-guncelle', 'HomeController@sifre_guncelle')->middleware('auth');
Route::post('/sifre-guncelle', 'HomeController@sifre_guncelle_post')->middleware('auth');

Route::get('/ayarlar', 'HomeController@ayarlar')->middleware('auth');
Route::post('/ayarlar', 'HomeController@ayarlar_post')->middleware('auth');

Route::get('/haberler', 'HomeController@haberler')->middleware('auth');
Route::get('/haber-ekle', 'HomeController@haber_ekle')->middleware('auth');
Route::post('/haber-ekle', 'HomeController@haber_ekle_post')->middleware('auth');
Route::get('/haber-duzenle/{ne}', 'HomeController@haber_duzenle')->middleware('auth');
Route::post('/haber-duzenle/{ne}', 'HomeController@haber_duzenle_post')->middleware('auth');

Route::get('/uyeler', 'HomeController@uyeler')->middleware('auth');
Route::get('/uye-ekle', 'HomeController@uye_ekle')->middleware('auth');
Route::post('/uye-ekle', 'HomeController@uye_ekle_post')->middleware('auth');
Route::get('/uye-duzenle/{ne}', 'HomeController@uye_duzenle')->middleware('auth');
Route::post('/uye-duzenle/{ne}', 'HomeController@uye_duzenle_post')->middleware('auth');

Route::get('/urunler', 'HomeController@urunler')->middleware('auth');
Route::get('/urun-ekle', 'HomeController@urun_ekle')->middleware('auth');
Route::post('/urun-ekle', 'HomeController@urun_ekle_post')->middleware('auth');
Route::get('/urun-duzenle/{ne}', 'HomeController@urun_duzenle')->middleware('auth');
Route::post('/urun-duzenle/{ne}', 'HomeController@urun_duzenle_post')->middleware('auth');

Route::get('/projeler', 'HomeController@projeler')->middleware('auth');
Route::get('/proje-ekle', 'HomeController@proje_ekle')->middleware('auth');
Route::post('/proje-ekle', 'HomeController@proje_ekle_post')->middleware('auth');
Route::get('/proje-duzenle/{ne}', 'HomeController@proje_duzenle')->middleware('auth');
Route::post('/proje-duzenle/{ne}', 'HomeController@proje_duzenle_post')->middleware('auth');

Route::get('/slider', 'HomeController@slider')->middleware('auth');
Route::get('/slider-ekle', 'HomeController@slider_ekle')->middleware('auth');
Route::post('/slider-ekle', 'HomeController@slider_ekle_post')->middleware('auth');
Route::get('/slider-duzenle/{ne}', 'HomeController@slider_duzenle')->middleware('auth');
Route::post('/slider-duzenle/{ne}', 'HomeController@slider_duzenle_post')->middleware('auth');

Route::get('/hakkimizda-yonetim', 'HomeController@hakkimizda_yonetim')->middleware('auth');
Route::post('/hakkimizda-yonetim', 'HomeController@hakkimizda_yonetim_post')->middleware('auth');
