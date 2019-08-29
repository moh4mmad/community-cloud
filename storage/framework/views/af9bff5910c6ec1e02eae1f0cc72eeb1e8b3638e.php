<?php $__env->startSection('title'); ?>Registraion - <?php echo e($details->title); ?> - <?php echo e($front->title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('og_title'); ?>Registraion - <?php echo e($details->title); ?> - <?php echo e($front->title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?><?php echo e(str_limit(strip_tags($details->content), 150)); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('og_description'); ?><?php echo e(str_limit(strip_tags($details->content), 150)); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('keyword'); ?>registraion,events, <?php echo e($front->keywords); ?><?php $__env->stopSection(); ?>
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
                    <h1>Registraion - <?php echo e($details->title); ?></h1>
                    <ul>
                        <li><a href="<?php echo e(route('home')); ?>">Home</a> -</li>
                        <li>Registraion</li>
                    </ul>
                </div>
            </div>
        </div>
		
		<?php if(\Carbon\Carbon::parse($details->deadline) < \Carbon\Carbon::now()): ?>
			<div class="event-page-area">
			<div class="container">
			<div class="row">
		    <div class="col-lg-12 col-md-9 col-sm-8 col-xs-12">
			<div class="row event-inner-wrapper">
			<div class="alert alert-danger text-center" role="alert"><h3>Registration closed!</h3></div>
			</div>
			</div>
			</div>
			</div>
			</div>
		<?php endif; ?>
		<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>