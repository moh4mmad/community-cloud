<?php $__env->startSection('title'); ?>Events - <?php echo e($front->title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('og_title'); ?>Events - <?php echo e($front->title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?><?php echo e($front->title); ?> - Events <?php $__env->stopSection(); ?>
<?php $__env->startSection('og_description'); ?><?php echo e($front->title); ?> - Events <?php $__env->stopSection(); ?>
<?php $__env->startSection('keyword'); ?>events, <?php echo e($front->keywords); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('og_image'); ?><?php echo e($front->og_img); ?><?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div id="wrapper">
        <header>
		<?php echo $__env->make('front.mainmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->make('front.mobilemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </header>
		
        <div class="inner-page-banner-area">
            <div class="container">
                <div class="pagination-area">
                    <h1>Events</h1>
                    <ul>
                        <li><a href="<?php echo e(route('home')); ?>">Home</a> -</li>
                        <li>Events</li>
                    </ul>
                </div>
            </div>
        </div>
		
        <div class="event-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                        <div class="row event-inner-wrapper">
						<?php if(sizeof($events) == 0): ?>
					<div class="alert alert-danger" role="alert">No data available!</div>
				<?php endif; ?>
						<?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php
						$date = \Carbon\Carbon::parse($event->date, 'UTC');
						?>
                            <div class="col-lg-12 col-md-6 col-sm-12 col-xs-6">
                                <div class="single-item">
                                    <div class="item-img">
                                        <a href="<?php echo e(route('event.details', $event->id)); ?>"><img src="<?php echo e(asset('assets/img/event/')); ?>/<?php echo e($event->image); ?>" alt="event" class="img-responsive"></a>
                                    </div>
                                    <div class="item-content">
                                        <h3 class="sidebar-title"><a href="<?php echo e(route('event.details', $event->id)); ?>"><?php echo e($event->title); ?></a></h3>
                                        <p><?php echo e(str_limit(strip_tags($event->content), 150)); ?></p>
                                        <ul class="event-info-block">
                                            <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo e($date->format('d')); ?> <?php echo e($date->format('M')); ?>, <?php echo e($date->format('Y')); ?></li>
                                            <li><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo e($event->location); ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							
                            </div>
							
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <?php echo e($events->render()); ?>

                            </div>
                        </div>
                    
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="sidebar">
                            <div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                    <h3 class="sidebar-title">Search event</h3>
                                    <div class="sidebar-find-course">
                                        <form id="checkout-form">
                                            <div class="form-group course-name">
                                                <input id="first-name" placeholder="Type Here . . .." class="form-control" type="text" />
                                            </div>
                                            <div class="form-group">
                                                <button class="sidebar-search-btn-full disabled" type="submit" value="Login">Search</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
							<div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                    <h3 class="sidebar-title">News</h3>
                                    <div class="sidebar-latest-research-area">
                                        <ul>
										<?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php
										$date = \Carbon\Carbon::parse($news1->created_at, 'UTC');
										?>
                                            <li>
                                                <div class="latest-research-img">
                                                    <a href="#"><img src="<?php if($news1->image == null): ?> <?php echo e(asset('assets/img/no-image.png')); ?> <?php else: ?> <?php echo e(asset('assets/img/news/')); ?>/<?php echo e($news1->image); ?> <?php endif; ?>" class="img-responsive" alt="skilled"></a>
                                                </div>
                                                <div class="latest-research-content">
                                                    <h4><?php echo e($date->format('d')); ?> <?php echo e($date->format('M')); ?>, <?php echo e($date->format('Y')); ?></h4>
                                                    <p><?php echo e($news1->title); ?></p>
                                                </div>
                                            </li>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
							
                        </div>
                    </div>
                </div>
            </div>
        </div>
	 
</div>
<?php $__env->stopSection(); ?>	
<?php echo $__env->make('front.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>