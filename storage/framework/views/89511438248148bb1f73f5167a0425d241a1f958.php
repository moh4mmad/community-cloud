<?php $__env->startSection('title'); ?>News - <?php echo e($front->title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('og_title'); ?>News - <?php echo e($front->title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?><?php echo e($front->title); ?> - News <?php $__env->stopSection(); ?>
<?php $__env->startSection('og_description'); ?><?php echo e($front->title); ?> - News <?php $__env->stopSection(); ?>
<?php $__env->startSection('keyword'); ?>news, <?php echo e($front->keywords); ?><?php $__env->stopSection(); ?>
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
                    <h1>News</h1>
                    <ul>
                        <li><a href="<?php echo e(route('home')); ?>">Home</a> -</li>
                        <li>News</li>
                    </ul>
                </div>
            </div>
        </div>
		
		
        <div class="news-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                        <div class="row">
						<?php if(sizeof($news) == 0): ?>
					<div class="alert alert-danger" role="alert">No data available!</div>
				<?php endif; ?>
						<?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php
						$date = \Carbon\Carbon::parse($news1->created_at, 'UTC');
						?>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="news-box">
                                    <div class="news-img-holder">
                                        <img style="position: relative;width: 360px;height: 250px;" src="<?php if($news1->image == null): ?> <?php echo e(asset('assets/img/no-image.png')); ?> <?php else: ?> <?php echo e(asset('assets/img/news/')); ?>/<?php echo e($news1->image); ?> <?php endif; ?>" class="img-responsive" alt="news">
                                        <ul class="news-date2">
                                            <li><?php echo e($date->format('d')); ?> <?php echo e($date->format('M')); ?></li>
                                            <li><?php echo e($date->format('Y')); ?></li>
                                        </ul>
                                    </div>
                                    <h3 class="title-news-left-bold"><a href="<?php echo e(route('news.details', $news1->id)); ?>"><?php echo e($news1->title); ?></a></h3>
                                    <ul class="title-bar-high news-comments">
                                        <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i><span>By</span> <?php echo e($news1->created_by); ?></a></li>
                                        <li><a href="#"><i class="fa fa-tags" aria-hidden="true"></i><?php echo e($news1->type); ?></a></li>
                                    </ul>
                                    <p><?php echo e(str_limit(strip_tags($news1->content), 150)); ?></p>
                                </div>
                            </div>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <?php echo e($news->render()); ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="sidebar">
                            <div class="sidebar-box">
                                <div class="sidebar-box-inner">
                                    <h3 class="sidebar-title">Search news</h3>
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