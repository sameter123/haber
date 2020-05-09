@extends('backend.layouts.app')
@section('css')
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/public/app-assets/vendors/css/forms/selects/select2.min.css')}}">
    <!-- END VENDOR CSS-->
@endsection
@section('content')
    <?php
    $settings = DB::table('settings')->first();
    ?>
    <div id="user-profile">
        <div class="row">
            <div class="col-12">
                <div class="card profile-with-cover border-left-pink border-left-2">
                    <nav class="navbar navbar-light">
                                    <span class="text-left">
                                        Hoşgeldinizz <strong>{{Auth::user()->name}} {{Auth::user()->last_name}}</strong>
                                    </span>
                        <button class="navbar-toggler d-sm-none" type="button" data-toggle="collapse" aria-expanded="false"
                                aria-label="Toggle navigation"></button>
                        <nav class="navbar navbar-expand-lg">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="/ayarlar"><i class="la la-cogs"></i> Ayarlar </a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </nav>
                </div>
            </div>
        </div>
        <section id="timeline" class="timeline-center timeline-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-left-pink border-left-2">
                        <div class="card-header">
                            <h4 class="card-title" id="horz-layout-colored-controls">Site Ayarlarını Güncelleyin</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <div class="card-text">
                                    <p>Siteniz hakkında genel bilgileri girin ve kaydet tuşuna basın.</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        @if (session('success'))
                                            <div class="alert bg-success alert-icon-left alert-arrow-left alert-dismissible mb-2"
                                                 role="alert">
                                                <span class="alert-icon"><i class="ft ft-thumbs-up"></i></span>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <strong>{{ session('success') }}</strong>
                                            </div>
                                        @endif
                                        @if($errors->any())
                                            <div class="alert bg-warning alert-icon-left alert-arrow-left alert-dismissible mb-2"
                                                 role="alert">
                                                <span class="alert-icon"><i class="ft ft-alert-circle"></i></span>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <strong>{!! implode('', $errors->all('<div>:message</div>')) !!}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <form class="form form-horizontal" method="post" autocomplete="off" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="label-control" for="userinput1">Site Adı</label>
                                                    <input
                                                        type="text"
                                                        id="userinput1"
                                                        class="form-control border-success @error('site_name') is-invalid border-pink @enderror"
                                                        placeholder="Site Adı"
                                                        value="{{$settings->site_name}}"
                                                        name="site_name">
                                                    @error('site_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="label-control" for="userinput2">Site Açıklaması</label>
                                                    <input
                                                        type="text"
                                                        id="userinput2"
                                                        class="form-control border-success @error('description') is-invalid border-pink @enderror"
                                                        placeholder="Site Açıklaması"
                                                        value="{{$settings->description}}"
                                                        name="description"
                                                        minlength="15"
                                                        maxlength="158"
                                                    >
                                                    @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="label-control" for="userinput3">Google Sitemde Gözüksün</label>
                                                    <select id="userinput3" class="select2 form-control border-success @error('robots') is-invalid border-pink @enderror" name="robots">
                                                        <option value="1" @if($settings->robots == '1') selected @endif>Evet</option>
                                                        <option value="0"  @if($settings->robots == '0') selected @endif>Hayır</option>
                                                    </select>
                                                    @error('robots')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="label-control" for="userinput4">Footer Yazısı</label>
                                                    <input
                                                        type="text"
                                                        id="userinput4"
                                                        class="form-control border-success @error('footer_text') is-invalid border-pink @enderror"
                                                        placeholder="Footer Yazısı"
                                                        value="{{$settings->footer_text}}"
                                                        name="footer_text"
                                                    >
                                                    @error('footer_text')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12"><hr></div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="label-control text-primary" for="userinput5">Facebook</label>
                                                    <input
                                                        type="text"
                                                        id="userinput5"
                                                        class="form-control border-primary @error('facebook') is-invalid border-pink @enderror"
                                                        placeholder="Facebook"
                                                        value="{{$settings->facebook}}"
                                                        name="facebook"
                                                    >
                                                    @error('facebook')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="label-control text-primary" for="userinput6">Twitter</label>
                                                    <input
                                                        type="text"
                                                        id="userinput6"
                                                        class="form-control border-primary @error('twitter') is-invalid border-pink @enderror"
                                                        placeholder="Twitter"
                                                        value="{{$settings->twitter}}"
                                                        name="twitter"
                                                    >
                                                    @error('twitter')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="label-control text-primary" for="userinput7">Instagram</label>
                                                    <input
                                                        type="text"
                                                        id="userinput7"
                                                        class="form-control border-primary @error('instagram') is-invalid border-pink @enderror"
                                                        placeholder="Instagram"
                                                        value="{{$settings->instagram}}"
                                                        name="instagram"
                                                    >
                                                    @error('instagram')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label-control text-primary" for="userinput8">Linkedin</label>
                                                    <input
                                                        type="text"
                                                        id="userinput8"
                                                        class="form-control border-primary @error('linkedin') is-invalid border-pink @enderror"
                                                        placeholder="Linkedin"
                                                        value="{{$settings->linkedin}}"
                                                        name="linkedin"
                                                    >
                                                    @error('linkedin')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label-control text-primary" for="userinput9">Youtube</label>
                                                    <input
                                                        type="text"
                                                        id="userinput9"
                                                        class="form-control border-primary @error('youtube') is-invalid border-pink @enderror"
                                                        placeholder="Youtube"
                                                        value="{{$settings->youtube}}"
                                                        name="youtube"
                                                    >
                                                    @error('youtube')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12"><hr></div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="label-control text-danger" for="userinput10">E-mail</label>
                                                    <input
                                                        type="text"
                                                        id="userinput10"
                                                        class="form-control border-danger @error('email') is-invalid border-pink @enderror"
                                                        placeholder="Email"
                                                        value="{{$settings->email}}"
                                                        name="email"
                                                    >
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="label-control text-danger" for="userinput11">Telefon</label>
                                                    <input
                                                        type="text"
                                                        id="userinput11"
                                                        class="form-control border-danger @error('tel1') is-invalid border-pink @enderror"
                                                        placeholder="Telefon"
                                                        value="{{$settings->tel1}}"
                                                        name="tel1"
                                                    >
                                                    @error('tel1')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="label-control text-danger" for="userinput12">Adres</label>
                                                    <input
                                                        type="text"
                                                        id="userinput12"
                                                        class="form-control border-danger @error('adres1') is-invalid border-pink @enderror"
                                                        placeholder="Adres"
                                                        value="{{$settings->adres1}}"
                                                        name="adres1"
                                                    >
                                                    @error('adres1')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12"><hr></div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label-control text-info" for="userinput13">Meta Etiket</label>
                                                    <input
                                                        type="text"
                                                        id="userinput13"
                                                        class="form-control border-info @error('meta') is-invalid border-pink @enderror"
                                                        placeholder="Meta Etiket"
                                                        value="{{$settings->meta}}"
                                                        name="meta"
                                                    >
                                                    @error('meta')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label-control text-info" for="userinput14">Analytics</label>
                                                    <input
                                                        type="text"
                                                        id="userinput14"
                                                        class="form-control border-info @error('meta') is-invalid border-pink @enderror"
                                                        placeholder="Analytics kodu (UA-XXXXXXXX-1)"
                                                        value="{{$settings->analytics}}"
                                                        name="analytics"
                                                    >
                                                    @error('analytics')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12"><hr></div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label-control text-pink" for="userinput15">Favicon</label>
                                                    @if($settings->favicon != '')
                                                        <?php
                                                        $image = $settings->favicon;
                                                        ?>
                                                            <div class="row" style="margin-bottom: 3em;">
                                                                <div class="col-md-3">
                                                                    <img class="img-thumbnail" src="{{ asset('/public/img/'.$image.'') }}" alt="{{$settings->site_name}} favicon" style="width: 100%;">
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <h3>
                                                                        <strong>Not: Logo'yu değiştirmek için yeni resim seçip yükleyebilirsiniz.</strong>
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                    @endif
                                                    <input
                                                        id="userinput15"
                                                        class="form-control border-pink @error('meta') is-invalid border-pink @enderror"
                                                        type="file"
                                                        name="favicon"/>
                                                    @error('favicon')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label-control text-pink text-center" for="userinput16">Logo</label>
                                                    @if($settings->logo != '')
                                                        <?php
                                                        $image = $settings->logo;
                                                        ?>
                                                    <div class="row" style="margin-bottom: 3em;">
                                                        <div class="col-md-3">
                                                            <img class="img-thumbnail" src="{{ asset('/public/img/'.$image.'') }}" alt="{{$settings->site_name}} logo" style="width: 100%;">
                                                        </div>
                                                        <div class="col-md-9">
                                                            <h3>
                                                                <strong>Not: Logo'yu değiştirmek için yeni resim seçip yükleyebilirsiniz.</strong>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    <input
                                                        id="userinput15"
                                                        class="form-control border-pink @error('meta') is-invalid border-pink @enderror"
                                                        type="file"
                                                        name="logo"/>
                                                    @error('logo')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="form-actions right">
                                        <button type="button" class="btn btn-outline-warning mr-1">
                                            <i class="ft-x"></i> İptal
                                        </button>
                                        <button type="submit" class="btn btn-outline-pink">
                                            <i class="la la-check-square-o"></i> Kaydet
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('js')
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{asset('/public/app-assets/vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{asset('/public/app-assets/js/scripts/forms/select/form-select2.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->

@endsection
