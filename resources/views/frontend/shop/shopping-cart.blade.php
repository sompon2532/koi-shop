@extends('frontend.layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
        <div class="row"> 
            <div class="col-md-12">
                <div class="main-content text-center">
                    <div class="title-box">
                        <h1>{{ trans('cart.my-cart') }}</h1>
                    </div>
                    @if(Session::has('cart'))
                        <div class="content-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table ">
                                        <tr>
                                            <th class="text-center" colspan="2">{{ trans('cart.item') }}</th>
                                            <th class="text-center">{{ trans('cart.quantity') }}</th>
                                            <th class="text-center" colspan="2">{{ trans('cart.price') }}</th>
                                        </tr>

                                        @foreach($products as $product)
                                            <tr>
                                                <td>
                                                    @foreach($images as $image)
                                                        <img src="{{ $image->media->first()->where('model_id', $product['item']['id'])->where('collection_name', 'product')->first()->getUrl() }}" alt="..." class="img-thumbnail image-responsive" style="max-height:150px;">
                                                        @break
                                                    @endforeach
                                                </td>
                                                <td class="text-left">
                                                    <p class="text-red">{{ $product['item']['title'] }}</p>
                                                    <p>{{ trans('cart.code') }} : {{ $product['item']['id'] }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-red">
                                                        <div class="input-group col-md-4">
                                                            <span class="input-group-btn">
                                                                <a class="btn btn-qty-item" href="{{ route('frontend.shop.reduceByone', ['id' => $product['item']['id']]) }}">-</a>
                                                            </span>
                                                            <input type="text" class="form-control qty-item" placeholder="" value="{{ $product['qty'] }}">
                                                            <span class="input-group-btn">
                                                                <a class="btn btn-qty-item" href="{{ route('frontend.shop.reduceAddByone', ['id' => $product['item']['id']]) }}">+</a>
                                                            </span>
                                                        </div><!-- /input-group -->
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-red">{{ number_format($product['price']) }} {{ trans('cart.thb') }}</p>
                                                </td>
                                                <td>
                                                    <a href="{{ route('frontend.shop.remove', ['id' => $product['item']['id']]) }}" class="btn"><span class="glyphicon glyphicon glyphicon-remove text-red"></span></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        
                                        <tr bgcolor="#F5F5F5">
                                            <td class="text-right text-red table-border" colspan="2" bordercolor="#ccc">{{ trans('cart.subtotal') }}</td>
                                            <td class="text-red table-border"> {{ Session::has('cart') ? Session::get('cart')->totalQty : '0'}} </td>
                                            <td class="text-red table-border" colspan="2"> {{ number_format($totalPrice) }} {{ trans('cart.thb') }} </td>
                                        </tr>
                                        <tr>
                                            <td class="text-right text-red" colspan="2">{{ trans('cart.shipping') }}</td>
                                            <td class="text-red table-border"></td>
                                            <td class="text-red table-border" colspan="2"> {{ number_format($totalShip) }} {{ trans('cart.thb') }} </td>
                                        </tr>
                                        <tr bgcolor="#F5F5F5">
                                            <td class="text-right text-red table-border" colspan="3">{{ trans('cart.total') }}</td>
                                            <td class="text-red table-border" colspan="2"> {{ number_format($total) }} {{ trans('cart.thb') }} </td>
                                        </tr>
                                    </table>

                                    <!-- <a class="btn btn-red" href="#">
                                        ADD MORE ITEM
                                    </a> -->
                                    <a class="btn btn-red" href="{{ route('checkout') }}">
                                    {{ trans('cart.btn-checkout') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="main-content">
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3 text-center">
                                    <h2>No Items in Cart!</h2>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
@endsection