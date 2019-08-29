<?php $__env->startSection('title'); ?>Faculty members - <?php echo e($front->title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('og_title'); ?>Faculty members - <?php echo e($front->title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?><?php echo e($front->title); ?> - Faculty members <?php $__env->stopSection(); ?>
<?php $__env->startSection('og_description'); ?><?php echo e($front->title); ?> - Faculty members <?php $__env->stopSection(); ?>
<?php $__env->startSection('keyword'); ?>Faculty members, <?php echo e($front->keywords); ?><?php $__env->stopSection(); ?>
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
                    <h1>Faculty members</h1>
                    <ul>
                        <li><a href="<?php echo e(route('home')); ?>">Home</a> -</li>
                        <li>Faculty members</li>
                    </ul>
                </div>
            </div>
        </div>
		
        <div class="lecturers-page2-area">
            <div class="container" id="inner-isotope">
                <div class="row featuredContainer">
				<?php if(sizeof($members) == 0): ?>
					<div class="alert alert-danger" role="alert">No data available!</div>
				<?php endif; ?>
				<?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 diploma cse">
                        <div class="single-item">
                            <div class="lecturers-item-wrapper">
                                <a href="<?php echo e(route('facultymembers.details', $member->id)); ?>"><img style="position: relative;width: 360px;height: 240px;" class="img-responsive" src="<?php echo e(asset('assets/img/members/')); ?>/<?php echo e($member->image); ?>" alt=""></a>
                                <div class="lecturers-content-wrapper">
                                    <h3><a href="<?php echo e(route('facultymembers.details', $member->id)); ?>"><?php echo e($member->name); ?></a></h3>
                                    <span><?php echo e($member->position); ?></span>
                                    <ul class="lecturers-social">
                                        <li><a href="Tel:<?php echo e($member->phone); ?>"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
                                    <li><a href="mailto:<?php echo e($member->email); ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
                                    <li><a target="_blank" href="<?php echo e($member->linkedin_url); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a target="_blank" href="<?php echo e($member->fb_url); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					    <?php echo e($members->render()); ?>

					  </div>
                    </div>
                </div>
            </div>
	 
</div>
<?php $__env->stopSection(); ?>	
<?php echo $__env->make('front.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>