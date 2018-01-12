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
                        <h1>{{ trans('event.events') }}</h1>
                    </div>

                    <div class="content-box">
                        <div class="row">
                            @if (count($events) > 0)
                                @foreach($events as $event)
                                    @if ($today->toDateString() < $event->end_datetime->toDateString())
                                        <div class="col-md-6">
                                            <div class="item active">
                                                <a href="{{ route('frontend.event.event', ['id' => $event->id]) }}">
                                                    <img src="{{ asset($event->media->where('collection_name', 'event-cover')->first()->getUrl()) }}" alt="..." class="image-responsive" style="max-height:150px;">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="center">
                                                <h3 class="text-red text-thick">{{ trans('event.new_events') }}!</h3>
                                                <p>{{ $event->name }}</p>
                                                <p>{{ $event->start_datetime->formatLocalized('%d %B %Y') }} {{ trans('event.to') }} {{ $event->end_datetime->formatLocalized('%d %B %Y') }}</p>  
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                    @elseif($today->toDateString() == $event->end_datetime->toDateString() && $today->toTimeString() <= $events->end_datetime->toTimeString())
                                        <div class="col-md-6">
                                            <div class="item active">
                                                <a href="{{ route('frontend.event.event', ['id' => $event->id]) }}">
                                                    <img src="{{ asset($event->media->where('collection_name', 'event-cover')->first()->getUrl()) }}" alt="..." class="image-responsive" style="max-height:150px;">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="center">
                                                <h3 class="text-red text-thick">{{ trans('event.new_events') }}!</h3>
                                                <p>{{ $event->name }}</p>
                                                <p>{{ $event->start_datetime->formatLocalized('%d %B %Y') }} {{ trans('event.to') }} {{ $event->end_datetime->formatLocalized('%d %B %Y') }}</p>  
                                            </div>
                                        </div>
                                    <br>
                                    <br>
                                    @endif
                                @endforeach
                                {{-- <!-- @if ($today->toDateString() < $events->first()->end_datetime->toDateString()) --> 
                                    <!-- <div class="col-md-6">
                                        <div class="item active">
                                            <a href="{{ route('frontend.event.event', ['id' => $events->first()->id]) }}">
                                                <img src="{{ asset($events->first()->media->where('collection_name', 'event-cover')->first()->getUrl()) }}" alt="..." class="image-responsive" style="max-height:150px;">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="center">
                                            <h3 class="text-red text-thick">{{ trans('event.new_events') }}!</h3>
                                            <p>{{ $events->first()->name }}</p>
                                            <p>{{ $events->first()->start_datetime->formatLocalized('%d %B %Y') }} {{ trans('event.to') }} {{ $events->first()->end_datetime->formatLocalized('%d %B %Y') }}</p>  
                                        </div>
                                    </div> -->--}}
                                {{-- <!-- @elseif($today->toDateString() == $events->first()->end_datetime->toDateString() && $today->toTimeString() <= $events->first()->end_datetime->toTimeString()) --> }
                                    <!-- <div class="col-md-6">
                                        <div class="item active">
                                            <a href="{{ route('frontend.event.event', ['id' => $events->first()->id]) }}">
                                                <img src="{{ asset($events->first()->media->where('collection_name', 'event-cover')->first()->getUrl()) }}" alt="..." class="image-responsive" style="max-height:150px;">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="center">
                                            <h3 class="text-red text-thick">{{ trans('event.new_events') }}!</h3>
                                            <p>{{ $events->first()->name }}</p>
                                            <p>{{ $events->first()->start_datetime->formatLocalized('%d %B %Y') }} {{ trans('event.to') }} {{ $events->first()->end_datetime->formatLocalized('%d %B %Y') }}</p>  
                                        </div>
                                    </div> -->--}
                                {{-- <!-- @endif --> --}}
                                
                                <div class="col-md-12">
                                    
                                    <h3 class="text-red text-thick">{{ trans('event.pass_events') }}</h3>
                                    <br>
                                    @foreach($events as $index => $event)
                                        @if ($index > 0 && $today->toDateString() == $event->end_datetime->toDateString())
                                            @if ($today->toTimeString() >= $event->end_datetime->toTimeString())
                                                <div class="col-md-4">
                                                    <div class="item">
                                                        <a href="{{ route('frontend.event.event', ['id' => $event->id]) }}">
                                                            <img src="{{ asset($event->media->where('collection_name', 'event-cover')->first()->getUrl()) }}" alt="..." class="image-responsive" style="max-height:150px;margin-bottom:10px;">
                                                        </a>
                                                    </div>
                                                    <p class="text-red">{{ $event->name }}</p>
                                                    <p>{{ $event->start_datetime->formatLocalized('%d %B %Y') }} {{ trans('event.to') }} {{ $event->end_datetime->formatLocalized('%d %B %Y') }}</p>  
                                                </div>  
                                            @endif  
                                        @elseif($today->toDateString() > $event->end_datetime->toDateString())
                                            <div class="col-md-4">
                                                <div class="item">
                                                    <a href="{{ route('frontend.event.event', ['id' => $event->id]) }}">
                                                        <img src="{{ asset($event->media->where('collection_name', 'event-cover')->first()->getUrl()) }}" alt="..." class="image-responsive" style="max-height:150px;margin-bottom:10px;">
                                                    </a>
                                                </div>
                                                <p class="text-red">{{ $event->name }}</p>
                                                <p>{{ $event->start_datetime->formatLocalized('%d %B %Y') }} {{ trans('event.to') }} {{ $event->end_datetime->formatLocalized('%d %B %Y') }}</p>  
                                            </div>  
                                        @endif                           
                                    @endforeach
                                    @if (count($events) == 1 && $today->toDateString() == $event->end_datetime->toDateString())
                                        @if ($today->toTimeString() >= $event->end_datetime->toTimeString())
                                        <div class="col-md-4">
                                                <div class="item">
                                                    <a href="{{ route('frontend.event.event', ['id' => $event->id]) }}">
                                                        <img src="{{ asset($event->media->where('collection_name', 'event-cover')->first()->getUrl()) }}" alt="..." class="image-responsive" style="max-height:150px;margin-bottom:10px;">
                                                    </a>
                                                </div>
                                                <p class="text-red">{{ $event->name }}</p>
                                                <p>{{ $event->start_datetime->formatLocalized('%d %B %Y') }} {{ trans('event.to') }} {{ $event->end_datetime->formatLocalized('%d %B %Y') }}</p>  
                                            </div>   
                                        @endif
                                    @endif
                                </div>
                            
                                <div class="col-md-12"> 
                                    <p class="text-red text-right">{{ trans('event.total') }} : {{ count($events) }}</p>
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