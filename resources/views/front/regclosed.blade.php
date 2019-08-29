@extends('front.app')
@section('title')Registraion - {{$details->title}} - {{$front->title}}@endsection
@section('og_title')Registraion - {{$details->title}} - {{$front->title}}@endsection
@section('description'){{ str_limit(strip_tags($details->content), 150) }}@endsection
@section('og_description'){{ str_limit(strip_tags($details->content), 150) }} @endsection
@section('keyword')registraion,events, {{$front->keywords}}@endsection
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
                    <h1>Registraion - {{$details->title}}</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a> -</li>
                        <li>Registraion</li>
                    </ul>
                </div>
            </div>
        </div>
		
		@if(\Carbon\Carbon::parse($details->deadline) < \Carbon\Carbon::now())
			<div class="event-page-area">
			<div class="container">
			<div class="row">
		    <div class="col-lg-12 col-md-9 col-sm-8 col-xs-12">
			<div class="row event-inner-wrapper">
			<div class="alert alert-danger text-center" role="alert"><h3>Registration closed!</h3></div>
			</div>
			</div>
			</div>
			</div>
			</div>
		@endif
		@endsection