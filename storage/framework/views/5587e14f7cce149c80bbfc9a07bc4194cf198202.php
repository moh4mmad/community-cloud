<?php $__env->startSection('title'); ?>Sign up - <?php echo e($front->title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('og_title'); ?>Sign up - <?php echo e($front->title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?><?php echo e($front->title); ?> - Sign up <?php $__env->stopSection(); ?>
<?php $__env->startSection('og_description'); ?><?php echo e($front->title); ?> - Sign up <?php $__env->stopSection(); ?>
<?php $__env->startSection('keyword'); ?>Sign up, <?php echo e($front->keywords); ?><?php $__env->stopSection(); ?>
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
                    <h1>Sign up</h1>
                    <ul>
                        <li><a href="<?php echo e(route('home')); ?>">Home</a> -</li>
                        <li>Sign up</li>
                    </ul>
                </div>
            </div>
        </div>
		
        <div class="registration-page-area bg-secondary">
            <div class="container">
                <h2 class="sidebar-title">Fill up your information</h2>
                <div class="registration-details-area inner-page-padding">
				
				
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
		
				
				
                    <form id="registration" method="post" action="<?php echo e(route('register')); ?>">
					<?php echo e(csrf_field()); ?>

                        <div class="row">
                           
						   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label" for="first-name">Student ID *</label>
                                    <input type="text" name="student_id" value="<?php echo e(old('student_id')); ?>" class="form-control">
                                </div>
                            </div>
							
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label" for="first-name">Name *</label>
                                    <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control">
                                </div>
                            </div>
                         </div>
						<div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label" for="email">E-mail Address *</label>
                                    <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label" for="phone">Phone *</label>
                                    <input type="text" name="phone" value="<?php echo e(old('phone')); ?>" class="form-control">
                                </div>
                            </div>
                        </div>
						
                       
                        
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label" for="gender">Gender *</label>
                                    <div class="custom-select">
                                        <select name="gender" class="select2">
                                            <option value="">Select your Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label" for="academic_year">Academic Year *</label>
                                    <input type="text" name="academic_year" value="<?php echo e(old('academic_year')); ?>" placeholder="Autumn 2016" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label" for="pass">Password *</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="pLace-order mt-30">
                                    <button class="view-all-accent-btn disabled" type="submit" value="Login">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
	</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/css/select2.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/select2.min.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>