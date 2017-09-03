@extends('layouts.backoffice.main')

@section('title', 'Admin | Koi')

@push('style')
    <style>
        .minus {
            position: absolute;
            cursor: pointer;
            right: 0px;
            top: 0px;
        }

        .add {
            float: right;
            margin-top: -10px;
            margin-bottom: 15px;
        }
    </style>
@endpush

@section('head')
    <h1>
        Koi
        <small>list</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Koi</li>
    </ol>
@endsection

@section('content')
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <a href="{{ route('koi.create') }}" class="pull-right btn btn-primary">Create koi</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Koi ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Aciton</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($kois as $index => $koi)
                        <tr>
                            <td>{{ $koi->koi_id }}</td>
                            <td>{{ $koi->name }}</td>
                            <td>{{ $koi->slug }}</td>
                            <td>{{ $koi->status ? 'Active' : 'Inactive' }}</td>
                            <td>
                                <a href="{{ route('koi.edit', ['koi' => $koi->id]) }}"
                                   class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i></a>
                                <a href="{{ route('koi.destroy', ['koi' => $koi->id]) }}"
                                   class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Koi ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Aciton</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
@endsection