
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>  Course Information | BoostingSkills</title>

    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

    <!-- Font Awesome 4.7.0 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Google Fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">

    <!-- Your Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/boost.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/styles.css'); ?>">
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
    ul.sub-menu {
        padding-left: 15px;
    }
    .fixed-btn {
        transform: rotate(90deg);
        transform-origin: center;
        right: 0px;
        position: fixed;
        top: 45%;
    }
    .content_detail p, .content_detail li{
        font-family: 'Roboto';
        font-size: 14px;
        font-weight: 500;
        line-height: 30px;
    }
    .nav-side-menu li a{
            padding: 2px 15px!important;
        font-size: 14px;
        text-transform: capitalize;
        font-weight: 500;
    }
    nav.nav-side-menu.hide-scrollbar {
        border-right: 1px solid #ccc;
        background: #f3f3f3;
    }
    .nav-side-menu .brand{
        background: #f3f3f3;
    }
    
    .nav-side-menu li{
        margin-bottom: 10px;
    }
    
    .nav-side-menu li a i {
        margin-right: 10px;
        margin-top: -30px;
    }
    .nav-side-menu ul{
        line-height: 30px;
    }
    
    @media (max-width: 768px){
        .nav-side-menu li a i
        {
            margin-right: 10px;
            margin-top: 0px;
        }   
    }
</style>
</head>

<body>

 

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

    
  <?php if(!empty($mysub)){
    foreach($mysub as $sub): ?>
    <li class="subject-toggle" style="cursor: pointer;">
        <a onclick="toggleSubMenu('sub-menu-<?= $sub->id; ?>')" class="text-dark" style="display: flex; align-items: center;">
            <i class="fa fa-circle"></i> <?php // echo $sub->id; ?><?= $sub->title; ?>
        </a>
    </li>
    <ul class="sub-menu" id="sub-menu-<?= $sub->id; ?>" style="display: none; margin-left: 15px;">
      <?php foreach($chapters as $chapter):
        if($chapter->subject_id==$sub->id) { ?>
            <li>
            <a href="<?= base_url('course-details/' . $chapter->course_id . '/' . $chapter->id); ?>">
                <i class="fa fa-circle-o"></i> <?php // echo $sub->id ?> <?= $chapter->chapter_title; ?>
            </a>
            </li>
        <?php } ?>
     <?php endforeach; ?>
     </ul>
   <?php endforeach; } ?>
      <?php foreach($chapters as $chapter): 
         if($chapter->subject_id==null || $chapter->subject_id=='' ) { ?>
        <li>
        <a href="<?= base_url('course-details/' . $chapter->course_id . '/' . $chapter->id); ?>">
            <i class="fa fa-square	"></i> <?php //echo $sub->id ?> <?= $chapter->chapter_title; ?>
        </a>
         </li>
        <?php } endforeach; ?>
        <li>
            <a href="<?php echo base_url('quizlist/'.$chapter->course_id);?>"><i class="fa fa-question-circle"></i> Quiz</a>
        </li>
        <li>
            <a href="<?php echo base_url();?>"><i class="fa fa-home"></i> Back to home</a>
        </li>

                </ul>
                
<div class="fixed-btn">
<a href="<?php echo base_url('compile-code');?>" class="butn md text-white">
<i class="fas fa-brain icon-arrow before"></i>
<span class="label">Compiler</span>
<i class="fas fa-brain icon-arrow after"></i>
</a>
</div>
            </div>
        </div>
    </nav>
    <!-- content  -->
    <section class="content">
        <div class="container-fluid">
            <div class="content_ccc">
            <div class="content_detail">

            <?php
$chapter_id = $this->uri->segment(3); ?> 
 <h2> <?php echo $course->course_name; ?> </h2>
 
 <?php 

if ($chapter_id == '') {
    // Show course details if chapter_id is not in the URL
    ?>
    <img src="<?= base_url('uploads/courses/' . $course->image); ?>" alt="Course Image" style="width: 100%;">
    
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

<script>
//   document.addEventListener('contextmenu', function(e) {
//     alert("Right click is disabled on this site.");
//     e.preventDefault();
//   });
</script>

<!-- Disable Right Click, Copy, Cut, Paste, Text Selection, and Keyboard Shortcuts -->
<style>
  body {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }
</style>

<script>
  // Disable right click
  document.addEventListener('contextmenu', function(e) {
    e.preventDefault();
  });

  // Disable text selection
  document.addEventListener('selectstart', function(e) {
    e.preventDefault();
  });

  // Disable copy, cut, and paste
  document.addEventListener('copy', function(e) {
    e.preventDefault();
  });
  document.addEventListener('cut', function(e) {
    e.preventDefault();
  });
  document.addEventListener('paste', function(e) {
    e.preventDefault();
  });

  // Disable common keyboard shortcuts
  document.onkeydown = function(e) {
    if (e.ctrlKey && ['c', 'u', 's', 'a', 'x', 'p'].includes(e.key.toLowerCase())) {
      e.preventDefault();
      return false;
    }
    if (e.key === 'F12') {
      e.preventDefault();
      return false;
    }
  };
</script>
<script>
    function toggleSubMenu(id) {
        var menu = document.getElementById(id);
        if (menu.style.display === "none" || menu.style.display === "") {
            menu.style.display = "block";
        } else {
            menu.style.display = "none";
        }
    }
</script>