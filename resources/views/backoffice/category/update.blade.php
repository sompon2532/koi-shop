@extends('layouts.backoffice.main')

@section('title', 'Admin | Category')

@section('head')
  <h1>
    Category
    <small>list</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#"><i class="fa fa-bars"></i> Category</a></li>
    <li class="active">Update</li>
  </ol>
@endsection

@section('content')
  <!-- right column -->
  <div class="col-md-12">
    <!-- Horizontal Form -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Update category</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form class="form-horizontal" method="post" action="{{ route('category.update', ['category' => $category->id]) }}">
        {{ method_field('PATCH') }}
      	{{ csrf_field() }}

        <div class="box-body">
        	<div class="col-md-6">
        		<div class="form-group">
	            <label for="nameTh" class="col-sm-3 control-label">
	            	Name TH <span class="text-danger">*</span>
	            </label>
	            <div class="col-sm-9">
	              <input type="text" class="form-control" name="th[name]" value="{{ $category->translate('th')->name }}" id="nameTh" placeholder="Name TH">
	            </div>
	          </div>

	          <div class="form-group">
	            <label for="category" class="col-sm-3 control-label">Category</label>

	            <div class="col-sm-9">
	              <select class="form-control" name="category">
	              	<!-- <option></option> -->
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
	              <input type="text" class="form-control" name="en[name]" value="{{ $category->translate('en')->name }}" id="nameEn" placeholder="Name EN">
	            </div>
	          </div>

	          <div class="form-group">
	            <label for="category" class="col-sm-3 control-label">Status</label>

	            <div class="col-sm-9">
	              <select class="form-control" name="status">
	              	<option value="1">Active</option>
	              	<option value="0">Inactive</option>
	              </select>
	            </div>
	          </div>
        	</div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        	<div class="col-md-12">
        		<button type="submit" class="btn btn-primary pull-right">Submit</button>
        	</div>
        </div>
        <!-- /.box-footer -->
      </form>
    </div>
    <!-- /.box -->
  </div>
  <!--/.col (right) -->
@endsection