<?php
if(isset($_GET['email'])) {
  if(isset($_GET['key'])) {
    $email = $_GET['email'];
    $key = $_GET['key'];
    $findUser = DB::table('users')->where('email', $email)->first();
  } else {
    header("Location: /sifremi-unuttum?hata=2");
    exit();
  }
} else {
  header("Location: /sifremi-unuttum?hata=2");
  exit();
}
?>
<!DOCTYPE html>
<html class="loading" lang="tr" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Sizi iyi hissettirecek dijital çözümler için ifeelcode yanınızda.">
  <meta name="author" content="Universitev">
  <title>{{$findUser->name}} şifreni yenile | I Feel Code</title>
  <link rel="apple-touch-icon" href="{{asset('public/app-assets/images/ico/apple-icon-120.png')}}">
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/app-assets/images/ico/favicon.ico')}}">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/vendors.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/vendors/css/forms/icheck/icheck.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/vendors/css/forms/icheck/custom.css')}}">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/app.css')}}">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/core/menu/menu-types/vertical-compact-menu.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/core/colors/palette-gradient.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/pages/login-register.css')}}">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/style.css')}}">
  <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-compact-menu 1-column  bg-full-screen-image menu-expanded blank-page blank-page"
data-open="click" data-menu="vertical-compact-menu" data-col="1-column">



<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0" style="border-radius: 10px;">
              <div class="card border-grey border-lighten-3 px-1 py-1 m-0" style="border-radius: 15px;">
                <div class="card-header border-0">
                  <div class="card-title text-center">
                    <img src="{{asset('/public/logo_beyaz.png')}}" width="200" height="52" alt="I Feel Code Logo">
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (count($errors) > 0)
                      <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                          <p class="text-center">{{ $error }}<br></p>
                        @endforeach
                      </div>
                    @endif
                    <form class="form-horizontal" method="post" autocomplete="off">
                        @csrf
                        <fieldset class="form-group position-relative has-icon-left">
                            <input style="border-radius: 10px;" type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Şifreniz" required>
                            <div class="form-control-position">
                              <i class="la la-key"></i>
                            </div>
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </fieldset>
                        <fieldset class="form-group position-relative has-icon-left">
                            <input style="border-radius: 10px;" id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password" placeholder="Şifrenizi tekrarlayın">
                            <div class="form-control-position">
                              <i class="la la-key"></i>
                            </div>
                            @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </fieldset>
                        <input type="hidden" name="email" value="{{$email}}">
                        <input type="hidden" name="key" value="{{$key}}">
                        <button type="submit" class="btn btn-outline-info btn-lg btn-block"><i class="ft-unlock"></i> Şifremi Yenile ve oturum aç</button>
                    </form>
                  </div>
                </div>
                <div class="card-footer border-0">
                  <p class="float-sm-left text-center"><a href="/giris" class="card-link">Giriş Yap</a></p>
                  <p class="float-sm-right text-center">Yeni misiniz? <a href="/kayit-ol" class="card-link">Kayıt Ol</a></p>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
  <!-- BEGIN VENDOR JS-->
  <script src="{{asset('public/app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{asset('public/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"
  type="text/javascript"></script>
  <script src="{{asset('public/app-assets/vendors/js/forms/icheck/icheck.min.js')}}" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="{{asset('public/app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
  <script src="{{asset('public/app-assets/js/core/app.js')}}" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="{{asset('public/app-assets/js/scripts/forms/form-login-register.js')}}" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
</body>
</html>                             