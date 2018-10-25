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
                    <h1 class="text-thick">PROFILE</h1>
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
            <form class="form-horizontal" method="POST" action="{{ route('frontend.user.profile') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-sm-offset-2 col-sm-3 control-label">{{ trans('user.name') }}  :</label>
                    <div class="col-sm-5">
                        <input id="name" type="text" class="form-control" name="name" placeholder="{{ trans('user.name') }} " value="{{ $user->name }}" required autofocus>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="inputEmail3" class="col-sm-offset-2 col-sm-3 control-label">{{ trans('user.email') }}  : </label>
                    <div class="col-sm-5">
                        <input id="email" type="email" class="form-control" placeholder="{{ trans('user.email') }} " name="email" value="{{ $user->email }}" required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                    <label for="address" class="col-sm-offset-2 col-sm-3 control-label">{{ trans('user.address') }}  : </label>
                    <div class="col-sm-5">
                        <input id="address" type="text" class="form-control" placeholder="{{ trans('user.address') }} " name="address" value="{{ count($user->address) > 0 ? $user->address->first()->address : '' }}" required>
                        @if ($errors->has('adddress'))
                            <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}">
                    <label for="inputEmail3" class="col-sm-offset-2 col-sm-3 control-label">{{ trans('user.tel') }}  : </label>
                    <div class="col-sm-5">
                        <input id="tel" type="text" class="form-control" placeholder="{{ trans('user.tel') }} " name="tel" value="{{ count($user->address)>0 ? $user->address->first()->tel : '' }}" required>
                        @if ($errors->has('tel'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tel') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <a class="btn btn-link" href="{{route('frontend.user.changepass')}}">
                    {{ trans('user.change-pass') }}
                </a>

                <div class="form-group">
                    <button type="submit" class="btn btn-red">{{ trans('user.edit') }}</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection