<?php $__env->startSection('title'); ?> Students <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="col-md-12"> 
<div class="widget stacked">
				
				<section id="buttons">
				<a class="btn btn-default" href="<?php echo e(route('admin.students.pending')); ?>" >Pending students</a>
				<br>
				</br>
				</section>				
				<div class="widget-header">
					<i class="icon-list-alt"></i>
					<h3>Students</h3>
				</div> 
				
				
				<div class="widget-content">
					<div class="table-responsive">
					<table id="datatable" class="table table-bordered table-hover table-striped">
					        <thead>
					          <tr>
					            <th>#</th>
					            <th>Student Id</th>
					            <th>Name</th>
					            <th>Gender</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Action</th>
					          </tr>
					        </thead>
					        <tbody>
							<?php if(sizeof($students) == 0): ?>
							<td style="text-align: center;" colspan="7"> No student yet </td>
							<?php endif; ?>
							 <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					          <tr>
					            <td><?php echo e($key+1); ?></td>
					            <td><?php echo e($student->student_id); ?></td>
					            <td><?php echo e($student->name); ?></td>
					            <td><?php echo e($student->gender); ?></td>
					            <td><?php echo e($student->email); ?></td>
					            <td><?php echo e($student->phone); ?></td>
					            <td width="20%">
								<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit<?php echo e($student->id); ?>">Edit</a>
								<?php if($student->active == 1): ?>
								<a class="btn btn-danger btn-sm" id="deactivate" sid="<?php echo e($student->student_id); ?>">Deactivate</a>
							    <?php else: ?>
								<a class="btn btn-success btn-sm" id="activate" sid="<?php echo e($student->student_id); ?>">Activate</a>
							    <?php endif; ?>
								</td>
					          </tr>
					         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					        </tbody>
					      </table>
						  <?php echo e($students->links('pagination.simple')); ?>

					  </div> 
					
				</div> <!-- /widget-content -->
			
			</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('modal'); ?>
<?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="edit<?php echo e($student->student_id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit student</h5>

      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data" action="<?php echo e(route('admin.students.update')); ?>">
			<?php echo e(csrf_field()); ?>

			<input type="hidden" name="id" value="<?php echo e($student->student_id); ?>">
          <div class="form-group">
            <label for="title-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" value="<?php echo e($student->name); ?>" name="name">
          </div>
         <div class="form-group">
            <label for="title-name" class="col-form-label">Gender:</label>
            <select name="gender" class="form-control">
				                <option value="">Select...</option>
				                <option value="male" <?php if($student->gender == "male"): ?> selected <?php endif; ?> >Male</option>
				                <option value="female" <?php if($student->gender == "female"): ?> selected <?php endif; ?>>Female</option>
				              </select>
          </div>
         <div class="form-group">
            <label for="title-name" class="col-form-label">Email:</label>
            <input type="email" class="form-control" value="<?php echo e($student->email); ?>" name="email">
          </div>
         <div class="form-group">
            <label for="title-name" class="col-form-label">Phone:</label>
            <input type="text" class="form-control" value="<?php echo e($student->phone); ?>" name="phone">
          </div>
         <div class="form-group">
            <label for="title-name" class="col-form-label">Academic year:</label>
            <input type="text" class="form-control" value="<?php echo e($student->academic_year); ?>" name="academic_year">
          </div>
         
		 
		   <div class="form-group">
		   <label>Image:</label>
		   <input type="file" name="image" id="input-file-now" data-height="150" class="dropify" data-default-file="<?php if($student->image == null): ?><?php echo e(asset('assets/img/no-image.png')); ?><?php else: ?><?php echo e(asset('assets/img/students/')); ?>/<?php echo e($student->image); ?><?php endif; ?>">
           </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="cancel-btn" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
	   </form>
    </div>
  </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('assets/admin/js/plugins/msgbox/jquery.msgbox.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('assets/vendor/dropify/css/dropify.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/admin/js/plugins/msgbox/jquery.msgbox.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/dropify/js/dropify.min.js')); ?>"></script>
<script>
<?php if(count($students) < 5): ?>
$('.footer').attr('style','margin-top: 230px');
<?php endif; ?>
$("a#deactivate").click(function(){

    var msgid = $(this).attr("sid");
 	$.msgbox("Are you sure that you want to Deactivate this student?", {
		  type: "confirm",
		  buttons : [
		    {type: "submit", value: "Yes"},
		    {type: "submit", value: "No"}
		  ]
		}, function(result) {
		  if (result == "Yes") {
			  
	   $.post("<?php echo e(route('admin.students.status')); ?>",
       {
         id: msgid,
		 active: 0,
         _token: '<?php echo e(csrf_token()); ?>',
       },
       function(data, statusText, resObject) {
		   $.msgGrowl ({
			type: 'success'
			, title: 'Success'
			, text: 'Student deactivated. Reload the page to see the result.'
			, position: 'top-right'
		});
       }
    );
		  }
		});	
});

$("a#activate").click(function(){

    var msgid = $(this).attr("sid");
 	$.msgbox("Are you sure that you want to Activate this student?", {
		  type: "confirm",
		  buttons : [
		    {type: "submit", value: "Yes"},
		    {type: "submit", value: "No"}
		  ]
		}, function(result) {
		  if (result == "Yes") {
			  
	   $.post("<?php echo e(route('admin.students.status')); ?>",
       {
         id: msgid,
		 active: 1,
         _token: '<?php echo e(csrf_token()); ?>',
       },
       function(data, statusText, resObject) {
		   $.msgGrowl ({
			type: 'success'
			, title: 'Success'
			, text: 'Student activated. Reload the page to see the result.'
			, position: 'top-right'
		});
       }
    );
		  }
		});	
});

$('.dropify').dropify({
    messages: {
        'default': 'Drag and drop a file here or click',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Remove',
        'error':   'Ooops, something wrong happended.'
    }
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>