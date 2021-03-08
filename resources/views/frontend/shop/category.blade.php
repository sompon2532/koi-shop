{{--<!-- @extends('frontend.layouts.master') -->--}}
@extends('layouts.frontend.main')

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
<div class="content-box text-center">
	<div class="row"> 

		<div class="col-md-12">
			<div class="title-lf">
				<img class="img-responsive" src="{{ asset('frontend/src/img/Title-left.png') }}">
			</div>
			<div class="title-m">
				<div class="title-inm">
					<h1 class="text-thick">{{ $category->name }}</h1>
				</div>
			</div>
			<div class="title-rg">
				<img class="img-responsive" src="{{ asset('frontend/src/img/Title-right.png') }}">
			</div>
		</div>

		@if(Session::has('success'))
			<div class="row">
				<div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
					<div id="charge-message" class="alert alert-success">
						{{ Session::get('success') }}
					</div>
				</div>
			</div>
		@endif

		<div class="col-md-12">
			@if(count($category->videos) > 0)
				<div class="col-md-6 col-md-offset-3" style="margin-top: 20px;margin-bottom: 20px;">
					<section class="lazy slider" data-sizes="50vw">
						@foreach($category->videos as $video)
							<div>
								<div class="embed-responsive embed-responsive-16by9">
									{!! $video->video !!}
								</div>
							</div>
						@endforeach
					</section>
				</div>
			@endif
		</div>

		<div class="col-md-12">
			@if(count($products) > 0)
				@foreach($products as $index => $product)
					<div class="col-sm-6 col-md-3">
						<div class="product text-center stock-item-box">
							@if($product->product_id != "")
                                @if(count($product->favorite))
                                    <span class="red-box-code">{{ $product->product_id }}</span>
                                @else
                                    <span class="light-box-code">{{ $product->product_id }}</span>
                                @endif
                            @else
                                <span class="light-box-code no-border">{{ $product->product_id }}</span>
                            @endif
							<div class="img-item-box thumbnail no-border">
								<a href="{{ route('frontend.shop.detail', ['id' => $product->id]) }}">
									@if(count($product->media) > 0)
										<img src="{{ asset($product->media->first()->getUrl()) }}" alt="{{ $product->name }}" class="img-responsive" style="max-height:200px;">
									@else
										<img src="{{ asset('frontend/src/img/default-product.jpg') }}" class="img-responsive" style="max-height:150px;">                                                
									@endif
								</a>
							</div>
							{{--<!-- @if(count($product->favorite)>0)
								<div class="star-label">
									<form action="{{ route('frontend.user.favorite-del', ['id' => $product->id, 'type' => 'App\Models\Product']) }}" method="GET">  

										<button type="submit" class="btn btn-favorite">
											<img class="" src="{{ asset('frontend/src/img/unfavorite.png') }}" alt="UNFAVORITE" style="max-height:50px;">    
										</button> 
										{{ csrf_field() }}
									</form>
								</div>
							@else
								<div class="star-label">
									<form action="{{ route('frontend.user.favorite-add', ['id' => $product->id]) }}" method="GET">  
										<input type="hidden" name="item" value="{{ $product->id }}">
										<input type="hidden" name="type" value="App\Models\Product">
										<button type="submit" class="btn btn-favorite">
											<img class="" src="{{ asset('frontend/src/img/favorite.png') }}" alt="FAVORITE" style="max-height:50px;">    
										</button> 
										{{ csrf_field() }}
									</form>
								</div>
							@endif -->--}}
							<div class="caption">
									@if(count($product->favorite)>0)
										<span class="text-thick item-name text-red">{{ $product->name }}</span>
										<form action="{{ route('frontend.user.favorite-del', ['id' => $product->id, 'type' => 'App\Models\Product']) }}" method="GET" class="favorite-form">  
											<button type="submit" class="btn-fav text-red"><i class="fa fa-star" aria-hidden="true"></i></button>

											{{ csrf_field() }}
										</form>
									@else
										<span class="text-thick item-name">{{ $product->name }}</span>
										<form action="{{ route('frontend.user.favorite-add', ['id' => $product->id]) }}" method="GET" class="favorite-form">  
											<input type="hidden" name="item" value="{{ $product->id }}">
											<input type="hidden" name="type" value="App\Models\Product">
											<button type="submit" class="btn-fav"><i class="fa fa-star-o" aria-hidden="true""></i></button>

											{{ csrf_field() }}
										</form>
									@endif
									<!-- </br> -->
								<p>
									<span style="color:#4A4A4A;">{{trans('product.price')}} : {{ number_format($product->price) }} {{trans('product.thb')}}</span>
								</p>
								{{--<!-- <p>{{trans('product.code')}} : {{ $product->product_id }}</p> -->--}}
								{{--<!-- <a href="{{ route('frontend.shop.addToCart', ['id' => $product->id]) }}" class="btn btn-white" role="button">{{trans('product.btn-order')}}</a> -->--}}
							</div>
						</div>
					</div>
				@endforeach
				<div class="col-md-12">
					{{ $products->links() }}
					<p class="text-red text-right"> {{trans('product.total')}} : {{ count($products) }} </p>
				</div>
				{{--<!-- @else
					<h1>{{trans('product.no-product')}}</h1> -->--}}
			@endif
		</div>
	</div>
</div>
@endsection