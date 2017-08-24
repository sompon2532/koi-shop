@extends('layouts.backoffice.main')

@section('title', 'Admin | Koi')

@section('head')
    <h1>
        Koi
        <small>create</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-archive"></i> Koi</a></li>
        <li class="active">Create</li>
    </ol>
@endsection

@section('content')
    <!-- right column -->
    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Create koi</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="{{ route('koi.store') }}">
                {{ csrf_field() }}

                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nameTh" class="col-sm-3 control-label">
                                Name TH <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="th[name]" value="{{ $koi->translate('th')->name }}" id="nameTh"
                                       placeholder="Name TH">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="koiId" class="col-sm-3 control-label">
                                Koi ID <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="koi_id" id="koiId"
                                       placeholder="Koi ID">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="strain" class="col-sm-3 control-label">Strain</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="strain_id" id="strain">
                                    @foreach ($strains as $strain)
                                        <option value="{{ $strain->id }}">{{ $strain->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="category" class="col-sm-3 control-label">Category</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="category_id" id="category">
                                    <option value="">-------- Select category --------</option>
                                    @php
                                        $traverse = function ($categories, $prefix = '') use (&$traverse) {
                                            foreach ($categories as $category) {
                                                echo '<option value="'. $category->id . '">' . $prefix . $category->name . '</option>';

                                                $traverse($category->children, $prefix.'- ');
                                            }
                                        };

                                        $traverse($categories);
                                    @endphp
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="born" class="col-sm-3 control-label">
                                Born <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="born" id="born"
                                       placeholder="Born">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="storage" class="col-sm-3 control-label">
                                Storage <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="storage" id="storage"
                                       placeholder="Storage">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="sex" class="col-sm-3 control-label">Sex</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="sex" id="sex">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="unknown">Unknown</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nameEn" class="col-sm-3 control-label">
                                Name EN <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="en[name]" id="nameEn"
                                       placeholder="Name EN">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="slug" class="col-sm-3 control-label">
                                Slug <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="slug" id="slug"
                                       placeholder="Slug">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="farm" class="col-sm-3 control-label">Farm</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="farm_id" id="farm">
                                    @foreach ($farms as $farm)
                                        <option value="{{ $farm->id }}">{{ $farm->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="oyagoi" class="col-sm-3 control-label">
                                Oyagoi <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="oyagoi" id="oyagoi"
                                       placeholder="Oyagoi">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="price" class="col-sm-3 control-label">
                                Price <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="price" id="price"
                                       placeholder="Price">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status" class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="status" id="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="certificate" class="col-sm-3 control-label">
                                Certificate <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9" style="margin-top: 5px;">
                                <input type="checkbox" value="1" class="minimal-red" name="certificate" id="certificate">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right">Create</button>
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
        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    </script>
@endpush