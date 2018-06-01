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
                            @foreach($nowEvents as $event)
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="card text-center">
                                            @if(count($event->media)>0)
                                                <a href="{{ route('frontend.event.event', ['event'=>$event->id]) }}">
                                                    <img src="{{ asset($event->media->where('collection_name', 'event-cover')->first()->getUrl()) }}" alt="{{ $event->name }}" class="img-responsive center">
                                                </a>
                                            @else
                                                <a href="{{ route('frontend.event.event', ['event'=>$event->id]) }}">
                                                    <img src="{{ asset('frontend/src/img/default-event-cover.jpg') }}" alt="{{ $event->name }}" class="img-responsive center">
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 class="text-red text-center">New Event!</h1>
                                        <p class="text-center">{{ $event->name }}</p>
                                    </div>
                                </div>    
                            @endforeach


                            <div class="col-md-12">
                                <div class="title text-center">
                                    <h1 class="text-red text-thick">{{ trans('event.pass_events') }}</h1>
                                </div>
                            </div>

                            <div class="col-md-12">
                                @if(count($passEvents)>0)
                                    @foreach($passEvents as $event)
                                        <div class="col-sm-6 col-md-4">
                                            <div class="card text-center">
                                                <a href="{{ route('frontend.event.event', ['event'=>$event->id]) }}" class="text-link">
                                                    @if(count($event->media)>0)
                                                        <img src="{{ asset($event->media->where('collection_name', 'event-cover')->first()->getUrl()) }}" alt="..." class="img-responsive">
                                                    @else
                                                        <img src="{{ asset('frontend/src/img/default-event-cover.jpg') }}" alt="{{ $event->name }}" class="img-responsive">
                                                    @endif
                                                    <div class="caption">
                                                        <h3 class="text-red">{{ $event->name }}</h3>
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

                    <div class="col-md-12"> 
                        <p class="text-red text-right">{{ trans('event.total') }} : {{ count($events) }}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('custom-js')
@endsection