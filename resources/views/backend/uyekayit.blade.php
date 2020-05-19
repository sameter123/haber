@extends('backend.layouts.master')
@section('content')
    <?php
    $settings = DB::table('users')->first();
    ?>
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- users edit start -->
                <section class="users-edit">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <ul class="nav nav-tabs mb-3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                            <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">Üye Ekle</span>
                                        </a>
                                    </li>

                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                        <!-- users edit media object start -->
                                        <form method="POST">
                                            {{csrf_field()}}
                                            <div class="row">
                                                <div class="col-md-4 col-sm-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Ad</label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   name="name"
                                                                   placeholder="Ad">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Soyad</label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   name="last_name"
                                                                   placeholder="Soyad">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Email</label>
                                                            <input type="email"
                                                                   class="form-control"
                                                                   name="email"
                                                                   placeholder="E-posta">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Telefon</label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   name="telefon"
                                                                   placeholder="Telefon Giriniz ...">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>İzin</label>
                                                            <select class="form-control" name="izin">
                                                                <option value="1">Yönetici</option>
                                                                <option value="2">Üye</option>
                                                                <option value="3">Moderatör</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Şifre</label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   name="password"
                                                                   placeholder="Şifre">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label> Tekar Şifre</label>
                                                        <input type="text" class="form-control" placeholder="Şifre Tekrarı">
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                    <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">
                                                        Kaydet
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- users edit account form ends -->
                                    </div>

                                    </form>
                                        <!-- users edit account form ends -->
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                </section>
                <!-- users edit ends -->

            </div>
        </div>
    </div>
@endsection
