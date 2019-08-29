<?php $__env->startSection('title'); ?><?php echo e($folder->name); ?> - <?php echo e($front->title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('og_title'); ?><?php echo e($folder->name); ?> - <?php echo e($front->title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?><?php echo e($front->title); ?> - <?php echo e($folder->name); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('og_description'); ?><?php echo e($front->title); ?> - <?php echo e($folder->name); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('keyword'); ?><?php echo e($folder->name); ?>, <?php echo e($front->keywords); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('og_image'); ?><?php if($folder->image == null): ?> <?php echo e(asset('assets/img/gallary.png')); ?> <?php else: ?> <?php echo e(asset('assets/img/gallery/')); ?>/<?php echo e($folder->image); ?> <?php endif; ?> <?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div id="wrapper">
        <header>
		<?php echo $__env->make('front.mainmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		<?php echo $__env->make('front.mobilemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </header>
		
        <div class="inner-page-banner-area">
            <div class="container">
                <div class="pagination-area">
                    <h1><?php echo e($folder->name); ?></h1>
                    <ul>
                        <li><a href="<?php echo e(route('home')); ?>">Home</a> -</li>
                        <li><a href="<?php echo e(route('photogallary')); ?>">Photo gallary</a> -</li>
                        <li><?php echo e($folder->name); ?></li>
                    </ul>
                </div>
            </div>
        </div>
		
		
        <div class="gallery-area2">
            <div class="container" id="inner-isotope">
                <div class="row featuredContainer gallery-wrapper">
				<?php if(sizeof($images) == 0): ?>
					<div class="alert alert-danger" role="alert">No image available!</div>
				<?php endif; ?>
				<?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="gallery-box">
                            <img src="<?php echo e(asset('assets/img/gallery/')); ?>/<?php echo e($image->img_url); ?>" class="img-responsive" alt="gallery">
                            <div class="gallery-content">
                                <a href="<?php echo e(asset('assets/img/gallery/')); ?>/<?php echo e($image->img_url); ?>" class="zoom"><i class="fa fa-link" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        
	 
</div>
<?php $__env->stopSection(); ?>	
<?php echo $__env->make('front.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>