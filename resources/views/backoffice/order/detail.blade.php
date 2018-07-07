@extends('layouts.backoffice.main')

@section('title', 'Order')

@section('head')
    <h1>
        สั่งซื้อ
        <small>รายละเอียด</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
        <li><a href="{{ route('order.index') }}"><i class="fa fa-first-order"></i> สั่งซื้อ</a></li>
        <li class="active">รายละเอียด</li>
    </ol>
@endsection

@section('content')
    <!-- right column -->
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">รายการสินค้า</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <td># ลำดับ</td>
                        <td>รหัสสินค้า</td>
                        <td>ชื่อสินค้า</td>
                        <td>จำนวน</td>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->products as $index => $product)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $product->product_id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->pivot->qty }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfood>
                    <tr>
                        <td># ลำดับ</td>
                        <td>รหัสสินค้า</td>
                        <td>ชื่อสินค้า</td>
                        <td>จำนวน</td>
                    </tr>
                    </tfood>
                </table>
            </div>

            @if ($order->payment)
                <div class="box-header">
                    <h3 class="box-title">สถานะการชำระเงิน</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <h5>ธนาคาร : {{ $order->payment->bank }}</h5>
                    <h5>จำนวนเงิน : {{ number_format($order->payment->total, 2) }} บาท</h5>
                    <h5>
                        หลักฐานการโอนเงิน :
                        <img src="{{ $order->payment->image }}" alt="" width="150" class="img-thumbnail">
                    </h5>
                </div>
            @endif

            <div class="box-header">
                <h3 class="box-title">รายละเอียดผู้สั่งซื้อ</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <h5>ชื่อผู้ซื้อ : {{ $order->name }}</h5>
                <h5>ที่อยู่ : {{ $order->address }}</h5>
                <h5>เบอร์ติดต่อ : {{ $order->tel }}</h5>
                <h5>จำนวนสินค้า : {{ $order->totalQty }}</h5>
                <h5>ราคารวม : {{ number_format($order->totalPrice, 2) }} บาท</h5>
                {{--<h5>--}}
                    {{--สถานะ :--}}
                    {{--@if ($order->status == 0)--}}
                        {{--รอการยืนยัน--}}
                    {{--@elseif ($order->status ==1)--}}
                        {{--กำลังจัดส่ง--}}
                    {{--@else--}}
                        {{--จัดส่งเรียบร้อย--}}
                    {{--@endif--}}
                {{--</h5>--}}
            </div>
        </div>
    </div>
    <!--/.col (right) -->
@endsection