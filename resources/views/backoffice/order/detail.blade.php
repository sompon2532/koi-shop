@extends('layouts.backoffice.main')

@section('title', 'Order')

@section('head')
    <h1>
        Order
        <small>Detail</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('order.index') }}"><i class="fa fa-first-order"></i> Order</a></li>
        <li class="active">Description</li>
    </ol>
@endsection

@section('content')
    <!-- right column -->
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Product</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <td># Seq</td>
                        <td>Product ID</td>
                        <td>Product Name</td>
                        <td>Amount</td>
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
                        <td># Seq</td>
                        <td>Product ID</td>
                        <td>Product Name</td>
                        <td>จำนวน</td>
                    </tr>
                    </tfood>
                </table>
            </div>

            @if ($order->payment)
                <div class="box-header">
                    <h3 class="box-title">Payment Status</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <h5>Band : {{ $order->payment->bank }}</h5>
                    <h5>Price : {{ number_format($order->payment->total, 2) }} Bath</h5>
                    <h5>
                        Slip :
                        <img src="{{ $order->payment->image }}" alt="" width="150" class="img-thumbnail">
                    </h5>
                </div>
            @endif

            <div class="box-header">
                <h3 class="box-title">Customer Detail</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <h5>Name : {{ $order->name }}</h5>
                <h5>Address : {{ $order->address }}</h5>
                <h5>Phone : {{ $order->tel }}</h5>
                <h5>Amount : {{ $order->totalQty }}</h5>
                <h5>Total : {{ number_format($order->totalPrice, 2) }} Bath</h5>
                {{--<h5>--}}
                    {{--Status :--}}
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