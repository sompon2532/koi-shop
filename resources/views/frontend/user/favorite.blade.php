{{--<!-- @extends('frontend.layouts.master') -->--}}
@extends('layouts.frontend.main')

@section('page_title', 'MY FAVORITE')

@section('custom-css')
@endsection

@section('content')
<div class="content-box">
    <div class="row">

        <div class="col-md-12 text-center">
            <div class="title-lf">
                <img class="img-responsive" src="{{ asset('frontend/src/img/Title-left.png') }}">
            </div>
            <div class="title-m">
                <div class="title-inm">
                    <h1 class="text-thick">{{trans('user.favorite')}}</h1>
                </div>
            </div>
            <div class="title-rg">
                <img class="img-responsive" src="{{ asset('frontend/src/img/Title-right.png') }}">
            </div>
        </div>

        <div class="col-md-8 col-md-offset-2">
            @if(count($favorites) > 0)

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th class="text-center"  colspan="2">{{trans('user.item')}}</th>
                            <!-- <th class="text-center">AVAILABILITY</th> -->
                            <th class="text-center">{{trans('user.price')}}</th>
                            <th class="text-center"></th>
                        </tr>

                        @if(count($kois)>0)
                            @foreach($kois as $index => $koi)
                                @if(count($koi->favorite)>0)
                                    <tr>
                                        <td width="20%">
                                            <a href="{{ route('frontend.koi.detail', ['id' => $koi->id]) }}">
                                                @if(count($koi->media)>0)
                                                    <img class="img-thumbnail" src="{{ asset($koi->media()->first()->getUrl()) }}" alt="..." width="100">
                                                @else
                                                    <img src="{{ asset('frontend/src/img/default-koi.jpg') }}" alt="..." class=" img-thumbnail" width="100">    
                                                @endif
                                            </a>                                                            
                                        </td>
                                        <td>
                                            <p class="text-red ">{{ $koi->name }}</p>
                                            <p >{{trans('user.code')}} : {{ $koi->koi_id }}</p>
                                        </td>
                                        <td>
                                            <p class="text-red text-center">{{ number_format($koi->price) }} THB</p>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-white" href="{{ route('frontend.koi.detail', ['id' => $koi->id]) }}">{{trans('user.detail')}}</a>
                                        </td>
                                    </tr>
                                    
                                @endif
                            @endforeach
                        @endif

                        @if(count($products)>0)
                            @foreach($products as $index => $product)
                                @if(count($product->favorite)>0)
                                    <tr>
                                        <td width="20%">
                                            <a href="{{ route('frontend.shop.detail', ['id' => $product->id]) }}">
                                                @if(count($product->media)>0)
                                                    <img src="{{ asset($product->media()->first()->getUrl()) }}" alt="..." class="img-thumbnail" width="100">
                                                @else
                                                    <img src="{{ asset('frontend/src/img/default-product.jpg') }}" alt="..." class=" img-thumbnail" width="100">
                                                @endif
                                            </a>                                                            
                                        </td>
                                        <td >
                                            <p class="text-red ">{{ $product->name }}</p>
                                            <p >{{trans('user.code')}} : {{ $product->product_id }}</p>
                                        </td>
                                        <td>
                                            <p class="text-red text-center">{{ number_format($product->price) }} THB</p>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-red" href="{{ route('frontend.shop.addToCart', ['id' => $product->id]) }}">{{trans('user.btn-order')}}</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endif
                    
                    </table>
                </div>
            @else
                <h1 class="text-center text-red">{{trans('user.no-favorite')}}</h1>
            @endif
        </div>
        
    </div>
</div>

@endsection

@section('customjs')

@endsection
