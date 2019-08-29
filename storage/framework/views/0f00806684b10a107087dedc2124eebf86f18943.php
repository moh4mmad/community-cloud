<?php $__env->startSection('title'); ?> Frontend Settings <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="col-md-12">      		
      		
      		<div class="widget stacked ">
      			
      			<div class="widget-header">
      				<i class="icon-html5"></i>
      				<h3>Frontend Settings</h3>
  				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					
					
					
							<form id="update" class="form-horizontal col-md-8">
								<fieldset>
									
									<?php echo e(csrf_field()); ?>

									
									<div class="form-group">											
										<label for="firstname" class="col-md-4">Title</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="title" value="<?php echo e($front->title); ?>">
										</div>				
									</div>

									<div class="form-group">											
										<label for="firstname" class="col-md-4">Description</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="description" value="<?php echo e($front->description); ?>">
										</div>			
									</div>
									
									
									<div class="form-group">											
										<label for="firstname" class="col-md-4">Keywords</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="keywords" value="<?php echo e($front->keywords); ?>">
										</div>			
									</div>
									
									
									<div class="form-group">											
										<label for="firstname" class="col-md-4">Footer</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="footer" value="<?php echo e($front->footer); ?>">
										</div>			
									</div>
									
									
									<div class="form-group">											
										<label for="firstname" class="col-md-4">Keywords</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="keywords" value="<?php echo e($front->keywords); ?>">
										</div>			
									</div>
									
									
									<div class="form-group">											
										<label for="firstname" class="col-md-4">Phone</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="phone" value="<?php echo e($front->phone); ?>">
										</div>			
									</div>
									
									
									<div class="form-group">											
										<label for="firstname" class="col-md-4">Email</label>
										<div class="col-md-8">
											<input type="email" class="form-control" name="email" value="<?php echo e($front->email); ?>">
										</div>			
									</div>
									
									
									<div class="form-group">											
										<label for="firstname" class="col-md-4">About heading</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="about_1" value="<?php echo e($front->about_1); ?>">
										</div>			
									</div>
									
									
									<div class="form-group">											
										<label for="firstname" class="col-md-4">About description</label>
										<div class="col-md-8">
											<textarea class="form-control" name="about_2" rows="3"><?php echo e($front->about_2); ?></textarea>
										</div>			
									</div>
									
									
									<div class="form-group">											
										<label for="firstname" class="col-md-4">About image</label>
										<div class="col-md-8">
											<input type="file" name="about_img" id="input-file-now" data-height="150" class="dropify" data-default-file="<?php echo e(asset('assets/img/about')); ?>/<?php echo e($front->about_img); ?>">
										</div>			
									</div>
									
									
									<div class="form-group">											
										<label for="firstname" class="col-md-4">Video url</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="video_url" value="<?php echo e($front->video_url); ?>">
										</div>			
									</div>
									
									
									<div class="form-group">											
										<label for="firstname" class="col-md-4">Faculty members</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="faculty_members" value="<?php echo e($front->faculty_members); ?>">
										</div>			
									</div>
									
									
									<div class="form-group">											
										<label for="firstname" class="col-md-4">Achievements</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="achievements" value="<?php echo e($front->achievements); ?>">
										</div>			
									</div>
									
									
									<div class="form-group">											
										<label for="firstname" class="col-md-4">Publications</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="publications" value="<?php echo e($front->publications); ?>">
										</div>			
									</div>
									
									
									<div class="form-group">											
										<label for="firstname" class="col-md-4">Club members</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="club_members" value="<?php echo e($front->club_members); ?>">
										</div>			
									</div>
									
									
									<div class="form-group">											
										<label for="firstname" class="col-md-4">Fb url</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="fb_url" value="<?php echo e($front->fb_url); ?>">
										</div>			
									</div>
									
									
									<div class="form-group">											
										<label for="firstname" class="col-md-4">Twitter url</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="twitter_url" value="<?php echo e($front->twitter_url); ?>">
										</div>			
									</div>
									
									
									<div class="form-group">											
										<label for="firstname" class="col-md-4">Linkedin url</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="linkedin_url" value="<?php echo e($front->linkedin_url); ?>">
										</div>			
									</div>
									
									
									<div class="form-group">											
										<label for="firstname" class="col-md-4">Rss url</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="rss_url" value="<?php echo e($front->rss_url); ?>">
										</div>			
									</div>
									
									
									<div class="form-group">											
										<label for="firstname" class="col-md-4">Pinterest url</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="pinterest_url" value="<?php echo e($front->pinterest_url); ?>">
										</div>			
									</div>
									
									
									
									<div class="form-group">											
										<label for="firstname" class="col-md-4">Main logo</label>
										<div class="col-md-8">
											<input type="file" name="main_logo" id="input-file-now" data-height="150" class="dropify" data-default-file="<?php echo e(asset('assets/img/logo.png')); ?>">
										</div>			
									</div>
									
									
									<div class="form-group">											
										<label for="firstname" class="col-md-4">Mobile logo</label>
										<div class="col-md-8">
											<input type="file" name="mobile_logo" id="input-file-now" data-height="150" class="dropify" data-default-file="<?php echo e(asset('assets/img/mobile-logo.png')); ?>">
										</div>			
									</div>
									

										<br />
									
										
									<div class="form-group">

										<div class="col-md-offset-4 col-md-8">
											<button type="submit" class="btn btn-success">Update</button>
									</div> <!-- /form-actions -->
								</fieldset>
							</form>
					  
					  
					</div>
					
					
				</div> <!-- /widget-content -->
					
			</div> <!-- /widget -->
      
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('assets/vendor/dropify/css/dropify.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquary'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/vendor/dropify/js/dropify.min.js')); ?>"></script>
<script>
$('#update').on('submit',function(event){
       
	  
       $.ajax({
        url: "<?php echo e(route('admin.frontend.up')); ?>",
        type: "post",
        data:  new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success: function(data, statusText, resObject) {
						$.msgGrowl ({
							type: 'success'
							, title: 'Success'
							, text: 'Frontend updated.'
							, position: 'top-right'
							, lifetime: 999999999
							});
					},
					error: function (xhr) {
						$.each(xhr.responseJSON.errors, function(key,value) {
							$.msgGrowl ({
								type: 'error'
								, title: 'Error'
								, text: value
								, position: 'top-right'
								});
							});	
						}
		});


return false;
});

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
<?php echo $__env->make('admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>