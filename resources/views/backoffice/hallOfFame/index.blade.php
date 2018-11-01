@extends('layouts.backoffice.main')

@section('title', 'Admin | Hall of fame')

@section('head')
  <h1>
    Hall Of Fame
    <small>Listing</small>
  </h1>
  <ol class="breadcrumb">
      <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Hall Of Fame</li>
  </ol>
@endsection

@section('content')
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <span class="pull-right button-style">
            <a href="{{ URL::asset('admin/hall-of-fame/add-koi') }}" class="btn btn-primary btn-xs" style="margin-left: 10px;">Add Koi</a>
          </span>
          <span class="pull-right button-style">
            <a href="{{ URL::asset('admin/hall-of-fame/add-contest') }}" class="btn btn-warning btn-xs">Create Contest</a>
          </span>
      </div>
      <div class="box-body">
        <table id="datatable" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>Seq</th>
            <th>Contest</th>
            <th>Contest Date</th>
            <th>Manage</th>
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
                  <i class="fa fa-clone"></i> View
                </a>
                <a href="{{ URL::asset("admin/hall-of-fame/edit/$contest->id") }}" class="btn btn-warning btn-xs">
                  <i class="fa fa-pencil-square-o"></i> Edit
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
