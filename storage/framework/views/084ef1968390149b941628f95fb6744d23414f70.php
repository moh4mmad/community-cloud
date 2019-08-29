<div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul>
                                        <li class="<?php if(request()->path() == 'home' || request()->path() == '/'): ?> active <?php endif; ?>"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                                        
										<li class="<?php if(request()->path() == 'news'): ?> active <?php endif; ?>"><a href="<?php echo e(route('news')); ?>">News</a></li>
                                        
										<li class="<?php if(request()->path() == 'events'): ?> active <?php endif; ?>"><a href="<?php echo e(route('events')); ?>">Events</a></li>
										
										<li class="<?php if(request()->path() == 'faculty-members'): ?> active <?php endif; ?>"><a href="<?php echo e(route('facultymembers')); ?>">Faculty members</a></li>
										
										
                                        <li class="<?php if(request()->path() == 'lab-assistance' ||  request()->path() == 'office-stuff' || request()->path() == 'ExecutiveBody'): ?> active <?php endif; ?>"><a>Other Members</a>
                                            <ul>
                                                <li class="<?php if(request()->path() == 'ExecutiveBody'): ?> active <?php endif; ?>"><a href="<?php echo e(route('executivebody')); ?>">executives body</a></li>
                                                <li class="<?php if(request()->path() == 'lab-assistance'): ?> active <?php endif; ?>"><a href="<?php echo e(route('labassistance')); ?>">Lab assistance</a></li>
                                                <li class="<?php if(request()->path() == 'office-stuff'): ?> active <?php endif; ?>"><a href="<?php echo e(route('officestuff')); ?>">office stuff</a></li>
                                            </ul>
                                        </li>
										
                                        <li class="<?php if(request()->path() == 'achievements'): ?> active <?php endif; ?>"><a href="<?php echo e(route('achievements')); ?>">Achievements </a></li>                                      

										<li class="<?php if(request()->path() == 'committee'): ?> active <?php endif; ?>"><a href="<?php echo e(route('committee')); ?>">Committee </a></li>

									  <li class="<?php if(request()->path() == 'photo-gallary'): ?> active <?php endif; ?>"><a href="<?php echo e(route('photogallary')); ?>">Photo Gallery</a></li>
                                        
                                        <li class="<?php if(request()->path() == 'contact'): ?> active <?php endif; ?>"><a href="<?php echo e(route('contact')); ?>">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>