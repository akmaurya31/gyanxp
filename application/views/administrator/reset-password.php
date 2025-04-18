<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Boosting Skill | Reset Password</title>

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
            <div class="card-title text-center border-bottom">
              <h2 class="p-3">Password Reset</h2>
            </div>
            <form action="<?php echo base_url('Login/forgotPassword');?>" method="post">
              <div class="form-group">
                <label for="username" class="form-label">Username/Email</label>
                <input type="email" name="email" class="form-control">
                <?php echo form_error('email', '<div class="error">', '</div>');?>
              </div>
              <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-key"></i> Send Reset Link</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
