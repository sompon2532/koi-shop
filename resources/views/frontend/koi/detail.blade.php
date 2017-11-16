@extends('frontend.layouts.master')

@section('page_title', 'KOI')

@section('custom-css')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.slider {
    width: 50%;
    margin: auto;
    /* margin: 100px auto; */
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
                        <h1>STOCK IN JAPAN</h1>
                    </div>

                    <h3 class="text-red"> SAKAI </h3>
                    <P>KOI > KOI  IN JAPAN > SAKAI > {{ $kois->name }}</P>

                    <div class="content-box">
                        <div class="row">
                            <div class="col-md-6">
                               <!--  <img class="img-thumbnail" src="{{ asset('assets/img/stock-koi-4.png') }}" alt="..."> -->
                               <div class="col-md-12">
                                    <div class="slider slider-for thumbnail">
                                        @foreach($kois->media as $media)
                                            <img src="{{ asset($media->getUrl()) }}" class="image-responsive" style=""> 
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-6 col-md-offset-3 text-red">
                                    <p>TO ORDER</p>
                                    <p>PLEASE CONTACT</p>
                                    <img class="" src="{{ asset('frontend/src/img/line-logo.png') }}" alt="...">                                    
                                </div>
                            </div>
                            <div class="col-md-6 text-left">
                                <p class="text-red">{{-- $products->title --}}</p>
                                <p>CODE : {{ $kois->koi_id }}</p>
                                <p>OWNER : {{ $kois->owner }}</p>
                                <p>PRICE : {{ $kois->price }} THB / YEN</p>
                                <!-- <p>SHIPPING : 9999 THB</p> -->
                                <br>
                                <p class="text-red">DETAIL</p>
                                <p>BREEDER : {{ $kois->owner }}</p>
                                <p>BORN IN : {{ $kois->born }}</p>
                                <p>SIZE : {{ $kois->owner }}</p>
                                <p>GENDER : {{ $kois->sex }}</p>
                            </div>

                            @if(count($kois->media) > 1)                            
                                <div class="col-md-12">
                                    <div class="item">
                                        <div class="slider slider-nav">
                                            @foreach($kois->media as $media)
                                                <!-- <div class="col-md-3"> -->
                                                    <img src="{{ asset($media->getUrl()) }}" class="image-responsive" style="max-height:150px;">    
                                                <!-- </div> -->
                                            @endforeach
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
    <!-- slick -->
    <!-- <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
              <h2>Slider Syncing</h2> 
              <div class="slider slider-for">
                <div><img class="" src="{{ asset('assets/img/stock-koi-1.png') }}" alt="..."></div>
                <div><img class="" src="{{ asset('assets/img/stock-koi-2.png') }}" alt="..."></div>
                <div><img class="" src="{{ asset('assets/img/stock-koi-3.png') }}" alt="..."></div>
                <div><img class="" src="{{ asset('assets/img/stock-koi-4.png') }}" alt="..."></div>
                <div><img class="" src="{{ asset('assets/img/stock-koi-3.png') }}" alt="..."></div>
              </div>
              <div class="slider slider-nav">
                <div><img class="" src="{{ asset('assets/img/stock-koi-1.png') }}" alt="..."></div>
                <div><img class="" src="{{ asset('assets/img/stock-koi-2.png') }}" alt="..."></div>
                <div><img class="" src="{{ asset('assets/img/stock-koi-3.png') }}" alt="..."></div>
                <div><img class="" src="{{ asset('assets/img/stock-koi-4.png') }}" alt="..."></div>
                <div><img class="" src="{{ asset('assets/img/stock-koi-3.png') }}" alt="..."></div>
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