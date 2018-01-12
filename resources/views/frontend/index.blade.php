@extends('frontend.layouts.master')

@section('page_title', 'HOME')

@section('custom-css')
<style>
    .carousel-indicators li{
        border: 1px solid #ff0000;
    }
    .carousel-indicators .active{
        background-color: #ff0000;
    }
</style>
@endsection

@section('content')
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="top-box">
                    <img class="img-responsive"  src="{{ asset('frontend/src/img/LOGO-header.png') }}" alt="">      
                </div>  
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="calendar-box">
                    {!! $calendar->calendar() !!}
                    <div class="text-center">
                        @if (count($events_today) > 0)
                            @foreach($events_today as $event)
                                @if ($today->toDateString() <= $event->end_datetime->toDateString() && $today >= $event->start_datetime->toDateString() )
                                    <p class="text-red">EVENT</p>
                                    <p>{{ $event->end_datetime->format('d/m/Y') }} - {{ $event->start_datetime->format('d/m/Y') }}<br>{{ $event->name }}</p>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>                
            </div>
            <div class="col-md-9">
                <div class="slide-box">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        {{-- dd($news) --}}
                        @if (count($news) > 0)
                            @if(count($news) == 1)
                                <div class="carousel-inner" role="listbox">                 
                                    @foreach($news as $index => $new)
                                        {{-- @if($index > 0 && $now <= $new->end_datetime->toTimeString()) --}}
                                            <div class="item active">
                                                @if($new->media->where('collection_name', 'news-cover')->first() == null)
                                                    <a href="{{-- route('frontend.event.event', ['id' => $new->id]) --}}">
                                                        <img src="{{ asset('frontend/src/img/news-cover-defalt-img.jpg')}}" alt="..." class="image-responsive" style="width:100%;">
                                                    </a>
                                                @else
                                                    <a href="{{-- route('frontend.event.event', ['id' => $new->id]) --}}">
                                                        <img src="{{ asset($new->media->where('collection_name', 'news-cover')->first()->getUrl()) }}" alt="..." class="image-responsive" style="width:100%;">
                                                    </a>
                                                @endif
                                            </div>
                                        {{-- @endif --}}
                                    @endforeach
                                </div>
                            @elseif(count($news) > 1)
                                {{-- dd(count($news)) --}}
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="{{0}}" class="active"></li>
                                    @for($i=1; $i<count($news); $i++)
                                    {{-- @foreach($news as $index => $new) --}}
                                        {{-- @if($index > 0 && $now <= $new->end_datetime->toTimeString()) --}}
                                            <li data-target="#carousel-example-generic" data-slide-to="{{$i}}"></li>
                                        {{-- @endif --}}
                                    {{-- @endforeach --}}
                                    @endfor
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    {{-- @if ($now <= $news->first()->end_datetime->toTimeString()) --}}
                                        <div class="item active">
                                            <a href="{{-- route('frontend.event.event', ['id' => $news->first()->id]) --}}">
                                                @if($news->first()->media->where('collection_name', 'news-cover')->first() ==  null)
                                                    <img src="{{ asset('frontend/src/img/news-cover-defalt-img.jpg')}}" alt="..." class="image-responsive" style="width:100%;">
                                                @else
                                                    <img src="{{ asset($news->first()->media->where('collection_name', 'news-cover')->first()->getUrl()) }}" alt="..." class="image-responsive" style="width:100%;">
                                                @endif
                                            </a>
                                        </div>
                                    {{-- @endif --}}             
                                    @foreach($news as $index => $new)
                                        @if($index > 0)
                                        {{-- @if($index > 0 && $now <= $new->end_datetime->toTimeString()) --}}
                                            <div class="item">
                                                <a href="{{-- route('frontend.event.event', ['id' => $new->id]) --}}">                                            
                                                @if($new->media->where('collection_name', 'news-cover')->first() ==  null)
                                                    <img src="{{ asset('frontend/src/img/news-cover-defalt-img.jpg')}}" alt="..." class="image-responsive" style="width:100%;">                                                    
                                                @else
                                                    <img src="{{ asset($new->media->where('collection_name', 'news-cover')->first()->getUrl()) }}" alt="..." class="image-responsive" style="width:100%;">
                                                @endif
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach

                                    <!-- Controls -->
                                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                  
                                </div>
                            @endif                            
                        @endif

                        <!-- {{-- @foreach($events as $index => $event) --}}
                            <h1>{{-- $event->name --}}</h1>
                            {{-- @foreach($event->media->where('collection_name', 'event') as $media) --}}
                                <div>
                                    <img src="{{-- asset($media->getUrl()) --}}" class="image-responsive" style="max-height:150px;">    
                                </div>
                                {{-- @endforeach --}}
                        {{-- @endforeach --}} -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')

