<?php $__env->startSection('title'); ?> Pending Registration <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="col-md-12"> 
<div class="widget stacked">
							
				<div class="widget-header">
					<i class="icon-list-alt"></i>
					<h3>Registration pending team information</h3>
				</div> 
				
				
				<div class="widget-content">
					<div class="table-responsive">
					<table id="datatable" class="table table-bordered table-hover table-striped">
					        <thead>
					          <tr>
					            <th>#</th>
					            <th>Team name</th>
					            <th>Gender</th>
								<th>Email</th>
								<th>Members</th>
								<th>Transaction id</th>
								<th>Sender</th>
								<th>Action</th>
					          </tr>
					        </thead>
					        <tbody>
							<?php if(sizeof($teams) == 0): ?>
							<td style="text-align: center;" colspan="8"> No data yet </td>
							<?php endif; ?>
							 <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					          <tr id="raw<?php echo e($team->id); ?>">
					            <td><?php echo e($key+1); ?></td>
					            <td><?php echo e($team->team_name); ?></td>
								<td><?php echo e($team->team_gender); ?></td>
								<td><?php echo e($team->team_email); ?></td>
								<td><?php echo e($team->total_team_member); ?></td>
								<td><?php echo e($team->transaction_id); ?></td>
								<td><?php echo e($team->sender); ?></td>
					            <td width="35%">
								<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#teammembers<?php echo e($team->id); ?>">Members</a>
								<a class="btn btn-success btn-sm"  id="approve" teamid="<?php echo e($team->id); ?>">Approve</a>
								<a class="btn btn-danger btn-sm" id="remove" teamid="<?php echo e($team->id); ?>">Remove</a>
								</td>
					          </tr>
					         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					        </tbody>
					      </table>
						  <?php echo e($teams->links('pagination.simple')); ?>

					  </div> 
					
				</div> <!-- /widget-content -->
			
			</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('modal'); ?>
<?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="teammembers<?php echo e($team->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 900px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Team members</h5>

      </div>
      <div class="modal-body">
		<div class="table-responsive">
					<table id="datatable" class="table table-bordered table-hover table-striped">
					        <thead>
					          <tr>
					            <th>Id</th>
								<th>Name</th>
					            <th>Email</th>
								<th>Phone</th>
								<th>University</th>
								<th>Department</th>
								<th>Semester</th>
					          </tr>
					        </thead>
					        <tbody>
							<?php
							$members = \App\TeamMembers::where('team_id', $team->id)->get();
							?>
							<?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					          <tr>
					            <td><?php echo e($member->student_id); ?></td>
								<td><?php echo e($member->name); ?></td>
								<td><?php echo e($member->email); ?></td>
								<td><?php echo e($member->phone); ?></td>
								<td><?php echo e($member->institute); ?></td>
								<td><?php echo e($member->department); ?></td>
								<td><?php echo e($member->semester); ?></td>
					          </tr>
					         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
					      </table>
					  </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="cancel-btn" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('assets/admin/js/plugins/msgbox/jquery.msgbox.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/admin/js/plugins/msgbox/jquery.msgbox.min.js')); ?>"></script>
<script>
<?php if(count($teams) < 7): ?>
$('.footer').attr('style','margin-top: 230px');
<?php endif; ?>
$("a#approve").click(function(){

    var teamid = $(this).attr("teamid");
 	$.msgbox("Are you sure that you want to approve this team?", {
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
		 type: "team",
         _token: '<?php echo e(csrf_token()); ?>',
       },
       function(data, statusText, resObject) {
		   $.msgGrowl ({
			type: 'success'
			, title: 'Success'
			, text: 'Team Approved.'
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
 	$.msgbox("Are you sure that you want to remove this team?", {
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
		  type: "team",
         _token: '<?php echo e(csrf_token()); ?>',
       },
       function(data, statusText, resObject) {
		   $.msgGrowl ({
			type: 'success'
			, title: 'Success'
			, text: 'data removed.'
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