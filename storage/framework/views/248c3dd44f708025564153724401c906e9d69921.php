<?php $__env->startSection('title'); ?> Reset Password | <?php echo e($system->app_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
 <div class="form-body without-side">
        <div class="website-logo">
                <div class="logo">
                     <h4 style="font-weight: 600;">Pre Registration System<br><?php echo e($system->app_title); ?></h4>
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
                    <div class="form-items">
                        <h3>Password Reset</h3>
						<hr>
                        <form method="post" action="<?php echo e(route('passwordReset', $code)); ?>">
						<p>Chosse new password</p>
						<?php echo e(csrf_field()); ?>

						
						<?php if(session('success')): ?>
                        <div class="alert alert-success" role="alert"><p><?php echo e(session('success')); ?></p>
                        </div>
                        <?php endif; ?>
                         <?php if(session('alert')): ?>
						 <div class="alert alert-danger" role="alert"><p> <?php echo e(session('alert')); ?> </p></div>
                        <?php endif; ?>
                        <?php if($errors->any()): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p><?php echo e($error); ?></p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <?php endif; ?>
						
                            <input class="form-control" type="text" name="password" placeholder="Enter new password" required>
                            <div class="form-button full-width">
                                <button type="submit" class="ibtn btn-forget">Reset password</button>
                            </div>
                        </form>
						<br>
						<div class="page-links">
                            <a href="<?php echo e(route('index')); ?>">Back to Login</a>
                        </div>
                        <div class="other-links">
                            <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-question-circle"></i>FAQ</a>
							<a href="#"><i class="fa fa-info-circle"></i>About this system</a>
                        </div>
                        <div class="footer-copyright text-center py-3">&copy; 2019 Developed by:
      <a href="https://fb.me/s4k1b"> Sakib</a>
    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	 <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title mt-0" id="myModalLabel">Frequently Asked Questions</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
										
                                            <b class="mt-0" style="color: red;">Overflowing text to show scroll behavior</b>
											
                                            <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('user.html.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>