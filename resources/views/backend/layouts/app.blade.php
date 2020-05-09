<?php
$settings = DB::table('settings')->first();
?>
<!DOCTYPE html>
<html class="loading" lang="tr" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Sizi iyi hissettirecek dijital çözümler için ifeelcode yanınızda.">
  <meta name="author" content="Universitev">
  <title>Hizmet Paneli | I Feel Code</title>
  <link rel="apple-touch-icon" href="{{asset('/public/app-assets/images/ico/apple-icon-120.png')}}">
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('/public/app-assets/images/ico/favicon.ico')}}">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{asset('/public/app-assets/css/vendors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/public/app-assets/vendors/css/extensions/toastr.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('/public/app-assets/css/app.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('/public/app-assets/css/core/menu/menu-types/vertical-compact-menu.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('/public/app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{asset('/public/app-assets/css/plugins/extensions/toastr.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('/public/assets/css/style.css')}}">
  @yield('css')
</head>
<body class="vertical-layout vertical-compact-menu 2-columns menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-compact-menu" data-col="2-columns">
  <!-- fixed-top-->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-dark bg-pink navbar-shadow navbar-brand-center">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="/anasayfa" target="_blank">
              <img class="brand-logo" alt="modern admin logo" src="{{asset('/public/app-assets/images/logo/logo.png')}}">
              <h3 class="brand-text">{{$settings->site_name}} Hizmet Paneli</h3>
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container content">
        <div class="collapse navbar-collapse" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left">
            <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
            <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
              <li class="nav-item">
                  <a class="nav-link" href="/" target="_blank">
                <span class="user-name text-bold-700">Site Anasayfası</span>
                  </a>
              </li>
          </ul>
          <ul class="nav navbar-nav float-right">
            <li class="dropdown dropdown-user nav-item">
              <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="mr-1">Merhaba,
                  <span class="user-name text-bold-700">{{Auth::user()->name}}</span>
                </span>
                <span class="avatar avatar-online">
                  <img src="{{asset('/public/img/'.$settings->logo)}}" alt="avatar"><i></i></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="/profil-bilgileri"><i class="la la-user"></i> Profil Bilgilerim</a>
                <a class="dropdown-item" href="/sifre-guncelle"><i class="la la-user-secret"></i> Şifre Değiştir</a>
                <a class="dropdown-item" href="/uyeler"><i class="ft ft-users"></i> Üyeler</a>
                <div class="dropdown-divider"></div><a class="dropdown-item" href="/cikis"><i class="ft-power"></i> Çıkış Yap</a>
              </div>
            </li>
              <li class="nav-item" data-toggle="modal" data-target="#iletForm">
                  <a class="nav-link btn btn-sm btn-danger">
                      <span class="user-name text-bold-700">Hata Bildir</span>
                  </a>
              </li>
            <li class="dropdown dropdown-notification nav-item">
              <a class="nav-link nav-link-label" href="#bildirim" data-toggle="dropdown"><i class="ficon ft-bell"></i>
                <span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow">0</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                <li class="dropdown-menu-header">
                  <h6 class="dropdown-header m-0">
                    <span class="grey darken-2">Bildirimler</span>
                  </h6>
                  <span class="notification-tag badge badge-default badge-danger float-right m-0">0 bildirim</span>
                </li>
                <li class="scrollable-container media-list w-100"></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <!-- Modal -->
  <div class="modal fade text-left" id="iletForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34"
       aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h3 class="modal-title" id="myModalLabel34">Modal Title</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form method="post" action="{{ route('iletForm') }}">
                  @csrf
                  <div class="modal-body">
                      <label>Başlık: </label>
                      <div class="form-group position-relative has-icon-left">
                          <input type="text" placeholder="Başlık" class="form-control" name="baslik">
                          <div class="form-control-position">
                              <i class="la la-info-circle font-medium-5 line-height-1 text-muted icon-align"></i>
                          </div>
                      </div>
                      <label>Mesajınız: </label>
                      <div class="form-group position-relative has-icon-left">
                          <textarea placeholder="Mesaj" class="form-control" name="aciklama"></textarea>
                          <div class="form-control-position">
                              <i class="la la-info-circle font-medium-5 line-height-1 text-muted icon-align"></i>
                          </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
                             value="Kapat">
                      <input type="submit" class="btn btn-outline-pink btn-lg" value="Gönder">
                  </div>
              </form>
          </div>
      </div>
  </div>


  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow menu-dark" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" style="margin-top: 1em;">
        <li class=" nav-item"><a href="/anasayfa"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">Anasayfa</span></a>
        </li>
        <li class=" nav-item"><a href="#"><i class="ft ft-package"></i><span class="menu-title" data-i18n="nav.modul.main">Modüller</span></a>
              <ul class="menu-content">
                  <li class=" nav-item"><a href="#"><span class="menu-title" data-i18n="nav.modul.haber.main">Haber Yönetimi</span></a>
                      <ul class="menu-content">
                          <li>
                              <a class="menu-item" href="/haberler" data-i18n="nav.modul.haber.haberler">Haberler</a>
                          </li>
                          <li>
                              <a class="menu-item" href="/haber-ekle" data-i18n="nav.modul.haber.haber-ekle">Haber Ekle</a>
                          </li>
                      </ul>
                  </li>
                  <li class=" nav-item"><a href="#"><span class="menu-title" data-i18n="nav.modul.uyeler.main">Üye Yönetimi</span></a>
                      <ul class="menu-content">
                          <li>
                              <a class="menu-item" href="/uyeler" data-i18n="nav.modul.uyeler.uyeler">Üyeler</a>
                          </li>
                          <li>
                              <a class="menu-item" href="/uye-ekle" data-i18n="nav.modul.uyeler.uye-ekle">Üye Ekle</a>
                          </li>
                      </ul>
                  </li>
                  <li class=" nav-item"><a href="#"><span class="menu-title" data-i18n="nav.modul.urunler.main">Ürün Yönetimi</span></a>
                      <ul class="menu-content">
                          <li>
                              <a class="menu-item" href="/urunler" data-i18n="nav.modul.urunler.urunler">Ürünler</a>
                          </li>
                          <li>
                              <a class="menu-item" href="/urun-ekle" data-i18n="nav.modul.urunler.urun-ekle">Ürün Ekle</a>
                          </li>
                      </ul>
                  </li>
                  <li class=" nav-item"><a href="#"><span class="menu-title" data-i18n="nav.modul.projeler.main">Çalışmalar Yönetimi</span></a>
                      <ul class="menu-content">
                          <li>
                              <a class="menu-item" href="/projeler" data-i18n="nav.modul.projeler.projeler">Projeler</a>
                          </li>
                          <li>
                              <a class="menu-item" href="/proje-ekle" data-i18n="nav.modul.projeler.proje-ekle">Proje Ekle</a>
                          </li>
                      </ul>
                  </li>
                  <li class=" nav-item"><a href="#"><span class="menu-title" data-i18n="nav.modul.slider.main">Slider Yönetimi</span></a>
                      <ul class="menu-content">
                          <li>
                              <a class="menu-item" href="/slider" data-i18n="nav.modul.slider.slider">Sliderlar</a>
                          </li>
                          <li>
                              <a class="menu-item" href="/slider-ekle" data-i18n="nav.modul.slider.slider-ekle">Slider Ekle</a>
                          </li>
                      </ul>
                  </li>
                  <li class=" nav-item"><a href="#"><span class="menu-title" data-i18n="nav.modul.hakkimizda.main">Hakkımızda Yönetimi</span></a>
                      <ul class="menu-content">
                          <li>
                              <a class="menu-item" href="/hakkimizda-yonetim" data-i18n="nav.modul.hakkimizda.hakkimizda-yonetim">Hakkımızda</a>
                          </li>
                      </ul>
                  </li>
              </ul>
        </li>
          <li class=" nav-item"><a href="/ayarlar"><i class="la la-cogs"></i><span class="menu-title" data-i18n="nav.ayarlar.main"> Ayarlar</span></a>
          </li>
        <li class=" nav-item"><a href="#"><i class="ft ft-user"></i><span class="menu-title" data-i18n="nav.hesap.main">Hesap</span></a>
          <ul class="menu-content">
            <li>
              <a class="menu-item" href="/profil-bilgileri" data-i18n="nav.hesap.profil-bilgileri">Profil Bilgileri</a>
            </li>
            <li>
              <a class="menu-item" href="/sifre-guncelle" data-i18n="nav.hesap.sifre-guncelle">Şifre Değiştir</a>
            </li>
          </ul>
        </li>

          <li class=" nav-item" id="sms"><a href="javascript:void(0);"><i class="la la-comments-o"></i><span class="menu-title"> Sms Servisi</span></a>
          </li>
          <button type="button" id="sms-mesaj" style="display: none;"></button>

          <li class=" nav-item" id="onmuhasebe"><a href="javascript:void(0);"><i class="la la-calculator"></i><span class="menu-title"> Ön Muhasebe</span></a>
          </li>
          <button type="button" id="onmuhasebe-mesaj" style="display: none;"></button>

          <li class=" nav-item" id="sosyalmedyabotu"><a href="javascript:void(0);"><i class="la la-share-alt-square"></i><span class="menu-title"> Sosyal Medya</span></a>
          </li>
          <button type="button" id="sosyalmedyabotu-mesaj" style="display: none;"></button>
      </ul>
    </div>
  </div>
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
@yield('content')
 </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <footer class="footer footer-static footer-dark navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">&copy; {{date('Y')}} bütün hakları saklıdır | <a class="text-bold-800 grey darken-2" href="{{$settings->author_link}}"
        target="_blank">{{$settings->author_name}}</a></span>
      <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Sevgi ve aşkla <i class="ft-heart pink"></i> yapıyoruz.</span>
    </p>
  </footer>
  <!-- BEGIN VENDOR JS-->
  <script src="{{asset('/public/app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('/public/app-assets/vendors/js/extensions/toastr.min.js')}}" type="text/javascript"></script>
  <!-- BEGIN MODERN JS-->
  <script src="{{asset('/public/app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
  <script src="{{asset('/public/app-assets/js/core/app.js')}}" type="text/javascript"></script>
  <script src="{{asset('/public/app-assets/js/scripts/customizer.js')}}" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <script src="{{asset('/public/app-assets/js/scripts/extensions/toastr.js')}}" type="text/javascript"></script>
  <script>
      $( "#sms" ).click(function() {
          $( "#sms-mesaj" ).click();
      });

      $( "#onmuhasebe" ).click(function() {
          $( "#onmuhasebe-mesaj" ).click();
      });

      $( "#sosyalmedyabotu" ).click(function() {
          $( "#sosyalmedyabotu-mesaj" ).click();
      });
  </script>

  @if (session('success_form'))
      <button type="button" id="formOk" style="display: none;"></button>
      <script>
          $(document).ready(function(){
              $("#formOk").trigger('click');
          });
      </script>
  @endif

  @if (session('error_form'))
      <button type="button" id="formNotOk" style="display: none;"></button>
      <script>
          $(document).ready(function(){
              $("#formNotOk").trigger('click');
          });
      </script>
  @endif
@yield('js')
</body>
</html>
