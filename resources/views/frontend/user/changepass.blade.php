{{--<!-- @extends('frontend.layouts.master') -->--}}
@extends('layouts.frontend.main')

@section('page_title', 'MY PORT')

@section('content')
<div class="content-box text-center">
	<div class="row"> 
        <div class="col-md-12">
            <div class="title-lf">
                <img class="img-responsive" src="{{ asset('frontend/src/img/Title-left.png') }}">
            </div>
            <div class="title-m">
                <div class="title-inm">
                    <h1 class="text-thick">CHANGE PASSWORD</h1>
                </div>
            </div>
            <div class="title-rg">
                <img class="img-responsive" src="{{ asset('frontend/src/img/Title-right.png') }}">
            </div>
        </div>

        @if(Session::has('error'))
			<div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
				<div class="alert alert-danger" role="alert">
					{{ Session::get('error') }}
				</div>
			</div>
		@endif
        @if(Session::has('success'))
			<div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
				<div class="alert alert-success" role="alert">
					{{ Session::get('success') }}
				</div>
			</div>
		@endif

        <div class="col-md-8 col-md-offset-2 profile">
            <!-- <form class="form-horizontal" method="POST" action="{{-- route('frontend.user.changepass') --}}">
                {{ csrf_field() }}
                
                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="inputPassword3" class="col-sm-offset-2 col-sm-3 control-label">{{ trans('user.password') }}  : </label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" id="curpassword" placeholder="{{ trans('user.password') }} " name="password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="inputPassword3" class="col-sm-offset-2 col-sm-3 control-label">{{ trans('user.password') }}  : </label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" id="password" placeholder="{{ trans('user.password') }} " name="password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-offset-1 col-sm-4 control-label">{{ trans('user.retypepassword') }}  : </label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="{{ trans('user.retypepassword') }} " name="password_confirmation" required>
                    </div>
                </div>

                <a class="btn btn-link" href="">
                    Change password
                </a>

                <div class="form-group">
                    <button type="submit" class="btn btn-red">{{ trans('user.changepass') }}</button>
                </div>
            </form> -->
            <form class="form-horizontal" method="POST" action="{{ route('frontend.user.changepass') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                    <label for="new-password" class="col-md-4 control-label">CURRENT PASSWORD :</label>
                    <div class="col-md-6">
                        <input id="current-password" type="password" class="form-control" name="current-password" required>

                        @if ($errors->has('current-password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('current-password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                    <label for="new-password" class="col-md-4 control-label">NEW PASSWORD :</label>
                    <div class="col-md-6">
                        <input id="new-password" type="password" class="form-control" name="new-password" required>

                        @if ($errors->has('new-password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('new-password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="new-password-confirm" class="col-md-4 control-label">CONFIRM PASSWORD :</label>
                    <div class="col-md-6">
                        <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <button type="submit" class="btn btn-red">
                            CHANGE PASSWORD
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection