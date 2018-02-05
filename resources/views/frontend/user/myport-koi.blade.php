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
                            <div class="col-md-5 col-md-offset-1">
                                <div class="slider slider-for">
                                    @foreach($kois->media as $media)
                                        <div>
                                            <a class="example-image-link" href="{{ asset($media->getUrl()) }}" data-lightbox="thumb-1">
                                                <img class="example-image img-thumbnail" src="{{ asset($media->getUrl()) }}" alt="..." style="">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                                @if(count($kois->media) > 1)                            
                                    <div class="item">
                                        <div class="slider slider-nav">
                                            @foreach($kois->media as $media)
                                                <img src="{{ asset($media->getUrl()) }}" class="img-thumbnail">    
                                            @endforeach
                                        </div>
                                    </div> 
                                @endif
                            </div>

                            <div class="col-md-6 text-left">
                                <p class="text-red" style="font-weight:bold;">{{ $kois->name }}</p>
                                <p>{{ trans('user.code-koi') }} : {{ $kois->koi_id }}</p>
                                <p>{{ trans('user.owner') }} : {{ $kois->user->name }}</p>
                                <p>{{ trans('user.price') }} : {{ number_format($kois->price) }} {{ trans('user.thb') }}</p>
                                <br>
                                <p class="text-red" style="font-weight:bold;">DETAIL</p>
                                <p>{{ trans('koi.oyagoi') }} : {{ $kois->oyagoi }} </p>
                                <p>{{ trans('koi.strain') }} : {{ $kois->strain->name }} </p>
                                <p>{{ trans('koi.farm') }} : {{ $kois->farm->name }}</p>
                                <p>{{ trans('koi.born') }} : {{ $kois->born }}</p>
                                <p>{{ trans('koi.storage') }} : {{ $kois->store != null ? $kois->store->name : '-' }}</p>

                                @if(count($kois->sizes) > 0)
                                    @foreach($kois->sizes as $sizes)
                                        <p>{{ trans('koi.size') }} : {{ $sizes->size }} ({{($sizes->created_at->format('Y-m-d'))}})</p>
                                    @endforeach
                                @else
                                    <p>{{ trans('koi.size') }} : -</p>
                                @endif

                                <p>{{ trans('koi.gender')}} : {{ $kois->sex }}</p>
                                <p>{{ trans('koi.certificate') }} : {{ $kois->certificate ? trans('koi.yes') : trans('koi.no') }} </p>
                                
                                @if(count($kois->contests) > 0)
                                    @foreach($kois->contests as $index => $contests)
                                        <p>{{ trans('koi.contest') }} {{ $index+1 }} : {{ $contests->contest }}</p>
                                    @endforeach
                                @endif

                                @if(count($kois->remarks) > 0)
                                    @foreach($kois->remarks as $index => $remarks)
                                        <p>{{ trans('koi.remark') }}#{{ $index+1 }} : {{ $remarks->remark }}</p>
                                    @endforeach
                                @endif
                            </div>

                            @if(count($kois->videos) > 0)
                                <div class="col-md-12 koi-videos">
                                    <section class="lazy slider" data-sizes="50vw">
                                        @foreach($kois->videos as $video)
                                            <div>
                                                <h3 class="text-red">VIDEO ({{$video->created_at->format('Y-m-d')}})</h3>
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