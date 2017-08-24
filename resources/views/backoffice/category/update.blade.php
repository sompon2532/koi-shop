@extends('layouts.backoffice.main')

@section('title', 'Admin | Category')

@section('head')
    <h1>
        Category
        <small>update</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-bars"></i> Category</a></li>
        <li class="active">Update</li>
    </ol>
@endsection

@section('content')
    <!-- right column -->
    <div class="col-md-12" id="app">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Update category</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post"
                  action="{{ route('category.update', ['category' => $category->id]) }}">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nameTh" class="col-sm-3 control-label">
                                Name TH <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="th[name]"
                                       value="{{ $category->translate('th')->name }}" id="nameTh" placeholder="Name TH">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="code" class="col-sm-3 control-label">
                                Code <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="code" value="{{ $category->code }}" id="code"
                                       placeholder="Code">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="group" class="col-sm-3 control-label">Group</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="group" id="group" v-model="group">
                                    <option value="product" {{ $category->group == 'product' ? 'selected' : '' }}>Product</option>
                                    <option value="koi" {{ $category->group == 'koi' ? 'selected' : '' }}>Koi</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status" class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="status" id="status">
                                    <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Inactive</option>
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
                                <input type="text" class="form-control" name="en[name]"
                                       value="{{ $category->translate('en')->name }}" id="nameEn" placeholder="Name EN">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="slug" class="col-sm-3 control-label">
                                Slug <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="slug" value="{{ $category->slug }}" id="slug"
                                       placeholder="Slug">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="category" class="col-sm-3 control-label">Category</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="parent_id" id="category" v-if="group == 'product'">
                                    <option value="">-------- Select parent category --------</option>
                                    @php
                                        $parent_id = $category->parent_id;

                                        $traverse = function ($categories, $prefix = '') use (&$traverse, $parent_id) {
                                            foreach ($categories as $category) {
                                                if ($category->group == 'product') {
                                                    if ($category->id == $parent_id) {
                                                        echo '<option value="'. $category->id . '" selected>' . $prefix . $category->name . '</option>';
                                                    }
                                                    else {
                                                        echo '<option value="'. $category->id . '">' . $prefix . $category->name . '</option>';
                                                    }
                                                }

                                                $traverse($category->children, $prefix.'- ');
                                            }
                                        };

                                        $traverse($categories);
                                    @endphp
                                </select>

                                <select class="form-control" name="parent_id" id="category" v-else>
                                    <option value="">-------- Select parent category --------</option>
                                    @php
                                        $parent_id = $category->parent_id;

                                        $traverse = function ($categories, $prefix = '') use (&$traverse, $parent_id) {
                                            foreach ($categories as $category) {
                                                if ($category->group == 'koi') {
                                                    if ($category->id == $parent_id) {
                                                        echo '<option value="'. $category->id . '" selected>' . $prefix . $category->name . '</option>';
                                                    }
                                                    else {
                                                        echo '<option value="'. $category->id . '">' . $prefix . $category->name . '</option>';
                                                    }
                                                }

                                                $traverse($category->children, $prefix.'- ');
                                            }
                                        };

                                        $traverse($categories);
                                    @endphp
                                </select>
                            </div>
                        </div>
                    </div>
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
        var app = new Vue({
            el: '#app',
            data: {
                group: '{!! $category->group !!}'
            }
        })
    </script>
@endpush