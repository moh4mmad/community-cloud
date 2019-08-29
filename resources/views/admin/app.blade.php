<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title') :: {{$front->title}}</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">    
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">
    <link href="{{asset('assets/admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="{{asset('assets/admin/css/font-awesome.min.css')}}" rel="stylesheet">        
    
    <link href="{{asset('assets/admin/css/ui-lightness/jquery-ui-1.10.0.custom.min.css')}}" rel="stylesheet">
    
    <link href="{{asset('assets/admin/css/base-admin-3.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/css/base-admin-3-responsive.css')}}" rel="stylesheet">
    
    <link href="{{asset('assets/admin/css/pages/dashboard.css')}}" rel="stylesheet">   

    <link href="{{asset('assets/admin/css/custom.css')}}" rel="stylesheet">
	<link href="{{asset('assets/admin/js/plugins/msgGrowl/css/msgGrowl.css')}}" rel="stylesheet">
	@yield('css')
	
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>

<body>

<nav class="navbar navbar-inverse" style="position: initial;" role="navigation">

	<div class="container">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <i class="icon-cog"></i>
    </button>
    <a class="navbar-brand" href="{{ url('/') }}">{{$front->title}}</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav navbar-right">


		<li class="dropdown">
						
			<a href="javscript:;" class="dropdown-toggle" data-toggle="dropdown">
				<i class="icon-user"></i>
				@php
				$admin = \Auth::guard('admin')->user();
				@endphp
				{{$admin->name}}
				<b class="caret"></b>
			</a>
			
			<ul class="dropdown-menu">
				<li><a href="{{ route('admin.profile') }}">My Profile</a></li>
				<li class="divider"></li>
				<li><a href="{{ route('admin.logout') }}">Logout</a></li>
			</ul>
			
		</li>
    </ul>
  </div><!-- /.navbar-collapse -->
</div> <!-- /.container -->
</nav>
    



    
<div class="subnavbar">

	<div class="subnavbar-inner">
	
		<div class="container">
			
			<a href="javascript:;" class="subnav-toggle" data-toggle="collapse" data-target=".subnav-collapse">
		      <span class="sr-only">Toggle navigation</span>
		      <i class="icon-reorder"></i>
		      
		    </a>

			<div class="collapse subnav-collapse">
				<ul class="mainnav">
				
					<li class="@if(request()->path() == 'admin/dashboard') active @endif">
						<a href="{{ route('admin.dashboard') }}">
							<i class="icon-home"></i>
							<span>Dashboard</span>
						</a>	    				
					</li>
				
					<li class="@if(request()->path() == 'admin/news') active @endif">
						<a href="{{ route('admin.news') }}">
							<i class="icon-list-alt"></i>
							<span>News</span>
						</a>	    				
					</li>
				
					<li class="@if(request()->path() == 'admin/events') active @endif">
						<a href="{{ route('admin.events') }}">
							<i class="icon-calendar"></i>
							<span>Events</span>
						</a>	    				
					</li>
					
					<li class="{{ Request::is('admin/members/*') ? 'active' : ''}} dropdown">					
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-user"></i>
							<span>Members</span>
							<b class="caret"></b>
						</a>	    
					
						<ul class="dropdown-menu">
							<li class="@if(request()->path() == 'admin/members/FacultyMembers') active @endif"><a href="{{ route('admin.facultymembers') }}">Faculty Members</a></li>
							<li class="@if(request()->path() == 'admin/members/ExecutiveBody') active @endif"><a href="{{ route('admin.executivebody') }}">Executive Body</a></li>
							<li class="@if(request()->path() == 'admin/members/LabAssistance') active @endif"><a href="{{ route('admin.labassistance') }}">Lab Assistance</a></li>
							<li class="@if(request()->path() == 'admin/members/OfficeStuff') active @endif"><a href="{{ route('admin.officestuff')}}">Office Stuffs</a></li>
						</ul> 				
					</li>
					
					<li class="@if(request()->path() == 'admin/students' || Request::is('admin/students/*')) active @endif">
						<a href="{{ route('admin.students') }}">
							<i class="icon-user"></i>
							<span>Students</span>
						</a>	    				
					</li>
					
					<li class="@if(request()->path() == 'admin/achievements') active @endif">
						<a href="{{ route('admin.achievements') }}">
							<i class="icon-trophy"></i>
							<span>Achievements</span>
						</a>	    				
					</li>
					
					<li class="@if(request()->path() == 'admin/committee') active @endif">
						<a href="{{ route('admin.committee') }}">
							<i class="icon-male"></i>
							<span>Committee</span>
						</a>	    				
					</li>
					
					<li class="@if(request()->path() == 'admin/gallery') active @endif">
						<a href="{{ route('admin.gallery') }}">
							<i class="icon-picture"></i>
							<span>Gallery</span>
						</a>	    				
					</li>
					
					<li class="{{ Request::is('admin/settings/*') ? 'active' : ''}} dropdown">					
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-wrench"></i>
							<span>Settings</span>
							<b class="caret"></b>
						</a>	    
					
						<ul class="dropdown-menu">
							<li class="@if(request()->path() == 'admin/settings/sliders') active @endif"><a href="{{ route('admin.sliders') }}">Sliders</a></li>
							<li class="@if(request()->path() == 'admin/settings/frontend') active @endif"><a href="{{ route('admin.frontend') }}">Frontend data</a></li>
							<li class="@if(request()->path() == 'admin/settings/resource') active @endif"><a href="{{ route('admin.resource') }}">Resource</a></li>
							<li class="@if(request()->path() == 'admin/settings/mail') active @endif"><a href="{{ route('admin.mail') }}">Mail</a></li>
						</ul> 				
					</li>
					
					
					<li class="@if(request()->path() == 'admin/mailer') active @endif">
						<a href="{{ route('admin.mailer') }}">
							<i class="icon-envelope"></i>
							<span>Mail sender</span>
						</a>	    				
					</li>
				
				</ul>
			</div> <!-- /.subnav-collapse -->

		</div> <!-- /container -->
	
	</div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->
    
    
