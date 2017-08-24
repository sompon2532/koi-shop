@extends('layouts.backoffice.main')

@section('title', 'Admin | Product')

@section('head')
    <h1>
        Product
        <small>update</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-product-hunt"></i> Product</a></li>
        <li class="active">Update</li>
    </ol>
@endsection

@section('content')
    <!-- right column -->
    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Update product</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="{{ route('product.update', ['product' => $product->id]) }}">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nameTh" class="col-sm-3 control-label">
                                Name TH <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="th[name]" value="{{ $product->translate('th')->name }}" id="nameTh"
                                       placeholder="Name TH">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="productId" class="col-sm-3 control-label">
                                Product ID <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="product_id" value="{{ $product->product_id }}" id="productId"
                                       placeholder="Product ID">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="delivery" class="col-sm-3 control-label">
                                Delivery <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="delivery" value="{{ $product->delivery }}" id="delivery"
                                       placeholder="Delivery">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="category" class="col-sm-3 control-label">Category</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="category_id" id="category">
                                    <option value="">-------- Select category --------</option>
                                    @php
                                        $category_id = $product->category_id;

                                        $traverse = function ($categories, $prefix = '') use (&$traverse, $category_id) {
                                            foreach ($categories as $category) {
                                                if ($category->id == $category_id) {
                                                    echo '<option value="'. $category->id . '" selected>' . $prefix . $category->name . '</option>';
                                                }
                                                else {
                                                    echo '<option value="'. $category->id . '">' . $prefix . $category->name . '</option>';
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
                            <label for="description" class="col-sm-3 control-label">
                                Description
                            </label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="4" name="description" id="description" placeholder="Description ...">{{ $product->description }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nameEn" class="col-sm-3 control-label">
                                Name EN <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="en[name]" value="{{ $product->translate('en')->name }}" id="nameEn"
                                       placeholder="Name EN">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="slug" class="col-sm-3 control-label">
                                Slug <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="slug" value="{{ $product->slug }}" id="slug"
                                       placeholder="Slug">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="price" class="col-sm-3 control-label">
                                Price <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="price" value="{{ $product->price }}" id="price"
                                       placeholder="Price">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status" class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="status" id="status">
                                    <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Inactive</option>
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