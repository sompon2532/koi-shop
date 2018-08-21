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
				<h1>KOIKICHI SHOP</h1>
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
			@if(count($kois) > 0)
				@foreach($kois as $index => $koi)
					@php 
						$i=0;
					@endphp
					@if(count($favorites) > 0)
						@foreach($favorites as $favorite)
							@if($favorite->favorite_id == $koi->id)
								@php
									$i = $favorite->id;
								@endphp
							@endif
						@endforeach
					@endif

					<div class="col-sm-6 col-md-3">
						<div class="koi stock-item-box text-center">
							<div class="img-item-box thumbnail">
								<a href="{{ route('frontend.koi.detail', ['id' => $koi->id]) }}">
									@if(count($koi->media)>0)
										<img src="{{ asset($koi->media->first()->getUrl()) }}" alt="..." class="img-responsive" style="max-height:150px;">
									@else
										<img src="{{ asset('frontend/src/img/default-koi.jpg') }}" alt="..." class="img-responsive" style="max-height:150px;">
									@endif
								</a>
							</div>
							@if($i == 0)
								<div class="star-label">
									<form action="{{ route('frontend.user.favorite-add', ['id' => $koi->id]) }}" method="GET" style="">  
										<input type="hidden" name="item" value="{{ $koi->id }}">
										<input type="hidden" name="type" value="App\Models\koi">
										<button type="submit" class="btn btn-favorite">
											<img class="" src="{{ asset('frontend/src/img/favorite.png') }}" alt="..." style="max-height:50px;">    
										</button> 
										{{ csrf_field() }}
									</form>
								</div>
							@else
								<div class="star-label">
									<form action="{{ route('frontend.user.favorite-del', ['id' => $koi->id, 'type' => 'App\Models\koi']) }}" method="GET" style="">  
										<button type="submit" class="btn btn-favorite">
											<img class="" src="{{ asset('frontend/src/img/unfavorite.png') }}" alt="..." style="max-height:50px;">    
										</button> 
										{{ csrf_field() }}
									</form>
								</div>
							@endif
							<div class="caption">
								<p class="text-red text-name">{{ $koi->name }}</P>
                                <p>{{ trans('koi.code')}} : {{ $koi->koi_id }}</p>
                                <a class="btn btn-white" href="{{ route('frontend.koi.detail', ['id' => $koi->id]) }}">
                                    {{ trans('koi.btn-detail')}}
                                </a>
                            </div>
						</div>
					</div>
				@endforeach
			@else
				<h1>No koi in Category!</h1>
			@endif
		</div>
	</div>
</div>
@endsection