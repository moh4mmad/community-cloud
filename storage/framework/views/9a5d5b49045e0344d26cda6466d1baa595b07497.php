<?php $__env->startSection('title'); ?> All Courses | <?php echo e($system->app_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="wrapper">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="page-title-box">
                        <h4 class="page-title">Semester wise all course</h4> <hr/> <button type="button" data-toggle="modal" data-target="#add_course" class="btn btn-info waves-effect waves-light">Add new course</button> </div>
                </div>
            </div>

			
			
            <div class="row">
                <div class="col-xl">
                    <div class="card">
                        <div class="card-body new-user">
                            <div class="btn-group m-b-10">
        <?php $__currentLoopData = $semesters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $semester): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php
		$segment = Request::segment(4);
		if($segment == $semester->semester)
		{
			$css = "light active";
		}
		else 
		{
			$css = "light";
		}
		?>
		<?php if($segment == null && $key == 0): ?>
			<a href="<?php echo e(route('admin.course',[$dept->short ,$semester->semester])); ?>" role="button" class="btn btn-light active"><?php echo e($semester->semester); ?></a>
		<?php else: ?>
		<a href="<?php echo e(route('admin.course', [$dept->short ,$semester->semester])); ?>" role="button" class="btn btn-<?php echo e($css); ?>"><?php echo e($semester->semester); ?></a>
	    <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
	<div class="col-sm-3 pull-right">
	<form action="<?php echo e(route('admin.course.select')); ?>" method="post">
	<?php echo e(csrf_field()); ?>

	<div class="row">
     <div class="col-xs-3">
	<select class="form-control" name="dept">
										<?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($dept->short); ?>" <?php if(Request::segment(3) == $dept->short): ?> selected <?php endif; ?>><?php echo e($dept->short); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
										
										</div>
										<button type="submit" class="btn btn-primary waves-effect waves-light ml-2">Submit</button>
										</div>
										</form>
										
	</div>
						   <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">SL.</th>
											<th class="border-top-0">Course code</th>
                                            <th class="border-top-0">Course name</th>
                                            <th class="border-top-0">Credit</th>
											<th class="border-top-0">Prerequisite course</th>
											<th class="border-top-0">Status</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
									<tbody>
									<?php if(!count($courses)): ?>  <td colspan="6" style="text-align: center">No course found</td> <?php endif; ?>
									<?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
									        <td><?php echo e($count+1); ?></td>
                                            <td><?php echo e($course->course_code); ?></td>
                                            <td><?php echo e($course->course_name); ?></td>
                                            <td><?php echo e($course->credit); ?></td>
											<td><?php if($course->prerequisite_course == null): ?> None <?php else: ?> <?php echo e($course->prerequisite_course); ?> <?php endif; ?></td>
											<td><?php if($course->status == 1): ?>
											<strong class="badge badge-info">Active</strong></td>
										    <?php else: ?>
											<strong class="badge badge-danger">Inactive</strong></td>
										    <?php endif; ?>
											<td>
											<?php if($course->status == 1): ?>
											<button id="inactive" course_code="<?php echo e($course->course_code); ?>" type="button" class="btn btn-danger waves-effect waves-light">Deactivate</button>
										    <?php else: ?>
											<button id="active" course_code="<?php echo e($course->course_code); ?>" type="button" class="btn btn-success waves-effect waves-light">Active</button>
										    <?php endif; ?>
											<button type="button" data-toggle="modal" data-target="#edit_course_<?php echo e($course->course_code); ?>" class="btn btn-primary waves-effect waves-light">Edit</button>
											</td>
                                        </tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</tbody>
                                </table>
								</div>
                        </div>
                        
                    </div>
                    
                </div>
              
            </div>

            
        </div>
        
    </div>
	<?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="modal fade" id="edit_course_<?php echo e($course->course_code); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelgrad" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit course</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
										<form method="post" action="<?php echo e(route('admin.update.course')); ?>">
										<?php echo e(csrf_field()); ?>

										<input type="hidden" name="course_code" value="<?php echo e($course->course_code); ?>">
										<div class="modal-body">
                                        
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Course code</label>
                                                        <input type="text" class="form-control" value="<?php echo e($course->course_code); ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Course name</label>
                                                        <input type="text" class="form-control" name="course_name" value="<?php echo e($course->course_name); ?>" placeholder="Course name">
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Course credit</label>
                                                        <input type="number" class="form-control" name="credit" value="<?php echo e($course->credit); ?>" placeholder="Course credit">
                                                    </div>
                                                </div>
                                            </div>
											
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Pre Requisite course</label>
                                                        <select class="form-control" id="courses_edit" name="prerequisite_course">
														<option value="none">None</option>
														<?php $__currentLoopData = $all_course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $courses): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($courses->course_code); ?>" <?php if($course->prerequisite_course == $courses->course_code): ?> selected <?php endif; ?> ><?php echo e($courses->course_code); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														</select>
                                                    </div>
                                                </div>
                                            </div>
											
                                        <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Semester</label>
                                                        <select class="form-control" name="semesters_id">
														<?php $__currentLoopData = $semesters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $semester): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($semester->id); ?>" <?php if($course->semesters_id == $semester->id): ?> selected <?php endif; ?>><?php echo e($semester->semester); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														</select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
										</form>
                                    </div>
                                </div>
                            </div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<div class="modal fade" id="add_course" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelgrad" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add new course</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
										<form method="post" action="<?php echo e(route('admin.add.course')); ?>">
										<?php echo e(csrf_field()); ?>

                                        <div class="modal-body">
										<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Department</label>
                                                        <select class="form-control" id="dept" name="department">
														<?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($dept->id); ?>" <?php if(Request::segment(3) == $dept->short): ?> selected <?php endif; ?>><?php echo e($dept->short); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														</select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Course code</label>
                                                        <input type="text" class="form-control" name="course_code" placeholder="Course code" >
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Course name</label>
                                                        <input type="text" class="form-control" name="course_name" placeholder="Course name">
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Course credit</label>
                                                        <input type="number" class="form-control" name="credit" placeholder="Course credit">
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Pre Requisite course</label>
                                                        <select class="form-control" id="courses" name="prerequisite_course">
														<option value="none" selected>None</option>
														<?php $__currentLoopData = $all_course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($course->course_code); ?>"><?php echo e($course->course_code); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														</select>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Semester</label>
                                                        <select class="form-control" name="semesters_id">
														<option selected disabled>Select course</option>
														<?php $__currentLoopData = $semesters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $semester): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($semester->id); ?>"><?php echo e($semester->semester); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														</select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </div>
										</form>
                                    </div>
                                </div>
                            </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/app/plugins/jqconfirm/jquery-confirm.min.js')); ?>"></script>
