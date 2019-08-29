@extends('front.app')
@section('title'){{$folder->name}} - {{$front->title}}@endsection
@section('og_title'){{$folder->name}} - {{$front->title}}@endsection
@section('description'){{$front->title}} - {{$folder->name}} @endsection
@section('og_description'){{$front->title}} - {{$folder->name}} @endsection
@section('keyword'){{$folder->name}}, {{$front->keywords}}@endsection
@section('og_image')@if($folder->image == null) {{asset('assets/img/gallary.png')}} @else {{asset('assets/img/gallery/')}}/{{$folder->image}} @endif @endsection


@section('content')
<div id="wrapper">
        <header>
		@include('front.mainmenu')

		@include('front.mobilemenu')
        </header>
		
        <div class="inner-page-banner-area">
            <div class="container">
                <div class="pagination-area">
                    <h1>{{$folder->name}}</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a> -</li>
                        <li><a href="{{ route('photogallary') }}">Photo gallary</a> -</li>
                        <li>{{$folder->name}}</li>
                    </ul>
                </div>
            </div>
        </div>
		
		
        <div class="gallery-area2">
            <div class="container" id="inner-isotope">
                <div class="row featuredContainer gallery-wrapper">
				@if(sizeof($images) == 0)
					<div class="alert alert-danger" role="alert">No image available!</div>
				@endif
				@foreach($images as $image)
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="gallery-box">
                            <img src="{{asset('assets/img/gallery/')}}/{{$image->img_url}}" class="img-responsive" alt="gallery">
                            <div class="gallery-content">
                                <a href="{{asset('assets/img/gallery/')}}/{{$image->img_url}}" class="zoom"><i class="fa fa-link" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
					@endforeach
                </div>
            </div>
        </div>
        
	 
</div>
@endsection	