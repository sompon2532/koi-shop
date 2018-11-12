@extends('layouts.backoffice.main')

@section('title', 'Admin | Koi')

@section('head')
    <h1>
        KOI
        <small>Listing</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">KOI</li>
    </ol>
@endsection

@section('content')
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <a href="{{ route('koi.create') }}" class="pull-right btn btn-primary">Create KOI</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>KOI ID</th>
                            <th>KOI</th>
                            <th>Farm</th>
                            <th>Variety</th>
                            <th>Store</th>
                            <th>Born</th>
                            <th>Oyagoi</th>
                            <th>Size</th>
                            <th>Price</th>
                            <th>Sex</th>
                            <th>Unit</th>
                            <th>Owner</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($kois as $index => $koi)
                            <tr>
                                <td>{{ $koi->koi_id }}</td>
                                <td>{{ $koi->name }}</td>
                                <td>{{ $koi->farm ? $koi->farm->name : "" }}</td>
                                <td>{{ $koi->strain ? $koi->strain->name : "" }}</td>
                                <td>{{ $koi->store ? $koi->store->name : "" }}</td>
                                <td>{{ $koi->born }}</td>
                                <td>{{ $koi->oyagoi }}</td>
                                <td>{{ count($koi->sizes) > 0 ? $koi->sizes->last()->size : "" }}</td>
                                <td>{{ $koi->price }}</td>
                                <td>{{ $koi->sex }}</td>
                                <td>{{ $koi->unit }}</td>
                                <td>{{ $koi->user ? $koi->user->name : 'Koikichi Farm'  }}</td>
                                <td>{{ $koi->status ? 'Active' : 'Inactive' }}</td>
                                <td>
                                    <a href="{{ route('koi.edit', ['koi' => $koi->id]) }}"
                                       class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i></a>
                                    <button data-token="{{ csrf_token() }}" data-id="{{ $koi->id }}" data-url="koi" class="btn-delete btn btn-danger btn-xs">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>KOI ID</th>
                            <th>KOI</th>
                            <th>Farm</th>
                            <th>Variety</th>
                            <th>Store</th>
                            <th>Born</th>
                            <th>Oyagoi</th>
                            <th>Size</th>
                            <th>Owner</th>
                            <th>Price</th>
                            <th>Sex</th>
                            <th>Unit</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                <div class="table-responsive">
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
@endsection