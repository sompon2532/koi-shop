@extends('frontend.layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
    @if(Session::has('cart'))
        <div class="row"> 
            <div class="col-md-12">
                <div class="mycart main-content text-center">
                    <div class="title-box">
                        <h1>MY CART</h1>
                    </div>
                    <div class="content-box">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table ">
                                    <tr>
                                        <th class="text-center" colspan="2">ITEM</th>
                                        <th class="text-center">QUANTITY</th>
                                        <th class="text-center" colspan="2">PRICE</th>
                                        <!-- <th class="text-center"></th> -->
                                    </tr>
                                    @foreach($products as $product)
                                    <tr>
                                        <td>
                                            {{-- dd($images) --}}
                                            @foreach($images as $image)
                                                <img src="{{ $image->media->first()->where('model_id', $product['item']['id'])->where('collection_name', 'product')->first()->getUrl() }}" alt="..." class="img-thumbnail image-responsive" style="max-height:150px;">
                                                @break
                                            @endforeach
                                            <!-- <img class="img-thumbnail" src="{{ asset('assets/img/map-koikichi.png') }}" alt="..." width="100"> -->
                                        </td>
                                        <td class="text-left">
                                            <p class="text-red">{{ $product['item']['title'] }}</p>
                                            <p>CODE : {{ $product['item']['id'] }}</p>
                                        </td>
                                        <td>
                                            <p class="text-red">
                                                <div class="input-group col-md-4">
                                                    <span class="input-group-btn">
                                                        <a class="btn btn-default" href="{{ route('frontend.shop.reduceByone', ['id' => $product['item']['id']]) }}">-</a>
                                                    </span>
                                                      <input type="text" class="form-control" placeholder="" value="{{ $product['qty'] }}">
                                                    <span class="input-group-btn">
                                                        <a class="btn btn-default" href="{{ route('frontend.shop.reduceAddByone', ['id' => $product['item']['id']]) }}">+</a>
                                                    </span>
                                                </div><!-- /input-group -->
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-red">{{ $product['price'] }} THB</p>
                                        </td>
                                        <td>
                                            <a href="{{ route('frontend.shop.remove', ['id' => $product['item']['id']]) }}" class="btn">x</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr bgcolor="#F5F5F5">
                                        <td class="text-right text-red table-border" colspan="2" bordercolor="#ccc">SUBTOTAL</td>
                                        <td class="text-red table-border"> {{ Session::has('cart') ? Session::get('cart')->totalQty : '0'}} </td>
                                        <td class="text-red table-border" colspan="2"> {{ $totalPrice }} THB </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right text-red" colspan="2">SHIPPING FEE</td>
                                        <td class="text-red table-border">  </td>
                                        <td class="text-red table-border" colspan="2"> 200 THB </td>
                                    </tr>
                                    <tr bgcolor="#F5F5F5">
                                        <td class="text-right text-red table-border" colspan="3">TOTAL</td>
                                        <td class="text-red table-border" colspan="2"> 2620 THB </td>
                                    </tr>
                                </table>

                                <a class="btn btn-red" href="#">
                                    ADD MORE ITEM
                                </a>
                                <a class="btn btn-red" href="{{ route('checkout') }}">
                                    CHECKOUT(PAYMENT)
                                </a>
                            </div>
                        </div>
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


@endsection