@extends('layouts.backoffice.main')

@section('title', 'Admin | Category')

@section('head')
    <h1>
        Category
        <small>Listing</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Category</li>
    </ol>
@endsection

@section('content')
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <a href="{{ route('category.create') }}" class="pull-right btn btn-primary">Create Category</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Category</th>
                        <th>Group</th>
                        <th>Seq</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                    $traverse = function ($categories, $prefix = '') use (&$traverse) {
                        foreach ($categories as $category) {
                            echo '<tr>';
                            echo '<td>' . $prefix . $category->name . '</td>';
                            echo '<td>' . $category->group . '</td>';
                            echo '<td>' . $prefix . $category->seq . '</td>';

                            $status = ($category->status) ? 'Active' : 'Inactive';

                            echo '<td>' . $status . '</td>';
                            echo '<td>';
                            echo '<a href="' . route('category.edit', ['category' => $category->id]) . '" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i></a> ';
                            echo '<button data-token="' . csrf_token() . '" data-id="' . $category->id . '" data-url="category" class="btn-delete btn btn-danger btn-xs">';
                            echo '<i class="fa fa-trash-o"></i>';
                            echo '</button>';
                            echo '</td>';
                            echo '<tr>';

                            $traverse($category->children, $prefix.'<i class="fa fa-minus" aria-hidden="true"></i> ');
                        }
                    };

                    $traverse($categories);
                    @endphp
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Category</th>
                        <th>หลุ่ม</th>
                        <th>Seq</th>
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