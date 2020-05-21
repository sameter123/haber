@extends('backend.layouts.master')
@section('content')
    <?php
    $u = DB::table('users')->where('email', $id)->first();
    if(isset($_GET['sil'])) {
        DB::table('users')->where('email', $id)->update(['avatar' => '']);
        header("Location: ?okey");
        exit();
    }
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
                                            <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">Üye Düzenle</span>
                                        </a>
                                    </li>

                                </ul>
                                <div class="tab-content">
                                    @if (isset($_GET['okey']))
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-success alert-dismissable" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
                                                    </button>
                                                    <i class="feather icon-check-circle mr-1 align-middle"></i>
                                                    <span class="mb-0">Silme işlemi başarılı</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                        <!-- users edit media object start -->
                                        <div class="media mb-2">
                                            <form method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                    <a class="mr-2 my-25" href="#">
                                                        @if($u->avatar != '')
                                                        <img src="{{asset('/public/img/'.$u->avatar)}}" alt="{{$u->name}} avatarı" class="users-avatar-shadow rounded" height="90" width="90">
                                                        @endif
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label>Avatar</label>
                                                                        <input type="file"
                                                                               accept="image/*"
                                                                               class="form-control"
                                                                               name="avatar"
                                                                        >
                                                                        <small class="text-danger">* Direkt değiştirmek için yeni resim seçin ve yükleyin</small>
                                                                    </div>
                                                                </div>
                                                    </a>
                                                    </div>
                                                    <div class="col-md-6">
                                                    <div class="media-body mt-50">
                                                        <input type="hidden" name="id" value="{{$u->id}}">
                                                        <div class="col-12 d-flex mt-1 px-0">
                                                            <input type="submit" class="btn btn-primary d-none d-sm-block mr-75" value="Avatarı Yükle">
                                                            <input type="submit" class="btn btn-primary d-block d-sm-none mr-75" value="Yükle">
                                                            <a href="?sil=avatar" class="btn btn-outline-danger d-none d-sm-block">Avatarı Sil</a>
                                                            <a href="?sil=avatar" class="btn btn-outline-danger d-block d-sm-none"><i class="feather icon-trash-2"></i></a>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <form method="POST">
                                            <h4 class="media-heading">{{$u->name}} {{$u->last_name}}</h4>
                                            {{csrf_field()}}
                                            <div class="row">
                                                <div class="col-md-4 col-sm-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Ad</label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   name="name"
                                                                   value="{{$u->name}}"
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
                                                                   value="{{$u->last_name}}"
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
                                                                   value="{{$u->email}}"
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
                                                                   value="{{$u->telefon}}"
                                                                   placeholder="Telefon Giriniz ...">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>İzin</label>
                                                            <select class="form-control" name="izin">
                                                                <option value="1" @if($u->izin == 1) selected @endif>Yönetici</option>
                                                                <option value="2" @if($u->izin == 2) selected @endif>Üye</option>
                                                                <option value="3" @if($u->izin == 3) selected @endif>Moderatör</option>
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
                                                    <input type="hidden" name="id" value="{{$u->id}}">
                                                    <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">
                                                      Kaydet
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- users edit account form ends -->
                                    </div>

                                    </form>
                                    <!-- users edit socail form ends -->
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
