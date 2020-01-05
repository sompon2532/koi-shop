{{--<!-- @extends('frontend.layouts.master') -->--}}
@extends('layouts.frontend.main')

@section('page_title', 'CHECK OUT')

@section('content')

    @if(Session::has('cart'))
        <div class="content-box text-center">
            <div class="row"> 
                <div class="col-md-12">
                    <div class="title-lf">
                        <img class="img-responsive" src="{{ asset('frontend/src/img/Title-left.png') }}">
                    </div>
                    <div class="title-m">
                        <div class="title-inm">
                            <h1 class="text-thick">CHECKOUT</h1>
                        </div>
                    </div>
                    <div class="title-rg">
                        <img class="img-responsive" src="{{ asset('frontend/src/img/Title-right.png') }}">
                    </div>
                </div>

                <div class="col-md-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <div class="col-md-12">
                    <table class="table ">
                        <tr>
                            <th class="text-center" colspan="2">ITEM</th>
                            <th class="text-center">QUANTITY</th>
                            <th class="text-center">PRICE</th>
                        </tr>
                        @foreach($products as $product)
                            <tr>
                                <td>
                                    @if(count($product['item']->media) > 0)
                                        <img src="{{ $product['item']->media->first()->getUrl() }}" alt="..." class="img-thumbnail" style="max-height:150px;">
                                    @else
                                        <img src="{{ asset('frontend/src/img/default-product.jpg') }}" alt="..." class="img-thumbnail" style="max-height:150px;">                                                                                                        
                                    @endif
                                </td>
                                <td class="text-left">
                                    <p class="text-red">{{ $product['item']['title'] }}</p>
                                    <p>CODE : {{ $product['item']['id'] }}</p>
                                </td>
                                <td>
                                    <p class="text-red">{{ $product['qty'] }}</p>

                                </td>
                                <td>
                                    <p class="text-red">{{ number_format($product['price']) }} THB</p>
                                </td>
                            </tr>
                        @endforeach
                        <tr bgcolor="#F5F5F5">
                            <td class="text-right text-red table-border" colspan="2" bordercolor="#ccc">SUBTOTAL</td>
                            <td class="text-red table-border"> {{ Session::has('cart') ? Session::get('cart')->totalQty : '0'}} </td>
                            <td class="text-red table-border"> {{ number_format($totalPrice) }} THB </td>
                        </tr>
                        <tr>
                            <td class="text-right text-red" colspan="2">SHIPPING FEE</td>
                            <td class="text-red table-border">  </td>
                            <td class="text-red table-border"> {{ number_format($totalShip) }} THB </td>
                        </tr>
                        <tr bgcolor="#F5F5F5">
                            <td class="text-right text-red table-border" colspan="3">TOTAL</td>
                            <td class="text-red table-border"> {{ number_format($total) }} THB </td>
                        </tr>
                    </table>

                    <table class="table table-bordered text-center">
                        <tr>
                            <th class="text-center">BANK</th>
                            <th class="text-center">ACCOUNT NAME</th>
                            <th class="text-center">ACCOUNT TYPE</th>
                            <th class="text-center">BRANCH</th>
                            <th class="text-center">ACCOUNT NO.</th>
                        </tr>
                        <tr>
                            <td >ธนาคารกสิกรไทย</td>
                            <td>ธนัยชนถ ลิมปนุสรณ์ </td>
                            <td>ออมทรัพย์</td>
                            <td>ท่าน้ำราชวงศ์</td>
                            <td>606-2-01458-8</td>
                        </tr>
                        <tr>
                            <td>ธนาคารกรุงเทพ</td>
                            <td>ธนัยชนถ ลิมปนุสรณ์ </td>
                            <td>ออมทรัพย์</td>
                            <td>ท่าน้ำราชวงศ์</td>
                            <td>606-2-01458-8</td>
                        </tr>
                    </table>
                </div>
                    
                <h2 class="text-red">SHIPPING ADDRESS</h2>
                <form action="{{ route('checkout') }}" method="post" id="checkout-form">
                    <div class="row">
                        <div class="col-xs-12 col-md-4 col-md-offset-4">
                            <div class="form-group">
                                <label for="name">NAME</label>
                                <input type="text" id="name" class="form-control" required name="name" value="{{ count($user->name) > 0 ? $user->name : '' }}">
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-4 col-md-offset-4">
                            <div class="form-group">
                                <label for="address">ADDRESS</label>
                                <input type="text" id="address" class="form-control" required name="address" value="{{ count($user->address) > 0 ? $user->address->first()->address : '' }}">
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-md-4 col-md-offset-4">
                            <div class="form-group">
                                <label for="card-name">TEL.</label>
                                <input type="text" id="Tel" class="form-control" name="tel" required value="{{ count($user->address) > 0 ? $user->address->first()->tel : '' }}">
                            </div>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-red">BUY NOW</button>
                </form>
            </div>         
        </div>         
    {{--<!-- @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2>No Items in Cart!</h2>
            </div>
        </div> -->--}}
    @endif	
@endsection