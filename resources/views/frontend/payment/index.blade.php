@extends('frontend.layouts.master')

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
<div class="main-content">
    <div class="row"> 

        <div class="title-box text-center">
            <h1>PAYMENT</h1>
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
                        MY ORDERS
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection