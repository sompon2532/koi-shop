{{--<!-- @extends('frontend.layouts.master') -->--}}
@extends('layouts.frontend.main')

@section('page_title', 'KOI PRODUCT')

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
<div class="content-box text-center">
	<div class="row"> 
		<div class="col-md-12">
			<div class="title-lf">
				<img class="img-responsive" src="{{ asset('frontend/src/img/Title-left.png') }}">
			</div>
			<div class="title-m">
				<div class="title-inm">
					<h1 class="text-thick">KOI PRODUCT</h1>
				</div>
			</div>
			<div class="title-rg">
				<img class="img-responsive" src="{{ asset('frontend/src/img/Title-right.png') }}">
			</div>
		</div>

		
		@if(Session::has('success'))
			<div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
				<div class="alert alert-success" role="alert">
					{{ Session::get('success') }}
				</div>
			</div>
		@endif

		<div class="col-md-12">
			@if(count($products) > 0)
				@foreach($products as $index => $product)
					<div class="col-sm-6 col-md-3">
						<div class="product stock-item-box text-center">
							<div class="img-item-box thumbnail">
								<a href="{{ route('frontend.shop.detail', ['id' => $product->id]) }}">
									@if(count($product->media)>0)
										<img src="{{ asset($product->media->first()->getUrl()) }}" alt="..." class="img-responsive" style="max-height:150px;">
									@else
										<img src="{{ asset('frontend/src/img/default-product.jpg') }}" alt="..." class="img-responsive" style="max-height:150px;">
									@endif
								</a>
							</div>
							@if(count($product->favorite)>0)
								<div class="star-label">
									<form action="{{ route('frontend.user.favorite-del', ['id' => $product->id, 'type' => 'App\Models\Product']) }}" method="GET" style="">  
										<button type="submit" class="btn btn-favorite">
											<img class="" src="{{ asset('frontend/src/img/unfavorite.png') }}" alt="..." style="max-height:50px;">    
										</button> 
										{{ csrf_field() }}
									</form>
								</div>
							@else
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
							@endif
							<div class="caption">
								<p class="text-red text-name">{{ $product->name }}</P>
								<p>CODE : {{ $product->product_id }}</p>
								<p><a href="{{ route('frontend.shop.addToCart', ['id' => $product->id]) }}" class="btn btn-white" role="button">ORDER</a></p>
							</div>
						</div>
					</div>
				@endforeach

				<div class="col-md-12">
					{{ $products->links() }}
					<p class="text-red text-right"> {{ trans('product.total')}} : {{ count($products) }} </p>
				</div>

			@else
				<h1>No Product in Category!</h1>
			@endif
		</div>
	</div>
</div>
@endsection