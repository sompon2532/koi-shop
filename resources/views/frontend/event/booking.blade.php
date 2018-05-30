@section('page_title', 'MY BOOKKING')

@extends('frontend.layouts.master')

@section('custom-css')
@endsection

@section('content')
<section id="main">
    <div class="container">
        <div class="row"> 
            <div class="col-md-12 main-content text-center">
                <!-- <div class=""> -->
                <div class="title-box">
                    <h1>{{ trans('user.mybooking') }}</h1>
                </div>
                <div class="content-box">
                    <div class="row">
                        <div class="col-md-12">
                            @if(count($kois) > 0 )
                                @foreach($koisActiveEvent as $koi)
                                    <div class="col-md-3">
                                        <div class="event-item-box">
                                            <div class="img-item-box">
                                                <!-- <a href=""> -->
                                                @if(count($koi->media)>0)
                                                    <img class="img-thumbnail" src="{{ asset($koi->media->first()->getUrl()) }}" alt="...">                                
                                                @else
                                                    <img class="img-thumbnail" src="{{ asset('frontend/src/img/default-koi.jpg') }}" alt="...">                                                                                    
                                                @endif
                                                <!-- </a> -->
                                            </div>  
                                            <p class="text-red">{{ $koi->name }}</p>
                                            <!-- <p>BOOKING 5</p> -->
                                            @if ($now->toDateString() < $koi->event->end_datetime->toDateString() || ($now->toDateString() == $koi->event->end_datetime->toDateString() && $now->toTimeString() <= $koi->event->end_datetime->toTimeString()))
                                                <form action="{{ route('frontend.event.bookdel', ['koi' => $koi->id, 'event' => $koi->event_id]) }}" method="GET" style="">  
                                                    <button type="submit" class="btn btn-red">{{ trans('user.btn-cancel') }}</button>                                                                                          
                                                    {{ csrf_field() }}
                                                </form>
                                            @else
                                                <p class="text-red">{{ trans('user.end-of-event') }}</p>
                                            @endif

                                        </div>
                                    </div> 
                                @endforeach
                            @else
                                <h1 class="text-red">{{ trans('user.no-booking') }}</h1>
                            @endif
                        </div>
                    </div> 
                </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
</section>
@endsection