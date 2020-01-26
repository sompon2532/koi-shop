{{--<!-- @extends('frontend.layouts.master') -->--}}
@extends('layouts.frontend.main')

@section('page_title', 'Register')

@section('content')
<!-- <div class="container"> -->
<div class="content-box register">
    <div class="row">
        <div class="col-md-12">
                <div class="">
                    <div class="title-box text-center">
                        <h1>{{ trans('user.register') }} </h1>
                    </div>
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                   {{--<!--  <div class="col-md-12">
                        <div class="avatar-box">
                            <img src="{{ asset('assets/img/avatar.jpg') }}" class="img-circle" alt="Cinque Terre" width="150" height="150"> 
                        </div>
                    </div> -->--}}

                    <div class="col-md-8 col-md-offset-2">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            {{--<!--  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="inputEmail3" class="col-sm-offset-2 col-sm-3 control-label">NAME : </label>
                                
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="name" placeholder="USER NAME" name="name" value="{{ old('name') }}" required autofocus>
                                    
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>-->--}}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-sm-offset-2 col-sm-3 control-label">{{ trans('user.name') }}  :</label>
                                <div class="col-sm-5">
                                    <input id="name" type="text" class="form-control" name="name" placeholder="{{ trans('user.name') }} " value="{{ old('name') }}" required autofocus>
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
                                    <input id="email" type="email" class="form-control" placeholder="{{ trans('user.email') }} " name="email" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
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

                            {{--<!-- <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}">
                                <label for="tel" class="col-sm-offset-2 col-sm-3 control-label">Tel :</label>
                                <div class="col-sm-5">
                                    <input id="tel" type="text" class="form-control" name="tel" placeholder="TEL" value="{{ old('tel') }}">
                                    @if ($errors->has('tel'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tel') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address" class="col-sm-offset-2 col-sm-3 control-label">Address :</label>
                                <div class="col-sm-5">
                                    <input id="address" type="text" class="form-control" name="address" placeholder="ADDRESS" value="{{ old('address') }}">
                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div> -->

                            <!-- <div class="form-group">
                                <label for="inputEmail3" class="col-sm-offset-2 col-sm-3 control-label">NAME : </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="NAME">
                                </div>
                            </div> -->

                            <!-- <div class="form-group">
                                <label for="inputEmail3" class="col-sm-offset-2 col-sm-3 control-label">GENDER : </label>
                                <div class="col-sm-5">
                                    <label class="radio-inline">
                                        <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> MALE
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> FEMALE
                                    </label>
                                </div>
                            </div> -->
                            
                            
                            <!-- <div class="form-group">
                                <label for="inputEmail3" class="col-sm-offset-2 col-sm-3 control-label">ADDRESS : </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="ADDRESS">
                                </div>
                            </div> -->

                            <!-- <div class="form-group">
                                <label for="inputEmail3" class="col-sm-offset-2 col-sm-3 control-label">STATE : </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="STATE">
                                </div>
                            </div> -->

                            <!--<div class="form-group">
                                <label for="inputEmail3" class="col-sm-offset-2 col-sm-3 control-label">DISTRICT : </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="DISTRICT">
                                </div>
                            </div> -->

                            <!-- <div class="form-group">
                                <label for="inputEmail3" class="col-sm-offset-2 col-sm-3 control-label">POSTCODE : </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="POSTCODE">
                                </div>
                            </div> -->

                            <!-- <div class="form-group">
                                <label for="inputEmail3" class="col-sm-offset-2 col-sm-3 control-label">PHONE NUMBER : </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="PHONE NUMBER">
                                </div>
                            </div> -->--}}
                            <div class="g-recaptcha" data-sitekey="your_site_key"></div>

                            <div class="form-group">
                                <div class="col-sm-offset-5 col-sm-5">
                                    <button type="submit" class="btn btn-red">{{ trans('user.btn-ok') }} </button>
                                </div>
                            </div>

                            {{--<!--<div class="form-group">
                                <div class="col-lg-12">
                                    <label for="inputEmail3" class="col-sm-offset-2 col-sm-3 control-label">PHONE NUMBER : </label>
                                    <input type="text" name="birthday" value="" id="input-group"/>
                                </div>
                            </div> -->--}}
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
<!-- </div> -->
@endsection

@section('custom-js')

@endsection
