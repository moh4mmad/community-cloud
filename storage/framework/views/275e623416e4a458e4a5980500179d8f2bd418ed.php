<?php $__env->startSection('title'); ?> Registered Members <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="col-md-12"> 
<div class="widget stacked">
							
				<div class="widget-header">
					<i class="icon-list-alt"></i>
					<h3>Registered Members</h3>
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
								<td>
								<a class="btn btn-info btn-sm">Edit</a>
								<a class="btn btn-info btn-sm">Send mail</a>
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
<?php $__env->startSection('script'); ?>
<script>
<?php if(count($members) < 7): ?>
$('.footer').attr('style','margin-top: 230px');
</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>