@extends('front.app')
@section('title'){{$details->title}} - {{$front->title}}@endsection
@section('og_title'){{$details->title}} - {{$front->title}}@endsection
@section('description'){{ str_limit(strip_tags($details->content), 150) }}@endsection
@section('og_description'){{ str_limit(strip_tags($details->content), 150) }} @endsection
@section('keyword')events, {{$front->keywords}}@endsection
@section('og_image'){{asset('assets/img/event/')}}/{{$details->image}}@endsection


@section('content')
<div id="wrapper">
        <header>
		@include('front.mainmenu')
		@include('front.mobilemenu')
        </header>
		
        <div class="inner-page-banner-area">
            <div class="container">
                <div class="pagination-area">
                    <h1>Event details</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a> -</li>
                        <li><a href="{{ route('events') }}">Events</a> -</li>
                        <li>Event details</li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="event-details-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                        <div class="event-details-inner">
                            <div class="event-details-img">
                                <div class="countdown-content">
                                    <div id="countdown"></div>
                                </div>
                                <a><img src="{{asset('assets/img/event/')}}/{{$details->image}}" alt="event" class="img-responsive"></a>
                            </div>
                            <h2 class="title-default-left-bold-lowhight"><a>{{$details->title}}</a></h2>
                            <ul class="event-info-inline title-bar-sm-high">
                                <li><i class="fa fa-calendar" aria-hidden="true"></i>{{ \Carbon\Carbon::parse($details->date, 'UTC')->format('d M, Y') }}</li>
                                <li><i class="fa fa-map-marker" aria-hidden="true"></i>{{$details->location}}</li>
                            </ul>
							
							
							<div class="box box-border page-row">
    <ul class="list-unstyled">
        <li><strong>Time:</strong> {{$details->start_time}} - {{$details->end_time}}</li>
        <li><strong>Date:</strong> {{ \Carbon\Carbon::parse($details->date, 'UTC')->format('d M, Y') }}</li>
        @if($details->type == "individual")
		<li><strong>Participant type:</strong> Individual</li>
        @else
		<li><strong>Participant type:</strong> Team</li>
        <li><strong>Maximum member:</strong> {{$details->max_member}}</li>
		@endif
		<li><strong>Registration Fee:</strong> {{$details->reg_fee}}</li>
		<li><strong>Payment method:</strong> {{$details->payment_method}}</li>
        <li><strong>Payment number:</strong> {{$details->payment_number}}</li>
        <li><strong>Registration Deadline:</strong> {{\Carbon\Carbon::parse($details->deadline, 'UTC')->format('d M, Y, h:i A')}}</li>
		<li><strong>Registration Now:</strong> <a href="{{ route('event.reg', $details->id) }}">Click here</a></li>

    </ul>
</div>
              <p>{!!$details->content!!}</p>
			  <div class="news-details-page-inner">
			  <ul class="news-social">
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                </ul>
			  </div>
                            </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="sidebar">
                            <div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                    <h3 class="sidebar-title">Search</h3>
                                    <div class="sidebar-find-course">
                                        <form id="checkout-form">
                                            <div class="form-group course-name">
                                                <input id="first-name" placeholder="Type Here . . .." class="form-control" type="text" />
                                            </div>
                                            <div class="form-group">
                                                <button class="sidebar-search-btn-full disabled" type="submit" value="Login">Search</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
							<div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                    <h3 class="sidebar-title">Events</h3>
                                    <div class="sidebar-latest-research-area">
                                        <ul>
										@foreach($events as $event)
										@php
										$date = \Carbon\Carbon::parse($event->date, 'UTC');
										@endphp
                                            <li>
                                                <div class="latest-research-img">
                                                    <a href="{{ route('event.details', $event->id) }}"><img src="{{asset('assets/img/event/')}}/{{$event->image}}" class="img-responsive" alt="skilled"></a>
                                                </div>
                                                <div class="latest-research-content">
                                                    <h4>{{ $date->format('d') }} {{ $date->format('M') }}, {{ $date->format('Y') }}</h4>
                                                    <p>{{$event->title}}</p>
                                                </div>
                                            </li>
											@endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

   </div>
@endsection
@section('script')
<script>
$('#countdown').countdown('{{ \Carbon\Carbon::parse($details->date, 'UTC')->format('Y/m/d') }}', function(e) {

        $(this).html(e.strftime("<div class='countdown-section'><h3>%D</h3> <p>Day%!D</p> </div><div class='countdown-section'><h3>%H</h3> <p>Hour%!H</p> </div><div class='countdown-section'><h3>%M</h3> <p>Minute%!M</p> </div><div class='countdown-section'><h3>%S</h3> <p>Second%!S</p> </div>"));
    });

</script>
@endsection