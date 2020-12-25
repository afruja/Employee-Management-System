@extends('layouts.employee')
@section('main')
<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">View Event Page</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('employee/profile') }}">Profile</a></li>
              <li class="breadcrumb-item">View Events</li>
            </ol>
          </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="{{asset('/js/sweetalert.min.js')}}"></script>

<!--Event Page Index-->
  <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
          <div class="container" style="background-color: #D8BFD8;">
        <h3 class="p-1 far fa-calendar-check" style="color:black;"> View Event Calendar</h3>
        <div id='calendar' style="font-size: 20px;color:black;"></div>
    </div>
      </div>
  </div>
    </div>
@endsection

@section('scripts')
<!-- Scripts -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>

<script>
    $(document).ready(function() {

        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({

            //Put your options and callbacks here
            //Make the event dragable, resizabe, change opacity
            editable: false,
            dragOpacity: .60,
            eventTextColor: '#000000',
            events : [

                @foreach($events as $event)
                {
                    id : '{{ $event->id }}',
                    title : "{!! $event->title !!}",
                    start : "{!! $event->start !!}",
                    end : '{{ $event->end }}',
                    backgroundColor : '{{  $event->backgroundColor }}',
                    url : '{{ route('events.edit', $event->id) }}',
                    eurl : '{{ url('/admin/events/update') }}',
                    ajax : true,
                },
                @endforeach
            ],
            //Show the event entry form when a day is clicked
            {{--  dayClick: function(date, jsEvent, view) {
                //Change background color of day when it is clicked
                $(this).css('background-color', '#bed7f3');
                //Get the date that was clicked
                var date_clicked =  date.format();
                //Redirect to the new event entry form
                window.location.href = "{{URL::to('events')}}" + "/" + date_clicked;
            },  --}}
            eventClick: function(event, jsEvent, view) {
                $(this).css('background-color', '#ff0000');
            },
            eventDragStart: function(event, jsEvent, view) {
                $(this).css('background-color', '#00ff00');
            },
            // drop on a new date and submit to database
            eventDrop: function(event, delta, revertFunc, jsEvent, view) {

                swal({
                    title: "You moved the event. Save it?",
                    text: "You can move it as mush as you want.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then(function(willDelete){
                    if (willDelete) {
                        swal("Moved. Your event has been rescheduled.", {
                        icon: "success",
                        });

                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            dataType: 'json',
                            type:'POST',
                            url: event.eurl,
                            data:{
                                    id:event.id,
                                    start:event.start.format(),
                                    end:event.end.format(),
                                },
                            success: function(data){
                            },
                        });
                    } else {
                        swal("Your event has not been rescheduled.");
                        revertFunc();
                    }
                });
            },
            eventResize: function(event, delta, revertFunc){
                swal({
                    title: "Changed Timeline. Save it?",
                    text: "You can expand it as far as you need to.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then(function(willDelete){
                    if (willDelete) {
                        swal("Moved! Your event has been rescheduled!", {
                        icon: "success",
                        });

                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            dataType: 'json',
                            type:'POST',
                            url: event.eurl,
                            data:{
                                    id:event.id,
                                    start:event.start.format(),
                                    end:event.end.format()
                                },
                            success: function(data){
                            },
                        });

                    } else {
                        swal("Your event has not been rescheduled.");
                        revertFunc();                                                                                                                                                                        nv
                    }
                });
            },
        })
    });
</script>
@endsection
