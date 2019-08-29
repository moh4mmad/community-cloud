@extends('front.app')
@section('title')404 Page not found - {{$front->title}}@endsection
@section('og_title')404 Page not found - {{$front->title}}@endsection
@section('description'){{$front->title}} - 404 Page not found @endsection
@section('og_description'){{$front->title}} - 404 Page not found @endsection
@section('keyword')404, {{$front->keywords}}@endsection
@section('og_image'){{$front->og_img}}@endsection


@section('content')
<div id="wrapper">
        <header>
		@include('front.mainmenu')
		@include('front.mobilemenu')
        </header>

		<div class="error-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="error-top">
                            <img src="{{asset('assets/img/404.png')}}" class="img-responsive" alt="404">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="error-bottom">
                            <h2>Sorry!!! Page Was Not Found</h2>
                            <p>The page you are looking is not available or has been removed. Try going to Home Page by using the button below.</p>
                            <a href="{{ route('home') }}" class="default-white-btn">Go To Home Page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
</div>
@endsection	