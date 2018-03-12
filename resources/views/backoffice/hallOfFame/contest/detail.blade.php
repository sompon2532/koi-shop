@extends('layouts.backoffice.main')

@section('title', 'Admin | Hall of fame')

@section('head')
  <h1>
    หอเกียรติยศ
    <small>รายการ</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
    <li>
      <a href="{{ route('hall-of-fame.index') }}">
        <i class="fa fa-trophy"></i> <span>หอเกียรติยศ</span>
      </a>
    </li>
    <li class="active">รายละเอียด</li>
  </ol>
@endsection

@section('content')
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h2 style="color: #C00;">
          {{ $contest->title }}
        </h2>
        <p style="font-size: 21px;">
          {{ $contest->detail }}
        </p>
      </div>
      <div class="box-body">
        <table id="datatable" class="table table-striped table-bordered">
          <thead>
          <tr>
            <th>ลำดับ</th>
            <th>รางวัล</th>
            <th>Owner</th>
            <th>รูปภาพ</th>
            <th>จัดการข้อมูล</th>
          </tr>
          </thead>
          <tbody>
          @foreach($kois as $index => $koi)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>{{ $koi->award }}</td>
              <td>{{ $koi->owner }}</td>
              <td>
                <a href="{{ URL::asset("hallOfFame/$koi->image") }}" data-lightbox="image-<?= $index ?>" >
                  <img src="{{ URL::asset("hallOfFame/$koi->image") }}" alt="" class="img-responsive img-thumbnail" width="80" />
                </a>
              </td>
              <td>
                <a href="{{ URL::asset("admin/hall-of-fame/koi-detail/$koi->id") }}" class="btn btn-primary btn-xs" style="font-size: 14px; display: block; margin-bottom: 2px;">
                  <i class="fa fa-clone"></i> ดูข้อมูล
                </a>
                <a href="{{ URL::asset("admin/hall-of-fame/koi-edit/$koi->id") }}" class="btn btn-warning btn-xs" style="font-size: 14px; display: block; margin-bottom: 2px;">
                  <i class="fa fa-pencil-square-o"></i> แก้ไข
                </a>
                <a href="{{ URL::asset("admin/hall-of-fame/koi-delete/$koi->id") }}" class="btn btn-danger btn-xs delete" style="font-size: 14px; display: block; margin-bottom: 2px;">
                  <i class="fa fa-trash-o"></i> ลบ
                </a>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@stop
