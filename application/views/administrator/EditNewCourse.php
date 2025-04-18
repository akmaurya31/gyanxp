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
                        <?= validation_errors(); ?>

                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Edit Course</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card-box table-responsive">
<form method="post" action="<?php echo base_url('Courses/edit/'.$course->id);?>" enctype="multipart/form-data">
    <div class="modal-body">
        <div class="row form-group">
            <div class="col-md-12">
                <div class="row form-group">
                    <div class="col-md-12">
                        <label for="name">Course Name</label>
                        <?php echo form_error('name', '<div class="error">', '</div>'); ?>
                        <input type="text" name="name" class="form-control" value="<?= set_value('course_name', $course->course_name) ?>">
                    </div>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="position">Course Duration</label>
                <input type="text" name="duration" class="form-control" value="<?= set_value('course_name', $course->course_duration) ?>">
            </div>

            <div class="form-group col-md-6">
                <label for="position">Course Fees</label>
                <input type="text" name="fee" class="form-control" value="<?= set_value('course_name', $course->course_fees) ?>">
            </div>
            <div class="form-group col-md-12">
                <label for="position">Course Syllabus</label>
                <textarea class="ckeditor" name="syllabus"><?= set_value('course_syllabus', $course->course_syllabus) ?></textarea>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-4">
                <label for="email">Status</label>
                <select name="status" class="form-control">
                    <option value="">Please Select...</option>
                    <option value="Active" <?= set_select('status', 'Active', $course->status == 'Active') ?>>Active</option>
                    <option value="Inactive" <?= set_select('status', 'Inactive', $course->status == 'Inactive') ?>>Inactive</option>
                </select>
                <?php echo form_error('status', '<div class="error">', '</div>'); ?>
            </div>
            <div class="form-group col-md-4">
                <label for="position">Position</label>
                <input type="number" name="position" class="form-control" value="<?= set_value('position', $course->position) ?>">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-4 mt-2">
                <label for="profile">Image</label>
                <?php echo form_error('image', '<div class="error">', '</div>'); ?>
                <?php if (!empty($course->image)) { ?>
                    <img src="<?= base_url('uploads/courses/' . $course->image) ?>" width="100%">
                <?php }else{ ?>
                    <img src="<?php echo base_url();?>assets/img/no_preview.jpg" class="img-thumbnail" id="output">
                <?php }?>
                <div class="upload-btn">
                    <i class="fa fa-camera"></i>
                    <input type="file" name="image" class="custom-upload" onchange="loadFile(event)" accept="image/jpg">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success">
            <i class="fa fa-clone"></i> Save Changes
        </button>
    </div>
</form>
                                        </div>
                                    </div>
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
