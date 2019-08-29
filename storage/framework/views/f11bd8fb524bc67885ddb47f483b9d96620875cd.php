<?php $__env->startSection('title'); ?> System settings | <?php echo e($system->app_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="wrapper">
        <div class="container-fluid">
            
			<div class="row">
                <div class="col-sm-12 text-center">
                    <div class="page-title-box">
                        <h4 class="page-title">System settings</h4>
						</div>
                </div>
            </div>
			
            <div class="row">
                <div class="col-sm-6 mx-auto">
                    <div class="card">
					<div class="card-body">
                                <form action="<?php echo e(route('admin.system.update')); ?>" enctype="multipart/form-data" method="post">
								<?php echo e(csrf_field()); ?>

								
								<div class="form-group mb-0">
								 <h6 class="sub-title mb-3">University title</h6>
								  <input type="text" class="form-control" name="app_title" placeholder="<?php echo e($system->app_title); ?>" value="<?php echo e($system->app_title); ?>">
							    </div>
								
								<div class="form-group mb-0">
								 <h6 class="sub-title mb-3">University logo</h6>
								 <input type="file" accept="image/*" name="logo" id="input-file-now" data-height="150" class="dropify" data-default-file="<?php echo e(asset('assets/logo.png')); ?>">
							    </div>
								
								<div class="form-group mb-0">
								 <h6 class="sub-title mb-3">New student activation</h6>
								 
								 <div class="onoffswitch">
								 <input type="checkbox" name="member_reg" class="onoffswitch-checkbox" id="stdreg" <?php if($system->member_reg == 1): ?> checked <?php endif; ?>>
								 <label class="onoffswitch-label" for="stdreg">
								 <span class="onoffswitch-inner"></span>
								 <span class="onoffswitch-switch"></span>
								 </label>
								 </div>
							    </div>
								
								<div class="form-group mb-0">
								 <h6 class="sub-title mb-3">Course registration</h6>
								 <div class="onoffswitch">
								 <input type="checkbox" name="course_reg" class="onoffswitch-checkbox" id="coursereg" <?php if($system->course_reg == 1): ?> checked <?php endif; ?>>
								 <label class="onoffswitch-label" for="coursereg">
								 <span class="onoffswitch-inner"></span>
								 <span class="onoffswitch-switch"></span>
								 </label>
								 </div>
								 
							    </div>
								
								<div class="form-group mb-0">
								 <h6 class="sub-title mb-3">Course registration last date</h6>
								  <input class="form-control" type="datetime-local" name="reg_last_date" value="<?php echo e($last_reg_time); ?>">
							    </div>
								
								<div class="form-group mb-0">
								 <h6 class="sub-title mb-3">Default credit limit</h6>
								  <input class="form-control" type="number" name="default_credit_limit" value="<?php echo e($system->default_credit_limit); ?>">
							    </div>
								
								<div class="form-group mb-0">
								 <h6 class="sub-title mb-3">Controller of Examinations</h6>
								  <input class="form-control" type="text" name="exam_controller_name" value="<?php echo e($system->exam_controller_name); ?>">
							    </div>
								<div class="form-group mb-0">
								 <h6 class="sub-title mb-3">Controller of Examinations Sign</h6>
								 <input type="file" accept="image/*" name="sign" id="input-file-now" data-height="150" class="dropify" data-default-file="<?php echo e(asset('assets/image/admit/sign.png')); ?>">
							    </div>
								
								<br></br>
								<div class="form-group mb-0">
								<div>
        <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
    </div>
</div>
                                    
                                </form>
								
							</div>
					</div>
</div>
					</div>
            
        </div>
        
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('assets/app/plugins/dropify/css/dropify.min.css')); ?>" rel="stylesheet">
<style>
.onoffswitch {
    position: relative; width: 114px;
    -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
}
.onoffswitch-checkbox {
    display: none;
}
.onoffswitch-label {
    display: block; overflow: hidden; cursor: pointer;
    border: 2px solid #FFFFFF; border-radius: 0px;
}
.onoffswitch-inner {
    display: block; width: 200%; margin-left: -100%;
    transition: margin 0.3s ease-in 0s;
}
.onoffswitch-inner:before, .onoffswitch-inner:after {
    display: block; float: left; width: 50%; height: 47px; padding: 0; line-height: 47px;
    font-size: 25px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
    box-sizing: border-box;
}
.onoffswitch-inner:before {
    content: "ON";
    padding-left: 14px;
    background-color: #EEEEEE; color: #34A7C1;
}
.onoffswitch-inner:after {
    content: "OFF";
    padding-right: 14px;
    background-color: #EEEEEE; color: #999999;
    text-align: right;
}
.onoffswitch-switch {
    display: block; width: 25px; margin: 11px;
    background: #A1A1A1;
    position: absolute; top: 0; bottom: 0;
    right: 63px;
    border: 2px solid #FFFFFF; border-radius: 0px;
    transition: all 0.3s ease-in 0s; 
}
.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
    margin-left: 0;
}
.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
    right: 0px; 
    background-color: #34A7C1; 
}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
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
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.app.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>