<?php $__env->startSection('title'); ?>Profile - <?php echo e($front->title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('og_title'); ?>Profile - <?php echo e($front->title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?><?php echo e($front->title); ?> - Profile <?php $__env->stopSection(); ?>
<?php $__env->startSection('og_description'); ?><?php echo e($front->title); ?> - Profile <?php $__env->stopSection(); ?>
<?php $__env->startSection('keyword'); ?>Profile, <?php echo e($front->keywords); ?><?php $__env->stopSection(); ?>
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
                    <h1>Profile</h1>
                    <ul>
                        <li><a href="<?php echo e(route('home')); ?>">Home</a> -</li>
                        <li>Profile</li>
                    </ul>
                </div>
            </div>
        </div>
		
		
        <div class="section-space accent-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <ul class="profile-title">
                            <li><a href="<?php echo e(route('resources')); ?>" >Resources</a></li>
							<li class="active"><a href="<?php echo e(route('profile')); ?>">Profile</a></li>
                            <li><a href="<?php echo e(route('logout')); ?>">Sign out</a></li>
                        </ul>
                    </div>
                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                        <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo e(route('profileup')); ?>" method="post">
							<?php echo e(csrf_field()); ?>

                            <div class="profile-details tab-content">
                                <div class="tab-pane fade active in">
                                    <h3 class="title-section title-bar-high mb-40">Profile Information</h3>
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
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Student Id</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" value="<?php echo e($user->student_id); ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="name" value="<?php echo e($user->name); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Email</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" name="email" value="<?php echo e($user->email); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Phone</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="phone" value="<?php echo e($user->phone); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Image</label>
                                            <div class="col-sm-9 public-profile-content">
                                                <input type="file" accept="image/*" name="image" id="input-file-now" data-height="150" class="dropify" data-default-file="<?php if(!$user->image == null): ?><?php echo e(asset('assets/img/students/')); ?>/<?php echo e($user->image); ?><?php endif; ?>">
                                            </div>
                                        </div>
										
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Academic Year</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="academic_year" value="<?php echo e($user->academic_year); ?>">
                                            </div>
                                        </div>
										
                                        
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Change Password</label>
                                            <div class="col-sm-9">
                                                <input class="form-control mb-10" type="text" name="password" placeholder="Leave blank if no change needed">
                                            </div>
                                        </div>
                                        <div class="form-group mb-none">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button class="view-all-accent-btn disabled col-sm-9" type="submit">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                        </form>
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