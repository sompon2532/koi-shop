@section('page_title', 'HOME')

@extends('frontend.layouts.master')

@section('custom-css')
@endsection

@section('content')
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="top-box">
                    <img class="img-responsive"  src="{{ asset('frontend/src/img/LOGO-header.png') }}" alt="">      
                </div>  
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                
                <!-- <div class="input-group date" data-provide="datepicker">
                    <input type="text" class="form-control">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                </div> -->
                
            </div>
            <div class="col-md-9">
                <div class="slide-box">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            @if (count($events) > 0)
                                <div class="item active">
                                    <img src="{{ asset($events->first()->media->where('collection_name', 'event-cover')->first()->getUrl()) }}" alt="..." class="image-responsive" style="max-height:150px;">
                                </div>

                                @foreach($events as $index => $event)
                                    @if ($index > 0)
                                        <div class="item">
                                            <img src="{{ asset($event->media->where('collection_name', 'event-cover')->first()->getUrl()) }}" alt="..." class="image-responsive" style="max-height:150px;">
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                           
                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        </div>

                        @foreach($events as $index => $event)

                            <h1>{{ $event->name }}</h1>

                            @foreach($event->media->where('collection_name', 'event') as $media)
                                <div>
                                    <img src="{{ asset($media->getUrl()) }}" class="image-responsive" style="max-height:150px;">    
                                </div>
                            @endforeach
                        @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')

@endsection
