@extends('layouts.backoffice.main')

@section('title', 'Event')

@section('head')
    <h1>
        Event
        <small>update</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('event.index') }}"><i class="fa fa-gamepad"></i> Event</a></li>
        <li class="active">Update</li>
    </ol>
@endsection

@section('content')
    <!-- right column -->
    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Update event</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="{{ route('event.update', ['event' => $event->id]) }}" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nameTh" class="col-sm-3 control-label">
                                Name TH <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="th[name]" value="{{ $event->translate('th')->name }}" id="nameTh"
                                       placeholder="Name TH">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="slug" class="col-sm-3 control-label">
                                Slug <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="slug" value="{{ $event->slug }}" id="slug"
                                       placeholder="Slug">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                Start date <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control datepicker" name="start_date" value="{{ $event->start_datetime->format('d/m/Y') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                End date <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control datepicker" name="end_date" value="{{ $event->end_datetime->format('d/m/Y') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="config" class="col-sm-3 control-label">
                                Config
                            </label>
                            <div class="col-sm-9" style="margin-top: 5px;">
                                <input type="checkbox" class="minimal-red" name="config" value="1" id="config" {{ $event->config ? 'checked' : '' }}>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nameEn" class="col-sm-3 control-label">
                                Name EN <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="en[name]" value="{{ $event->translate('en')->name }}" id="nameEn"
                                       placeholder="Name EN">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status" class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="status" id="status">
                                    <option value="1" {{ $event->status == true ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $event->status == false ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                Start time <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <div class="bootstrap-timepicker">
                                    <input type="text" class="form-control timepicker" name="start_time" value="{{ $event->start_datetime->toTimeString() }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                End time <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <div class="bootstrap-timepicker">
                                    <input type="text" class="form-control timepicker" name="end_time" value="{{ $event->end_datetime->toTimeString() }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    @include('backoffice.partials.cover', ['images' => $event->media, 'collection' => 'event-cover'])

                    <div class="clearfix"></div>

                    @include('backoffice.partials.image', ['images' => $event->media, 'collection' => 'event'])

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right">Update</button>
                    </div>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
        <!-- /.box -->
    </div>
    <!--/.col (right) -->
@endsection

@push('scripts')
    <script>
        // Date picker
        $(".datepicker").datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy',
            todayHighlight: true
        });

        // Timepicker
        $(".timepicker").timepicker({
            showInputs: false,
            minuteStep: 10,
            showMeridian: false,
        });

        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
    </script>
@endpush