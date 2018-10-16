{{--<!-- @extends('frontend.layouts.master') -->--}}
@extends('layouts.frontend.main')

@section('page_title', 'News')

@section('content')
<!-- <div class="container"> -->
    <div class="content-box text-center">
        <div class="row">
            <div class="col-md-12">
                <div class="title-box">
                    <h1>{{ trans('header.news') }}</h1>
                </div>
            </div>
            <div class="col-md-12" style="margin-top:15px;">
                    <!-- <div class="title-box">
                        <h1>ABOUT US</h1>
                    </div> -->

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
                    
                    {{--dd($news)--}}
                    {{--<!-- <h2 class="text-red">{{ $news->name }}</h2>
                    @if(count($news->media) > 0 ))
                        @foreach($news->media as $image)
                            <img src="{{ $image->getUrl() }}" alt="..." class="img-thumbnail image-responsive">
                        @endforeach
                    @endif

                    @if(count($news->video) > 0 ))
                        @foreach($news->video as $video)
                            {{ $video->video }}
                        @endforeach
                    @endif -->--}}

            </div>
        </div>
    </div>
<!-- </div> -->
@endsection