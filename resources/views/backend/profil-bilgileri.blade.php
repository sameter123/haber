@extends('backend.layouts.app')
@section('css')
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/public/app-assets/vendors/css/forms/selects/select2.min.css')}}">
    <!-- END VENDOR CSS-->
@endsection
@section('content')
    <div id="user-profile">
        <div class="row">
            <div class="col-12">
                <div class="card profile-with-cover border-left-pink border-left-2">
                    <nav class="navbar navbar-light">
                                    <span class="text-left">
                                        Hoşgeldiniz <strong>{{Auth::user()->name}} {{Auth::user()->last_name}}</strong>
                                    </span>
                        <button class="navbar-toggler d-sm-none" type="button" data-toggle="collapse" aria-expanded="false"
                                aria-label="Toggle navigation"></button>
                        <nav class="navbar navbar-expand-lg">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="/profil-bilgileri"><i class="la la-user"></i> Profil Bilgilerim </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/sifre-guncelle"><i class="la la-user-secret"></i> Şifre Değiştir</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/uyeler"><i class="la la-users"></i> Üye Yönetimi</a>
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
                            <h4 class="card-title" id="horz-layout-colored-controls">Profil bilgilerinizi güncelleyin</h4>
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
                                    <p>Profil bilgilerinizi girin ve kaydet tuşuna basın.</p>
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
                                <form class="form form-horizontal" method="post">
                                    @csrf
                                    <div class="form-body">
                                        <br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="label-control" for="userinput1">Adınız</label>
                                                        <input
                                                                type="text"
                                                                id="userinput1"
                                                                class="form-control border-success @error('name') is-invalid border-pink @enderror"
                                                                placeholder="Adınız"
                                                                value="{{Auth::user()->name}}"
                                                                name="name">
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="label-control" for="userinput2">Soyadınız</label>
                                                        <input
                                                                type="text"
                                                                id="userinput2"
                                                                class="form-control border-success @error('name') is-invalid border-pink @enderror"
                                                                placeholder="Soyadınız"
                                                                value="{{Auth::user()->last_name}}"
                                                                name="last_name">
                                                    @error('last_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="label-control" for="userinput3">E-postanız</label>
                                                        <input
                                                                type="email"
                                                                id="userinput3"
                                                                class="form-control border-success @error('email') is-invalid border-pink @enderror"
                                                                placeholder="E-postanız"
                                                                value="{{Auth::user()->email}}"
                                                                name="email">
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions right">
                                        <button type="button" class="btn btn-warning mr-1">
                                            <i class="ft-x"></i> İptal
                                        </button>
                                        <button type="submit" class="btn btn-primary">
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
    <script src="{{asset('/public/app-assets/vendors/js/extensions/dropzone.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/public/app-assets/vendors/js/ui/prism.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{asset('/public/app-assets/js/scripts/extensions/dropzone.js')}}" type="text/javascript"></script>
    <script src="{{asset('/public/app-assets/js/scripts/forms/select/form-select2.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->

@endsection
