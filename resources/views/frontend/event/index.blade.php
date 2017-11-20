@section('page_title', 'EVENTS')

@extends('frontend.layouts.master')

@section('custom-css')
@endsection

@section('content')
<section id="main">
    <div class="container">
        <div class="row"> 
            <div class="col-md-12">
                <div class="main-content text-center">

                    <div class="title-box">
                        <h1>EVENTS</h1>
                    </div>

                    <div class="content-box">
                        <div class="row">
                            @if (count($events) > 0)

                                <div class="col-md-6">
                                    <div class="item active">
                                        <a href="{{ route('frontend.event.event', ['id' => $events->first()->id]) }}">
                                            <img src="{{ asset($events->first()->media->where('collection_name', 'event-cover')->first()->getUrl()) }}" alt="..." class="image-responsive" style="max-height:150px;">
                                        </a>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="center">
                                        <h4 class="text-red">NEW EVENT !</h4>
                                        <p>{{ $events->first()->name }}</p>
                                        <p>{{ $events->first()->start_datetime->formatLocalized('%d %B %Y') }} to {{ $events->first()->end_datetime->formatLocalized('%d %B %Y') }}</p>  
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <h4 class="text-red">PAST EVENTS</h4>
                                    @foreach($events as $index => $event)
                                        @if ($index > 0 && $today->toDateString() == $event->end_datetime->toDateString())
                                            @if ($today->toTimeString() >= $event->end_datetime->toTimeString())
                                                <div class="col-md-4">
                                                    <div class="item">
                                                        <a href="{{ route('frontend.event.event', ['id' => $event->id]) }}">
                                                            <img src="{{ asset($event->media->where('collection_name', 'event-cover')->first()->getUrl()) }}" alt="..." class="image-responsive" style="max-height:150px;">
                                                        </a>
                                                    </div>
                                                    <p class="text-red">{{ $event->name }}</p>
                                                    <p>{{ $event->start_datetime->formatLocalized('%d %B %Y') }} to {{ $event->end_datetime->formatLocalized('%d %B %Y') }}</p>  
                                                </div>  
                                            @endif  
                                        @elseif($today->toDateString() > $event->end_datetime->toDateString())
                                            <div class="col-md-4">
                                                <div class="item">
                                                    <a href="{{ route('frontend.event.event', ['id' => $event->id]) }}">
                                                        <img src="{{ asset($event->media->where('collection_name', 'event-cover')->first()->getUrl()) }}" alt="..." class="image-responsive" style="max-height:150px;">
                                                    </a>
                                                </div>
                                                <p class="text-red">{{ $event->name }}</p>
                                                <p>{{ $event->start_datetime->formatLocalized('%d %B %Y') }} to {{ $event->end_datetime->formatLocalized('%d %B %Y') }}</p>  
                                            </div>  
                                        @endif                           
                                    @endforeach
                                </div>
                            
                                <div class="col-md-12"> 
                                    <p class="text-red text-right">TOTAL : {{ count($events) }}</p>
                                </div>
                            @else
                                <h1>Now, Don't have Event</h1>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('custom-js')
@endsection