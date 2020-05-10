<?php
$settings = DB::table('settings')->first();
header('Access-Control-Allow-Origin: *');
?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <title>{{$settings->site_name}}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="{{$settings->description}}" name="description">
    <meta name="robots" content="@if($settings->robots == '1')index follow @else noindex nofollow @endif">
    <meta name="googlebot" content="@if($settings->robots == '1')index follow @else noindex nofollow @endif">
    <link rel="icon" href="public/img/{{$settings->favicon}}">
    <link href="public/img/{{$settings->favicon}}" rel="apple-touch-icon">
    {{$settings->meta}}
    <script async src="https://www.googletagmanager.com/gtag/js?id={{$settings->analytics}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{$settings->analytics}}');
    </script>
    <?php
        date_default_timezone_set('Europe/Istanbul');
        class Detect
        {
            public static function systemInfo()
            {
                $user_agent = $_SERVER['HTTP_USER_AGENT'];
                $os_platform    = "Bilinmeyen İşletim sistemi";
                $os_array       = array(
                    '/windows nt 10/i'      =>  'Windows 10',
                    '/windows nt 6.3/i'     =>  'Windows 8.1',
                    '/windows phone 8/i'    =>  'Windows Phone 8',
                    '/windows phone os 7/i' =>  'Windows Phone 7',
                    '/windows nt 6.2/i'     =>  'Windows 8',
                    '/windows nt 6.1/i'     =>  'Windows 7',
                    '/windows nt 6.0/i'     =>  'Windows Vista',
                    '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                    '/windows nt 5.1/i'     =>  'Windows XP',
                    '/windows xp/i'         =>  'Windows XP',
                    '/windows nt 5.0/i'     =>  'Windows 2000',
                    '/windows me/i'         =>  'Windows ME',
                    '/win98/i'              =>  'Windows 98',
                    '/win95/i'              =>  'Windows 95',
                    '/win16/i'              =>  'Windows 3.11',
                    '/macintosh|mac os x/i' =>  'Mac OS X',
                    '/mac_powerpc/i'        =>  'Mac OS 9',
                    '/linux/i'              =>  'Linux',
                    '/ubuntu/i'             =>  'Ubuntu',
                    '/iphone/i'             =>  'iPhone',
                    '/ipod/i'               =>  'iPod',
                    '/ipad/i'               =>  'iPad',
                    '/android/i'            =>  'Android',
                    '/blackberry/i'         =>  'BlackBerry',
                    '/webos/i'              =>  'Mobile');
                $found = false;
                $device = '';
                foreach ($os_array as $regex => $value)
                {
                    if($found)
                        break;
                    else if (preg_match($regex, $user_agent))
                    {
                        $os_platform    =   $value;
                        $device = !preg_match('/(windows|mac|linux|ubuntu)/i',$os_platform)
                            ?'MOBILE':(preg_match('/phone/i', $os_platform)?'MOBILE':'SYSTEM');
                    }
                }
                $device = !$device? 'SYSTEM':$device;
                return array('os'=>$os_platform,'device'=>$device);
            }

            public static function browser()
            {
                $user_agent = $_SERVER['HTTP_USER_AGENT'];

                $browser        =   "Bilinmeyen tarayıcı";

                $browser_array  = array('/msie/i'       =>  'Internet Explorer',
                    '/firefox/i'    =>  'Firefox',
                    '/safari/i'     =>  'Safari',
                    '/chrome/i'     =>  'Chrome',
                    '/opera/i'      =>  'Opera',
                    '/netscape/i'   =>  'Netscape',
                    '/maxthon/i'    =>  'Maxthon',
                    '/konqueror/i'  =>  'Konqueror',
                    '/mobile/i'     =>  'Handheld Browser');
                $found = false;
                foreach ($browser_array as $regex => $value)
                {
                    if($found)
                        break;
                    else if (preg_match($regex, $user_agent,$result))
                    {
                        $browser    =   $value;
                    }
                }
                return $browser;
            }
        }
        $system = Detect::systemInfo();
        $browser = Detect::browser();
        $ip = Request::ip();
        $page = Request::path();
        if($page == '/') {
            $page = 'anasayfa';
        }
        $kontrol = DB::table('istatistik')->where('ip', $ip)->whereDay('date', date('d'))->count();
        if($kontrol > 0) {
            DB::table('istatistik')->insert([
                'ip' => $ip,
                'date' => date('YmdHis'),
                'page' => $page,
                'device' => $system['os'],
                'browser' => $browser,
                'ms' => $system['device'],
                'tekil' => 0
            ]);
        } else {
            DB::table('istatistik')->insert([
                'ip' => $ip,
                'date' => date('YmdHis'),
                'page' => $page,
                'device' => $system['os'],
                'browser' => $browser,
                'ms' => $system['device'],
                'tekil' => 1
            ]);
        }
    ?>
    <!-- jquery ui css -->
    <link href="{{asset('public/frontend/css/jquery-ui.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap -->
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <!--Animate css-->
    <link href="{{asset('public/frontend/css/animate.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Navigation css-->
    <link href="{{asset('public/frontend/bootsnav/css/bootsnav.css')}}" rel="stylesheet" type="text/css"/>
    <!-- youtube css -->
    <link href="{{asset('public/frontend/css/RYPP.css')}}" rel="stylesheet" type="text/css"/>
    <!-- font awesome -->
    <link href="{{asset('public/frontend/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- themify-icons -->
    <link href="{{asset('public/frontend/themify-icons/themify-icons.css')}}" rel="stylesheet" type="text/css"/>
    <!-- weather-icons -->
    <link href="{{asset('public/frontend/weather-icons/css/weather-icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- flat icon -->
    <link href="{{asset('public/frontend/css/flaticon.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Important Owl stylesheet -->
    <link href="{{asset('public/frontend/owl-carousel/owl.carousel.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Default Theme -->
    <link href="{{asset('public/frontend/owl-carousel/owl.theme.css')}}" rel="stylesheet" type="text/css"/>
    <!-- owl transitions -->
    <link href="{{asset('public/frontend/owl-carousel/owl.transitions.css')}}" rel="stylesheet" type="text/css"/>
    <!-- style css -->
    <link href=".{{asset('public/frontend/css/style.css')}}" rel="stylesheet" type="text/css"/>
    <!-- dark style css -->
    <link href="{{asset('public/frontend/css/skin/skin-dark.css')}}" rel="stylesheet" type="text/css"/>
    @yield('css')
