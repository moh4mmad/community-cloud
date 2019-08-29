<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
	<meta name="author" content="Sakib">
	<meta name="description" content="Pre Registration System">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    
    <link href="<?php echo e(asset('assets/app/plugins/jvectormap/jquery-jvectormap-2.0.2.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/app/plugins/fullcalendar/vanillaCalendar.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/app/plugins/morris/morris.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/app/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/app/css/icons.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('assets/app/css/style.css')); ?>" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="<?php echo e(asset('assets/logo.png')); ?>" type="image/x-icon" />
	<?php echo $__env->yieldContent('css'); ?>
</head>

<body>
    
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>
    
    <header id="topnav">
        <div class="topbar-main">
            <div class="container-fluid">
                
                <div class="logo">
                    <a class="logo" style="font-size: 20px;"><?php echo e($system->app_title); ?></a>
                </div>
                
                <div class="menu-extras topbar-custom">
                    <ul class="list-inline float-right mb-0">
                        
                        
                        <li class="list-inline-item dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"><img src="<?php echo e(asset('assets/app/images/users/avatar-1.jpg')); ?>" alt="user" class="rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                                
                                <div class="dropdown-item noti-title">
                                    <h5><?php echo e($user->name); ?></h5>
									</div>
									<a class="dropdown-item" href="<?php echo e(route('accountant.profile')); ?>"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
                                <div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?php echo e(route('accountant.logout')); ?>">
								<i class="mdi mdi-logout m-r-5 text-muted">
								</i> Sign out</a>
								</div>
                        </li>
                        <li class="menu-item list-inline-item">
                            
                            <a class="navbar-toggle nav-link">
                                <div class="lines"><span></span> <span></span> <span></span></div>
                            </a>
                            
                        </li>
                    </ul>
                </div>
                
                <div class="clearfix"></div>
            </div>
            
        </div>
        
        
        <div class="navbar-custom">
            <div class="container-fluid">
                <div id="navigation">
                    
                    <ul class="navigation-menu text-center">
                        <li class="has-submenu"><a href="<?php echo e(route('accountant.dashboard')); ?>"><i class="mdi mdi-airplay"></i>Dashboard</a></li>
                        
						<li class="has-submenu"><a href="<?php echo e(route('accountant.deposits')); ?>"><i class="fas fa-dollar-sign"></i>Deposits</a></li>
                       
						<li class="has-submenu"><a href="<?php echo e(route('accountant.students')); ?>"><i class="fas fa-users"></i>Student</a></li>
                       
					   <li class="has-submenu"><a href="<?php echo e(route('accountant.profile')); ?>"><i class="fas fa-user"></i>Profile</a></li>
                       
						<li class="has-submenu"><a href="<?php echo e(route('accountant.logout')); ?>"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
                        
                    </ul>
                    
                </div>
                
            </div>
            
        </div>
        
    </header>
    
    <?php echo $__env->yieldContent('content'); ?>
    
    
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">© 2019 Developed by <a target="_blank" href="https://fb.me/s4k1b">Sakib</a>.</div>
            </div>
        </div>
    </footer>
    
    
    <script src="<?php echo e(asset('assets/app/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/app/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/app/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/app/js/modernizr.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/app/js/waves.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/app/js/jquery.nicescroll.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/app/js/app.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/app/js/bootstrap-notify.js')); ?>"></script>
	<?php echo $__env->yieldContent('script'); ?>
	
	<?php if(session('success')): ?>
		<script>
		$.notify({
			title: '<strong>Message: </strong>',
			message: '<?php echo e(session('success')); ?>'
			},{
				type: 'success',
				allow_dismiss: true,
				timer: 1500,
				placement: {
					from: 'top',
					align: 'center'
					},
					offset: {
						x: 50,
						y: 130
						}
						});
		</script>
	<?php endif; ?>
	<?php if(session('alert')): ?>
	<script>
		$.notify({
			title: '<strong>Message: </strong>',
			message: '<?php echo e(session('alert')); ?>'
			},{
				type: 'danger',
				allow_dismiss: true,
				timer: 1500,
				placement: {
					from: 'top',
					align: 'center'
					},
					offset: {
						x: 50,
						y: 130
						}
						});
		</script>
    <?php endif; ?>
		
	<?php if($errors->any()): ?>
	   <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <script>
		$.notify({
			title: '<strong>Error : </strong>',
			message: '<?php echo e($error); ?>'
			},{
				type: 'danger',
				allow_dismiss: true,
				timer: 1500,
				placement: {
					from: 'top',
					align: 'center'
					},
					offset: {
						x: 50,
						y: 130
						}
						});
		</script>
	   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php endif; ?>
	
	
</body>


</html>