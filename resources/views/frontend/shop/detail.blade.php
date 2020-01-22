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
    right: 15px;
}
</style>
@endsection

@section('content')
<div class="content-box text-center">
    <div class="row"> 

        <div class="col-md-12">
            <div class="title-lf">
                <img class="img-responsive" src="{{ asset('frontend/src/img/Title-left.png') }}">
            </div>
            <div class="title-m">
                <div class="title-inm">
                    <h3 class="text-thick">{{ $product->name }}</h3>
                </div>
            </div>
            <div class="title-rg">
                <img class="img-responsive" src="{{ asset('frontend/src/img/Title-right.png') }}">
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="menu-box">
                <div class="thumbnail">
                    @if(count($product->media)>0)
                        @foreach($product->media as $media)
                            <div>
                                <a class="example-image-link" href="{{ $media->getUrl() }}" data-lightbox="thumb-1">
                                    <img src="{{ asset($product->media->where('collection_name', 'product')->first()->getUrl()) }}" alt="{{$product->name}}" class="img-responsive"> 
                                </a>
                            </div>
                        @endforeach
                    @else
                        <img src="{{ asset('frontend/src/img/default-product.jpg') }}" class="img-responsive img-thumbnail">
                    @endif
                    <div class="star-label">
                        @if(count($product->favorite) > 0)
                            <form action="{{ route('frontend.user.favorite-del', ['id' => $product->id, 'type' => 'App\Models\Product']) }}" method="GET">
                                <button type="submit" class="btn btn-favorite">
                                    <img class="" src="{{ asset('frontend/src/img/unfavorite.png') }}" alt="favorite" style="max-height:50px;">    
                                </button> 
                                {{ csrf_field() }}
                            </form>
                        @else
                            <form action="{{ route('frontend.user.favorite-add', ['id' => $product->id]) }}" method="GET">  
                                <input type="hidden" name="item" value="{{ $product->id }}">
                                <input type="hidden" name="type" value="App\Models\Product">
                                <button type="submit" class="btn btn-favorite">
                                    <img class="" src="{{ asset('frontend/src/img/favorite.png') }}" alt="unfavorite" style="max-height:50px;">    
                                </button> 
                                {{ csrf_field() }}
                            </form>
                        @endif
                    </div>     
                    <div class="menu-title-box text-center">
                        <p>{{$product->name}}</p>                                        
                    </div>
                </div>
            </div>
            {{--<!-- @if(count($product->media)>0)
                @foreach($product->media as $media)
                    <div>
                        <a class="example-image-link" href="{{ $media->getUrl() }}" data-lightbox="thumb-1">
                            <img class="example-image img-thumbnail" src="{{ $media->getUrl() }}" alt="..." style="">
                        </a>
                    </div>
                @endforeach
            @else
                <img src="{{ asset('frontend/src/img/default-product.jpg') }}" alt="..." class="img-responsive img-thumbnail">
            @endif -->--}}
        </div>
        <div class="col-md-9 text-left">
            <p class="text-thick" style="color:#999;">
                {{trans('product.code')}} : {{ $product->id }}</p>
            <p class="text-red text-thick">
                {{trans('product.price')}} : {{ number_format($product->price) }} {{trans('product.thb')}}</p>
            <p>
                <span class="text-thick">{{trans('product.detail')}} :</span> {{ $product->description }}</p>
                
            {{--<!-- <a class="btn btn-white text-center" href="{{ route('frontend.shop.addToCart', ['id' => $product->id]) }}">
                {{trans('product.btn-order')}}
            </a> -->--}}
        </div>

        {{-- <!-- <h3 class="text-red"> SAKAI </h3>
        <P>KOI > KOI  IN JAPAN > SAKAI > {{ $products->name }}</P> --> --}}

        {{--<!-- <div class="col-md-12">
            <br>
            <div class="col-md-3 col-md-offset-3">
                <div class="slider slider-for">
                    @if(count($product->media)>0)
                        @foreach($product->media as $media)
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
                <div class="star-label">
                    @if(count($product->favorite) > 0)
                        <form action="{{ route('frontend.user.favorite-del', ['id' => $product->id, 'type' => 'App\Models\Product']) }}" method="GET">
                            <button type="submit" class="btn btn-favorite">
                                <img class="" src="{{ asset('frontend/src/img/unfavorite.png') }}" alt="..." style="max-height:50px;">    
                            </button> 
                            {{ csrf_field() }}
                        </form>
                    @else
                        <form action="{{ route('frontend.user.favorite-add', ['id' => $product->id]) }}" method="GET" style="">  
                            <input type="hidden" name="item" value="{{ $product->id }}">
                            <input type="hidden" name="type" value="App\Models\Product">
                            <button type="submit" class="btn btn-favorite">
                                <img class="" src="{{ asset('frontend/src/img/favorite.png') }}" alt="..." style="max-height:50px;">    
                            </button> 
                            {{ csrf_field() }}
                        </form>
                    @endif
                </div>                        
            </div>                        
            <div class="col-md-6 text-left">
                <p class="text-red">
                    <span class="heading">{{ trans('product.title') }}</span>
                    : {{ $product->name }}</p>
                <p>
                    <span class="heading">{{ trans('product.code') }}</span>
                    : {{ $product->id }}</p>

                <p>
                    <span class="heading">{{ trans('product.price') }}</span>
                    : {{ number_format($product->price) }} {{ trans('product.thb') }}</p>
                    
                <p>
                    <span class="heading">{{ trans('product.shipping') }}</span>
                    : {{ $product->delivery }} {{ trans('product.thb') }}</p>

                @if(count($product->remarks) > 0)
                    @foreach($product->remarks as $index => $remarks)
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
                    <a class="btn btn-white text-center" href="{{ route('frontend.shop.addToCart', ['id' => $product->id]) }}">
                    {{ trans('product.btn-order') }}
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="col-md-2 col-md-offset-2">
            {{ trans('product.detail') }} :
            </div>
            <div class="col-md-7 text-left">
                <p>
                    {{ $product->description }}
                </p>
            </div>
        </div>
        <br>

        @if(count($product->media) > 1)
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="slider slider-nav">
                        @foreach($product->media as $media)
                            <div>
                                <img class="img-thumbnail" src="{{ $media->getUrl() }}" alt="..." style="">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        @if(count($product->videos) > 0)
            <div class="row">
                <div class="col-md-12">
                    <section class="lazy slider" data-sizes="50vw">
                        @foreach($product->videos as $video)
                            <div>
                                <h3 class="text-red">VIDEO ({{$video->date}})</h3>
                                {!! $video->video !!}
                            </div>
                        @endforeach
                    </section>                                        
                </div>
            </div>
        @endif -->--}}

    </div>
</div>

@endsection

@section('custom-js')

@endsection