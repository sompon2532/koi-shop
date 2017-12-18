@section('page_title', 'My Favorite')

@extends('frontend.layouts.master')

@section('custom-css')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="main-content col-md-10 col-md-offset-1">
            <div class="title-box text-center">
                <h1>{{ trans('user.favorite') }}</h1>
            </div>

            <div class="row">
                <div class="col-md-12">

                    @if(count($favorites->koi) > 0 || count($favorites->product) > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th class="text-center"  colspan="2">{{ trans('user.item') }}</th>
                                    <!-- <th class="text-center">AVAILABILITY</th> -->
                                    <th class="text-center">{{ trans('user.price') }}</th>
                                    <th class="text-center"></th>
                                </tr>
                                @if(count($favorites->koi) > 0)
                                    @foreach($favorites->koi as $favorite)  
                                        @foreach($kois as $koi)
                                            @if($koi->id == $favorite->id)
                                                <tr>
                                                    <td width="20%">
                                                        <a href="{{ route('frontend.koi.detail', ['id' => $koi->id]) }}">
                                                            <img class="img-thumbnail" src="{{ asset($koi->media()->first()->getUrl()) }}" alt="..." width="100">
                                                        </a>                                                            
                                                    </td>
                                                    <td class="">
                                                        <p class="text-red ">{{ $koi->name }}</p>
                                                        <p >{{ trans('user.code') }} : {{ $koi->koi_id }}</p>
                                                    </td>
                                                    <!-- <td>
                                                        <p class="text-red">IN STOCK</p>
                                                    </td> -->
                                                    <td>
                                                        <p class="text-red text-center">{{ number_format($koi->price) }} {{ trans('user.thb') }}</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <a class="btn btn-white" href="{{ route('frontend.koi.detail', ['id' => $koi->id]) }}">{{ trans('user.btn-detail') }}</a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endforeach
                                @endif

                                @if(count($favorites->product) > 0)
                                    @foreach($favorites->product as $favorite)  
                                        @foreach($products as $product)
                                            @if($product->id == $favorite->id)
                                                <tr>
                                                    <td width="20%">
                                                    <a href="{{ route('frontend.shop.addToCart', ['id' => $product->id]) }}">
                                                        <img class="img-thumbnail" src="{{ asset($product->media()->first()->getUrl()) }}" alt="..." width="100">
                                                    </a>                                                            
                                                    </td>
                                                    <td >
                                                        <p class="text-red ">{{ $product->name }}</p>
                                                        <p >{{ trans('user.code') }} : {{ $product->product_id }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="text-red text-center">{{ number_format($product->price) }} {{ trans('user.thb') }}</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <a class="btn btn-red" href="{{ route('frontend.shop.addToCart', ['id' => $product->id]) }}">{{ trans('user.btn-order') }}</a>
                                                    </td>
                                                </tr>
                                                @endif
                                        @endforeach
                                    @endforeach
                                @endif                                                

                            </table>
                        </div>
                    </div>
                @else
                    <h1>No item Favorite</h1>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection

@section('customjs')

@endsection
