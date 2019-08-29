<?php $__env->startSection('title'); ?>Achievements - <?php echo e($front->title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('og_title'); ?>Achievements - <?php echo e($front->title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?><?php echo e($front->title); ?> - Achievements <?php $__env->stopSection(); ?>
<?php $__env->startSection('og_description'); ?><?php echo e($front->title); ?> - Achievements <?php $__env->stopSection(); ?>
<?php $__env->startSection('keyword'); ?>Achievements, <?php echo e($front->keywords); ?><?php $__env->stopSection(); ?>
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
                    <h1>Achievements</h1>
                    <ul>
                        <li><a href="<?php echo e(route('home')); ?>">Home</a> -</li>
                        <li>Achievements</li>
                    </ul>
                </div>
            </div>
        </div>
		
        <div class="research-page1-area">
            <div class="container">
                <div class="row">
				<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
				<div class="row">
				<?php if(sizeof($achievements) == 0): ?>
					<div class="alert alert-danger" role="alert">No data available!</div>
				<?php endif; ?>
				<?php $__currentLoopData = $achievements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $achievement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="research-box1">
                                    <img style="position: relative;width: 360px;height: 220px;" src="<?php echo e(asset('assets/img/achievements/')); ?>/<?php echo e($achievement->image); ?>" class="img-responsive" alt="research">
                                    <h3 class="sidebar-title"><a href="<?php echo e(route('achievements.details', $achievement->id)); ?>"><?php echo e($achievement->title); ?></a></h3>
                                    <p><?php echo e(str_limit(strip_tags($achievement->content), 150)); ?></p>
                                </div>
                            </div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					    <?php echo e($achievements->render()); ?>

					  </div>
                    </div>
                </div>
				
				<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="sidebar">
                            <div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                    <h3 class="sidebar-title">Search achievement</h3>
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
                                    <h3 class="sidebar-title">Events</h3>
                                    <div class="sidebar-latest-research-area">
                                        <ul>
										<?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php
										$date = \Carbon\Carbon::parse($event->date, 'UTC');
										?>
                                            <li>
                                                <div class="latest-research-img">
                                                    <a href="<?php echo e(route('event.details', $event->id)); ?>"><img src="<?php echo e(asset('assets/img/event/')); ?>/<?php echo e($event->image); ?>" class="img-responsive" alt="skilled"></a>
                                                </div>
                                                <div class="latest-research-content">
                                                    <h4><?php echo e($date->format('d')); ?> <?php echo e($date->format('M')); ?>, <?php echo e($date->format('Y')); ?></h4>
                                                    <p><?php echo e($event->title); ?></p>
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