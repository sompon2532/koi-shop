@extends('layouts.backoffice.main')

@section('title', 'Admin | Category')

@section('head')
    <h1>
        หมวดหมู่
        <small>รายการ</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
        <li class="active">หมวดหมู่</li>
    </ol>
@endsection

@section('content')
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <a href="{{ route('category.create') }}" class="pull-right btn btn-primary">สร้างหมวดหมู่</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ชื่อหมวดหมู่</th>
                        <th>กลุ่ม</th>
                        <th>สถานะ</th>
                        <th>การจัดการ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                    $traverse = function ($categories, $prefix = '') use (&$traverse) {
                        foreach ($categories as $category) {
                            echo '<tr>';
                            echo '<td>' . $prefix . $category->name . '</td>';
                            echo '<td>' . $category->group . '</td>';

                            $status = ($category->status) ? 'Active' : 'Inactive';

                            echo '<td>' . $status . '</td>';
                            echo '<td>';
                            echo '<a href="' . route('category.edit', ['category' => $category->id]) . '" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i></a> ';
                            echo '<a href="' . route('category.destroy', ['category' => $category->id]) . '" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>';
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
                        <th>ชื่อหมวดหมู่</th>
                        <th>หลุ่ม</th>
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