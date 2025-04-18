<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo base_url();?>assets/img/fevicon.jpg" type="image/ico" />

    <title>Boosting Skill :: Login </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>vendors/fontawesome/css/all.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url();?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url();?>vendors/animate/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/build/custom.min.css" rel="stylesheet">
  </head>
  <style type="text/css">
    .error {
        color: red;
    }
    .alert h5 {
        font-size: 16px;
    }
    .container {
      padding-right: 15px;
      padding-left: 15px;
      margin-right: auto;
      margin-left: auto;
    }
    @media (min-width: 1600px) {
        .container {
            max-width: 1600px;
        }
    }
    @media (min-width: 1900px) {
        .container {
            max-width: 1900px;
        }
    }
    @media (min-width: 768px) {
      .container {
        width: 750px;
      }
    }
    @media (min-width: 992px) {
      .container {
        width: 970px;
      }
    }
    @media (min-width: 1200px) {
      .container {
        width: 1180px;
      }
    }
    body{
      background: #01182f;
    }
    .uk_login_form {
      padding: 20px;
      margin-top: 200px;
  }
  </style>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 offset-md-4">
          <div class="card shadow uk_login_form">
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
            <div class="card-title text-center border-bottom">
              <h2 class="p-3">Admin Login</h2>
            </div>
            <form action="<?php echo base_url('Login/login_user');?>" method="post">
              <div class="form-group">
                <label for="username" class="form-label">Username/Email</label>
                <input type="email" name="email" class="form-control">
              </div>

              <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
              </div>
              <button type="submit" class="btn btn-success btn-sm" name="btn_login"><i class="fa fa-key"></i> Login</button>
              <a href="<?php echo base_url('Login/resetPasswordLink');?>">Reset Password</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
