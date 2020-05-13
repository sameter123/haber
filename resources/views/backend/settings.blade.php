@extends('backend.layouts.master')
@section('content')
    <?php
    $settings = DB::table('settings')->first();
    ?>

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Settings</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Pages</a>
                                    </li>
                                    <li class="breadcrumb-item active">Settings
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="feather icon-settings"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a
                                    class="dropdown-item" href="#">Email</a><a class="dropdown-item"
                                                                               href="#">Calendar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- account setting page start -->

                <section>

                    <div class="row">
                        <!-- left menu section -->
                        <div class="col-md-3 mb-2 mb-md-0">
                            <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75 active" id="account-pill-general"
                                       data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                                        <i class="feather icon-globe mr-50 font-medium-3"></i>
                                        Genel Ayarlar
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill"
                                       href="#account-vertical-password" aria-expanded="false">
                                        <i class="feather icon-lock mr-50 font-medium-3"></i>
                                        Change Password
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-info" data-toggle="pill"
                                       href="#account-vertical-info" aria-expanded="false">
                                        <i class="feather icon-info mr-50 font-medium-3"></i>
                                        Hakkında
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-social" data-toggle="pill"
                                       href="#account-vertical-social" aria-expanded="false">
                                        <i class="feather icon-camera mr-50 font-medium-3"></i>
                                        Sosyal Medya
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-connections"
                                       data-toggle="pill" href="#account-vertical-connections"
                                       aria-expanded="false">
                                        <i class="feather icon-feather mr-50 font-medium-3"></i>
                                        Connections
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-notifications"
                                       data-toggle="pill" href="#account-vertical-notifications"
                                       aria-expanded="false">
                                        <i class="feather icon-message-circle mr-50 font-medium-3"></i>
                                        Notifications
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- right content section -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active"
                                                 id="account-vertical-general"
                                                 aria-labelledby="account-pill-general" aria-expanded="true">


                                                <hr>
                                                <form method="POST">
                                                    {{csrf_field()}}
                                                    <div class="media">
                                                        <a href="javascript: void(0);">
                                                            <img
                                                                src="{{asset('public/app-assets/images/portrait/small/avatar-s-12.jpg')}}"
                                                                class="rounded mr-75" alt="profile image" height="64"
                                                                width="64">
                                                        </a>
                                                        <div class="media-body mt-75">
                                                            <div
                                                                class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                                <label
                                                                    class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer"
                                                                    for="account-upload">Yeni Logo Seçiniz</label>
                                                                <input type="file" id="account-upload" name="icon"
                                                                       hidden>
                                                                <button class="btn btn-sm btn-outline-warning ml-50">
                                                                    Sil
                                                                </button>
                                                            </div>
                                                            <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or
                                                                    PNG. Max
                                                                    size of
                                                                    800kB</small></p>
                                                        </div>
                                                        <a href="javascript: void(0);">
                                                            <img
                                                                src="{{asset('public/app-assets/images/portrait/small/avatar-s-12.jpg')}}"
                                                                class="rounded mr-75" alt="profile image" height="64"
                                                                width="64">
                                                        </a>
                                                        <div class="media-body mt-75">
                                                            <div
                                                                class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                                <label
                                                                    class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer"
                                                                    for="account-upload">Yeni Faviogo Seçiniz</label>
                                                                <input type="file" name="favicon"
                                                                       hidden>
                                                                <button class="btn btn-sm btn-outline-warning ml-50">
                                                                    Sil
                                                                </button>
                                                            </div>
                                                            <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or
                                                                    PNG. Max
                                                                    size of
                                                                    800kB</small></p>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-username">Site Adı</label>
                                                                    <input type="text" class="form-control"
                                                                           name="site_name"
                                                                           value="{{$settings->site_name}}"
                                                                           placeholder="Site Name Giriniz ...">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-name">Sİte Açıklama</label>
                                                                    <input type="text" class="form-control"
                                                                           name="site_description"
                                                                           value="{{$settings->site_description}}"
                                                                           placeholder="Description Giriniz ...">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-e-mail">Footer Text</label>
                                                                    <input type="text" class="form-control"
                                                                           name="footer_text"
                                                                           value="{{$settings->footer_text}}"
                                                                           placeholder="Footer Text Giriniz ...">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-e-mail">Meta Tag</label>
                                                                    <input type="text" class="form-control"
                                                                           name="meta_tag"
                                                                           value="{{$settings->meta_tag}}"
                                                                           placeholder="Meta Tag Giriniz ...">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-e-mail">Analytics</label>
                                                                    <input type="text" class="form-control"
                                                                           name="analytics"
                                                                           value="{{$settings->analytics}}"
                                                                           placeholder="Analytics Giriniz ...">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-e-mail">Robots</label>
                                                                    <input type="text" class="form-control"
                                                                           name="robots" value="{{$settings->robots}}"
                                                                           placeholder="Robots Giriniz ...">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit" name="post"
                                                                    class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">
                                                                Save
                                                                changes
                                                            </button>
                                                            <button type="reset" class="btn btn-outline-warning">
                                                                Cancel
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade " id="account-vertical-password"
                                                 role="tabpanel" aria-labelledby="account-pill-password"
                                                 aria-expanded="false">
                                                <form novalidate>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-old-password">Old
                                                                        Password</label>
                                                                    <input type="password" class="form-control"
                                                                           id="account-old-password" required
                                                                           placeholder="Old Password"
                                                                           data-validation-required-message="This old password field is required">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-new-password">New
                                                                        Password</label>
                                                                    <input type="password" name="password"
                                                                           id="account-new-password"
                                                                           class="form-control"
                                                                           placeholder="New Password" required
                                                                           data-validation-required-message="The password field is required"
                                                                           minlength="6">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-retype-new-password">Retype
                                                                        New
                                                                        Password</label>
                                                                    <input type="password" name="con-password"
                                                                           class="form-control" required
                                                                           id="account-retype-new-password"
                                                                           data-validation-match-match="password"
                                                                           placeholder="New Password"
                                                                           data-validation-required-message="The Confirm password field is required"
                                                                           minlength="6">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit" name="post"
                                                                    class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">
                                                                Save
                                                                changes
                                                            </button>
                                                            <button type="reset" class="btn btn-outline-warning">
                                                                Cancel
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="account-vertical-info" role="tabpanel"
                                                 aria-labelledby="account-pill-info" aria-expanded="false">
                                                <form method="POST">
                                                    {{csrf_field()}}
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-website">Telefon Numarası 1</label>
                                                                <input type="text" class="form-control"
                                                                       name="tel_1" id="account-website"
                                                                       placeholder="Telefon Numarası 1 Giriniz ...">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-website">Telefon Numarası 2</label>
                                                                <input type="text" class="form-control"
                                                                       name="tel_2" id="account-website"
                                                                       placeholder="Telefon Numarası 2 Giriniz ...">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-website">Adres 1</label>
                                                                <input type="text" class="form-control"
                                                                       name="adress" id="account-website"
                                                                       placeholder="Adress Giriniz ...">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-website">Adress Iframe</label>
                                                                <input type="text" class="form-control"
                                                                       name="adress_iframe" id="account-website"
                                                                       placeholder="Adress Iframe Giriniz ...">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-website">Mail Adresi 1</label>
                                                                <input type="text" class="form-control"
                                                                       name="email_1" id="account-website"
                                                                       placeholder="Mail Adresi 1 Giriniz ...">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-website">Mail Adresi 2</label>
                                                                <input type="text" class="form-control"
                                                                       name="email_2" id="account-website"
                                                                       placeholder="Mail Adresi 2 Giriniz ...">
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit" name="POST"
                                                                    class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">
                                                                Save
                                                                changes
                                                            </button>
                                                            <button type="reset" class="btn btn-outline-warning">
                                                                Cancel
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade " id="account-vertical-social" role="tabpanel"
                                                 aria-labelledby="account-pill-social" aria-expanded="false">
                                                <form method="POST">
                                                    {{csrf_field()}}
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-twitter">Twitter</label>
                                                                <input type="text" id="account-twitter"
                                                                       class="form-control" name="twitter"
                                                                       placeholder="Add link">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-facebook">Facebook</label>
                                                                <input type="text" id="account-facebook"
                                                                       class="form-control" name="facebook"
                                                                       placeholder="Add link">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-google">Youtube</label>
                                                                <input type="text" id="account-google"
                                                                       class="form-control" name="youtube"
                                                                       placeholder="Add link">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-linkedin">LinkedIn</label>
                                                                <input type="text" id="account-linkedin"
                                                                       class="form-control" name="linkedin"
                                                                       placeholder="Add link">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-instagram">Instagram</label>
                                                                <input type="text" id="account-instagram"
                                                                       class="form-control" name="instagram"
                                                                       placeholder="Add link">
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit" name="post"
                                                                    class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">
                                                                Save
                                                                changes
                                                            </button>
                                                            <button type="reset" class="btn btn-outline-warning">
                                                                Cancel
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="account-vertical-connections"
                                                 role="tabpanel" aria-labelledby="account-pill-connections"
                                                 aria-expanded="false">
                                                <div class="row">
                                                    <div class="col-12 mb-3">
                                                        <a href="javascript: void(0);" class="btn btn-info">Connect
                                                            to
                                                            <strong>Twitter</strong></a>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <button class=" btn btn-sm btn-secondary float-right">edit
                                                        </button>
                                                        <h6>You are connected to facebook.</h6>
                                                        <span>Johndoe@gmail.com</span>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <a href="javascript: void(0);" class="btn btn-danger">Connect
                                                            to
                                                            <strong>Google</strong>
                                                        </a>
                                                    </div>
                                                    <div class="col-12 mb-2">
                                                        <button class=" btn btn-sm btn-secondary float-right">edit
                                                        </button>
                                                        <h6>You are connected to Instagram.</h6>
                                                        <span>Johndoe@gmail.com</span>
                                                    </div>
                                                    <div
                                                        class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit" name="post"
                                                                class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                            changes
                                                        </button>
                                                        <button type="reset" class="btn btn-outline-warning">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="account-vertical-notifications"
                                                 role="tabpanel" aria-labelledby="account-pill-notifications"
                                                 aria-expanded="false">
                                                <div class="row">
                                                    <h6 class="m-1">Activity</h6>
                                                    <div class="col-12 mb-1">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input"
                                                                   checked id="accountSwitch1">
                                                            <label class="custom-control-label mr-1"
                                                                   for="accountSwitch1"></label>
                                                            <span class="switch-label w-100">Email me when someone comments
                                                                onmy
                                                                article</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-1">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input"
                                                                   checked id="accountSwitch2">
                                                            <label class="custom-control-label mr-1"
                                                                   for="accountSwitch2"></label>
                                                            <span class="switch-label w-100">Email me when someone answers on
                                                                my
                                                                form</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-1">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input"
                                                                   id="accountSwitch3">
                                                            <label class="custom-control-label mr-1"
                                                                   for="accountSwitch3"></label>
                                                            <span class="switch-label w-100">Email me hen someone follows
                                                                me</span>
                                                        </div>
                                                    </div>
                                                    <h6 class="m-1">Application</h6>
                                                    <div class="col-12 mb-1">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input"
                                                                   checked id="accountSwitch4">
                                                            <label class="custom-control-label mr-1"
                                                                   for="accountSwitch4"></label>
                                                            <span
                                                                class="switch-label w-100">News and announcements</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-1">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input"
                                                                   id="accountSwitch5">
                                                            <label class="custom-control-label mr-1"
                                                                   for="accountSwitch5"></label>
                                                            <span
                                                                class="switch-label w-100">Weekly product updates</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-1">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input"
                                                                   checked id="accountSwitch6">
                                                            <label class="custom-control-label mr-1"
                                                                   for="accountSwitch6"></label>
                                                            <span class="switch-label w-100">Weekly blog digest</span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit"
                                                                class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                            changes
                                                        </button>
                                                        <button type="reset" class="btn btn-outline-warning">
                                                            Cancel
                                                        </button>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>


                <!-- account setting page end -->

            </div>
        </div>
    </div>
@endsection
