<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>  FUll Course</title>

    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome 4.7.0 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Google Fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">

    <!-- Your Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/boost.css'); ?>">
<style type="text/css">
    body{
        background-color: #f3f3f3;
    }
    .content {
        padding: 10px 0px;
        background-color: #f3f3f3;
    }
    .content_ccc {
        background: #fff;
        padding: 15px 15px;
    }

</style>
</head>

<body>

<?php  //print_r($chapters); ?>


    <!-- Side Navigation -->
    <nav class="nav-side-menu hide-scrollbar">
        <div class="brand">
            <h5>Main Menu</h5>
        </div>
        <button class="fa fa-bars fa-2x toggle-btn btn" type="button" data-bs-toggle="collapse"
            data-bs-target="#menu-content" aria-controls="menu-content" aria-expanded="false"
            aria-label="Toggle navigation"></button>

        <div class="menu-list">
            <div id="menu-content" class="menu-content collapse">
                <ul class="list-unstyled">
                <?php foreach($chapters as $chapter): ?>
                    <li>
                    <a href="<?= base_url('course-details/' . $chapter->course_id . '/' . $chapter->id); ?>">
                        <i class="fa fa-bars"></i> <?= $chapter->chapter_title; ?>
                    </a>
                    </li>
                <?php endforeach; ?>
                <li>
                    <a href="<?php echo base_url();?>"><i class="fa fa-home"></i> Back to home</a>
                </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- content  -->
    <section class="content">
        <div class="container">
            <div class="content_ccc">
            <div class="content_detail">

            <?php
$chapter_id = $this->uri->segment(3); ?> 
 <h2> <?php echo $course->course_name; ?> </h2>
 

 <div>
 <a href="http://localhost/boostingskills/compile-code" class="butn md btn btn">
                                                    <i class="fas fa-brain icon-arrow before"></i>
                                                    <span class="label">Compiler</span>
                                                    <i class="fas fa-brain icon-arrow after"></i>
                                                </a> </div>
                                            
                                           
 

 <?php 

if ($chapter_id == '') {
    // Show course details if chapter_id is not in the URL
    ?>
    <img src="<?= base_url('uploads/courses/' . $course->image); ?>" alt="Course Image" style="max-width: 100%;">
    
    <div>
        <?= $course->course_syllabus; ?>
    </div>
    <?php
}
?>
            <?php 
                 // 4th segment = 11
                foreach ($chapters as $chapter): 
                    if ($chapter->id == $chapter_id): 
                ?>
                    <h3><?= $chapter->chapter_title; ?></h3>
                    <p><?= $chapter->description; ?></p>
                <?php 
                    endif;
                endforeach; 
            ?>


                </div>
            </div>
        </div>
    </section>


    <!-- Bootstrap 5.3.3 Bundle JS (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script>
        // Optional: Handle icon rotate manually if needed
        const collapses = document.querySelectorAll('.sub-menu');

        collapses.forEach(collapse => {
            collapse.addEventListener('show.bs.collapse', function () {
                const icon = this.previousElementSibling.querySelector('.fa-chevron-down');
                if (icon) {
                    icon.style.transform = "rotateX(180deg)";
                }
            });

            collapse.addEventListener('hide.bs.collapse', function () {
                const icon = this.previousElementSibling.querySelector('.fa-chevron-down');
                if (icon) {
                    icon.style.transform = "rotateX(0deg)";
                }
            });
        });
    </script>

</body>

</html>