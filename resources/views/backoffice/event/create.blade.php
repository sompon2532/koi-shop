@extends('layouts.backoffice.main')

@section('title', 'Event')

@section('head')
    <h1>
        อีเว้นท์
        <small>สร้าง</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
        <li><a href="{{ route('event.index') }}"><i class="fa fa-gamepad"></i> อีเว้นท์</a></li>
        <li class="active">สร้าง</li>
    </ol>
@endsection

@section('content')
    <!-- right column -->
    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">สร้างอีเว้นท์</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="{{ route('event.store') }}"
                  enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nameTh" class="col-sm-3 control-label">
                                ชื่อไทย <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="th[name]" value="{{ old('th.name') }}"
                                       id="nameTh"
                                       placeholder="ชื่อไทย">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                วันที่เริ่ม <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control datepicker" name="start_date">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                วันที่สิ้นสุด <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control datepicker" name="end_date">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="config" class="col-sm-3 control-label">
                                ตั้งค่าการลงชื่อ
                            </label>
                            <div class="col-sm-9" style="margin-top: 5px;">
                                <input type="checkbox" class="minimal-red" name="config" value="1" id="config">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nameEn" class="col-sm-3 control-label">
                                ชื่ออังกฤษ <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="en[name]" value="{{ old('en.name') }}"
                                       id="nameEn"
                                       placeholder="ชื่ออังกฤษ">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                เวลาเริ่มต้น <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <div class="bootstrap-timepicker">
                                    <input type="text" class="form-control timepicker" name="start_time">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                เวลาสิ้นสุด <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <div class="bootstrap-timepicker">
                                    <input type="text" class="form-control timepicker" name="end_time">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status" class="col-sm-3 control-label">สถานะ</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="status" id="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    @include('backoffice.partials.cover', ['images' => []])

                    <div class="clearfix"></div>

                    @include('backoffice.partials.image', ['images' => []])

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right">สร้าง</button>
                    </div>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
        <!-- /.box -->
    </div>
    <!--/.col (right) -->
@endsection

@push('scripts')
    <script>
        // Date picker
        $(".datepicker").datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy',
            todayHighlight: true,
        });

        // Timepicker
        $(".timepicker").timepicker({
            showInputs: false,
            minuteStep: 10,
            showMeridian: false,
        });

        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
    </script>
@endpush