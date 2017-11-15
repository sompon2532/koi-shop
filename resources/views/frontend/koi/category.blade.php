@extends('frontend.layouts.master')

@section('page_title')
    HOME
@endsection

@section('content')
	<div class="row"> 
        <div class="col-md-12">
            <div class="main-content text-center">

                <div class="title-box">

                    <h1>{{ $koiCategoty->name }}</h1>
                </div>

                <!-- <h3 class="text-red"> SAKAI </h3> -->
                
                <div class="content-box">
                    <div class="row">
                        @foreach($kois as $index => $koi)

                                <div class="col-sm-6  col-md-3">
                                    <div class="stock-item-box">
                                        <div class="img-item-box">  
                                            <img src="{{ asset($koi->media->first()->getUrl()) }}" alt="..." class="img-thumbnail image-responsive" style="max-height:150px;">

                                            <div class="star-label">
                                                <!-- <img class="" src="{{-- asset('assets/img/unstar.png') --}}" alt="...">-->
                                            </div>
                                        </div>  

                                        <p class="text-red">{{ $koi->name }}</p>
                                        <p>CODE : {{ $koi->koi_id }}</p>
                                        <a class="btn btn-white" href="{{ route('frontend.koi.detail', ['id' => $koi->id]) }}">
                                            DETAIL
                                        </a>
                                    </div>
                                </div>
                          
                        @endforeach

                    </div>
                </div><!-- content-box -->
                <div class="row">
                        <p class="text-red text-right"> TOTAL : {{ count($kois) }} </p>
                </div>

            </div>
        </div>
    </div>
@endsection