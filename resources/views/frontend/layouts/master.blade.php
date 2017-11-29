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

    <!-- fullCalendar -->
    <link rel="stylesheet" href="{{ asset('plugins/fullcalendar/dist/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fullcalendar/dist/fullcalendar.print.min.css') }}" media="print">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/src/css/style.css') }}" >
    <link rel="stylesheet" href="{{ asset('frontend/src/font/fontstyle.css') }}" >

    @yield('custom-css')

</head>
<body>
    <div id="app">
        @include('frontend.partials.header')

        <div class="container">
            @yield('content')
        </div>
        
        @include('frontend.partials.footer')
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    {{-- <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --> --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Scripts -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    {{-- <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> --> --}}
    <script type="text/javascript" src="{{ asset('frontend/bootstrap-3.3.7/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

    <!-- sick -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('frontend/slick-1.8.0/slick/slick.min.js') }}"></script>

    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }} "></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>

    <!-- datepicker -->
    <script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <!-- bootstrap time picker -->
    <script src="{{ asset('plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>

    @yield('custom-js')

    <!-- fullCalendar -->
    <script src="{{ asset('plugins/fullcalendar/dist/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('plugins/fullcalendar/dist/locale-all.js') }}"></script>
    
    <script>
    $(document).ready(function(){
        $('.dropdown-submenu a.test').on("click", function(e){
            $(this).next('ul').toggle();
            e.stopPropagation();
            e.preventDefault();
        });
    });
</script>
    </script>
</body>

</html>
