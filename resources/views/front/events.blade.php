@extends('front.app')
@section('title')Events - {{$front->title}}@endsection
@section('og_title')Events - {{$front->title}}@endsection
@section('description'){{$front->title}} - Events @endsection
@section('og_description'){{$front->title}} - Events @endsection
@section('keyword')events, {{$front->keywords}}@endsection
@section('og_image'){{$front->og_img}}@endsection


@section('content')
<div id="wrapper">
        <header>
		@include('front.mainmenu')
		@include('front.mobilemenu')
        </header>
		
        <div class="inner-page-banner-area">
            <div class="container">
                <div class="pagination-area">
                    <h1>Events</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a> -</li>
                        <li>Events</li>
                    </ul>
                </div>
            </div>
        </div>
		
        <div class="event-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                        <div class="row event-inner-wrapper">
						@if(sizeof($events) == 0)
					<div class="alert alert-danger" role="alert">No data available!</div>
				@endif
						@foreach($events as $event)
						@php
						$date = \Carbon\Carbon::parse($event->date, 'UTC');
						@endphp
                            <div class="col-lg-12 col-md-6 col-sm-12 col-xs-6">
                                <div class="single-item">
                                    <div class="item-img">
                                        <a href="{{ route('event.details', $event->id) }}"><img src="{{asset('assets/img/event/')}}/{{$event->image}}" alt="event" class="img-responsive"></a>
                                    </div>
                                    <div class="item-content">
                                        <h3 class="sidebar-title"><a href="{{ route('event.details', $event->id) }}">{{$event->title}}</a></h3>
                                        <p>{{ str_limit(strip_tags($event->content), 150) }}</p>
                                        <ul class="event-info-block">
                                            <li><i class="fa fa-calendar" aria-hidden="true"></i>{{ $date->format('d') }} {{ $date->format('M') }}, {{ $date->format('Y') }}</li>
                                            <li><i class="fa fa-map-marker" aria-hidden="true"></i>{{$event->location}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
							@endforeach
							
                            </div>
							
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                {{ $events->render() }}
                            </div>
                        </div>
                    
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="sidebar">
                            <div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                    <h3 class="sidebar-title">Search event</h3>
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
                                    <h3 class="sidebar-title">News</h3>
                                    <div class="sidebar-latest-research-area">
                                        <ul>
										@foreach($news as $news1)
										@php
										$date = \Carbon\Carbon::parse($news1->created_at, 'UTC');
										@endphp
                                            <li>
                                                <div class="latest-research-img">
                                                    <a href="#"><img src="@if($news1->image == null) {{asset('assets/img/no-image.png')}} @else {{asset('assets/img/news/')}}/{{$news1->image}} @endif" class="img-responsive" alt="skilled"></a>
                                                </div>
                                                <div class="latest-research-content">
                                                    <h4>{{ $date->format('d') }} {{ $date->format('M') }}, {{ $date->format('Y') }}</h4>
                                                    <p>{{$news1->title}}</p>
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