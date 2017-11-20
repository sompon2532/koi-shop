@section('page_title', 'EVENTS')

@extends('frontend.layouts.master')

@section('custom-css')
@endsection

@section('content')
<section id="main">
    <div class="container">
        @if(Session::has('success'))
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                    <div id="charge-message" class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                </div>
            </div>
        @endif

        <div class="row"> 
            <div class="col-md-12">
                <div class="main-content text-center">

                    <div class="title-box">
                        <h1>{{ $events->name }}</h1>
                    </div>

                    <div class="content-box">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- <p>CHUGOKU AUCTION WEEK</p> -->
                                <p>{{ $events->start_datetime->toDateString() }} to {{ $events->end_datetime->toDateString() }}</p>

                                @if(count($kois) > 0)
                                    @foreach($kois as $index => $koi)
                                        <div class="col-md-3">
                                            <div class="event-item-box">
                                                <div class="img-item-box">   
                                                    <a href="{{ route('frontend.event.koi', ['event' => $events->id, 'koi' => $koi->id]) }}">
                                                        <img src="{{ asset($koi->media->first()->getUrl()) }}" alt="..." class="image-responsive img-thumbnail" style="max-height:150px;">                                                                                       
                                                        <!-- <img class="img-thumbnail" src="{{ asset('assets/img/hf-2.png') }}" alt="...">-->     
                                                    </a>
                                                </div>  
                                                <p class="text-red">GRAND CHAMPION NON GOSANKE</p>
                                                <p> OWNER : Shk Sultan Abdullah Ai Qassime</p>
                                                @if($events->config == 1)
                                                    @php 
                                                        $i=0;
                                                    @endphp
                                                    @if(count($books) > 0)
                                                        @foreach($books as $book)
                                                            @if($book->id == $koi->id && $koi->event_id == $events->id)
                                                                @php
                                                                    $i=1;
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                    @if($i == 1)
                                                        <form action="{{ route('frontend.event.bookdel', ['koi' => $koi->id, 'event' => $events->id]) }}" method="GET" style="">  
                                                            <!-- <input type="hidden" name="koi" value="{{ $koi->id }}">
                                                            <input type="hidden" name="event" value="{{ $events->id }}"> -->
                                                            <button type="submit" class="btn btn-red">CANCEL</button>                                                                                          
                                                            {{ csrf_field() }}
                                                        </form>
                                                    @else
                                                        <form action="{{ route('frontend.event.bookevent') }}" method="POST" style="">  
                                                            <input type="hidden" name="koi" value="{{ $koi->id }}">
                                                            <input type="hidden" name="event" value="{{ $events->id }}">
                                                            <button type="submit" class="btn btn-white">BOOK NOW</button>                                                                                          
                                                            {{ csrf_field() }}
                                                        </form>
                                                    @endif
                                                @endif
                                            </div>
                                        </div> 
                                    @endforeach
                                @else
                                    <h1 class="text-red">No Koi in  Event!</h1>
                                @endif
                                
                                <!-- <div class="col-md-3">
                                    <div class="event-item-box">
                                        <div class="img-item-box">                                                                                          
                                            <img class="img-thumbnail" src="{{ asset('assets/img/hf-3.png') }}" alt="...">                                
                                        </div>  
                                        <p class="text-red">GRAND CHAMPION NON GOSANKE</p>
                                        <p> OWNER : Shk Sultan Abdullah Ai Qassime</p>
                                        <a class="btn btn-red" href="#">
                                            CANCEL
                                        </a>
                                        <div class="book-fleg">
                                            <img class="" src="{{ asset('assets/img/event-fleg.png') }}" width="20"> 
                                        </div>
                                    </div>
                                </div>  -->

                            </div>
                            
                        </div><p class="text-red text-right">TOTAL : {{ count($kois) }}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection