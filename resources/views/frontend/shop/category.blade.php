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
								<div class="product text-center">
									<a href="{{ route('frontend.shop.detail', ['id' => $product->id]) }}">
										<img src="{{ asset($product->media->first()->getUrl()) }}" alt="..." class="img-thumbnail img-responsive">
									</a>
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
										<p>CODE : {{ $product->product_id }}</p>
										<p><a href="{{ route('frontend.shop.addToCart', ['id' => $product->id]) }}" class="btn btn-white" role="button">ORDER</a></p>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				@else
					<h1>No Product in Category!</h1>
				@endif
		</div>
	</div>
</div>
@endsection