{{--<!-- @extends('frontend.layouts.master') -->--}}
@extends('layouts.frontend.main')

@section('page_title', 'EVENTS')

@section('custom-css')
@endsection

@section('content')
    <div class="content-box text-center">
        <div class="row"> 
            {{--<!-- <div class="col-md-12">
                <div class="title-box">
                    <h1>{{ trans('event.events') }}</h1>
                </div>
            </div> -->--}}
            <div class="col-md-12">
                <div class="title-lf">
                    <img class="img-responsive" src="{{ asset('frontend/src/img/Title-left.png') }}">
                </div>
                <div class="title-m">
                    <div class="title-inm">
                        <h1 class="text-thick">EVENT</h1>
                    </div>
                </div>
                <div class="title-rg">
                    <img class="img-responsive" src="{{ asset('frontend/src/img/Title-right.png') }}">
                </div>
            </div>

            @foreach($nowEvents as $event)
            <div class="col-md-12" style="margin-bottom:15px">
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

            {{--<!-- <div class="col-md-12" style="margin:20px">
                <div class="title-box">
                    <h1>{{ trans('event.pass_events') }}</h1>
                </div>
            </div> -->--}}
            <div class="col-md-12">
                <div class="title-lf">
                    <img class="img-responsive" src="{{ asset('frontend/src/img/Sub-Title-left.png') }}">
                </div>
                <div class="title-m">
                    <div class="title-inm">
                        <h1 class="text-thick">PASS EVENT</h1>
                    </div>
                </div>
                <div class="title-rg">
                    <img class="img-responsive" src="{{ asset('frontend/src/img/Sub-Title-right.png') }}">
                </div>
            </div>

            @if(count($passEvents)>0)
                @foreach($passEvents as $event)
                    <div class="col-sm-6 col-md-4">
                        <div class="card text-center" style="margin-bottom:15px">
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


            <div class="col-md-12"> 
                <p class="text-red text-right">TOTAL : {{ count($events) }}</p>
            </div>

        </div>
    </div>

@endsection

@section('custom-js')
@endsection