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
          <h4>{{ $contest->title }}</h4>
          <p>
            {{ $contest->detail }}
          </p>
        </div>
        @foreach($kois as $index => $koi)
          <div class="row">
            <div class="col-xs-6 col-sm-4 col-md-3">
              <img src="{{ URL::asset("images/upload/hallOfFame/$koi->image") }}" alt="" class="img-thumbnail img-responsive" />
            </div>
            <div class="col-xs-12 col-sm-8 col-md-9">
              <p class="award">{{ $koi->award }}</p>
              <p class="hall-detail"><span>Owner</span>: {{ $koi->owner  }}</p>
              <p class="hall-detail"><span>Breeder</span>: {{ $koi->breeder }}</p>
              <p class="hall-detail"><span>Dealer</span>: {{ $koi->dealer }}</p>
              <p class="hall-detail"><span>Handled</span>: {{ $koi->handled }}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </body>
  <script type="text/javascript" src="{{ URL::asset('bootstrap/js/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('lightbox/src/js/lightbox.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('asset/js/script.js') }}"></script>


</html>
