<?php include('header.php'); ?>
<style>
    .quform-error-message, .quform-error-message2 {
        display: none !important;
    }
    .tab-pane {
        margin-top: 20px;
    }
</style>

<section class="page-title-section bg-img cover-background top-position1 left-overlay-dark" data-overlay-dark="9" data-background="<?php echo base_url()?>assets/img/bg/bg-04.jpg">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <h1>Update Profile</h1>
                <ul>
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li><a href="#!">Update Profile</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div class="container py-5">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" id="profileTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="update-tab" data-bs-toggle="tab" href="#update" role="tab">Update Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="photo-tab" data-bs-toggle="tab" href="#photo" role="tab">Photo Upload</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="password-tab" data-bs-toggle="tab" href="#password" role="tab">Change Password</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">

        <!-- Update Profile -->
        <div class="tab-pane fade show active" id="update" role="tabpanel">
            <form id="updateProfileForm" method="POST" action="<?= base_url('update-profile-process') ?>">
                <input type="hidden" name="id" value="<?= $user['id'] ?>">

                <label>Name</label>
                <input type="text" name="name" value="<?= $user['name'] ?>" required class="form-control mb-2">

                <label>Email</label>
                <input type="email" name="email" value="<?= $user['email'] ?>" required class="form-control mb-2">

                <label>Mobile</label>
                <input type="text" name="mobile" value="<?= $user['mobile'] ?>" class="form-control mb-2">

                <button type="submit" name="update_profile" class="btn btn-primary mt-2">Update Profile</button>
            </form>
        </div>

        <!-- Photo Upload -->
        <div class="tab-pane fade" id="photo" role="tabpanel">
            <form method="POST" id="updatePhotoForm" enctype="multipart/form-data" action="<?= base_url('update-photo-process') ?>">
                <input type="hidden" name="id" value="<?= $user['id'] ?>">

                <label>Profile Photo</label>
                <input type="file" name="photo" class="form-control mb-2">
                <?php if ($user['photo_path']): ?>
                    <img src="<?= base_url('uploads/' . $user['photo_path']) ?>" width="100" class="mt-2">
                <?php endif; ?>

                <button type="submit" name="update_photo" class="btn btn-success mt-2">Upload Photo</button>
            </form>
        </div>

        <!-- Change Password -->
        <div class="tab-pane fade" id="password" role="tabpanel">
            <form method="POST" id="updatePasswordForm" action="<?= base_url('update-password-process') ?>">
                <input type="hidden" name="id" value="<?= $user['id'] ?>">

                <label>Old Password</label>
                <input type="password" name="old_password" required class="form-control mb-2">

                <label>New Password</label>
                <input type="password" name="new_password" required class="form-control mb-2">

                <label>Confirm New Password</label>
                <input type="password" name="confirm_password" required class="form-control mb-2">

                <button type="submit" name="change_password" class="btn btn-warning mt-2">Change Password</button>
            </form>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>

<script>
$('#updateProfileForm').submit(function (e) {
    e.preventDefault();

    var formData = new FormData(this);

    $.ajax({
        url: '<?php echo base_url("update-profile-process"); ?>',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response) {
            if (response.status) {
                toastr.success(response.message);
            } else {
                toastr.error(response.message);
            }
        },
        error: function () {
            toastr.error('Something went wrong!');
        }
    });
});
</script>
<script>
$('#updatePhotoForm').submit(function (e) {
    e.preventDefault();

    var formData = new FormData(this);

    $.ajax({
        url: '<?php echo base_url("update-photo-process"); ?>',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response) {
            if (response.status) {
                toastr.success(response.message);
                // Optionally reload photo preview
                setTimeout(() => location.reload(), 1000);
            } else {
                toastr.error(response.message);
            }
        },
        error: function () {
            toastr.error('Something went wrong!');
        }
    });
});
</script>
<script>
$('#updatePasswordForm').submit(function (e) {
    e.preventDefault();

    var formData = new FormData(this);

    $.ajax({
        url: '<?php echo base_url("update-password-process"); ?>',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response) {
            if (response.status) {
                toastr.success(response.message);
                $('#updatePasswordForm')[0].reset();
            } else {
                toastr.error(response.message);
            }
        },
        error: function () {
            toastr.error('Something went wrong!');
        }
    });
});
</script>
