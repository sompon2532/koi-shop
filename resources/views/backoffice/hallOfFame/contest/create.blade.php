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
    <li class="active">สร้างงานประกวด</li>
  </ol>
@endsection

@section('content')
  <div class="col-xs-12">
    <!-- Horizontal Form -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">สร้างงานประกวด</h3>
      </div>

      <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <div class="box-body">
          @include('backoffice.hallOfFame.contest._form')
        </div>
        <div class="box-footer">
          <div class="col-md-12">
            <div class="form-group">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-primary pull-right">เพิ่มงานประกวด</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@stop
