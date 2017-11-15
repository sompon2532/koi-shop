@section('page_title', 'EVENTS')

@extends('frontend.layouts.master')

@section('custom-css')
@endsection

@section('content')
<section id="main">
    <div class="container">
        <div class="row"> 
            <div class="col-md-12">
                <div class="events main-content text-center">

                    <div class="title-box">
                        <h1>{{ $events->name }}</h1>
                    </div>

                    <div class="content-box">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- <p>CHUGOKU AUCTION WEEK</p> -->
                                <!-- <p>16-22 SEPTEMBER 17</p> -->
                                <p>{{ $events->start_datetime }} to {{ $events->end_datetime }}</p>


                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="slider slider-for">
                                            @foreach($kois->media as $media)
                                                <img src="{{ asset($media->getUrl()) }}" class="image-responsive" style="max-height:150px;">    
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="item">
                                            <div class="slider slider-nav">
                                                @foreach($kois->media as $media)
                                                    <img src="{{ asset($media->getUrl()) }}" class="image-responsive" style="max-height:150px;">    
                                                @endforeach
                                            </div>
                                        </div> 
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <table class="table text-red">
                                            <tr>
                                                <th class="table-border text-center" width="50%">REMAINING TIME</th>
                                                <th class="table-border text-center" width="50%">NUMBER OF BOOKING</th>
                                            </tr>
                                            <tr>
                                                <td class="table-border text-center">28:35:24</td>
                                                <td class="table-border text-center">2</td>
                                            </tr>
                                        </table>
                                        <br>
                                        <table class="table text-red">
                                            <tr>
                                                <th class="text-center">NAME LIST</th>
                                            </tr>
                                            <tr>
                                                <td class="text-center">USER 1, USER 2</td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div class="col-md-12">
                                        <a class="btn btn-white" href="#">
                                            BOOK NOW
                                        </a>
                                    </div>

                                    <div class="col-md-12">
                                        <br>
                                        <p class="text-left"><font color="#ff0000">MARUYAMA SHOWA</font><br>
                                            CODE : {{ $kois->koi_id }} <br>
                                            OWNER : {{ $kois->owner }}<br>
                                            PRICE : {{ $kois->price }} THB / YEN<br>
                                            <!-- SHIPPING : 9999 THB<br><br> -->
                                        </p>

                                        <p class="text-left"><font color="#ff0000">DETAIL</font><br>
                                            BREEDER : AOKIYA<br>
                                            BORN IN : {{ $kois->born }}<br>
                                            SIZE : {{ $kois->size }}<br>
                                            GENDER : {{ $kois->sex }}<br><br>
                                        </p>

                                        <!-- <p class="text-left"><font color="#ff0000">DETAIL</font><br>
                                            XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
                                            XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
                                            XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
                                            XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
                                        </p> -->
                                    </div>
                                </div>
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
    // $(document).on('ready', function() {
    //   $(".vertical-center-4").slick({
    //     dots: true,
    //     vertical: true,
    //     centerMode: true,
    //     slidesToShow: 4,
    //     slidesToScroll: 2
    //   });
    //   $(".vertical-center-3").slick({
    //     dots: true,
    //     vertical: true,
    //     centerMode: true,
    //     slidesToShow: 3,
    //     slidesToScroll: 3
    //   });
    //   $(".vertical-center-2").slick({
    //     dots: true,
    //     vertical: true,
    //     centerMode: true,
    //     slidesToShow: 2,
    //     slidesToScroll: 2
    //   });
    //   $(".vertical-center").slick({
    //     dots: true,
    //     vertical: true,
    //     centerMode: true,
    //   });
    //   $(".vertical").slick({
    //     dots: true,
    //     vertical: true,
    //     slidesToShow: 3,
    //     slidesToScroll: 3
    //   });
    //   $(".regular").slick({
    //     dots: true,
    //     infinite: true,
    //     slidesToShow: 3,
    //     slidesToScroll: 3
    //   });
    //   $(".center").slick({
    //     dots: true,
    //     infinite: true,
    //     centerMode: true,
    //     slidesToShow: 5,
    //     slidesToScroll: 3
    //   });
    //   $(".variable").slick({
    //     dots: true,
    //     infinite: true,
    //     variableWidth: true
    //   });
    //   $(".lazy").slick({
    //     lazyLoad: 'ondemand', // ondemand progressive anticipated
    //     infinite: true
    //   });
    // });
</script>

@endsection