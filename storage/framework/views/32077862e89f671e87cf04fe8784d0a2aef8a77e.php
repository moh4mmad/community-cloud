<div class="lecturers-area">
            <div class="container">
                <h2 class="title-default-left">Faculty Members</h2>
            </div>
            <div class="container">
                <div class="rc-carousel" data-loop="true" data-items="4" data-margin="30" data-autoplay="true" data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="3" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="4" data-r-medium-nav="true" data-r-medium-dots="false" data-r-large="4" data-r-large-nav="true" data-r-large-dots="false">
				<?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="single-item">
                        <div class="lecturers1-item-wrapper">
                            <div class="lecturers-img-wrapper">
                                <a href="<?php echo e(route('facultymembers.details', $member->id)); ?>"><img style="position: relative;width: 280px;height: 200px;" src="<?php echo e(asset('assets/img/members/')); ?>/<?php echo e($member->image); ?>" alt="team"></a>
                            </div>
                            <div class="lecturers-content-wrapper">
                                <h3 style="font-size: 16px;" class="item-title"><a href="<?php echo e(route('facultymembers.details', $member->id)); ?>"><?php echo e($member->name); ?></a></h3>
                                <span class="item-designation"><?php echo e($member->position); ?></span>
                                <ul class="lecturers-social">
                                    <li><a href="Tel:<?php echo e($member->phone); ?>"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
                                    <li><a href="mailto:<?php echo e($member->email); ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
                                    <li><a target="_blank" href="<?php echo e($member->linkedin_url); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a arget="_blank" href="<?php echo e($member->fb_url); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
            </div>
        </div>