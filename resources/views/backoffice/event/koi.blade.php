@extends('layouts.backoffice.main')

@section('title', 'Event')

@section('head')
    <h1>
        Event
        <small>Detail</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('event.index') }}"><i class="fa fa-gamepad"></i> Event</a></li>
        <li class="active">Description</li>
    </ol>
@endsection

@section('content')
    <!-- right column -->
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">ข้อมูลผู้ลงทะเบียน</h3>
            </div>
            <!-- /.box-header -->
            <div class="row">
                <div class="col-xs-12" style="padding-bottom: 15px;">
                    <div class="col-sm-3">
                        <h5>KOI ID: {{ $koi->koi_id }}</h5>
                        <img src="{{ $koi->image }}" alt="" class="img-thumbnail">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Member</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($koi->users as $index => $user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    @if ($koi->user_id == $user->id)
                                        <span class="label label-success">
                                            <i class="fa fa-trophy"></i> Award
                                        </span>
                                    @else
                                        <span class="label label-default">Not Award</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($koi->user_id == $user->id)
                                        <a href="{{ route('event.koi.winner', ['event' => $event->id, 'koi' => $koi->id, 'user' => $user->id]) }}" class="btn btn-xs btn-danger">
                                            <i class="fa fa-ban"></i> ยกเลิก
                                        </a>
                                    @else
                                        <a href="{{ route('event.koi.winner', ['event' => $event->id, 'koi' => $koi->id, 'user' => $user->id]) }}" class="btn btn-xs btn-default">Award</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Member</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/.col (right) -->
@endsection