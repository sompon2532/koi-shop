@extends('frontend.layouts.master')

@section('page_title')
    HOME
@endsection

@section('custom-css')
    <style>
        .btn-favorite {
            background-color: transparent;
            padding: 0px;
        }
    </style>
@endsection

@section('content')
	<div class="row"> 
        <div class="col-md-12">
            <div class="main-content text-center">

                <div class="title-box">

                    <h1>{{ $koiCategoty->name }}</h1>
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
                <!-- <h3 class="text-red"> SAKAI </h3> -->
                
                <div class="content-box">
                    <div class="row">
                        

                        @foreach($kois as $index => $koi)
                            @php 
                                $i=0;
                            @endphp
                            @if(count($favorites) > 0)
                                @foreach($favorites as $favorite)
                                    @if($favorite->item_id == $koi->id)
                                        @php
                                            $i=1;
                                        @endphp
                                    @endif
                                @endforeach
                            @endif
                            <div class="col-sm-6  col-md-3">
                                <div class="stock-item-box ">
                                    <div class="img-item-box thumbnail">  
                                        <img src="{{ asset($koi->media->first()->getUrl()) }}" alt="..." class=" image-responsive" style="max-height:150px;">
                                        @if($i == 0)
                                            <div class="star-label">
                                                <form action="{{ route('frontend.user.favorite') }}" method="POST" style="">  
                                                    <input type="hidden" name="item" value="{{ $koi->id }}">
                                                    <input type="hidden" name="type" value="koi">
                                                    <button type="submit" class="btn btn-favorite">
                                                        <img class="" src="{{ asset('frontend/src/img/favorite.png') }}" alt="..." style="max-height:50px;">    
                                                    </button> 
                                                    {{ csrf_field() }}
                                                </form>
                                            </div>
                                        @else
                                            <div class="star-label">
                                                <form action="{{ route('frontend.user.favoritedel', ['item' => $koi->id, 'type' => 'koi']) }}" method="GET" style="">  

                                                    <button type="submit" class="btn btn-favorite">
                                                        <img class="" src="{{ asset('frontend/src/img/unfavorite.png') }}" alt="..." style="max-height:50px;">    
                                                    </button> 
                                                    {{ csrf_field() }}
                                                </form>
                                            </div>
                                        @endif
                                    </div>  

                                    <p class="text-red">{{ $koi->name }}</p>
                                    <p>CODE : {{ $koi->koi_id }}</p>
                                    <a class="btn btn-white" href="{{ route('frontend.koi.detail', ['id' => $koi->id]) }}">
                                        DETAIL
                                    </a>
                                </div>
                            </div>
                          
                        @endforeach

                    </div>
                </div><!-- content-box -->
                <div class="row">
                        <p class="text-red text-right"> TOTAL : {{ count($kois) }} </p>
                </div>

            </div>
        </div>
    </div>
@endsection