@extends('frontend.layouts.master')

@section('page_title', 'KOI')

@section('custom-css')
<style>
.btn-favorite {
    background-color: transparent;
    padding: 0px;
    border: none;
}
.star-label {
    top: 0px;
}
.slider {
    width: 100%;
    margin: auto;
    /* margin: 100px auto; */
}

.slick-slide {
  margin: 0px 5px;
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
                        <h1>PRODUCT</h1>
                    </div>

                    {{-- <!-- <h3 class="text-red"> SAKAI </h3>
                    <P>KOI > KOI  IN JAPAN > SAKAI > {{ $products->name }}</P> --> --}}

                    <div class="content-box">
                        <div class="row">
                            <br>
                            <div class="col-md-3 col-md-offset-3">
                                <div class="slider slider-for">
                                    @if(count($products->media)>0)
                                        @foreach($products->media as $media)
                                            <div>
                                                <a class="example-image-link" href="{{ $media->getUrl() }}" data-lightbox="thumb-1">
                                                    <img class="example-image img-thumbnail" src="{{ $media->getUrl() }}" alt="..." style="">
                                                </a>
                                            </div>
                                        @endforeach
                                    @else
                                        <img src="{{ asset('frontend/src/img/product-defalt-img.jpg') }}" alt="..." class="img-thumbnail img-responsive" style="max-height:150px;">
                                    @endif
                                </div>                                    
                                @if(count($favorites) == 0)
                                    <div class="star-label">
                                        <form action="{{ route('frontend.user.favorite-add', ['id' => $products->id]) }}" method="GET" style="">  
                                            <input type="hidden" name="item" value="{{ $products->id }}">
                                            <input type="hidden" name="type" value="App\Models\Product">
                                            <button type="submit" class="btn btn-favorite">
                                                <img class="" src="{{ asset('frontend/src/img/favorite.png') }}" alt="..." style="max-height:50px;">    
                                            </button> 
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                @else
                                    <div class="star-label">
                                        <form action="{{ route('frontend.user.favorite-del', ['id' => $products->id, 'type' => 'App\Models\Product']) }}" method="GET">
                                            <button type="submit" class="btn btn-favorite">
                                                <img class="" src="{{ asset('frontend/src/img/unfavorite.png') }}" alt="..." style="max-height:50px;">    
                                            </button> 
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                @endif
                            </div>                        
                            <div class="col-md-6 text-left">
                                <p class="text-red">{{ trans('product.title') }} : {{ $products->name }}</p>
                                <p>{{ trans('product.code') }} : {{ $products->id }}</p>
                                <p>{{ trans('product.price') }} : {{ $products->price }} {{ trans('product.thb') }}</p>
                                <p>{{ trans('product.shipping') }} : {{ $products->delivery }} {{ trans('product.thb') }}</p>
                                <div class="text-center-max992">
                                    <a class="btn btn-white text-center" href="{{ route('frontend.shop.addToCart', ['id' => $products->id]) }}">
                                    {{ trans('product.btn-order') }}
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2 col-md-offset-2">
                            {{ trans('product.detail') }} :
                            </div>
                            <div class="col-md-7 text-left">
                                <p>
                                    {{ $products->description }}
                                </p>
                            </div>
                        </div>
                        <br>

                        @if(count($products->media) > 1)
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="slider slider-nav">
                                    @foreach($products->media as $media)
                                        <div><img class="img-thumbnail" src="{{ $media->getUrl() }}" alt="..." style=""></div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif

                        @if(count($products->videos) > 0)
                        <div class="row">
                            <div class="col-md-12">
                                <section class="lazy slider" data-sizes="50vw">
                                    @foreach($products->videos as $video)
                                        <div>
                                            <h3 class="text-red">VIDEO ({{$video->date}})</h3>
                                            {!! $video->video !!}
                                        </div>
                                    @endforeach
                                </section>                                        
                            </div>
                        </div>
                        @endif

                    </div>
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