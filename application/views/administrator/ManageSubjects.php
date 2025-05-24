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
                <div class="alert alert-success alert-dismissible " role="alert">
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
                  <h2>Manage Subjects </h2>
                  <a href="<?php echo base_url('Subjects/addNewSubject');?>" class="btn btn-success add_modal_button"><i class="fa fa-plus-circle"></i> Add New</a>
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
                              <th>Subject Name</th>
                              <th>Course Name</th>
                              <th width="100">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                                $i=1;
                                if(!empty($subjects)){
                                  foreach($subjects as $li){
                            ?>
                              <tr>
                                <td><?php echo $i;?></td>
                           
                                <td class="text-capitalize">
                                  <?php echo $li->title;?>
                                </td>

                                     <td style="width:350px" ><?php echo $li->course_name;?></td>
                                
                                <td>
                                  <a href="<?php echo base_url('Subjects/EditNewSubject/'.$li->id);?>" class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i>
                                  </a>
                                  <a href="<?php echo base_url('Subjects/DeleteNewSubject/'.$li->id);?>"  onclick="return confirm('Delete this subject?')" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                  </a>

                                

                                  
                                </td>
                              </tr>

                               
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
