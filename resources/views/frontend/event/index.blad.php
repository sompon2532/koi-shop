@section('page_title', 'EVENTS')

@extends('frontend.layouts.master')

@section('custom-css')
@endsection

@section('content')
<section id="main">
    <div class="container">
        <div class="row"> 
            <div class="col-md-12">
                <div class="main-content text-center">

                    <div class="title-box">
                        <h1>EVENTS</h1>
                    </div>


                    <div class="content-box">
                        <div class="row">
                            <div class="col-md-6">
                                <img class="img-thumbnail img-responsive" src="{{ asset('assets/img/map-koikichi.png') }}" alt="...">

                            </div>
                            <div class="col-md-6">
                                <div class="center">
                                    <h4 class="text-red">NEW EVENT !</h4>
                                    <p>CHUGOKU AUCTION WEEK</p>
                                    <p>16-22 SEPTEMBER 17</p>
                                </div>
                            </div>


                            <div class="col-md-12">

                                <h4 class="text-red">PAST EVENTS</h4>

                                <div class="col-md-4">
                                    <img class="img-thumbnail img-responsive" src="{{ asset('assets/img/map-koikichi.png') }}" alt="...">                                    
                                    <p>CHUGOKU AUCTION WEEK</p>
                                    <p>16-22 SEPTEMBER 17</p>
                                </div>
                                <div class="col-md-4">
                                    <img class="img-thumbnail img-responsive" src="{{ asset('assets/img/map-koikichi.png') }}" alt="...">                                    
                                    <p>CHUGOKU AUCTION WEEK</p>
                                    <p>16-22 SEPTEMBER 17</p>
                                </div>
                                <div class="col-md-4">
                                    <img class="img-thumbnail img-responsive" src="{{ asset('assets/img/map-koikichi.png') }}" alt="...">                                    
                                    <p>CHUGOKU AUCTION WEEK</p>
                                    <p>16-22 SEPTEMBER 17</p>
                                </div>
                                <div class="col-md-4">
                                    <img class="img-thumbnail img-responsive" src="{{ asset('assets/img/map-koikichi.png') }}" alt="...">                                    
                                    <p>CHUGOKU AUCTION WEEK</p>
                                    <p>16-22 SEPTEMBER 17</p>
                                </div>
                                <div class="col-md-4">
                                    <img class="img-thumbnail img-responsive" src="{{ asset('assets/img/map-koikichi.png') }}" alt="...">                                    
                                    <p>CHUGOKU AUCTION WEEK</p>
                                    <p>16-22 SEPTEMBER 17</p>
                                </div>
                                <div class="col-md-4">
                                    <img class="img-thumbnail img-responsive" src="{{ asset('assets/img/map-koikichi.png') }}" alt="...">                                    
                                    <p>CHUGOKU AUCTION WEEK</p>
                                    <p>16-22 SEPTEMBER 17</p>
                                </div>

                                <p class="text-red text-right">TOTAL : 24</p>
                            </div>

                           

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('custom-js')
@endsection