@extends('front.app')
@section('title')Achievements - {{$front->title}}@endsection
@section('og_title')Achievements - {{$front->title}}@endsection
@section('description'){{$front->title}} - Achievements @endsection
@section('og_description'){{$front->title}} - Achievements @endsection
@section('keyword')Achievements, {{$front->keywords}}@endsection
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
                    <h1>Achievements</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a> -</li>
                        <li>Achievements</li>
                    </ul>
                </div>
            </div>
        </div>
		
        <div class="research-page1-area">
            <div class="container">
                <div class="row">
				<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
				<div class="row">
				@if(sizeof($achievements) == 0)
					<div class="alert alert-danger" role="alert">No data available!</div>
				@endif
				@foreach($achievements as $achievement)
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="research-box1">
                                    <img style="position: relative;width: 360px;height: 220px;" src="{{asset('assets/img/achievements/')}}/{{$achievement->image}}" class="img-responsive" alt="research">
                                    <h3 class="sidebar-title"><a href="{{ route('achievements.details', $achievement->id) }}">{{$achievement->title}}</a></h3>
                                    <p>{{ str_limit(strip_tags($achievement->content), 150) }}</p>
                                </div>
                            </div>
					@endforeach
					   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					    {{ $achievements->render() }}
					  </div>
                    </div>
                </div>
				
				<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="sidebar">
                            <div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                    <h3 class="sidebar-title">Search achievement</h3>
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