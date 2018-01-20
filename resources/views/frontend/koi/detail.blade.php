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

.slider-nav img {
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
                        <h1>{{ $kois->name }}</h1>
                    </div>

                    {{-- <!-- <h3 class="text-red"> SAKAI </h3>
                    <P>KOI > KOI  IN JAPAN > SAKAI > {{ $kois->name }}</P> --> --}}

                    <div class="content-box">
                        <div class="row">
                            <div class="col-sm-6 col-md-3 col-md-offset-3">
                                <div class="hide-max-768px show-min-768px">
                                    <div class="slider slider-for thumbnail">
                                        @if(count($kois->media) > 0)
                                            @foreach($kois->media as $media)
                                                <div>
                                                    <a class="example-image-link" href="{{ asset($media->getUrl()) }}" data-lightbox="thumb-1">
                                                        <img class="example-image" src="{{ asset($media->getUrl()) }}" alt="..." style="">
                                                    </a>
                                                </div>
                                            @endforeach
                                        @else
                                            <img src="{{ asset('frontend/src/img/koi-defalt-img.jpg') }}" alt="..." class=" image-responsive" style="max-height:150px;">                                                
                                        @endif
                                    </div>
                                </div>

                                <div class="show-max-768px hide-min-768px">                                
                                    <section class="lazy slider thumbnail" data-sizes="50vw">
                                        @if(count($kois->media) > 0)
                                            @foreach($kois->media as $media)
                                                <a class="example-image-link" href="{{ asset($media->getUrl()) }}" data-lightbox="thumb-1">
                                                    <img class="example-image " src="{{ asset($media->getUrl()) }}" alt="..." style="">
                                                </a>
                                            @endforeach
                                        @else
                                            <img src="{{ asset('frontend/src/img/koi-defalt-img.jpg') }}" alt="..." class=" image-responsive" style="max-height:150px;">                                                
                                        @endif
                                    </section>                                        
                                </div>
                                
                                @if(count($favorites) == 0)
                                    <div class="star-label">
                                        <form action="{{ route('frontend.user.favorite-add', ['id' => $kois->id]) }}" method="GET" style="">  
                                            <input type="hidden" name="item" value="{{ $kois->id }}">
                                            <input type="hidden" name="type" value="App\Models\Koi">
                                            <button type="submit" class="btn btn-favorite">
                                                <img class="" src="{{ asset('frontend/src/img/favorite.png') }}" alt="..." style="max-height:50px;">    
                                            </button> 
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                @else
                                    <div class="star-label">
                                        <form action="{{ route('frontend.user.favorite-del', ['id' => $kois->id, 'type' => 'App\Models\Koi']) }}" method="GET" style="">  
                                            <button type="submit" class="btn btn-favorite">
                                                <img class="" src="{{ asset('frontend/src/img/unfavorite.png') }}" alt="..." style="max-height:50px;">    
                                            </button> 
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                @endif
                                <div class="text-red">
                                    <p>{{ trans('koi.to-order') }}</p>
                                    <p>{{ trans('koi.please-contact') }}</p>
                                    <a href="{{ route('frontend.contact.line') }}">
                                        <img class="" src="{{ asset('frontend/src/img/line-logo.png') }}" alt="...">                                    
                                    </a>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6 text-left">
                                <p class="text-red">{{-- $products->title --}}</p>
                                <p>{{ trans('koi.code') }} : {{ $kois->koi_id }}</p>
                                <!-- <p>{{ trans('koi.owner')}} : {{ $kois->owner }}</p> -->
                                <p>{{ trans('koi.price') }} : {{ number_format($kois->price) }} {{ trans('koi.thb')}}</p>
                                <br>
                                <p class="text-red">{{ trans('koi.detail')}}</p>
                                <p>{{ trans('koi.oyagoi') }} : {{ $kois->oyagoi }} </p>
                                <p>{{ trans('koi.strain') }} : {{ $kois->strain->name }} </p>
                                <p>{{ trans('koi.farm') }} : {{ $kois->farm->name }}</p>
                                <p>{{ trans('koi.born') }} : {{ $kois->born }}</p>
                                <p>{{ trans('koi.storage') }} : {{ $kois->storage }}</p>

                                @if(count($kois->sizes) > 0)
                                    <p>{{ trans('koi.size') }} : 
                                        @foreach($kois->sizes as $sizes)
                                            {{ $sizes->size }}
                                        @endforeach
                                    </p>
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

                            @if(count($kois->media) > 1)                            
                                <div class="hide-max-768px show-min-768px">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="item">
                                            <div class="slider slider-nav">
                                                @foreach($kois->media as $media)
                                                    <img src="{{ asset($media->getUrl()) }}" class="img-responsive thumbnail">    
                                                @endforeach
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            @endif

                            @if(count($kois->videos) > 0)
                                <div class="col-md-12">
                                    <section class="lazy slider" data-sizes="50vw">
                                        @foreach($kois->videos as $video)
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

$(".lazy").slick({
    lazyLoad: 'ondemand', // ondemand progressive anticipated
    infinite: true
});
</script>

@endsection