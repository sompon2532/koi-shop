@extends('layouts.backoffice.main')

@section('title', 'Event')

@section('head')
    <h1>
        อีเว้นท์
        <small>รายละเอียด</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
        <li><a href="{{ route('event.index') }}"><i class="fa fa-gamepad"></i> อีเว้นท์</a></li>
        <li class="active">รายละเอียด</li>
    </ol>
@endsection

@section('content')
    <!-- right column -->
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">ราการปลา</h3>
            </div>
            <!-- /.box-header -->
            @foreach($event->kois->chunk(4) as $kois)
                <div class="row">
                    <div class="col-xs-12">
                        @foreach($kois as $koi)
                            <div class="col-sm-3">
                                <h5>KOI ID : {{ $koi->koi_id }}</h5>
                                <img src="{{ $koi->image }}" alt="" class="img-thumbnail">
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!--/.col (right) -->
@endsection