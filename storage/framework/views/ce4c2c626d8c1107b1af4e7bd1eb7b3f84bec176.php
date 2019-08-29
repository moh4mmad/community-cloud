<?php $__env->startSection('title'); ?>Photo gallary - <?php echo e($front->title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('og_title'); ?>Photo gallary - <?php echo e($front->title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?><?php echo e($front->title); ?> - Photo gallary <?php $__env->stopSection(); ?>
<?php $__env->startSection('og_description'); ?><?php echo e($front->title); ?> - Photo gallary <?php $__env->stopSection(); ?>
<?php $__env->startSection('keyword'); ?>photo,gallary, <?php echo e($front->keywords); ?><?php $__env->stopSection(); ?>
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
                    <h1>Photo gallary</h1>
                    <ul>
                        <li><a href="<?php echo e(route('home')); ?>">Home</a> -</li>
                        <li>Photo gallary</li>
                    </ul>
                </div>
            </div>
        </div>
		
		
        <div class="courses-page-area2">
            <div class="container" id="inner-isotope">
			   <div class="row featuredContainer">
			   <?php if(sizeof($folders) == 0): ?>
					<div class="alert alert-danger" role="alert">No data available!</div>
				<?php endif; ?>
			<?php $__currentLoopData = $folders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $folder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="courses-box1">
                            <div class="single-item-wrapper">
                                <div class="courses-img-wrapper hvr-bounce-to-bottom">
                                    <img style="position: relative;width: 360px;height: 180px;" class="img-responsive" src="<?php if($folder->image == null): ?> <?php echo e(asset('assets/img/gallary.png')); ?> <?php else: ?> <?php echo e(asset('assets/img/gallery/')); ?>/<?php echo e($folder->image); ?> <?php endif; ?>" alt="courses">
                                    <a href="<?php echo e(route('photogallary.view', $folder->id)); ?>"><i class="fa fa-link" aria-hidden="true"></i></a>
                                </div>
                                <div class="courses-content-wrapper">
                                    <h3 style="font-size: 15px;" class="item-title"><a href="<?php echo e(route('photogallary.view', $folder->id)); ?>"><b><?php echo e($folder->name); ?></b></a></h3>
                                    <p style="color: #002147;font-weight: 500;font-size: 15px;margin-bottom: 10px;" class="item-content"><?php echo e($folder->Images->count()); ?> photos</p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <?php echo e($folders->render()); ?>

                            </div>
            </div>
		</div>
        </div>
	 
</div>
<?php $__env->stopSection(); ?>	
<?php echo $__env->make('front.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>