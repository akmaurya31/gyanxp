<!DOCTYPE html>
<html lang="en">

<head>
    <!-- metas -->
    <meta charset="utf-8" />
    <meta name="author" content="Chitrakoot Web" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="keywords" content="Online Education Learning Template" />
    <meta name="description" content="eLearn - Online Education Learning Template" />

    <!-- title  -->
    <title>eLearn - Online Education Learning Template</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/logos/favicon.png" />
    <link rel="apple-touch-icon" href="<?php echo base_url();?>assets/img/logos/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url();?>assets/img/logos/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url();?>assets/img/logos/apple-touch-icon-114x114.png" />

    <!-- plugins -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/plugins.css" />

    <!-- search css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/search.css" />

    <!-- quform css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/base.css">

    <!-- core style css -->
    <link href="<?php echo base_url();?>assets/css/styles.css" rel="stylesheet" />

    <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" />

</head>

<body>

    <!-- PAGE LOADING
    ================================================== -->
    <div id="preloader"></div>

    <!-- MAIN WRAPPER
    ================================================== -->
    <div class="main-wrapper">

        <!-- HEADER
        ================================================== -->
        <header class="header-style1 menu_area-light">

            <div class="navbar-default border-bottom border-color-light-white">

                <!-- start top search -->
                <div class="top-search bg-primary">
                    <div class="container">
                        <form class="search-form" action="search.html" method="GET" accept-charset="utf-8">
                            <div class="input-group">
                                <span class="input-group-addon cursor-pointer">
                                    <button class="search-form_submit fas fa-search text-white" type="submit"></button>
                                </span>
                                <input type="text" class="search-form_input form-control" name="s" autocomplete="off" placeholder="Type & hit enter...">
                                <span class="input-group-addon close-search mt-1"><i class="fas fa-times"></i></span>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end top search -->

                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-12">
                            <div class="menu_area alt-font">
                                <nav class="navbar navbar-expand-lg navbar-light p-0">
                                    <div class="navbar-header navbar-header-custom">
                                        <!-- start logo -->
                                        <a href="<?php echo base_url();?>" class="navbar-brand"><img id="logo" src="<?php echo base_url();?>assets/img/logos/logo-inner.png" alt="logo" /></a>
                                        <!-- end logo -->
                                    </div>

                                    <div class="navbar-toggler bg-primary"></div>

                                    <!-- start menu area -->
                                    <ul class="navbar-nav ms-auto" id="nav" style="display: none;">
                                        <li><a href="<?php echo base_url();?>">Home</a></li>
                                        <li><a href="<?php echo base_url('about-us');?>">About us</a></li>
                                        
                                        <li><a href="#!">O Level</a>
                                            <ul>
                                                <li><a href="<?php echo base_url('o-level-study-material');?>">Study Material</a></li>
                                                <li><a href="<?php echo base_url('o-level-quiz');?>">Quiz List</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#!">CCC</a>
                                            <ul>
                                                <li><a href="<?php echo base_url('ccc-study-material');?>">Study Material</a></li>
                                                <li><a href="<?php echo base_url('ccc-quiz');?>">Quiz List</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="<?php echo base_url('online-test');?>">Online Test</a></li>   
                                        <li><a href="<?php echo base_url('e-notes');?>">e-Notes</a></li>
                                        <li><a href="<?php echo base_url('contact');?>">Contact</a></li>
                                    </ul>
                                    <!-- end menu area -->

                                    <!-- start attribute navigation -->
                                    <div class="attr-nav align-items-xl-center ms-xl-auto main-font">
                                        <ul>
                                            <li class="d-none d-xl-inline-block">
                                                <a href="<?php echo base_url('compile-code');?>" class="butn md text-white">
                                                    <i class="fas fa-brain icon-arrow before"></i>
                                                    <span class="label">Compiler</span>
                                                    <i class="fas fa-brain icon-arrow after"></i>
                                                </a>
                                            </li>

                                            <?php /* if ($this->session->userdata('logged_in')): ?>
                                             <li class="d-none d-xl-inline-block text-white">
                                                Welcome, User ID: <?php echo $this->session->userdata('user_id'); ?>
                                             </li>
                                             <li class="d-none d-xl-inline-block">
                                                    <a href="<?php echo base_url('logout');?>" class="butn md text-white">
                                                        <i class="fas fa-sign-out-alt icon-arrow before"></i>
                                                        <span class="label">Logout</span>
                                                    </a>
                                                </li>
                                            <?php else: ?>
                                                <li class="d-none d-xl-inline-block">
                                                    <a href="<?php echo base_url('login');?>" class="butn md text-white">
                                                        <i class="fas fa-sign-in-alt icon-arrow before"></i>
                                                        <span class="label">Login</span>
                                                    </a>
                                                </li>
                                            <?php endif;  */ ?>
                                        </ul>
                                    </div>
                                    <!-- end attribute navigation -->
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>