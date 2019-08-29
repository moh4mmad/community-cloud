@extends('front.app')
@section('title'){{$front->title}}@endsection
@section('og_title'){{$front->title}}@endsection
@section('description'){{$front->description}}@endsection
@section('og_description'){{$front->description}}@endsection
@section('keyword'){{$front->keywords}}@endsection
@section('og_image'){{$front->og_img}}@endsection


@section('content')
<div id="wrapper">
        <header>
		@include('front.mainmenu')
		@include('front.mobilemenu')
        </header>
		
		@include('front.index.slider')
		@include('front.index.about')
		@include('front.index.news')
		@include('front.index.event')
		@include('front.index.counter')
		@include('front.index.members')
		@include('front.index.testimonial')
		
	 
</div>
@endsection	