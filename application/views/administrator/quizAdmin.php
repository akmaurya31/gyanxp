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
                  <h2>Quiz </h2>
                  <a href="<?php echo base_url('Quizadmin/add');?>" class="btn btn-success add_modal_button">
                      <i class="fa fa-plus-circle"></i> Add New</a>
                  <div class="clearfix"></div>
                  
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="card-box table-responsive">

                        <!-- Table with stripped rows -->
                        <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Image</th>
                              <th scope="col">Heading</th>
                              <th scope="col">Position</th>
                              <th scope="col">Inserted On</th>
                              <th scope="col">Last Updated On</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $i=1; if($Blogs){ foreach($Blogs as $list){?>
                              <tr>
                                <th scope="row"><?php echo $i;?></th>
                                <td><img src="<?php echo base_url($list->image);?>" style="width:50px"></td>
                                <td style="text-transform: capitalize!important;">
                                  <?php echo $list->heading;?>    
                                </td>
                                <td><?php echo $list->position;?></td>
                                <td><?php echo $list->inserted_on;?></td>
                                <td><?php echo $list->last_updated_on;?></td>
                                <td>
                                  <a href="<?php echo base_url('Master/editBlog/'.$list->id);?>" class="btn btn-primary btn-sm" title="Edit Blog">
                                    <i class="fa fa-edit"></i>
                                  </a>
                                  <?php if($list->status=='active'){?>
                                    <a href="<?php echo base_url('Master/DeactiveBlog/'.$list->id);?>" class="btn btn-success btn-sm"  title="Block Blog"><i class="fa fa-unlock"></i></a>
                                  <?php }else{ ?>
                                    <a href="<?php echo base_url('Master/ActiveBlog/'.$list->id);?>" class="btn btn-warning btn-sm"  title="Unlock Blog"><i class="fa fa-lock"></i></a>
                                  <?php }?>
                                  <a href="<?php echo base_url('Master/deleteBlog/'.$list->id);?>" class="btn btn-danger btn-sm" title="Delete Blog" onclick="return confirm('Are you sure you want to delete this blog?');"> <i class="fa fa-trash"></i> </a>

                                </td>
                              </tr>
                            <?php $i++; }}?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>


            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include('footer.php');?>