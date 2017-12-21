@section('page_title', 'Contact Us')

@extends('frontend.layouts.master')

@section('content')
<!-- <div class="container"> -->
    <div class="row">
        <div class="col-md-10 col-md-10 col-md-offset-1">
            <div class="contact-us">
                <div class="text-center">

                    <div class="title-box">
                        <h1>{{ trans('contact.contact-us') }}</h1>
                    </div>

                    @if(Session::has('success'))
                        <div class="row">
                            <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                                <div id="charge-message" class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                            <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                                <div id="charge-message" class="alert alert-success">
                                        haloo
                                </div>
                            </div>
                        </div>


                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
                            <form class="form-inline" action="{{ route('frontend.contact.postContact') }}" method="post" id="contact-form">
                                <div class="form-group form-contact">
                                    <div class="input-group">
                                        <div class="input-group-addon"> {{ trans('contact.name') }} </div>
                                        <input type="text" class="form-control" id="exampleInputAmount" placeholder="NAME" name="name" required>
                                    </div>
                                </div>
                                <div class="form-group form-contact">
                                    <div class="input-group ">
                                        <div class="input-group-addon"> {{ trans('contact.email') }} </div>
                                        <input type="email" class="form-control" id="exampleInputAmount" placeholder="E-MAIL" name="email" required>
                                    </div>
                                </div>
                                <div class="form-group form-contact">
                                    <div class="input-group">
                                        <div class="input-group-addon"> {{ trans('contact.tel') }} </div>
                                        <input type="text" class="form-control" id="exampleInputAmount" placeholder="TELEPHONE NUMBER" name="phone" required>
                                    </div>
                                </div>
                                <div class="form-group form-contact">
                                    <div class="input-group">
                                        <div class="input-group-addon"> {{ trans('contact.detail') }} </div>
                                        <textarea type="text" class="form-control" id="exampleInputAmount" placeholder="DETAILS" name="description" required></textarea>
                                    </div>
                                </div>
                                <div class="form-contact">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-white">{{ trans('contact.btn-send') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-4 col-md-2 col-md-offset-5">
                            <h4 class="text-thick contact-title">{{ trans('contact.service-time') }}</h4>
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
                        <div class="col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4">
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
                        <div class="col-sm-2 col-sm-offset-5 col-md-2 col-md-offset-5">
                            <h4 class="text-thick contact-title center">{{ trans('contact.map') }}</h4>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">   
                            <div class="map">
                                <img class="img-responsive" src="{{ asset('frontend/src/img/map-koikichi.png') }}" alt="...">
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