<?php $__env->startSection('title'); ?> Accountant login | <?php echo e($system->app_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

                    <div class="form-items">
                        <h3>Accountant Login</h3>
						<hr>
                        <form method="post" action="<?php echo e(route('accountant.login')); ?>">
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
						
                            <input class="form-control" type="text" name="username" placeholder="username" required>
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
							<div class="form-check" style="padding-left: 0;">
							<input name="remember" class="form-check-input" id="rememberme" type="checkbox" value="1">
							<label class="form-check-label" for="rememberme">Keep me signed in</label>
							</div>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Login</button>
								<a href="<?php echo e(route('accountant.forget.pass')); ?>">Forget password?</a>
                            </div>
                        </form>
						<hr>
                        <div class="footer-copyright text-center py-3">&copy; 2019 Developed by:
      <a href="https://fb.me/s4k1b"> Sakib</a>
    </div>
                    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('accountant.auth.app.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>