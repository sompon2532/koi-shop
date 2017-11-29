@extends('frontend.layouts.master')

@section('page_title', 'Payment')

@section('custom-css')
<style>
    .box-center{
        display: table;
        margin: 0 auto;
    }
</style>
@endsection

@section('content')

    <div class="container">
        <div class="row"> 
            <div class="main-content col-md-12">
                    <div class="title-box text-center">
                        <h1>PAYMENT</h1>
                    </div>
                    <div class="content-box">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box-center">
                                    <table class="table-none-border">
                                        <tr>
                                            <td class="text-right" width="50%">ORDER : </td>
                                            <td class="text-left"  width="50%"> #{{ $order->id }}</td>
                                        </tr>  
                                        <tr>
                                            <td class="text-right">DATE : </td>
                                            <td class="text-left"> {{ $order->created_at->toDateString() }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-right">TOTAL : </td>
                                            <td class="text-left"> {{ number_format($order->totalPrice) }} THB</td>
                                        </tr>
                                        <tr>
                                            <td class="text-right">NAME : </td>
                                            <td class="text-left">{{ $order->name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-right" valign="top"><p>ADDRESS : </p></td>
                                            <td class="text-left">{{ $order->address }}</td>
                                        </tr>
                                        <!-- <tr>
                                            <td class="text-right">E-MAIL : </td>
                                            <td class="text-left">XXXXXXXXX@gmail.com</td>
                                        </tr> -->
                                        <tr>
                                            <td class="text-right">PHONE NUMBER : </td>
                                            <td class="text-left">{{ $order->tel }}</td>
                                        </tr>
                                    </table>
                                </div>

                                <div class="box-center text-center">
                                    <h3 class="text-red">THANK YOU FOR ORDERING WITH US</h3>
                                    <P>เมื่อเราตรวจสอบทุกอย่างเรียบร้อย เราจะทำการจัดส่งสินค้าให้โดยเร็วที่สุด</P>
                                    <P>(กรุงเทพฯ 3 วัน , ต่างจังหวัด 5 วัน)</P>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection