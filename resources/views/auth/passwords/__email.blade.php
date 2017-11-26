@section('page_title', 'Login')

@extends('frontend.layouts.master')

@section('content')
<!-- <div class="container"> -->
    <div class="row">
        <div class="col-md-12">
            <div class="login">
                <div class="text-center">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="title-box">
                        <h2>FORGOT PASSWORD</h2>
                    </div>

                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                            {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-sm-offset-2 col-sm-3 control-label">EMAIL : </label>
                                    <div class="col-sm-5">
                                        <input type="email" class="form-control" id="email" placeholder="EMAIL" name="email" value="{{ old('email') }}" required autofocus>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- <div class="col-sm-offset-2 col-sm-10"> -->
                                        <button type="submit" class="btn btn-default">Send Password Reset Link/button>
                                    <!-- </div> -->
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
<!-- </div> -->
@endsection