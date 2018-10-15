@extends('layouts.backoffice.main')

@section('title', 'Admin | Category')

@section('head')
    <h1>
        หมวดหมู่
        <small>แก้ไข</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
        <li><a href="{{ route('category.index') }}"><i class="fa fa-bars"></i> หมวดหมู่</a></li>
        <li class="active">แก้ไข</li>
    </ol>
@endsection

@section('content')
    <!-- right column -->
    <div class="col-md-12" id="app">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">แก้ไขหมวดหมู่</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post"
                  action="{{ route('category.update', ['category' => $category->id]) }}" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nameTh" class="col-sm-3 control-label">
                                ชื่อ (TH) <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="th[name]"
                                       value="{{ $category->translate('th')->name }}" id="nameTh" placeholder="Name TH">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="group" class="col-sm-3 control-label">กลุ่ม</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="group" id="group" v-model="group">
                                    <option value="product" {{ $category->group == 'product' ? 'selected' : '' }}>Product</option>
                                    <option value="koi" {{ $category->group == 'koi' ? 'selected' : '' }}>Koi</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="url" class="col-sm-3 control-label">
                                ลำดับ <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="seq" value="{{ $category->seq }}" id="seq"
                                       placeholder="Seq">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nameEn" class="col-sm-3 control-label">
                                ชื่อ (EN) <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="en[name]"
                                       value="{{ $category->translate('en')->name }}" id="nameEn" placeholder="Name EN">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="category" class="col-sm-3 control-label">หมวดหมู่หลัก</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="parent_id" id="category" v-if="group == 'product'">
                                    <option value="">-------- Select parent category --------</option>
                                    @php
                                        $parent_id = $category->parent_id;

                                        $traverse = function ($categories, $prefix = '') use (&$traverse, $parent_id) {
                                            foreach ($categories as $category) {
                                                if ($category->group == 'product') {
                                                    $selected = ($category->id == $parent_id) ? 'selected' : '';
                                                    echo '<option value="'. $category->id . '"' . $selected . '>' . $prefix . $category->name . '</option>';
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
                                                    $selected = ($category->id == $parent_id) ? 'selected' : '';
                                                    echo '<option value="'. $category->id . '"' . $selected . '>' . $prefix . $category->name . '</option>';
                                                }

                                                $traverse($category->children, $prefix.'- ');
                                            }
                                        };

                                        $traverse($categories);
                                    @endphp
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status" class="col-sm-3 control-label">สถานะ</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="status" id="status">
                                    <option value="1" {{ $category->status == true ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $category->status == false ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    @include('backoffice.partials.cover', ['images' => $category->media, 'collection' => 'category'])
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right">แก้ไข</button>
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