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
                                <h2>Edit Member</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card-box table-responsive">

                                            <form method="post" action="<?php echo base_url('Members/updateUser');?>" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="row form-group">
                                                        <div class="col-md-12">

                                                            <div class="row form-group">
                                                                <div class="col-md-8">
                                                                    <label for="email">Member Name</label>
                                                                    <?php echo form_error('name', '<div class="error">', '</div>'); ?>
                                                                    <input type="text" name="name" class="form-control" value="<?php echo set_value('name',$edit[0]->name); ?>">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="email">Areas of Expertise</label>
                                                                    <?php echo form_error('expertise', '<div class="error">', '</div>'); ?>
                                                                    <select name="expertise" class="form-control" >
                                                                        <option value="">Please Select...</option>
                                                                        <?php
                                                                            $query2 = $this->db->select('*')
                                                                                                ->from('expertises')
                                                                                                ->get();
                                                                            $expertises = $query2->result();

                                                                            foreach($expertises as $exp){
                                                                                if($exp->status == 1){?>
                                                                                    <option value="" <?php echo  set_select('expertise', $exp->id,$edit[0]->areas_of_expertise == $exp->id ? TRUE : FALSE); ?>>
                                                                                        <?php echo "Default Expertise";?>
                                                                                    </option>
                                                                                <?php
                                                                                }else{
                                                                            ?>
                                                                                <option value="<?php echo $exp->id;?>" <?php echo  set_select('expertise', $exp->id,$edit[0]->areas_of_expertise == $exp->id ? TRUE : FALSE); ?>>
                                                                                    <?php echo $exp->name;?>
                                                                                </option>
                                                                        <?php
                                                                            }}
                                                                        ?>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="row form-group">
                                                                <div class="col-md-12">
                                                                    <label>About <?php echo form_error('about', '<div class="error">', '</div>'); ?></label>
                                                                    <textarea class="form-control ckeditor" placeholder="About" name="about" id="editor1">
                                                                    <?php echo set_value('about',$edit[0]->about); ?>
                                                                    </textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <label for="email">Status</label>
                                                                    <select name="status" class="form-control">
                                                                        <option value="">Please Select...</option>
                                                                        <option value="active" <?php echo  set_select('status', 'active',$edit[0]->status == 'active' ? TRUE : FALSE); ?>>Active</option>
                                                                        <option value="block" <?php echo  set_select('status', 'block',$edit[0]->status == 'block' ? TRUE : FALSE); ?>>Block</option>
                                                                    </select>
                                                                    <?php echo form_error('status', '<div class="error">', '</div>'); ?>
                                                                </div>

                                                                <div class="col-md-4 img-section">
                                                                    <label for="email">Reviews</label>
                                                                    <select name="reviews" class="form-control">
                                                                        <option value="">Please Select...</option>
                                                                        <option value="1" <?php echo  set_select('reviews', '1',$edit[0]->reviews == '1' ? TRUE : FALSE); ?>>1 Star</option>
                                                                        <option value="2" <?php echo  set_select('reviews', '2',$edit[0]->reviews == '2' ? TRUE : FALSE); ?>>2 Star</option>
                                                                        <option value="3" <?php echo  set_select('reviews', '3',$edit[0]->reviews == '3' ? TRUE : FALSE); ?>>3 Star</option>
                                                                        <option value="4" <?php echo  set_select('reviews', '4',$edit[0]->reviews == '4' ? TRUE : FALSE); ?>>4 Star</option>
                                                                        <option value="5" <?php echo  set_select('reviews', '5',$edit[0]->reviews == '5' ? TRUE : FALSE); ?>>5 Star</option>
                                                                    </select>
                                                                    <?php echo form_error('reviews', '<div class="error">', '</div>'); ?>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="position">Position</label>
                                                                    <input type="number" class="form-control" name="position" value="<?php echo $edit[0]->position;?>">
                                                                </div>

                                                                <div class="col-md-4 mt-2">
                                                                    <label for="email">Profile Image</label>
                                                                    <?php echo form_error('profileImg', '<div class="error">', '</div>'); ?>
                                                                    <img src="<?php echo base_url('uploads/members/'.$edit[0]->photo);?>" class="img-thumbnail" id="output">

                                                                    <div class="upload-btn">
                                                                        <i class="fa fa-camera"></i>
                                                                        <input type="file" name="profileImg" class="custom-upload" onchange="loadFile(event)" accept="image/jpg">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fa fa-clone"></i> create
                                                </button>
                                                <input type="hidden" name="editID" value="<?php echo $edit[0]->id;?>">
                                                <input type="hidden" name="oldImg" value="<?php echo $edit[0]->photo;?>">
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
