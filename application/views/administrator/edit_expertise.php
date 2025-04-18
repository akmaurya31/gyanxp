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
                                <h2>Edit Expertise</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card-box table-responsive">

                                            <form method="post" action="<?php echo base_url('Expertise/updateUser');?>" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="row form-group">
                                                        <div class="col-md-12">

                                                            <div class="row form-group">
                                                                <div class="col-md-6">
                                                                    <label for="email">Expertise Name</label>
                                                                    <?php echo form_error('name', '<div class="error">', '</div>'); ?>
                                                                    <input type="text" name="name" class="form-control" value="<?php echo set_value('name',$edit[0]->name); ?>">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="email">Expertise Status</label>
                                                                    <?php echo form_error('email', '<div class="error">', '</div>'); ?>
                                                                    <select name="status" class="form-control">
                                                                        <option value="">Please Select...</option>
                                                                        <option value="0" <?php echo  set_select('status', '0',$edit[0]->status == '0' ? TRUE : FALSE); ?>>Active</option>
                                                                        <option value="1" <?php echo  set_select('status', '1',$edit[0]->status == '1' ? TRUE : FALSE); ?>>Block</option>
                                                                    </select>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fa fa-clone"></i> Create
                                                </button>
                                                <input type="hidden" name="editID" value="<?php echo $edit[0]->id;?>">
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
