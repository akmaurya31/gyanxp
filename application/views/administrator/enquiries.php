<?php include('header.php');?>
<style type="text/css">
	label span{
	    color: red;
	    font-size: 12px;
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
                <div class="alert alert-danger alert-dismissible " role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                  <strong>Success!</strong> <?php echo $this->session->userdata('success');?>
                </div>
              <?php }
                  if($this->session->userdata('error')){
              ?>
                  <div class="alert alert-danger alert-dismissible " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Warning!</strong> <?php echo $this->session->userdata('error');?>
                  </div>
              <?php } if(validation_errors()){?>
                  <div class="alert alert-danger alert-dismissible " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Warning!</strong> <?php echo validation_errors();?>
                  </div>

              <?php }?>
              <div class="x_panel">
                <div class="x_title">
                  <h2>Manage Appointment </h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
                          <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                          <thead>

                            <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Mobile</th>
                              <th>City</th>
                              <th>message</th>
                              <th>Resource</th>
                              <th>Appointment Date</th>
                              <th width="100">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                                $i=1;
                                if(!empty($list)){
                                  foreach($list as $li){
                            ?>
                              <tr>
                                <td><?php echo $i;?></td>
                                <td class="text-capitalize">
                                  <?php echo $li->name;?>
                                </td>

                                <td>
                                	<?php echo $li->mobile;?>
                                </td>

                                <td>
                                	<?php echo $li->city;?>
                                </td>
                                
                                <td>
                                	<?php echo $li->message;?>
                                </td>

                                <td>
                                	<?php echo $li->resources;?>
                                </td>

                                <td>
                                	<?php echo $li->appointment_date;?>
                                </td>
                                <td>
                                  <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteConfirm<?php echo $li->id;?>">
                                    <i class="fa fa-trash"></i>
                                  </a>
                                </td>
                              </tr>

                              <!-- Del Modal -->
                              <div class="modal fade" id="deleteConfirm<?php echo $li->id;?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                  <div class="modal-content">
                                    <div class="modal-body">
                                      <h3><i class="fa fa-warning text-danger"></i> Are you sure?</h3>
                                      <p>Once deleted, you will not be able to restore this information!</p>
                                      <form method="post" action="<?php echo base_url('Enquiries/deleteEnquiry/'.$li->id);?>">
                                        <div class="col-12 text-right">
                                          <button type="submit" class="btn btn-success btn-sm">Yes</button>
                                          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">No</button>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <!-- ViewModal -->
                              
                            </div>
                              <?php $i++;}}?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>

        <!-- /page content -->

        <!-- footer content -->
        <?php include('footer.php');?>
