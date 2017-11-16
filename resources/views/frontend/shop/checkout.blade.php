@extends('frontend.layouts.master')

@section('title')
    Checkout
@endsection

@section('content')

    @if(Session::has('cart'))
    <div class="row"> 
            <div class="col-md-12">
                <div class="mycart main-content text-center">
                    <div class="title-box">
                        <h1>CHECKOUT</h1>
                    </div>
                    <div class="content-box">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table ">
                                    <tr>
                                        <th class="text-center" colspan="2">ITEM</th>
                                        <th class="text-center">QUANTITY</th>
                                        <th class="text-center">PRICE</th>
                                        <!-- <th class="text-center"></th> -->
                                    </tr>
                                    @foreach($products as $product)
                                    <tr>
                                        <td>
                                            <!-- <img class="img-thumbnail" src="{{ asset('assets/img/map-koikichi.png') }}" alt="..." width="100"> -->
                                            @foreach($images as $image)
                                                    <img src="{{ $image->media->first()->where('model_id', $product['item']['id'])->where('collection_name', 'product')->first()->getUrl() }}" alt="..." class="img-thumbnail image-responsive" style="max-height:150px;">
                                                @break
                                            @endforeach
                                        </td>
                                        <td class="text-left">
                                            <p class="text-red">{{ $product['item']['title'] }}</p>
                                            <p>CODE : {{ $product['item']['id'] }}</p>
                                        </td>
                                        <td>
                                            <p class="text-red">{{ $product['qty'] }}
                                                <!-- <div class="input-group col-md-4">
                                                    <span class="input-group-btn">
                                                        <a class="btn btn-default" href="{{-- route('fontend.product.reduceByone', ['id' => $product['item']['id']]) --}}">-</a>
                                                    </span>
                                                      <input type="text" class="form-control" placeholder="" value="{{ $product['qty'] }}">
                                                    <span class="input-group-btn">
                                                        <a class="btn btn-default" href="{{-- route('fontend.product.reduceAddByone', ['id' => $product['item']['id']]) --}}">+</a>
                                                    </span>
                                                </div> --><!-- /input-group -->
                                            </p>

                                        </td>
                                        <td>
                                            <p class="text-red">{{ $product['price'] }} THB</p>

                                        </td>
                                       <!--  <td>
                                               <a href="" class="btn">x</a>
                                        </td> -->
                                    </tr>
                                    @endforeach
                                    <tr bgcolor="#F5F5F5">
                                        <td class="text-right text-red table-border" colspan="2" bordercolor="#ccc">SUBTOTAL</td>
                                        <td class="text-red table-border"> {{ Session::has('cart') ? Session::get('cart')->totalQty : '0'}} </td>
                                        <td class="text-red table-border"> {{ $totalPrice }} THB </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right text-red" colspan="2">SHIPPING FEE</td>
                                        <td class="text-red table-border">  </td>
                                        <td class="text-red table-border"> xxx THB </td>
                                    </tr>
                                    <tr bgcolor="#F5F5F5">
                                        <td class="text-right text-red table-border" colspan="3">TOTAL</td>
                                        <td class="text-red table-border"> {{ $totalPrice }} THB </td>
                                    </tr>


                                </table>

                                <table class="table table-bordered text-center">
                                    <tr>
                                        <th class="text-center">ธนาคาร</th>
                                        <th class="text-center">ชื่อบัญชี</th>
                                        <th class="text-center">ประเภทบัญชี</th>
                                        <th class="text-center">สาขา</th>
                                        <th class="text-center">เลขที่บัญชี</th>
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

                                <!-- <a class="btn btn-red" href="#">
                                    ADD MORE ITEM
                                </a>
                                <a class="btn btn-red" href="#">
                                    PAYMENT
                                </a> -->
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3 clear-both"> -->
                        <h2 class="text-red">SHIPPING ADDRESS</h2>
                        <form action="{{ route('checkout') }}" method="post" id="checkout-form">
                            <div class="row">
                                <div class="col-xs-12 col-md-4 col-md-offset-4">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" id="name" class="form-control" required name="name">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-4 col-md-offset-4">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" id="address" class="form-control" required name="address">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-4 col-md-offset-4">
                                    <div class="form-group">
                                        <label for="card-name">Tel</label>
                                        <input type="text" id="Tel" class="form-control" name="tel" required>
                                    </div>
                                </div>
                            </div>
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-red">Buy now</button>
                        </form>
                    <!-- </div> -->
                </div>
            </div>
            @else
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                        <h2>No Items in Cart!</h2>
                    </div>
                </div>
            @endif

        <!-- <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
        	<h1>Checkout</h1>
        	<h4>Your Total: ${{-- $total --}}</h4>
    		
    	</div>	 -->	
	</div>
@endsection