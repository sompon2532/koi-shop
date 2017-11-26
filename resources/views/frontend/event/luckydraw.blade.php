@extends('frontend.layouts.master')

@section('page_title', 'LUCKYDRAW')

@section('custom-css')
<style>
.slider {
    width: 50%;
    margin: auto;
}

.slick-slide {
  margin: 0px 20px;
}

.slick-slide img {
  width: 100%;
}

.slick-slide iframe {
  width: 100%;
}

.slick-prev:before,
.slick-next:before {
  color: red;
}

.slick-slide {
  transition: all ease-in-out .3s;
  opacity: .2;
}

.slick-active {
  opacity: .5;
}

.slick-current {
  opacity: 1;
}

</style>

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
                                <a class="btn btn-white" href="{{ route('frontend.event.luckydraw', ['event' => $events->id]) }}">
                                    LUCKY DRAW
                                </a>
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-white" href="{{ route('frontend.event.winnerlist', ['event' => $events->id]) }}">
                                    WINNER LIST
                                </a>
                            </div>
                            <div class="col-md-12">
                                <h4>LUCK DRAW</h4>
                                <h5>(CLIP VIDEO)</h5>
                                @if(count($events->videos) > 0)
                                    <div class="col-md-12">
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

                        </div>
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