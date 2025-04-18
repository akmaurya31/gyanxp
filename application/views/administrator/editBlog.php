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
                                <h2>Add New Member</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card-box table-responsive">
            <form method="post" action="<?php echo base_url('Master/UpdateBlog');?>" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="inputNanme4" class="form-label">Custom Slug: </label>
                <input type="text" class="form-control" name="slug" value="<?php echo $blogs[0]->slug;?>">
              </div>
              <div class="col-md-12 mb-3">
                <label for="inputNanme4" class="form-label">Heading: </label>
                <input type="text" class="form-control" name="heading" value="<?php echo $blogs[0]->heading;?>">
              </div>

              <div class="col-md-12 mb-3">
                <label for="inputNanme4" class="form-label">short Description</label>
                <textarea class="form-control" name="short_description" rows="6"><?php echo $blogs[0]->short_description;?></textarea>
              </div>
              <div class="col-md-12 mb-3">
                <textarea class="ckeditor" name="description"><?php echo $blogs[0]->description;?> </textarea>
              </div>
              <div class="col-md-12 mb-3">
                <label for="inputNanme4" class="form-label">Upload Photo</label>
                <input type="file" class="form-control" name="image">
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label">Do you want to publish ?</label>
                <select class="form-control" name="status">
                  <option value="active" <?php if($blogs[0]->status == 'active'){ echo "selected";}?>>Yes</option>
                  <option value="inactive" <?php if($blogs[0]->status == 'inactive'){ echo "selected";}?>>No</option>
                </select>
              </div>
              <div class="col-md-6 mb-3">
                <label for="inputNanme4" class="form-label">Class Position</label>
                <input type="number" class="form-control" name="position" value="<?php echo $blogs[0]->position;?>">
              </div>
          </div>
          <input type="hidden" name="id" value="<?php echo $blogs[0]->id;?>">
          <input type="hidden" name="added_image" value="<?php echo $blogs[0]->image;?>">
          <button type="submit" class="btn btn-success">Submit</button>
          </form>
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