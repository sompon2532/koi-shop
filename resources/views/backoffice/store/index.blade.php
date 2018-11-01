@extends('layouts.backoffice.main')

@section('title', 'Admin | Store')

@section('head')
    <h1>
        Store
        <small>Listing</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Store</li>
    </ol>
@endsection

@section('content')
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <a href="{{ route('store.create') }}" class="pull-right btn btn-primary">Create Store</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Store</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($stores as $index => $store)
                        <tr>
                            <td>{{ $store->id }}</td>
                            <td>{{ $store->name }}</td>
                            <td>{{ $store->status ? 'Active' : 'Inactive' }}</td>
                            <td>
                                <a href="{{ route('store.show', ['store' => $store->id]) }}"
                                   class="btn btn-default btn-xs"><i class="fa fa-list"></i></a>
                                <a href="{{ route('store.edit', ['store' => $store->id]) }}"
                                   class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i></a>
                                <button data-token="{{ csrf_token() }}" data-id="{{ $store->id }}" data-url="store" class="btn-delete btn btn-danger btn-xs">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Store</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
@endsection