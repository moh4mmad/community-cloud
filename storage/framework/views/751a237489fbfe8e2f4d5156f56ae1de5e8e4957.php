 <footer>
            <div class="footer-area-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-box">
                                <a><img class="img-responsive" src="<?php echo e(asset('assets/img/logo-footer.png')); ?>" alt="logo"></a>
                                <div class="footer-about">
                                    <p><?php echo e($front->footer); ?></p>
                                </div>
                                <ul class="footer-social">
                                    <li><a target="_blank" href="<?php echo e($front->fb_url); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a target="_blank" href="<?php echo e($front->twitter_url); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a target="_blank" href="<?php echo e($front->linkedin_url); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a target="_blank" href="<?php echo e($front->pinterest_url); ?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                    <li><a target="_blank" href="<?php echo e($front->rss_url); ?>"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                    <li><a target="_blank" href="<?php echo e($front->google_plus_url); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-box">
                                <h3>Featured Links</h3>
                                <ul class="featured-links">
                                    <li>
                                        <ul>
                                            <li><a href="#">IIUC </a></li>
                                            <li><a href="#">News</a></li>
                                            <li><a href="#">Faculty</a></li>
                                            <li><a href="#">Executives</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li><a href="#">Lab Assistance</a></li>
                                            <li><a href="#">Office Stuff</a></li>
                                            <li><a href="#">Achievements</a></li>
                                            <li><a href="#">Committee</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-box">
                                <h3>Information</h3>
                                <ul class="corporate-address">
                                    <li><i class="fa fa-phone" aria-hidden="true"></i><a href="Tel:<?php echo e($front->phone); ?>"> <?php echo e($front->phone); ?></a></li>
                                    <li><i class="fa fa-envelope-o" aria-hidden="true"></i><?php echo e($front->email); ?></li>
                                </ul>
                               
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-box">
                                 <div class="newsletter-area">
                                    <h3>Subscribe</h3>
                                    <div class="input-group stylish-input-group">
                                        <input type="text" placeholder="Enter your e-mail here" class="form-control">
                                        <span class="input-group-addon">
                                                <button type="submit">
                                                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                                </button>  
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-area-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <p>&copy; 2019 All Rights Reserved. &nbsp; Developed by<a target="_blank" href=""> Codeninjas</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>