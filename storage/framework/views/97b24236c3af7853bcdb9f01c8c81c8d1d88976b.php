<?php $__env->startSection('title'); ?><?php echo e($member->name); ?> - <?php echo e($front->title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('og_title'); ?><?php echo e($member->name); ?> - <?php echo e($front->title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?><?php echo e($member->name); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('og_description'); ?><?php echo e($member->name); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('keyword'); ?><?php echo e($member->name); ?>, <?php echo e($front->keywords); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('og_image'); ?><?php echo e(asset('assets/img/executivebody/')); ?>/<?php echo e($member->image); ?><?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div id="wrapper">
        <header>
		<?php echo $__env->make('front.mainmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->make('front.mobilemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </header>
		
		
        <div class="inner-page-banner-area">
            <div class="container">
                <div class="pagination-area">
                    <h1>Executive body details</h1>
                    <ul>
                        <li><a href="<?php echo e(route('home')); ?>">Home</a> -</li>
                        <li>Executive body details</li>
                    </ul>
                </div>
            </div>
        </div>
		
        <div class="lecturers-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="lecturers-contact-info">
                            <img src="<?php if($member->image == null): ?><?php echo e(asset('assets/img/no-image.png')); ?><?php else: ?><?php echo e(asset('assets/img/executivebody/')); ?>/<?php echo e($member->image); ?><?php endif; ?>" class="img-responsive" alt="team">
                            <h2><?php echo e($member->name); ?></h2>
                            <h3><?php echo e($member->position); ?></h3>
                            <ul class="lecturers-social2">
                                <li><a href="Tel:<?php echo e($member->phone); ?>"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
                                    <li><a href="mailto:<?php echo e($member->email); ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
                                    <li><a target="_blank" href="<?php echo e($member->linkedin_url); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a target="_blank" href="<?php echo e($member->fb_url); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            </ul>
                            <ul class="lecturers-contact">
                                <li><i class="fa fa-phone" aria-hidden="true"></i><?php echo e($member->phone); ?></li>
                                <li><i class="fa fa-envelope-o" aria-hidden="true"></i><?php echo e($member->email); ?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
					<?php if(!$member->content == null): ?>
                        <h3 class="title-default-left title-bar-big-left-close">About</h3>
                        <p><?php echo $member->content; ?></p>
					<?php endif; ?>
                        <div class="leave-comments">
                            <h3 class="title-default-left title-bar-big-left-close">Contact</h3>
                            <div class="row">
                                <div class="contact-form">
								<div id="success_msg" class="alert alert-success" role="alert">Your message has been send successfully.</div>
								<div id="error_msg" class="alert alert-danger" role="alert"></div>
                                    <form id="contact" method="post" >
									<?php echo e(csrf_field()); ?>

                                        <fieldset>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" name="name" placeholder="Name" class="form-control">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="email" name="email" placeholder="Email" class="form-control">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <textarea placeholder="Message" name="message" class="textarea form-control" id="form-message" rows="8" cols="20"></textarea>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group margin-bottom-none">
                                                    <button type="submit" class="view-all-accent-btn">Send</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
$("#success_msg").hide();
$("#error_msg").hide();
$('#contact').on('submit',function(event){
$("#preloader").show();

       $.ajax({
        url: "<?php echo e(route('executivebody.contact', $member->id)); ?>",
        type: "post",
        data:  new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success: function(data, statusText, resObject) {
						$("#preloader").hide();
						$("#success_msg").show();
						$("#error_msg").hide();
						$('#contact')[0].reset();
					},
					error: function (xhr) {
						$("#preloader").hide();
						$("#success_msg").hide();
						$("#error_msg").empty();
						$.each(xhr.responseJSON.errors, function(key,value) {
							$("#error_msg").append(value+"<br>");
							});	
						$("#error_msg").show();
						}
		});


return false;
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>