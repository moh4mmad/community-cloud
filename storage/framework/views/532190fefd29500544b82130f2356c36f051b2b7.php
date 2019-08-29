<?php $__env->startSection('title'); ?> Course Registration | <?php echo e($system->app_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="wrapper">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Course registration for <?php echo e($season); ?></h4></div>
                </div>
            </div>

			<div class="row text-center justify-content-center"> 
			        <div class="col-xs-3 col-sm-3">
			     		<div class="card "> 
				    	    <div class="card-body">
							<p><strong>Credit limit</strong></p>
							<p><strong><?php echo e($user->credit_limit); ?></strong></p>
							</div>
						</div>
					</div>
					<div class="col-xs-3 col-sm-3">
			     		<div class="card "> 
				    	    <div class="card-body">
							<p><strong>Credit you have taken</strong></p>
							<p><strong><?php echo e($taken_credit); ?></strong></p>
							</div>
						</div>
					</div>
					<div class="col-xs-3 col-sm-3">
			     		<div class="card "> 
				    	    <div class="card-body">
							<p><strong>Status</strong></p>
							<?php if(!empty($logs) && $logs->status == 1): ?>
								<p class="text-success"><strong>Confirmed</strong></p>
								<?php else: ?>
							<p class="text-danger"><strong>Unconfirmed</strong></p>
						<?php endif; ?>
							</div>
						</div>
					</div>

			</div>			

			<?php if( $sys->course_reg == 1 && Carbon\Carbon::now() < Carbon\Carbon::parse($sys->reg_last_date)): ?>
			
		<?php if(!empty($logs) && !count($registered_courses) == 0): ?>
			<div class="row">
                <div class="col-xl">
                    <div class="card">
                        <div class="card-body new-user">
                            <h5 class="header-title mb-4 mt-0">Selected courses for <?php echo e($season); ?></h5>
						   <div class="table-responsive">
						   <?php if($logs->status == 0): ?>
						   <form method="post" action="<?php echo e(route('RemoveCourse')); ?>">
						   <?php echo e(csrf_field()); ?>

						   <?php endif; ?>
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
										<?php if($logs->status == 0): ?>
                                            <th class="border-top-0">Select</th>
										<?php else: ?>
											<th class="border-top-0">No</th>
									    <?php endif; ?>
											<th class="border-top-0">Course code</th>
                                            <th class="border-top-0">Course name</th>
                                            <th class="border-top-0">Credit</th>
                                            <th class="border-top-0">Section</th>
											<th class="border-top-0">Course teacher</th>
                                        </tr>
                                    </thead>
									<tbody>
                                    <?php $__currentLoopData = $registered_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
										    <td>
											<?php if($logs->status == 0): ?>
											<div class="custom-control custom-checkbox">
											<input name="course_code[]" type="checkbox" class="custom-control-input" id="course<?php echo e($count); ?>" value="<?php echo e($course->Course->course_code); ?>" data-parsley-multiple="groups" data-parsley-mincheck="2">
											<label class="custom-control-label" for="course<?php echo e($count); ?>">Select</label></div>
											<?php else: ?>
											<?php echo e($count+1); ?>

										    <?php endif; ?>
											</td>
                                            <td><?php echo e($course->Course->course_code); ?></td>
                                            <td><?php echo e($course->Course->course_name); ?></td>
                                            <td><?php echo e($course->Course->credit); ?></td>
                                            <td><?php echo e($course->Section->section); ?></td>
											<?php
											$sections = \App\AssignTeachers::where('course_code', $course->courses_course_code)->where('section_id', $course->section_id)->first();
											?>
											<td><?php echo e($sections->Teacher->name); ?></td>
                                        </tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</tbody>
                                </table>
								</div>
								<?php if($logs->status == 0): ?>
								<p></p><p></p>
								<div class="col-xs-3 col-sm-3"> 
								<button type="submit" class="btn btn-danger">Remove</button>
								<a id="confirm" href="<?php echo e(route('confirmed')); ?>" role="button" data-title="Are you sure?" class="btn btn-primary">Confirm all courses</a>
								</div>
								</form>
								<?php endif; ?>
                        </div>
                        
                    </div>
                    
                </div>
              
            </div>

			<?php endif; ?>
			
			
			<?php if($log == 0): ?>
            <div class="row">
                <div class="col-xl">
                    <div class="card">
                        <div class="card-body new-user">
                            <h5 class="header-title mb-4 mt-0">Select courses</h5><div class="btn-group m-b-10">
        <?php $__currentLoopData = $semesters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $smr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php
		if($smr->semester == $semester)
		{
			$css = "light active";
		} else 
		{
			$css = "light";
		}
		?>
		<a href="<?php echo e(route('registrationsem', $smr->semester)); ?>" role="button" class="btn btn-<?php echo e($css); ?>"><?php echo e($smr->semester); ?></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
						   <div class="table-responsive">
						   <form method="post" action="<?php echo e(route('CourseRegistration')); ?>">
						   <?php echo e(csrf_field()); ?>

                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Select</th>
											<th class="border-top-0">Course code</th>
                                            <th class="border-top-0">Course name</th>
                                            <th class="border-top-0">Credit</th>
                                            <th class="border-top-0">Section - Teacher</th>
                                        </tr>
                                    </thead>
									<?php
									foreach($courses as $count => $course){
									foreach($registered_courses as $registered_course)
									{
										if($registered_course->Course->course_code == $course->course_code){
											unset($courses[$count]);
										}
									}
									}
									?>
									<tbody>
									<?php if(!count($courses)): ?>  <td colspan="5" style="text-align: center">No course to select</td> <?php endif; ?>
                                    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
										    <td><div class="custom-control custom-checkbox">
											<input name="course_code[]" type="checkbox" class="custom-control-input" id="<?php echo e($course->course_code); ?>" value="<?php echo e($course->course_code); ?>" data-parsley-multiple="groups" data-parsley-mincheck="2">
											<label class="custom-control-label" for="<?php echo e($course->course_code); ?>">Select</label></div></td>
                                            <td><?php echo e($course->course_code); ?></td>
                                            <td><?php echo e($course->course_name); ?></td>
                                            <td><?php echo e($course->credit); ?></td>
											<?php
											$sections = \App\Sections::where('semesters_id', $course->semesters_id)->where('gender',$user->gender)->where('status',1)->get();
											?>
                                            <td><select class="form-control" name="section[]" id="section">
											<?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php
											$teacher = \App\AssignTeachers::where('course_code', $course->course_code)->where('section_id', $section->id)->first();
											?>
											
											<option value="<?php echo e($section->id); ?>" <?php if( strtoupper($user->semester) == strtoupper($course->Semester->semester) && strtoupper($user->section) != strtoupper($section->section)): ?> disabled <?php endif; ?>><?php echo e($section->section); ?> - <?php if(isset($teacher->Teacher->name)): ?> <?php echo e($teacher->Teacher->name); ?> <?php else: ?> No teacher assigned <?php endif; ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</select></td>
                                        </tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</tbody>
                                </table>
								</div>
								<p></p><p></p>
								<div class="col-xs-3 col-sm-3"> 
								<?php if(count($courses)): ?> <button type="submit" class="btn btn-primary">Submit</button> <?php endif; ?>
								</div>
                            </form>
                        </div>
                        
                    </div>
                    
                </div>
              
            </div>
			<?php endif; ?>

			<?php else: ?>
				
			<div class="alert alert-danger font-18 text-center" role="alert"><strong>Notice!</strong> Course registration for <?php echo e($season); ?> is closed.</div>
			
			<?php endif; ?>
            
        </div>
        
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script>
$('#confirm').confirm({
    content: 'After this action you can\'t add or remove any courses.',
    type: 'red',
    typeAnimated: true,
    buttons: {
        tryAgain: {
            text: 'Confirm',
            btnClass: 'btn-success',
            action: function(){
				location.href = this.$target.attr('href');
            }
        },
        close: function () {
        }
    }
});
</script>
<?php if($errors->any()): ?>
<script>
<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
$.notify({
	title: '<strong>Error: </strong>',
	message: '<?php echo e($error); ?>'
},{
	type: 'danger',
	allow_dismiss: false,
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
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.html.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>