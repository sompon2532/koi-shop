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
    <div class="row">
        <div class="col-xs-4 col-md-3">
            <div class="menu-sidebar">
                <div>
                    <h1 class="text-center text-red">PRODUCT</h1>
                    <hr>
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
            </div>

            <div class="calendar-box">
                {!! $calendar->calendar() !!}
                <div class="text-center">
                    @if (count($events_today) > 0)
                        @foreach($events_today as $event)
                            <p class="text-red">EVENT</p>
                            <p>{{ $event->end_datetime->format('d/m/Y') }} - {{ $event->start_datetime->format('d/m/Y') }}</p>
                            <p>{{ $event->name }}</p>
                        @endforeach
                    @endif
                </div>
            </div> 

            <div class="stat-box text-center">
                <p class="text-red">จำนวนผู้เข้าชมทั้งหมด</p>
                    {{--<!-- <a href="https://smallseotools.com/visitor-hit-counter/" target="_blank" title="Web Counter" class="text-center"> -->--}}
                        <img src="https://smallseotools.com/counterDisplay?code=144479ab1d4d4565329f7d9df6eaf5fe&style=0013&pad=5&type=page&initCount=1000"  title="Web Counter" Alt="Web Counter" border="0">
                    {{--<!-- </a> -->--}}
            </div> 

        </div>

        <div class="col-xs-8 col-md-9">
            <div class="slide-box">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            @foreach($nownews as $index => $value)
                                <li data-target="#myCarousel" data-slide-to="{{$index}}" class="{{ $index == 0 ? 'active' : ''}}"></li>            
                            @endforeach
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            @foreach($nownews as $index => $value)
                                <div class="item {{ $index == 0 ? 'active' : ''}}">
                                    @if(count($value->media)>0)
                                        <img src="{{ asset($value->media->where('collection_name', 'news-cover')->first()->getUrl()) }}" alt="{{ $value->name }}" style="width:100%;">
                                    @else
                                        <img src="{{ asset('frontend/src/img/news-cover-defalt.jpg')}}" alt="{{ $value->name }}" style="width:100%;">
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        
                        @if(count($nownews) > 1)
                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                <span class="fa fa-angle-left"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                <span class="fa fa-angle-right"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('branner')
    <!-- branner -->
    <section class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner clearfix">

                        <div class="col-md-12">
                            <p class="text-center text-red text-thick">KOICHI</p>
                        </div>

                        @foreach($banners as $banner)
                            <div class="col-sm-3 col-md-3">
                                <div class="text-center">
                                    @if(count($banner->media) > 0)
                                        <a href="{{ $banner->url }}" target="_blank">
                                            <img src="{{ asset($banner->media->where('collection_name', 'banner')->first()->getUrl()) }}" alt="..." class="img-banner">
                                        </a>
                                    @else
                                        <a href="{{ $banner->url }}" target="_blank">
                                            <img src="{{ asset('frontend/src/img/default-banner.jpg') }}" alt="..." class="img-banner">
                                        </a>
                                    @endif
                                    <div class="caption">
                                        <a href="{{ $banner->url }}" target="_blank" class="text-link">{{ $banner->name }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom-js')


    {!! $calendar->script() !!}
@endsection
