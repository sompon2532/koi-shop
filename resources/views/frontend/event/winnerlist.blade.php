@extends('frontend.layouts.master')

@section('page_title', 'WINNER LIST')

@section('custom-css')
@endsection

@section('content')
<section id="main">
    <div class="container">
        <div class="row"> 
            <div class="col-md-12">
                <div class="main-content text-center">
                    <div class="title-box">
                        <h2>WINNERS
                        <br>ANNOUNCEMENT</h2>
                    </div>
                    <div class="content-box">
                        <div class="row">

                            <div class="col-md-2 col-md-offset-4">
                                <a class="btn btn-white" href="#">
                                    LUCKY DRAW
                                </a>
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-white" href="#">
                                    WINNER LIST
                                </a>
                            </div>
                            <div class="col-md-12">
                                <h4>LUCK DRAW</h4>
                            </div>
                            
                            @if(count($kois) > 0)
                                @foreach($kois as $koi)
                                    <div class="col-md-3">
                                        <div class="winner-item-list">
                                            <p class="text-red">WINNER <br> {{ $koi->owner }}</p>
                                            <div class="img-item-box">                                                                                          
                                                <img class="img-thumbnail" src="{{ asset( $koi->media()->first()->getUrl() ) }}" alt="...">                                
                                            </div>  
                                            <p class="text-red">{{ $koi->name }}</p>
                                        </div>
                                    </div> 
                                @endforeach
                            @endif
<!--                             

                            <div class="col-md-3">
                                <div class="winner-item-list">
                                    <p class="text-red">WINNER <br> USER 7</p>
                                    <div class="img-item-box">                                                                                          
                                        <img class="img-thumbnail" src="{{ asset('assets/img/hf-2.png') }}" alt="...">                                
                                    </div>  
                                    <p class="text-red">MARUYAMA SHOWA</p>
                                </div>
                            </div> 

                            <div class="col-md-3">
                                <div class="winner-item-list">
                                    <p class="text-red">WINNER <br> USER 7</p>
                                    <div class="img-item-box">                                                                                          
                                        <img class="img-thumbnail" src="{{ asset('assets/img/hf-3.png') }}" alt="...">                                
                                    </div>  
                                    <p class="text-red">MARUYAMA SHOWA</p>
                                </div>
                            </div> 

                            <div class="col-md-3">
                                <div class="winner-item-list">
                                    <p class="text-red">WINNER <br> USER 7</p>
                                    <div class="img-item-box">                                                                                          
                                        <img class="img-thumbnail" src="{{ asset('assets/img/hf-1.png') }}" alt="...">                                
                                    </div>  
                                    <p class="text-red">MARUYAMA SHOWA</p>
                                </div>
                            </div> 

                            <div class="col-md-3">
                                <div class="winner-item-list">
                                    <p class="text-red">WINNER <br> USER 7</p>
                                    <div class="img-item-box">                                                                                          
                                        <img class="img-thumbnail" src="{{ asset('assets/img/hf-2.png') }}" alt="...">                                
                                    </div>  
                                    <p class="text-red">MARUYAMA SHOWA</p>
                                </div>
                            </div> 

                            <div class="col-md-3">
                                <div class="winner-item-list">
                                    <p class="text-red">WINNER <br> USER 7</p>
                                    <div class="img-item-box">                                                                                          
                                        <img class="img-thumbnail" src="{{ asset('assets/img/hf-3.png') }}" alt="...">                                
                                    </div>  
                                    <p class="text-red">MARUYAMA SHOWA</p>
                                </div>
                            </div> 

                            <div class="col-md-3">
                                <div class="winner-item-list">
                                    <p class="text-red">WINNER <br> USER 7</p>
                                    <div class="img-item-box">                                                                                          
                                        <img class="img-thumbnail" src="{{ asset('assets/img/hf-1.png') }}" alt="...">                                
                                    </div>  
                                    <p class="text-red">MARUYAMA SHOWA</p>
                                </div>
                            </div> 

                            <div class="col-md-3">
                                <div class="winner-item-list">
                                    <p class="text-red">WINNER <br> USER 7</p>
                                    <div class="img-item-box">                                                                                          
                                        <img class="img-thumbnail" src="{{ asset('assets/img/hf-2.png') }}" alt="...">                                
                                    </div>  
                                    <p class="text-red">MARUYAMA SHOWA</p>
                                </div>
                            </div>  -->
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection