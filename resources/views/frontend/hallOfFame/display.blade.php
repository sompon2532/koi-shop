<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('page_title')</title>
    <link rel="stylesheet" href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="{{ URL::asset('font-awesome/css/font-awesome.min.css') }}" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="{{ URL::asset('lightbox/src/css/lightbox.css') }}" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="{{ URL::asset('asset/css/style.css') }}" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="{{ URL::asset('asset/css/auction.css') }}" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="{{ URL::asset('asset/css/responsive.css') }}" media="screen" title="no title" charset="utf-8">
    <script src="{{ URL::asset('asset/js/jquery.min.js') }}"></script>

  </head>
  <body>
    <div class="container box-content">
      <div class="col-xs-12 col-md-12 box--list_event box--shadow">
        <div class="header">
          <h4>HALL OF FAME</h4>
        </div>
        <div class="col-md-12">
          @foreach($years as $index => $year)
            <div class="hall">
              <p class="main-year">
                YEAR {{ $year->year }} &nbsp;<span class="sub-action"><i class="fa fa-plus" aria-hidden="true"></i></span>
              </p>
              <div class="sub-year">
                @foreach($contests as $index => $contest)
                  <?php
                    $explode = explode('-', $contest->contest_date);
                  ?>
                  @if( $explode[0] == $year->year )
                    <p>
                      <?php
                      $date = date_create($contest->contest_date);
                      echo "<span class='contest-date'>".date_format($date,"d/m/Y")."</span>";
                      ?>
                      <a href="{{ URL::asset("hall-of-fame/ldesplay/$contest->id") }}" class="contest-title">{{ $contest->title }}</a>
                    </p>
                  @endif
                @endforeach
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </body>
  <script type="text/javascript" src="{{ URL::asset('bootstrap/js/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('lightbox/src/js/lightbox.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('asset/js/script.js') }}"></script>


</html>
