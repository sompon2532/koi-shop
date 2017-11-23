@extends('frontend.layouts.master')

@section('page_title', 'KOI')

@section('custom-css')
<style>
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

                    <h3 class="text-red"> SAKAI </h3>
                    <P>KOI > KOI  IN JAPAN > SAKAI > {{ $products->name }}</P>

                    <div class="content-box">
                        <div class="row">
                            <br>
                            <div class="col-md-3 col-md-offset-3">
                                <div class="slider slider-for">
                                    @foreach($images as $image)
                                      <div><img class="img-thumbnail" src="/media/{{ $image->order_column }}/{{ $image->file_name }}" alt="..." style=""></div>
                                    @endforeach
                                </div>
                                <br>
                                <div class="text-red">
                                    <p>TO ORDER</p>
                                    <p>PLEASE CONTACT</p>
                                    <img class="" src="{{ asset('/frontend/src/img/line-logo.png') }}" alt="..." width="40">                                    
                                </div>
                            </div>
                            <br>                            
                            <div class="col-md-6 text-left">
                                <p class="text-red">TITLE : {{ $products->name }}</p>
                                <p>CODE : {{ $products->id }}</p>
                                <p>PRICE : {{ $products->price }} THB</p>
                                <p>SHIPPING : {{ $products->delivery }} THB</p>
                                <div class="text-center-max992">
                                    <a class="btn btn-white text-center" href="{{ route('frontend.shop.addToCart', ['id' => $products->id]) }}">
                                        ORDER
                                    </a>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-2 col-md-offset-2 text-right">
                            DETAIL :
                            </div>
                            <div class="col-md-7 text-left">
                                <p>
                                    {{ $products->description }}
                                </p>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="slider slider-nav">
                                    @foreach($images as $image)
                                        <div><img class="img-thumbnail" src="/media/{{ $image->order_column }}/{{ $image->file_name }}" alt="..." style=""></div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        @if(count($products->videos) > 0)
                        <div class="row">
                            <div class="col-md-12">
                                <section class="lazy slider" data-sizes="50vw">
                                    @foreach($products->videos as $video)
                                        <div>
                                            {!! $video->video !!}
                                        </div>
                                    @endforeach
                                </section>                                        
                            </div>
                        </div>
                        @endif

                    </div><!-- content-box -->
                </div>

            </div>
        </div>
    </div>

    <!-- slick -->
    <!-- <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
              <h2>Slider Syncing</h2> 
              <div class="slider slider-for">
                @foreach($images as $image)
                  <div><img class="img-thumbnail" src="/media/{{ $image->order_column }}/{{ $image->file_name }}" alt="..." style="max-height:150px;"></div>
                @endforeach
              </div>
              <div class="slider slider-nav">
                @foreach($images as $image)
                  <div><img class="img-thumbnail" src="/media/{{ $image->order_column }}/{{ $image->file_name }}" alt="..." style="max-height:150px;"></div>
                @endforeach
              </div>
            </div>
        </div>
    </div> -->
</section>

@endsection

<!-- <script>
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
}
</script> -->
@section('custom-js')
<script>
$(document).ready(function(){
  $('.your-class').slick({
    
  });
});
	

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
  dots: true,
  centerMode: true,
  focusOnSelect: true
});
</script>

<script type="text/javascript">
    $(document).on('ready', function() {
      $(".vertical-center-4").slick({
        dots: true,
        vertical: true,
        centerMode: true,
        slidesToShow: 4,
        slidesToScroll: 2
      });
      $(".vertical-center-3").slick({
        dots: true,
        vertical: true,
        centerMode: true,
        slidesToShow: 3,
        slidesToScroll: 3
      });
      $(".vertical-center-2").slick({
        dots: true,
        vertical: true,
        centerMode: true,
        slidesToShow: 2,
        slidesToScroll: 2
      });
      $(".vertical-center").slick({
        dots: true,
        vertical: true,
        centerMode: true,
      });
      $(".vertical").slick({
        dots: true,
        vertical: true,
        slidesToShow: 3,
        slidesToScroll: 3
      });
      $(".regular").slick({
        dots: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3
      });
      $(".center").slick({
        dots: true,
        infinite: true,
        centerMode: true,
        slidesToShow: 5,
        slidesToScroll: 3
      });
      $(".variable").slick({
        dots: true,
        infinite: true,
        variableWidth: true
      });
      $(".lazy").slick({
        lazyLoad: 'ondemand', // ondemand progressive anticipated
        infinite: true
      });
    });
</script>

@endsection