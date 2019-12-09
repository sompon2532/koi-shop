@extends('layouts.backoffice.main')

@section('title', 'Company Profile')

@push('style')
<style type="text/css">
    .col-padding{
        padding: 15px;
    }
</style>
@endpush

@section('head')
    <h1>
        Comapny
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Update</li>
    </ol>
@endsection

@section('content')
    <div class="col-md-12" id="app">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('company.detail') }}</h3>
            </div>
        
        <div class="box-body">

                <form class="form-horizontal" action="{{ route('company.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{ __('company.name') }} (TH)</label>
                            <div class="col-md-9">
                                <input class="form-control" name="name" type="text" value="{{ old('name') }}" maxlength="120" placeholder="ชื่อบริษัท">
                            </div>
                            
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{ __('company.detail') }} (TH)</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="detail" type="text" value="{{ old('detail') }}" placeholder="รายละเอียดบริษัท"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{ __('company.address') }} (TH)</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="address" type="text" value="{{ old('detail') }}" placeholder="ที่อยู่"></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{ __('company.name') }} (EN)</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" value="{{ old('name') }}" maxlength="120" placeholder="Company Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{ __('company.detail') }} (EN)</label>
                            <div class="col-md-9">
                                <textarea class="form-control" type="text" value="{{ old('detail') }}" placeholder="Company Detail"></textarea>
                            </div>
                        </div>
                    </div>
                    
                </form>
            
        </div>
    </div>
@endsection