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
									<a class="dropdown-item" href="<?php echo e(route('admin.profile')); ?>"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
                                <div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?php echo e(route('admin.logout')); ?>">
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
                        <li class="has-submenu"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="mdi mdi-airplay"></i>Dashboard</a></li>
                        <li class="has-submenu"><a href="<?php echo e(route('admin.course')); ?>"><i class="fas fa-book"></i>Course</a></li>
                        <li class="has-submenu"><a><i class="fas fa-chalkboard-teacher"></i>Teacher</a>
						<ul class="submenu">
                                <li><a href="<?php echo e(route('admin.teachers')); ?>">Teachers</a></li>
                                <li><a href="<?php echo e(route('admin.assignteacher')); ?>">Assign teacher for course</a></li>
                            </ul>
						</li>
						<li class="has-submenu"><a><i class="fas fa-users"></i>Student</a>
						<ul class="submenu">
						<?php
						$pending_students = \App\User::where('email_verify', 0)->where('active', 0)->count();
						?>
                                <li><a href="<?php echo e(route('admin.students')); ?>">Students</a></li>
                                <li><a href="<?php echo e(route('admin.students.verify')); ?>">Student verification <?php if($pending_students): ?><strong class="text-light bg-dark">New <?php echo e($pending_students); ?></strong> <?php endif; ?></a></li>
                            </ul>
						</li>
						<li class="has-submenu"><a><i class="fas fa-wrench"></i>Settings</a>
						<ul class="submenu">
                                <li><a href="<?php echo e(route('admin.seasons')); ?>">Sessions</a></li>
                                <li><a href="<?php echo e(route('admin.SemesterAndSections')); ?>">Semester & Sections</a></li>
								<li><a href="<?php echo e(route('admin.departments')); ?>">Departments</a></li>
								<li><a href="<?php echo e(route('admin.costs')); ?>">Costs</a></li>
								<li><a href="<?php echo e(route('admin.grading')); ?>">Grading system</a></li>
								<li><a href="<?php echo e(route('admin.system')); ?>">System settings</a></li>
								<li><a href="<?php echo e(route('admin.idgeneretor')); ?>">ID Generator</a></li>
								<li><a href="<?php echo e(route('admin.mail')); ?>">Mail settings</a></li>
                            </ul>
						</li>
						<li class="has-submenu"><a href="<?php echo e(route('admin.users')); ?>"><i class="fas fa-user-tie"></i>Users</a></li>
						<li class="has-submenu"><a><i class="fas fa-file-pdf"></i>PDF Generate</a>
						<ul class="submenu">
                                <li><a href="<?php echo e(route('admin.attendance.sheet')); ?>">Class attendance sheet</a></li>
                                <li><a href="<?php echo e(route('admin.exam.attendance.sheet')); ?>">Exam attendance sheet</a></li>
								<li><a href="<?php echo e(route('admin.admitcard')); ?>">Admit card generate</a></li>
								<li><a href="<?php echo e(route('admin.idcard')); ?>">Id card generate</a></li>
                            </ul>
						</li>
						<li class="has-submenu"><a href="<?php echo e(route('admin.notice')); ?>"><i class="fas fa-bell"></i>Notice</a></li>
						<li class="has-submenu"><a href="<?php echo e(route('admin.logout')); ?>"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
                        
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