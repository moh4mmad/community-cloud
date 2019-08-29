<?php $__env->startSection('title'); ?> Semester & Sections | <?php echo e($system->app_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="wrapper">
        <div class="container-fluid">
            
			<div class="row">
                <div class="col-sm-12 text-center">
                    <div class="page-title-box">
                        <h4 class="page-title">Semester & Sections</h4>
						<hr/>
						<button type="button" data-toggle="modal" data-target="#add_semester" class="btn btn-info waves-effect waves-light">Add semester</button>
						<button type="button" data-toggle="modal" data-target="#add_section" class="btn btn-info waves-effect waves-light">Add new section</button>
						</div>
                </div>
            </div>
			
            <div class="row">
               <div class="col-sm-7 mx-auto">
                    <div class="card">
					
                        <div class="card-body new-user">
						<h5 class="header-title mb-4 mt-0">Sections</h5>
						
						<div class="col-sm-3">
	<form action="<?php echo e(route('admin.SelectedDeptForSection')); ?>" method="post">
	<?php echo e(csrf_field()); ?>

	<div class="row">
     <div class="col-xs-3">
	<select class="form-control" name="dept">
										<?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($dept->short); ?>" <?php if(Request::segment(4) == $dept->short): ?> selected <?php endif; ?>><?php echo e($dept->short); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
										
										</div>
										<button type="submit" class="btn btn-primary waves-effect waves-light ml-2">Submit</button>
										</div>
										</form>
										
	</div>
						
						   <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
										    <th class="border-top-0">SL.</th>
                                            <th class="border-top-0">Semester</th>
											<th class="border-top-0">Dept.</th>
											<th class="border-top-0">Section</th>
											<th class="border-top-0">TotalSeat</th>
											<th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
									<tbody>
									<?php if(!count($sections)): ?>  <td colspan="5" style="text-align: center">No data found</td> <?php endif; ?>
									<?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count => $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
									      
									       <td><?php echo e($count+1); ?></td>
									       <td><?php echo e($section->Semester->semester); ?></td>
										   <td><?php echo e($section->Department->short); ?></td>
										   <td><?php echo e($section->section); ?></td>
										   <td><?php echo e($section->total_seat); ?></td>
											
											<td>
											<button style="border-radius: 2px; font-size: 12px;" type="button" data-toggle="modal" data-target="#edit_section<?php echo e($section->id); ?>" class="btn btn-primary waves-effect waves-light">Edit</button>
											<?php if($section->status == 0): ?>
												<button style="border-radius: 2px; font-size: 12px;" type="button" id="enable" section_id="<?php echo e($section->id); ?>" class="btn btn-success waves-effect waves-light">Enable</button>
											<?php else: ?>
												<button style="border-radius: 2px; font-size: 12px;" type="button" id="disable" section_id="<?php echo e($section->id); ?>" class="btn btn-danger waves-effect waves-light">Disable</button>
											<?php endif; ?>
											<button style="border-radius: 2px; font-size: 12px;" type="button" id="removesec" section_id="<?php echo e($section->id); ?>" class="btn btn-danger waves-effect waves-light">Remove</button>
											
											
										
											</td>
											
                                        </tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</tbody>
                                </table>
								</div>
                        </div>
                        
                    </div>
                    
                </div>
              <div class="col-sm-5 mx-auto">
                    <div class="card">
					
                        <div class="card-body new-user">
						<h5 class="header-title mb-4 mt-0">Semesters</h5>
						   <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
										    <th class="border-top-0">SL.</th>
                                            <th class="border-top-0">Semester</th>
											<th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
									<tbody>
									<?php if(!count($semesters)): ?>  <td colspan="5" style="text-align: center">No data found</td> <?php endif; ?>
									<?php $__currentLoopData = $semesters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count => $semester): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
									      
									       <td><?php echo e($count+1); ?></td>
									       <td><?php echo e($semester->semester); ?></td>
											
											<td>
											<button type="button" data-toggle="modal" data-target="#edit_semester<?php echo e($semester->id); ?>" class="btn btn-primary waves-effect waves-light">Edit</button>

											<button type="button" id="removesem" semester_id="<?php echo e($semester->id); ?>" class="btn btn-danger waves-effect waves-light">Remove</button>
											
											
										
											</td>
											
                                        </tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</tbody>
                                </table>
								</div>
                        </div>
                        
                    </div>
                    
                </div>
              
            </div>

            
        </div>
        
    </div>
	
	<div class="modal fade" id="add_semester" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelgrad" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add new semester</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
										<form method="post" action="<?php echo e(route('admin.semester.add')); ?>">
										<?php echo e(csrf_field()); ?>

                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Semester</label>
                                                        <input type="text" class="form-control" name="semester" placeholder="semester" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </div>
										</form>
                                    </div>
                                </div>
                            </div>
			<div class="modal fade" id="add_section" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelgrad" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add new section</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
										<form method="post" action="<?php echo e(route('admin.section.add')); ?>">
										<?php echo e(csrf_field()); ?>

                                        <div class="modal-body">
										
										<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Department</label>
                                                        <select class="form-control" name="department">
														<?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($dept->id); ?>" <?php if(Request::segment(4) == $dept->short): ?> selected <?php endif; ?>><?php echo e($dept->short); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														</select>
                                                    </div>
                                                </div>
                                            </div>
										
										
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Semester</label>
                                                        <select class="form-control" name="semester_id">
														<option selected disabled>Select semester</option>
														<?php $__currentLoopData = $semesters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $semester): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($semester->id); ?>"><?php echo e($semester->semester); ?> </option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														</select>
                                                    </div>
                                                </div>
												</div>
												<div class="row">
												<div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Section</label>
                                                        <input type="text" class="form-control" name="section" placeholder="section" >
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
												<div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Total seat</label>
                                                        <input type="text" class="form-control" name="total_seat" placeholder="Total seat" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </div>
										</form>
                                    </div>
                                </div>
                            </div>
	<?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="modal fade" id="edit_section<?php echo e($section->id); ?>" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit section</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
										<form method="post" action="<?php echo e(route('admin.section.edit')); ?>">
										<?php echo e(csrf_field()); ?>

										<input type="hidden" name="id" value="<?php echo e($section->id); ?>">
                                        <div class="modal-body">
										
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Semester</label>
                                                        <select class="form-control" name="semester_id">
														<option selected disabled>Select semester</option>
														<?php $__currentLoopData = $semesters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $semester): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($semester->id); ?>" <?php if($section->semesters_id == $semester->id): ?> selected <?php endif; ?>><?php echo e($semester->semester); ?> </option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														</select>
                                                    </div>
                                                </div>
												</div>
												<div class="row">
												<div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Section</label>
                                                        <input type="text" class="form-control" name="section" value="<?php echo e($section->section); ?>" placeholder="section" >
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
												<div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Total seat</label>
                                                        <input type="text" class="form-control" name="total_seat" value="<?php echo e($section->total_seat); ?>" placeholder="Total seat" >
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
	
	<?php $__currentLoopData = $semesters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $semester): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="modal fade" id="edit_semester<?php echo e($semester->id); ?>" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit semester</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
										<form method="post" action="<?php echo e(route('admin.semester.edit')); ?>">
										<?php echo e(csrf_field()); ?>

										<input type="hidden" name="id" value="<?php echo e($semester->id); ?>">
                                        <div class="modal-body">
												<div class="row">
												<div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Semester</label>
                                                        <input type="text" class="form-control" name="semester" value="<?php echo e($semester->semester); ?>" placeholder="semester" >
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
<script>
$('button#removesec').confirm({
	
	title: 'Are you sure?',
    content: 'To remove this section click on confirm',
    type: 'red',
    typeAnimated: true,
    buttons: {
        tryAgain: {
            text: 'Confirm',
            btnClass: 'btn-success',
            action: function(){
				
				var form = $('<form action="<?php echo e(route("admin.section.remove")); ?>" method="post">' +
				             '<input type="hidden" name="section_id" value="' + this.$target.attr("section_id") + '" />' +
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

$('button#removesem').confirm({
	
	title: 'Are you sure?',
    content: 'To remove this semester click on confirm',
    type: 'red',
    typeAnimated: true,
    buttons: {
        tryAgain: {
            text: 'Confirm',
            btnClass: 'btn-success',
            action: function(){
				
				var form = $('<form action="<?php echo e(route("admin.semester.remove")); ?>" method="post">' +
				             '<input type="hidden" name="semester_id" value="' + this.$target.attr("semester_id") + '" />' +
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

$('button#enable').confirm({
	
	title: 'Are you sure?',
    content: 'To enable this section click on confirm',
    type: 'red',
    typeAnimated: true,
    buttons: {
        tryAgain: {
            text: 'Confirm',
            btnClass: 'btn-success',
            action: function(){
				
				var form = $('<form action="<?php echo e(route("admin.section.status")); ?>" method="post">' +
				             '<input type="hidden" name="status" value="1" />' +
				             '<input type="hidden" name="section_id" value="' + this.$target.attr("section_id") + '" />' +
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

$('button#disable').confirm({
	
	title: 'Are you sure?',
    content: 'To disable this section click on confirm',
    type: 'red',
    typeAnimated: true,
    buttons: {
        tryAgain: {
            text: 'Confirm',
            btnClass: 'btn-success',
            action: function(){
				
				var form = $('<form action="<?php echo e(route("admin.section.status")); ?>" method="post">' +
				             '<input type="hidden" name="status" value="0" />' +
				             '<input type="hidden" name="section_id" value="' + this.$target.attr("section_id") + '" />' +
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
<?php echo $__env->make('admin.app.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>