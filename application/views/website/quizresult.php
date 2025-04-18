<?php include('header.php');?>

<section class="page-title-section bg-img cover-background top-position1 left-overlay-dark" data-overlay-dark="9" data-background="<?php echo base_url()?>assets/img/bg/bg-04.jpg">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <h1>Quiz Result</h1>
            </div>
            <div class="col-md-12">
                <ul>
                    <li><a href="<?php echo base_url();?>">Home</a></li>
                    <li><a href="#!">Quiz Result</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="aboutus-style-02">
    <div class="container">

<div class="result-box" style="max-width: 600px; margin: auto; background: #f9f9f9; padding: 25px; border-radius: 12px; box-shadow: 0 0 10px rgba(0,0,0,0.1); font-family: Arial, sans-serif;">
    <h2 style="text-align:center; color: #333;">🎓 Quiz Result</h2>

    <?php if (!empty($result)) : ?>
        <div class="result-item">👤 <strong>Student Name:</strong> <?php echo $stuname; ?></div>
        <div class="result-item">🧾 <strong>Quiz Name:</strong> <?php echo $quizname; ?></div>
        <div class="result-item">📌 <strong>Total Questions:</strong> <?= $result['total_questions'] ?></div>
        <div class="result-item">🖊️ <strong>Attempted:</strong> <?= $result['attempted'] ?></div>
        <div class="result-item">✅ <strong>Correct Answers:</strong> <?= $result['correct_answers'] ?></div>

        <div class="percentage" style="margin-top: 15px; font-size: 20px; font-weight: bold;">
            🎯 Score: <?= $result['percentage'] ?>%
        </div>

        <?php
        $passing_percent = 33;
        $status_class = ($result['percentage'] >= $passing_percent) ? 'pass' : 'fail';
        $status_text = ucfirst($status_class);
        ?>

        <div class="status <?= $status_class ?>" style="margin-top: 10px; font-size: 18px; font-weight: bold; color: <?= ($status_class == 'pass') ? 'green' : 'red' ?>;">
            <?= $status_text ?>
        </div>

    <?php else: ?>
        <p style="text-align: center; color: red;">Result not found.</p>
    <?php endif; ?>
</div>
  </div>
</section>

    <?php include('footer.php');?>

