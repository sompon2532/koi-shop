@extends('layouts.backoffice.main')

@section('title', 'Admin | User order')

@section('head')
    <h1>
        สั่งซื้อ ( {{ $user->name }} )
        <small>รายการ</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
        <li><a href="{{ route('user.index') }}"><i class="fa fa-user"></i> สมาชิก</a></li>
        <li class="active">สั่งซื้อ ( {{ $user->name }} )</li>
    </ol>
@endsection

@section('content')
    <div class="col-xs-12">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th># Order</th>
                        <th>ชื่อ</th>
                        <th>ราคา</th>
                        <th>เบอร์โทร</th>
                        <th>การจัดการ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($user->orders as $index => $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ number_format($order->totalPrice, 2) }}</td>
                            <td>{{ $order->tel }}</td>
                            <td>
                                <a href="{{ route('order.show', ['order' => $order->id]) }}"
                                   class="btn btn-warning btn-xs"><i class="fa fa-list-alt"></i></a>
                                {{--<button data-token="{{ csrf_token() }}" data-id="{{ $order->id }}" data-url="news" class="btn-delete btn btn-danger btn-xs">--}}
                                {{--<i class="fa fa-trash-o"></i>--}}
                                {{--</button>--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th># Order</th>
                        <th>ชื่อ</th>
                        <th>ราคา</th>
                        <th>เบอร์โทร</th>
                        <th>การจัดการ</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
@endsection

@push('scripts')
@endpush