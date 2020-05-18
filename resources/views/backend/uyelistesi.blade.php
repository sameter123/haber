@extends('backend.layouts.master')
@section('content')
    <?php
    if(isset($_GET['uye']) AND isset($_GET['sil']) AND isset($_GET['token'])) {
        $uye_id = $_GET['uye'];
        $token = $_GET['token'];
        if(Session::token() == $token) {
            DB::table('users')->where('id', $uye_id)->delete();
            header("Location: ?okey");
            die();
        } else {
            header("Location: ?notOkey");
        }
    }
?>
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Üye Listesi</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/haber/admin">Anasayfa</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Üye İşlemleri</a>
                                    </li>
                                    <li class="breadcrumb-item active">Üye Listeleme
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a class="dropdown-item" href="#">Email</a><a class="dropdown-item" href="#">Calendar</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Data list view starts -->
                <section id="data-thumb-view" class="data-thumb-view-header">
                    <div class="action-btns d-none">
                        <div class="btn-dropdown mr-1 mb-1">
                            <div class="btn-group dropdown actions-dropodown">
                                <button type="button" class="btn btn-white px-1 py-1 dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Actions
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="feather icon-trash"></i>Delete</a>
                                    <a class="dropdown-item" href="#"><i class="feather icon-archive"></i>Archive</a>
                                    <a class="dropdown-item" href="#"><i class="feather icon-file"></i>Print</a>
                                    <a class="dropdown-item" href="#"><i class="feather icon-save"></i>Another Action</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- dataTable starts -->
                    <div class="table-responsive">
                        <table class="table data-thumb-view">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Avatar</th>
                                <th>ID</th>
                                <th>İsim</th>
                                <th>Soyisim</th>
                                <th>Telefon</th>
                                <th>Email</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td></td>
                                <td class="product-img"><img src="{{asset('public/app-assets/images/portrait/small/avatar-s-18.jpg')}}" height="90" width="90">
                                </td>
                                <td> {{ $user ->id }} </td>
                                <td> {{ $user ->name }}</td>
                                <td> {{ $user ->last_name }}</td>
                                <td> {{ $user ->telefon }}</td>
                                <td> {{ $user ->email }}</td>
                                <td class="product-action">
                                    <a href="/haber/admin/uye-duzenle/{{$user->email}}" class="action-edit"><i class="feather icon-edit"></i></a>
                                    <a href="?uye={{$user->id}}&sil&token={{ csrf_token() }}"><i class="feather icon-trash"></i></a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- dataTable ends -->


                </section>
                <!-- Data list view end -->

            </div>
        </div>
    </div>
@endsection
