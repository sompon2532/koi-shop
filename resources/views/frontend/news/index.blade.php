{{--<!-- @extends('frontend.layouts.master') -->--}}
@extends('layouts.frontend.main')

@section('page_title', 'News')

@section('content')
<!-- <div class="container"> -->
    <div class="content-box text-center">
        <div class="row">
            <div class="col-md-12">
                <div class="title-lf">
                    <img class="img-responsive" src="{{ asset('frontend/src/img/Title-left.png') }}">
                </div>
                <div class="title-m">
                    <div class="title-inm">
                        <h1 class="text-thick">NEWS</h1>
                    </div>
                </div>
                <div class="title-rg">
                    <img class="img-responsive" src="{{ asset('frontend/src/img/Title-right.png') }}">
                </div>
            </div>
            <div class="col-md-12" style="margin-top:15px;">
                @if(count($news)>0)
                    @foreach($news as $value)
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="card text-center" style="margin-bottom:15px">
                                <a href="{{ route('frontend.news.news', ['value'=>$value->id]) }}" class="text-link">
                                    @if(count($value->media)>0)
                                        <img src="{{ asset($value->media->where('collection_name', 'news-cover')->first()->getUrl()) }}" alt="..." class="img-responsive">
                                    @else
                                        <img src="{{ asset('frontend/src/img/default-event-cover.jpg') }}" alt="{{ $value->name }}" class="img-responsive">
                                    @endif
                                    <div class="caption">
                                        <h3 class="text-red">{{ $value->name }}</h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h1>Now, Don't have Event</h1>
                @endif
            </div>
        </div>
    </div>
<!-- </div> -->
@endsection