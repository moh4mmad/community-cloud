<?php $__env->startSection('title'); ?> Students <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="col-md-12"> 
<div class="widget stacked">
				
				<section id="buttons">
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#addnews" >Pending students</button>
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
							<td style="text-align: center;" colspan="5"> No student yet </td>
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
								<?php if($student->active == 0): ?>
								<a class="btn btn-danger btn-sm" id="deactivate" id="<?php echo e($student->id); ?>">Deactivate</a>
							    <?php else: ?>
								<a class="btn btn-success btn-sm" id="deactivate" id="<?php echo e($student->id); ?>">Activate</a>
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
<?php echo $__env->make('admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>