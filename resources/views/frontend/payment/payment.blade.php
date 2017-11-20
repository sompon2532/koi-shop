@extends('frontend.layouts.master')

@section('page_title', 'Payment')

@section('custom-css')
<style>
    ::-webkit-file-upload-button {
        color: #ff0000;
        padding: .5em 1em;
        border: #ff0000 2px solid;
        background-color: #ffffff;
        border-radius: 0;
    }
</style>
@endsection

@section('content')
    <div class="row"> 
            <div class="col-md-12">
                <div class="mycart main-content text-center">
                    <div class="title-box">
                        <h1>CHECKOUT</h1>
                    </div>
                    <div class="content-box">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered text-center">
                                    <tr>
                                        <th class="text-center">ธนาคาร</th>
                                        <th class="text-center">ชื่อบัญชี</th>
                                        <th class="text-center">ประเภทบัญชี</th>
                                        <th class="text-center">สาขา</th>
                                        <th class="text-center">เลขที่บัญชี</th>
                                    </tr>
                                    <tr>
                                        <td >ธนาคารกสิกรไทย</td>
                                        <td>ธนัยชนถ ลิมปนุสรณ์ </td>
                                        <td>ออมทรัพย์</td>
                                        <td>ท่าน้ำราชวงศ์</td>
                                        <td>606-2-01458-8</td>
                                    </tr>
                                    <tr>
                                        <td>ธนาคารกรุงเทพ</td>
                                        <td>ธนัยชนถ ลิมปนุสรณ์ </td>
                                        <td>ออมทรัพย์</td>
                                        <td>ท่าน้ำราชวงศ์</td>
                                        <td>606-2-01458-8</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3 clear-both"> -->
                        <h2 class="text-red">SHIPPING ADDRESS</h2>
                        <form action="{{ route('checkout') }}" method="post" id="checkout-form">
                            <div class="row">
                                <div class="col-xs-12 col-md-6 col-md-offset-3">
                                    <div class="form-group form-payment">
                                        <label class="col-md-3" for="name">Images</label>
                                        <div class="col-md-9">
                                            <input class="col-md-12" type="file" name="file" value="">                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6 col-md-offset-3">
                                    <div class="form-group form-payment">
                                        <label class="col-md-3" for="address">Address</label>
                                        <div class="col-md-9">
                                            <input type="text" id="address" class="form-control" required name="address">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6 col-md-offset-3">
                                    <div class="form-group form-payment">
                                        <label class="col-md-3" for="card-name">Tel</label>
                                        <div class="col-md-9">
                                            <input type="text" id="Tel" class="form-control" name="tel" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-6 col-md-offset-3">
                                    <div class="form-group form-payment">
                                        <label class="col-sm-2  col-md-3  control-label">
                                            Date time <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-sm-10 col-md-9">
                                            <input type="text" class="form-control datepicker" name="end_date">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-red form-payment">SEND</button>
                        </form>
                    <!-- </div> -->
                </div>
            </div>

            <!-- THE CALENDAR -->
            <!-- <div class="col-md-6"><div id="calendar"></div></div> -->
            

        <!-- <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
        	<h1>Checkout</h1>
        	<h4>Your Total: ${{-- $total --}}</h4>
    		
    	</div>	 -->	
	</div>
@endsection

@section('custom-js')
<script>
        // // Date picker
        // $(".datepicker").datepicker({
        //     autoclose: true,
        //     format: 'dd/mm/yyyy H:i:s',
        //     todayHighlight: true,
        // });

        // // Timepicker
        // $(".timepicker").timepicker({
        //     showInputs: false,
        //     minuteStep: 10,
        //     showMeridian: false,
        // });

        // $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        //     checkboxClass: 'icheckbox_minimal-red',
        //     radioClass: 'iradio_minimal-red'
        // });

        /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    
    
    </script>
<!-- jQuery 2.2.3 -->
<!-- <script src=" {{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script> -->
<!-- bootstrap -->
<!-- <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

<script>
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
    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      //Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }
      //Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.html(val)
      $('#external-events').prepend(event)
      //Add draggable funtionality
      init_events(event)
      //Remove event from text input
      $('#new-event').val('')
    })
  }) -->
</script>
@endsection