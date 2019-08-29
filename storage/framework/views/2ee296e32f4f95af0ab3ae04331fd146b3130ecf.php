<?php $__env->startSection('title'); ?>Upload Resources - <?php echo e($front->title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('og_title'); ?>Upload Resources - <?php echo e($front->title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?><?php echo e($front->title); ?> - Upload Resources <?php $__env->stopSection(); ?>
<?php $__env->startSection('og_description'); ?><?php echo e($front->title); ?> - Upload Resources <?php $__env->stopSection(); ?>
<?php $__env->startSection('keyword'); ?>Upload, <?php echo e($front->keywords); ?><?php $__env->stopSection(); ?>
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
                    <h1>Upload Resources</h1>
                    <ul>
                        <li><a href="<?php echo e(route('home')); ?>">Home</a> -</li>
                        <li>Upload Resources</li>
                    </ul>
                </div>
            </div>
        </div>
		
		
        <div class="section-space accent-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <ul class="profile-title">
                            <li><a href="<?php echo e(route('teacher.resources')); ?>" >Resources</a></li>
							<li class="active"><a href="<?php echo e(route('teacher.resources.upload')); ?>" >Upload resource</a></li>
							<li><a href="<?php echo e(route('teacher.profile')); ?>">Profile</a></li>
                            <li><a href="<?php echo e(route('teacher.logout')); ?>">Sign out</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                            <div class="profile-details tab-content">
                                <div class="tab-pane fade active in">
									<h3 class="title-section title-bar-high mb-40">Upload Resources</h3>
									
			<?php if(session('success')): ?>
		<div class="alert alert-success" role="alert"><?php echo e(session('success')); ?></div>
		<?php endif; ?>
		
		<?php if(session('alert')): ?>
		<div class="alert alert-danger" role="alert"><?php echo e(session('alert')); ?></div>
		<?php endif; ?>

		<?php if($errors->any()): ?>
			<div class="alert alert-danger" role="alert">
			<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php echo e($error); ?> <br>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
		<?php endif; ?>
		                        <div class="personal-info">
									<form class="form-horizontal" enctype="multipart/form-data" action="<?php echo e(route('teacher.resources.up')); ?>" method="post">
									
									<?php echo e(csrf_field()); ?>

									<div class="form-group">
                                            <label class="col-sm-3 control-label">Description</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" name="description" rows="5"></textarea>
                                            </div>
                                        </div>
									
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">File</label>
                                            <div class="col-sm-9 public-profile-content">
                                                <input type="file" name="attachment" id="input-file-now" data-height="150" class="dropify">
                                            
											<div class="file-size"><?php echo e($folder->allowed_file); ?> allowed, Max size <?php echo e($folder->max_size); ?> KB</div>
											</div>
                                        </div>
										
										
									
									
                                        <div class="form-group mb-none">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button class="view-all-accent-btn disabled col-sm-9" type="submit">Save</button>
                                            </div>
                                        </div>
									</form>
                                    </div>
                                
								 </div>
                             </div>
                    </div>
                </div>
            </div>
        </div>
	 
</div>
<?php $__env->stopSection(); ?>	
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('assets/vendor/dropify/css/dropify.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/vendor/dropify/js/dropify.min.js')); ?>"></script>
<script>
$('.dropify').dropify({
    messages: {
        'default': 'Drag and drop a file here or click',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Remove',
        'error':   'Ooops, something wrong happended.'
    }
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>