@extends('layouts.backoffice.main')

@section('title', 'Event')

@section('head')
    <h1>
        อีเว้นท์
        <small>รายละเอียด</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
        <li><a href="{{ route('event.index') }}"><i class="fa fa-gamepad"></i> อีเว้นท์</a></li>
        <li class="active">รายละเอียด</li>
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
                        <h5>รหัสปลา: {{ $koi->koi_id }}</h5>
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
                            <th>รายชื่อผู้ลงทะเบียน</th>
                            <th>สถานะ</th>
                            <th>การจัดการ</th>
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
                                            <i class="fa fa-trophy"></i> ได้รับรางวัล
                                        </span>
                                    @else
                                        <span class="label label-default">ไม่ได้รับรางวัล</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($koi->user_id == $user->id)
                                        <a href="{{ route('event.koi.winner', ['event' => $event->id, 'koi' => $koi->id, 'user' => $user->id]) }}" class="btn btn-xs btn-danger">
                                            <i class="fa fa-ban"></i> ยกเลิก
                                        </a>
                                    @else
                                        <a href="{{ route('event.koi.winner', ['event' => $event->id, 'koi' => $koi->id, 'user' => $user->id]) }}" class="btn btn-xs btn-default">รับรางวัล</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>รายชื่อผู้ลงทะเบียน</th>
                            <th>สถานะ</th>
                            <th>การจัดการ</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/.col (right) -->
@endsection