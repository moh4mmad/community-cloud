<div class="courses1-area">
            <div class="container">
                <h2 class="title-default-left">Latest News</h2>
            </div>
            <div class="container">
                <div class="rc-carousel" data-loop="true" data-items="4" data-margin="30" data-autoplay="true" data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="2" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="4" data-r-medium-nav="true" data-r-medium-dots="false" data-r-large="4" data-r-large-nav="true" data-r-large-dots="false">
                    <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php
					$date = \Carbon\Carbon::parse($news1->created_at, 'UTC');
					$date =  $date->format('M d,Y, h:m a');
					?>
					<div class="courses-box1">
                        <div class="single-item-wrapper">
                            <div class="courses-img-wrapper hvr-bounce-to-bottom">
                                <img style="position: relative;width: 300px;height: 200px;" src="<?php if($news1->image == null): ?> <?php echo e(asset('assets/img/no-image.png')); ?> <?php else: ?> <?php echo e(asset('assets/img/news/')); ?>/<?php echo e($news1->image); ?> <?php endif; ?>" alt="courses">
                                <a href="<?php echo e(route('news.details', $news1->id)); ?>"><i class="fa fa-link" aria-hidden="true"></i></a>
                            </div>
                            <div class="courses-content-wrapper">
                                <h3 style="font-size: 18px;" class="item-title"><a href="<?php echo e(route('news.details', $news1->id)); ?>"><?php echo e($news1->title); ?></a></h3>
								<div style="font-size: 13px;margin: 5px 0;font-weight: 500;color: #000000;"><?php echo e($date); ?></div>
                                <p class="item-content"><?php echo e(str_limit(strip_tags($news1->content), 80)); ?></p>
                                
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
		