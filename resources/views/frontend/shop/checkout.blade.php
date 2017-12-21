@extends('frontend.layouts.master')

@section('title')
    Checkout
@endsection

@section('content')

    @if(Session::has('cart'))
    <div class="row"> 
            <div class="col-md-12">
                <div class="main-content text-center">
                    <div class="title-box">
                        <h1>{{ trans('cart.checkout') }}</h1>
                    </div>
                    <div class="content-box">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table ">
                                    <tr>
                                        <th class="text-center" colspan="2">{{ trans('cart.item') }}</th>
                                        <th class="text-center">{{ trans('cart.quantity') }}</th>
                                        <th class="text-center">{{ trans('cart.price') }}</th>
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
                                            <p class="text-red">{{ $product['qty'] }}</p>

                                        </td>
                                        <td>
                                            <p class="text-red">{{ $product['price'] }} {{ trans('cart.thb') }}</p>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr bgcolor="#F5F5F5">
                                        <td class="text-right text-red table-border" colspan="2" bordercolor="#ccc">{{ trans('cart.subtotal') }}</td>
                                        <td class="text-red table-border"> {{ Session::has('cart') ? Session::get('cart')->totalQty : '0'}} </td>
                                        <td class="text-red table-border"> {{ $totalPrice }} {{ trans('cart.thb') }} </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right text-red" colspan="2">{{ trans('cart.shipping') }}</td>
                                        <td class="text-red table-border">  </td>
                                        <td class="text-red table-border"> {{ $totalShip }} {{ trans('cart.thb') }} </td>
                                    </tr>
                                    <tr bgcolor="#F5F5F5">
                                        <td class="text-right text-red table-border" colspan="3">{{ trans('cart.total') }}</td>
                                        <td class="text-red table-border"> {{ $total }} {{ trans('cart.thb') }} </td>
                                    </tr>
                                </table>

                                <table class="table table-bordered text-center">
                                    <tr>
                                        <th class="text-center">{{ trans('cart.bank') }}</th>
                                        <th class="text-center">{{ trans('cart.account-name') }}</th>
                                        <th class="text-center">{{ trans('cart.account-type') }}</th>
                                        <th class="text-center">{{ trans('cart.branch') }}</th>
                                        <th class="text-center">{{ trans('cart.account-no') }}</th>
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
                        </div>
                    </div>
                    
                    <h2 class="text-red">{{ trans('cart.shipping-add') }}</h2>
                    <form action="{{ route('checkout') }}" method="post" id="checkout-form">
                        <div class="row">
                            <div class="col-xs-12 col-md-4 col-md-offset-4">
                                <div class="form-group">
                                    <label for="name">{{ trans('cart.name') }}</label>
                                    <input type="text" id="name" class="form-control" required name="name" value="{{ count($user->name) > 0 ? $user->name : '' }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-4 col-md-offset-4">
                                <div class="form-group">
                                    <label for="address">{{ trans('cart.address') }}</label>
                                    <input type="text" id="address" class="form-control" required name="address" value="{{ count($user->adresses) > 0 ? $user->adresses->first()->address : '' }}">
                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-md-4 col-md-offset-4">
                                <div class="form-group">
                                    <label for="card-name">{{ trans('cart.tel') }}</label>
                                    <input type="text" id="Tel" class="form-control" name="tel" required>
                                </div>
                            </div>
                        </div>
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-red">{{ trans('cart.btn-buy') }}</button>
                    </form>
                </div>
            </div>
            @else
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                        <h2>No Items in Cart!</h2>
                    </div>
                </div>
            @endif	
	</div>
@endsection