</head>
<body class="home_seven boxed-layout skin-dark">
<!-- PAGE LOADER -->
<div class="se-pre-con"></div>
<!-- *** START PAGE HEADER SECTION *** -->
<header>
    <!-- START HEADER TOP SECTION -->
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6 col-sm-6 col-lg-6">
                    <!-- Start header social -->
                    <div class="header-social">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-vk"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li class="hidden-xs"><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                            <li class="hidden-xs"><a href="#"><i class="fa fa-vimeo"></i></a></li>
                        </ul>
                    </div>
                    <!-- End of /. header social -->
                    <!-- Start top left menu -->
                    <div class="top-left-menu">
                        <ul>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Donation</a></li>
                        </ul>
                    </div>
                    <!-- End of /. top left menu -->
                </div>
                <!-- Start header top right menu -->
                <div class="hidden-xs col-md-6 col-sm-6 col-lg-6">
                    <div class="header-right-menu">
                        <ul>
                            <li>Currency: <a href="#">USD</a></li>
                            <li>Wishlist: <a href="#">12</a></li>
                            <li> <a href="#"><i class="fa fa-lock"></i> Sign Up </a>or<a href="#">   Login</a></li>
                        </ul>
                    </div>
                </div> <!-- end of /. header top right menu -->
            </div> <!-- end of /. row -->
        </div> <!-- end of /. container -->
    </div>
    <!-- END OF /. HEADER TOP SECTION -->
    <!-- START MIDDLE SECTION -->
    <div class="header-mid hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo">
                        <a href="index.html"><img src="../assets/images/logo-white.png" class="img-responsive" alt=""></a>

                    </div>
                </div>
                <div class="col-sm-8">
                    <a href="#"><img src="../assets/images/add728x90-1.jpg" class="img-responsive" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF /. MIDDLE SECTION -->
    <!-- START NAVIGATION -->
    <nav class="navbar navbar-default navbar-sticky navbar-mobile bootsnav">
        <!-- Start Top Search -->
        <div class="top-search">
            <div class="container">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                </div>
            </div>
        </div>
        <!-- End Top Search -->
        <div class="container">
            <!-- Start Atribute Navigation -->
            <div class="attr-nav">
                <ul>
                    <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                </ul>
            </div>
            <!-- End Atribute Navigation -->
            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand hidden-sm hidden-md hidden-lg" href="#brand"><img src="../assets/images/logo-white.png" class="logo" alt=""></a>
            </div>
            <!-- End Header Navigation -->
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-left" data-in="" data-out="">
                    <li class="dropdown active">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Home</a>
                        <ul class="dropdown-menu">
                            <li><a href="index.html">Home – Layout 1</a></li>
                            <li class="active"><a href="index_2.html">Home – (Box) Layout 2</a></li>
                            <li><a href="index_3.html">Home – Layout 3</a></li>
                            <li><a href="index_4.html">Home – Layout 4</a></li>
                            <li><a href="index_5.html">Home – Layout 5</a></li>
                            <li><a href="index_6.html">Home – Layout 6</a></li>
                            <li><a href="index_7.html">Home – Layout 7</a></li>
                            <li><a href="index_8.html">Home – Layout 8</a></li>
                        </ul>
                    </li>
                    <li class="dropdown megamenu-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Megamenu</a>
                        <ul class="dropdown-menu megamenu-content" role="menu">
                            <li>
                                <div class="row">
                                    <div class="col-menu col-md-3">
                                        <h6 class="title">Accessories</h6>
                                        <div class="content">
                                            <ul class="menu-col">
                                                <li><a href="#">Beanies</a></li>
                                                <li><a href="#">Caps & Hats</a></li>
                                                <li><a href="#">Glasses</a></li>
                                                <li><a href="#">Gloves</a></li>
                                                <li><a href="#">Jewellery</a></li>
                                                <li><a href="#">Scarves</a></li>
                                            </ul>
                                        </div>
                                    </div><!-- end col-3 -->
                                    <div class="col-menu col-md-3">
                                        <h6 class="title">Sports</h6>
                                        <div class="content">
                                            <ul class="menu-col">
                                                <li><a href="#">Cricket</a></li>
                                                <li><a href="#">Football</a></li>
                                                <li><a href="#">Golf</a></li>
                                                <li><a href="#">Leggings</a></li>
                                                <li><a href="#">Cycling</a></li>
                                                <li><a href="#">Shorts</a></li>
                                            </ul>
                                        </div>
                                    </div><!-- end col-3 -->
                                    <div class="col-menu col-md-3">
                                        <h6 class="title">Tops</h6>
                                        <div class="content">
                                            <ul class="menu-col">
                                                <li><a href="#">Cardigans</a></li>
                                                <li><a href="#">Coats</a></li>
                                                <li><a href="#">Hoodies & Sweatshirts</a></li>
                                                <li><a href="#">Jumpers</a></li>
                                                <li><a href="#">Polo Shirts</a></li>
                                                <li><a href="#">Shirts</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-menu col-md-3">
                                        <h6 class="title">Accessories</h6>
                                        <div class="content">
                                            <ul class="menu-col">
                                                <li><a href="#">Olympic</a></li>
                                                <li><a href="#">Bomber jackets</a></li>
                                                <li><a href="#">Denim Jackets</a></li>
                                                <li><a href="#">Duffle Coats</a></li>
                                                <li><a href="#">Leather Jackets</a></li>
                                                <li><a href="#">Parkas</a></li>
                                            </ul>
                                        </div>
                                    </div><!-- end col-3 -->
                                </div><!-- end row -->
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown megamenu-fw hidden-xs">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Video</a>
                        <ul class="dropdown-menu megamenu-content" role="menu">
                            <li>
                                <div class="row m_0">
                                    <div class="col-menu-video col-md-3">
                                        <a class="video-nav-item" href="#">
                                            <div class="img-wrapper">
                                                <img src="../assets/images/gallery-235x160-1.jpg" alt="" class="img-responsive">
                                                <div class="link-icon">
                                                    <i class="ti-video-camera"></i>
                                                </div>
                                            </div>
                                            <h4>It is a long established fact that a reader will be. </h4>
                                        </a>
                                    </div><!-- end col-3 -->
                                    <div class="col-menu-video col-md-3">
                                        <a class="video-nav-item" href="#">
                                            <div class="img-wrapper">
                                                <img src="../assets/images/gallery-235x160-2.jpg" alt="" class="img-responsive">
                                                <div class="link-icon">
                                                    <i class="ti-video-camera"></i>
                                                </div>
                                            </div>
                                            <h4>It is a long established fact that a reader will be. </h4>
                                        </a>
                                    </div><!-- end col-3 -->
                                    <div class="col-menu-video col-md-3">
                                        <a class="video-nav-item" href="#">
                                            <div class="img-wrapper">
                                                <img src="../assets/images/gallery-235x160-3.jpg" alt="" class="img-responsive">
                                                <div class="link-icon">
                                                    <i class="ti-video-camera"></i>
                                                </div>
                                            </div>
                                            <h4>It is a long established fact that a reader will be. </h4>
                                        </a>
                                    </div>
                                    <div class="col-menu-video col-md-3">
                                        <a class="video-nav-item" href="#">
                                            <div class="img-wrapper">
                                                <img src="../assets/images/gallery-235x160-4.jpg" alt="" class="img-responsive">
                                                <div class="link-icon">
                                                    <i class="ti-video-camera"></i>
                                                </div>
                                            </div>
                                            <h4>It is a long established fact that a reader will be. </h4>
                                        </a>
                                    </div><!-- end col-3 -->
                                    <div class="col-menu-video col-md-3">
                                        <a class="video-nav-item" href="#">
                                            <div class="img-wrapper">
                                                <img src="../assets/images/gallery-235x160-5.jpg" alt="" class="img-responsive">
                                                <div class="link-icon">
                                                    <i class="ti-video-camera"></i>
                                                </div>
                                            </div>
                                            <h4>It is a long established fact that a reader will be. </h4>
                                        </a>
                                    </div><!-- end col-3 -->
                                </div><!-- end row -->
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Dropdowns</a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Custom Menu</a></li>
                            <li><a href="#">Custom Menu</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Sub Menu</a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Custom Menu</a></li>
                                    <li><a href="#">Custom Menu</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Sub Menu</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Custom Menu</a></li>
                                            <li><a href="#">Custom Menu</a></li>
                                            <li><a href="#">Custom Menu</a></li>
                                            <li><a href="#">Custom Menu</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Custom Menu</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Custom Menu</a></li>
                            <li><a href="#">Custom Menu</a></li>
                            <li><a href="#">Custom Menu</a></li>
                            <li><a href="#">Custom Menu</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Pages</a>
                        <ul class="dropdown-menu">
                            <li class="dropdown active">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Home</a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.html">Home – Layout 1</a></li>
                                    <li class="active"><a href="index_2.html">Home – (Box) Layout 2</a></li>
                                    <li><a href="index_3.html">Home – Layout 3</a></li>
                                    <li><a href="index_4.html">Home – Layout 4</a></li>
                                    <li><a href="index_5.html">Home – Layout 5</a></li>
                                    <li><a href="index_6.html">Home – Layout 6</a></li>
                                    <li><a href="index_7.html">Home – Layout 7</a></li>
                                    <li><a href="index_8.html">Home – Layout 8</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Category layout</a>
                                <ul class="dropdown-menu">
                                    <li><a href="category_style_1.html">Category - layout 1</a></li>
                                    <li><a href="category_style_2.html">Category - layout 2</a></li>
                                    <li><a href="category_style_3.html">Category - layout 3</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Post template</a>
                                <ul class="dropdown-menu">
                                    <li><a href="details_1.html">Post - layout 1</a></li>
                                    <li><a href="details_2.html">Post - layout 2</a></li>
                                    <li><a href="details_3.html">Post - layout 3</a></li>
                                </ul>
                            </li>
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="typography.html">Typography</a></li>
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="faq.html">F.A.Q</a></li>
                        </ul>
                    </li>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                    <li><a href="faq.html">F.A.Q</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>
    <!-- END OF/. NAVIGATION -->
