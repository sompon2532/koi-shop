@extends('frontend.layouts.master')

@section('page_title')
    My Port
@endsection

@section('content')
	<div class="row"> 
        <div class="col-md-12">
            <div class="main-content text-center">

                <div class="title-box">
                    <h1>{{ trans('user.myport') }}</h1>
                </div>       

                <div class="content-box">
                    <div class="row">
                        @foreach($kois as $koi)
                            <div class="col-sm-6  col-md-4">
                                <div class="stock-item-box">
                                    <div class="img-item-box">  
                                        <a href="{{ route('frontend.user.myport-koi', ['id' => $koi->id]) }}">
                                            <img src="{{ asset($koi->media->first()->getUrl()) }}" alt="..." class="img-thumbnail image-responsive" style="max-height:150px;">
                                        </a>
                                    </div>  
                                    <p class="text-red">{{ $koi->name }}</p>
                                    <a class="btn btn-white" href="{{ route('frontend.user.myport-koi', ['id' => $koi->id]) }}">
                                        {{ trans('user.btn-detail') }}
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div><!-- content-box -->
                <div class="row">
                        <p class="text-red text-right"> {{ trans('user.total') }} : {{ count($kois) }} </p>
                </div>         
                
        </div>
    </div>
@endsection