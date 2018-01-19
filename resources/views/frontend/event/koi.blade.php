@section('page_title', 'EVENTS')

@extends('frontend.layouts.master')

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
  transition: all ease-in-out .1s;
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
                <div class="events main-content text-center">

                    <div class="title-box">
                        <h1>{{ trans('event.events') }}</h1>
                    </div>

                    @if(count($kois) > 0)
                    <div class="content-box">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>{{ $events->name }}</h2>
                                <!-- <p>16-22 SEPTEMBER 17</p> -->
                                <p>{{ $events->start_datetime->format('d/m/Y') }} to {{ $events->end_datetime->format('d/m/Y') }}</p>

                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="hide-max-768px show-min-768px">
                                        <div class="col-md-12 slide-show">
                                            <div class="slider slider-for">
                                                @if(count($kois->media) > 0)
                                                    @foreach($kois->media as $media)
                                                        <div>
                                                            <a class="example-image-link" href="{{ asset($media->getUrl()) }}" data-lightbox="thumb-1">
                                                                <img class="example-image" src="{{ asset($media->getUrl()) }}" alt="..." style="">
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <img src="{{ asset('frontend/src/img/koi-defalt-img.jpg') }}" alt="..." class="img-responsive">                                                
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12 slide-show">
                                            <div class="item">
                                                <div class="slider slider-nav">
                                                    @foreach($kois->media as $media)
                                                        <img src="{{ asset($media->getUrl()) }}" class="img-responsive" style="">    
                                                    @endforeach
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="show-max-768px hide-min-768px">
                                        <div class="col-md-12 slide-show">
                                            @if(count($kois->media) > 0)
                                                <section class="lazy slider" data-sizes="50vw">
                                                    @foreach($kois->media as $media)
                                                        <a class="example-image-link" href="{{ asset($media->getUrl()) }}" data-lightbox="thumb-1">
                                                            <img class="example-image" src="{{ asset($media->getUrl()) }}" alt="..." style="">
                                                        </a> 
                                                    @endforeach
                                                </section> 
                                            @else
                                                <img src="{{ asset('frontend/src/img/koi-defalt-img.jpg') }}" alt="..." class="img-responsive">                                                
                                            @endif                                       
                                        </div>  
                                    </div>
                                 
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

                                @if(count($kois) > 0)
                                    @if ($today->toDateString() < $events->end_datetime->toDateString() || ($today->toDateString() == $events->end_datetime->toDateString() && $today->toTimeString() <= $events->end_datetime->toTimeString()))
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="col-md-12">
                                                <table class="table text-red">
                                                    <tr>
                                                        <th class="table-border text-center" width="50%">{{ trans('event.remaining_time') }}</th>
                                                        <th class="table-border text-center" width="50%">{{ trans('event.number_of_booking') }}</th>
                                                    </tr>
                                                    <tr>
                                                        <td class="table-border text-center"><div id="showRemain"></div></td>
                                                        <td class="table-border text-center">{{ count($userbooks->users) }}</td>
                                                    </tr>
                                                </table>
                                                <br>
                                                
                                                <table class="table text-red">
                                                    <tr>
                                                        <th class="text-center">{{ trans('event.name_list') }}</th>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">
                                                            @foreach ($userbooks->users as $index => $user)
                                                                {{ $user->name }}
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            @if($events->config)
                                                @php 
                                                    $i=0;
                                                @endphp
                                                @if(count($books) > 0)
                                                    @if($books->id == $kois->id && $kois->event_id == $events->id)
                                                        @php
                                                            $i=1;
                                                        @endphp
                                                    @endif
                                                @endif
                                                @if($i == 1)
                                                    <form action="{{ route('frontend.event.bookdel', ['koi' => $kois->id, 'event' => $events->id]) }}" method="GET" style="">  
                                                        <button type="submit" class="btn btn-red">{{ trans('event.cancel') }}</button>                                                                                          
                                                        {{ csrf_field() }}
                                                    </form>
                                                @else
                                                    <form action="{{ route('frontend.event.bookevent', ['koi' => $kois->id, 'event' => $events->id]) }}" method="GET" style="">
                                                        <button type="submit" class="btn btn-white">{{ trans('event.book_now') }}</button>                                                                                          
                                                        {{ csrf_field() }}
                                                    </form>
                                                @endif
                                            @endif

                                            <div class="col-md-12 text-left">
                                                <br>
                                                <p class="text-left"><font color="#ff0000">{{ $kois->name }}</font><br>
                                                    {{ trans('event.code') }} : {{ $kois->koi_id }} <br>
                                                    {{ trans('event.owner') }} : Koikichi Fish Farm<br>
                                                    {{ trans('event.price') }} : {{ number_format($kois->price) }} {{trans('koi.thb')}}<br>
                                                </p>

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
                                        </div>
                                    @else
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="col-md-12">
                                                <table class="table text-red">
                                                    <tr>
                                                        <th class="table-border text-center" width="50%">{{ trans('event.number_of_booking') }}</th>
                                                    </tr>
                                                    <tr>
                                                        <td class="table-border text-center">{{ count($userbooks->users) }}</td>
                                                    </tr>
                                                </table>
                                                <br>
                                                
                                                <table class="table text-red">
                                                    <tr>
                                                        <th class="text-center">{{ trans('event.winner') }}</th>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">
                                                            {{ $kois->user->name }}
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <div class="col-md-12 text-left">
                                                <br>
                                                <p class="text-red">{{ $kois->name }}<p>
                                                <p>{{ trans('event.code') }} : {{ $kois->koi_id }}</p>
                                                <p>{{ trans('event.owner') }} : Koikichi Fish Farm</p>
                                                <p>{{ trans('event.price') }} : {{ number_format($kois->price) }} {{trans('koi.thb')}}</p>

                                                <p class="text-red">{{ trans('event.detail') }}</p>
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
                                        </div>
                                    @endif

                                @else
                                    <h1 class="text-red">No Koi in Event!</h1>
                                @endif
                            </div>
                        </div>
                    </div>
                    @else
                        <br>
                        <h1 class="text-red">This koi is not in Event!</h1>
                    @endif
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

