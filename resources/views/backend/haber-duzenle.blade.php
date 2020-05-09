@extends('backend.layouts.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/public/app-assets/vendors/css/editors/summernote.css')}}">
@endsection
@section('content')
    <?php
        $haberim = DB::table('blog')->where('id', $id)->first();
    ?>
    <div class="row">

        <div class="col-12">
            <div class="card border-left-pink border-left-2">
                <div class="card-header">
                    <h4 class="card-title">Haber düzenle</h4>
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

                        <form class="form-horizontal" method="post" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="label-control" for="userinput1">Haber Başlığı</label>
                                        <input
                                            type="text"
                                            id="userinput1"
                                            class="form-control border-success"
                                            placeholder="Haber başlığı"
                                            value="{{$haberim->title}}"
                                            name="title">
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="label-control" for="userinput2">Haber Açıklaması</label>
                                        <input
                                            type="text"
                                            id="userinput2"
                                            class="form-control border-success"
                                            placeholder="Haber kısa açıklaması"
                                            value="{{$haberim->title_2}}"
                                            name="title_2">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="label-control" for="userinput3">Haber Metni</label>
                                        <textarea class="summernote" name="text">{{$haberim->text}}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <img class="img form-control" src="{{asset('/public/img/'.$haberim->image)}}">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="label-control text-danger" for="userinput4">Haberin kapak görselini değiştirmek için yeni resim seçin ve yükleyin</label>
                                            <input
                                                id="userinput4"
                                                type="file"
                                                name="image"
                                                class="btn btn-block btn-outline-pink form-control"
                                                accept="image/*"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <input type="hidden" name="id" value="{{$id}}">
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
@endsection
