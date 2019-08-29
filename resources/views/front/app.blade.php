<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
	<meta name="keyword" content="@yield('keyword')">    
    <meta property="og:title" content="@yield('og_title')">
	<meta property="og:description" content="@yield('og_description')">
	<meta property="og:image" content="@yield('og_image')">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('assets/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/OwlCarousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/OwlCarousel/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/meanmenu.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/slider/css/nivo-slider.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('assets/vendor/slider/css/preview.css')}}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{asset('assets/css/jquery.datetimepicker.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/hover-min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/reImageGrid.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
	@yield('css')
    <script src="{{asset('assets/js/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>

    <div id="preloader" style="background: #002147 url('{{asset('assets/img/preloader.gif')}}') no-repeat scroll center center;"></div>

    @yield('content')
	@include('front.footer')
    <script src="{{asset('assets/js/jquery-2.2.4.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/plugins.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/wow.min.js')}}"></script>
    <script src="{{asset('assets/vendor/slider/js/jquery.nivo.slider.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendor/slider/home.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendor/OwlCarousel/owl.carousel.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/jquery.meanmenu.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/jquery.scrollUp.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('assets/js/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.countdown.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/isotope.pkgd.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/jquery.gridrotator.js')}}" type="text/javascript"></script>
    @yield('script')
	<script src="{{asset('assets/js/main.js')}}" type="text/javascript"></script>
	
</body>

</html>
