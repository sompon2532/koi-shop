@extends('frontend.layouts.master')

@section('page_title')
    HOME
@endsection

@section('content')
	<div class="row"> 
        <div class="col-md-12">
            <div class="main-content text-center">

                <div class="title-box">
                    <h1>STOCK IN JAPAN</h1>
                </div>

                <h3 class="text-red"> SAKAI </h3>
                
                <div class="content-box">
                    <div class="row">
                        @for($i=0; $i<count($kois); $i++)
                            <div class="col-sm-6  col-md-3">
                                <div class="stock-item-box">
                                    <div class="img-item-box">  
                                    @if($images[$i]->model_id = $kois[$i]->id)
                                        <img src="/media/{{ $images[$i]->order_column }}/{{ $images[$i]->file_name }}" alt="..." class="img-responsive img-thumbnail" style="max-height:150px;">                                                                            
                                        <!-- <img class="img-thumbnail" src="{{-- $koi-> --}}" alt="..." style="max-height:150px;"> -->
                                    @endif
                                        <div class="star-label">
                                            <!-- <img class="" src="{{-- asset('assets/img/unstar.png') --}}" alt="...">-->
                                        </div>
                                    </div>  

                                    <p class="text-red">{{ $kois[$i]->id }}</p>
                                    <p>{{ $kois[$i]->id }}</p>
                                    <a class="btn btn-white" href="{{ route('frontend.koi.detail', ['id' => $kois[$i]->id]) }}">
                                        DETAIL
                                    </a>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div><!-- content-box -->
                <div class="row">
                        <p class="text-red text-right"> TOTAL : {{ count($kois) }} </p>
                </div>

            </div>
        </div>
    </div>
@endsection