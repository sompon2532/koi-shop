@extends('layouts.backoffice.main')

@section('title', 'Admin | News')

@section('head')
    <h1>
        จัดการข้อมูลหน้าแรก
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
        <li><a href="{{ route('home.index') }}"><i class="fa fa-home"></i> จัดการข้อมูลหน้าแรก</a></li>
        <li class="active">จัดการข้อมูล</li>
    </ol>
@endsection

@section('content')
    <!-- right column -->
    <div class="col-md-12" id="app">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">จัดการข้อมูล</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="{{ route('home.update', ['home' => $home->id]) }}" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="status" class="col-sm-1 control-label">Video</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="5" name="video">{{ $home->video }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right">แก้ไข</button>
                    </div>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
        <!-- /.box -->
    </div>
    <!--/.col (right) -->
@endsection