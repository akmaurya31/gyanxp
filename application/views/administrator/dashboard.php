<?php include('header.php');?>
  <style type="text/css">
      .fa_format {border: 1px solid #172d44;padding: 10px 10px;border-radius: 50%;background: #fff;color: #172d44;}.mt-20{margin-top: 20px;}.card-header {font-size: 18px;font-weight: 700;font-family: inherit;color: #2a3f54;}.yellow_linear span {background-image: linear-gradient(45deg, #a37b03, transparent);}.green_linear span {background-image: linear-gradient(45deg, #007285, transparent);}.red_linear span {background-image: linear-gradient(45deg, #8d0303, transparent);}p.bank_deposit.gray_linear span {background: linear-gradient(45deg, #4e5556, transparent);}h4.uk_heading {background: #2a3f54;padding: 10px;color: #fff;font-family: "Poppins", sans-serif;font-weight: 600;font-size: 18px;text-align: center; }.card-title {margin-bottom: 0.75rem;color: #172d44;font-weight: 600;font-size: 26px;}
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
          <!-- top tiles -->

          <br />


          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mt-20">
              <div class="card bg-success text-white h-100">
                  <div class="card-header">Total Members</div>
                  <div class="card-body">
                    <h5 class="card-title">
                      <i class="fa fa-users fa_format"></i>
                      <?php
                        // $sql    = "SELECT COUNT('id') as count FROM members";
                        // $query  = $this->db->query($sql);
                        // $users  = $query->result();
                        // echo $users[0]->count;
                      ?>
                    </h5>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mt-20">
              <div class="card bg-success text-white h-100">
                  <div class="card-header">Total Appointment</div>
                  <div class="card-body">
                    <h5 class="card-title">
                      <i class="fa fa-calendar fa_format"></i>
                      <?php
                        // $sql2    = "SELECT COUNT('id') as count FROM appointment";
                        // $query2  = $this->db->query($sql2);
                        // $cats    = $query2->result();
                        // echo $cats[0]->count;
                      ?>
                    </h5>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mt-20">
              <div class="card bg-success text-white h-100">
                  <div class="card-header">Total Enquiries</div>
                  <div class="card-body">
                    <h5 class="card-title">
                      <i class="fa fa-comments-o fa_format"></i>
                      <?php
                        // $sql2    = "SELECT COUNT('id') as count FROM contacts";
                        // $query2  = $this->db->query($sql2);
                        // $cats    = $query2->result();
                        // echo $cats[0]->count;
                      ?>
                    </h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


<?php include('footer.php');?>