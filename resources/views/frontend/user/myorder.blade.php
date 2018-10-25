{{--<!-- @extends('frontend.layouts.master') -->--}}
@extends('layouts.frontend.main')

@section('page_title', 'MY ORDERS')

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
                    <h1 class="text-thick">MY ORDER</h1>
                </div>
            </div>
            <div class="title-rg">
                <img class="img-responsive" src="{{ asset('frontend/src/img/Title-right.png') }}">
            </div>
        </div>

        @if(Session::has('error'))
			<div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3 text-center">
				<div class="alert alert-danger" role="alert">
					{{ Session::get('error') }}
				</div>
			</div>
		@endif
        @if(Session::has('success'))
			<div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3 text-center">
				<div class="alert alert-success" role="alert">
					{{ Session::get('success') }}
				</div>
			</div>
		@endif

        @foreach($orders as $order)                            
            <div class="info-box">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-info-box">
                            <div class="row">
                                <div class="col-md-8">
                                    <p>ORDER NO. : #{{ $order->id }}</p>
                                    <p>DATE : {{ $order->created_at->format('d/m/Y') }}</p>
                                </div>
                                <div class="col-md-4 text-right">
                                    {!! $order->transaction->status == 0 ? "<p class='text-red'>NOT PAID</p>" : "WAITING FOR INSPECTION"!!} 
                                    <p>TOTAL : {{ number_format($order->total) }} THB</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="content-info-box">
                            <div class="row">
                                @foreach($order->products as $product)
                                    <div class="col-md-6 orders-detail">
                                        <div class="col-md-4">
                                            @if(count($product->media)>0)
                                                <img class="img-thumbnail" src="{{ $product->media->first()->getUrl() }}" alt="{{ $product->name }}">
                                            @else
                                                <img class="img-thumbnail" src="{{ asset('frontend/src/img/default-koi.jpg') }}" style="max-height:150px;">
                                            @endif
                                        </div>
                                        <div class="col-md-8">
                                            <p class="text-red">{{ $product->name }}</p>
                                            <p>CODE : {{ $product->id }}</p>
                                        </div>
                                    </div>
                                @endforeach
                                @if($order->transaction->status == 0)
                                    <div class="col-md-12 text-center">
                                        <a class="btn btn-red" href="{{ route('frontend.payment.payment', ['id' => $order->id]) }}">
                                            PAYMENT
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
@endsection
