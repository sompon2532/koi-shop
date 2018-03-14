@extends('layouts.backoffice.main')

@section('title', 'Admin | Hall of fame')

@section('head')
  <h1>
    หอเกียรติยศ
    <small>รายการ</small>
  </h1>
  <ol class="breadcrumb">
      <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
      <li class="active">หอเกียรติยศ</li>
  </ol>
@endsection

@section('content')
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <span class="pull-right button-style">
            <a href="{{ URL::asset('admin/hall-of-fame/add-koi') }}" class="btn btn-primary btn-xs" style="margin-left: 10px;">เพิ่มปลา</a>
          </span>
          <span class="pull-right button-style">
            <a href="{{ URL::asset('admin/hall-of-fame/add-contest') }}" class="btn btn-warning btn-xs">เพิ่มงานประกวด</a>
          </span>
      </div>
      <div class="box-body">
        <table id="datatable" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>ลำดับ</th>
            <th>งานประกวด</th>
            <th>วันที่จัดงาน</th>
            <th>จัดการข้อมูล</th>
          </tr>
          </thead>
          <tbody>
          @foreach($contests as $index => $contest)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>{{ $contest->title }}</td>
              <td>{{ $contest->contest_date->format('d/m/Y') }}</td>
              <td>
                <a href="{{ URL::asset("admin/hall-of-fame/detail/$contest->id") }}" class="btn btn-primary btn-xs">
                  <i class="fa fa-clone"></i> ดูข้อมูล
                </a>
                <a href="{{ URL::asset("admin/hall-of-fame/edit/$contest->id") }}" class="btn btn-warning btn-xs">
                  <i class="fa fa-pencil-square-o"></i> แก้ไข
                </a>
                @if( $contest->koi == 0 )
                  <a href="{{ URL::asset("admin/hall-of-fame/delete/$contest->id") }}" class="btn btn-danger btn-xs delete">
                    <i class="fa fa-trash-o"></i> ลบ
                  </a>
                @endif
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@stop
