@extends('layouts.backoffice.main')

@section('title', 'Admin | Hall of fame')

@section('head')
  <h1>
    Hall Of Fame
    <small>Listing</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li>
      <a href="{{ route('hall-of-fame.index') }}">
        <i class="fa fa-trophy"></i> <span>Hall Of Fame</span>
      </a>
    </li>
    <li class="active">Description</li>
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
            <th>Seq</th>
            <th>Award</th>
            <th>Owner</th>
            <th>Image</th>
            <th>Manage</th>
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
                  <i class="fa fa-clone"></i> View
                </a>
                <a href="{{ URL::asset("admin/hall-of-fame/koi-edit/$koi->id") }}" class="btn btn-warning btn-xs" style="font-size: 14px; display: block; margin-bottom: 2px;">
                  <i class="fa fa-pencil-square-o"></i> Edit
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
