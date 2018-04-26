@extends('frontend.layouts.master')

@section('page_title', 'HOME')

@section('custom-css')
<style>
    .carousel-indicators li{
        border: 1px solid #ff0000;
    }
    .carousel-indicators .active{
        background-color: #ff0000;
    }
</style>
@endsection

@section('content')
    <!-- <div class="main-content"> -->
        <!-- <div class="row">
            <div class="col-md-12">
                <div class="top-box">
                    <img class="img-responsive"  src="{{ asset('frontend/src/img/LOGO-header.png') }}" alt="">      
                </div>  
            </div>
        </div> -->
        <div class="row">
            <div class="col-xs-4 col-md-3">
                {{--<div class="menu-sidebar">
                    <div>
                        <h1 class="text-center text-red">PRODUCT</h1>
                        <hr style="">
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item text-red"><i class="fa fa-angle-right" style=""></i> KOI</li>
                        @php
                            $traverse = function ($categories, $prefix = '') use (&$traverse) {
                                foreach ($categories as $category) {
                                    if($category->group == 'koi'){
                                        echo '<li class="list-group-item">';
                        @endphp
                                        <a href="{{ route('frontend.koi.category', ['category' => $category->id]) }}">
                        @php
                                        echo '<i class="fa fa-minus" aria-hidden="true" style="color:#fff"></i>';
                                        echo $prefix . '<i class="fa fa-angle-right"></i> ' . $category->name . '<br>';
                                        echo '</a>';
                                        echo '</li>';
                                        $traverse($category->children, $prefix.'<i class="fa fa-minus" aria-hidden="true" style="color:#fff"></i>');
                                    }
                                }
                            };
                            $traverse($categories);
                        @endphp

                        <li class="list-group-item text-red"><i class="fa fa-angle-right" style=""></i> KOI PRODUCTS</li>
                        @php
                            $traverse = function ($categories, $prefix = '') use (&$traverse) {
                                foreach ($categories as $category) {
                                    if($category->group == 'product'){
                                        echo '<li class="list-group-item">';
                        @endphp
                                        <a href="{{ route('frontend.shop.category', ['category' => $category->id]) }}">
                        @php
                                        echo '<i class="fa fa-minus" aria-hidden="true" style="color:#fff"></i>';
                                        echo $prefix . '<i class="fa fa-angle-right"></i> ' . $category->name . '<br>';
                                        echo '</a>';
                                        echo '</li>';
                                        $traverse($category->children, $prefix.'<i class="fa fa-minus" aria-hidden="true" style="color:#fff"></i>');
                                    }
                                }
                            };
                            $traverse($categories);
                        @endphp
                    </ul>
                </div>--}}
                <div class="calendar-box">
                    {!! $calendar->calendar() !!}
                    <div class="text-center">
                        @if (count($events_today) > 0)
                            @foreach($events_today as $event)
                                @if ($today->toDateString() <= $event->end_datetime->toDateString() && $today >= $event->start_datetime->toDateString() )
                                    <p class="text-red">EVENT</p>
                                    <p>{{ $event->end_datetime->format('d/m/Y') }} - {{ $event->start_datetime->format('d/m/Y') }}<br>{{ $event->name }}</p>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div> 
                <div class="stat-box">
                    <p class="text-red">จำนวนผู้เข้าชมทั้งหมด : 00000001</p>
                </div>               
            </div>
            <div class="col-xs-8 col-md-9">
                <div class="slide-box">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        {{-- dd($news) --}}
                        @if (count($news) > 0)
                            @if(count($news) == 1)
                                <div class="carousel-inner" role="listbox">                 
                                    @foreach($news as $index => $new)
                                        {{-- @if($index > 0 && $now <= $new->end_datetime->toTimeString()) --}}
                                            <div class="item active">
                                                @if($new->media->where('collection_name', 'news-cover')->first() == null)
                                                    <a href="{{-- route('frontend.event.event', ['id' => $new->id]) --}}">
                                                        <img src="{{ asset('frontend/src/img/news-cover-defalt-img.jpg')}}" alt="..." class="image-responsive" style="width:100%;">
                                                    </a>
                                                @else
                                                    <a href="{{-- route('frontend.event.event', ['id' => $new->id]) --}}">
                                                        <img src="{{ asset($new->media->where('collection_name', 'news-cover')->first()->getUrl()) }}" alt="..." class="image-responsive" style="width:100%;">
                                                    </a>
                                                @endif
                                            </div>
                                        {{-- @endif --}}
                                    @endforeach
                                </div>
                            @elseif(count($news) > 1)
                                {{-- dd(count($news)) --}}
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="{{0}}" class="active"></li>
                                    @for($i=1; $i<count($news); $i++)
                                    {{-- @foreach($news as $index => $new) --}}
                                        {{-- @if($index > 0 && $now <= $new->end_datetime->toTimeString()) --}}
                                            <li data-target="#carousel-example-generic" data-slide-to="{{$i}}"></li>
                                        {{-- @endif --}}
                                    {{-- @endforeach --}}
                                    @endfor
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    {{-- @if ($now <= $news->first()->end_datetime->toTimeString()) --}}
                                        <div class="item active">
                                            <a href="{{-- route('frontend.event.event', ['id' => $news->first()->id]) --}}">
                                                @if($news->first()->media->where('collection_name', 'news-cover')->first() ==  null)
                                                    <img src="{{ asset('frontend/src/img/news-cover-defalt-img.jpg')}}" alt="..." class="image-responsive" style="width:100%;">
                                                @else
                                                    <img src="{{ asset($news->first()->media->where('collection_name', 'news-cover')->first()->getUrl()) }}" alt="..." class="image-responsive" style="width:100%;">
                                                @endif
                                            </a>
                                        </div>
                                    {{-- @endif --}}             
                                    @foreach($news as $index => $new)
                                        @if($index > 0)
                                        {{-- @if($index > 0 && $now <= $new->end_datetime->toTimeString()) --}}
                                            <div class="item">
                                                <a href="{{-- route('frontend.event.event', ['id' => $new->id]) --}}">                                            
                                                @if($new->media->where('collection_name', 'news-cover')->first() ==  null)
                                                    <img src="{{ asset('frontend/src/img/news-cover-defalt-img.jpg')}}" alt="..." class="image-responsive" style="width:100%;">                                                    
                                                @else
                                                    <img src="{{ asset($new->media->where('collection_name', 'news-cover')->first()->getUrl()) }}" alt="..." class="image-responsive" style="width:100%;">
                                                @endif
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach

                                    <!-- Controls -->
                                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                        <span class="fa fa-angle-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                        <span class="fa fa-angle-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                  
                                </div>
                            @endif                            
                        @endif

                    </div>
                </div>
            </div>
        </div>
    <!-- </div> -->


@endsection

@section('custom-js')
    {!! $calendar->script() !!}
@endsection