{{--<!-- @extends('frontend.layouts.master') -->--}}
@extends('layouts.frontend.main')

@section('page_title', 'Payment')

@section('custom-css')
<style>
    .payment-info {
        display: table;
        margin: 0 auto;
    }
</style>
@endsection

@section('content')
<div class="content-box">
    <div class="row"> 
        <div class="col-md-12 text-center">
            <div class="title-lf">
                <img class="img-responsive" src="{{ asset('frontend/src/img/Title-left.png') }}">
            </div>
            <div class="title-m">
                <div class="title-inm">
                    <h1 class="text-thick">{{trans('payment.payment')}}</h1>
                </div>
            </div>
            <div class="title-rg">
                <img class="img-responsive" src="{{ asset('frontend/src/img/Title-right.png') }}">
            </div>
        </div>

        <div class="text-left">
            <div class="payment-info">
                <p>1. เลือกโอนชำระเข้ามาทางบัญชีธนาคารกสิกรไทย หรือ ธนาคารกรุงเทพฯ ตามข้อมูลด้านล่าง</p>
                <p>2. หลังจากโอนแล้ว กรุณายืนยันการชำระเงินได้ 3 วิธีตาม 2.1 - 2.3</p>
                <p style="margin-left:30px;">1. ส่ง SMS ผ่านบริการของธนาคารมาที่ 081-6427525</p>
                <p style="margin-left:30px;">2. แจ้งการชำระเงินโดยการกรอกข้อมูลในช่องแจ้งการชำระเงินด้านล่าง</p>
                <p style="margin-left:30px;">3. โทรศัพท์เข้ามาแจ้งการชำระเงินที่ 081-6427525</p>

                <div class="text-center">
                    <a class="btn btn-red" href="{{ route('frontend.user.myorder') }}">
                        {{trans('payment.btn-my-orders')}}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection