<?php include('header.php');?>
<style>

.quform-error-message {
    display: none !important;
}  


</style>
<section class="page-title-section bg-img cover-background top-position1 left-overlay-dark" data-overlay-dark="9" data-background="<?php echo base_url()?>assets/img/bg/bg-04.jpg">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <h1>Registration Form</h1>
            </div>
            <div class="col-md-12">
                <ul>
                    <li><a href="<?php echo base_url();?>">Home</a></li>
                    <li><a href="#!">Registration Form</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="bg-very-light-gray py-md-8 pb-lg-0">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-6 d-none d-lg-block">
                <img src="<?php echo base_url();?>assets/img/content/contact-img-01.jpg" alt="...">
            </div>
            <div class="col-lg-6">
                <div class="faq-form">
                    <h2 class="mb-4 text-primary">Register Yourself</h2>
                    <form id="registerForm" class="contact quform" action="<?php echo base_url('student/register'); ?>" method="post" enctype="multipart/form-data">
    <div class="quform-elements">
        <div class="quform-element form-group">
            <div class="quform-input">
                <input class="form-control" id="name" type="text" name="name" placeholder="Your name here" required />
            </div>
        </div>

        <div class="quform-element form-group">
            <div class="quform-input">
                <input class="form-control" id="email" type="email" name="email" placeholder="Your email here" required />
            </div>
        </div>

        <div class="quform-element form-group">
            <div class="quform-input">
                <input class="form-control" id="phone" type="text" name="phone" placeholder="Your Mobile Number" pattern="[0-9]{10}" title="Enter 10 digit mobile number" required />
            </div>
        </div>

        <div class="quform-element form-group">
            <div class="quform-input">
                <input class="form-control" id="password" type="password" name="password" placeholder="New Password" required />
            </div>
        </div>

        <div class="quform-element form-group">
            <div class="quform-input">
                <input class="form-control" id="confirm_password" type="password" placeholder="Confirm Password" required />
            </div>
        </div>

        <div class="quform-submit-inner">
            <button class="butn secondary" type="submit"><i class="far fa-paper-plane icon-arrow before"></i><span class="label">Submit</span><i class="far fa-paper-plane icon-arrow after"></i></button>
        </div>

        <p style="margin-top: 10px;">
            <b>Already registered?</b> <a href="userlogin" class="butn sub-title">Click here to Login</a>
        </p>
    </div>
</form>

                </div>
            </div>
        </div>
    </div>
</section>
<?php include('footer.php');?>

<script>
   
$('#registerForm').on('submit', function(e) {
    e.preventDefault();

    const password = $('#password').val().trim();
    const confirmPassword = $('#confirm_password').val().trim();

    // Check for empty fields
    if (!password || !confirmPassword) {
        toastr.error("Both password fields are required.");
        return;
    }

    // Password match check
    if (password !== confirmPassword) {
        toastr.error("Passwords do not match!");
        return;
    }

    // If validation passes, send AJAX request
    $.ajax({
        url: '<?php echo base_url("student/register_user"); ?>',
        type: 'POST',
        data: $(this).serialize(),
        dataType: 'json',
        success: function(response) {
            if (response.status) {
                toastr.success(response.message);
                $('#registerForm')[0].reset(); // Optionally reset form
            } else {
                toastr.error(response.message);
            }
        },
        error: function() {
            toastr.error('Something went wrong!');
        }
    });
});
</script>   