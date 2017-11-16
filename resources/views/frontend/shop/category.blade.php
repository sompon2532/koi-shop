@extends('frontend.layouts.master')

@section('page_title')
    SHOP
@endsection

@section('content')
	@if(Session::has('success'))
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                <div id="charge-message" class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            </div>
        </div>
    @endif
	<div class="row">

		@foreach($products as $index => $product)
		  <div class="col-sm-6 col-md-3">
		    <div class="product text-center">
				<a href="{{ route('frontend.shop.detail', ['id' => $product->id]) }}">
		      		<img src="{{ asset($product->media->first()->getUrl()) }}" alt="..." class="img-thumbnail img-responsive">
		      	</a>
				<div class="caption">
					<p class="text-red">{{ $product->name }}</P>
					<p>CODE : {{ $product->product_id }}</p>
					<p><a href="{{ route('frontend.shop.addToCart', ['id' => $product->id]) }}" class="btn btn-white" role="button">ORDER</a></p>
				</div>
		    </div>
		  </div>
		@endforeach
	</div>
@endsection