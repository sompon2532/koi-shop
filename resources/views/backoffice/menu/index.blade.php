@extends('layouts.backoffice.main')

@section('title', 'Admin | Menu')

@section('head')
    <h1>
        จัดการเมนู
        <small>รายการ</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
        <li class="active">จัดการเมนู</li>
    </ol>
@endsection

@section('content')
    <div class="col-xs-12">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>ชื่อเมนู</th>
                        <th class="text-center">ลำดับ</th>
                        <th class="text-center">แก้ไขล่าสุด</th>
                        <th>การจัดการ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($menus as $index => $menu)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $menu->name }}</td>
                        <td class="text-center">{{ $menu->seq }}</td>
                        <td class="text-center">{{ $menu->updated_at->format("d/m/Y H:i:s") }}</td>
                        <td>
                            <a href="{{ route('menu.edit', ['menu' => $menu->id]) }}"
                               class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>ชื่อเมนู</th>
                        <th class="text-center">ลำดับ</th>
                        <th class="text-center">แก้ไขล่าสุด</th>
                        <th>การจัดการ</th>
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