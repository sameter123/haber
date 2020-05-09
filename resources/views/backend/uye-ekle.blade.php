@extends('backend.layouts.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/public/app-assets/vendors/css/editors/summernote.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/public/app-assets/css/plugins/forms/validation/form-validation.css')}}">
@endsection
@section('content')
    <div class="row">

        <div class="col-12">
            <div class="card border-left-pink border-left-2">
                <div class="card-header">
                    <h4 class="card-title">Yeni Üye Ekle</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">

                        @if($errors->any())
                            <div class="alert bg-pink alert-icon-left alert-arrow-left alert-dismissible mb-2"
                                 role="alert">
                                <span class="alert-icon"><i class="ft ft-alert-circle"></i></span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>{!! implode('', $errors->all('<div>:message</div>')) !!}</strong>
                            </div>
                        @endif

                        <form class="form-horizontal" method="post" autocomplete="off">
                            @csrf
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-control" for="userinput1">Ad</label>
                                        <input
                                            type="text"
                                            id="userinput1"
                                            class="form-control border-success"
                                            placeholder="Ad"
                                            name="name"
                                            required
                                        >
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-control" for="userinput2">Soyad</label>
                                        <input
                                            type="text"
                                            id="userinput2"
                                            class="form-control border-success"
                                            placeholder="Soyad"
                                            name="last_name"
                                            required
                                        >
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-control" for="userinput3">E-posta</label>
                                        <input
                                            type="text"
                                            id="userinput3"
                                            class="form-control border-success"
                                            placeholder="E-posta"
                                            name="email"
                                            required
                                        >
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label-control" for="userinput4">Şifre</label>
                                            <input
                                                type="password"
                                                name="password"
                                                class="form-control"
                                                required
                                                autocomplete="new-password"
                                                data-validation-required-message="Bu alan gereklidir!"
                                            >
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label-control" for="userinput5">Şifreyi Tekrarlayın</label>
                                        <div class="controls">
                                            <input
                                                type="password"
                                                name="password2"
                                                data-validation-match-match="password"
                                                class="form-control"
                                                required
                                                data-validation-required-message="Bu alan gereklidir!"
                                            >
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
@endsection
@section('js')
    <script src="{{asset('/public/app-assets/vendors/js/editors/summernote/summernote.js')}}" type="text/javascript"></script>
    <script src="{{asset('/public/app-assets/js/scripts/editors/editor-summernote.js')}}" type="text/javascript"></script>
    <script src="{{asset('/public/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('/public/app-assets/js/scripts/forms/validation/form-validation.js')}}"
            type="text/javascript"></script>
@endsection
