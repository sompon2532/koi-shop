{{--<!-- @extends('frontend.layouts.master') -->--}}
@extends('layouts.frontend.main')

@section('page_title', 'MY PORT')

@section('custom-css')

@endsection

@section('content')
<div class="content-box text-center">
    <div class="row"> 
        
        <div class="col-md-12">
            <div class="title-box">
                <h1>{{ trans('user.myport') }}</h1>
            </div>
        </div>

        <br/>
        <div class="col-md-5 col-md-offset-1">
            <div class="slider slider-for">
                @if(count($kois->media) > 0)
                    @foreach($kois->media as $media)
                        <div>
                            <a class="example-image-link" href="{{ asset($media->getUrl()) }}" data-lightbox="thumb-1">
                                <img class="example-image img-thumbnail" src="{{ asset($media->getUrl()) }}" alt="..." style="">
                            </a>
                        </div>
                    @endforeach
                @else
                    <img src="{{ asset('frontend/src/img/default-koi.jpg') }}" alt="..." class="img-responsive">                                                
                @endif  
            </div>
            @if(count($kois->media) > 1)                            
                <div class="item">
                    <div class="slider slider-nav">
                        @foreach($kois->media as $media)
                            <img src="{{ asset($media->getUrl()) }}" class="img-thumbnail">    
                        @endforeach
                    </div>
                </div> 
            @endif
        </div>

        <div class="col-md-6 text-left">
            <p class="text-red" style="font-weight:bold;">{{ $kois->name }}</p>
            <p class="text-red">{{-- $products->title --}}</p>
            <p>
                <span class="heading">{{ trans('koi.code') }}</span>
                : {{ $kois->koi_id }}</p>
            <p>
                <span class="heading">{{ trans('koi.price') }}</span>
                : {{ number_format($kois->price) }} {{ trans('koi.thb')}}</p>
            <br>

            <p class="text-red">{{ trans('koi.detail')}}</p>
            <p>
                <span class="heading">{{ trans('koi.oyagoi') }} </span>
                : {{ $kois->oyagoi }} </p>
            <p>
                <span class="heading">{{ trans('koi.strain') }}</span>
                : {{ $kois->strain->name }} </p>
            <p>
                <span class="heading">{{ trans('koi.farm') }}</span>
                : {{ $kois->farm->name }}</p>
            <p>
                <span class="heading">{{ trans('koi.born') }} </span>
                : {{ $kois->born }}</p>
            <p>
                <span class="heading">{{ trans('koi.storage') }}</span>
                : {{ $kois->store != null ? $kois->store->name : '-' }}</p>

            @if(count($kois->sizes) > 0)
                @foreach($kois->sizes as $sizes)
                    <p>
                        <span class="heading">{{ trans('koi.size') }}</span>
                        : {{ $sizes->size }} ({{$sizes->date}})</p>
                @endforeach
            @else
                <p>{{ trans('koi.size') }} : -</p>
            @endif

            <p>
                <span class="heading">{{ trans('koi.gender')}}</span>
                : {{ $kois->sex }}</p>
            <p>
                <span class="heading">{{ trans('koi.certificate') }}</span>
                : {{ $kois->certificate ? trans('koi.yes') : trans('koi.no') }} </p>
            
            @if(count($kois->contests) > 0)
                @foreach($kois->contests as $index => $contests)
                    <p>
                        <span class="heading">{{ trans('koi.contest') }} {{ $index+1 }}</span>
                        : {{ $contests->contest }} ({{$contests->date}})</p>
                @endforeach
            @else
                <p>
                    <span class="heading">{{ trans('koi.contest') }}</span>
                    : - </p>                                    
            @endif

            @if(count($kois->remarks) > 0)
                @foreach($kois->remarks as $index => $remarks)
                    <p>
                        <span class="heading">{{ trans('koi.remark') }} {{ $index+1 }}</span>
                        : {{ $remarks->remark }}</p>
                @endforeach
            @else
                <p>
                    <span class="heading">{{ trans('koi.remark') }}</span>
                    : - </p>  
            @endif
        </div>

        @if(count($kois->videos) > 0)
            <div class="col-md-12 koi-videos">
                <section class="lazy slider" data-sizes="50vw">
                    @foreach($kois->videos as $video)
                        <div>
                            <h3 class="text-red">VIDEO ({{$video->created_at->format('Y-m-d')}})</h3>
                            {!! $video->video !!}
                        </div>
                    @endforeach
                </section>                                        
            </div>
        @endif

    </div>
</div>
@endsection

@section('custom-js')

@endsection