<!-- jQuery 2.2.3 -->
<!-- <script src=" {{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script> -->
<!-- bootstrap -->
<!-- <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script> -->

<!-- <script>
$(document).ready(function() {
    /* initialize the external events
     -----------------------------------------------------------------*/
    function init_events(ele) {
      ele.each(function () {
        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }
        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)
        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })
      })
    }
    init_events($('#external-events div.external-event'))
    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var current_locale = document.documentElement.lang; 
    // console.log(current_locale);
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next',
        center: 'title',
        right : 'today'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },
      dayClick: function() {
        alert('a day has been clicked!');
      },
      views: { 
        month: { // name of view
            columnFormat: 'dd'
        }
      },   
      //Random default events
      locale : current_locale,
      events    : [
        {
          title          : 'All Day Event',
          start          : new Date(y, m, 1),
          backgroundColor: '#f56954', //red
          borderColor    : '#f56954' //red
        },
        {
          title          : 'Long Event',
          start          : new Date(y, m, d - 5),
          end            : new Date(y, m, d - 2),
          backgroundColor: '#f39c12', //yellow
          borderColor    : '#f39c12' //yellow
        },
        {
          title          : 'Meeting',
          start          : new Date(y, m, d, 10, 30),
          allDay         : false,
          backgroundColor: '#0073b7', //Blue
          borderColor    : '#0073b7' //Blue
        },
        {
          title          : 'Lunch',
          start          : new Date(y, m, d, 12, 0),
          end            : new Date(y, m, d, 14, 0),
          allDay         : false,
          backgroundColor: '#00c0ef', //Info (aqua)
          borderColor    : '#00c0ef' //Info (aqua)
        },
        {
          title          : 'Birthday Party',
          start          : new Date(y, m, d + 1, 19, 0),
          end            : new Date(y, m, d + 1, 22, 30),
          allDay         : false,
          backgroundColor: '#00a65a', //Success (green)
          borderColor    : '#00a65a' //Success (green)
        },
        {
          title          : 'Click for Google',
          start          : new Date(y, m, 28),
          end            : new Date(y, m, 29),
          url            : 'http://google.com/',
          backgroundColor: '#3c8dbc', //Primary (light-blue)
          borderColor    : '#3c8dbc' //Primary (light-blue)
        },
        {
          title          : 'Click for Google',
          start          : new Date(y, m, 28),
          end            : new Date(y, m, 29),
          url            : 'http://google.com/',
          backgroundColor: '#3c8dbc', //Primary (light-blue)
          borderColor    : '#3c8dbc' //Primary (light-blue)
        }
      ],
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function (date, allDay) { // this function is called when something is dropped
        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject')
        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject)
        // assign it the date that was reported
        copiedEventObject.start           = date
        copiedEventObject.allDay          = allDay
        copiedEventObject.backgroundColor = $(this).css('background-color')
        copiedEventObject.borderColor     = $(this).css('border-color')
        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)
        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove()
        }
      }
    })
  })
</script> -->

{!! $calendar->script() !!}

@endsection