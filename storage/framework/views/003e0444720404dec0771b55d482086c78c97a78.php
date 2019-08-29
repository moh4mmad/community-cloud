<!DOCTYPE html>
<html lang="en" class="js">
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo e($front->description); ?>">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?php echo e(asset('assets/front/images/favicon.png')); ?>">
    <!-- Site Title  -->
     <meta name="keywords" content="<?php echo e($front->keyword); ?>">
    
    <title><?php echo e($front->title); ?></title>
    <!-- Vendor Bundle CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/front/css/vendor.bundle059a.css?ver=124')); ?>">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/front/css/style059a.css?ver=124')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/front/css/theme.css?ver=124')); ?>">

</head>

<body class="theme-lavendar io-lavendar" data-spy="scroll" data-target="#mainnav" data-offset="80">

    <!-- Header --> 
    <header class="site-header is-sticky">
        <!-- Navbar -->
        <div class="navbar navbar-expand-lg is-transparent" id="mainnav">
            <nav class="container">

                <a class="navbar-brand animated" data-animate="fadeInDown" data-delay=".65" href="<?php echo e(route('index')); ?>">
                    <img class="logo logo-dark" alt="logo" src="<?php echo e(asset('assets/front/images/logo.png')); ?>" srcset="<?php echo e(asset('assets/front/images/logo2x.png 2x')); ?>">
                    <img class="logo logo-light" alt="logo" src="<?php echo e(asset('assets/front/images/logo-full-white.png')); ?>" srcset="<?php echo e(asset('assets/front/images/logo-full-white2x.png 2x')); ?>">
                </a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggle">
                    <span class="navbar-toggler-icon">
                        <span class="ti ti-align-justify"></span>
                    </span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarToggle">
                    <ul class="navbar-nav animated remove-animation" data-animate="fadeInDown" data-delay=".75">
                       
                        <li class="nav-item"><a class="nav-link menu-link" href="#notice">Announcement</a></li>
                        <li class="nav-item"><a class="nav-link menu-link" href="#about">About</a></li>
                        <?php if($front->team == 1): ?>
                        <li class="nav-item"><a class="nav-link menu-link" href="#team">Team</a></li>
                        <?php endif; ?>
                        <li class="nav-item"><a target="_blank" class="nav-link menu-link" href="assets/whitepaper.pdf" target="_blank">Whitepaper</a></li>
                        <li class="nav-item"><a class="nav-link menu-link" href="#token">Tokens</a></li>
                        <li class="nav-item"><a class="nav-link menu-link" href="#roadmap">Roadmap</a></li>
                        <li class="nav-item"><a class="nav-link menu-link" href="#faq">Faqs</a></li>
                        <li class="nav-item"><a class="nav-link menu-link" href="<?php echo e(route('airdrop')); ?>">Airdrop</a></li>
                    </ul>
                    <ul class="navbar-btns animated remove-animation" data-animate="fadeInDown" data-delay=".85">
                        <li class="nav-item"><a class="nav-link btn btn-white btn-sm menu-link" href="<?php echo e(route('crowdsale')); ?>">Buy Token</a></li>
                    
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End Navbar -->

        <!-- Banner/Slider -->
        <div id="header" class="banner">
            <div class="banner-rounded-bg" style="background: #16a3fe;">
                <!-- Place Particle Js -->
                <div id="particles-js" class="particles-container particles-js"></div>
                <span class="banner-shade-1">
                    <span class="banner-shade-2">
                        <span class="banner-shade-3"></span>
                    </span>
                </span>
            </div>
            <div class="container">
                <div class="banner-content">
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <div class="header-txt">
                                <h1 class="animated" data-animate="fadeInUp" data-delay="1.25"><br><br><?php echo e($front->header_1); ?> <span></span></h1>
                                
                                <p class="lead animated" data-animate="fadeInUp" data-delay="1.35"><?php echo $front->header_2; ?></p>
                       
                        
                            </div>
                        </div><!-- .col  -->
                    </div><!-- .row  -->
                </div><!-- .banner-content  -->
            
            
    </header>
    
    
    
    
        <!-- Start Section -->
    <div class="section media-scetion no-pb section-pad section-bg-light" id="media">
        <div class="container">
            
                
            </div>  
            
        </div>
    </div>
    <!-- End Section -->
    

    <div class="section section-pad roadmap-section no-pb section-bg-light" id="notice">
        <div class="container">
            <div class="row justify-content-center">
        
                    <h3 align="center">
                    IMPORTANT ANNOUNCEMENT<hr color="blue"></h3>
                    <h6><br> <?php echo $front->announcement; ?><hr></h6>  
                    <h6><br> <hr></h6>  
                <h3 align="center">
                   ICO <?php echo e($front->token_symbol); ?> Token Ecosystem</h3> <p>
                        <img src="<?php echo e($front->announcement_img); ?>" align="center">
                    </p>
            </div>
        </div>
      </div>

    <!-- Start Section -->
    <div class="section about-section section-pad no-pb section-bg-light" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="about-section-innr section-bg-lavendar">
                        <div class="about-shade"></div>
                        <h6 class="animated" data-animate="fadeInUp" data-delay=".2">About <?php echo e($front->token_symbol); ?></h6>
                        <h3 class="animated" data-animate="fadeInUp" data-delay=".3"><p><?php echo e($front->about_1); ?></p></h3>
                    <p><?php echo $front->about_2; ?></p>
                        <div class="about-info animated" data-animate="fadeInUp" data-delay=".7">
                            <em class="ti ti-rocket"></em>
                            <p><?php echo e($front->about_3); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="about-image animated" data-animate="fadeInUp" data-delay=".8">
                        <img src="<?php echo e(asset('assets/front/images/graph-lavendar-a.png')); ?>" alt="working graph of <?php echo e($front->token_symbol); ?> ">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Section -->
        <!-- Start Section -->
    <div class="section section-pad roadmap-section no-pb section-bg-light" id="roadmap">
        <div class="container">
            <div class="row justify-content-center">
                        <div class="col-md-6">
                    <div class="section-head-s3 text-center">
                        <h2 class="section-title animated" data-animate="fadeInUp" data-delay=".1">Roadmap</h2>
                        <p class="animated" data-animate="fadeInUp" data-delay=".2">With help from our teams, contributors and investors these are the milestones we are looking forward to achieve.</p>
                    </div>
                </div>
            </div>
            <div class="roadmap-carousel-container animated" data-animate="fadeInUp" data-delay=".3" >
                <div class="roadmap-carousel">
                    <?php $__currentLoopData = $roadmap; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $map): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="roadmap-item">
                        <h6><?php echo e($map->time); ?></h6>
                        <p><?php echo e($map->details); ?></p>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div><!-- .container  -->
    </div>
    <!-- End Section -->
    
    
    <!-- Start Section -->
    <div class="section reason-scetion no-pb section-pad section-bg-light" id="why">
        <div class="container">
            <div class="section-head-s3 text-center">
                <h2 class="section-title animated" data-animate="fadeInUp" data-delay=".1">Why Invest <?php echo e($front->token_symbol); ?> Network ?</h2>
            </div>
            <div class="shadow round-md plr-x4">
                <div class="gaps size-2x"></div>
                <div class="row text-left">
                    <div class="col-md-6 res-m-bttm">
                        <div class="reason-item animated" data-animate="fadeInUp" data-delay=".2">
                        
                            <h5>Balanced Token Distribution</h5>
                            <p><?php echo $invest->invest_1; ?></p>
                        </div>
                    </div>
                    <div class="col-md-6 res-m-bttm">
                        <div class="reason-item animated" data-animate="fadeInUp" data-delay=".3">
                        
                            <h5>Most Profitable ITO</h5>
                            <p><?php echo $invest->invest_2; ?></p>
                        </div>
                    </div>
                    <div class="col-md-6 res-m-bttm">
                        <div class="reason-item animated" data-animate="fadeInUp" data-delay=".4">
                            
                            <h5>Experienced &amp; Dedicated Team</h5>
                            <p> <?php echo $invest->invest_3; ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="reason-item animated" data-animate="fadeInUp" data-delay=".5">
                            
                            <h5>Robust Technology</h5>
                            <p> <?php echo $invest->invest_4; ?></p>
                        </div>
                    </div>
                </div><!-- .row  -->
                <div class="gaps size-2x"></div>
            </div>
        </div><!-- .container  -->
    </div>
    <!-- End Section --> 
    
    
    
    
    
    <!-- Start Section -->
    <div class="section section-pad status-section section-bg-light-alt" id="token">
        <div class="container">
            <div class="section-head-s3 text-center">
                <h2 class="section-title animated" data-animate="fadeInUp" data-delay=".1">Token Distribution</h2>
            </div>
            <div class="row event-info">
                <div class="col-md-4 col-sm-6">
                    <div class="event-single-info animated" data-animate="fadeInUp" data-delay=".2">
                        <h6> Start</h6>
                        <p> <?php echo e($token->start); ?></p>
                    </div>
                </div><!-- .col  -->
                <div class="col-md-4 col-sm-6">
                    <div class="event-single-info animated" data-animate="fadeInUp" data-delay=".3">
                        <h6> Number of tokens for sale</h6>
                        <p> <?php echo e($token->sale); ?></p>
                    </div>
                </div><!-- .col  -->
                <div class="col-md-4 col-sm-6">
                    <div class="event-single-info animated" data-animate="fadeInUp" data-delay=".4">
                        <h6> Tokens for airdrop & community building</h6>
                        <p> <?php echo e($token->airdrop); ?></p>
                    </div>
                </div><!-- .col  -->
                <div class="col-md-4 col-sm-6">
                    <div class="event-single-info animated" data-animate="fadeInUp" data-delay=".4">
                        <h6> Tokens for team & nDEX Network</h6>
                        <p> <?php echo e($token->team); ?></p>
                    </div>
                </div> <!--Pre-sale one info-->
                <div class="col-md-4 col-sm-6">
                    <div class="event-single-info animated" data-animate="fadeInUp" data-delay=".4">
                        <h6> Tokens for Pre-Sale</h6>
                        <p> <?php echo $token->presale; ?></p>
                    </div>
                </div> <!--Pre-Sale two info-->
                    <div class="col-md-4 col-sm-6">
                    <div class="event-single-info animated" data-animate="fadeInUp" data-delay=".4">
                        <h6> Tokens for ITO</h6>
                        <p> <?php echo $token->transfer; ?></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="event-single-info animated" data-animate="fadeInUp" data-delay=".5">
                        <h6>Tokens exchange rate</h6>
                        <p><?php echo e($token->exchange); ?> </p>
                    </div>
                </div><!-- .col  -->
                <div class="col-md-4 col-sm-6">
                    <div class="event-single-info animated" data-animate="fadeInUp" data-delay=".6">
                        <h6>Acceptable currency</h6>
                        <p><?php echo e($token->curency); ?></p>
                    </div>
                </div><!-- .col  -->
                <div class="col-md-4 col-sm-6">
                    <div class="event-single-info animated" data-animate="fadeInUp" data-delay=".7">
                        <h6>Min/Max transaction amount (No cap)</h6>
                        <p><?php echo e($token->transaction); ?></p>
                    </div>
                </div><!-- .col  -->
            </div><!-- .row  -->

            <div class="gaps size-3x"></div><div class="gaps size-3x d-none d-lg-block"></div><!-- .gaps  -->

        

        </div><!-- .container  -->
    </div>
    <!-- End Section -->
        
