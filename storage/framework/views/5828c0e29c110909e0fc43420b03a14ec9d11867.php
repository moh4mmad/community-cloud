<?php $__env->startSection('title'); ?><?php echo e($details->title); ?> - <?php echo e($front->title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('og_title'); ?><?php echo e($details->title); ?> - <?php echo e($front->title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?><?php echo e(str_limit(strip_tags($details->content), 150)); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('og_description'); ?><?php echo e(str_limit(strip_tags($details->content), 150)); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('keyword'); ?>events, <?php echo e($front->keywords); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('og_image'); ?><?php echo e(asset('assets/img/event/')); ?>/<?php echo e($details->image); ?><?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div id="wrapper">
        <header>
		<?php echo $__env->make('front.mainmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->make('front.mobilemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </header>
		
        <div class="inner-page-banner-area">
            <div class="container">
                <div class="pagination-area">
                    <h1>Event details</h1>
                    <ul>
                        <li><a href="<?php echo e(route('home')); ?>">Home</a> -</li>
                        <li><a href="<?php echo e(route('events')); ?>">Events</a> -</li>
                        <li>Event details</li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="event-details-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                        <div class="event-details-inner">
                            <div class="event-details-img">
                                <div class="countdown-content">
                                    <div id="countdown"></div>
                                </div>
                                <a><img src="<?php echo e(asset('assets/img/event/')); ?>/<?php echo e($details->image); ?>" alt="event" class="img-responsive"></a>
                            </div>
                            <h2 class="title-default-left-bold-lowhight"><a><?php echo e($details->title); ?></a></h2>
                            <ul class="event-info-inline title-bar-sm-high">
                                <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo e(\Carbon\Carbon::parse($details->date, 'UTC')->format('d M, Y')); ?></li>
                                <li><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo e($details->location); ?></li>
                            </ul>
							
							
							<div class="box box-border page-row">
    <ul class="list-unstyled">
        <li><strong>Time:</strong> <?php echo e($details->start_time); ?> - <?php echo e($details->end_time); ?></li>
        <li><strong>Date:</strong> <?php echo e(\Carbon\Carbon::parse($details->date, 'UTC')->format('d M, Y')); ?></li>
        <?php if($details->type == "individual"): ?>
		<li><strong>Participant type:</strong> Individual</li>
        <?php else: ?>
		<li><strong>Participant type:</strong> Team</li>
        <li><strong>Maximum member:</strong> <?php echo e($details->max_member); ?></li>
		<?php endif; ?>
		<li><strong>Registration Fee:</strong> <?php echo e($details->reg_fee); ?></li>
		<li><strong>Payment method:</strong> <?php echo e($details->payment_method); ?></li>
        <li><strong>Payment number:</strong> <?php echo e($details->payment_number); ?></li>
        <li><strong>Registration Deadline:</strong> <?php echo e(\Carbon\Carbon::parse($details->deadline, 'UTC')->format('d M, Y, h:i A')); ?></li>
		<li><strong>Registration Now:</strong> <a href="<?php echo e(route('event.reg', $details->id)); ?>">Click here</a></li>

    </ul>
</div>
              <p><?php echo $details->content; ?></p>
			  <div class="news-details-page-inner">
			  <ul class="news-social">
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                </ul>
			  </div>
                            </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="sidebar">
                            <div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                    <h3 class="sidebar-title">Search</h3>
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
<?php $__env->startSection('script'); ?>
<script>
$('#countdown').countdown('<?php echo e(\Carbon\Carbon::parse($details->date, 'UTC')->format('Y/m/d')); ?>', function(e) {

        $(this).html(e.strftime("<div class='countdown-section'><h3>%D</h3> <p>Day%!D</p> </div><div class='countdown-section'><h3>%H</h3> <p>Hour%!H</p> </div><div class='countdown-section'><h3>%M</h3> <p>Minute%!M</p> </div><div class='countdown-section'><h3>%S</h3> <p>Second%!S</p> </div>"));
    });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>