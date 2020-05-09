@extends('backend.layouts.app')
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
@section('css')
  <link rel="stylesheet" type="text/css" href="{{asset('/public/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endsection
@section('content')
    <div class="row">

            <div class="col-xl-6 col-12">
                <div class="card pull-up border-left-info border-left-2">
                    <div class="card-content">
                        <div class="card-body" onclick="location.href='/uyeler'" style="cursor: pointer">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="info">{{DB::table('users')->count()}}</h3>
                                    <h6>Üyeler</h6>
                                </div>
                                <div>
                                    <i class="la la-list-ul info font-large-2 float-right"></i>
                                </div>
                            </div>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 100%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-12">
                <div class="card pull-up border-left-warning border-left-2">
                    <div class="card-content">
                        <div class="card-body" onclick="location.href='/uye-ekle'" style="cursor: pointer">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="warning">Yeni</h3>
                                    <h6>Üye Ekle</h6>
                                </div>
                                <div>
                                    <i class="la la-plus-square-o warning font-large-2 float-right"></i>
                                </div>
                            </div>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 100%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        <div class="col-12">
            <div class="card border-left-pink border-left-2">
                <div class="card-header">
                    <h4 class="card-title">Site Yöneticileri</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                        @if (isset($_GET['okey']))
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert bg-success alert-icon-left alert-arrow-left alert-dismissible mb-2"
                                         role="alert">
                                        <span class="alert-icon"><i class="ft ft-thumbs-up"></i></span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <strong>Üye başarıyla silindi.</strong>
                                    </div>
                                </div>
                            </div>

                        @endif

                        @if (isset($_GET['notOkey']))
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert bg-pink alert-icon-left alert-arrow-left alert-dismissible mb-2"
                                         role="alert">
                                        <span class="alert-icon"><i class="ft ft-thumbs-up"></i></span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <strong>Üye silme işlemi için güvenlik doğrulaması başarısız oldu.</strong>
                                    </div>
                                </div>
                            </div>

                        @endif

                        @if (session('success'))
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert bg-success alert-icon-left alert-arrow-left alert-dismissible mb-2"
                                         role="alert">
                                        <span class="alert-icon"><i class="ft ft-thumbs-up"></i></span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <strong>{{ session('success') }}</strong>
                                    </div>
                                </div>
                            </div>

                        @endif
                        <table
                            class="table table-striped table-bordered zero-configuration1 text-center"
                        >
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Ad - Soyad</th>
                                <th>E-posta</th>
                                <th>İşlem</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(DB::table('users')->get() as $u)
                                <tr>
                                    <td>{{$u->id}}</td>
                                    <td>{{$u->name}} {{$u->last_name}}</td>
                                    <td>{{$u->email}}</td>
                                    <td>
                                        <a href="?uye={{$u->id}}&sil&token={{ csrf_token() }}" class="btn btn-outline-danger btn-min-width">
                                            <i class="la la-trash"></i>
                                            <span>
                                                Sil
                                            </span>
                                        </a>
                                        <a href="/uye-duzenle/{{$u->email}}" class="btn btn-outline-info btn-min-width">
                                            <i class="la la-edit"></i>
                                            <span>
                                                Düzenle
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Ad - Soyad</th>
                                <th>E-posta</th>
                                <th>İşlem</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script src="{{asset('/public/app-assets/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/public/app-assets/js/scripts/tables/datatables/datatable-basic.js')}}" type="text/javascript"></script>
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
