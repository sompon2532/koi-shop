@extends('layouts.backoffice.main')

@section('title', 'Admin | Dashboard')

@section('head')
    <h1>
        Dashboard
        <small>Detail</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
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
            <span class="info-box-icon bg-orange"><i class="fa fa-product-hunt"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">PRODUCT</span>
                <span class="info-box-number">{{ $product }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-maroon"><i class="fa fa-first-order"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">ORDER</span>
                <span class="info-box-number">{{ $order }}</span>
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
            <span class="info-box-icon bg-green"><i class="fa fa-newspaper-o"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">NEWS</span>
                <span class="info-box-number">{{ $news }}</span>
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