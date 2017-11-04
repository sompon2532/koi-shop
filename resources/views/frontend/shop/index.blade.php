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
<?php
dd($products);
?>
		@foreach($products as $product)
		  <div class="col-sm-6 col-md-3">
		    <div class="product thumbnail text-center">
		      <img src="/media/{{ $images[$product->id]->order_column }}/{{ $images[$product->id]->file_name }}" alt="..." class="img-responsive">
		      <div class="caption">
		        <p class="text-red">{{ $product->product_id }}</P>
		        <p>{{ $product->slug }}</p>
		        <p><a href="{{ route('frontend.shop.addToCart', ['id' => $product->id]) }}" class="btn btn-default" role="button">ORDER</a></p>
		      </div>
		    </div>
		  </div>
		@endforeach
	</div>
@endsection