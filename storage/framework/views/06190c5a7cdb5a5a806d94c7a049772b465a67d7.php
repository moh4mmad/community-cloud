<?php $__env->startSection('title'); ?> Students verification | <?php echo e($system->app_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="wrapper">
        <div class="container-fluid">
            
			<div class="row">
                <div class="col-sm-12 text-center">
                    <div class="page-title-box">
                        <h4 class="page-title">Student verification</h4></div>
                </div>
            </div>
			
            <div class="row">
                <div class="col-xl">
                    <div class="card">
					<li class="list-inline-item hide-phone app-search">
					<form role="search" method="post" action="<?php echo e(route('acad.students.verify.search')); ?>">
					<?php echo e(csrf_field()); ?>

					<input type="text" name="search" value="<?php echo e($data ? $data['search'] : ""); ?>" placeholder="Search student" class="form-control"> <a onclick="$(this).closest('form').submit()" href="#"><i class="fa fa-search">
					</i>
					</a>
					</form>
					</li>
                        <div class="card-body new-user">
						   <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
										    <th class="border-top-0">Id</th>
											<th class="border-top-0">Dept.</th>
											<th class="border-top-0">Name</th>
                                            <th class="border-top-0">Phone</th>
                                            <th class="border-top-0">Email</th>
											<th class="border-top-0">Guardian's phone</th>
											<th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
									<tbody>
									<?php if(!count($students)): ?>  <td colspan="8" style="text-align: center">No student data </td> <?php endif; ?>
									<?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count => $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
									      
									        <td><?php echo e($student->student_id); ?></td>
											<td><?php echo e($student->Department->short); ?></td>
                                            <td><?php echo e($student->name); ?></td>
											<td><?php echo e($student->phone); ?></td>
											<td><?php echo e($student->email); ?></td>
											<td><?php echo e($student->Guardian->phone); ?></td>
											<td>
											<a style="" type="button" href="<?php echo e(route('acad.students.view', $student->student_id)); ?>" class="btn btn-primary waves-effect waves-light btn-sm">View</a>
											
											<button type="button" id="approve" student_id="<?php echo e($student->student_id); ?>" class="btn btn-success waves-effect waves-light">Approve</button>

											<button type="button" id="remove" student_id="<?php echo e($student->student_id); ?>" class="btn btn-danger waves-effect waves-light">Remove data</button>

											</td>
											
                                        </tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</tbody>
                                </table>
								<?php echo e($students->render()); ?>

								</div>
                        </div>
                        
                    </div>
                    
                </div>
              
            </div>

            
        </div>
        
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/app/plugins/jqconfirm/jquery-confirm.min.js')); ?>"></script>
<script>
$('button#approve').confirm({
	
	title: 'Are you sure?',
    content: 'To approve this student click on confirm',
    type: 'red',
    typeAnimated: true,
    buttons: {
        tryAgain: {
            text: 'Confirm',
            btnClass: 'btn-success',
            action: function(){
				
				var form = $('<form action="<?php echo e(route("acad.students.approve")); ?>" method="post">' +
				             '<input type="hidden" name="student_id" value="' + this.$target.attr("student_id") + '" />' +
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

$('button#remove').confirm({
	
	title: 'Are you sure?',
    content: 'To remove this data click on confirm',
    type: 'red',
    typeAnimated: true,
    buttons: {
        tryAgain: {
            text: 'Confirm',
            btnClass: 'btn-success',
            action: function(){
				
				var form = $('<form action="<?php echo e(route("acad.students.remove")); ?>" method="post">' +
				             '<input type="hidden" name="student_id" value="' + this.$target.attr("student_id") + '" />' +
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
<?php echo $__env->make('acad.app.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>