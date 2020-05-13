<?php $settings = DB::table('settings')->first(); ?>
<!DOCTYPE html>
<html class="loading" lang="tr" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="I Feel Code Haber Sistemleri - Kayıt">
    <meta name="author" content="I Feel Code">
    <title>Kayıt Ol</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/public/app-assets/vendors/css/vendors.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/public/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/public/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/public/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/public/app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/public/app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/public/app-assets/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/public/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/public/app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/public/app-assets/css/pages/authentication.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/public/assets/css/style.css')}}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  menu-collapsed blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="row flexbox-container">
                <div class="col-xl-8 col-11 d-flex justify-content-center">
                    <div class="card bg-authentication rounded-0 mb-0">
                        <div class="row m-0">
                            <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                <img src="{{asset('/public/app-assets/images/pages/register.jpg')}}" alt="branding logo">
                            </div>
                            <div class="col-lg-6 col-12 p-0">
                                <div class="card rounded-0 mb-0 p-2">
                                    <div class="card-header pt-50 pb-1">
                                        <div class="card-title">
                                            <h4 class="mb-0">Hesap Oluştur</h4>
                                        </div>
                                    </div>
                                    <p class="px-2">Lütfen bilgilerinizi doldurarak kayıt olunuz.</p>
                                    <div class="card-content">
                                        @foreach ($errors->all(':message') as $input_error)
                                                <div class="col-md-12">
                                                    <div class="alert alert-danger" role="alert">
                                                        <i class="feather icon-alert-circle mr-1 align-middle"></i>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
                                                        </button>
                                                        <span><strong>{{ $input_error }}</strong></span>
                                                    </div>
                                                </div>
                                        @endforeach
                                        <div class="card-body pt-0">
                                            <form action="" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-label-group">
                                                            <input type="text" id="inputName" name="name" class="form-control" placeholder="Ad" required>
                                                            <label for="inputName">Adınız</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-label-group">
                                                            <input type="text" id="inputLast_name" name="last_name" class="form-control" placeholder="Soyad" required>
                                                            <label for="inputName">Soyadınız</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-label-group">
                                                    <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email" required>
                                                    <label for="inputEmail">E-postanız</label>
                                                </div>
                                                <div class="form-label-group">
                                                    <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Şifre" required>
                                                    <label for="inputPassword">Şifreniz</label>
                                                </div>
                                                <div class="form-label-group">
                                                    <input name="password_confirmation" type="password" id="inputConfPassword" class="form-control" placeholder="Şifre Tekrarı" required>
                                                    <label for="inputConfPassword">Şifrenizi Tekrarlayın</label>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <fieldset class="checkbox">
                                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                                <input type="checkbox" checked>
                                                                <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                                                <span class=""> I accept the terms & conditions.</span>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <a href="auth-login.html" class="btn btn-outline-primary float-left btn-inline mb-50">Login</a>
                                                <button type="submit" class="btn btn-primary float-right btn-inline mb-50">Register</a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
<!-- END: Content-->


<!-- BEGIN: Vendor JS-->
<script src="{{asset('/public/app-assets/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('/public/app-assets/js/core/app-menu.js')}}"></script>
<script src="{{asset('/public/app-assets/js/core/app.js')}}"></script>
<script src="{{asset('/public/app-assets/js/scripts/components.js')}}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<!-- END: Page JS-->

</body>
<!-- END: Body-->
</html>
