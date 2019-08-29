<?php $__env->startSection('title'); ?>404 Page not found - <?php echo e($front->title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('og_title'); ?>404 Page not found - <?php echo e($front->title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?><?php echo e($front->title); ?> - 404 Page not found <?php $__env->stopSection(); ?>
<?php $__env->startSection('og_description'); ?><?php echo e($front->title); ?> - 404 Page not found <?php $__env->stopSection(); ?>
<?php $__env->startSection('keyword'); ?>404, <?php echo e($front->keywords); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('og_image'); ?><?php echo e($front->og_img); ?><?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div id="wrapper">
        <header>
		<?php echo $__env->make('front.mainmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->make('front.mobilemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </header>

		<div class="error-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="error-top">
                            <img src="<?php echo e(asset('assets/img/404.png')); ?>" class="img-responsive" alt="404">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="error-bottom">
                            <h2>Sorry!!! Page Was Not Found</h2>
                            <p>The page you are looking is not available or has been removed. Try going to Home Page by using the button below.</p>
                            <a href="<?php echo e(route('home')); ?>" class="default-white-btn">Go To Home Page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
</div>
<?php $__env->stopSection(); ?>	
<?php echo $__env->make('front.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>