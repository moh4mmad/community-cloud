<?php $__env->startSection('title'); ?>Registraion - <?php echo e($details->title); ?> - <?php echo e($front->title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('og_title'); ?>Registraion - <?php echo e($details->title); ?> - <?php echo e($front->title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?><?php echo e(str_limit(strip_tags($details->content), 150)); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('og_description'); ?><?php echo e(str_limit(strip_tags($details->content), 150)); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('keyword'); ?>registraion,events, <?php echo e($front->keywords); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('og_image'); ?><?php echo e(asset('assets/img/event/')); ?>/<?php echo e($details->image); ?><?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div id="wrapper">
        <header>
		<?php echo $__env->make('front.mainmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->make('front.mobilemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </header>
		
        <div class="inner-page-banner-area">
            <div class="container">
                <div class="pagination-area">
                    <h1>Registraion - <?php echo e($details->title); ?></h1>
                    <ul>
                        <li><a href="<?php echo e(route('home')); ?>">Home</a> -</li>
                        <li>Registraion</li>
                    </ul>
                </div>
            </div>
        </div>
		
		
        <div class="registration-page-area bg-secondary">
            <div class="container">
                <h2 class="sidebar-title">Participant informations</h2>
                <div class="registration-details-area inner-page-padding">
				
				
                    <form id="registration" method="post">
					<?php echo e(csrf_field()); ?>

                        <div class="row">
                           
						   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label" for="first-name">Name *</label>
                                    <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control">
                                </div>
                            </div>
							
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label" for="first-name">E-mail *</label>
                                    <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control">
                                </div>
                            </div>
                         </div>
                        
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label" for="gender">Gender *</label>
                                    <div class="custom-select">
                                        <select name="gender" class="select2">
                                            <option value="">Select gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label" for="first-name">Phone *</label>
                                    <input type="text" name="phone" value="<?php echo e(old('phone')); ?>" class="form-control">
                                </div>
                            </div>
                        </div>
						
						<div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                               <div class="form-group">
                                    <label class="control-label" for="first-name">University *</label>
                                    <input type="text" name="university" value="<?php echo e(old('university')); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label" for="first-name">Department *</label>
                                    <input type="text" name="department" value="<?php echo e(old('department')); ?>" class="form-control">
                                </div>
                            </div>
                        </div>
						
						<div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                               <div class="form-group">
                                    <label class="control-label" for="first-name">Student ID *</label>
                                    <input type="text" name="student_id" value="<?php echo e(old('student_id')); ?>" class="form-control">
                                </div>
                            </div>
							
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                               <div class="form-group">
                                    <label class="control-label" for="first-name">Semester *</label>
                                    <input type="text" name="semester" value="<?php echo e(old('semester')); ?>" class="form-control">
                                </div>
                            </div>
                        </div>
						
						<h2 class="sidebar-title">Payment informations</h2>
						
						<div class="row">
                           
						   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label" for="first-name">Bkash Transaction id *</label>
                                    <input type="text" name="transaction_id" value="<?php echo e(old('transaction_id')); ?>" class="form-control">
                                </div>
                            </div>
							
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label" for="first-name">Sender number *</label>
                                    <input type="text" name="sender" value="<?php echo e(old('sender')); ?>" class="form-control">
                                </div>
                            </div>
                         </div>
						 
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="pLace-order mt-30">
                                    <button class="view-all-accent-btn disabled" type="submit" value="Login">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
	</div>
	
	<div id="success_modal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="fa fa-check"></i>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body text-center">
				<h4>Thank you for your time!</h4>	
				<p>We have recived your submission. You will be notified by email when your registration is confirmed.</p>
				<button class="btn btn-success" data-dismiss="modal"><span>Close </span> <i class="fa fa-window-close" aria-hidden="true"></i></button>
			</div>
		</div>
	</div>
</div>
	<div id="error_modal" class="modal fade">
	<div class="modal-dialog modal-error">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="fa fa-times" aria-hidden="true"></i>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body text-center">
				<h4>Something went wrong!</h4>	
				<div class="alert alert-danger" role="alert"></div>
				<button class="btn btn-danger" data-dismiss="modal">Try Again</button>
			</div>
		</div>
	</div>
</div>   
	
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/select2.min.js')); ?>" type="text/javascript"></script>
<script>
$(document).ready(function (e) {
			$("#registration").on('submit',(function(e) {
				$("#preloader").show();
				e.preventDefault();
				$.ajax({
					url: "<?php echo e(route('event.reg.submit', $details->id)); ?>",
					type: "POST",
					data:  new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success: function(data) {
						$("#preloader").hide();
						$('#success_modal').modal('show');
						$('#registration')[0].reset();
					},
					error: function (xhr) {
						$("#preloader").hide();
						$('#error_modal').modal('show');
						var mdl = $('#error_modal');
						$('#error_modal .alert-danger').empty();
						$.each(xhr.responseJSON.errors, function(key,value) {
							mdl.find('.alert-danger').append(value+'<br>');
							});
					}
						
	   });
	}));
});
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/css/select2.min.css')); ?>">
<style>
.modal-confirm {		
		color: #434e65;
		width: 525px;
	}
	.modal-confirm .modal-content {
		padding: 20px;
		font-size: 16px;
		border-radius: 5px;
		border: none;
	}
	.modal-confirm .modal-header {
		background: #47c9a2;
		border-bottom: none;   
        position: relative;
		text-align: center;
		margin: -20px -20px 0;
		border-radius: 5px 5px 0 0;
		padding: 35px;
	}
	.modal-confirm h4 {
		text-align: center;
		font-size: 36px;
		margin: 10px 0;
	}
	.modal-confirm .form-control, .modal-confirm .btn {
		min-height: 40px;
		border-radius: 3px; 
	}
	.modal-confirm .close {
        position: absolute;
		top: 15px;
		right: 15px;
		color: #fff;
		text-shadow: none;
		opacity: 0.5;
	}
	.modal-confirm .close:hover {
		opacity: 0.8;
	}
	.modal-confirm .icon-box {
		color: #fff;		
		width: 95px;
		height: 95px;
		display: inline-block;
		border-radius: 50%;
		z-index: 9;
		border: 5px solid #fff;
		padding: 15px;
		text-align: center;
	}
	.modal-confirm .icon-box i {
		font-size: 64px;
		margin: -4px 0 0 -4px;
	}
	.modal-confirm.modal-dialog {
		margin-top: 80px;
	}
	.modal-error {		
		color: #434e65;
		width: 525px;
	}
	.modal-error .modal-content {
		padding: 20px;
		font-size: 16px;
		border-radius: 5px;
		border: none;
	}
	.modal-error .modal-header {
		background: #e85e6c;
		border-bottom: none;   
        position: relative;
		text-align: center;
		margin: -20px -20px 0;
		border-radius: 5px 5px 0 0;
		padding: 35px;
	}
	.modal-error h4 {
		text-align: center;
		font-size: 36px;
		margin: 10px 0;
	}
	.modal-error .form-control, .modal-error .btn {
		min-height: 40px;
		border-radius: 3px; 
	}
	.modal-error .close {
        position: absolute;
		top: 15px;
		right: 15px;
		color: #fff;
		text-shadow: none;
		opacity: 0.5;
	}
	.modal-error .close:hover {
		opacity: 0.8;
	}
	.modal-error .icon-box {
		color: #fff;		
		width: 95px;
		height: 95px;
		display: inline-block;
		border-radius: 50%;
		z-index: 9;
		border: 5px solid #fff;
		padding: 15px;
		text-align: center;
	}
	.modal-error .icon-box i {
		font-size: 58px;
		margin: -2px 0 0 -2px;
	}
	.modal-error.modal-dialog {
		margin-top: 80px;
	}
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>