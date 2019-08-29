@extends('front.app')
@section('title')Faculty Sign in - {{$front->title}}@endsection
@section('og_title')Faculty Sign in - {{$front->title}}@endsection
@section('description'){{$front->title}} - Faculty Sign in @endsection
@section('og_description'){{$front->title}} - Faculty Sign in @endsection
@section('keyword')Faculty Sign in, {{$front->keywords}}@endsection
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
                    <h1>Faculty Sign in</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a> -</li>
                        <li>Faculty Sign in</li>
                    </ul>
                </div>
            </div>
        </div>
		
        <div class="registration-page-area bg-secondary">
            <div class="container">
                <h2 class="sidebar-title">Enter Sign In information</h2>
                <div class="registration-details-area inner-page-padding">
				
				
		@if (session('success'))
		<div class="alert alert-success" role="alert">{{ session('success') }}</div>
		@endif
		
		@if (session('alert'))
		<div class="alert alert-danger" role="alert">{{ session('alert') }}</div>
		@endif

		@if ($errors->any())
			<div class="alert alert-danger" role="alert">
			@foreach ($errors->all() as $error)
			{{ $error }} <br>
		@endforeach
		</div>
		@endif
		
				
				
                    <form id="registration" method="post" action="{{ route('teacher.userlogin') }}">
					{{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label" for="email">E-mail Address *</label>
                                    <input type="email" name="email" value="{{ old('login') }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label" for="pass">Password *</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                            </div>
                        </div>
						<span><input type="checkbox" name="remember"/>Remember Me</span>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="pLace-order mt-30">
                                    <button class="view-all-accent-btn disabled" type="submit" value="Login">Submit</button>
                                </div>
                            </div>
                        </div>
						</br>
						<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<label class="check"><a href="{{ route('teacher.reset') }}">Lost your password?</a></label>
						</div>
						</div>
                    </form>
                </div>
            </div>
        </div>
	</div>
@endsection