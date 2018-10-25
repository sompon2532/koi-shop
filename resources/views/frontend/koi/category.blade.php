{{--<!-- @extends('frontend.layouts.master') -->--}}
@extends('layouts.frontend.main')

@section('page_title', 'KOI')

@section('custom-css')
    <style>
        .btn-favorite {
            background-color: transparent;
            padding: 0px;
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
            <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                <div id="charge-message" class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            </div>
        @endif

                <!-- <h3 class="text-red"> SAKAI </h3> -->
        <div class="col-md-12">
            @if(count($kois) > 0)
                @foreach($kois as $index => $koi)
                    <div class="col-xs-6 col-sm-6 col-md-3" style="margin-bottom:15px">
                        <div class="stock-item-box ">
                            <div class="thumbnail">
                                <a href="{{ route('frontend.koi.detail', ['id' => $koi->id]) }}">                                            
                                    @if(count($koi->media) > 0)  
                                        <img src="{{ asset($koi->media->first()->getUrl()) }}" alt="..." class="image-responsive" style="max-height:150px;">
                                    @else
                                        <img src="{{ asset('frontend/src/img/default-koi.jpg') }}" alt="..." class="image-responsive" style="max-height:150px;">                                                
                                    @endif
                                </a>
                                <div class="star-label">
                                    @if(count($koi->favorite))
                                        <form action="{{ route('frontend.user.favorite-del', ['id' => $koi->id, 'type' => 'App\Models\Koi']) }}" method="GET">  
                                            <button type="submit" class="btn btn-favorite">
                                                <img class="" src="{{ asset('frontend/src/img/unfavorite.png') }}" alt="..." style="max-height:50px;">    
                                            </button> 
                                            {{ csrf_field() }}
                                        </form>
                                    @else
                                        <form action="{{ route('frontend.user.favorite-add', ['id' => $koi->id]) }}" method="GET">  
                                            <input type="hidden" name="item" value="{{ $koi->id }}">
                                            <input type="hidden" name="type" value="App\Models\Koi">
                                            <button type="submit" class="btn btn-favorite">
                                                <img class="" src="{{ asset('frontend/src/img/favorite.png') }}" alt="..." style="max-height:50px;">    
                                            </button> 
                                            {{ csrf_field() }}
                                        </form>
                                    @endif
                                </div>
                            </div>  

                            <p class="text-red">{{ $koi->name }}</p>
                            <p>{{ trans('koi.code')}} : {{ $koi->koi_id }}</p>
                            <a class="btn btn-white" href="{{ route('frontend.koi.detail', ['id' => $koi->id]) }}">
                                {{ trans('koi.btn-detail')}}
                            </a>
                        </div>
                    </div>
                @endforeach

                <div class="col-md-12">
                    {{ $kois->links() }}
                    <p class="text-red text-right"> {{ trans('koi.total')}} : {{ count($kois) }} </p>
                </div>
            @else
                <h1>{{ trans('koi.no-koi') }}</h1>
            @endif
        </div>
    </div>
</div>
@endsection