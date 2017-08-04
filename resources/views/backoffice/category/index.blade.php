@extends('layouts.backoffice.main')

@section('title', 'Admin | Category')

@section('head')
  <h1>
    Category
    <small>list</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Category</li>
  </ol>
@endsection

@section('content')
	<div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <a href="{{ route('category.create') }}" class="pull-right btn btn-primary">Create category</a>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Name TH</th>
              <th>Name EN</th>
              <th>Status</th>
              <th>Aciton</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              @foreach ($categories as $index => $category)
                <td>{{ $category->id }}</td>
                <td>{{ $category->translate('th')->name }}</td>
                <td>{{ $category->translate('en')->name }}</td>
                <td>{{ $category->status }}</td>
                <td>
                  <a href="{{ route('category.edit', ['category' => $category->id]) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i></a>
                  <a href="{{ route('category.destroy', ['category' => $category->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                </td>
              @endforeach
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Name TH</th>
              <th>Name EN</th>
              <th>Status</th>
              <th>Aciton</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
@endsection