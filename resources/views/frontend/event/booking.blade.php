@section('page_title', 'MY BOOKKING')

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
                        <h1>MY BOOKING</h1>
                    </div>
                    <div class="content-box">
                        <div class="row">
                            <div class="col-md-12">
                                @if(count($kois) > 0 )
                                    @foreach($kois as $koi)
                                        <div class="col-md-3">
                                            <div class="event-item-box">
                                                <div class="img-item-box">
                                                    <a href="">                                                                                         
                                                        <img class="img-thumbnail" src="{{ asset($koi->media->first()->getUrl()) }}" alt="...">                                
                                                    </a>
                                               </div>  
                                                <p class="text-red">{{ $koi->name }}</p>
                                                <!-- <p>BOOKING 5</p> -->
                                                <form action="{{ route('frontend.event.bookdel', ['koi' => $koi->id, 'event' => $koi->event_id]) }}" method="GET" style="">  
                                                        <button type="submit" class="btn btn-red">CANCEL</button>                                                                                          
                                                        {{ csrf_field() }}
                                                    </form>
                                                <!-- <a class="btn btn-red" href="#">
                                                    CANCEL
                                                </a> -->

                                                <div class="book-fleg">
                                                    <img class="" src="{{ asset('assets/img/event-fleg.png') }}" width="20"> 
                                                </div>
                                            </div>
                                        </div> 
                                    @endforeach
                                @else
                                   <h1 class="text-red">No Items Booking!</h1>
                                @endif
                                <!-- <div class="col-md-3">
                                    <div class="event-item-box">
                                        <div class="img-item-box">                                                                                          
                                            <img class="img-thumbnail" src="{{ asset('assets/img/hf-3.png') }}" alt="...">                                
                                        </div>  
                                        <p class="text-red">AOKIYA BENI KIKOKURYU</p>
                                        <p> BOOKING 8</p>
                                        <a class="btn btn-red" href="#">
                                            CANCEL
                                        </a>
                                        <div class="book-fleg">
                                            <img class="" src="{{ asset('assets/img/event-fleg.png') }}" width="20"> 
                                        </div>
                                    </div>
                                </div>  -->


                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection