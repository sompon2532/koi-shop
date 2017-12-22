@extends('frontend.layouts.master')

@section('page_title', 'KOI')

@section('custom-css')
<style>
.btn-favorite {
    background-color: transparent;
    padding: 0px;
}
.star-label {
    top: 0px;
    right: 14px;
}
.slider {
    width: 100%;
    margin: auto;
}

.slick-slide {
  margin: 0px 5px;
}

{{--/* .slick-slide img {
  width: 100%;
} */--}}

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
                        <h1>{{ trans('user.myport') }}</h1>
                    </div>

                    {{--<!-- <h3 class="text-red"> </h3> --><!-- <P>KOI > KOI  IN JAPAN > SAKAI > {{ $koi->name }}</P> -->--}}
                    <br>
                    <div class="content-box">
                        <div class="row">
                            <div class="col-md-3 col-md-offset-3">
                                <div class="slider slider-for thumbnail">
                                    @foreach($koi->media as $media)
                                        <div>
                                            <a class="example-image-link" href="{{ asset($media->getUrl()) }}" data-lightbox="thumb-1">
                                                <img class="example-image" src="{{ asset($media->getUrl()) }}" alt="..." style="">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-md-6 text-left">
                                <p class="text-red" style="font-weight:bold;">{{ $koi->name }}</p>
                                <p>{{ trans('user.code-koi') }} : {{ $koi->koi_id }}</p>
                                <p>{{ trans('user.owner') }} : {{ $koi->user->name }}</p>
                                <p>{{ trans('user.price') }} : {{ number_format($koi->price) }} {{ trans('user.thb') }}</p>
                                <br>
                                <p class="text-red" style="font-weight:bold;">DETAIL</p>
                                <p>{{ trans('user.breeder') }} : {{ $koi->oyagoi }}</p>
                                <p>{{ trans('user.born') }} : {{ $koi->born }}</p>
                                <p>{{ trans('user.size') }} : {{ $koi->size }}</p>
                                <p>{{ trans('user.gender') }} : {{ $koi->sex }}</p>
                            </div>

                            @if(count($koi->media) > 1)                            
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="item">
                                        <div class="slider slider-nav">
                                            @foreach($koi->media as $media)
                                                <img src="{{ asset($media->getUrl()) }}" class="image-responsive thumbnail" style="max-height:150px;">    
                                            @endforeach
                                        </div>
                                    </div> 
                                </div>
                            @endif

                            @if(count($koi->videos) > 0)
                                <div class="col-md-12">
                                    <section class="lazy slider" data-sizes="50vw">
                                        @foreach($koi->videos as $video)
                                            <div>
                                                {!! $video->video !!}
                                            </div>
                                        @endforeach
                                    </section>                                        
                                </div>
                            @endif
                            
                        </div>
                    </div><!-- content-box -->
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@section('custom-js')
<script>
 $('.slider-for').slick({
  slidesToShow: 1,
  slidesToScroll: 3,
  arrows: false,
  fade: true,
  asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: '.slider-for',
  dots: false,
  centerMode: true,
  focusOnSelect: true
});
</script>

<script type="text/javascript">
    $(document).on('ready', function() {
      $(".lazy").slick({
        lazyLoad: 'ondemand', // ondemand progressive anticipated
        infinite: true
      });
    });
</script>

@endsection