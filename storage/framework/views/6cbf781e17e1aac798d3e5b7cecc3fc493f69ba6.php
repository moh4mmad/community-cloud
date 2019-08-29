<?php $__env->startSection('title'); ?> Pending Registration <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="col-md-12"> 
<div class="widget stacked">
							
				<div class="widget-header">
					<i class="icon-list-alt"></i>
					<h3>Registration pending individual members information</h3>
				</div> 
				
				
				<div class="widget-content">
					<div class="table-responsive">
					<table id="datatable" class="table table-bordered table-hover table-striped">
					        <thead>
					          <tr>
					            <th>#</th>
					            <th>Id</th>
					            <th>Name</th>
					            <th>Gender</th>
								<th>Email</th>
								<th>Phone</th>
								<th>University</th>
								<th>Department</th>
								<th>Semester</th>
								<th>Transaction id</th>
								<th>Sender</th>
								<th>Action</th>
					          </tr>
					        </thead>
					        <tbody>
							<?php if(sizeof($members) == 0): ?>
							<td style="text-align: center;" colspan="12"> No data yet </td>
							<?php endif; ?>
							 <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					          <tr id="raw<?php echo e($member->id); ?>">
					            <td><?php echo e($key+1); ?></td>
					            <td><?php echo e($member->student_id); ?></td>
								<td><?php echo e($member->name); ?></td>
								<td><?php echo e($member->gender); ?></td>
								<td><?php echo e($member->email); ?></td>
								<td><?php echo e($member->phone); ?></td>
								<td><?php echo e($member->institute); ?></td>
								<td><?php echo e($member->department); ?></td>
								<td><?php echo e($member->semester); ?></td>
					            <td><?php echo e($member->transaction_id); ?></td>
								<td><?php echo e($member->sender); ?></td>
								<td width="">
								<a class="btn btn-success btn-sm"  id="approve" teamid="<?php echo e($member->id); ?>">Approve</a>
								<a class="btn btn-danger btn-sm" id="remove" teamid="<?php echo e($member->id); ?>">Remove</a>
								</td>
					          </tr>
					         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					        </tbody>
					      </table>
						  <?php echo e($members->links('pagination.simple')); ?>

					  </div> 
					
				</div> <!-- /widget-content -->
			
			</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('assets/admin/js/plugins/msgbox/jquery.msgbox.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/admin/js/plugins/msgbox/jquery.msgbox.min.js')); ?>"></script>
<script>
<?php if(count($members) < 7): ?>
$('.footer').attr('style','margin-top: 230px');
<?php endif; ?>
$("a#approve").click(function(){

    var teamid = $(this).attr("teamid");
 	$.msgbox("Are you sure that you want to approve this member?", {
		  type: "confirm",
		  buttons : [
		    {type: "submit", value: "Yes"},
		    {type: "submit", value: "No"}
		  ]
		}, function(result) {
		  if (result == "Yes") {
			  
	   $.post("<?php echo e(route('admin.events.reg.approve')); ?>",
       {
         id: teamid,
		 type: "individual",
         _token: '<?php echo e(csrf_token()); ?>',
       },
       function(data, statusText, resObject) {
		   $.msgGrowl ({
			type: 'success'
			, title: 'Success'
			, text: 'Member Approved.'
			, position: 'top-right'
		});
		$('#raw'+teamid).remove();
       }
    );
		  }
		});	
});

$("a#remove").click(function(){

    var teamid = $(this).attr("teamid");
 	$.msgbox("Are you sure that you want to remove this member?", {
		  type: "confirm",
		  buttons : [
		    {type: "submit", value: "Yes"},
		    {type: "submit", value: "No"}
		  ]
		}, function(result) {
		  if (result == "Yes") {
			  
	   $.post("<?php echo e(route('admin.events.reg.remove')); ?>",
       {
         id: teamid,
		 type: "individual",
         _token: '<?php echo e(csrf_token()); ?>',
       },
       function(data, statusText, resObject) {
		   $.msgGrowl ({
			type: 'success'
			, title: 'Success'
			, text: 'Data removed.'
			, position: 'top-right'
		});
		$('#raw'+teamid).remove();
       }
    );
		  }
		});	
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>