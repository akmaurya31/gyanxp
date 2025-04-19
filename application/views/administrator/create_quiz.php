<?php include('header.php');?>
<style>
    .img-thumbnail{
        width: 100%;
    }
    .img-section{
        position: relative;
    }
    .upload-btn{
        position: absolute;
        bottom: 0px;
        left: 15px;
        right: 15px;
        background: #2a3f54b5;
        padding: 15px;
        color: #fff;
        text-align: center;
    }
    .custom-upload{
        position: absolute;
        left: 0;
        right: 0px;
        top: 0;
        bottom: 0;
        opacity: 0.001;
    }
    .card-box form{
        padding: 0px 15px;
        overflow: hidden;
    }

    .error{
        color: red;
        padding: 7px 0px;
        font-size: 11px;
    }

</style>
<body class="nav-md">
    <div id="load"></div>
    <div class="container body">
        <div class="main_container">
            <!-- Side and top navbar -->
            <?php include('navbar.php');?>

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <?php if($this->session->userdata('success')){ ?>
                        <div class="alert alert-success alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">×</span>
                            </button>
                            <strong>Success!</strong> <?php echo $this->session->userdata('success');?>
                        </div>
                        <?php }
                        if($this->session->userdata('error')){
                        ?>
                        <div class="alert alert-danger alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">×</span>
                            </button>
                            <strong>Warning!</strong> <?php echo $this->session->userdata('error');?>
                        </div>
                        <?php } ?>


                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Add Quiz</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card-box table-responsive"> 
 
  <form method="post" action="<?= base_url('Quizadmin/quiz_save') ?>">
  <?php if (isset($mode) && $mode == 'edit'): ?>
    <input type="hidden" name="id" value="<?= $quiz->id ?>">
  <?php endif; ?>

  <div class="row">

 

 
  <div class="col-md-6 mb-3">
  <label for="course_id">Choose Course <?php // $ccourse->id; ?></label>
  <select class="form-control" name="course_id" id="course_id" required>
    <option value="">-- Select Course --</option>
    <?php foreach($courses as $course): ?>
      <option value="<?= $course->id ?>" 
        <?= (isset($ccourse) && $ccourse->id == $course->id) ? 'selected' : '' ?>>
        <?= $course->course_name ?>
      </option>
    <?php endforeach; ?>
  </select>
</div> 


    <div class="col-md-6 mb-3">
      <label>Quiz Title</label>
      <input type="text" class="form-control" name="title" value="<?= isset($quiz->title) ? $quiz->title : '' ?>" required>
    </div>

    <div class="col-md-6 mb-3">
      <label>Quiz Sub-Title</label>
      <input type="text" class="form-control" name="subtitle" value="<?= isset($quiz->subtitle) ? $quiz->subtitle : '' ?>">
    </div>

    <div class="col-md-6 mb-3">
      <label>Duration (in Minutes)</label>
      <input type="number" class="form-control" name="duration_minutes" value="<?= isset($quiz->duration_minutes) ? $quiz->duration_minutes : '90' ?>" required>
    </div>
  </div>

  <button type="submit" class="btn btn-success">
    <?= (isset($mode) && $mode == 'edit') ? 'Update Quiz' : 'Create Quiz' ?>
  </button>
</form>










</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php include('footer.php');?>
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>



