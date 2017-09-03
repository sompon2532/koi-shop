@extends('layouts.backoffice.main')

@section('title', 'Admin | Game')

@section('head')
    <h1>
        Game
        <small>list</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Game</li>
    </ol>
@endsection

@section('content')
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <a href="{{ route('game.create') }}" class="pull-right btn btn-primary">Create game</a>
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
                    @foreach ($games as $index => $game)
                    <tr>
                        <td>{{ $game->id }}</td>
                        <td>{{ $game->name }}</td>
                        <td>{{ $game->slug }}</td>
                        <td>{{ $game->status ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <a href="{{ route('game.edit', ['game' => $game->id]) }}"
                               class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i></a>
                            <button data-token="{{ csrf_token() }}" data-id="{{ $game->id }}" class="btn-delete btn btn-danger btn-xs">
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
    <script>
        $(".btn-delete").click(function() {
            var id = $(this).data('id');
            var token = $(this).data('token');

            $.ajax({
                url: "game/" + id,
                type: "POST",
                data: {_method: 'DELETE', _token :token},
                success: function(response) {
                    location.reload();
                }
            })
        });
    </script>
@endpush