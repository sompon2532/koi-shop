{{--<!-- @extends('frontend.layouts.master') -->--}}
@extends('layouts.frontend.main')

@section('page_title', 'PAYMENT')

@section('custom-css')
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
                    <h1 class="text-thick">PAYMENT</h1>
                </div>
            </div>
            <div class="title-rg">
                <img class="img-responsive" src="{{ asset('frontend/src/img/Title-right.png') }}">
            </div>
        </div>

        <div class="col-md-12">
            <div class="info-box-center">
                <table class="table-none-border">
                    <tr>
                        <td class="text-right" width="50%">ORDER : </td>
                        <td width="50%"> #{{ $order->id }}</td>
                    </tr>  
                    <tr>
                        <td class="text-right text-top">DATE : </td>
                        <td> {{ $order->created_at->toDateString() }}</td>
                    </tr>
                    <tr>
                        <td class="text-right text-top">TOTAL : </td>
                        <td> {{ number_format($order->totalPrice) }} THB</td>
                    </tr>
                    <tr>
                        <td class="text-right text-top">NAME : </td>
                        <td> {{ $order->name }}</td>
                    </tr>
                    <tr>
                        <td class="text-right text-top" valign="top">ADDRESS :</td>
                        <td> {{ $order->address }}</td>
                    </tr>
                    <tr>
                        <td class="text-right text-top">TEL : </td>
                        <td> {{ $order->tel }}</td>
                    </tr>
                </table>
            </div>

            <div class="text-center">
                <h3 class="text-red">THANK YOU FOR ORDERING WITH US</h3>
                <P>เมื่อเราตรวจสอบทุกอย่างเรียบร้อย เราจะทำการจัดส่งสินค้าให้โดยเร็วที่สุด</P>
                <P>(กรุงเทพฯ 3 วัน , ต่างจังหวัด 5 วัน)</P>
            </div>
        </div>
    </div>
</div>
@endsection