<?php $__env->startSection('title'); ?> History | <?php echo e($system->app_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="wrapper">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">History</h4></div>
                </div>
            </div>

			<?php if(count($logs) == 0): ?>
				<div class="alert alert-info font-18 text-center" role="alert"><strong>Info!</strong> No history data found.</div>
			<?php endif; ?>
			
			<?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="row">
                <div class="col-xl">
                    <div class="card">
                        <div class="card-body new-user">
                            <h5 class="header-title mb-4 mt-0">Registered courses for <?php echo e($log->Season->season); ?></h5>
						   <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
											<th class="border-top-0">No</th>
											<th class="border-top-0">Course code</th>
                                            <th class="border-top-0">Course name</th>
                                            <th class="border-top-0">Credit</th>
                                            <th class="border-top-0">Section</th>
                                        </tr>
                                    </thead>
									<?php
									$counts = App\CourseReg::where('students_id', $user->student_id)->where('seasons_id', $log->Season->id)->get();
									
									?>
									<?php $__currentLoopData = $counts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tbody>
                                        <tr>
										    <td><?php echo e($count+1); ?></td>
                                            <td><?php echo e($course->Course->course_code); ?></td>
                                            <td><?php echo e($course->Course->course_name); ?></td>
                                            <td><?php echo e($course->Course->credit); ?></td>
                                            <td><?php echo e($course->Section->section); ?></td>
                                        </tr>
										</tbody>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
								</div>
								
                        </div>
                        
                    </div>
                    
                </div>
              
            </div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
        
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.html.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>