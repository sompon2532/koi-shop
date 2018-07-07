@extends('layouts.backoffice.main')

@section('title', 'Admin | User')

@section('head')
    <h1>
        สมาชิก
        <small>รายการ</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
        <li class="active">สมาชิก</li>
    </ol>
@endsection

@section('content')
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                {{--<a href="{{ route('user.create') }}" class="pull-right btn btn-primary">Create user</a>--}}
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="datatable" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>สมาชิก</th>
                        <th>อีเมล์</th>
                        <th>การจัดการ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $index => $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('user.koi', ['user' => $user->id]) }}" class="btn btn-warning btn-xs">
                                <i class="fa fa-archive"></i> ข้อมูลปลา
                            </a>
                            <a href="{{ route('user.order', ['user' => $user->id]) }}" class="btn btn-warning btn-xs">
                                <i class="fa fa-first-order"></i> ข้อมูลสั่งซื้อ
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>สมาชิก</th>
                        <th>อีเมล์</th>
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