<?php include('header.php');?>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- Side and top navbar -->
        <?php include('navbar.php');?>

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Profile Information</h2>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <div class="col-md-3 col-sm-3  profile_left">
                          <div class="profile_img">
                            <div id="crop-avatar">
                              <!-- Current avatar -->
                              <img class="img-responsive avatar-view" src="<?php echo base_url($profileDetails[0]->thumbnail);?>" style="width: 100%;">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-9 col-sm-9 ">
                            <?php if($this->session->flashdata('success')){?>
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <h5><?php echo $this->session->flashdata('success');?></h5>
                                </div>
                            <?php }?>
                            <?php if($this->session->flashdata('error')){?>
                                <div class="alert alert-danger alert-dismissible" role="alert" style="background-color: transparent; !important;border-color: #ff0000 !important;">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <h5 style="color: #ff0000"><?php echo $this->session->flashdata('error');?></h5>
                                </div>
                            <?php }?>
                            <form method="post" action="<?php echo base_url('Master/UpdateProfile');?>" enctype="multipart/form-data">
                                <div class="form-group col-md-6">
                                    <label>Name:</label>
                                    <input type="text" class="form-control text-capitalize" name="name" value="<?php echo $profileDetails[0]->name;?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email:</label>
                                    <input type="text" class="form-control" value="<?php echo $profileDetails[0]->email;?>" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Role:</label>
                                    <input type="text" class="form-control text-capitalize" value="<?php echo $profileDetails[0]->role;?>" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Status:</label>
                                    <input type="text" class="form-control text-capitalize" value="<?php echo $profileDetails[0]->status;?>" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Change Profile Photo:</label>
                                    <input type="file" class="form-control text-capitalize" name="thumbnail" style="line-height: 20px; height: 40px;">
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="hidden" name="added_image" value="<?php echo $profileDetails[0]->thumbnail;?>">
                                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Change Password</h2>
                        <div class="clearfix"></div>
                    </div>
                    <?php if($this->session->flashdata('success2')){?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <h5><?php echo $this->session->flashdata('success2');?></h5>
                        </div>
                    <?php }?>
                    <?php if($this->session->flashdata('error2')){?>
                        <div class="alert alert-danger alert-dismissible" role="alert" style="background-color: transparent; !important;border-color: #ff0000 !important;">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <h5 style="color: #ff0000"><?php echo $this->session->flashdata('error2');?></h5>
                        </div>
                    <?php }?>
                    <form method="post" action="<?php echo base_url('Master/UpdateProfilePassword');?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>New Password:</label>
                            <input type="password" class="form-control"  name="password" id="password">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password:</label>
                            <input type="password" class="form-control" name="cpassword" id="cpassword">
                        </div>
                        <div class="form-group">
                            <input type="checkbox" onclick="myFunction()"> Show Password
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

        <!-- /page content -->

        <!-- footer content -->
<?php include('footer.php');?>

<script type="text/javascript">
  function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
    var y = document.getElementById("cpassword");
    if (y.type === "password") {
      y.type = "text";
    } else {
      y.type = "password";
    }
  }
</script>