<?php $__env->startSection('title'); ?> Assign Teachers | <?php echo e($system->app_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="wrapper">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="page-title-box">
                        <h4 class="page-title">Assigned teachers for course & section</h4>
						<hr/>
						<button type="button" data-toggle="modal" data-target="#add_teacher" class="btn btn-info waves-effect waves-light">Assign teacher</button> </div>
                </div>
            </div>

			
			
            <div class="row">
                <div class="col-xl">
                    <div class="card">
					
					<li class="list-inline-item hide-phone app-search">
					<form role="search" method="post" action="<?php echo e(route('admin.assignteacher.search')); ?>">
					<?php echo e(csrf_field()); ?>

					<input type="hidden" name="dept" value="<?php if(!empty($dept->id)): ?> <?php echo e($dept->id); ?> <?php endif; ?>">
					<input type="text" name="search" placeholder="Search course code" class="form-control"> <a onclick="$(this).closest('form').submit()" href="#"><i class="fa fa-search">
					</i>
					</a>
					</form>
					</li>

                        <div class="card-body new-user">
						<div class="col-sm-3">
	<form action="<?php echo e(route('admin.assignteachers.dept.select')); ?>" method="post">
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
											<th class="border-top-0">Teacher name</th>
                                            <th class="border-top-0">Course code</th>
											<th class="border-top-0">Dept</th>
                                            <th class="border-top-0">Section</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
									<tbody>
									<?php $__currentLoopData = $assignteachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count => $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
									        <td><?php echo e($count+1); ?></td>
                                            <td><?php echo e($teacher->Teacher->name); ?></td>
											<td><?php echo e($teacher->course_code); ?></td>
											<td><?php echo e($teacher->Department->short); ?></td>
											<td><?php echo e($teacher->Section->section); ?></td>
											<td>
											<button type="button" data-toggle="modal" data-target="#edit_<?php echo e($teacher->id); ?>" class="btn btn-primary waves-effect waves-light">Update</button>
											<button type="button" id="remove" assign_id="<?php echo e($teacher->id); ?>" class="btn btn-danger waves-effect waves-light">Remove</button>
											</td>
                                        </tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</tbody>
                                </table>
								<?php echo e($assignteachers->render()); ?>

								</div>
                        </div>
                        
                    </div>
                    
                </div>
              
            </div>

            
        </div>
        
    </div>
	
	<div class="modal fade" id="add_teacher" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelgrad" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Assign teacher</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
										<form method="post" action="<?php echo e(route('admin.assignteacher.add')); ?>">
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
                                                        <label for="field-3" class="control-label">Select teacher</label>
                                                        <select class="form-control" id="teachers" name="teacher_id">
														<option selected disabled>Select teacher</option>
														<?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($teacher->id); ?>"><?php echo e($teacher->name); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														</select>
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Select course</label>
                                                        <select class="form-control" id="courses" name="course_code">
														<option selected disabled>Select course</option>
														<?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($course->course_code); ?>"><?php echo e($course->course_code); ?> - <?php echo e($course->course_name); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														</select>
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Select section</label>
                                                        <select class="form-control" id="sections" name="section_id">
														<option selected disabled>Select section</option>
														<?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($section->id); ?>"><?php echo e($section->Semester->semester); ?> Semester - <?php echo e($section->section); ?></option>
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
		<?php $__currentLoopData = $assignteachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="modal fade" id="edit_<?php echo e($teacher->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelgrad" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit assigned teacher</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
										<form method="post" action="<?php echo e(route('admin.assignteacher.update')); ?>">
										<?php echo e(csrf_field()); ?>

										<input type="hidden" name="id" value="<?php echo e($teacher->id); ?>">
                                        <div class="modal-body">
										
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Select teacher</label>
                                                        <select class="form-control" name="teacher_id">
														<?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($teacher1->id); ?>" <?php if($teacher1->id == $teacher->teacher_id): ?> selected <?php endif; ?>><?php echo e($teacher1->name); ?></option>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/app/plugins/jqconfirm/jquery-confirm.min.js')); ?>"></script>
<script>

$('#dept').on('change', function() {
$('#teachers').empty();
$('#courses').empty();
$('#sections').empty();
  $.post("<?php echo e(route('admin.assignteacher.DepartmentData')); ?>",
       {
		 dept: $(this).find('option:selected').val(),
         _token: '<?php echo e(csrf_token()); ?>',
       },
       function(data, statusText, resObject) {
		   $('#teachers').append('<option selected disabled>Select teacher</option>');
		   $('#courses').append('<option selected disabled>Select course</option>');
		   $('#sections').append('<option selected disabled>Select section</option>');
		   $.each(data, function (key, jsondata) {
		       if(key == "teachers")
			   {
				  $.each(jsondata, function(teacherData, teacherDatavalue)
				  {
					 $('#teachers').append('<option value="'+ teacherDatavalue.teacher_id +'">'+ teacherDatavalue.teacher_name +'</option>');
				   });
			   }
			   if(key == "courses")
			   {
				  $.each(jsondata, function(courseData, courseDatavalue)
				  {
					 $('#courses').append('<option value="'+ courseDatavalue.course_code +'">'+ courseDatavalue.course_name +'</option>');
				   });
			   }
			   if(key == "sections")
			   {
				  $.each(jsondata, function(sectionData, sectionDatavalue)
				  {
					 $('#sections').append('<option value="'+ sectionDatavalue.section_id +'">'+ sectionDatavalue.section_name +'</option>');
				   });
			   }
		   })
       }
    );
});



$('button#remove').confirm({
	
	title: 'Are you sure?',
    content: 'To remove this click on confirm',
    type: 'red',
    typeAnimated: true,
    buttons: {
        tryAgain: {
            text: 'Confirm',
            btnClass: 'btn-success',
            action: function(){
				
				var form = $('<form action="<?php echo e(route("admin.assignteacher.remove")); ?>" method="post">' +
				             '<input type="hidden" name="id" value="' + this.$target.attr("assign_id") + '" />' +
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
</script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/app/plugins/jqconfirm/jquery-confirm.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.app.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>