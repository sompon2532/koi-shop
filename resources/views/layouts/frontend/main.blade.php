<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>KOIKICHI | @yield('page_title')</title>
    
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('frontend/bootstrap-3.3.7/css/bootstrap.min.css') }}" >
    <!-- date picker -->
    <link rel="stylesheet" href="{{ asset('frontend/datetimepicker/bootstrap-datetimepicker.min.css')}}">
    <!-- slick -->
    <link rel="stylesheet" href="{{ asset('frontend/slick-1.8.0/slick/slick.css') }}" media="screen" title="no title" charset="utf-8">    
    <link rel="stylesheet" href="{{ asset('frontend/slick-1.8.0/slick/slick-theme.css') }}" media="screen" title="no title" charset="utf-8">    
    <!-- lightbox -->
    <link rel="stylesheet" href="{{ asset('frontend/lightbox2-dev/dist/css/lightbox.min.css') }}"  media="screen" title="no title" charset="utf-8">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="{{ asset('plugins/fullcalendar/dist/fullcalendar.min.css') }}"  media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="{{ asset('plugins/fullcalendar/dist/fullcalendar.print.min.css') }}" media="print">
    <!-- awesome -->
    <link rel="stylesheet" href="{{ URL::asset('font-awesome/css/font-awesome.min.css') }}" media="screen" title="no title" charset="utf-8">
    <!-- Custom CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('frontend/src/css/style.css') }}" media="screen" title="no title" charset="utf-8" > -->
    <link rel="stylesheet" href="{{ asset('frontend/main-style.css') }}" media="screen" title="no title" charset="utf-8" >
    <link rel="stylesheet" href="{{ asset('frontend/src/font/fontstyle.css') }}" media="screen" title="no title" charset="utf-8" >

    @yield('custom-css')

</head>
<body>
    <div class="wrapper">
        <header>
            <div class="container-fluid">
                <div class="row">
                    @include('layouts.frontend.partials.header')
                </div>
            </div>
        </header>
        <section class="content">
            <!-- <div class="container content-box"> -->
            <div class="container">
                @yield('content')
            </div>
        </section>
        <footer>
            <div class="container">
                <div class="row">
                    @include('layouts.frontend.partials.footer')
                </div>
            </div>
        </footer>
        {{--<!-- @yield('branner') -->--}}
    </div>

    <!-- Jquery -->
    <script src="{{ asset('frontend/jquery/jquery-1.11.0.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('frontend/bootstrap-3.3.7/js/bootstrap.min.js') }}"></script>
    <!-- Slick -->
    <script src="{{ asset('frontend/slick-1.8.0/slick/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/custom-slick.js') }}"></script>
    <!-- Daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }} "></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- lightbox -->
    <script src="{{ asset('frontend/lightbox2-dev/dist/js/lightbox-plus-jquery.min.js') }}"></script>
    <!-- Bootstrap-datetimepicker -->
    <script src="{{ asset('frontend/datetimepicker/bootstrap-datetimepicker.min.js')}}"></script>
    <!-- fullCalendar -->
    <script src="{{ asset('plugins/fullcalendar/dist/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('plugins/fullcalendar/dist/locale-all.js') }}"></script>
    <!-- Script -->
    <script src="{{ asset('asset/js/script.js') }}"></script>
    
    @yield('custom-js')

    <script>
    $(document).ready(function(){
        $('.dropdown-submenu a.test').on("click", function(e){
            $(this).next('ul').toggle();
            e.stopPropagation();
            e.preventDefault();
        });
    });
    </script>

</body>

</html>
