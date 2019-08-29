<?php $__env->startSection('title'); ?> Admin Reset Password | <?php echo e($system->app_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

                    <div class="form-items">
                        <h3>Password Reset</h3>
						<hr>
                        <form method="post" action="<?php echo e(route('admin.forget.pass.post')); ?>">
						<p>To reset your password, enter your email</p>
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
						
                            <input class="form-control" type="text" name="email" placeholder="E-Mail Address" required>
                            <div class="form-button full-width">
                                <button type="submit" class="ibtn btn-forget">Send Reset Link</button>
                            </div>
                        </form>
						<br>
						<div class="page-links">
                            <a href="<?php echo e(route('login.admin')); ?>">Back to Login</a>
                        </div>
                        <div class="footer-copyright text-center py-3">&copy; 2019 Developed by:
      <a href="https://fb.me/s4k1b"> Sakib</a>
    </div>
                    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.auth.app.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>