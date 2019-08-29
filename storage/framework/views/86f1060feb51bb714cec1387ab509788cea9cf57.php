<?php $__env->startSection('title'); ?>Contact us - <?php echo e($front->title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('og_title'); ?>Contact us - <?php echo e($front->title); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?>Contact us - <?php echo e($front->title); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('og_description'); ?>Contact us - <?php echo e($front->title); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('keyword'); ?>Contact, <?php echo e($front->keywords); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('og_image'); ?><?php echo e($front->og_img); ?><?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div id="wrapper">
        <header>
		<?php echo $__env->make('front.mainmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		<?php echo $__env->make('front.mobilemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </header>
		
        <div class="inner-page-banner-area">
            <div class="container">
                <div class="pagination-area">
                    <h1>Contact us</h1>
                    <ul>
                        <li><a href="<?php echo e(route('home')); ?>">Home</a> -</li>
                        <li>Contact us</li>
                    </ul>
                </div>
            </div>
        </div>
		
        <div class="contact-us-page1-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="contact-us-info1">
                            <ul>
                                <li>
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <h3>Phone</h3>
                                    <p><?php echo e($front->phone); ?></p>
                                </li>
                                <li>
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <h3>Address</h3>
                                    <p><?php echo e($front->address); ?></p>
                                </li>
                                <li>
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                    <h3>E-mail</h3>
                                    <p><?php echo e($front->email); ?></p>
                                </li>
                                <li>
                                    <h3>Follow Us</h3>
                                    <ul class="contact-social">
                                        <li><a target="_blank" href="<?php echo e($front->fb_url); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a target="_blank" href="<?php echo e($front->twitter_url); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a target="_blank" href="<?php echo e($front->linkedin_url); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a target="_blank" href="<?php echo e($front->pinterest_url); ?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                    <li><a target="_blank" href="<?php echo e($front->rss_url); ?>"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                    <li><a target="_blank" href="<?php echo e($front->google_plus_url); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h2 class="title-default-left title-bar-high">Contact With Us</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="contact-form1">
                                <form id="contact">
								<?php echo e(csrf_field()); ?>

                                    <fieldset>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" placeholder="Name*" class="form-control" name="name" id="form-name" data-error="Name field is required" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="email" placeholder="Email*" class="form-control" name="email" id="form-email" data-error="Email field is required" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <textarea placeholder="Message*" class="textarea form-control" name="message" id="form-message" rows="8" cols="20" data-error="Message field is required" required></textarea>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-sm-12">
                                            <div class="form-group margin-bottom-none">
                                                <button type="submit" class="default-big-btn">Send Message</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-6 col-sm-12">
                                            <div class="form-response"></div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="google-map-area">
                        <div id="googleMap" style="width:100%; height:395px;"></div>
                    </div>
                </div>
            </div>
        </div>
	 
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYsP4mQjjlkRtYC1YokMJOx835FTQq3IQ"></script>
<script src="<?php echo e(asset('assets/js/validator.min.js')); ?>" type="text/javascript"></script>
<script>
var contactForm = $('#contact');
    if (contactForm.length) {
        contactForm.validator().on('submit', function(e) {
            var _this = $(this),
                target = contactForm.find('.form-response');
            if (e.isDefaultPrevented()) {
                target.html("<div class='alert alert-danger'><p>Please select all required field.</p></div>");
            } else {
                $.ajax({
                    url: "<?php echo e(route('contact.submit')); ?>",
                    type: "POST",
                    data: contactForm.serialize(),
                    beforeSend: function() {
                        target.html("<div class='alert alert-info'><p>Loading ...</p></div>");
                    },
					success: function(data, statusText, resObject) {
						    _this[0].reset();
                            target.html("<div class='alert alert-success'><p><i class='fa fa-check'></i>Message has been sent successfully.</p></div>");
					},
					error: function (xhr) {
						$.each(xhr.responseJSON.errors, function(key,value) {
							target.html("<div class='alert alert-danger'><p>" + value + "</p></div>");
							});	
					}
                });
                return false;
            }
        });
    }
	
	
	if ($('#googleMap').length) {
		
        var initialize = function() {
            var mapOptions = {
                zoom: 18,
                scrollwheel: false,
                center: new google.maps.LatLng(22.498249,91.719473)
            };
            var map = new google.maps.Map(document.getElementById("googleMap"),
                mapOptions);
            var marker = new google.maps.Marker({
                position: map.getCenter(),
                animation: google.maps.Animation.BOUNCE,
                icon: '<?php echo e(asset('assets/img/map-marker.png')); ?>',
                map: map
            });
        }

        google.maps.event.addDomListener(window, "load", initialize);
    }
	
	
	
	
	
	
	
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>