@extends('layouts.backoffice.main')

@section('title', 'Admin | Product')

@push('style')
    <style>
        .minus {
            position: absolute;
            cursor: pointer;
            right: 0px;
            top: 0px;
        }

        .add {
            float: right;
            margin-top: -10px;
            margin-bottom: 15px;
        }
    </style>
@endpush

@section('head')
    <h1>
        Product
        <small>create</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('product.index') }}"><i class="fa fa-product-hunt"></i> Product</a></li>
        <li class="active">Create</li>
    </ol>
@endsection

@section('content')
    <!-- right column -->
    <div class="col-md-12" id="app">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Create product</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nameTh" class="col-sm-3 control-label">
                                Name TH <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="th[name]" value="{{ old('th.name') }}" id="nameTh"
                                       placeholder="Name TH">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="productId" class="col-sm-3 control-label">
                                Product ID <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="product_id" value="{{ old('product_id') }}" id="productId"
                                       placeholder="Product ID">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="delivery" class="col-sm-3 control-label">
                                Delivery <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="delivery" value="{{ old('delivery') }}" id="delivery"
                                       placeholder="Delivery">
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
                            <label for="description" class="col-sm-3 control-label">
                                Description
                            </label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="4" name="description" id="description" placeholder="Description ...">{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nameEn" class="col-sm-3 control-label">
                                Name EN <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="en[name]" value="{{ old('en.name') }}" id="nameEn"
                                       placeholder="Name EN">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="slug" class="col-sm-3 control-label">
                                Slug <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="slug" value="{{ old('slug') }}" id="slug"
                                       placeholder="Slug">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="price" class="col-sm-3 control-label">
                                Price <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="price" value="{{ old('price') }}" id="price"
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
                    </div>

                    <div class="clearfix"></div>

                    <!-- Vidoe -->
                    <div class="col-md-6">
                        <div class="form-group" v-for="(video, index) in videos">
                            <label class="col-sm-3 control-label">
                                Video @{{ index + 1 }}
                            </label>
                            <div class="col-sm-9">
                                <textarea name="videos[]" v-model="video.video" style="width: 100%; padding-left: 13px;" rows="5"></textarea>
                                <i class="minus fa fa-minus-circle" v-on:click="remove('video', index)" v-show="videos.length > 1"></i>
                            </div>
                        </div>
                        <i class="add fa fa-plus-circle" style="margin-top: -15px;" v-on:click="add('video')"></i>
                    </div>

                    <!-- Remark -->
                    <div class="col-md-6">
                        <div class="form-group" v-for="(remark, index) in remarks">
                            <label class="col-sm-3 control-label">
                                Remark @{{ index + 1 }}
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="remarks[]" v-model="remark.remark" placeholder="Remark">
                                <i class="minus fa fa-minus-circle" v-on:click="remove('remark', index)" v-show="remarks.length > 1"></i>
                            </div>
                        </div>
                        <i class="add fa fa-plus-circle" v-on:click="add('remark')"></i>
                    </div>

                    <div class="clearfix"></div>

                    @include('backoffice.partials.image', ['images' => []])

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
        var app = new Vue({
            el: '#app',
            data: {
                videos: [{video: ''}],
                remarks: [{remark: ''}]
            },
            methods: {
                add: function(type) {
                    if (type == 'video') {
                        this.videos.push({video: ''})
                    }
                    else if (type == 'remark') {
                        this.remarks.push({remark: ''})
                    }
                },
                remove: function(type, index) {
                    if (type == 'video') {
                        this.videos.splice(index, 1)
                    }
                    else if (type == 'remark') {
                        this.remarks.splice(index, 1)
                    }
                }
            }
        })
    </script>
@endpush