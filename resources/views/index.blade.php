@extends('layouts.app')
@section('content')
    @include('parts.newstricker')
    @include('parts.post_block')
        <div class="container">
            <div class="row row-m">
                <!-- START MAIN CONTENT -->
                <div class="col-sm-8 col-p main-content">
                    <div class="theiaStickySidebar">
                        @include('parts.post_category_1')
                        @include('parts.adv')
                        @include('parts.post_category_2')
                    </div>
                </div>
                <!-- END OF /. MAIN CONTENT -->
                <!-- START SIDE CONTENT -->
                <div class="col-sm-4 col-p rightSidebar">
                    <div class="theiaStickySidebar">
                        @include('parts.weather')
                        @include('parts.social')
                        @include('parts.adv_2')
                        @include('parts.nav_tabs')
                    </div>
                </div>
                <!-- END OF /. SIDE CONTENT -->
            </div>
        </div>
        @include('parts.featured')
        @include('parts.youtube')
        <div class="container">
            <div class="row row-m">
                <div class="col-sm-8 main-content col-p">
                    <div class="theiaStickySidebar">
                        @include('parts.post_category_3')
                        @include('parts.adv')
                        @include('parts.card')
                    </div>
                </div>
                <div class="col-sm-4 rightSidebar col-p">
                    <div class="theiaStickySidebar">
                        @include('parts.game_result')
                        @include('parts.categories_widget')
                        @include('parts.adv_2')
                    </div>
                </div>
            </div>
        </div>
        <section class="articles-wrapper">
            <div class="container">
                <div class="row row-m">
                    <div class="col-sm-8 main-content col-p">
                        <div class="theiaStickySidebar">
                            @include('parts.post_category_4')
                        </div>
                    </div>
                    <div class="col-sm-4 rightSidebar col-p">
                        <div class="theiaStickySidebar">
                            @include('parts.archive')
                            @include('parts.poll')
                            @include('parts.tags')
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
