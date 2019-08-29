
            <div id="header2" class="header4-area">
                <div class="header-top-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="header-top-left">
                                    <div class="logo-area">
                                        <a href="{{ route('home') }}"><img class="img-responsive" src="{{asset('assets/img/logo.png')}}" alt="logo"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <div class="header-top-right">
                                    <ul>
                                        <li><i class="fa fa-phone" aria-hidden="true"></i><a href="Tel:{{$front->phone}}"> {{$front->phone}} </a></li>
                                        <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:{{$front->email}}">{{$front->email}}</a></li>
                                        @if (Auth::check())
										<li><a class="login-btn-area" href="{{ route('logout') }}"><i class="fa fa-unlock" aria-hidden="true"></i> Sign out</a></li>
										@elseif(Auth::guard('teacher')->check())
											<li><a class="login-btn-area" href="{{ route('teacher.logout') }}"><i class="fa fa-unlock" aria-hidden="true"></i> Sign out</a></li>
										@else
										<li>
                                            <a class="login-btn-area" href="{{ route('userlogin') }}"><i class="fa fa-lock" aria-hidden="true"></i> Sign in</a>
                                        </li>
										<li><a href="{{ route('signup') }}" class="apply-now-btn2">Sign up</a></li>
										@endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-menu-area bg-primary" id="sticker">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <nav id="desktop-nav">
                                    <ul>
                                        <li class="@if(request()->path() == 'home' || request()->path() == '/') active @endif"><a href="{{ route('home') }}">Home</a></li>
                                        
										<li class="@if(request()->path() == 'news' || Request::is('news/*') ) active @endif"><a href="{{ route('news') }}">News</a></li>
                                        
										<li class="@if(request()->path() == 'events' || Request::is('events/*')) active @endif"><a href="{{ route('events') }}">Events</a></li>
										
										<li class="@if(request()->path() == 'FacultyMembers' || Request::is('FacultyMembers/*')) active @endif"><a href="{{ route('facultymembers') }}">Faculty members</a></li>
										
										
                                        <li class="@if(request()->path() == 'LabAssistance' ||  request()->path() == 'OfficeStuff' || request()->path() == 'ExecutiveBody' || Request::is('ExecutiveBody/*')) active @endif"><a>Other Members</a>
                                            <ul>
                                                <li class="@if(request()->path() == 'ExecutiveBody' || Request::is('ExecutiveBody/*')) active @endif"><a href="{{ route('executivebody') }}">executives body</a></li>
                                                <li class="@if(request()->path() == 'LabAssistance') active @endif"><a href="{{ route('labassistance') }}">Lab assistance</a></li>
                                                <li class="@if(request()->path() == 'OfficeStuff') active @endif"><a href="{{ route('officestuff') }}">office stuff</a></li>
                                            </ul>
                                        </li>
										
                                        <li class="@if(request()->path() == 'achievements' || Request::is('achievements/*')) active @endif"><a href="{{ route('achievements') }}">Achievements </a></li>                                      

										<li class="@if(request()->path() == 'committee' || Request::is('committee/*')) active @endif"><a href="{{ route('committee') }}">Archive </a></li>

									  <li class="@if(request()->path() == 'PhotoGallery' || Request::is('PhotoGallery/*')) active @endif"><a href="{{ route('photogallary') }}">Photo Gallery</a></li>
                                        
                                        <li class="@if(request()->path() == 'contact') active @endif"><a href="{{ route('contact') }}">Contact</a></li>
										
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            