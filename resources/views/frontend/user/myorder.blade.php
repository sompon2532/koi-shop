@section('page_title', 'My Orders')

@extends('frontend.layouts.master')

@section('custom-css')
@endsection

@section('content')
<section id="main">
    <div class="container">
        <div class="row"> 
            <div class="col-md-12">
                <div class="main-content">
                    <div class="row">
                        <div class="title-box text-center">
                            <h1>{{ trans('user.myorder') }}</h1>
                        </div>

                        <div class="content-box">
                            @foreach($orders as $order)
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-md-12">
                                            
                                            <div class="title-info-box">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <p>{{ trans('user.order-num') }} : #{{ $order->id }}</p>
                                                        <p>{{ trans('user.date') }} : {{ $order->created_at->formatLocalized('%d %B %Y') }}</p>
                                                    </div>
                                                    <div class="col-md-4 text-right">
                                                        {!! $order->transaction->status == 0 ? "<p class='text-red'>ยังไม่ชำระเงิน</p>" : "ชำระเงินแล้ว"!!}
                                                        <p>{{ trans('user.total') }} : {{ number_format($order->totalPrice) }} {{ trans('user.thb') }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="content-info-box">
                                                <div class="row">
                                                    @foreach($order->products as $product)
                                                    <div class="col-md-6 orders-detail">
                                                            <div class="col-md-4">
                                                                @if(count($product->media)>0)
                                                                    <img class="img-thumbnail" src="{{ $product->media->first()->getUrl() }}" alt="...">
                                                                @else
                                                                    <img class="img-thumbnail" src="{{ asset('frontend/src/img/product-defalt-img.jpg') }}" alt="..." style="max-height:150px;">
                                                                @endif
                                                            </div>
                                                            <div class="col-md-8">
                                                                <p class="text-red">{{ $product->name }}</p>
                                                                <p>{{ trans('user.code') }} : {{ $product->id }}</p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    @if($order->transaction->status == 0)
                                                        <div class="col-md-12 text-center">
                                                            <a class="btn btn-red" href="{{ route('frontend.payment.payment', ['id' => $order->id]) }}">
                                                                {{ trans('user.btn-payment') }}
                                                            </a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>  

                                        </div>
                                    </div>
                                </div> <!-- info-box -->
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
