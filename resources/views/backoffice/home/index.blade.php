@extends('layouts.backoffice.main')

@section('title', 'Admin | Home')

@section('head')
    <h1>
        Manage Home
        <small>Detail</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage Home</li>
    </ol>
@endsection

@section('content')
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <a href="{{ route('home.edit', ['home' => $home->id]) }}" class="pull-right btn btn-primary">Manage</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="text-center" style="margin-top: 15px">
                    {!! $home->video !!}
                </div>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
@endsection

@push('scripts')
@endpush