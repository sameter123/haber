@extends('layouts.app')
@section('content')
    <?php
    $calisma = '/calisma/'.$calisma;
    $calismaGelen = DB::table('projeler')->where('url', '=', $calisma)->first();
    ?>
    <div class="header-bg page-area" style="background: url({{asset('public/img/'.$calismaGelen->image)}});
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
        background-attachment: fixed;">
        <div class="home-overly"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="slider-content text-center">
                        <div class="header-bottom">
                            <div class="layer2 wow zoomIn" data-wow-duration="1s" data-wow-delay=".4s">
                                <h1 class="title2">{{$calismaGelen->title}} </h1>
                            </div>
                            <div class="layer3 wow zoomInUp" data-wow-duration="2s" data-wow-delay="1s">
                                <h2 class="title3">{{$calismaGelen->title_2}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="blog-page area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <!-- single-blog start -->
                            <article class="blog-post-wrapper">
                                <div class="post-thumbnail text-center">
                                    <img src="{{asset('public/img/'.$calismaGelen->image)}}" alt="{{$calismaGelen->title}}" style="width: 50%;" />
                                </div>
                                <div class="post-information">
                                    <h2>{{$calismaGelen->title}}</h2>
                                    <div class="entry-meta">
                                        <span class="tag-meta">
												<i class="fa fa-folder-o"></i>
                                            <?php
                                                $urunler = DB::table('urunler')->get();
                                            ?>
                                                @foreach($urunler as $u)
												<a href="{{$u->url}}">{{$u->title}}</a>,
                                                    @endforeach
											</span>
                                    </div>
                                    <div class="entry-content">
                                        <p><?=$calismaGelen->text?></p>
                                    </div>
                                </div>
                            </article>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="page-head-blog">
                        <div class="single-blog-page">
                            <div class="left-blog">
                                <?php
                                $urun = DB::table('urunler')->where('id', $calismaGelen->urun)->first();
                                $calismalarAyni = DB::table('projeler')->where('urun', $calismaGelen->urun)->get();
                                ?>
                                <h4>Diğer {{$urun->title}} çalışmaları</h4>
                                <div class="recent-post">
                                    @foreach($calismalarAyni as $c)
                                    <!-- start single post -->
                                    <div class="recent-single-post">
                                        <div class="post-img">
                                            <a href="{{$c->url}}">
                                                <img src="{{asset('public/img/'.$c->image)}}" alt="{{$c->title}}">
                                            </a>
                                        </div>
                                        <div class="pst-content">
                                            <p><a href="{{$c->url}}"> {{$c->title}}</a></p>
                                        </div>
                                    </div>
                                    <!-- End single post -->
                                    @endforeach
                                </div>
                            </div>
                            <!-- recent end -->
                        </div>
                        <div class="single-blog-page">
                            <div class="left-blog">
                                <h4>Tüm Ürünler</h4>
                                <ul>
                                    <?php
                                        $urunler = DB::table('urunler')->get();
                                    ?>
                                    @foreach($urunler as $u)
                                    <li>
                                        <a href="{{$u->url}}">{{$u->title}}</a>
                                    </li>
                                        @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
@endsection