<!-- Start Section -->
    <div class="section team-section section-pad section-bg-light-alt section-fix" id="team">
        <div class="container">
            <div class="section-head-s3 text-center">
                <h2 class="section-title animated" data-animate="fadeInUp" data-delay=".1">Our Team</h2>
            </div>
            <div class="row">
                <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 col-lg-4 d-inline-flex justify-content-center">
                    <div class="team-described animated" data-animate="fadeInUp" data-delay=".2">
                        <div class="d-flex">
                            
                            <div class="team-info">
                                <h5 class="team-name"><?php echo e($team->name); ?></h5>
                                <span class="team-title"><?php echo e($team->positon); ?> <br>  </span>
                                <ul class="team-social">
                                    <li><a href="<?php echo e($team->social_1); ?>/"><em class="fab fa-linkedin-in"></em></a></li>
                                    <li><a href="<?php echo e($team->social_2); ?>"><em class="fab fa-twitter"></em></a></li>
                                </ul>
                            </div>
                            <div class="team-profile-photo">
                                            <img src="<?php echo e($team->img); ?>" alt="" />
                                        </div>
                        </div>
                        <ul class="team-discription">
                            <?php
                            $works = \App\TeamWork::where('memberid', $team->id)->get();
                            ?>
                            <?php $__currentLoopData = $works; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $work): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($work->job); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div><!-- .col  -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                </div>>
        </div>
    
    <!-- Start Section -->
    
    
    <!-- Start Section -->
    <div class="section section-pad no-pb section-bg-light" id="faq">
        <div class="container">
            <div class="section-head-s3 text-center">
                <h2 class="section-title animated" data-animate="fadeInUp" data-delay=".1">Frequently asked questions</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="accordion animated" data-animate="fadeInUp" data-delay=".2" id="accordion-1">
                        <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card">
                            <div class="card-header">
                                <h5>
                                    <a data-toggle="collapse" data-target="#collapse-<?php echo e($key); ?>">
                                        <?php echo e($faq->qus); ?><span class="plus-minus"><span class="ti ti-angle-up"></span></span>
                                    </a>
                                </h5>
                            </div>
                            <div id="collapse-<?php echo e($key); ?>" class="collapse  <?php if($loop->first): ?> show <?php endif; ?>" data-parent="#accordion-1">
                                <div class="card-body">
                                <p><?php echo $faq->ans; ?></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div><!-- End col -->
            </div><!-- End row -->
        </div><!-- End container -->
    </div>
    <!-- End Section -->


    <!-- Start Section -->
    <div class="section subscribe-scetion section-pad section-bg-light" id="subscribe">
        <div class="container">
            <div class="row  justify-content-center text-center">
                <div class="col-lg-6 res-l-bttm">
                    <div class="subscribe-rounded">
                        <h5 class="animated" data-animate="fadeInUp" data-delay=".1">Don't miss out, Be the first to know</h5>
                        
                        <div class="gaps"></div>
                        <a target="_blank" href="<?php echo e($social->telegram); ?>" class="btn btn-simple animated" data-animate="fadeInUp" data-delay=".4"> <em class="fa fa-paper-plane"></em> Join us on Telegram</a>
                    </div>
                </div><!-- .col  -->
            </div><!-- .row  -->
        </div><!-- .container  -->
    </div>
    <!-- End Section -->
    
    <!-- Start Section -->
    <div class="section footer-scetion footer-lavendar">
        <div class="social-overlap">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <ul class="social-bar animated" data-animate="fadeInUp" data-delay=".1">
                            <li>Follow us</li>
                            <li><a target="_blank" href="<?php echo e($social->facebook); ?>"><em class="fab fa-facebook-f"></em></a></li>
                            <li><a target="_blank" href="<?php echo e($social->twitter); ?>"><em class="fab fa-twitter"></em></a></li>
                            <li><a target="_blank" href="<?php echo e($social->github); ?>"><em class="fab fa-github"></em></a></li>
                            <li><a target="_blank" href="<?php echo e($social->bitcoin); ?>"><em class="fab fa-bitcoin"></em></a></li>
                            <li><a target="_blank" href="<?php echo e($social->medium); ?>"><em class="fab fa-medium-m"></em></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="gaps size-4x"></div>
        <div class="gaps size-2x d-none d-sm-block"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-lg-3 res-m-bttm">
                    <a class="footer-brand animated" data-animate="fadeInUp" data-delay=".2" href="index.html">
                        <img class="logo logo-light" alt="logo" src="<?php echo e(asset('assets/front/images/logo-full-white.png')); ?>" srcset="<?php echo e(asset('assets/front/images/logo-full-white2x.png 2x')); ?>">
                    </a>
                </div><!-- .col  -->
                <div class="col-sm-4 col-lg-2 res-l-bttm">
                    <ul class="link-widget one-column animated" data-animate="fadeInUp" data-delay=".3">
                        <li><a href="#token" class="menu-link">Tokens Sales</a></li>
                            <li><a target="_blank" href="assets/whitepaper.pdf" class= "menu-link">Whitepaper</a></li>
                        <li><a href="#roadmap" class="menu-link">Roadmap</a></li>
                        <li><a href="#about" class="menu-link">What is <?php echo e($front->token_symbol); ?></a></li>
                        <li><a href="#why" class="menu-link">why ?</a></li>
                    </ul>
                </div><!-- .col  -->
                <div class="col-sm-4 col-lg-2 res-l-bttm">
                    <ul class="link-widget one-column animated" data-animate="fadeInUp" data-delay=".4">
                        <li><a href="#team" class="menu-link">Teams</a></li>
                        <li><a href="#about" class="menu-link">About</a></li>
                        <li><a href="mailto:<?php echo e($front->contact); ?>" class="menu-link">Contact</a></li>
                        <li><a href="#faq" class="menu-link">Faqs</a></li>
                        <li><a href="#subscribe" class="menu-link">Join Us</a></li>
                    </ul>
                </div><!-- .col  -->
                <div class="col-sm-4 col-lg-3">
                    <ul class="address-widget animated" data-animate="fadeInUp" data-delay=".5">
                        <li><?php echo e(url('/')); ?></li>
                        <li><?php echo e($front->contact); ?></li>
                    </ul>
                </div><!-- .col  -->
            </div><!-- .row  -->
        </div><!-- .container  -->
        
        <hr class="hr-line"><!-- .hr-line  -->
        
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <span class="copyright-text">
                        <p><?php echo $front->footer_2; ?></p>
            <hr class="hr-line"><!-- .hr-line  -->
                        <?php echo e($front->footer_1); ?>

                    </span>
                </div><!-- .col  -->
                <div class="col-md-5 text-right mobile-left">
                    <ul class="footer-links">
                        <li><a href="#Privacy policy will updated soon">Privacy Policy</a></li>
                        <li><a href="#Terms and conditions will update soon">Terms &amp; Conditions</a></li>
                    </ul>
                </div><!-- .col  -->
            </div><!-- .row  -->
        </div><!-- .container  -->
        <div class="gaps size-2x"></div>
    </div>
    <!-- End Section -->

     <div id="preloader">
        <div id="loader"></div>
        <div class="loader-section loader-top"></div>
        <div class="loader-section loader-bottom"></div>
    </div>

    <script src="<?php echo e(asset('assets/front/js/jquery.bundle059a.js?ver=124')); ?>"></script>
    <script src="<?php echo e(asset('assets/front/js/script059a.js?ver=124"')); ?>"></script>

</body>
</html>

