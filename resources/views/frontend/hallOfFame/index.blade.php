@extends('frontend.layouts.master')

@section('page_title', 'HALL OF FAME')

@section('custom-css')
  <link rel="stylesheet" href="{{ URL::asset('asset/slick/slick/slick.css') }}" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="{{ URL::asset('asset/css/style.css') }}" media="screen" title="no title" charset="utf-8">
@endsection

@section('content')
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
                  <a href="{{ URL::asset("hall-of-fame/detail/$contest->id") }}" class="contest-title">{{ $contest->title }}</a>
                </p>
              @endif
            @endforeach
          </div>
        </div>
      @endforeach
    </div>
  </div>
@stop

@section('custom-js')
  <script type="text/javascript" src="{{ URL::asset('asset/slick/slick/slick.min.js') }}"></script>
@endsection
