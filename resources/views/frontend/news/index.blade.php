@section('page_title', 'News')

@extends('frontend.layouts.master')

@section('content')
<!-- <div class="container"> -->
    <div class="row">
        <div class="col-md-12">
            <div class="about-us">
                <div class="text-center">
                    <!-- <div class="title-box">
                        <h1>ABOUT US</h1>
                    </div> -->
                    <h2 class="text-red">{{ $news->name }}</h2>
                    @if(count($news->media) > 0 ))
                        @foreach($news->media as $image)
                            <img src="{{ $image->getUrl() }}" alt="..." class="img-thumbnail image-responsive">
                        @endforeach
                    @endif

                    @if(count($news->video) > 0 ))
                        @foreach($news->video as $video)
                            {{ $video->video }}
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
<!-- </div> -->
@endsection