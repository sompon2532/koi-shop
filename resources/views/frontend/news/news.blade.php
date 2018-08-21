{{--<!-- @extends('frontend.layouts.master') -->--}}
@extends('layouts.frontend.main')

@section('page_title', 'NEWS')

@section('content')
<div class="content-box text-center">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-red">{{ $news->name }}</h2>
            @if(count($news->media->where('collection_name', 'news')) > 0 )
                @foreach($news->media->where('collection_name', 'news') as $image)
                    {{--dd($news)--}}
                    <img src="{{ $image->getUrl() }}" alt="..." class="img-thumbnail img-responsive" style="width:100%;margin:10px;">
                @endforeach
            @endif

            @if(count($news->videos) > 0)
                <div class="col-md-12">
                    <section class="lazy slider" data-sizes="50vw">
                        @foreach($news->videos as $video)
                            <div>
                                <h3 class="text-red">VIDEO ({{ $video->date }})</h3>
                                {!! $video->video !!}
                            </div>
                        @endforeach
                    </section>                                        
                </div>
            @endif
        </div>
    </div>
</div>
@endsection