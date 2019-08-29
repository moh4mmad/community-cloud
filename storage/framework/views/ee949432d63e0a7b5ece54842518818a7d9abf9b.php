<?php $__env->startSection('title'); ?> Student profile | <?php echo e($system->app_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="wrapper">
        <div class="container-fluid">
             
			<div class="text-center">
                <div class="col-sm-8 mx-auto">
                    <div class="page-title-box">
                        <h4 class="page-title">Student profile</h4>
						</div>
                </div>
            </div>
			
			<div class="row">
	<div class="col-md-12">

	<div class="card">
					<div class="card-body">
		
		<div class="row">
				
				<div class="col-md-3 text-center">
					<img class="rounded img-thumbnail" alt="Image Preview" src="<?php if($student->image == null): ?> <?php echo e(asset('assets/image/students/noimg.png')); ?> <?php else: ?> <?php echo e(asset('assets/image/students')); ?>/<?php echo e($student->image); ?> <?php endif; ?>" />
				</div>
				
				<div class="col-md-6">
				 <?php 
				 $date = \Carbon\Carbon::parse($student->dob, 'UTC');
				 $dob = $date->format('d F Y');
				 ?>
				<table class="table table-bordered">
    <thead>
        <tr>
            <th class="text-center"><strong>#</strong></th>
            <th class="text-center"><strong>Information</strong></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            
            <td align="center"><strong>Student Id</strong></td>
            <td align="center"><strong><?php echo e($student->student_id); ?></strong></td>
        </tr>
         <tr>
            
            <td align="center"><strong>Name</strong></td>
            <td align="center"><strong><?php echo e($student->name); ?></strong></td>
        </tr>
         <tr>
            
            <td align="center"><strong>Department</strong></td>
            <td align="center"><strong><?php echo e($student->Department->short); ?></strong></td>
        </tr>
         <tr>
            
            <td align="center"><strong>Date of birth</strong></td>
            <td align="center"><strong><?php echo e($dob); ?></strong></td>
        </tr>
        <tr>
            
            <td align="center"><strong>Religion</strong></td>
            <td align="center"><strong><?php echo e($student->religion); ?></strong></td>
        </tr>
		<tr>
            
            <td align="center"><strong>Admitted session</strong></td>
            <td align="center"><strong><?php echo e($student->Season->season); ?></strong></td>
        </tr>
		<tr>
            
            <td align="center"><strong>Father name</strong></td>
            <td align="center"><strong><?php echo e($student->father_name); ?></strong></td>
        </tr>
		<tr>
            
            <td align="center"><strong>Mother name</strong></td>
            <td align="center"><strong><?php echo e($student->mother_name); ?></strong></td>
        </tr>

		<tr>
            
            <td align="center"><strong>Guardian's name</strong></td>
            <td align="center"><strong><?php echo e($student->Guardian->name); ?></strong></td>
        </tr>
		<tr>
            
            <td align="center"><strong>Guardian's phone</strong></td>
            <td align="center"><strong><?php echo e($student->Guardian->phone); ?></strong></td>
        </tr>
		<tr>
            
            <td align="center"><strong>Guardian's email</strong></td>
            <td align="center"><strong><?php echo e($student->Guardian->email); ?></strong></td>
        </tr>
		

    </tbody>
</table>
				</div>
				<div class="col-md-3">
				<address>
			
				 <strong>Address:</strong><br /> <?php echo e($student->address); ?><br /> <?php echo e($student->city); ?>, <?php echo e($student->state); ?> <?php echo e($student->postcode); ?>, <?php echo e($student->country); ?><br /> <abbr title="Phone">Phone:</abbr> <?php echo e($student->phone); ?><br /> <abbr title="Email">Email:</abbr> <?php echo e($student->email); ?>

				 </address>
				
				</div>
			</div>
			
			
			</div>
		</div>
		</div>
	</div>

			
        </div>
        </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('acad.app.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>