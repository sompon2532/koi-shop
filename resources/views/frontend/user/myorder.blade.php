@section('page_title', 'My Orders')

@extends('frontend.layouts.master')

@section('custom-css')
@endsection

@section('content')
<section id="main">
    <div class="container">
        <div class="row"> 
            <div class="col-md-12">
                <div class="main-content">
                    <div class="row">
                        <div class="title-box text-center">
                            <h1>MY ODER</h1>
                        </div>

                        <div class="content-box">
                            @foreach($orders as $order)
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-md-12">
                                            
                                            <div class="title-info-box">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <p>ORDER NUMBER : #{{ $order->id }}</p>
                                                        <p>DATE : {{ $order->created_at }}</p>
                                                    </div>
                                                    <div class="col-md-4 text-right">
                                                        <br>
                                                        <p>TOTAL : {{ number_format($order->totalPrice) }} THB</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="content-info-box">
                                                <div class="row">
                                                    @foreach($order->cart->items as $item)
                                                        <div class="col-md-6 orders-detail">
                                                            <div class="col-md-4">
                                                                <img class="img-thumbnail" src="{{ asset('assets/img/map-koikichi.png') }}" alt="...">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <p class="text-red">{{ $item['item']['name'] }}</p>
                                                                <p>CODE : {{ $item['item']['id'] }}</p>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                    <div class="col-md-12 text-center">
                                                        <a class="btn btn-red" href="#">
                                                            CHECK OUT
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>         
                                        </div>
                                    </div>
                                </div> <!-- info-box -->
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <div class="container">
    <div class="row">
        <div class="col-md-10 col-md-10 col-md-offset-1">
            <div class="contact-us">
                <div class="info-box text-center">

                    <div class="title-box">
                        <h1>CONTACT US</h1>
                    </div>


                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <form class="form-inline">
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"> NAME </div>
                                        <input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"> E-MAIL </div>
                                        <input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"> PHONE NUMBER </div>
                                        <input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"> DETAILS </div>
                                        <textarea type="text" class="form-control" id="exampleInputAmount" placeholder="Amount"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Transfer cash</button>
                            </form>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-2 col-md-offset-5">
                            <h4 class="text-thick contact-title">เวลาให้บริการ</h4>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <p>รับการสั่งซื้อผ่านเว็บไซต์ 24 ชั่วโมง ตอบอีเมล์ทุกๆวันภายใน 24 ชั่วโมง
                                โทรสอบถามและเข้าเยี่ยมชมที่ฟาร์มได้ทุกวันอังคาร - วันอาทิตย์ ในเวลา 9.00 - 18.00 น และปิดทำการทุกวันจันทร์</p>
                        </div>
                    </div>
                    <br>


                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            <h4 class="text-thick contact-title">KOIKICHI FISH FARM</h4>
                        </div>
                    </div>


                    <div class="row">   
                        <div class="col-md-12">                
                            <p>120-122 ถ.พุทธมณฑลสาย 3 เเขวงทวีวัฒนา เขตทวีวัฒนา กรุงเทพมหานคร 10170 ประเทศไทย
                                โทรศัพท์: 02-4315646 ต่อ 11  แฟกซ์: 02-4315646  มือถือ: 081-6427525</p>
                        </div>
                    </div> 
                    <br>


                    <div class="row">
                        <div class="col-md-2 col-md-offset-5">
                            <h4 class="text-thick contact-title center">MAP</h4>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">   
                            <div class="map">
                                <img class="img-responsive" src="{{ asset('assets/img/map-koikichi.png') }}" alt="...">
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
