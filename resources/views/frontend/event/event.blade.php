@section('page_title', 'EVENTS')

@extends('frontend.layouts.master')

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
                                <p>{{ $events->start_datetime->formatLocalized('%d %B %Y') }} to {{ $events->end_datetime->formatLocalized('%d %B %Y') }}</p>

                                @if(count($kois) > 0)
                                    @if ($today->toDateString() < $events->end_datetime->toDateString() || ($today->toDateString() == $events->end_datetime->toDateString() && $today->toTimeString() <= $events->end_datetime->toTimeString()))
                                        @foreach($kois as $index => $koi)
                                            <div class="col-md-3">
                                                <div class="event-item-box">
                                                    <div class="img-item-box">   
                                                        <a href="{{ route('frontend.event.koi', ['event' => $events->id, 'koi' => $koi->id]) }}">
                                                            <img src="{{ asset($koi->media->first()->getUrl()) }}" alt="..." class="image-responsive img-thumbnail" style="max-height:150px;">                                                                                       
                                                            <!-- <img class="img-thumbnail" src="{{ asset('assets/img/hf-2.png') }}" alt="...">-->     
                                                        </a>
                                                    </div>  
                                                    <p class="text-red">{{ $koi->name }}</p>
                                                    <p> {{ trans('event.owner') }} : Koikichi fish farm</p>
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
                                                                <!-- <input type="hidden" name="koi" value="{{ $koi->id }}">
                                                                <input type="hidden" name="event" value="{{ $events->id }}"> -->
                                                                <button type="submit" class="btn btn-red">{{ trans('event.cancel') }}</button>                                                                                          
                                                                {{ csrf_field() }}
                                                            </form>
                                                        @else
                                                            <form action="{{ route('frontend.event.bookevent', ['koi' => $koi->id, 'event' => $events->id]) }}" method="GET">  
                                                                <!-- <input type="hidden" name="koi" value="{{ $koi->id }}">
                                                                <input type="hidden" name="event" value="{{ $events->id }}"> -->
                                                                <button type="submit" class="btn btn-white">{{ trans('event.book_now') }}</button>                                                                                          
                                                                {{ csrf_field() }}
                                                            </form>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div> 
                                        @endforeach
                                    @else
                                        <h4 class="text-red">End of Event.</h4>
                                        <div class="col-md-12">
                                            <h3>{{ trans('event.lucky_draw') }}</h3>
                                            <h5>({{ trans('event.video') }})</h5>
                                            @if(count($events->videos) > 0)
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <section class="lazy slider" data-sizes="50vw">
                                                        @foreach($events->videos as $video)
                                                            <div>
                                                                {!! $video->video !!}
                                                            </div>
                                                        @endforeach
                                                    </section>                                        
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-12">
                                            <h3 style="margin:30px 0;">{{ trans('event.winner_list') }}</h3>
                                        </div>
                                        @foreach($kois as $koi)
                                            <div class="col-xs-12 col-sm-6 col-md-3">
                                                <div class="winner-item-list">
                                                    <p class="text-red">{{ trans('event.winner') }} <br> {{ $koi->owner != '' ? $koi->user['name'] : 'Koikichi Fish Farm' }} {{-- $koi->user['name'] --}}</p>
                                                    <div class="img-item-box">                                                                                          
                                                        <img class="img-thumbnail" src="{{ asset( $koi->media()->first()->getUrl() ) }}" alt="...">                                
                                                    </div>  
                                                    <p class="text-red">{{ $koi->name }}</p>
                                                </div>
                                            </div> 
                                        @endforeach
                                    @endif      
                                @else
                                    <h1 class="text-red">No Koi in Event!</h1>
                                @endif
                            </div>
                        </div><p class="text-red text-right">{{ trans('event.total') }} : {{ count($kois) }}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('custom-js')
<script type="text/javascript">
    $(document).on('ready', function() {
      $(".lazy").slick({
        lazyLoad: 'ondemand', // ondemand progressive anticipated
        infinite: true
      });
    });
</script>
@endsection