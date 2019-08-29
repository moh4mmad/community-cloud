<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('description'); ?>">
	<meta name="keyword" content="<?php echo $__env->yieldContent('keyword'); ?>">    
    <meta property="og:title" content="<?php echo $__env->yieldContent('og_title'); ?>">
	<meta property="og:description" content="<?php echo $__env->yieldContent('og_description'); ?>">
	<meta property="og:image" content="<?php echo $__env->yieldContent('og_image'); ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('assets/img/favicon.png')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/normalize.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/main.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/OwlCarousel/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/OwlCarousel/owl.theme.default.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/meanmenu.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/slider/css/nivo-slider.css')); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/slider/css/preview.css')); ?>" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/jquery.datetimepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/magnific-popup.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/hover-min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/reImageGrid.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
	<?php echo $__env->yieldContent('css'); ?>
    <script src="<?php echo e(asset('assets/js/modernizr-2.8.3.min.js')); ?>"></script>
</head>

<body>

    <div id="preloader" style="background: #002147 url('<?php echo e(asset('assets/img/preloader.gif')); ?>') no-repeat scroll center center;"></div>

    <?php echo $__env->yieldContent('content'); ?>
	<?php echo $__env->make('front.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <script src="<?php echo e(asset('assets/js/jquery-2.2.4.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/js/plugins.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/js/wow.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/slider/js/jquery.nivo.slider.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/vendor/slider/home.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/vendor/OwlCarousel/owl.carousel.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/js/jquery.meanmenu.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/js/jquery.scrollUp.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/js/jquery.counterup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.countdown.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/js/isotope.pkgd.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/js/jquery.magnific-popup.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/js/jquery.gridrotator.js')); ?>" type="text/javascript"></script>
    <?php echo $__env->yieldContent('script'); ?>
	<script src="<?php echo e(asset('assets/js/main.js')); ?>" type="text/javascript"></script>
	
</body>

</html>
