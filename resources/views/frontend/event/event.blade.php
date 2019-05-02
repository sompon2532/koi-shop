{{--<!-- @extends('frontend.layouts.master') -->--}}
@extends('layouts.frontend.main')

@section('page_title', 'EVENTS')

@section('custom-css')
<style>
.slick-prev:before,
.slick-next:before {
  color: red;
}

.slick-slide iframe {
  width: 100%;
}
</style>
@endsection

@section('content')

    <div class="content-box text-center">
        <div class="row">

            <div class="col-md-12">
                <div class="title-lf">
                    <img class="img-responsive" src="{{ asset('frontend/src/img/Title-left.png') }}">
                </div>
                <div class="title-m">
                    <div class="title-inm">
                        <h1 class="text-thick">{{ $events->name }}</h1>
                    </div>
                </div>
                <div class="title-rg">
                    <img class="img-responsive" src="{{ asset('frontend/src/img/Title-right.png') }}">
                </div>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <p>{{ $events->start_datetime->format('d/m/Y') }} - {{ $events->end_datetime->format('d/m/Y') }}</p>

                    @if(Session::has('success'))
                        <div class="row">
                            <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                                <div id="charge-message" class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            </div>
                        </div>
                    @endif

                    @if(count($events->videos) > 0)
                        <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom:20px">
                            <section class="lazy slider" data-sizes="50vw">
                                @foreach($events->videos as $video)
                                    <div>
                                        <h3 class="text-red">{{trans('event.video')}} ({{$video->created_at->format('Y-m-d')}})</h3>
                                        {!! $video->video !!}
                                    </div>
                                @endforeach
                            </section>                                        
                        </div>
                    @endif

                    @if(count($kois) > 0)
                        @if ($today->toDateString() < $events->end_datetime->toDateString() || ($today->toDateString() == $events->end_datetime->toDateString() && $today->toTimeString() <= $events->end_datetime->toTimeString()))
                            @foreach($kois as $index => $koi)
                                <div class="col-sm-6 col-md-3" style="margin-bottom:15px">
                                    <div class="event-item-box">
                                        <a href="{{ route('frontend.event.koi', ['event' => $events->id, 'koi' => $koi->id]) }}">
                                            @if(count($koi->media)>0)
                                                <img src="{{ asset($koi->media->first()->getUrl()) }}" alt="..." class="image-responsive img-thumbnail" style="max-height:150px;margin-bottom:5px;">
                                            @else
                                                <img src="{{ asset('frontend/src/img/default-koi.jpg') }}" alt="..." class=" image-responsive img-thumbnail" style="max-height:150px;margin-bottom:5px;">
                                            @endif
                                        </a>

                                        <p class="text-thick">{{ $koi->name }}</p>
                                        <p> {{trans('event.owner')}} : Koikichi fish farm</p>
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
                                                <form action="{{ route('frontend.event.bookdel', ['koi' => $koi->id, 'event' => $events->id]) }}" method="GET">
                                                    <button type="submit" class="btn btn-red">{{trans('event.cancel')}}</button>                                                             
                                                    {{ csrf_field() }}
                                                </form>
                                            @else
                                                <form action="{{ route('frontend.event.bookevent', ['koi' => $koi->id, 'event' => $events->id]) }}" method="GET">
                                                    <button type="submit" class="btn btn-white">{{trans('event.book_now')}}</button>                                                                                          
                                                    {{ csrf_field() }}
                                                </form>
                                            @endif
                                        @endif
                                    </div>
                                </div> 
                            @endforeach
                        @else
                            {{--<!-- <h4 class="text-red">{{ trans('event.end-of-event') }}</h4>
                            @if(count($events->videos) > 0)
                                <div class="col-md-12">
                                    <h3>{{ trans('event.lucky_draw') }}</h3>
                                    <h5>({{ trans('event.video') }})</h5>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <section class="lazy slider" data-sizes="50vw">
                                            @foreach($events->videos as $video)
                                                <div>
                                                    <h3 class="text-red">VIDEO ({{$video->created_at->format('Y-m-d')}})</h3>
                                                    {!! $video->video !!}
                                                </div>
                                            @endforeach
                                        </section>                                        
                                    </div>
                                </div>
                            @endif -->--}}
                            <div class="col-md-12">
                                <h3 class="text-red" style="margin:30px 0;">{{ trans('event.winner_list') }}</h3>
                            </div>
                            @foreach($kois as $koi)
                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="winner-item-list">
                                        <p class="text-red">{{ trans('event.winner') }}</p>
                                        <p>{{ $koi->user_id != '' ? $koi->user['name'] : 'Koikichi Fish Farm' }}</p>
                                        <div class="img-item-box">
                                            <a href="{{ route('frontend.event.koi', ['event' => $events->id, 'koi' => $koi->id]) }}">
                                                @if(count($koi->media)>0)
                                                    <img src="{{ asset($koi->media->first()->getUrl()) }}" alt="..." class="img-responsive img-thumbnail" style="max-height:150px;margin-bottom:5px;">
                                                @else
                                                    <img src="{{ asset('frontend/src/img/default-koi.jpg') }}" alt="..." class=" img-responsive img-thumbnail" style="max-height:150px;margin-bottom:5px;">
                                                @endif
                                            </a>                                                                                      
                                        </div>  
                                        <p class="text-red">{{ $koi->name }}</p>
                                    </div>
                                </div> 
                            @endforeach
                        @endif      
                    @else
                        <div class="col-md-12">
                            <h1 class="text-red">{{trans('event.no-koi')}}</h1>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-md-12">
                <p class="text-red text-right">{{ trans('event.total') }} : {{ count($kois) }}</p>
            </div>

        </div>
    </div>

@endsection

@section('custom-js')
<script type="text/javascript">
    // $(document).on('ready', function() {
    //     $(".lazy").slick({
    //         lazyLoad: 'ondemand', // ondemand progressive anticipated
    //         infinite: true
    //     });
    // });
</script>
@endsection