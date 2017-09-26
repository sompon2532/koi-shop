@extends('layouts.backoffice.main')

@section('title', 'Event')

@section('head')
    <h1>
        Event
        <small>detail</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('event.index') }}"><i class="fa fa-gamepad"></i> Event</a></li>
        <li class="active">Detail</li>
    </ol>
@endsection

@section('content')
    <!-- right column -->
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Koi detail</h3>
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