<?php $__env->startSection('title'); ?> Generate exam attendance sheet | <?php echo e($system->app_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="wrapper">
        <div class="container-fluid">
            
			<div class="row">
                <div class="col-sm-12 text-center">
                    <div class="page-title-box">
                        <h4 class="page-title">Generate exam attendance sheet</h4>
						</div>
                </div>
            </div>
			
            <div class="row">
                <div class="col-sm-6 mx-auto">
                    <div class="card">
					<div class="card-body">
                                <form action="<?php echo e(route('admin.generate.exam.attendance.sheet')); ?>" method="post">
								<?php echo e(csrf_field()); ?>

								
								<div class="form-group mb-0">
								 <h6 class="sub-title mb-3">Select department</h6>
								  <select class="form-control" id="dept" name="department">
														<?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($dept->id); ?>"><?php echo e($dept->short); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														</select>
							    </div>
								<div class="form-group mb-0">
								 <h6 class="sub-title mb-3">Select course</h6>
								  <select class="form-control" id="courses" name="course_code">
														<option selected disabled>Select course</option>
														<?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($course->course_code); ?>"><?php echo e($course->course_code); ?> - <?php echo e($course->course_name); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														</select>
							    </div>
								
								<div class="form-group mb-0">
								 <h6 class="sub-title mb-3">Select exam</h6>
								  <select class="form-control" name="exam">
														<option selected disabled>Select exam</option>
														<option value="mid">Mid</option>
														<option value="final">Final</option>
														</select>
							    </div>
								
								
								<br></br>
								<div class="form-group mb-0">
								<div>
        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
    </div>
</div>
                                    
                                </form>
								
							</div>
					</div>
</div>
					</div>
            
        </div>
        
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>

$('#dept').on('change', function() {
$('#courses').empty();
  $.post("<?php echo e(route('admin.generate.sheetdata')); ?>",
       {
		 dept: $(this).find('option:selected').val(),
         _token: '<?php echo e(csrf_token()); ?>',
       },
       function(data, statusText, resObject) {
		   $('#courses').append('<option selected disabled>Select course</option>');
		   $.each(data, function (key, jsondata) {
			   if(key == "courses")
			   {
				  $.each(jsondata, function(courseData, courseDatavalue)
				  {
					 $('#courses').append('<option value="'+ courseDatavalue.course_code +'">'+ courseDatavalue.course_name +'</option>');
				   });
			   }
		   })
       }
    );
});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.app.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>