{{--<!-- @extends('frontend.layouts.master') -->--}}
@extends('layouts.frontend.main')

@section('page_title', 'CART')

@section('content')
    <div class="content-box text-center">
        <div class="row"> 
            <div class="col-md-12">
                <div class="title-lf">
                    <img class="img-responsive" src="{{ asset('frontend/src/img/Title-left.png') }}">
                </div>
                <div class="title-m">
                    <div class="title-inm">
                        <h1 class="text-thick">MY CART</h1>
                    </div>
                </div>
                <div class="title-rg">
                    <img class="img-responsive" src="{{ asset('frontend/src/img/Title-right.png') }}">
                </div>
            </div>

            <div class="col-md-12">
                @if(Session::has('cart'))
                    @if(count($products)>0)
                        <table class="table">
                            <tr>
                                <th class="text-center" colspan="2">ITEM</th>
                                <th class="text-center">QUANTITY</th>
                                <th class="text-center" colspan="2">PRICE</th>
                            </tr>
                                            
                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        @if(count($product['item']->media) > 0)
                                            <img src="{{ $product['item']->media->first()->getUrl() }}" alt="{{ $product['item']['title'] }}" class="img-thumbnail img-responsive" style="max-height:150px;">
                                        @else
                                            <img src="{{ asset('frontend/src/img/default-product.jpg') }}" class="img-thumbnail img-responsive" style="max-height:150px;">                                                                                                        
                                        @endif
                                    </td>
                                    <td class="text-left">
                                        <p class="text-red">{{ $product['item']['title'] }}</p>
                                        <p>CODE : {{ $product['item']['id'] }}</p>
                                    </td>
                                    <td>
                                        <div class="input-group col-md-4" style="margin:auto;">
                                            <span class="input-group-btn">
                                                <a class="btn btn-qty-item" href="{{ route('frontend.shop.reduceByone', ['id' => $product['item']['id']]) }}" onclick="return reduceByone({{$product['item']['id']}})">-</a>
                                            </span>
                                            <input type="text" class="form-control qty-item" id="qty-item{{$product['item']['id']}}" placeholder="" value="{{ $product['qty'] }}" onkeyup="changeQty({{$product['item']['id']}},{{$product['qty']}})">
                                            <span class="input-group-btn">
                                                <a class="btn btn-qty-item" href="{{ route('frontend.shop.reduceAddByone', ['id' => $product['item']['id']]) }}">+</a>
                                            </span>
                                        </div><!-- /input-group -->
                                    </td>
                                    <td>
                                        <p class="text-red">{{ number_format($product['price']) }} THB</p>
                                    </td>
                                    <td>
                                        <a href="{{ route('frontend.shop.remove', ['id' => $product['item']['id']]) }}" class="btn" onclick="return(confirm('DO YOU WANT TO REMOVE THIS ITME?'))"><span class="glyphicon glyphicon glyphicon-remove text-red"></span></a>
                                    </td>
                                </tr>
                            @endforeach
                                            
                            <tr bgcolor="#F5F5F5">
                                <td class="text-right text-red table-border" colspan="2" bordercolor="#ccc">SUB TOTAL</td>
                                <td class="text-red table-border"> {{ Session::has('cart') ? Session::get('cart')->totalQty : '0'}} </td>
                                <td class="text-red table-border" colspan="2"> {{ number_format($totalPrice) }} THB </td>
                            </tr>
                            <tr>
                                <td class="text-right text-red" colspan="2">SHIPPING FEE</td>
                                <td class="text-red table-border"></td>
                                <td class="text-red table-border" colspan="2"> {{ number_format($totalShip) }} THB</td>
                            </tr>
                            <tr bgcolor="#F5F5F5">
                                <td class="text-right text-red table-border" colspan="3">TOTAL</td>
                                <td class="text-red table-border" colspan="2"> {{ number_format($total) }} THB</td>
                            </tr>
                        </table>

                        {{--<!-- <a class="btn btn-red" href="#">
                            ADD MORE ITEM
                        </a> -->--}}
                        <a class="btn btn-red" href="{{ route('checkout') }}">
                            CHECKOUT
                        </a>
                    @else
                        <div class="main-content">
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3 text-center">
                                    <h2>NO ITEM IN CART.</h2>
                                </div>
                            </div>
                        </div>
                    @endif
                {{--<!-- @else
                    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3 text-center">
                        <h2>NO ITEM IN CART.</h2>
                    </div> -->--}}
                @endif
            </div>
        </div>
    </div>
@endsection
@section('custom-js')
<!-- <script>
    $('#qty-item').keyup(function(){
        var newQty = $('#qty-item').val();
        if(!parseInt(newQty)){
            alert('กรอกได้เฉพาะตัวเลขเท่านั้น');
            $('#qty-item').focus().val('');
        }
        
    });
    
</script> -->
<script>
    function reduceByone($key) {
        var qty = document.getElementById("qty-item"+$key).value;
        if(qty == 1){
            if(confirm("DO YOU WANT TO REMOVE THIS ITME?")==true){
                return true;
            }else{
                return false;                
            }
        }
    }
    
    function changeQty($key, $itemQty) {
        var qty = document.getElementById("qty-item"+$key).value;
        var itemQty = $itemQty;
        var id = $key;
        var regex=/^[0-9]+$/;
        var url = "{{ URL::to('/changeqty/') }}"

        if (qty != '' && !qty.match(regex)) // this is the code I need to change
        {
            alert("Must input numbers");
            document.getElementById("qty-item"+$key).value = itemQty;
            // return false;
        }else{
            if(qty != ''){
                return window.location.href= url+'/'+id+'/'+qty;
            }
        }

    }
</script>
@endsection