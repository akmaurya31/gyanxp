<?php include('header.php'); ?>

<style>
    label span {
        color: red;
        font-size: 12px;
    }

    button.btn.btn-primary.btn-sm {
        position: absolute;
        right: 10px;
        top: 10px;
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
                                <h2>Manage Slider</h2>
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addSliderModal">
                                    <i class="fa fa-plus-circle"></i>
                                </button>
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
                                                        <th>Image</th>
                                                        <th>Title</th>
                                                        <th>Description</th>
                                                        <th>Button</th>
                                                        <th>Button URL</th>
                                                        <th>Status</th>
                                                        <th width="100">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; if (!empty($list)) : foreach ($list as $slider) : ?>
                                                        <tr>
                                                            <td><?= $i; ?></td>
                                                            <td><img src="<?php echo base_url('slider/'.$slider->image);?>" style="width: 100px;"></td>
                                                            <td><?= $slider->title; ?></td>
                                                            <td><?= $slider->description; ?></td>
                                                            <td><?= $slider->button; ?></td>
                                                            <td><?= $slider->button_url; ?></td>
                                                            <td><?= $slider->status; ?></td>
                                                            <td>
                                                                <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit<?= $slider->id; ?>">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                                
                                                                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteConfirm<?= $slider->id; ?>">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                            </td>
                                                        </tr>

                                                        <!-- Delete Modal -->
                                                        <div class="modal fade" id="deleteConfirm<?= $slider->id; ?>" data-backdrop="static" data-keyboard="false">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <h3><i class="fa fa-warning text-danger"></i> Are you sure?</h3>
                                                                        <p>Once deleted, you will not be able to restore this information!</p>
                                                                        <form method="post" action="<?= base_url('Slider/delete/' . $slider->id); ?>">
                                                                            <div class="text-right">
                                                                                <button type="submit" class="btn btn-success btn-sm">Yes</button>
                                                                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">No</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- View Modal -->
<div class="modal fade" id="edit<?= $slider->id; ?>" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <form action="<?= base_url('slider/update/'.$slider->id); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="addSliderModalLabel">Edit Slider</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Title <span>*</span></label>
              <input type="text" name="title" class="form-control" required value="<?php echo $slider->title;?>">
            </div>

            <div class="form-group col-md-12">
              <label>Description</label>
              <textarea name="description" class="form-control"><?php echo $slider->description;?></textarea>
            </div>

            <div class="form-group col-md-6">
              <label>Button Text</label>
              <input type="text" name="button" class="form-control" value="<?php echo $slider->button;?>">
            </div>

            <div class="form-group col-md-6">
              <label>Button URL</label>
              <input type="url" name="button_url" class="form-control" value="<?php echo $slider->button_url;?>">
            </div>

            <div class="form-group col-md-4">
              <label>Image <span>*</span></label>
              <input type="file" name="image" class="form-control">
            </div>

            <div class="form-group col-md-4">
              <label>Status</label>
              <select name="status" class="form-control">
                <option value="active" <?php if($slider->status=='active'){ echo "selected";}?>>Active</option>
                <option value="block" <?php if($slider->status=='block'){ echo "selected";}?>>Block</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Position</label>
              <input type="number" name="position" class="form-control" value="<?php echo $slider->position;?>">
            </div>
          </div>

          <!-- Hidden Fields for dates -->
          <input type="hidden" name="inserted_date" value="<?= date('Y-m-d H:i:s'); ?>">
          <input type="hidden" name="last_updated" value="<?= date('Y-m-d H:i:s'); ?>">
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save Changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
</div>

                                                    <?php $i++; endforeach; endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div> <!-- row -->
                            </div> <!-- x_content -->
                        </div> <!-- x_panel -->

                    </div>
                </div> <!-- row -->

            </div> <!-- right_col -->

            <!-- Add Slider Modal -->
<div class="modal fade" id="addSliderModal" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <form action="<?= base_url('slider/store'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="addSliderModalLabel">Add New Slider</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Title <span>*</span></label>
              <input type="text" name="title" class="form-control" required>
            </div>

            <div class="form-group col-md-12">
              <label>Description</label>
              <textarea name="description" class="form-control"></textarea>
            </div>

            <div class="form-group col-md-6">
              <label>Button Text</label>
              <input type="text" name="button" class="form-control">
            </div>

            <div class="form-group col-md-6">
              <label>Button URL</label>
              <input type="url" name="button_url" class="form-control">
            </div>

            <div class="form-group col-md-4">
              <label>Image <span>*</span></label>
              <input type="file" name="image" class="form-control" required>
            </div>

            <div class="form-group col-md-4">
              <label>Status</label>
              <select name="status" class="form-control">
                <option value="active">Active</option>
                <option value="block">Block</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label>Position</label>
              <input type="number" name="position" class="form-control" required>
            </div>
          </div>

          <!-- Hidden Fields for dates -->
          <input type="hidden" name="inserted_date" value="<?= date('Y-m-d H:i:s'); ?>">
          <input type="hidden" name="last_updated" value="<?= date('Y-m-d H:i:s'); ?>">
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>

            <!-- Footer -->
            <?php include('footer.php'); ?>

        </div> <!-- main_container -->
    </div> <!-- container body -->
</body>
