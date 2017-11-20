@extends('layouts.backoffice.main')

@section('title', 'Admin | User')

@section('head')
    <h1>
        สมาชิก
        <small>รายการ</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
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
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>ชื่อสมาชิก</th>
                        <th>อีเมล์</th>
                        {{--<th>การจัดการ</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $index => $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        {{--<td>--}}
                            {{--<a href="{{ route('user.edit', ['user' => $user->id]) }}"--}}
                               {{--class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i></a>--}}
                            {{--<a href="{{ route('user.destroy', ['user' => $user->id]) }}"--}}
                               {{--class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>--}}
                        {{--</td>--}}
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>ชื่อสมาชิก</th>
                        <th>อีเมล์</th>
                        {{--<th>การจัดการ</th>--}}
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
@endsection