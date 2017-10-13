@extends('layouts.backoffice.main')

@section('title', 'Event')

@section('head')
    <h1>
        Event
        <small>list</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Event</li>
    </ol>
@endsection

@section('content')
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <a href="{{ route('event.create') }}" class="pull-right btn btn-primary">Create event</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Aciton</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($events as $index => $event)
                    <tr>
                        <td>{{ $event->id }}</td>
                        <td>{{ $event->name }}</td>
                        <td>{{ $event->slug }}</td>
                        <td>{{ $event->status ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <a href="{{ route('event.show', ['event' => $event->id]) }}"
                               class="btn btn-default btn-xs"><i class="fa fa-list"></i></a>
                            <a href="{{ route('event.edit', ['event' => $event->id]) }}"
                               class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i></a>
                            <button data-token="{{ csrf_token() }}" data-id="{{ $event->id }}" data-url="event" class="btn-delete btn btn-danger btn-xs">
                                <i class="fa fa-trash-o"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Aciton</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
@endsection

@push('scripts')
@endpush