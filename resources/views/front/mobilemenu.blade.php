<div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul>
                                        <li class="@if(request()->path() == 'home' || request()->path() == '/') active @endif"><a href="{{ route('home') }}">Home</a></li>
                                        
										<li class="@if(request()->path() == 'news') active @endif"><a href="{{ route('news') }}">News</a></li>
                                        
										<li class="@if(request()->path() == 'events') active @endif"><a href="{{ route('events') }}">Events</a></li>
										
										<li class="@if(request()->path() == 'faculty-members') active @endif"><a href="{{ route('facultymembers') }}">Faculty members</a></li>
										
										
                                        <li class="@if(request()->path() == 'lab-assistance' ||  request()->path() == 'office-stuff' || request()->path() == 'ExecutiveBody') active @endif"><a>Other Members</a>
                                            <ul>
                                                <li class="@if(request()->path() == 'ExecutiveBody') active @endif"><a href="{{ route('executivebody') }}">executives body</a></li>
                                                <li class="@if(request()->path() == 'lab-assistance') active @endif"><a href="{{ route('labassistance') }}">Lab assistance</a></li>
                                                <li class="@if(request()->path() == 'office-stuff') active @endif"><a href="{{ route('officestuff') }}">office stuff</a></li>
                                            </ul>
                                        </li>
										
                                        <li class="@if(request()->path() == 'achievements') active @endif"><a href="{{ route('achievements') }}">Achievements </a></li>                                      

										<li class="@if(request()->path() == 'committee') active @endif"><a href="{{ route('committee') }}">Committee </a></li>

									  <li class="@if(request()->path() == 'photo-gallary') active @endif"><a href="{{ route('photogallary') }}">Photo Gallery</a></li>
                                        
                                        <li class="@if(request()->path() == 'contact') active @endif"><a href="{{ route('contact') }}">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>