@section('page_title', 'HOME')

@extends('frontend.layouts.master')

@section('custom-css')
@endsection

@section('content')
    <div class="main-content">
        <!-- <div class="container"> -->
            <div class="row">
                <div class="col-md-12">
                    <div class="top-box">
                        <img class="img-responsive"  src="{{ asset('frontend/src/img/LOGO-header.png') }}" alt="">      
                    </div>  
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    
                    <div class="input-group date" data-provide="datepicker">
                        <input type="text" class="form-control">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-9">
                    <div class="slide-box">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <img src="{{ asset('frontend/src/img/LOGO-header.png') }}" alt="...">
                                    <!-- <div class="carousel-caption">
                                        first carousel
                                    </div> -->
                                </div>
                                <div class="item">
                                    <img src="{{ asset('frontend/src/img/LOGO-header.png') }}" alt="...">
                                    <!-- <div class="carousel-caption">
                                        secound carousel
                                    </div> -->
                                </div>
                                <!-- ... -->
                            </div>

                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            </div>
                    </div>
                    <!-- <div class="panel panel-default">
                        <img class="img-responsive"  src="{{ asset('img/LOGO-header.png') }}" alt="">
                        
                        <div class="panel-heading">HOME PAGE</div>

                        <div class="panel-body">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                    
                                </div>
                            @endif

                            You are logged in!
                        </div>
                    </div> -->
                </div>
            </div>
        <!-- </div> --><!-- div.container -->
    </div>
@endsection

@section('custom-js')
<script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>

<script src="{{ asset('assets/bootstrap-datepicker-1.6.4-dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- /Applications/XAMPP/xamppfiles/htdocs/koi/public/assets/bootstrap-datepicker-1.6.4-dist/js/bootstrap-datepicker.min.js -->
@endsection
