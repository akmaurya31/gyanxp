<?php include('header.php'); ?>

        <!-- BANNER
        ================================================== -->
        <section class="top-position1 p-0">
            <div class="container-fluid px-0">
                <div class="slider-fade1 owl-carousel owl-theme w-100">
                    <?php if(!empty($sliders)){ foreach ($sliders as $slide) {?>
                        <div class="item bg-img cover-background pt-6 pb-10 pt-sm-6 pb-sm-14 py-md-16 py-lg-20 py-xxl-24 left-overlay-dark" data-overlay-dark="8" data-background="<?php echo 'slider/'.$slide->image;?>">
                            <div class="container pt-6 pt-md-0">
                                <div class="row align-items-center">
                                    <div class="col-md-10 col-lg-8 col-xl-7 mb-1-9 mb-lg-0 py-6 position-relative">
                                        <span class="h5 text-secondary"><?php echo $slide->title;?></span>
                                        <h1 class="display-1 font-weight-800 mb-2-6 title text-white"><?php echo $slide->description;?></h1>
                                        <?php if(!empty($slide->button)){?>
                                            <a href="<?php echo $slide->button_url;?>" class="butn my-1 mx-1"><i class="fas fa-plus-circle icon-arrow before"></i><span class="label"><?php echo $slide->button;?></span><i class="fas fa-plus-circle icon-arrow after"></i></a>
                                        <?php }?>
                                        <?php if(!empty($slide->button_2)){?>
                                            <a href="<?php echo $slide->button_url_2;?>" class="butn white my-1"><i class="fas fa-plus-circle icon-arrow before"></i><span class="label"><?php echo $slide->button_2;?></span><i class="fas fa-plus-circle icon-arrow after"></i></a>
                                        <?php }?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }}?>
                </div>
            </div>
            <div class="triangle-shape top-15 right-10 z-index-9 d-none d-md-block"></div>
            <div class="square-shape top-25 left-5 z-index-9 d-none d-xl-block"></div>
            <div class="shape-five z-index-9 right-10 bottom-15"></div>
        </section>
     
        <!-- ABOUTUS
        ================================================== -->
        <section class="aboutus-style-01 position-relative">
            <div class="container pt-lg-4">
                <div class="row align-items-center mt-n1-9">
                    <div class="col-md-12 col-lg-6 mt-1-9 order-2 order-lg-1">
                        <div class="position-relative">
                            <div class="position-relative">
                                <div class="image-hover">
                                    <img src="assets/img/content/about-03.jpg" alt="..." class="ps-sm-10 position-relative z-index-1">
                                </div>
                                <img src="assets/img/content/about-02.jpg" alt="..." class="img-2 d-none d-xl-block">
                                <img src="assets/img/bg/bg-07.png" class="bg-shape1 d-none d-sm-block" alt="...">
                            </div>
                        </div>   
                    </div>
                    <div class="col-md-12 col-lg-6 mt-1-9 order-2 order-lg-1">
                        <div class="section-heading text-start mb-2">
                            <span class="sub-title">welcome!</span>
                        </div>
                        <h2 class="font-weight-800 h1 mb-1-9 text-primary">Boosting Skills</h2>
                        <p class="about-border lead fst-italic mb-1-9">Welcome to BoostingSkills – your one-stop destination for learning practical and in-demand computer skills. Our mission is to empower students, professionals, and tech enthusiasts by providing high-quality, easy-to-understand computer courses.</p>
                    </div>
                </div>
                <div class="shape18">
                    <img src="assets/img/bg/bg-01.jpg" alt="...">
                </div>
                <div class="shape20">
                    <img src="assets/img/bg/bg-02.jpg" alt="...">
                </div>
            </div>
        </section>

        <!-- ONLINE COURSES
        ================================================== -->
        <section id="quiz" class="bg-very-light-gray">
            <div class="container">
                <div class="section-heading">
                    <span class="sub-title">discover new</span>
                    <h2 class="h1 mb-0">Our Online Courses</h2>
                </div>
                <div class="row g-xxl-5 mt-n2-6">
                    <?php if(!empty($courses)){ foreach($courses as $course){?>
                        <div class="col-md-6 col-xl-4 mt-2-6">
                            <div class="card p-0 h-100">
                                <div class="card-img rounded-0">
                                    <div class="">
                                        <img class="rounded-top" src="<?php echo base_url('uploads/courses/'.$course->image);?>" style="100%">
                                    </div>
                                </div>
                                <div class="card-body position-relative pt-0 px-1-9 pb-1-9">
                                    <div class="pt-3">
                                        <h3 class="h4 mb-4">
                                            <a href="<?php echo base_url('#');?>">
                                                <?php echo $course->course_name;?>
                                            </a>
                                        </h3>
                                        <div class="dotted-seprator pt-4 mt-4 d-flex justify-content-between align-items-center">
                                            <h5 class="badge-soft">
                                                <?php echo $course->course_duration;?>
                                            </h5>
                                            <h5 class="text-primary mb-0">
                                                <?php echo '₹'.$course->course_fees;?>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center" style="margin-top: 20px;">
                                        <a href="course-details/<?php echo $course->id; ?>" class="btn btn-warning">  Course</a>
                                        <a href="quizlist/<?php echo $course->id; ?>" class="btn btn-info">  Quiz</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }}?>
                </div>
            </div>
        </section>

         
        <?php include('footer.php');?>