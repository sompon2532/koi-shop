@extends('frontend.layouts.master')

@section('page_title')
    SHOP
@endsection

@section('custom-css')
<style>
	.btn-favorite {
		background-color: transparent;
		padding: 0px;
		border: none;
	}
</style>
@endsection

@section('content')
<div class="row"> 
	<div class="col-md-12">
		<div class="main-content text-center">

			@if( count($productCategory) > 0)
				<div class="title-box">
					<h1>{{ $productCategory->name }}</h1>
				</div>
			@endif
	
			@if(Session::has('success'))
				<div class="row">
					<div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
						<div id="charge-message" class="alert alert-success">
							{{ Session::get('success') }}
						</div>
					</div>
				</div>
			@endif

			@if(count($products) > 0)
				<div class="row">
					@foreach($products as $index => $product)
						@php 
							$i=0;
						@endphp
						@if(count($favorites) > 0)
							@foreach($favorites as $favorite)
								@if($favorite->favorite_id == $product->id)
									@php
										$i = $favorite->id;
									@endphp
								@endif
							@endforeach
						@endif

						<div class="col-sm-6 col-md-3">
							<div class="product text-center stock-item-box">
								<div class="img-item-box thumbnail">
									<a href="{{ route('frontend.shop.detail', ['id' => $product->id]) }}">
										@if(count($product->media) > 0)
											<img src="{{ asset($product->media->first()->getUrl()) }}" alt="..." class="img-responsive" style="max-height:150px;">
										@else
											<img src="{{ asset('frontend/src/img/product-defalt-img.jpg') }}" alt="..." class="img-responsive" style="max-height:150px;">                                                
										@endif
									</a>
								</div>
								@if($i == 0)
									<div class="star-label">
										<form action="{{ route('frontend.user.favorite-add', ['id' => $product->id]) }}" method="GET" style="">  
											<input type="hidden" name="item" value="{{ $product->id }}">
											<input type="hidden" name="type" value="App\Models\Product">
											<button type="submit" class="btn btn-favorite">
												<img class="" src="{{ asset('frontend/src/img/favorite.png') }}" alt="..." style="max-height:50px;">    
											</button> 
											{{ csrf_field() }}
										</form>
									</div>
								@else
									<div class="star-label">
										<form action="{{ route('frontend.user.favorite-del', ['id' => $product->id, 'type' => 'App\Models\Product']) }}" method="GET" style="">  

											<button type="submit" class="btn btn-favorite">
												<img class="" src="{{ asset('frontend/src/img/unfavorite.png') }}" alt="..." style="max-height:50px;">    
											</button> 
											{{ csrf_field() }}
										</form>
									</div>
								@endif
								<div class="caption">
									<p class="text-red">{{ $product->name }}</P>
									<p>{{ trans('product.code') }} : {{ $product->product_id }}</p>
									<a href="{{ route('frontend.shop.addToCart', ['id' => $product->id]) }}" class="btn btn-white" role="button">{{ trans('product.btn-order') }}</a>
								</div>
							</div>
						</div>
					@endforeach
				</div>
				<div class="row">
					<p class="text-red text-right"> {{ trans('product.total')}} : {{ count($products) }} </p>
				</div>
			@else
				<h1>No Product in Category!</h1>
			@endif
		</div>
	</div>
</div>
@endsection