<div class="main">

    <div class="container">

      <div class="row">
      	
      	@yield('content')
			
		</div> <!-- /row -->

	</div> <!-- /container -->

</div> <!-- /extra -->


    
    
<div class="footer">
		
	<div class="container">
		
		<div class="row">
			
			<div id="footer-copyright" class="col-md-6">
				{!!$front->footer!!}
			</div> <!-- /span6 -->
			
			<div id="footer-terms" class="col-md-6">
				Developed by <a href="https://sakib.info" target="_blank">S4K16</a>
			</div> <!-- /.span6 -->
			
		</div> <!-- /row -->
		
	</div> <!-- /container -->
	
</div> <!-- /footer -->
@yield('modal')
@if (trim($__env->yieldContent('jquary')))
	@yield('jquary')
@else
<script src="{{asset('assets/admin/js/libs/jquery-1.9.1.min.js')}}"></script>
@endif
<script src="{{asset('assets/admin/js/libs/jquery-ui-1.10.0.custom.min.js')}}"></script>
<script src="{{asset('assets/admin/js/libs/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/admin/js/plugins/msgGrowl/js/msgGrowl.js')}}"></script>
<script src="{{asset('assets/admin/js/plugins/flot/jquery.flot.js')}}"></script>
<script src="{{asset('assets/admin/js/plugins/flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('assets/admin/js/plugins/flot/jquery.flot.resize.js')}}"></script>

<script src="{{asset('assets/admin/js/Application.js')}}"></script>

@yield('script')

@if (Session::has('alert'))
   <script>
	$.msgGrowl ({
			type: 'error'
			, title: 'Error'
			, text: "{{ Session::get('alert') }}"
			, position: 'top-right'
		});
   </script>
   @endif

   @if (Session::has('success'))
   <script>
	$.msgGrowl ({
			type: 'success'
			, title: 'Success'
			, text: "{{ Session::get('success') }}"
			, position: 'top-right'
		});
   </script>
   @endif
    @if ($errors->any())
	   @foreach ($errors->all() as $error)
       <script>
	$.msgGrowl ({
			type: 'error'
			, title: 'Error'
			, text: "{{ $error }}"
			, position: 'top-right'
		});
   </script>
	   @endforeach
	@endif
  </body>

</html>
