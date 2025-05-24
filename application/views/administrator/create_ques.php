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
                                <h2><?php echo $mode == 'edit' ? 'Edit' :'Save'; ?> Question</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card-box table-responsive"> 

                                        <div class="card-box table-responsive">
    <form method="post" action="<?php echo base_url('Quizadmin/' . ($mode == 'edit' ? 'updateQues/'.$question->id : 'save')); ?>" enctype="multipart/form-data">
    

        <div class="row">
            <!-- Question Text -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Question (English):</label>
                <textarea class="ckeditor" name="question_en"><?php echo $mode == 'edit' ? $question->question_en: ''; ?></textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">प्रश्न (Hindi):</label>
                <textarea class="ckeditor" name="question_hi"><?php echo $mode == 'edit' ? $question->question_hi: ''; ?></textarea>
            </div>

       

            <!-- Options A -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Option A (English):</label>
                <textarea class="form-control" name="option_a_en" rows="3"><?php echo $mode == 'edit' ? $question->option_a_en: ''; ?></textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">विकल्प A (Hindi):</label>
                <textarea class="form-control" name="option_a_hi" rows="3"><?php echo $mode == 'edit' ? $question->option_a_hi: ''; ?></textarea>
            </div>

            <!-- Options B -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Option B (English):</label>
                <textarea class="form-control" name="option_b_en" rows="3"><?php echo $mode == 'edit' ? $question->option_b_en: ''; ?></textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">विकल्प B (Hindi):</label>
                <textarea class="form-control" name="option_b_hi" rows="3"><?php echo $mode == 'edit' ? $question->option_b_hi: ''; ?></textarea>
            </div>

            <!-- Options C -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Option C (English):</label>
                <textarea class="form-control" name="option_c_en" rows="3"><?php echo $mode == 'edit' ? $question->option_c_en: ''; ?></textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">विकल्प C (Hindi):</label>
                <textarea class="form-control" name="option_c_hi" rows="3"><?php echo $mode == 'edit' ? $question->option_c_hi: ''; ?></textarea>
            </div>

            <!-- Options D -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Option D (English):</label>
                <textarea class="form-control" name="option_d_en" rows="3"><?php echo $mode == 'edit' ? $question->option_d_en: ''; ?></textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">विकल्प D (Hindi):</label>
                <textarea class="form-control" name="option_d_hi" rows="3"><?php echo $mode == 'edit' ? $question->option_d_hi: ''; ?></textarea>
            </div>

            <!-- Correct Answer -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Correct Option / सही उत्तर:</label>
                <select class="form-control" name="correct_option" required>
                    <option value="">-- Select Correct Option --</option>
                    <option value="A" <?php echo ($mode == 'edit' && $question->correct_option == 'A') ? 'selected' : ''; ?>>Option A</option>
                    <option value="B" <?php echo ($mode == 'edit' && $question->correct_option == 'B') ? 'selected' : ''; ?>>Option B</option>
                    <option value="C" <?php echo ($mode == 'edit' && $question->correct_option == 'C') ? 'selected' : ''; ?>>Option C</option>
                    <option value="D" <?php echo ($mode == 'edit' && $question->correct_option == 'D') ? 'selected' : ''; ?>>Option D</option>
                </select>
            </div>

            <!-- Image Upload -->
            <div class="col-md-6 mb-3">
                        <label class="form-label">Upload Image / इमेज अपलोड करें:</label>
                        <input type="file" class="form-control" name="question_image" accept="image/*">
            </div>


        </div>

        <!-- Submit Button -->
         
        <button type="submit" class="btn btn-success"> <?php echo $mode == 'edit' ? 'Update Question' : 'Submit / सबमिट करें'; ?></button>
    </form>
</div>








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
