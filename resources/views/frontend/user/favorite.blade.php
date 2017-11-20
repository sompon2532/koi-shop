@section('page_title', 'My Favorite')

@extends('frontend.layouts.master')

@section('custom-css')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="favourite-koi">
                <div class="info-box">
                    <div class="title-box text-center">
                        <h1>FAVOURITE</h1>
                    </div>

                    <div class="row">
                        <div class="col-md-12">

                            @if(count($favorites) > 0)
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th class="text-center"  colspan="2">ITEM</th>
                                            <!-- <th class="text-center">AVAILABILITY</th> -->
                                            <th class="text-center">PRICE</th>
                                            <th class="text-center"></th>
                                        </tr>
                                        @foreach($favorites as $favorite)
                                            @if($favorite->type == 'koi')                                        
                                                @foreach($kois as $koi)
                                                    @if($koi->id == $favorite->item_id)
                                                        <tr>
                                                            <td width="20%">
                                                                <img class="img-thumbnail" src="{{ asset($koi->media()->first()->getUrl()) }}" alt="..." width="100">
                                                            </td>
                                                            <td class="">
                                                                <p class="text-red ">{{ $koi->name }}</p>
                                                                <p >CODE : {{ $koi->koi_id }}</p>
                                                            </td>
                                                            <!-- <td>
                                                                <p class="text-red">IN STOCK</p>
                                                            </td> -->
                                                            <td>
                                                                <p class="text-red text-center">{{ number_format($koi->price) }} THB</p>
                                                            </td>
                                                            <td class="text-center">
                                                                <a class="btn btn-white" href="{{ route('frontend.koi.detail', ['id' => $koi->id]) }}">DETAIL</a>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                @endforeach
                                            @elseif($favorite->type == 'product')
                                                @foreach($products as $product)
                                                    @if($product->id == $favorite->item_id)
                                                        <tr>
                                                            <td width="20%">
                                                                <img class="img-thumbnail" src="{{ asset($product->media()->first()->getUrl()) }}" alt="..." width="100">
                                                            </td>
                                                            <td class="">
                                                                <p class="text-red ">{{ $product->name }}</p>
                                                                <p >CODE : {{ $product->product_id }}</p>
                                                            </td>
                                                            <!-- <td>
                                                                <p class="text-red">IN STOCK</p>
                                                            </td> -->
                                                            <td>
                                                                <p class="text-red text-center">{{ number_format($product->price) }} THB</p>
                                                            </td>
                                                            <td class="text-center">
                                                                <a class="btn btn-red" href="{{ route('frontend.shop.addToCart', ['id' => $product->id]) }}">ORDER</a>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                @endforeach
                                            @endif                                                
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        @else
                            <h1>No item Favorite</h1>
                        @endif

                    </div>
                    <!-- <tr>
                                        <td>
                                            <img class="img-thumbnail" src="{{ asset('assets/img/map-koikichi.png') }}" alt="..." width="100">
                                        </td>
                                        <td>
                                            <p class="text-red">ERUBAJYU 100g</p>
                                            <p>CODE : 123456</p>
                                        </td>
                                        <td>
                                            <p class="text-red">OUT OF STOCK</p>
                                        </td>
                                        <td>
                                            <p class="text-red">800 THB</p>
                                        </td>
                                        <td>
                                            <a class="btn btn-attocart btn-noative" disabled="disabled" href="#">
                                                AT TO CART
                                            </a>
                                        </td>
                                    </tr> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('customjs')

@endsection
