<?php $__env->startSection('title'); ?> Students <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="col-md-12"> 
<div class="widget stacked">
				
							
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
							<td style="text-align: center;" colspan="7"> No pending request</td>
							<?php endif; ?>
							 <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					          <tr id="raw<?php echo e($student->student_id); ?>">
					            <td><?php echo e($key+1); ?></td>
					            <td><?php echo e($student->student_id); ?></td>
					            <td><?php echo e($student->name); ?></td>
					            <td><?php echo e($student->gender); ?></td>
					            <td><?php echo e($student->email); ?></td>
					            <td><?php echo e($student->phone); ?></td>
					            <td width="20%">
								<a class="btn btn-success btn-sm" id="approve" sid="<?php echo e($student->student_id); ?>">Approve</a>
								<a class="btn btn-danger btn-sm" id="remove" sid="<?php echo e($student->student_id); ?>">Remove</a>
								
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
$("a#approve").click(function(){

    var msgid = $(this).attr("sid");
 	$.msgbox("Are you sure that you want to approve this student?", {
		  type: "confirm",
		  buttons : [
		    {type: "submit", value: "Yes"},
		    {type: "submit", value: "No"}
		  ]
		}, function(result) {
		  if (result == "Yes") {
			  
	   $.post("<?php echo e(route('admin.students.approve')); ?>",
       {
         id: msgid,
		 active: 0,
         _token: '<?php echo e(csrf_token()); ?>',
       },
       function(data, statusText, resObject) {
		   $.msgGrowl ({
			type: 'success'
			, title: 'Success'
			, text: 'Student approved.'
			, position: 'top-right'
		});
		$('#raw'+msgid).remove();
       }
    );
		  }
		});	
});

$("a#remove").click(function(){

    var msgid = $(this).attr("sid");
 	$.msgbox("Are you sure that you want to remove this student?", {
		  type: "confirm",
		  buttons : [
		    {type: "submit", value: "Yes"},
		    {type: "submit", value: "No"}
		  ]
		}, function(result) {
		  if (result == "Yes") {
			  
	   $.post("<?php echo e(route('admin.students.remove')); ?>",
       {
         id: msgid,
		 active: 1,
         _token: '<?php echo e(csrf_token()); ?>',
       },
       function(data, statusText, resObject) {
		   $.msgGrowl ({
			type: 'success'
			, title: 'Success'
			, text: 'Student removed. Reload the page to see the result.'
			, position: 'top-right'
		});
		$('#raw'+msgid).remove();
       }
    );
		  }
		});	
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>