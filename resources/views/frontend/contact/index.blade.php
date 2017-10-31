@section('page_title', 'Contact Us')

@extends('frontend.layouts.master')

@section('content')
<!-- <div class="container"> -->
    <div class="row">
        <div class="col-md-10 col-md-10 col-md-offset-1">
            <div class="contact-us">
                <div class="text-center">

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
                                        <input type="text" class="form-control" id="exampleInputAmount" placeholder="NAME">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"> E-MAIL </div>
                                        <input type="text" class="form-control" id="exampleInputAmount" placeholder="E-MAIL">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"> PHONE NUMBER </div>
                                        <input type="text" class="form-control" id="exampleInputAmount" placeholder="PHONE NUMBER">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"> DETAILS </div>
                                        <textarea type="text" class="form-control" id="exampleInputAmount" placeholder="DETAILS"></textarea>
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
                                <img class="img-responsive" src="{{ asset('frontend/scr/img/map-koikichi.png') }}" alt="...">
                                <!-- <img class="img-responsive" src="{{ asset('assets/img/About-us-2.png') }}" alt="..."> -->
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
<!-- </div> -->
@endsection