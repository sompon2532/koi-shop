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
    <li class="active">รายละเอียดปลา</li>
  </ol>
@endsection

@section('content')
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        CONTEST : <a href="{{ URL::asset("admin/hall-of-fame/detail/$koi->contest_id") }}">{{ $koi->title }}</a>
        <div class="row" style="margin-top: 10px;   ">
          <div class="col-sm-3">
            <a href="{{ URL::asset("hallOfFame/$koi->image") }}" data-lightbox="1">
              <img src="{{ URL::asset("hallOfFame/$koi->image") }}" alt="" class="img-responsive img-thumbnail"/>
            </a>
          </div>
        </div>
      </div>
        <div class="panel-body">
            <div class=""><strong>รายละเอียดปลา</div>
            <br>
            <span class="text-topic">Award</span>
          <span class="text-detail">: {{ $koi->award }}</span>
          <br style="clear: both;">

          <span class="text-topic">Owner</span>
          <span class="text-detail">: {{ $koi->owner }}</span>
          <br style="clear: both;">

          <span class="text-topic">Breeder</span>
          <span class="text-detail">: {{ $koi->breeder }}</span>
          <br style="clear: both;">

          <span class="text-topic">Dealer</span>
          <span class="text-detail">: {{ $koi->dealer }}</span>
          <br style="clear: both;">

          <span class="text-topic">Handled</span>
          <span class="text-detail">: {{ $koi->handled }}</span>
          <br style="clear: both;">
        </div>
      </div>
    </div>
  </div>
@stop
