@extends('layouts.backoffice.main')

@section('title', 'Admin | Hall of fame')

@section('head')
    <h1>
        KOI ( {{ $hall_of_fame->name }} )
        <small>Listing</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('hall-of-fame.index') }}"><i class="fa fa-trophy"></i> Hall Of Fame</a></li>
        <li class="active">KOI ( {{ $hall_of_fame->name }} )</li>
    </ol>
@endsection

@section('content')
    <div class="col-xs-12">
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Choose KOI</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                                <th>Seq</th>
                                <th>KOI ID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </thead>

                            <tbody>
                                @foreach ($kois as $index => $koi)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $koi->koi_id }}</td>
                                        <td>{{ $koi->name }}</td>
                                        <td>
                                            <button type="button" class="btn btn-default btn-xs manage" koi_id="{{ $koi->id }}" hall_of_fame_id="{{ $hall_of_fame->id }}">
                                                Add
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

        <div class="box">
            <div class="box-header">
                <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#myModal">Add Koi</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="datatable" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>KOI ID</th>
                        <th>KOI</th>
                        <th>Owner</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($hall_of_fame->kois as $index => $koi)
                        <tr>
                            <td>{{ $koi->koi_id }}</td>
                            <td>{{ $koi->name }}</td>
                            <td>{{ $koi->user ? $koi->user->name : 'Koikichi Farm'  }}</td>
                            <td>{{ $koi->status ? 'Active' : 'Inactive' }}</td>
                            <td>
                                <a href="{{ route('koi.edit', ['koi' => $koi->id]) }}"
                                   class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i></a>
                                <a href="{{ route('hall-of-fame.drop', ['hall_of_fame' => $hall_of_fame->id, 'koi' => $koi->id]) }}"
                                   class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Remove</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>KOI ID</th>
                        <th>KOI</th>
                        <th>Owner</th>
                        <th>Status</th>
                        <th>Action</th>
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
    <script type="text/javascript">
        $('.manage').click(function() {
            $.ajax({
                method: "POST",
                url: "add-koi",
                data: {
                    '_token': '{{ csrf_token() }}',
                    'koi_id': $(this).attr('koi_id'),
                    'hall_of_fame_id': $(this).attr('hall_of_fame_id'),
                    'type': 'add'
                },
                success: function(result) {
                    window.location.reload();
                }
            });
        });
    </script>
@endpush