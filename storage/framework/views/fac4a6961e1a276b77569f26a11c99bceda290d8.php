<?php $__env->startSection('title'); ?> Dashboard | <?php echo e($system->app_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="wrapper">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Dashboard</h4></div>
                </div>
            </div>
			
			
			<div class="row">
                <div class="col-xl">
				  <div class="card">
                        <div class="card-body">
			<div class="alert alert-info font-18 bg-white text-dark" role="alert">
			<strong>Current Semester :</strong> <?php echo e($season); ?></div>
			<?php if(!empty($logs) &&  $sys->course_reg == 1 && Carbon\Carbon::now() < Carbon\Carbon::parse($sys->reg_last_date)): ?>
			<?php if($logs->status == 1): ?>
			<div class="alert alert-success font-18" role="alert"><strong>Notice!</strong> Your course registration for <?php echo e($season); ?> is confirmed.</div>
			<?php endif; ?>
			<?php endif; ?>
			
			<?php if( $sys->course_reg == 1 && Carbon\Carbon::now() < Carbon\Carbon::parse($sys->reg_last_date)): ?>
			<div class="alert alert-info font-18" role="alert"><strong>Notice!</strong> Course registration is open for <?php echo e($season); ?>.</div>
			<div class="alert alert-info font-18" role="alert"><strong>Notice!</strong> Course registration for <?php echo e($season); ?> last date <?php echo e(Carbon\Carbon::parse($sys->reg_last_date)->format('d M Y g:ia')); ?>.</div>
			<?php else: ?>
			<div class="alert alert-danger font-18" role="alert"><strong>Notice!</strong> Course registration for <?php echo e($season); ?> is closed.</div>
		    <?php endif; ?>
			
			
			
            </div>
			</div>
            </div>
			</div>

			
			<?php if(!empty($logs)): ?>
			<?php if($logs->status == 1): ?>
			
            <div class="row">
                <div class="col-xl">
                    <div class="card">
                        <div class="card-body new-user">
                            <h5 class="header-title mb-4 mt-0">Registered courses for <?php echo e($season); ?> </h5>
						   <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">SL.</th>
											<th class="border-top-0">Course code</th>
                                            <th class="border-top-0">Course name</th>
                                            <th class="border-top-0">Credit</th>
                                            <th class="border-top-0">Section</th>
											<th class="border-top-0">Course teacher</th>
                                        </tr>
                                    </thead>
									<tbody>
                                    <?php $__currentLoopData = $course_reg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
										    <td><?php echo e($count+1); ?></td>
                                            <td><?php echo e($course->Course->course_code); ?></td>
                                            <td><?php echo e($course->Course->course_name); ?></td>
                                            <td><?php echo e($course->Course->credit); ?></td>
                                            <td><?php echo e($course->Section->section); ?></td>
											<?php
											$sections = \App\AssignTeachers::where('course_code', $course->courses_course_code)->where('section_id', $course->section_id)->first();
											?>
											<td><?php echo e(@$sections->Teacher->name); ?></td>
                                        </tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</tbody>
                                </table>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
              
            </div>
			<?php endif; ?>
			<?php endif; ?>
			
            
        </div>
        
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.html.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>