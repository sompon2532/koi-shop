{{--<!-- @extends('frontend.layouts.master') -->--}}
@extends('layouts.frontend.main')

@section('page_title', 'MY PORT')

@section('content')
<div class="content-box text-center">
	<div class="row"> 
    <div class="col-md-12">
            <div class="title-lf">
                <img class="img-responsive" src="{{ asset('frontend/src/img/Title-left.png') }}">
            </div>
            <div class="title-m">
                <div class="title-inm">
                    <h1 class="text-thick">MY PORT</h1>
                </div>
            </div>
            <div class="title-rg">
                <img class="img-responsive" src="{{ asset('frontend/src/img/Title-right.png') }}">
            </div>
        </div> 

        <div class="col-md-12">
            @foreach($kois as $koi)
                <div class="col-sm-6  col-md-3">
                    <div class="stock-item-box">
                        <div class="img-item-box">  
                            <a href="{{ route('frontend.user.myport-koi', ['id' => $koi->id]) }}">
                                @if(count($koi->media)>0)
                                    <img src="{{ asset($koi->media->first()->getUrl()) }}" alt="..." class="img-thumbnail image-responsive" style="max-height:150px;">
                                @else
                                    <img src="{{ asset('frontend/src/img/default-koi.jpg') }}" alt="..." class="img-thumbnail image-responsive" style="max-height:150px;">                                                
                                @endif
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

        <div class="col-md-12">
                <p class="text-red text-right"> {{ trans('user.total') }} : {{ count($kois) }} </p>
        </div>                
    </div>
</div>
@endsection