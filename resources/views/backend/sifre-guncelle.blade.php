@extends('backend.layouts.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/public/app-assets/css/plugins/forms/validation/form-validation.css')}}">
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
                            <h4 class="card-title" id="horz-layout-colored-controls">Şifrenizi Güncelleyin</h4>
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
                                        @if ($errors->any())
                                            <div class="alert bg-pink alert-icon-left alert-arrow-left alert-dismissible mb-2"
                                                 role="alert">
                                                <span class="alert-icon"><i class="ft ft-thumbs-up"></i></span>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <strong>
                                                    @foreach ($errors->all() as $error)
                                                        {{ $error }}
                                                    @endforeach
                                                </strong>
                                            </div>

                                        @endif
                                    </div>
                                </div>
                                <form class="form-horizontal" autocomplete="off" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <h5>Eski şifreniz <span class="required">*</span> </h5>
                                            <div class="controls">
                                                <input type="password" name="old_password" class="form-control" required autocomplete="password" data-validation-required-message="Yeni şifre alabilmek için eski şifrenizi girin!">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Yeni şifreniz <span class="required">*</span> </h5>
                                            <div class="controls">
                                                <input type="password" name="password" class="form-control" required autocomplete="new-password" data-validation-required-message="Bu alan gereklidir!">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Yeni şifrenizi tekrarlayın
                                                <span class="required">*</span>
                                            </h5>
                                            <div class="controls">
                                                <input type="password" name="password2" data-validation-match-match="password" class="form-control"
                                                       required data-validation-required-message="Bu alan gereklidir!">
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
    <script src="{{asset('/public/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('/public/app-assets/js/scripts/forms/validation/form-validation.js')}}"
            type="text/javascript"></script>
@endsection
