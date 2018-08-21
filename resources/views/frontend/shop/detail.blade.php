{{--<!-- @extends('frontend.layouts.master') -->--}}
@extends('layouts.frontend.main')

@section('page_title', 'PRODUCT')

@section('custom-css')
<style>
 .btn-favorite {
    background-color: transparent;
    padding: 0px;
    border: none;
}
.star-label {
    top: 0px;
}
</style>
@endsection

@section('content')
<div class="content-box text-center">
    <div class="row"> 
        <div class="col-md-12">

            <div class="title-box">
                <h1>PRODUCT</h1>
            </div>

            {{-- <!-- <h3 class="text-red"> SAKAI </h3>
            <P>KOI > KOI  IN JAPAN > SAKAI > {{ $products->name }}</P> --> --}}


            <div class="row">
                <br>
                <div class="col-md-3 col-md-offset-3">
                    <div class="slider slider-for">
                        @if(count($products->media)>0)
                            @foreach($products->media as $media)
                                <div>
                                    <a class="example-image-link" href="{{ $media->getUrl() }}" data-lightbox="thumb-1">
                                        <img class="example-image img-thumbnail" src="{{ $media->getUrl() }}" alt="..." style="">
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <img src="{{ asset('frontend/src/img/default-product.jpg') }}" alt="..." class="img-responsive img-thumbnail">
                        @endif
                    </div>                                    
                    @if(count($favorites) == 0)
                        <div class="star-label">
                            <form action="{{ route('frontend.user.favorite-add', ['id' => $products->id]) }}" method="GET" style="">  
                                <input type="hidden" name="item" value="{{ $products->id }}">
                                <input type="hidden" name="type" value="App\Models\Product">
                                <button type="submit" class="btn btn-favorite">
                                    <img class="" src="{{ asset('frontend/src/img/favorite.png') }}" alt="..." style="max-height:50px;">    
                                </button> 
                                {{ csrf_field() }}
                            </form>
                        </div>
                    @else
                        <div class="star-label">
                            <form action="{{ route('frontend.user.favorite-del', ['id' => $products->id, 'type' => 'App\Models\Product']) }}" method="GET">
                                <button type="submit" class="btn btn-favorite">
                                    <img class="" src="{{ asset('frontend/src/img/unfavorite.png') }}" alt="..." style="max-height:50px;">    
                                </button> 
                                {{ csrf_field() }}
                            </form>
                        </div>
                    @endif
                </div>                        
                <div class="col-md-6 text-left">
                    <p class="text-red">
                        <span class="heading">{{ trans('product.title') }}</span>
                        : {{ $products->name }}</p>
                    <p>
                        <span class="heading">{{ trans('product.code') }}</span>
                        : {{ $products->id }}</p>

                    <p>
                        <span class="heading">{{ trans('product.price') }}</span>
                        : {{ number_format($products->price) }} {{ trans('product.thb') }}</p>
                        
                    <p>
                        <span class="heading">{{ trans('product.shipping') }}</span>
                        : {{ $products->delivery }} {{ trans('product.thb') }}</p>

                    @if(count($products->remarks) > 0)
                        @foreach($products->remarks as $index => $remarks)
                            <p>
                                <span class="heading">{{ trans('koi.remark') }} {{ $index+1 }}</span>
                                : {{ $remarks->remark }} ({{$remarks->date}})</p>
                        @endforeach
                    @else
                        <p>
                            <span class="heading">{{ trans('koi.remark') }}</span>
                            : -</p>  
                    @endif

                    <div class="text-center-max992">
                        <a class="btn btn-white text-center" href="{{ route('frontend.shop.addToCart', ['id' => $products->id]) }}">
                        {{ trans('product.btn-order') }}
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2 col-md-offset-2">
                {{ trans('product.detail') }} :
                </div>
                <div class="col-md-7 text-left">
                    <p>
                        {{ $products->description }}
                    </p>
                </div>
            </div>
            <br>

            @if(count($products->media) > 1)
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="slider slider-nav">
                            @foreach($products->media as $media)
                                <div><img class="img-thumbnail" src="{{ $media->getUrl() }}" alt="..." style=""></div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            @if(count($products->videos) > 0)
                <div class="row">
                    <div class="col-md-12">
                        <section class="lazy slider" data-sizes="50vw">
                            @foreach($products->videos as $video)
                                <div>
                                    <h3 class="text-red">VIDEO ({{$video->date}})</h3>
                                    {!! $video->video !!}
                                </div>
                            @endforeach
                        </section>                                        
                    </div>
                </div>
            @endif


        </div>
    </div>
</div>

@endsection

@section('custom-js')

@endsection