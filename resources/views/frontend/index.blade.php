@section('page_title', 'HOME')

@extends('frontend.layouts.master')

@section('custom-css')
@endsection

@section('content')
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="top-box">
                    <img class="img-responsive"  src="{{ asset('frontend/src/img/LOGO-header.png') }}" alt="">      
                </div>  
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                
                <!-- <div class="input-group date" data-provide="datepicker">
                    <input type="text" class="form-control">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                </div> -->
                
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
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="/media/{{ $images[0]->order_column}}/{{ $images[0]->file_name}}" alt="..." class="image-responsive"style="max-height:150px;">
                            </div>
                            @for($i=1;$i<count($images);$i++)
                                <div class="item">
                                    <img src="/media/{{ $images[$i]->order_column}}/{{ $images[$i]->file_name}}" alt="..." class="image-responsive"style="max-height:150px;">
                                </div>
                            @endfor
                           
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
            </div>
        </div>
    </div>
@endsection

@section('custom-js')

@endsection