<script>
$('button#inactive').confirm({
	
	title: 'Are you sure?',
    content: 'To deactivate this course click on confirm',
    type: 'red',
    typeAnimated: true,
    buttons: {
        tryAgain: {
            text: 'Confirm',
            btnClass: 'btn-success',
            action: function(){
				
				var form = $('<form action="<?php echo e(route("admin.deactivate.course")); ?>" method="post">' +
				             '<input type="hidden" name="course_code" value="' + this.$target.attr("course_code") + '" />' +
							 '<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />' +
							 '</form>');
				$('body').append(form);
			    form.submit();
            }
        },
        close: function () {
        }
    }
});

$('button#active').confirm({
	
	title: 'Are you sure?',
    content: 'To activate this course click on confirm',
    type: 'red',
    typeAnimated: true,
    buttons: {
        tryAgain: {
            text: 'Confirm',
            btnClass: 'btn-success',
            action: function(){
				
				var form = $('<form action="<?php echo e(route("admin.activate.course")); ?>" method="post">' +
				             '<input type="hidden" name="course_code" value="' + this.$target.attr("course_code") + '" />' +
							 '<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />' +
							 '</form>');
				$('body').append(form);
			    form.submit();
            }
        },
        close: function () {
        }
    }
});


$('#dept').on('change', function() {
$('#courses').empty();
  $.post("<?php echo e(route('admin.getcourse')); ?>",
       {
		 dept: $(this).find('option:selected').val(),
         _token: '<?php echo e(csrf_token()); ?>',
       },
       function(data, statusText, resObject) {
		   $('#courses').append('<option value="none" selected>None</option>');
		   $.each(data, function (key, jsondata) {
			   if(key == "courses")
			   {
				  $.each(jsondata, function(courseData, courseDatavalue)
				  {
					 $('#courses').append('<option value="'+ courseDatavalue.course_code +'">'+ courseDatavalue.course_code +'</option>');
				   });
			   }
		   })
       }
    );
});

</script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/app/plugins/jqconfirm/jquery-confirm.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.app.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>