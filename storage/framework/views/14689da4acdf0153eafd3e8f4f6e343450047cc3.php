<?php $__env->startSection('title'); ?><?php echo e($details->title); ?> - <?php echo e($front->title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('og_title'); ?><?php echo e($details->title); ?> - <?php echo e($front->title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?><?php echo e(str_limit(strip_tags($details->content), 150)); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('og_description'); ?><?php echo e(str_limit(strip_tags($details->content), 150)); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('keyword'); ?><?php echo e($details->type); ?>, news, <?php echo e($front->keywords); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('og_image'); ?><?php if($details->image == null): ?> <?php echo e(asset('assets/img/no-image.png')); ?> <?php else: ?> <?php echo e(asset('assets/img/news/')); ?>/<?php echo e($details->image); ?> <?php endif; ?> <?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div id="wrapper">
        <header>
		<?php echo $__env->make('front.mainmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->make('front.mobilemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </header>
		
        <div class="inner-page-banner-area">
            <div class="container">
                <div class="pagination-area">
                    <h1>News details</h1>
                    <ul>
                        <li><a href="<?php echo e(route('home')); ?>">Home</a> -</li>
                        <li><a href="<?php echo e(route('news')); ?>">News</a> -</li>
                        <li>News details</li>
                    </ul>
                </div>
            </div>
        </div>
		

<?php
$date = \Carbon\Carbon::parse($details->date, 'UTC');
?>
        <div class="news-details-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                        <div class="row news-details-page-inner">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="news-img-holder">
                                    <img src="<?php if($details->image == null): ?> <?php echo e(asset('assets/img/no-image.png')); ?> <?php else: ?> <?php echo e(asset('assets/img/news/')); ?>/<?php echo e($details->image); ?> <?php endif; ?>" class="img-responsive" alt="research">
                                    <ul class="news-date1">
                                        <li><?php echo e($date->format('d')); ?> <?php echo e($date->format('M')); ?></li>
                                        <li><?php echo e($date->format('Y')); ?></li>
                                    </ul>
                                </div>
                                <h2 class="title-default-left-bold-lowhight"><a><?php echo e($details->title); ?></a></h2>
                                <ul class="title-bar-high news-comments">
                                    <li><a><i class="fa fa-user" aria-hidden="true"></i><span>By</span> <?php echo e($details->created_by); ?></a></li>
                                    <li><a><i class="fa fa-tags" aria-hidden="true"></i><?php echo e($details->type); ?></a></li>
                                </ul>
                                <p><?php echo $details->content; ?></p>
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
                                    <h3 class="sidebar-title">News</h3>
                                    <div class="sidebar-latest-research-area">
                                        <ul>
										<?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php
										$date = \Carbon\Carbon::parse($news1->created_at, 'UTC');
										?>
                                            <li>
                                                <div class="latest-research-img">
                                                    <a href="<?php echo e(route('news.details', $news1->id)); ?>"><img src="<?php if($news1->image == null): ?> <?php echo e(asset('assets/img/no-image.png')); ?> <?php else: ?> <?php echo e(asset('assets/img/news/')); ?>/<?php echo e($news1->image); ?> <?php endif; ?>" class="img-responsive" alt="skilled"></a>
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