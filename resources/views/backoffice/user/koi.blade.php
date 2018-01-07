@extends('layouts.backoffice.main')

@section('title', 'Admin | User order')

@section('head')
    <h1>
        ปลา ( {{ $user->name }} )
        <small>รายการ</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
        <li><a href="{{ route('user.index') }}"><i class="fa fa-user"></i> สมาชิก</a></li>
        <li class="active">ปลา ( {{ $user->name }} )</li>
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
                        <th>รหัสปลา</th>
                        <th>ปลา</th>
                        <th>เจ้าของปลา</th>
                        <th>สถานะ</th>
                        <th>การจัดการ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($user->kois as $index => $koi)
                        <tr>
                            <td>{{ $koi->koi_id }}</td>
                            <td>{{ $koi->name }}</td>
                            <td>{{ $koi->user ? $koi->user->name : 'Koikichi Farm'  }}</td>
                            <td>{{ $koi->status ? 'Active' : 'Inactive' }}</td>
                            <td>
                                <a href="{{ route('koi.edit', ['koi' => $koi->id]) }}"
                                   class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>รหัสปลา</th>
                        <th>ปลา</th>
                        <th>เจ้าของปลา</th>
                        <th>สถานะ</th>
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