<!-- countDown -->
<script type="text/javascript"> 
function countDown(){
    var timeA = new Date(); // วันเวลาปัจจุบัน
    var timeB = new Date('<?=date_format($events->end_datetime, 'l F d Y H:i:s')?>'); // วันเวลาสิ้นสุด รูปแบบ เดือน/วัน/ปี ชั่วโมง:นาที:วินาที
    // var timeB = new Date("Febriaru 24,2018 00:00:01"); // วันเวลาสิ้นสุด รูปแบบ เดือน/วัน/ปี ชั่วโมง:นาที:วินาที
    //  var timeB = new Date(2012,1,24,0,0,1,0); 
    // วันเวลาสิ้นสุด รูปแบบ ปี,เดือน;วันที่,ชั่วโมง,นาที,วินาที,,มิลลิวินาที    เลขสองหลักไม่ต้องมี 0 นำหน้า
    // เดือนต้องลบด้วย 1 เดือนมกราคมคือเลข 0
    var timeDifference = timeB.getTime()-timeA.getTime();    
    if(timeDifference>=0){
        timeDifference=timeDifference/1000;
        timeDifference=Math.floor(timeDifference);
        var wan=Math.floor(timeDifference/86400);
        var l_wan=timeDifference%86400;
        var hour=Math.floor(l_wan/3600);
        var l_hour=l_wan%3600;
        var minute=Math.floor(l_hour/60);
        var second=l_hour%60;
        var showPart=document.getElementById('showRemain');
        showPart.innerHTML= wan+" {{trans('event.day')}} "+hour+":"
        +minute+":"+second; 
            if(wan==0 && hour==0 && minute==0 && second==0){
                clearInterval(iCountDown); // ยกเลิกการนับถอยหลังเมื่อครบ
                // เพิ่มฟังก์ชันอื่นๆ ตามต้องการ
            }
    }
}
// การเรียกใช้
var iCountDown=setInterval("countDown()",1000); 
</script>

@endsection