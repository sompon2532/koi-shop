@extends('layouts.backoffice.main')

@section('title', 'Admin | Hall of fame')

@section('head')
    <h1>
        หอเกียรติยศ
        <small>รายการ</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
        <li class="active">หอเกียรติยศ</li>
    </ol>
@endsection

@section('content')
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <a href="{{ route('hall-of-fame.create') }}" class="pull-right btn btn-primary">สร้างหอเกียรติยศ</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>หอเกียรติยศ</th>
                        <th>สถานะ</th>
                        <th>การจัดการ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($hall_of_fames as $index => $hall_of_fame)
                        <tr>
                            <td>{{ $hall_of_fame->id }}</td>
                            <td>{{ $hall_of_fame->name }}</td>
                            <td>{{ $hall_of_fame->status ? 'Active' : 'Inactive' }}</td>
                            <td>
                                <a href="{{ route('hall-of-fame.show', ['hall_of_fame' => $hall_of_fame->id]) }}"
                                   class="btn btn-default btn-xs"><i class="fa fa-list"></i></a>
                                <a href="{{ route('hall-of-fame.edit', ['hall_of_fame' => $hall_of_fame->id]) }}"
                                   class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i></a>
                                <button data-token="{{ csrf_token() }}" data-id="{{ $hall_of_fame->id }}" data-url="hall-of-fame" class="btn-delete btn btn-danger btn-xs">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>หอเกียรติยศ</th>
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