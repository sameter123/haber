@extends('backend.layouts.master')
@section('content')
    <?php
    $u = DB::table('sayfalar')->where('id', $id)->first();
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
                                            <i class="feather icon-list mr-25"></i><span class="d-none d-sm-block">{{$u->title}} | Kategoriyi Düzenle</span>
                                        </a>
                                    </li>

                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                        <!-- users edit media object start -->
                                        <form method="POST" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="row">
                                                <div class="col-md-3 col-sm-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Başlık</label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   name="title"
                                                                   value="{{$u->title}}"
                                                                   placeholder="Kategori Başlığı">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Açıklama</label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   name="title_2"
                                                                   value="{{$u->title_2}}"
                                                                   placeholder="Kategori Açıklaması">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Görsel</label>
                                                            @if($u->image != '')
                                                                <img
                                                                    src="{{asset('/public/img/'.$u->image)}}"
                                                                    alt="{{$u->title}} resmi"
                                                                    class="users-avatar-shadow rounded"
                                                                    height="90"
                                                                    width="90"
                                                                >
                                                            @endif
                                                            <input type="file"
                                                                   accept="image/*"
                                                                   class="form-control"
                                                                   name="image"
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Bağlı olduğu kategori</label>
                                                            <select name="genel" class="form-control">
                                                                <option value="0" @if($u->genel == 1) selected @endif>Genel</option>
                                                                @foreach(DB::table('kategoriler')->where('genel', '0')->get() as $uu)
                                                                    <option value="{{$uu->id}}" @if($u->genel == $uu->id) selected @endif>{{$uu->title}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
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
