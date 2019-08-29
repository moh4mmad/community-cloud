
            <div id="header2" class="header4-area">
                <div class="header-top-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="header-top-left">
                                    <div class="logo-area">
                                        <a href="<?php echo e(route('home')); ?>"><img class="img-responsive" src="<?php echo e(asset('assets/img/logo.png')); ?>" alt="logo"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <div class="header-top-right">
                                    <ul>
                                        <li><i class="fa fa-phone" aria-hidden="true"></i><a href="Tel:<?php echo e($front->phone); ?>"> <?php echo e($front->phone); ?> </a></li>
                                        <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:<?php echo e($front->email); ?>"><?php echo e($front->email); ?></a></li>
                                        <?php if(Auth::check()): ?>
										<li><a class="login-btn-area" href="<?php echo e(route('logout')); ?>"><i class="fa fa-unlock" aria-hidden="true"></i> Sign out</a></li>
										<?php elseif(Auth::guard('teacher')->check()): ?>
											<li><a class="login-btn-area" href="<?php echo e(route('teacher.logout')); ?>"><i class="fa fa-unlock" aria-hidden="true"></i> Sign out</a></li>
										<?php else: ?>
										<li>
                                            <a class="login-btn-area" href="<?php echo e(route('userlogin')); ?>"><i class="fa fa-lock" aria-hidden="true"></i> Sign in</a>
                                        </li>
										<li><a href="<?php echo e(route('signup')); ?>" class="apply-now-btn2">Sign up</a></li>
										<?php endif; ?>
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
                                        <li class="<?php if(request()->path() == 'home' || request()->path() == '/'): ?> active <?php endif; ?>"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                                        
										<li class="<?php if(request()->path() == 'news' || Request::is('news/*') ): ?> active <?php endif; ?>"><a href="<?php echo e(route('news')); ?>">News</a></li>
                                        
										<li class="<?php if(request()->path() == 'events' || Request::is('events/*')): ?> active <?php endif; ?>"><a href="<?php echo e(route('events')); ?>">Events</a></li>
										
										<li class="<?php if(request()->path() == 'FacultyMembers' || Request::is('FacultyMembers/*')): ?> active <?php endif; ?>"><a href="<?php echo e(route('facultymembers')); ?>">Faculty members</a></li>
										
										
                                        <li class="<?php if(request()->path() == 'LabAssistance' ||  request()->path() == 'OfficeStuff' || request()->path() == 'ExecutiveBody' || Request::is('ExecutiveBody/*')): ?> active <?php endif; ?>"><a>Other Members</a>
                                            <ul>
                                                <li class="<?php if(request()->path() == 'ExecutiveBody' || Request::is('ExecutiveBody/*')): ?> active <?php endif; ?>"><a href="<?php echo e(route('executivebody')); ?>">executives body</a></li>
                                                <li class="<?php if(request()->path() == 'LabAssistance'): ?> active <?php endif; ?>"><a href="<?php echo e(route('labassistance')); ?>">Lab assistance</a></li>
                                                <li class="<?php if(request()->path() == 'OfficeStuff'): ?> active <?php endif; ?>"><a href="<?php echo e(route('officestuff')); ?>">office stuff</a></li>
                                            </ul>
                                        </li>
										
                                        <li class="<?php if(request()->path() == 'achievements' || Request::is('achievements/*')): ?> active <?php endif; ?>"><a href="<?php echo e(route('achievements')); ?>">Achievements </a></li>                                      

										<li class="<?php if(request()->path() == 'committee' || Request::is('committee/*')): ?> active <?php endif; ?>"><a href="<?php echo e(route('committee')); ?>">Archive </a></li>

									  <li class="<?php if(request()->path() == 'PhotoGallery' || Request::is('PhotoGallery/*')): ?> active <?php endif; ?>"><a href="<?php echo e(route('photogallary')); ?>">Photo Gallery</a></li>
                                        
                                        <li class="<?php if(request()->path() == 'contact'): ?> active <?php endif; ?>"><a href="<?php echo e(route('contact')); ?>">Contact</a></li>
										
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            