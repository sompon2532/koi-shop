@extends('layouts.backoffice.main')

@section('title', 'Admin | Farm')

@section('head')
    <h1>
        Farm
        <small>list</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Farm</li>
    </ol>
@endsection

@section('content')
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <a href="{{ route('farm.create') }}" class="pull-right btn btn-primary">Create farm</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Aciton</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($farms as $index => $farm)
                    <tr>
                        <td>{{ $farm->id }}</td>
                        <td>{{ $farm->name }}</td>
                        <td>{{ $farm->status ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <a href="{{ route('farm.edit', ['farm' => $farm->id]) }}"
                               class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i></a>
                            <a href="{{ route('farm.destroy', ['farm' => $farm->id]) }}"
                               class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
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