@extends('backend.layouts.master')
@section('css')
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/public/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/public/app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/public/app-assets/css/pages/data-list-view.css')}}">
    <!-- END: Page CSS-->
@endsection
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
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Üye İşlemleri</a>
                                    </li>
                                    <li class="breadcrumb-item active">Üyeler
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">

                @if (session('success'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success alert-dismissable" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
                                </button>
                                <i class="feather icon-check-circle mr-1 align-middle"></i>
                                <span class="mb-0">{{ session('success') }}</span>
                            </div>
                        </div>
                    </div>

            @endif

                <!-- Data list view starts -->
                <section id="basic-datatable">
                    <!-- dataTable starts -->
                    <div class="table-responsive">
                        <table class="table zero-configuration1">
                            <thead>
                            <tr>
                                <th>Avatar</th>
                                <th>Ad</th>
                                <th>Soyad</th>
                                <th>E-posta</th>
                                <th>Telefon</th>
                                <th>İzin</th>
                                <th>Üyelik Tarihi</th>
                                <th>İşlem</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(DB::table('users')->get() as $u)
                            <tr>
                                <td class="product-img">
                                    @if($u->avatar != '')
                                    <img width="64" height="64" src="{{asset('/public/img/'.$u->avatar)}}" alt="{{$u->name}} Avatarı">
                                    @else
                                    <span class="text-danger">Avatar Yok</span>
                                    @endif
                                </td>
                                <td>{{$u->name}}</td>
                                <td>{{$u->last_name}}</td>
                                <td>{{$u->email}}</td>
                                <td>{{$u->telefon}}</td>
                                <td>
                                    @if($u->izin == 1) Yönetici
                                        @elseif($u->izin == 2) Üye
                                        @else Moderatör
                                        @endif
                                </td>
                                <td>{{$u->created_at}}</td>
                                <td class="product-action">
                                    <button onclick="location.href='uye-duzenle/{{$u->email}}'" type="button" class="btn btn-icon btn-outline-info mr-1 mb-1 waves-effect waves-light">
                                        <i class="feather icon-edit"></i>
                                    </button>
                                    <button data-toggle="tooltip" data-placement="top" title="Sil" onclick="location.href='?uye={{$u->id}}&sil&token={{ csrf_token() }}'" type="button" class="btn btn-icon btn-outline-info mr-1 mb-1 waves-effect waves-light">
                                        <i class="feather icon-delete"></i>
                                    </button>
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
@section('js')
    <!-- BEGIN: Page JS-->
    <script src="{{asset('/public/app-assets/js/scripts/ui/data-list-view.js')}}"></script>
    <script src="{{asset('/public/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('/public/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
    <script src="{{asset('/public/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('/public/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('/public/app-assets/vendors/js/tables/datatable/dataTables.select.min.js')}}"></script>
    <script src="{{asset('/public/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script>
    <!-- END: Page JS-->
    <script type="text/javascript">
        $(document).ready(function() {
            $('.zero-configuration1').DataTable( {
                columnDefs: [ { orderable: false, targets: [ 3 ] } ],
                pageLength: 10,
                "order": [[ 0, "desc" ]],
                "language": {
                    "decimal":        "",
                    "emptyTable":     "Henüz hiç veri yok.",
                    "info":           "_TOTAL_ adet veri içinden _START_ - _END_ arası gösteriliyor",
                    "infoEmpty":      "Toplamda 0 veri var.",
                    "infoFiltered":   "(_MAX_ adet veri içinde arama yapılıyor)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "_MENU_ veri gösteriliyor",
                    "loadingRecords": "Yükleniyor...",
                    "processing":     "İşleniyor...",
                    "search":         "Ara:",
                    "zeroRecords":    "Eşleşen veri bulunamadı",
                    "paginate": {
                        "first":      "İlk",
                        "last":       "Son",
                        "next":       "Sonraki",
                        "previous":   "Önceki"
                    },
                }
            } );
        } );
    </script>
@endsection
