{{--<!-- @extends('frontend.layouts.master') -->--}}
@extends('layouts.frontend.main')

@section('page_title', 'Contact Us')

@section('content')
<div class="content-box text-center">
    <div class="row">
        
        <div class="col-md-12">
            <div class="title-box">
                <h1>{{ trans('contact.contact-us') }}</h1>
            </div>
        </div>

        <div class="col-md-12">   
            <p>PHONE NUMBER : 098-765-4321</p>
            <p>OR</p>
            <p>LINE ID : KOIKICHI</p>
            <img class="img-responsive img-thumbnail" src=" {{ asset('frontend/src/img/qr_code.jpg') }}" alt="koikichi-fish-farm" style="max-height:200px;">
        </div>

    </div>
</div>
@endsection