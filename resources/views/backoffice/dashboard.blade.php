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
    {{--<div class="col-lg-3 col-xs-6">--}}
        {{--<!-- small box -->--}}
        {{--<div class="small-box bg-aqua">--}}
            {{--<div class="inner">--}}
                {{--<h3>150</h3>--}}

                {{--<p>New Orders</p>--}}
            {{--</div>--}}
            {{--<div class="icon">--}}
                {{--<i class="ion ion-bag"></i>--}}
            {{--</div>--}}
            {{--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<!-- ./col -->--}}
    {{--<div class="col-lg-3 col-xs-6">--}}
        {{--<!-- small box -->--}}
        {{--<div class="small-box bg-green">--}}
            {{--<div class="inner">--}}
                {{--<h3>53<sup style="font-size: 20px">%</sup></h3>--}}

                {{--<p>Bounce Rate</p>--}}
            {{--</div>--}}
            {{--<div class="icon">--}}
                {{--<i class="ion ion-stats-bars"></i>--}}
            {{--</div>--}}
            {{--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<!-- ./col -->--}}
    {{--<div class="col-lg-3 col-xs-6">--}}
        {{--<!-- small box -->--}}
        {{--<div class="small-box bg-yellow">--}}
            {{--<div class="inner">--}}
                {{--<h3>44</h3>--}}

                {{--<p>User Registrations</p>--}}
            {{--</div>--}}
            {{--<div class="icon">--}}
                {{--<i class="ion ion-person-add"></i>--}}
            {{--</div>--}}
            {{--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<!-- ./col -->--}}
    {{--<div class="col-lg-3 col-xs-6">--}}
        {{--<!-- small box -->--}}
        {{--<div class="small-box bg-red">--}}
            {{--<div class="inner">--}}
                {{--<h3>65</h3>--}}

                {{--<p>Unique Visitors</p>--}}
            {{--</div>--}}
            {{--<div class="icon">--}}
                {{--<i class="ion ion-pie-graph"></i>--}}
            {{--</div>--}}
            {{--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<!-- ./col -->--}}
@endsection