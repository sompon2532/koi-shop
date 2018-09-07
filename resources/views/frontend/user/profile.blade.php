{{--<!-- @extends('frontend.layouts.master') -->--}}
@extends('layouts.frontend.main')

@section('page_title', 'MY PORT')

@section('content')
<div class="content-box text-center">
	<div class="row"> 
        <div class="col-md-12">
            <div class="title-box">
                <h1>{{ trans('user.profile') }}</h1>
            </div>   
        </div>   

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
                        <input id="address" type="text" class="form-control" placeholder="{{ trans('user.address') }} " name="address" value="{{ $user->address->first()->address }}" required>
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
                        <input id="tel" type="text" class="form-control" placeholder="{{ trans('user.tel') }} " name="tel" value="{{ $user->address->first()->tel }}" required>
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