@extends('layouts.backoffice.main')

@section('title', 'Admin | Dashboard')

@section('head')
    <h1>
        ข้อมูลทั่วไป
        <small>รายละเอียด</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
        <li class="active">ข้อมูลทั่วไป</li>
    </ol>
@endsection

@section('content')
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-archive"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">KOI</span>
                <span class="info-box-number">{{ $koi }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-gamepad"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">EVENT</span>
                <span class="info-box-number">{{ $event }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">MEMBER</span>
                <span class="info-box-number">{{ $user }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
@endsection