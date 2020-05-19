<!-- START POST BLOCK SECTION -->
<section class="slider-inner">
    <div class="container">
        <div class="row thm-margin">
            @if(DB::table('haberler')->orderBy('id', 'desc')->count() > 0)
            <div class="col-xs-12 col-sm-8 col-md-8 thm-padding">
                <div class="slider-wrapper">
                    <div id="owl-slider" class="owl-carousel owl-theme">
                        @foreach(DB::table('haberler')->orderBy('id', 'desc')->take(5)->get() as $u)
                        <!-- Slider item -->
                        <div class="item">
                            <div class="slider-post post-height-1">
                                <a href="#" class="news-image"><img src="{{asset('/public/img/'.$u->image)}}" alt="" class="img-responsive"></a>
                                <div class="post-text">
                                    <span class="post-category">
                                        @if(DB::table('kategoriler')->where('id', $u->kategori)->count() > 0)
                                            {{DB::table('kategoriler')->where('id', $u->kategori)->first()->title}}
                                        @else
                                            Genel
                                        @endif
                                    </span>
                                    <h2><a href="/haber/{{$u->url}}">{{$u->title}}</a></h2>
                                    <ul class="authar-info">
                                        @php
                                            $findYazar = DB::table('users')->where('id', $u->yazar);
                                        @endphp
                                        @if($findYazar->count() > 0)
                                        <li class="authar">
                                            <a href="/yazar/{{$findYazar->first()->id}}">
                                                {{$findYazar->first()->name}} {{$findYazar->first()->last_name}}
                                            </a>
                                        </li>
                                        @endif
                                        <li class="date">{{date("Y-m-d H:i", strtotime($u->created_at))}}</li>
                                        <li class="view">
                                            <a href="javascript:void(0)">
                                                @php
                                                    $goruntulenme = DB::table('istatistik')->where('haber', $u->id);
                                                @endphp
                                                @php $toplam = 0; @endphp
                                                @if($goruntulenme->count() > 0)
                                                    @foreach($goruntulenme->get() as $u)
                                                        @php $toplam += 1 @endphp
                                                    @endforeach
                                                @endif
                                                {{$toplam}} Görüntülenme
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.Slider item -->
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
            @if(DB::table('haberler')->orderBy('id', 'desc')->take(2)->count() > 0)
            <div class="col-xs-12 col-sm-4 col-md-4 thm-padding">
                <div class="row slider-right-post thm-margin">
                    <div class="col-xs-6 col-sm-12 col-md-12 thm-padding">
                        <div class="slider-post post-height-2">
                            @foreach(DB::table('haberler')->orderBy('id', 'desc')->take(1)->skip(5)->get() as $u)
                            <a href="#" class="news-image"><img src="{{asset('/public/img/'.$u->image)}}" alt="" class="img-responsive"></a>
                            <div class="post-text">
                                    <span class="post-category">
                                        @if(DB::table('kategoriler')->where('id', $u->kategori)->count() > 0)
                                            {{DB::table('kategoriler')->where('id', $u->kategori)->first()->title}}
                                        @else
                                            Genel
                                        @endif
                                    </span>
                                <h2><a href="/haber/{{$u->url}}">{{$u->title}}</a></h2>
                                <ul class="authar-info">
                                    @php
                                        $findYazar = DB::table('users')->where('id', $u->yazar);
                                    @endphp
                                    @if($findYazar->count() > 0)
                                        <li class="authar">
                                            <a href="/yazar/{{$findYazar->first()->id}}">
                                                {{$findYazar->first()->name}} {{$findYazar->first()->last_name}}
                                            </a>
                                        </li>
                                    @endif
                                    <li class="date">{{date("Y-m-d H:i", strtotime($u->created_at))}}</li>
                                    <li class="view">
                                        <a href="javascript:void(0)">
                                            @php
                                                $goruntulenme = DB::table('istatistik')->where('haber', $u->id);
                                            @endphp
                                            @php $toplam = 0; @endphp
                                            @if($goruntulenme->count() > 0)
                                                @foreach($goruntulenme->get() as $u)
                                                    @php $toplam += 1 @endphp
                                                @endforeach
                                            @endif
                                            {{$toplam}} Görüntülenme
                                        </a>
                                    </li>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-12 col-md-12 thm-padding">
                        <div class="slider-post post-height-2">
                            @foreach(DB::table('haberler')->orderBy('id', 'desc')->take(1)->skip(6)->get() as $u)
                                <a href="#" class="news-image"><img src="{{asset('/public/img/'.$u->image)}}" alt="" class="img-responsive"></a>
                                <div class="post-text">
                                    <span class="post-category">
                                        @if(DB::table('kategoriler')->where('id', $u->kategori)->count() > 0)
                                            {{DB::table('kategoriler')->where('id', $u->kategori)->first()->title}}
                                        @else
                                            Genel
                                        @endif
                                    </span>
                                    <h2><a href="/haber/{{$u->url}}">{{$u->title}}</a></h2>
                                    <ul class="authar-info">
                                        @php
                                            $findYazar = DB::table('users')->where('id', $u->yazar);
                                        @endphp
                                        @if($findYazar->count() > 0)
                                            <li class="authar">
                                                <a href="/yazar/{{$findYazar->first()->id}}">
                                                    {{$findYazar->first()->name}} {{$findYazar->first()->last_name}}
                                                </a>
                                            </li>
                                        @endif
                                        <li class="date">{{date("Y-m-d H:i", strtotime($u->created_at))}}</li>
                                        <li class="view">
                                            <a href="javascript:void(0)">
                                                @php
                                                    $goruntulenme = DB::table('istatistik')->where('haber', $u->id);
                                                @endphp
                                                @php $toplam = 0; @endphp
                                                @if($goruntulenme->count() > 0)
                                                    @foreach($goruntulenme->get() as $u)
                                                        @php $toplam += 1 @endphp
                                                    @endforeach
                                                @endif
                                                {{$toplam}} Görüntülenme
                                            </a>
                                        </li>
                                    </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
<!-- END OF /. POST BLOCK SECTION -->
