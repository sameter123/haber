<?php
$settings = DB::table('settings')->first();
?>
    <!DOCTYPE html>
<html class="loading" lang="tr" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="{{$settings->site_description}}">
    <meta name="author" content="I Feel Code">
    <title>{{$settings->site_name}}</title>
    <link rel="apple-touch-icon" href="{{asset('public/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('public/app-assets/vendors/css/extensions/tether-theme-arrows.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/vendors/css/extensions/tether.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('public/app-assets/vendors/css/extensions/shepherd-theme-default.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{asset('public/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/pages/dashboard-analytics.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/pages/card-analytics.css')}}">
    <!-- END: Page CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/assets/css/style.css')}}">
    <!-- END: Custom CSS-->
    @yield('css')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern dark-layout 2-columns  navbar-floating footer-static  "
      data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="dark-layout">

<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-dark navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a
                                class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                    class="ficon feather icon-menu"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav bookmark-icons">
                        <!-- li.nav-item.mobile-menu.d-xl-none.mr-auto-->
                        <!--   a.nav-link.nav-menu-main.menu-toggle.hidden-xs(href='#')-->
                        <!--     i.ficon.feather.icon-menu-->
                        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="/admin"
                                                                  data-toggle="tooltip" data-placement="top"
                                                                  title="Anasayfa"><i
                                    class="ficon feather icon-home"></i></a></li>
                        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="/admin/yorumlar"
                                                                  data-toggle="tooltip" data-placement="top"
                                                                  title="Yorumlar"><i
                                    class="ficon feather icon-message-square"></i></a></li>
                    </ul>
                </div>
                <ul class="nav navbar-nav float-right">
                    <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i
                                class="ficon feather icon-maximize"></i></a></li>
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">{{Auth::user()->name}} {{Auth::user()->last_name}}</span><span
                                    class="user-status">Çevrimiçi</span></div>
                            @if(Auth::user()->avatar != '')
                            <span><img class="round" src="{{asset('/public/img/'.Auth::user()->avatar)}}" alt={{Auth::user()->name}} avatarı" height="40" width="40"></span>
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="/admin/hesap-ayarlari">
                                <i class="feather icon-user"></i> Hesap Ayarları
                            </a>
                            <a class="dropdown-item" href="/admin/yorumlar">
                                <i class="fa fa-comment"></i> Yorumlar
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/admin/cikis">
                                <i class="feather icon-power"></i> Çıkış
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="/admin/">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">{{$settings->site_name}}</h2>
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                    <i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i>
                    <i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            @if(Auth::user()->izin==1 or Auth::user()->izin==3 or Auth::user()->izin==2)
                <li class=" nav-item">
                    <a href="/haber/admin">
                        <i class="feather icon-home"></i>
                        <span class="menu-title" data-i18n="Anasayfa">Anasayfa</span>
                    </a>
                </li>
            @endif
            @if(Auth::user()->izin==1)
                <li class=" nav-item">
                    <a href="#">
                        <i class="feather icon-settings"></i>
                        <span class="menu-title" data-i18n="Ayarlar">Ayarlar</span>
                    </a>
                    <ul class="menu-content">
                        <li>
                            <a href="/haber/admin/ayarlar">
                                <i class="feather icon-circle"></i>
                                <span class="menu-item" data-i18n="Ayarlar">Site Ayarları</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item">
                    <a href="#"><i class="feather icon-user"></i>
                        <span class="menu-title" data-i18n="User">Üye İşlemleri</span>
                    </a>
                    <ul class="menu-content">
                        <li><a href="/haber/admin/uye-ekle"><i class="feather icon-user-plus"></i>
                                <span class="menu-item" data-i18n="List">Üye Ekle</span></a>
                        </li>
                        <li>
                            <a href="/haber/admin/uye-listesi">
                                <i class="feather icon-users"></i>
                                <span class="menu-item" data-i18n="List">Üye Listeleme</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
            @if(Auth::user()->izin==1 or Auth::user()->izin==3)
                <li class=" nav-item">
                    <a href="#">
                        <i class="feather icon-edit"></i>
                        <span class="menu-title" data-i18n="User">Haberler</span>
                    </a>
                    <ul class="menu-content">
                        <li>
                            <a href="/haber/admin/haber-ekle">
                                <i class="feather icon-edit-2"></i>
                                <span class="menu-item" data-i18n="List">Haber Ekle</span>
                            </a>
                        </li>
                        <li>
                            <a href="/haber/admin/haberler">
                                <i class="feather icon-file-text"></i>
                                <span class="menu-item" data-i18n="List">Haberler</span>
                            </a>
                        </li>

                    </ul>
                </li>
            @endif
            @if(Auth::user()->izin==1 or Auth::user()->izin==2)
               <li class=" nav-item">
                   <a href="/haber/admin/yorumlar">
                       <i class="fa fa-comments"></i>
                       <span class="menu-title" data-i18n="Email">Yorumlar</span>
                   </a>
               </li>
            @endif
            @if(Auth::user()->izin==1)
            <li class=" nav-item"><a href="/haber/admin/sayfalar">
                    <i class="feather icon-file"></i>
                    <span class="menu-title" data-i18n="Email">Sayfalar</span>
                </a>
            </li>
            <li class=" nav-item">
                <a href="#">
                    <i class="feather icon-list"></i>
                    <span class="menu-title" data-i18n="User">Kategori Yönetimi</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a href="/haber/admin/kategori-ekle">
                            <i class="fa fa-plus"></i>
                            <span class="menu-item" data-i18n="List">Kategori Ekle</span>
                        </a>
                    </li>
                    <li>
                        <a href="/haber/admin/kategoriler">
                            <i class="fa fa-list-alt"></i>
                            <span class="menu-item" data-i18n="List">Kategoriler</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endif
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
@yield('content')
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; {{date('Y')}} |
            <a class="text-bold-800 grey darken-2" href="https://ifeelcode.com" target="_blank">Ifeelcode,</a>
            <a class="text-bold-800 grey darken-2" href="https://eleganzaajans.com.com" target="_blank">Eleganza Ajans,</a>
            All rights Reserved</span><span
            class="float-md-right d-none d-md-block">El emeği, Göz nuru <i
                class="feather icon-heart pink"></i></span>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
    </p>
</footer>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="{{asset('public/app-assets/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('public/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
<script src="{{asset('public/app-assets/vendors/js/extensions/tether.min.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('public/app-assets/js/core/app-menu.js')}}"></script>
<script src="{{asset('public/app-assets/js/core/app.js')}}"></script>
<script src="{{asset('public/app-assets/js/scripts/components.js')}}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{asset('public/app-assets/js/scripts/pages/dashboard-analytics.js')}}"></script>
<!-- END: Page JS-->
@yield('js')
</body>
<!-- END: Body-->

</html>
