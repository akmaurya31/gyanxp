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
        
        <!-- INFORMATION
        ================================================== -->
        <section class="p-0 overflow-visible service-block">
            <div class="container">
                <div class="row mt-n1-9">
                    <div class="col-md-6 col-lg-4 mt-1-9">
                        <div class="card card-style3 h-100">
                            <div class="card-body px-1-9 py-2-3">
                                <div class="mb-3 d-flex align-items-center">
                                    <div class="card-icon">
                                        <i class="ti-rocket"></i>
                                    </div>
                                    <h4 class="ms-4 mb-0">Learn Anything</h4>
                                </div>
                                <div>
                                    <p class="mb-3">It was popularised in the 1960s with the release of Letraset sheets containing.</p>
                                    <a href="about.html" class="butn-style1 secondary">View More +</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mt-1-9">
                        <div class="card card-style3 h-100">
                            <div class="card-body px-1-9 py-2-3">
                                <div class="mb-3 d-flex align-items-center">
                                    <div class="card-icon">
                                        <i class="ti-world"></i>
                                    </div>
                                    <h4 class="ms-4 mb-0">Learn Together</h4>
                                </div>
                                <div>
                                    <p class="mb-3">It was popularised in the 1960s with the release of Letraset sheets containing.</p>
                                    <a href="about.html" class="butn-style1 secondary">View More +</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mt-1-9">
                        <div class="card card-style3 h-100">
                            <div class="card-body px-1-9 py-2-3">
                                <div class="mb-3 d-flex align-items-center">
                                    <div class="card-icon">
                                        <i class="ti-user"></i>
                                    </div>
                                    <h4 class="ms-4 mb-0">Learn Experts</h4>
                                </div>
                                <div>
                                    <p class="mb-3">It was popularised in the 1960s with the release of Letraset sheets containing.</p>
                                    <a href="about.html" class="butn-style1 secondary">View More +</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                            <div class="d-none d-sm-block">
                                <div class="about-text">
                                    <div class="about-counter">
                                        <span class="countup">9</span> +
                                    </div>
                                    <p>YEARS EXPERIENCE JUST ACHIVED</p>
                                </div>
                            </div>
                        </div>   
                    </div>
                    <div class="col-md-12 col-lg-6 mt-1-9 order-2 order-lg-1">
                        <div class="section-heading text-start mb-2">
                            <span class="sub-title">welcome!</span>
                        </div>
                        <h2 class="font-weight-800 h1 mb-1-9 text-primary">Learn whenever, anyplace, at your own speed.</h2>
                        <p class="about-border lead fst-italic mb-1-9">A spot to furnish understudies with sufficient information and abilities in an unpredictable world.</p>
                        <blockquote>
                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.
                        </blockquote>
                        <div class="dotted-seprator pt-1-9 mt-1-9"></div>
                        <div class="row">
                            <div class="col-sm-6 col-12 mb-3 mb-sm-0">
                                <div class="media">
                                    <i class="ti-mobile display-15 text-secondary"></i>
                                    <div class="media-body align-self-center ms-3">
                                        <h4 class="mb-1 h5">Phone Number</h4>
                                        <p class="mb-0">(123)-456-789</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="media">
                                    <i class="ti-email display-15 text-secondary"></i>
                                    <div class="media-body align-self-center ms-3">
                                        <h4 class="mb-1 h5">Email Address</h4>
                                        <p class="mb-0">Info@mail.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        <section class="bg-very-light-gray">
            <div class="container">
                <div class="section-heading">
                    <span class="sub-title">discover new</span>
                    <h2 class="h1 mb-0">Our Online Courses</h2>
                </div>
                <div class="row g-xxl-5 mt-n2-6">
                    <?php if(!empty($courses)){ foreach($courses as $course){?>
                        <div class="col-md-6 col-xl-4 mt-2-6">
                            <div class="card card-style1 p-0 h-100">
                                <div class="card-img rounded-0">
                                    <div class="image-hover">
                                        <img class="rounded-top" src="<?php echo base_url('uploads/courses/'.$course->image);?>" alt="...">
                                    </div>
                                    <a href="#!"><i class="far fa-heart"></i></a>
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

        <!-- TRENDING CATEGORIES
        ================================================== -->
        <section class="bg-img cover-background dark-overlay" data-overlay-dark="8" data-background="assets/img/bg/bg-06.jpg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-heading text-center">
                            <span class="sub-title">Instructors</span>
                            <h2 class="h1 mb-0">Popular Categories</h2>
                        </div>
                    </div>
                </div>
                <div class="row mt-n1-9">
                    <div class="col-sm-6 col-lg-4 col-xl-3 mt-1-9">
                        <a href="courses-list.html" class="category-item-01">
                            <div class="category-img">
                                <img src="assets/img/icons/icon-09.png" alt="">
                            </div>
                            <div class="ms-3">
                                <h3 class="h4 mb-0 text-white">Chemistry</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xl-3 mt-1-9">
                        <a href="courses-list.html" class="category-item-01">
                            <div class="category-img">
                                <img src="assets/img/icons/icon-10.png" alt="">
                            </div>
                            <div class="ms-3">
                                <h3 class="h4 mb-0 text-white">Physics</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xl-3 mt-1-9">
                        <a href="courses-list.html" class="category-item-01">
                            <div class="category-img">
                                <img src="assets/img/icons/icon-11.png" alt="">
                            </div>
                            <div class="ms-3">
                                <h3 class="h4 mb-0 text-white">Language</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xl-3 mt-1-9">
                        <a href="courses-list.html" class="category-item-01">
                            <div class="category-img">
                                <img src="assets/img/icons/icon-12.png" alt="">
                            </div>
                            <div class="ms-3">
                                <h3 class="h4 mb-0 text-white">Business</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xl-3 mt-1-9">
                        <a href="courses-list.html" class="category-item-01">
                            <div class="category-img">
                                <img src="assets/img/icons/icon-08.png" alt="">
                            </div>
                            <div class="ms-3">
                                <h3 class="h4 mb-0 text-white">Photography</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xl-3 mt-1-9">
                        <a href="courses-list.html" class="category-item-01">
                            <div class="category-img">
                                <img src="assets/img/icons/icon-07.png" alt="">
                            </div>
                            <div class="ms-3">
                                <h3 class="h4 mb-0 text-white">Rocket Science</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xl-3 mt-1-9">
                        <a href="courses-list.html" class="category-item-01">
                            <div class="category-img">
                                <img src="assets/img/icons/icon-06.png" alt="">
                            </div>
                            <div class="ms-3">
                                <h3 class="h4 mb-0 text-white">Math</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xl-3 mt-1-9">
                        <a href="courses-list.html" class="category-item-01">
                            <div class="category-img">
                                <img src="assets/img/icons/icon-05.png" alt="">
                            </div>
                            <div class="ms-3">
                                <h3 class="h4 mb-0 text-white">Food &amp; recipe</h3>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- ONLINE INSTRUCTORS
        ================================================== -->
        <section class="bg-very-light-gray position-relative">
            <div class="container">
                <div class="section-heading">
                    <span class="sub-title">Instructors</span>
                    <h2 class="h1 mb-0">Experience Instructors</h2>
                </div>
                <div class="row position-relative mt-n1-9">
                    <div class="col-md-6 col-lg-4 mt-1-9">
                        <div class="team-style1 text-center">
                            <img src="assets/img/team/team-01.jpg" class="border-radius-5" alt="...">
                            <div class="team-info">
                                <h3 class="text-primary mb-1 h4">Murilo Souza</h3>
                                <span class="font-weight-600 text-secondary">Web Designer</span>
                            </div>
                            <div class="team-overlay">
                                <div class="d-table h-100 w-100">
                                    <div class="d-table-cell align-middle">
                                        <h3><a href="instructors-details.html" class="text-white">About Murilo Souza</a></h3>
                                        <p class="text-white mb-0">I preserve each companion certification and I'm an authorized AWS solutions architect professional.</p>
                                        <ul class="social-icon-style1">
                                            <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#!"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#!"><i class="fab fa-youtube"></i></a></li>
                                            <li><a href="#!"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mt-1-9">
                        <div class="team-style1 text-center">
                            <img src="assets/img/team/team-02.jpg" class="border-radius-5" alt="...">
                            <div class="team-info">
                                <h3 class="text-primary mb-1 h4">Balsam Samira</h3>
                                <span class="font-weight-600 text-secondary">Photographer</span>
                            </div>
                            <div class="team-overlay">
                                <div class="d-table h-100 w-100">
                                    <div class="d-table-cell align-middle">
                                        <h3><a href="instructors-details.html" class="text-white">About Balsam Samira</a></h3>
                                        <p class="text-white mb-0">I preserve each companion certification and I'm an authorized AWS solutions architect professional.</p>
                                        <ul class="social-icon-style1">
                                            <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#!"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#!"><i class="fab fa-youtube"></i></a></li>
                                            <li><a href="#!"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mt-1-9">
                        <div class="team-style1 text-center">
                            <img src="assets/img/team/team-03.jpg" class="border-radius-5" alt="...">
                            <div class="team-info">
                                <h3 class="text-primary mb-1 h4">Rodrigo Ribeiro</h3>
                                <span class="font-weight-600 text-secondary">Psychologist</span>
                            </div>
                            <div class="team-overlay">
                                <div class="d-table h-100 w-100">
                                    <div class="d-table-cell align-middle">
                                        <h3><a href="instructors-details.html" class="text-white">About Rodrigo Ribeiro</a></h3>
                                        <p class="text-white mb-0">I preserve each companion certification and I'm an authorized AWS solutions architect professional.</p>
                                        <ul class="social-icon-style1">
                                            <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#!"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#!"><i class="fab fa-youtube"></i></a></li>
                                            <li><a href="#!"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="team-bg-shape d-none d-xl-block">
                        <img src="assets/img/bg/bg-07.png" alt="...">
                    </div>
                </div>
                <div class="shape18">
                    <img src="assets/img/bg/bg-01.jpg" alt="...">
                </div>
                <div class="shape20">
                    <img src="assets/img/bg/bg-02.jpg" alt="...">
                </div>
                <div class="shape21">
                    <img src="assets/img/bg/bg-03.jpg" alt="...">
                </div>
            </div>
        </section>

        <!-- WHY CHOOSE US
        ================================================== -->
        <section>
            <div class="container">
                <div class="row align-items-center mt-n1-9">
                    <div class="col-lg-6 mt-1-9">
                        <div class="why-choose-img position-relative">
                            <img class="border-radius-5" src="assets/img/content/why-choose-img.jpg" alt="...">
                            <div class="position-absolute top-50 start-50 translate-middle story-video">
                                <a class="video video_btn" href="https://www.youtube.com/watch?v=ZPs3URGs0KQ"><i class="fas fa-play font-size22"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-1-9">
                    <div class="why-choose-content">
                        <div class="mb-1-9">
                            <h2 class="h1 mb-2 text-primary">Our Facilities</h2>
                            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisic sed eius to mod tempor incididunt.</p>
                        </div>
                        <div class="media">
                            <i class="ti-panel display-15 text-secondary"></i>
                            <div class="media-body ps-3">
                                    <h4 class="h5 font-weight-700 mb-1 mb-md-2">Self Registration</h4>
                                    <p class="mb-0 w-lg-90">
                                        A getting to know gadgets based totally on formalised coaching however with the assist of digital resources.
                                    </p>
                                </div>
                        </div>
                        <div class="dotted-seprator pt-1-9 mt-1-9"></div>
                        <div class="media">
                            <i class="ti-package display-15 text-secondary"></i>
                            <div class="media-body ps-3">
                                    <h4 class="h5 font-weight-700 mb-1 mb-md-2">Accreditation Support</h4>
                                    <p class="mb-0 w-lg-90">
                                        A getting to know gadgets based totally on formalised coaching however with the assist of digital resources.
                                    </p>
                                </div>
                        </div>
                        <div class="dotted-seprator pt-1-9 mt-1-9"></div>
                        <div class="media">
                            <i class="ti-bookmark-alt display-15 text-secondary"></i>
                            <div class="media-body ps-3">
                                    <h4 class="h5 font-weight-700 mb-1 mb-md-2">Brand Integration</h4>
                                    <p class="mb-0 w-lg-90">
                                        A getting to know gadgets based totally on formalised coaching however with the assist of digital resources.
                                    </p>
                                </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </section>

        <!-- COUNTER
        ================================================== -->
        <section class="pt-0">
            <div class="container">
                <div class="row mt-n1-9">
                    <div class="col-sm-6 col-lg-3 mt-1-9">
                        <div class="counter-wrapper">
                            <div class="counter-icon">
                                <div class="d-table-cell align-middle">
                                    <img src="assets/img/icons/icon-01.png" class="w-55px" alt="...">
                                </div>
                            </div>
                            <div class="counter-content">
                                <h4 class="counter-number">
                                    <span class="countup">78</span>+
                                </h4>
                                <p class="mb-0 font-weight-600">Classess Complete</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mt-1-9">
                        <div class="counter-wrapper">
                            <div class="counter-icon">
                                <div class="d-table-cell align-middle">
                                    <img src="assets/img/icons/icon-02.png" class="w-55px" alt="...">
                                </div>
                            </div>
                            <div class="counter-content">
                                <h4 class="counter-number">
                                    <span class="countup">20</span>k
                                </h4>
                                <p class="mb-0 font-weight-600">Total Students</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mt-1-9">
                        <div class="counter-wrapper">
                            <div class="counter-icon">
                                <div class="d-table-cell align-middle">
                                    <img src="assets/img/icons/icon-03.png" class="w-55px" alt="...">
                                </div>
                            </div>
                            <div class="counter-content">
                                <h4 class="counter-number">
                                    <span class="countup">400</span>k
                                </h4>
                                <p class="mb-0 font-weight-600">Libary Books</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mt-1-9">
                        <div class="counter-wrapper">
                            <div class="counter-icon">
                                <div class="d-table-cell align-middle">
                                    <img src="assets/img/icons/icon-04.png" class="w-55px" alt="...">
                                </div>
                            </div>
                            <div class="counter-content">
                                <h4 class="counter-number">
                                    <span class="countup">1200</span>+
                                </h4>
                                <p class="mb-0 font-weight-600">Certified Teachers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- TESTIMONIAL
        ================================================== -->
        <section class="bg-light">
            <div class="container">
                <div class="section-heading">
                    <span class="sub-title">testimonial</span>
                    <h2 class="h1 mb-0">What Educators Say About Us!</h2>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8 position-relative">
                        <div class="testimonial-carousel text-center owl-carousel owl-theme">
                            <div>
                                <p class="mb-1-9 mb-lg-6 lead">Loan was worth a fortune to my company. I didn't even need training. I am really satisfied with my loan. Loan has got everything I need. We've used loan for the last five years.</p>
                                <h6 class="mb-0 h5">Callum Lissa <small class="text-primary"> - Founder</small></h6>
                            </div>
                            <div>
                                <p class="mb-1-9 mb-lg-6 lead">Loan is the next killer app. We can't understand how we've been living without loan. It's exactly what I've been looking for. Wow what great service, I love it! Buy this now. Loan is both attractive and highly adaptable.</p>
                                <h6 class="mb-0 h5">Bethany Nichols <small class="text-primary"> - General Manager</small></h6>
                            </div>
                            <div>
                                <p class="mb-1-9 mb-lg-6 lead">Thank you so much for your help. Loan saved my business. Without loan, we would have gone bankrupt by now. Loan is worth much more than I paid. I can't say enough about loan. The very best. I have gotten at least 50 times the value from loan.</p>
                                <h6 class="mb-0 h5">Lily Hogben <small class="text-primary"> - CEO</small></h6>
                            </div>
                        </div>
                        <h6 class="testimonial-quote">“</h6>
                    </div>
                </div>
            </div>
            <div>
                <img src="assets/img/avatar/avatar-01.jpg" class="position-absolute bottom-15 left-20 d-none d-lg-block rounded-circle w-40px" alt="...">
                <img src="assets/img/avatar/avatar-02.jpg" class="position-absolute bottom-40 left-10 d-none d-lg-block rounded-circle" alt="...">
                <img src="assets/img/avatar/avatar-03.jpg" class="position-absolute left-20 top-20 d-none d-lg-block rounded-circle w-60px" alt="...">
                <img src="assets/img/avatar/avatar-04.jpg" class="position-absolute top-45 right-10 d-none d-lg-block rounded-circle" alt="...">
                <img src="assets/img/avatar/avatar-05.jpg" class="position-absolute top-25 right-20 d-none d-lg-block rounded-circle w-40px" alt="...">
                <img src="assets/img/avatar/avatar-06.jpg" class="position-absolute bottom-15 right-15 d-none d-lg-block rounded-circle" alt="...">
            </div>
            <div class="shape21">
                <img src="assets/img/bg/bg-03.jpg" alt="...">
            </div>
            <span class="process-left-shape d-none d-sm-block"></span>
        </section>

        <!-- PROCESS
        ================================================== -->
        <section>
            <div class="container">
                <div class="section-heading">
                    <span class="sub-title">process</span>
                    <h2 class="h1 mb-0">How It Works?</h2>
                </div>
                <div class="row">
                    <div class="process-wrapper">
                        <div class="process-background"></div>
                        <div class="process-content-wrapper">
                            <div class="row mt-n1-9">
                                <div class="col-lg-3 mt-1-9">
                                    <div class="process-content">
                                        <div class="mb-1-6 mb-lg-1-9">
                                            <img src="assets/img/content/process-01.png" alt="...">
                                        </div>
                                        <h3 class="h4">Students</h3>
                                        <p class="mb-0">Use of technology to empower individuals adapt anyplace and whenever.</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 mt-1-9">
                                    <div class="process-content">
                                        <div class="mb-1-6 mb-lg-1-9">
                                            <img src="assets/img/content/process-02.png" alt="...">
                                        </div>
                                        <h3 class="h4">Teachers</h3>
                                        <p class="mb-0">Use of technology to empower individuals adapt anyplace and whenever.</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 mt-1-9">
                                    <div class="process-content">
                                        <div class="mb-1-6 mb-lg-1-9">
                                            <img src="assets/img/content/process-03.png" alt="...">
                                        </div>
                                        <h3 class="h4">Helpful Staff</h3>
                                        <p class="mb-0">Use of technology to empower individuals adapt anyplace and whenever.</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 mt-1-9">
                                    <div class="process-content">
                                        <div class="mb-1-6 mb-lg-1-9">
                                            <img src="assets/img/content/process-04.png" alt="...">
                                        </div>
                                        <h3 class="h4">Academic Staff</h3>
                                        <p class="mb-0">Use of technology to empower individuals adapt anyplace and whenever.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- UPCOMING EVENT
        ================================================== -->
        <section class="bg-very-light-gray">
            <div class="container">
                <div class="section-heading">
                    <span class="sub-title">latest events</span>
                    <h2 class="h1 mb-0">Our Upcoming Events</h2>
                </div>
                <div class="row g-xxl-5 mt-n2-9">
                    <div class="col-xl-6 mt-2-9">
                        <div class="row g-0 event-wrapper">
                            <div class="col-md-5 event-img bg-img cover-background" data-background="assets/img/content/event-01.jpg">
                            </div>
                            <div class="col-md-7">
                                <div class="p-1-6 p-sm-1-9">
                                    <span class="badge-soft mb-3">art competition</span>
                                    <h4 class="font-weight-800 h5 mb-3"><a href="event-details.html">Graphics design conference</a></h4>
                                    <p class="mb-3 alt-font font-weight-500">Attend the activities and analyze treasured recommendations from the pinnacle eLearn professionals.</p>
                                    <div class="dotted-seprator pt-4 mt-4"></div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="mb-0 text-primary font-weight-600"><i class="ti-calendar me-2"></i><span class="text-primary"> 30 Mar. 2023</span></p>
                                        <p class="mb-0 text-primary font-weight-600"><i class="ti-location-pin me-2"></i><span class="text-primary">London</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 mt-2-9">
                        <div class="row g-0 event-wrapper">
                            <div class="col-md-5 event-img bg-img cover-background" data-background="assets/img/content/event-02.jpg">
                            </div>
                            <div class="col-md-7">
                                <div class="p-1-6 p-sm-1-9">
                                    <span class="badge-soft secondary mb-3">Learning english</span>
                                    <h4 class="font-weight-800 h5 mb-3"><a href="event-details.html">Important learning english</a></h4>
                                    <p class="mb-3 alt-font font-weight-500">Attend the activities and analyze treasured recommendations from the pinnacle eLearn professionals.</p>
                                    <div class="dotted-seprator pt-4 mt-4"></div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="mb-0 text-secondary font-weight-600"><i class="ti-calendar me-2"></i><span class="text-secondary"> 01 Apr. 2023</span></p>
                                        <p class="mb-0 text-secondary font-weight-600"><i class="ti-location-pin me-2"></i><span class="text-secondary">London</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 mt-2-9">
                        <div class="row g-0 event-wrapper">
                            <div class="col-md-5 event-img bg-img cover-background" data-background="assets/img/content/event-03.jpg">
                            </div>
                            <div class="col-md-7">
                                <div class="p-1-6 p-sm-1-9">
                                    <span class="badge-soft mb-3">creative day</span>
                                    <h4 class="font-weight-800 h5 mb-3"><a href="event-details.html">Annual creative meetup</a></h4>
                                    <p class="mb-3 alt-font font-weight-500">Attend the activities and analyze treasured recommendations from the pinnacle eLearn professionals.</p>
                                    <div class="dotted-seprator pt-4 mt-4"></div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="mb-0 text-primary font-weight-600"><i class="ti-calendar me-2"></i><span class="text-primary"> 02 Apr. 2023</span></p>
                                        <p class="mb-0 text-primary font-weight-600"><i class="ti-location-pin me-2"></i><span class="text-primary">London</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 mt-2-9">
                        <div class="row g-0 event-wrapper">
                            <div class="col-md-5 event-img bg-img cover-background" data-background="assets/img/content/event-04.jpg">
                            </div>
                            <div class="col-md-7">
                                <div class="p-1-6 p-sm-1-9">
                                    <span class="badge-soft secondary mb-3">art competition</span>
                                    <h4 class="font-weight-800 h5 mb-3"><a href="event-details.html">Digital arts and reshaping</a></h4>
                                    <p class="mb-3 alt-font font-weight-500">Attend the activities and analyze treasured recommendations from the pinnacle eLearn professionals.</p>
                                    <div class="dotted-seprator pt-4 mt-4"></div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="mb-0 text-secondary font-weight-600"><i class="ti-calendar me-2"></i><span class="text-secondary"> 03 Apr. 2023</span></p>
                                        <p class="mb-0 text-secondary font-weight-600"><i class="ti-location-pin me-2"></i><span class="text-secondary">London</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- BLOG
        ================================================== -->
        <section class="position-relative">
            <div class="container">
                <div class="section-heading">
                    <span class="sub-title">our news</span>
                    <h2 class="h1 mb-0">Our Latest Blog</h2>
                </div>
                <div class="row g-5">
                    <div class="col-lg-6 col-xl-4">
                        <article class="blog-style1 position-relative d-block mb-0">
                            <div class="img-holder position-relative d-block">
                                <div class="image-hover">
                                    <img src="assets/img/blog/blog-01.jpg" alt="...">
                                </div>
                            </div>
                            <div class="text-holder">
                                <div class="category-box">
                                    <a href="#!">creative</a>
                                </div>
                                <h3 class="display-25 font-weight-700 mb-3"><a href="blog-details.html">Skills that you can learn from eLearn.</a></h3>
                                <div><p>Duty obligations of business frequently occur pleasures enjoy...</p></div>
                                <div class="bottom-box">
                                    <div class="btn-box">
                                        <a href="blog-details.html">
                                            <span class="icon-right-arrow-1"></span>Read More
                                        </a>
                                    </div>
                                    <ul class="mb-0 ps-0">
                                        <li><span class="icon-calendar"></span>6 Jul 2023</li>
                                    </ul>
                                </div>
                            </div>
                        </article>
                    </div>

                    <div class="col-lg-6 col-xl-4 d-none d-lg-block">
                        <div>
                            <div class="image-hover">
                                <img src="assets/img/blog/blog-07.jpg" alt="...">
                            </div>    
                        </div>
                    </div>

                    <div class="col-xl-4">
                        <div class="blog-style1 blog-two-style1 mb-1-9 h-auto">
                            <div class="text-holder">
                                <div class="category-box">
                                    <a href="#!">Learning</a>
                                </div>
                                <h3 class="display-25 font-weight-700 mb-3"><a href="blog-details.html">Is eLearn any good? 7 ways you can be certain.</a></h3>
                                <div class="bottom-box">
                                    <div class="btn-box">
                                        <a href="blog-details.html">
                                            <span class="icon-right-arrow-1"></span>Read More
                                        </a>
                                    </div>
                                    <div class="meta-info">
                                        <ul class="mb-0 ps-0">
                                            <li><span class="icon-calendar"></span>4 Jul 2023</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="blog-style1 blog-two-style1 h-auto">
                            <div class="text-holder">
                                <div class="category-box">
                                    <a href="#!">Career</a>
                                </div>
                                <h3 class="display-25 font-weight-700 mb-3">
                                    <a href="blog-details.html">How will eLearn be in the future.</a>
                                </h3>
                                <div class="bottom-box">
                                    <div class="btn-box">
                                        <a href="blog-details.html">
                                            <span class="icon-right-arrow-1"></span>Read More
                                        </a>
                                    </div>
                                    <div class="meta-info">
                                        <ul class="mb-0 ps-0">
                                            <li><span class="icon-calendar"></span>2 Jul 2023</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- PARTNER
        ================================================== -->
        <section class="bg-very-light-gray py-8">
            <div class="container">
                <div class="client-carousel owl-carousel owl-theme">
                    <div class="text-center">
                        <img src="assets/img/partners/partner-01.jpg" alt="...">
                    </div>
                    <div class="text-center">
                        <img src="assets/img/partners/partner-02.jpg" alt="...">
                    </div>
                    <div class="text-center">
                        <img src="assets/img/partners/partner-03.jpg" alt="...">
                    </div>
                    <div class="text-center">
                        <img src="assets/img/partners/partner-04.jpg" alt="...">
                    </div>
                    <div class="text-center">
                        <img src="assets/img/partners/partner-05.jpg" alt="...">
                    </div>
                    <div class="text-center">
                        <img src="assets/img/partners/partner-06.jpg" alt="...">
                    </div>
                    <div class="text-center">
                        <img src="assets/img/partners/partner-07.jpg" alt="...">
                    </div>
                    <div class="text-center">
                        <img src="assets/img/partners/partner-08.jpg" alt="...">
                    </div>
                    <div class="text-center">
                        <img src="assets/img/partners/partner-09.jpg" alt="...">
                    </div>
                    <div class="text-center">
                        <img src="assets/img/partners/partner-10.jpg" alt="...">
                    </div>
                </div>
            </div>
        </section>

        <?php include('footer.php');?>