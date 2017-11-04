@section('page_title', 'Login')

@extends('frontend.layouts.master')

@section('content')
<!-- <div class="container"> -->
    <div class="row">
        <div class="col-md-12">
            <div class="login">
                <div class="text-center">
                    <div class="title-box">
                        <h1>LOGIN</h1>
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
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
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

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="inputPassword3" class="col-sm-offset-2 col-sm-3 control-label">PASSWORD : </label>
                                    <div class="col-sm-5">
                                        <input type="password" class="form-control" id="password" placeholder="PASSWORD" name="password"required>
                                    
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-5">
                                        <a class="btn btn-link " href="#">
                                            FORGOT PASSWORD?
                                        </a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- <div class="col-sm-offset-2 col-sm-10"> -->
                                        <button type="submit" class="btn btn-default">LOGIN</button>
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