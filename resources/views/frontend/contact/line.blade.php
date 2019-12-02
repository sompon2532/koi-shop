{{--<!-- @extends('frontend.layouts.master') -->--}}
@extends('layouts.frontend.main')

@section('page_title', 'Contact Us')

@section('content')
<div class="content-box text-center">
    <div class="row">
        
        <div class="col-md-12">
            <div class="title-lf">
                <img class="img-responsive" src="{{ asset('frontend/src/img/Title-left.png') }}">
            </div>
            <div class="title-m">
                <div class="title-inm">
                    <h1 class="text-thick">CONTACT US</h1>
                </div>
            </div>
            <div class="title-rg">
                <img class="img-responsive" src="{{ asset('frontend/src/img/Title-right.png') }}">
            </div>
        </div>

        <div class="col-md-12">   
            <p>PHONE NUMBER : 098-765-4321</p>
            <p>OR</p>
            <p>LINE ID : KOIKICHI</p>
            <img class="img-responsive img-thumbnail" src=" {{ asset('/frontend/src/img/line-qr-code.jpg') }}" alt="koikichi-fish-farm" style="max-height:200px;">
        </div>

    </div>
</div>
@endsection