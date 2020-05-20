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

        <div class="col-md-12">
            @if(count($kois) > 0)
                @foreach($kois as $index => $koi)
                    <div class="col-xs-12 col-sm-6 col-md-3" style="margin-bottom:15px">
                        <div class="stock-item-box">
                            @if($koi->koi_id != "")
                                @if(count($koi->favorite))
                                    <span class="red-box-code">{{ $koi->koi_id }}</span>
                                @else
                                    <span class="light-box-code">{{ $koi->koi_id }}</span>
                                @endif
                            @else
                                <span class="light-box-code no-border">{{ $koi->koi_id }}</span>
                            @endif

                            <div class="thumbnail no-border">
                                <a href="{{ route('frontend.koi.detail', ['id' => $koi->id]) }}">                                            
                                    @if(count($koi->media) > 0)  
                                        <img src="{{ asset($koi->media->first()->getUrl()) }}" alt="..." class="image-responsive" style="max-height:200px;">
                                    @else
                                        <img src="{{ asset('frontend/src/img/default-koi.jpg') }}" alt="..." class="image-responsive" style="max-height:200px;">                                                
                                    @endif
                                </a>
                            </div>  
                            
                            <a href="{{ route('frontend.koi.detail', ['id' => $koi->id]) }}">
                                @if(count($koi->favorite))
                                    <span class="text-red item-name-koi text-thick">{{ $koi->name }}</span>
                                @else
                                    <span class="item-name-koi text-thick">{{ $koi->name }}</span>
                                @endif
                            </a>

                            @if(count($koi->favorite))
                                <form action="{{ route('frontend.user.favorite-del', ['id' => $koi->id, 'type' => 'App\Models\Koi']) }}" method="GET" class="favorite-form">  
                                    <button type="submit" class="btn-fav text-red"><i class="fa fa-star" aria-hidden="true"></i></button>
                                    {{ csrf_field() }}
                                </form>
                            @else
                                <form action="{{ route('frontend.user.favorite-add', ['id' => $koi->id]) }}" method="GET" class="favorite-form">  
                                    <input type="hidden" name="item" value="{{ $koi->id }}">
                                    <input type="hidden" name="type" value="App\Models\Koi">
                                    <button type="submit" class="btn-fav"><i class="fa fa-star-o" aria-hidden="true""></i></button>
                                    {{ csrf_field() }}
                                </form>
                            @endif

                            <a href="{{ route('frontend.koi.detail', ['id' => $koi->id]) }}">
                                <p style="color:#979797;font-size:18px">
                                    <span>{{ trans('koi.born') }} : {{ strtoupper($koi->born) }}</span>
                                    @if($koi->sex == "male")
                                    {{$koi->sex}}
                                        <span><i class="fa fa-mars" aria-hidden="true"></i></span>
                                    @elseif($koi->sex == "female")
                                    {{$koi->sex}}
                                        <span><i class="fa fa-venus" aria-hidden="true"></i></span>
                                    @else
                                    {{$koi->sex}}

                                        <span><i class="fa fa-transgender" aria-hidden="true"></i></span>
                                    @endif
                                    <span>{{ strtoupper($koi->sizes->last()->size) }}</span></br>
                                    <span style="color:#4A4A4A;font-size:20px">{{trans('koi.price')}} : {{ number_format($koi->price) }} {{trans('koi.thb')}}</span>
                                </p>
                            </a>
                        </div>
                    </div>
                @endforeach

                <div class="col-xs-12">
                    {{ $kois->links() }}
                    <p class="text-red text-right"> {{trans('koi.total')}}: {{ count($kois) }} </p>
                </div>
            {{--<!-- @else
                <h1>{{ trans('koi.no-koi') }}</h1> -->--}}
            @endif
        </div>
    </div>
</div>
@endsection