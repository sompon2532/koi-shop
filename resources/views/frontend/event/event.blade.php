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
                        <h1>{{ $events->name }}</h1>
                    </div>

                    <div class="content-box">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- <p>CHUGOKU AUCTION WEEK</p> -->
                                <p>{{ $events->start_datetime }} to {{ $events->end_datetime }}</p>


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
                                                <a class="btn btn-white" href="#">
                                                    BOOK NOW
                                                </a>
                                                
                                            </div>
                                        </div> 
                                    @endforeach
                                @endif
                                
                                

                                <div class="col-md-3">
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
                                </div> 

                            </div>
                            
                        </div><p class="text-red text-right">TOTAL : {{ count($kois) }}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection