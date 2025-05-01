<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IT Tools Tests</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- font cdn -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <!-- link css -->
    <link rel="stylesheet" href="<?= base_url('assets/css/quizlist.css'); ?>">

</head>

<body>

<?php //print_r($quizzes); print_r($course); ?>
    <div class="container py-4">
        <h4 class="mb-4"><?php echo $course->course_name; ?> </h4>
        <!-- <img src="<?= base_url('uploads/courses/' . $course->image); ?>" alt="Course Image" style="max-width: 100%;"> -->
 

        <div class="row g-4">
            <!-- Card 1 -->

            <?php  foreach ($quizzes as $quiz):  ?>

            <div class="col-md-4">
                <div class="card  h-100">
                    <div class="card-body">
                        <div class="box">
                            <h5 class="card-title"></h5>
                            <span class="icon-share"> <i class="bi bi-share-fill" style="cursor: pointer;"></i></span>
                        </div>
                        
                        <p class="fw-semibold mb-2"><?php echo $quiz->title ?> </p>
                        <p class="fw-semibold mb-2"><?php echo $quiz->subtitle ?> </p>
                        <?php $Aquestion = get_question_count_by_quiz_id($quiz->id); ?>
                        

                        <p class="text-bg p-2 d-inline-block rounded"><?php echo $Aquestion; ?> Questions &nbsp; | &nbsp; <?php echo $quiz->duration_minutes ?> minutes</p>

                        <div class="box1">
                            <div class="div-left">
                                <p class="mt-4"><i class="bi bi-people-fill"></i> 
                                <?php 
                                $data = getTotalUsersAttempted($quiz->id);

                                if ($data) {
                                    echo $data->total_users_attempted; // ✅ Correct: Accessing the property
                                } else {
                                    echo "0"; // Or handle if no record found
                                }
                                 ?> Attempted</p>
                            </div>
                            <div class="div-right">
                            <a href="<?php echo base_url('quiza/' . $quiz->id); ?>" class="mt-3 button-b">Start Test</a>
                            <!-- http://localhost/boostingskills/quiz -->

                                <!-- <button class=" mt-3 button-b">
                                    
                                Start Test
                            
                            </button> -->
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <?php   endforeach;   ?>

            <!-- Bootstrap Icons CDN (optional if using icons) -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</body>

</html>