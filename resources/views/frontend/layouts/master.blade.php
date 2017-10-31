<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>KOIKICHI | @yield('page_title')</title>
    <!-- <title>{{ config('app.name', 'koikichi') }}</title> -->

    <!-- Styles -->
    <!-- <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet"> -->
     <!-- bootstrap -->
    <!-- <link rel="stylesheet" href="{{ asset('fontend/bootstrap/css/bootstrap.min.css') }}" > -->
    <link rel="stylesheet" href="{{ asset('frontend/bootstrap-3.3.7/css/bootstrap.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('frontend/bootstrap-3.3.7/css/bootstrap-theme.min.css') }}" media="screen" title="no title" charset="utf-8">

    <!-- slick -->
    <link rel="stylesheet" href="{{ asset('frontend/slick-1.8.0/slick/slick.css') }}" media="screen" title="no title" charset="utf-8">    
    <link rel="stylesheet" href="{{ asset('frontend/slick-1.8.0/slick/slick-theme.css') }}" media="screen" title="no title" charset="utf-8">    

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit|Roboto+Condensed" media="screen" title="no title">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Prompt" media="screen" title="no title">

   

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/src/css/style.css') }}" >
    
    @yield('custom-css')

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div id="app">
        @include('frontend.partials.header')

        <div class="container">
            @yield('content')
        </div>
        @include('frontend.partials.footer')
    </div>

    <!-- Scripts -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script type="text/javascript" src="{{ asset('frontend/bootstrap-3.3.7/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

    <!-- sick -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('frontend/slick-1.8.0/slick/slick.min.js') }}"></script>

    @yield('custom-js')

</body>

</html>
