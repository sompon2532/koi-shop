@extends('frontend.layouts.master')

@section('page_title', 'HALL OF FAME')

@section('custom-css')
  <link rel="stylesheet" href="{{ URL::asset('asset/slick/slick/slick.css') }}" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="{{ URL::asset('asset/css/style.css') }}" media="screen" title="no title" charset="utf-8">
@endsection

@section('content')
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
        	<a href="{{ URL::asset("hallOfFame/$koi->image") }}" data-lightbox="roadtrip" >
          		<img src="{{ URL::asset("hallOfFame/$koi->image") }}" alt="" class="img-thumbnail img-responsive" />
          	</a>
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
@stop

@section('custom-js')
  <script type="text/javascript" src="{{ URL::asset('asset/slick/slick/slick.min.js') }}"></script>
@endsection