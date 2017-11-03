@extends('frontend.layouts.master')

@section('page_title', 'KOI')

@section('custom-css')

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
                    <P>KOI > KOI  IN JAPAN > SAKAI > {{-- $products->title --}}</P>

                    <div class="content-box">
                        <div class="row">
                            <div class="col-md-3 col-md-offset-3">
                                <div class="slider slider-for">
                                    @foreach($images as $image)
                                      <div><img class="img-thumbnail" src="/media/{{ $image->order_column }}/{{ $image->file_name }}" alt="..." style="max-height:150px;"></div>
                                    @endforeach
                                </div>
                                <div class="text-red">
                                    <p>TO ORDER</p>
                                    <p>PLEASE CONTACT</p>
                                    <img class="" src="{{-- asset('assets/img/line-logo.png') --}}" alt="...">                                    
                                </div>
                            </div>
                            <div class="col-md-6 text-left">
                                <p class="text-red"> TITLE{{-- $products->title --}}</p>
                                <p>CODE : {{ $products->id }}</p>
                                <p>PRICE : {{ $products->price }} THB / YEN</p>
                                <p>SHIPPING : 9{{ $products->delivery }} THB</p>
                                <a class="btn btn-white" href="{{ route('frontend.shop.addToCart', ['id' => $products->id]) }}">
                                    ORDER
                                </a>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-2 col-md-offset-2">
                            DETAIL :
                            </div>
                            <div class="col-md-7">
                            XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
                            XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
                            XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
                            XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
                            XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="slider slider-nav">
                                    @foreach($images as $image)
                                        <div><img class="img-thumbnail" src="/media/{{ $image->order_column }}/{{ $image->file_name }}" alt="..." style="max-height:150px;"></div>
                                    @endforeach
                                </div>
                            </div>
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