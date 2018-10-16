{{--<!-- @extends('frontend.layouts.master') -->--}}
@extends('layouts.frontend.main')

@section('page_title', 'KOI')

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
			<div class="title-box">
				<h1>{{ trans('header.koi') }}</h1>
			</div>
		</div>
		
		@if(Session::has('success'))
			<div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
				<div class="alert alert-success" role="alert">
					{{ Session::get('success') }}
				</div>
			</div>
		@endif

		<!-- <div class="col-md-12"> -->
			@foreach($menus as $menu)
				<div class="col-xs-12 col-sm-6 col-md-3">
					<div class="menu-box">
						<a href="{{ route('frontend.koi.category', ['category' => $menu->id]) }}">
							<div class="thumbnail">
								@if(count($menu->media)>0)
									<img src="{{ asset($menu->media->where('collection_name', 'category')->first()->getUrl()) }}" alt="..." class="img-responsive" style="max-height:150px;"> 
								@else
									<img src="{{ asset('frontend/src/img/default-product.jpg') }}" alt="..." class="img-responsive" style="max-height:150px;"> 
								@endif
								<div class="menu-title-box text-center">
									<p>{{$menu->name}}</p>                                        
								</div>
							</div>
						</a>
					</div>
				</div>
			@endforeach
		<!-- </div> -->
	</div>
</div>
@endsection