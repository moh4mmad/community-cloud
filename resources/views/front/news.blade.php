@extends('front.app')
@section('title')News - {{$front->title}}@endsection
@section('og_title')News - {{$front->title}}@endsection
@section('description'){{$front->title}} - News @endsection
@section('og_description'){{$front->title}} - News @endsection
@section('keyword')news, {{$front->keywords}}@endsection
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
                    <h1>News</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a> -</li>
                        <li>News</li>
                    </ul>
                </div>
            </div>
        </div>
		
		
        <div class="news-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                        <div class="row">
						@if(sizeof($news) == 0)
					<div class="alert alert-danger" role="alert">No data available!</div>
				@endif
						@foreach($news as $news1)
						@php
						$date = \Carbon\Carbon::parse($news1->created_at, 'UTC');
						@endphp
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="news-box">
                                    <div class="news-img-holder">
                                        <img style="position: relative;width: 360px;height: 250px;" src="@if($news1->image == null) {{asset('assets/img/no-image.png')}} @else {{asset('assets/img/news/')}}/{{$news1->image}} @endif" class="img-responsive" alt="news">
                                        <ul class="news-date2">
                                            <li>{{ $date->format('d') }} {{ $date->format('M') }}</li>
                                            <li>{{ $date->format('Y') }}</li>
                                        </ul>
                                    </div>
                                    <h3 class="title-news-left-bold"><a href="{{ route('news.details', $news1->id) }}">{{$news1->title}}</a></h3>
                                    <ul class="title-bar-high news-comments">
                                        <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i><span>By</span> {{$news1->created_by}}</a></li>
                                        <li><a href="#"><i class="fa fa-tags" aria-hidden="true"></i>{{$news1->type}}</a></li>
                                    </ul>
                                    <p>{{ str_limit(strip_tags($news1->content), 150) }}</p>
                                </div>
                            </div>
                         @endforeach
						 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    {{ $news->render() }}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="sidebar">
                            <div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                    <h3 class="sidebar-title">Search news</h3>
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