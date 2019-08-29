<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
	<meta name="author" content="Sakib">
	<meta name="description" content="Pre Registration System">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/auth/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/auth/css/fontawesome-all.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/auth/css/style.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/auth/css/theme.css')); ?>">
	<link rel="shortcut icon" href="<?php echo e(asset('assets/logo.png')); ?>" type="image/x-icon" />
</head>
<body>
<div class="form-body without-side">
		  
        <div class="website-logo">
                <div class="logo">
				<img width="100" height="100" src="<?php echo e(asset('assets/logo.png')); ?>" alt="">
                     <h4 style="font-weight: 600;"><?php echo e($system->app_title); ?></h4>
                </div>
        </div>
		
		
		
		
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                   
                </div>
            </div>
			
			
            <div class="form-holder">
			<div class="form-content">
			<?php echo $__env->yieldContent('content'); ?>
			</div>
			</div>
        </div>
    </div>
	
<script src="<?php echo e(asset('assets/auth/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/auth/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/auth/js/bootstrap.min.js')); ?>"></script>

</body>
</html>