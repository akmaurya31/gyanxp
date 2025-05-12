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
                        <?= validation_errors() ?>

                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Add New Subject</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card-box table-responsive">
                                            <form name="ff" method="post" action="<?php echo base_url('Subjects/create');?>" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="row form-group">


                                <div class="col-md-6"> 
                                    <label for="course_id">Course Title</label>
                                    <select name="course_id" class="form-control">
                                        <option value="">-- Select Course --</option>
                                        <?php if (!empty($courses)) : ?>
                                            <?php foreach ($courses as $course) : ?>
                                                <option value="<?= $course->id ?>" <?= set_select('course_id', $course->id) ?>>
                                                    <?= $course->course_name ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                    <?= form_error('course_id', '<div class="error">', '</div>'); ?>
                                </div>



                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-12">
                                                                    <label for="name">Subject Name</label>
                                                                    <?php echo form_error('name', '<div class="error">', '</div>'); ?>
                                                                    <input type="text" name="subject_name" class="form-control" value="<?php echo set_value('name'); ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                       

                                                    
                                                    </div>

                                             
                                             
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="fa fa-clone"></i> create
                                                    </button>
                                                </div>
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