</header>
<!-- *** END OF /. PAGE HEADER SECTION *** -->
<!-- *** START PAGE MAIN CONTENT *** -->
<main class="page_main_wrapper">
    @yield('content')
    </main>
<!-- *** END OF /. PAGE MAIN CONTENT *** -->
<!-- *** START FOOTER *** -->
<footer>
            <div class="container">
                <div class="row">
                    <!-- START FOOTER BOX (About) -->
                    <div class="col-sm-3 footer-box">
                        <div class="about-inner">
                            <img src="../assets/images/logo-white.png" class="img-responsive" alt=""/>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy </p>
                            <ul>
                                <li><i class="ti-location-arrow"></i>1234 Heaven Stress, Beverly Hill.</li>
                                <li><i class="ti-mobile"></i>(800) 123 456 789</li>
                                <li><i class="ti-email"></i>Contact@erentheme.com</li>
                            </ul>
                        </div>
                    </div>
                    <!--  END OF /. FOOTER BOX (About) -->
                    <!-- START FOOTER BOX (Twitter feeds) -->
                    <div class="col-sm-3 footer-box">
                        <div class="twitter-inner">
                            <h3 class="wiget-title">twitter feeds</h3>
                            <ul class="margin-top-60">
                                <li>Typi non habent claritatem insitam est usus legent is iis qui facit claritatem. Investigatione <a href="https://t.co/erenthemeGHTQ">https://t.co/erenthemeGHTQ</a>
                                    <span><i class="ti-twitter"></i>12 days ago</span>
                                </li>
                                <li>Typi non habent claritatem insitam est usus legent is <a href="https://t.co/erenthemeGHTQ">https://t.co/erenthemeGHTQ</a>
                                    <span><i class="ti-twitter"></i>10 days ago</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- END OF /. FOOTER BOX (Twitter feeds) -->
                    <!-- START FOOTER BOX (Category) -->
                    <div class="col-sm-2 footer-box">
                        <h3 class="wiget-title">Category</h3>
                        <ul class="menu-services">
                            <li><a href="#">Business</a></li>
                            <li><a href="#">LifeStyle</a></li>
                            <li><a href="#">Technology</a></li>
                            <li><a href="#">Culture</a></li>
                            <li><a href="#">Entertainment</a></li>
                        </ul>
                    </div>
                    <!-- END OF /. FOOTER BOX (Category) -->
                    <!-- START FOOTER BOX (Recent Post) -->
                    <div class="col-sm-4 footer-box">
                        <h3 class="wiget-title">Recent Post</h3>
                        <div class="footer-news-grid">
                            <div class="news-list-item">
                                <div class="img-wrapper">
                                    <a href="#" class="thumb">
                                        <img src="../assets/images/115x85-1.jpg" alt="" class="img-responsive">
                                        <div class="link-icon">
                                            <i class="fa fa-camera"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="post-info-2">
                                    <h5><a href="#" class="title">Cooking Recipes Anytime And Anywhere</a></h5>
                                    <ul class="authar-info">
                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="news-list-item">
                                <div class="img-wrapper">
                                    <a href="#" class="thumb">
                                        <img src="../assets/images/115x85-2.jpg" alt="" class="img-responsive">
                                        <div class="link-icon">
                                            <i class="fa fa-camera"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="post-info-2">
                                    <h5><a href="#" class="title">Cooking Recipes Anytime And Anywhere</a></h5>
                                    <ul class="authar-info">
                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END OF /. FOOTER BOX (Recent Post) -->
                </div>
            </div>
        </footer>
