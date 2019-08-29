
        <!-- Lecturers Area Start Here -->
        <div class="lecturers-area">
            <div class="container">
                <h2 class="title-default-left">Executive Body</h2>
            </div>
            <div class="container">
                <div class="rc-carousel" data-loop="true" data-items="4" data-margin="30" data-autoplay="true" data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="3" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="4" data-r-medium-nav="true" data-r-medium-dots="false" data-r-large="4" data-r-large-nav="true" data-r-large-dots="false">
				<?php $__currentLoopData = $executivebody; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $executive): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="single-item">
                        <div class="lecturers1-item-wrapper">
                            <div class="lecturers-img-wrapper">
                                <a href="#"><img class="img-responsive" src="<?php echo e(asset('assets/img/executivebody/')); ?>/<?php echo e($executive->image); ?>" alt="team"></a>
                            </div>
                            <div class="lecturers-content-wrapper">
                                <h3 class="item-title"><a href="#"><?php echo e($executive->name); ?></a></h3>
                                <span class="item-designation"><?php echo e($executive->position); ?></span>
                                <ul class="lecturers-social">
                                    <li><a href="Tel:<?php echo e($executive->phone); ?>"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
                                    <li><a href="mailto:<?php echo e($executive->email); ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
                                    <li><a target="_blank" href="<?php echo e($executive->linkedin_url); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a arget="_blank" href="<?php echo e($executive->fb_url); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
            </div>
        </div>
        <!-- Lecturers Area End Here -->
       