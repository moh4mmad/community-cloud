<?php $__env->startSection('title'); ?> Students | <?php echo e($system->app_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="wrapper">
        <div class="container-fluid">
            
			<div class="row">
                <div class="col-sm-12 text-center">
                    <div class="page-title-box">
                        <h4 class="page-title">Students data</h4> <hr/> <a href="<?php echo e(route('acad.student.add')); ?>" role="button" class="btn btn-info waves-effect waves-light">Add new student data</a></div>
                </div>
            </div>
			
            <div class="row">
                <div class="col-xl">
                    <div class="card">
					
					<li class="list-inline-item hide-phone app-search">
					<form role="search" method="post" action="<?php echo e(route('acad.students.search')); ?>">
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
											<th style="text-align:center" width="30%" class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
									<tbody>
									<?php if(!count($students)): ?>  <td colspan="7" style="text-align: center">No student found </td> <?php endif; ?>
									<?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count => $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
									        <td><?php echo e($student->student_id); ?></td>
											<td><?php echo e($student->Department->short); ?></td>
                                            <td><?php echo e($student->name); ?></td>
											<td><?php echo e($student->phone); ?></td>
											<td><?php echo e($student->email); ?></td>
											<td><?php echo e($student->Guardian->phone); ?></td>
											<td>
											<a style="border-radius: 2px; font-size: 12px;" type="button" href="<?php echo e(route('acad.students.view', $student->student_id)); ?>" class="btn btn-primary waves-effect waves-light btn-sm">View</a>
											<a style="border-radius: 2px; font-size: 12px;" type="button" href="<?php echo e(route('acad.students.result', $student->student_id)); ?>" class="btn btn-primary waves-effect waves-light btn-sm">Result</a>
											<a style="border-radius: 2px; font-size: 12px;" type="button" href="<?php echo e(route('acad.students.deposid', $student->student_id)); ?>" class="btn btn-primary waves-effect waves-light btn-sm">Deposits</a>
											<a style="border-radius: 2px; font-size: 12px;" type="button" href="<?php echo e(route('acad.students.billing', $student->student_id)); ?>" class="btn btn-primary waves-effect waves-light btn-sm">Billing</a>
											<a style="border-radius: 2px; font-size: 12px;" type="button" href="<?php echo e(route('acad.students.completedcourses', $student->student_id)); ?>" class="btn btn-primary waves-effect waves-light btn-sm">Courses</a>
											<button style="border-radius: 2px; font-size: 12px;" type="button" data-toggle="modal" data-target="#edit_<?php echo e($student->student_id); ?>" class="btn btn-primary waves-effect waves-light btn-sm">Update</button>
											<button style="border-radius: 2px; font-size: 12px;" type="button" data-toggle="modal" data-target="#guardian<?php echo e($student->student_id); ?>" class="btn btn-primary waves-effect waves-light btn-sm">Guardian</button>
											<button style="border-radius: 2px; font-size: 12px;" type="button" id="changepass" student_id="<?php echo e($student->student_id); ?>" class="btn btn-info waves-effect waves-light btn-sm">Change password</button>
											<?php if($student->active == 1): ?>
											<button style="border-radius: 2px; font-size: 12px;" type="button" id="deactivate" student_id="<?php echo e($student->student_id); ?>" class="btn btn-danger waves-effect waves-light btn-sm">Deactivate</button>
										    <?php else: ?>
											<button style="border-radius: 2px; font-size: 12px;" type="button" id="activate" student_id="<?php echo e($student->student_id); ?>" class="btn btn-info waves-effect waves-light btn-sm">Activate</button>
										<?php endif; ?>
											</td>
											
                                        </tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</tbody>
                                </table>
								</div>
                        </div>
                        
                    </div>
								<?php echo e($students->render()); ?>

								
                    
                </div>
              
            </div>

            
        </div>
        
    </div>
	<?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="modal fade" id="edit_<?php echo e($student->student_id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelgrad" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit student data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
										<form method="post" action="<?php echo e(route('acad.students.update')); ?>">
										<?php echo e(csrf_field()); ?>

										<input type="hidden" name="student_id" value="<?php echo e($student->student_id); ?>">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Student id</label>
                                                        <input type="text" class="form-control" value="<?php echo e($student->student_id); ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Student Image</label>
                                                        <input type="file" accept="image/*"  name="image" id="input-file-now" class="dropify" data-default-file="<?php if($student->image == null): ?><?php echo e(asset('assets/image/students/noimg.png')); ?><?php else: ?><?php echo e(asset('assets/image/students')); ?>/<?php echo e($student->image); ?><?php endif; ?>">
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Department</label>
                                                        <input type="text" class="form-control" value="<?php echo e($student->Department->short); ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Student name</label>
                                                        <input type="text" class="form-control" value="<?php echo e($student->name); ?>" name="name">
                                                    </div>
                                                </div>
                                            </div>
											<?php 
											$date = \Carbon\Carbon::parse($student->dob, 'UTC');
											$dob = $date->format('Y-m-d');
											?>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Student date of birth</label>
                                                        <input type="date" class="form-control" value="<?php echo e($dob); ?>" name="dob">
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Student gender</label>
													    <select class="form-control" name="gender">
														<option value="male" <?php if($student->gender == "male"): ?> selected  <?php endif; ?>>Male</option>
														<option value="female" <?php if($student->gender == "female"): ?> selected  <?php endif; ?>>Female</option>
														</select>
												</div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Student phone</label>
                                                        <input type="text" class="form-control" value="<?php echo e($student->phone); ?>" name="phone">
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Student email</label>
                                                        <input type="email" class="form-control" value="<?php echo e($student->email); ?>" name="email">
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Student religion</label>
                                                        <input type="text" class="form-control" value="<?php echo e($student->religion); ?>" name="religion">
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Father name</label>
                                                        <input type="text" class="form-control" value="<?php echo e($student->father_name); ?>" name="father_name">
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Mother name</label>
                                                        <input type="text" class="form-control" value="<?php echo e($student->mother_name); ?>" name="mother_name">
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Address</label>
                                                        <input type="text" class="form-control" value="<?php echo e($student->address); ?>" name="address">
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">City</label>
                                                        <input type="text" class="form-control" value="<?php echo e($student->city); ?>" name="city">
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">State</label>
                                                        <input type="text" class="form-control" value="<?php echo e($student->state); ?>" name="state">
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Postcode</label>
                                                        <input type="text" class="form-control" value="<?php echo e($student->postcode); ?>" name="postcode">
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Country</label>
                                                        <input type="text" class="form-control" value="<?php echo e($student->country); ?>" name="country">
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Credit limit</label>
                                                        <input type="text" class="form-control" value="<?php echo e($student->credit_limit); ?>" name="credit_limit">
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
		
	<?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="modal fade" id="guardian<?php echo e($student->student_id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelgrad" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit guardian data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
										<form method="post" enctype="multipart/form-data" action="<?php echo e(route('acad.students.guardian.update')); ?>">
										<?php echo e(csrf_field()); ?>

										<input type="hidden" name="student_id" value="<?php echo e($student->student_id); ?>">
                                        <div class="modal-body">
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Guardian's name</label>
                                                        <input type="text" class="form-control" value="<?php echo e($student->Guardian->name); ?>" name="guardian_name">
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Guardian's phone</label>
                                                        <input type="text" class="form-control" value="<?php echo e($student->Guardian->phone); ?>" name="guardian_phone">
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Guardian's email</label>
                                                        <input type="email" class="form-control" value="<?php echo e($student->Guardian->email); ?>" name="guardian_email">
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Guardian's password</label>
                                                       <input type="password" name="guardian_password" class="form-control" placeholder="Leave blank if you don't want to change">
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
<script src="<?php echo e(asset('assets/app/plugins/dropify/js/dropify.min.js')); ?>"></script>
<script>
$('.dropify').dropify({
    messages: {
        'default': 'Drag and drop a file here or click',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Remove',
        'error':   'Ooops, something wrong happended.'
    }
});
$('button#changepass').confirm({
    title: 'Change password',
    content: function() {
	return (
    '<form>' +
    '<div class="form-group">' +
    '<label>Change password for ' + this.$target.attr("student_id") + '</label>' +
    '<input type="text" name="password" placeholder="Password" class="password form-control" required />' +
    '</div>' +
    '</form>')},
    buttons: {
        formSubmit: {
            text: 'Submit',
            btnClass: 'btn-blue',
            action: function () {
                var password = this.$content.find('.password').val();
                if(!password){
                    $.alert('Enter a password');
                    return false;
                }
                var form = $('<form action="<?php echo e(route("acad.students.password")); ?>" method="post">' +
				             '<input type="hidden" name="student_id" value="' + this.$target.attr("student_id") + '" />' +
							 '<input type="hidden" name="password" value="' + password + '" />' +
							 '<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />' +
							 '</form>');
				$('body').append(form);
			    form.submit();
            }
        },
        cancel: function () {

        },
    },
	onContentReady: function () {
        var jc = this;
        this.$content.find('form').on('submit', function (e) {
            e.preventDefault();
            jc.$$formSubmit.trigger('click');
        });
	}
});


$('button#deactivate').confirm({
	
	title: 'Are you sure?',
    content: 'To deactivate this student click on confirm',
    type: 'red',
    typeAnimated: true,
    buttons: {
        tryAgain: {
            text: 'Confirm',
            btnClass: 'btn-success',
            action: function(){
				
				var form = $('<form action="<?php echo e(route("acad.students.deactivate")); ?>" method="post">' +
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

$('button#activate').confirm({
	
	title: 'Are you sure?',
    content: 'To activate this student click on confirm',
    type: 'red',
    typeAnimated: true,
    buttons: {
        tryAgain: {
            text: 'Confirm',
            btnClass: 'btn-success',
            action: function(){
				
				var form = $('<form action="<?php echo e(route("acad.students.activate")); ?>" method="post">' +
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
<link rel="stylesheet" href="<?php echo e(asset('assets/app/plugins/sweet-alert2/sweetalert2.min.css')); ?>">
<link href="<?php echo e(asset('assets/app/plugins/dropify/css/dropify.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('acad.app.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>