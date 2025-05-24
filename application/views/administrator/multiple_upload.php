<?php include('header.php'); ?>

<style>
    .uk_img img{
        width: 100%;
        height: 150px;
    }
</style>

<body class="nav-md">
    <div id="load"></div>
    <div class="container body">
        <div class="main_container">

            <!-- Sidebar and Navbar -->
            <?php include('navbar.php'); ?>

            <!-- Page Content -->
            <div class="right_col" role="main">
                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12">

                        <!-- Flash messages -->
                        <?php if ($this->session->userdata('success')) : ?>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                <strong>Success!</strong> <?= $this->session->userdata('success'); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($this->session->userdata('error')) : ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                <strong>Warning!</strong> <?= $this->session->userdata('error'); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                <strong>Warning!</strong> <?= validation_errors(); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Main panel -->
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Manage Media</h2>
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addSliderModal">
                                    <i class="fa fa-plus-circle"></i>
                                </button>
                                <div class="clearfix"></div>
                            </div>

                            <div class="x_content">
                                <div class="row">
                                    <div class="row mt-4">
                                        <?php if (!empty($images)): ?>
                                          <?php foreach ($images as $img): ?>
                                            <div class="col-md-2 ">
                                                <div class="uk_img">
                                                    <img src="<?= $img->file_name ?>" class="img-fluid img-thumbnail mt-2">
                                                </div>
                                              <div class="card-body text-center">
                                                <button class="btn btn-sm btn-outline-primary copy-btn" data-url="<?= $img->file_name ?>">Copy URL</button>
                                                <a href="<?= base_url('Coursesadmin/deleteMedia/' . $img->id) ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this image?')">Delete</a>
                                              </div>
                                            </div>
                                          <?php endforeach; ?>
                                        <?php endif; ?>
                                      </div>
                            </div> <!-- x_content -->
                        </div> <!-- x_panel -->

                    </div>
                </div> <!-- row -->

            </div> <!-- right_col -->

            <!-- Add Slider Modal -->
<div class="modal fade" id="addSliderModal" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addSliderModalLabel">Upload Media</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
            <form action="<?= base_url('Coursesadmin/media_upload') ?>" method="post" enctype="multipart/form-data">
                <input type="file" name="images[]" multiple class="form-control mb-2">
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
    </div>
  </div>
</div>

            <!-- Footer -->
            <?php include('footer.php'); ?>

        </div> <!-- main_container -->
    </div> <!-- container body -->
</body>
<script>
document.addEventListener("DOMContentLoaded", function(){
  document.querySelectorAll('.copy-btn').forEach(btn => {
    btn.addEventListener('click', function(){
      const url = this.getAttribute('data-url');
      navigator.clipboard.writeText(url).then(() => {
        this.textContent = 'Copied!';
        setTimeout(() => this.textContent = 'Copy URL', 1500);
      });
    });
  });
});
</script>

