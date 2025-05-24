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
    <title>Boosting Skills - Online Education Learning</title>

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
    
        <!-- ✅ Load jQuery First -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


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
                                        <a href="<?php echo base_url();?>" class="navbar-brand"><img id="logo" src="<?php echo base_url();?>assets/img/logos/logo.gif" alt="logo" /></a>
                                        <!-- end logo -->
                                    </div>

                                    <div class="navbar-toggler bg-primary"></div>

                                    <!-- start menu area -->
                                    <ul class="navbar-nav ms-auto" id="nav" style="display: none;">
                                        <li><a href="<?php echo base_url();?>">Home</a></li>  
<?php 
$where              = array('status'=>'active');
$id                 = 'position';
$courses   = $this->login_model->getWhereAndOrderBy('courses',$where,$id);
if(!empty($courses)){ foreach($courses as $course){?>
   <li><a href="<?php echo base_url('course-details/'.$course->id.'?='.$course->course_name);?>"><?php echo $course->course_name;?></a></li>
<?php }}?>


                                        <li>
                                        <a href="#!">User</a>
                                        <ul style="width: 150px;">
                                            <?php if ($this->session->userdata('name')): ?>
                                                <li>
                                                    <a href="<?php echo base_url(); ?>#quiz">
                                                        Hi, <?php echo $this->session->userdata('name'); ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo base_url('updateProfile'); ?>">Update Profile</a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo base_url('logout'); ?>">Logout</a>
                                                </li>
                                            <?php else: ?>
                                                <li>
                                                    <a href="<?php echo base_url('userlogin'); ?>">User Login</a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo base_url('registration'); ?>">Registration</a>
                                                </li>
                                            <?php endif; ?>
                                        </ul>



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