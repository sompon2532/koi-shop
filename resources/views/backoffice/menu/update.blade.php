@extends('layouts.backoffice.main')

@section('title', 'Admin | Menu')

@section('head')
    <h1>
        จัดการเมนู
        <small>แก้ไข</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
        <li><a href="{{ route('menu.index') }}"><i class="fa fa-newspaper-o"></i> จัดการเมนู</a></li>
        <li class="active">แก้ไข</li>
    </ol>
@endsection

@section('content')
    <!-- right column -->
    <div class="col-md-12" id="app">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">แก้ไขเมนู</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="{{ route('menu.update', ['menu' => $menu->id]) }}" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">
                                ชื่อ <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" value="{{ $menu->name }}" id="name"
                                       placeholder="Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="url" class="col-sm-3 control-label">
                                ลำดับ <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="seq" value="{{ $menu->seq }}" id="seq"
                                       placeholder="Seq">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="url" class="col-sm-3 control-label">
                                URL <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="url" value="{{ $menu->url }}" id="url"
                                       placeholder="Name">
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    @include('backoffice.partials.cover', ['images' => $menu->media, 'collection' => 'menu'])

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