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
                            <h2 class="content-header-title float-left mb-0">Ayarlar</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Anasayfa</a>
                                    </li>
                                    <li class="breadcrumb-item active">Ayarlar
                                    </li>
                                </ol>
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
                                    <a class="nav-link d-flex py-75" id="account-pill-info" data-toggle="pill"
                                       href="#account-vertical-info" aria-expanded="false">
                                        <i class="feather icon-info mr-50 font-medium-3"></i>
                                        İletişim
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-social" data-toggle="pill"
                                       href="#account-vertical-social" aria-expanded="false">
                                        <i class="feather icon-camera mr-50 font-medium-3"></i>
                                        Sosyal Medya
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
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-4">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-username">Site Adı</label>
                                                                    <input type="text" class="form-control"
                                                                           name="site_name"
                                                                           value="{{$settings->site_name}}"
                                                                           placeholder="Site Adı">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-name">Site Açıklama</label>
                                                                    <input type="text" class="form-control"
                                                                           name="site_description"
                                                                           value="{{$settings->site_description}}"
                                                                           placeholder="Site Açıklaması">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-e-mail">Footer Yazısı</label>
                                                                    <input type="text" class="form-control"
                                                                           name="footer_text"
                                                                           value="{{$settings->footer_text}}"
                                                                           placeholder="Footer Yazısı">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-e-mail">Meta Tag</label>
                                                                    <input type="text" class="form-control"
                                                                           name="meta_tag"
                                                                           value="{{$settings->meta_tag}}"
                                                                           placeholder="Meta Tag (Örneğin google verification)">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-e-mail">Analytics</label>
                                                                    <input type="text" class="form-control"
                                                                           name="analytics"
                                                                           value="{{$settings->analytics}}"
                                                                           placeholder="UA-XXXXXXX">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-e-mail">Robotlar Siteyi İndexlesin</label>
                                                                    <select name="robots" class="form-control">
                                                                        <option value="1" @if($settings->robots == 1) selected @endif> Evet</option>
                                                                        <option value="0" @if($settings->robots == 0) selected @endif> Hayır</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit" name="post"
                                                                    class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">
                                                                Kaydet
                                                            </button>
                                                            <button type="reset" class="btn btn-outline-warning">
                                                                Değişiklikleri Geri Al
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
                                                        <div class="col-md-4 col-sm-4">
                                                            <div class="form-group">
                                                                <label for="account-website">Telefon Numarası 1</label>
                                                                <input type="text" class="form-control"
                                                                       name="tel_1" id="account-website"
                                                                       placeholder="Telefon 1">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4">
                                                            <div class="form-group">
                                                                <label for="account-website">Telefon Numarası 2</label>
                                                                <input type="text" class="form-control"
                                                                       name="tel_2" id="account-website"
                                                                       placeholder="Telefon 2">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4">
                                                            <div class="form-group">
                                                                <label for="account-website">Adres 1</label>
                                                                <input type="text" class="form-control"
                                                                       name="adress" id="account-website"
                                                                       placeholder="Adress">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4">
                                                            <div class="form-group">
                                                                <label for="account-website">Adress Iframe</label>
                                                                <input type="text" class="form-control"
                                                                       name="adress_iframe" id="account-website"
                                                                       placeholder="Adress Iframe">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4">
                                                            <div class="form-group">
                                                                <label for="account-website">Mail Adresi 1</label>
                                                                <input type="text" class="form-control"
                                                                       name="email_1" id="account-website"
                                                                       placeholder="Mail 1">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4">
                                                            <div class="form-group">
                                                                <label for="account-website">Mail Adresi 2</label>
                                                                <input type="text" class="form-control"
                                                                       name="email_2" id="account-website"
                                                                       placeholder="Mail 2">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit" name="post"
                                                                    class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">
                                                                Kaydet
                                                            </button>
                                                            <button type="reset" class="btn btn-outline-warning">
                                                                Değişiklikleri Geri Al
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
                                                        <div class="col-md-4 col-sm-4">
                                                            <div class="form-group">
                                                                <label for="account-twitter">Twitter</label>
                                                                <input type="text" id="account-twitter"
                                                                       class="form-control" name="twitter"
                                                                       placeholder="Twitter Link">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4">
                                                            <div class="form-group">
                                                                <label for="account-facebook">Facebook</label>
                                                                <input type="text" id="account-facebook"
                                                                       class="form-control" name="facebook"
                                                                       placeholder="Facebook link">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4">
                                                            <div class="form-group">
                                                                <label for="account-google">Youtube</label>
                                                                <input type="text" id="account-google"
                                                                       class="form-control" name="youtube"
                                                                       placeholder="Youtube link">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4">
                                                            <div class="form-group">
                                                                <label for="account-linkedin">LinkedIn</label>
                                                                <input type="text" id="account-linkedin"
                                                                       class="form-control" name="linkedin"
                                                                       placeholder="Linkedin link">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4">
                                                            <div class="form-group">
                                                                <label for="account-instagram">Instagram</label>
                                                                <input type="text" id="account-instagram"
                                                                       class="form-control" name="instagram"
                                                                       placeholder="İnstagram link">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit" name="post"
                                                                    class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">
                                                                Kaydet
                                                            </button>
                                                            <button type="reset" class="btn btn-outline-warning">
                                                                Değişiklikleri Geri Al
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
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
