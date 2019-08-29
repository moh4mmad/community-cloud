<?php $__env->startSection('title'); ?>Lab Assistance - <?php echo e($front->title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('og_title'); ?>Lab Assistance - <?php echo e($front->title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?><?php echo e($front->title); ?> - Lab Assistance <?php $__env->stopSection(); ?>
<?php $__env->startSection('og_description'); ?><?php echo e($front->title); ?> - Lab Assistance <?php $__env->stopSection(); ?>
<?php $__env->startSection('keyword'); ?>Lab Assistance, <?php echo e($front->keywords); ?><?php $__env->stopSection(); ?>
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
                    <h1>Lab assistance</h1>
                    <ul>
                        <li><a href="<?php echo e(route('home')); ?>">Home</a> -</li>
                        <li>Lab assistance</li>
                    </ul>
                </div>
            </div>
        </div>
		
        <div class="lecturers-page1-area">
            <div class="container">
                <div class="row">
				<?php if(sizeof($members) == 0): ?>
					<div class="alert alert-danger" role="alert">No data available!</div>
				<?php endif; ?>
				<?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="single-item">
                            <div class="lecturers1-item-wrapper">
                                <div class="lecturers-img-wrapper">
                                    <img style="position: relative;width: 360px;height: 240px;" class="img-responsive" src="<?php if($member->image == null): ?> <?php echo e(asset('assets/img/no-image.png')); ?> <?php else: ?> <?php echo e(asset('assets/img/members/')); ?>/<?php echo e($member->image); ?> <?php endif; ?>" alt="">
                                </div>
                                <div class="lecturers-content-wrapper">
                                    <h3 class="item-title"><?php echo e($member->name); ?></h3>
                                    <span class="item-designation"><?php echo e($member->position); ?></span>
									<p>Phone: <?php echo e($member->phone); ?><br>Email: <?php echo e($member->email); ?></p>
									
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