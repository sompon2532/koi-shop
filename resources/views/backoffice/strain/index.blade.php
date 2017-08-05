@extends('layouts.backoffice.main')

@section('title', 'Admin | Strain')

@section('head')
    <h1>
        Strain
        <small>list</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Strain</li>
    </ol>
@endsection

@section('content')
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <a href="{{ route('strain.create') }}" class="pull-right btn btn-primary">Create strain</a>
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
                    @foreach ($strains as $index => $strain)
                    <tr>
                        <td>{{ $strain->id }}</td>
                        <td>{{ $strain->name }}</td>
                        <td>{{ $strain->status }}</td>
                        <td>
                            <a href="{{ route('strain.edit', ['strain' => $strain->id]) }}"
                               class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i></a>
                            <a href="{{ route('strain.destroy', ['strain' => $strain->id]) }}"
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