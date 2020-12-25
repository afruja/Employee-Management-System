@extends('layouts.employee')
@section('main')
<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">View Attendance Page</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('employee/profile') }}">Profile</a></li>
              <li class="breadcrumb-item">View Attendance</li>
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
                  <h3 class="p-1 far fa-calendar-check" style="color:black;"> View Attendance</h3>
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
            eventTextColor: '#000000',
            events : [
                @foreach($attendances as $attendance)
                {
                    title : "{{ $attendance->attendance }}",
                    start : "{{ $attendance->att_date }}",
                    end : "{{ $attendance->att_date }}",
                    backgroundColor : 'red',
                },
                @endforeach

            ],
        })
    });
</script>
@endsection
