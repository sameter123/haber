<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Haber</title>
    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="assets/images/ico/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="assets/images/ico/apple-touch-icon-57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="assets/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="assets/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="assets/images/ico/apple-touch-icon-144-precomposed.png">

    <!-- jquery ui css -->
    <link href="{{asset('/public/assets/css/jquery-ui.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap -->
    <link href="{{asset('/public/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <!--Animate css-->
    <link href="{{asset('/public/assets/css/animate.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Navigation css-->
    <link href="{{asset('/public/assets/bootsnav/css/bootsnav.css')}}" rel="stylesheet" type="text/css"/>
    <!-- youtube css -->
    <link href="{{asset('/public/assets/css/RYPP.css')}}" rel="stylesheet" type="text/css"/>
    <!-- font awesome -->
    <link href="{{asset('/public/assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- themify-icons -->
    <link href="{{asset('/public/assets/themify-icons/themify-icons.css')}}" rel="stylesheet" type="text/css"/>
    <!-- weather-icons -->
    <link href="{{asset('/public/assets/weather-icons/css/weather-icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- flat icon -->
    <link href="{{asset('/public/assets/css/flaticon.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Important Owl stylesheet -->
    <link href="{{asset('/public/assets/owl-carousel/owl.carousel.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Default Theme -->
    <link href="{{asset('/public/assets/owl-carousel/owl.theme.css')}}" rel="stylesheet" type="text/css"/>
    <!-- owl transitions -->
    <link href="{{asset('/public/assets/owl-carousel/owl.transitions.css')}}" rel="stylesheet" type="text/css"/>
    <!-- style css -->
    <link href="{{asset('/public/assets/css/style.css')}}" rel="stylesheet" type="text/css"/>
</head>
<body>
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
                        <a href="/"><img src="{{asset('/public/assets/images/logo.png')}}" class="img-responsive" alt=""></a>

                    </div>
                </div>
                <div class="col-sm-8">
                    <a href="#"><img src="{{asset('/public/assets/images/add728x90-1.jpg')}}" class="img-responsive" alt=""></a>
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
                <a class="navbar-brand hidden-sm hidden-md hidden-lg" href="#brand"><img src="assets/images/logo.png" class="logo" alt=""></a>
            </div>
            <!-- End Header Navigation -->
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-left" data-in="" data-out="">
                    <li class="dropdown active">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Home</a>
                        <ul class="dropdown-menu">
                            <li class="active"><a href="index.html">Home – Layout 1</a></li>
                            <li><a href="index_2.html">Home – (Box) Layout 2 <span class="menu-badge">NEW</span></a></li>
                            <li><a href="index_3.html">Home – Layout 3 <span class="menu-badge">NEW</span></a></li>
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
                                                <img src="assets/images/gallery-235x160-1.jpg" alt="" class="img-responsive">
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
                                                <img src="assets/images/gallery-235x160-2.jpg" alt="" class="img-responsive">
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
                                                <img src="assets/images/gallery-235x160-3.jpg" alt="" class="img-responsive">
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
                                                <img src="assets/images/gallery-235x160-4.jpg" alt="" class="img-responsive">
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
                                                <img src="assets/images/gallery-235x160-5.jpg" alt="" class="img-responsive">
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
                                    <li class="active"><a href="index.html">Home – Layout 1</a></li>
                                    <li><a href="index_2.html">Home – (Box) Layout 2 <span class="menu-badge">NEW</span></a></li>
                                    <li><a href="index_3.html">Home – Layout 3 <span class="menu-badge">NEW</span></a></li>
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
                    <img src="assets/images/logo-white.png" class="img-responsive" alt=""/>
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
                                <img src="assets/images/115x85-1.jpg" alt="" class="img-responsive">
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
                                <img src="assets/images/115x85-2.jpg" alt="" class="img-responsive">
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
<script src="{{asset('/public/assets/js/jquery.min.js')}}" type="text/javascript"></script>
<!-- jquery ui js -->
<script src="{{asset('/public/assets/js/jquery-ui.min.js')}}" type="text/javascript"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('/public/assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
<!-- Bootsnav js -->
<script src="{{asset('/public/assets/bootsnav/js/bootsnav.js')}}" type="text/javascript"></script>
<!-- theia sticky sidebar -->
<script src="{{asset('/public/assets/js/theia-sticky-sidebar.js')}}" type="text/javascript"></script>
<!-- youtube js -->
<script src="{{asset('/public/assets/js/RYPP.js')}}" type="text/javascript"></script>
<!-- owl include js plugin -->
<script src="{{asset('/public/assets/owl-carousel/owl.carousel.min.js')}}" type="text/javascript"></script>
<!-- custom js -->
<script src="{{asset('/public/assets/js/custom.js')}}" type="text/javascript"></script>
</body>