<!-- *** END OF /. FOOTER *** -->
<!-- *** START SUB FOOTER *** -->
<div class="sub-footer">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-5 col-md-5">
                        <div class="copy">Copyright@2017 I-News Inc.</div>
                    </div>
                    <div class="col-xs-12 col-sm-7 col-md-7">
                        <ul class="footer-nav">
                            <li><a href="#">Privacy</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Donation</a></li>
                            <li><a href="#">F.A.Q</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
<!-- *** END OF /. SUB FOOTER *** -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('public/frontend/js/jquery.min.js')}}" type="text/javascript"></script>
<!-- jquery ui js -->
<script src="{{asset('public/frontend/js/jquery-ui.min.js')}}" type="text/javascript"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('public/frontend/js/bootstrap.min.js')}}" type="text/javascript"></script>
<!-- Bootsnav js -->
<script src="{{asset('public/frontend/bootsnav/js/bootsnav.js')}}" type="text/javascript"></script>
<!-- theia sticky sidebar -->
<script src="{{asset('public/frontend/js/theia-sticky-sidebar.js')}}" type="text/javascript"></script>
<!-- Skycons js -->
<script src="{{asset('public/frontend/js/skycons.js')}}" type="text/javascript"></script>
<!-- youtube js -->
<script src="{{asset('public/frontend/js/RYPP.js')}}" type="text/javascript"></script>
<!-- owl include js plugin -->
<script src="{{asset('public/frontend/owl-carousel/owl.carousel.min.js')}}" type="text/javascript"></script>
<!-- custom js -->
<script src="{{asset('public/frontend/js/custom.js')}}" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        //Skyicon
        var icons = new Skycons({"color": "#fff"}),
            list = [
                "clear-day", "clear-night", "partly-cloudy-day",
                "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                "fog"
            ],
            i;
        for (i = list.length; i--; )
            icons.set(list[i], list[i]);
        icons.play();
    });
</script>
    @yield('js')
</body>
</html>
