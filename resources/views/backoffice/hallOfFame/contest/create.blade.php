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
    <li class="active">Create Contest</li>
  </ol>
@endsection

@section('content')
  <div class="col-xs-12">
    <!-- Horizontal Form -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Create Contest</h3>
      </div>

      <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <div class="box-body">
          @include('backoffice.hallOfFame.contest._form')
        </div>
        <div class="box-footer">
          <div class="col-md-12">
            <div class="form-group">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-primary pull-right">Create Contest</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@stop
