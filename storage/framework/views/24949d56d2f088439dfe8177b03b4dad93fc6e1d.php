<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $__env->yieldContent('title'); ?> :: <?php echo e($front->title); ?></title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">    
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('assets/img/favicon.png')); ?>">
    <link href="<?php echo e(asset('assets/admin/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/admin/css/bootstrap-responsive.min.css')); ?>" rel="stylesheet">
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="<?php echo e(asset('assets/admin/css/font-awesome.min.css')); ?>" rel="stylesheet">        
    
    <link href="<?php echo e(asset('assets/admin/css/ui-lightness/jquery-ui-1.10.0.custom.min.css')); ?>" rel="stylesheet">
    
    <link href="<?php echo e(asset('assets/admin/css/base-admin-3.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/admin/css/base-admin-3-responsive.css')); ?>" rel="stylesheet">
    
    <link href="<?php echo e(asset('assets/admin/css/pages/signin.css')); ?>" rel="stylesheet">   

    <link href="<?php echo e(asset('assets/admin/css/custom.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('assets/admin/js/plugins/msgGrowl/css/msgGrowl.css')); ?>" rel="stylesheet">
	<?php echo $__env->yieldContent('css'); ?>
	
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>

<body>
	
<nav class="navbar navbar-inverse" style="position: initial;" role="navigation">

	<div class="container">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <div class="navbar-brand"><?php echo e($front->title); ?></div>
  </div>

</div> <!-- /.container -->
</nav>



<?php echo $__env->yieldContent('content'); ?>


<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="<?php echo e(asset('assets/admin/js/libs/jquery-ui-1.10.0.custom.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/libs/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/plugins/msgGrowl/js/msgGrowl.js')); ?>"></script>

<script src="<?php echo e(asset('assets/admin/js/Application.js')); ?>"></script>

<script src="<?php echo e(asset('assets/admin/js/demo/signin.js')); ?>"></script>
<?php echo $__env->yieldContent('script'); ?>
<?php if($errors->any()): ?>
   <script>
     $.msgGrowl ({
			type: 'error'
			, title: 'Alert'
			, text: '<?php echo e($errors->first()); ?>'
		});
   </script>
   <?php endif; ?>
</body>
</html>