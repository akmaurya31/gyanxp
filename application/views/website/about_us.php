<?php include('header.php');?>
<style>
    .quform-error-message2 {
        display: none !important;
    }
    .quform-error-title {
        display: none  !important;
    }
</style>
<section class="page-title-section bg-img cover-background top-position1 left-overlay-dark" data-overlay-dark="9" data-background="<?php echo base_url()?>assets/img/bg/bg-04.jpg">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <h1>About Us</h1>
            </div>
            <div class="col-md-12">
                <ul>
                    <li><a href="<?php echo base_url();?>">Home</a></li>
                    <li><a href="#!">About Us</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="aboutus-style-02">
    <div class="container">
        <h1>About Us</h1>
        <p>Welcome to <strong>BoostingSkills</strong> – your one-stop destination for learning practical and in-demand computer skills. Our mission is to empower students, professionals, and tech enthusiasts by providing high-quality, easy-to-understand computer courses.</p>
        <p>At BoostingSkills, we believe that anyone can master technology with the right guidance and resources. Whether you're a beginner looking to understand the basics or an advanced learner aiming to sharpen your skills, we have something for everyone.</p>
        <p>Our courses cover a wide range of topics including:</p>
        <ul>
            <li>Computer Fundamentals</li>
            <li>Programming Languages (like Python, C++, Java)</li>
            <li>Web Development</li>
            <li>Graphic Designing</li>
            <li>MS Office and more...</li>
        </ul>
        <p>We are committed to helping you build a brighter future by making computer education accessible, affordable, and engaging.</p>
        <p>Join us and start your journey toward digital excellence today!</p>
    </div>
</section>

<?php include('footer.php');?>

<script>
$('#enquiryForm').submit(function (e) {
    e.preventDefault();

    var formData = new FormData(this);

    $.ajax({
        url: '<?php echo base_url("enquiry/save"); ?>',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            if (response.status) {
                toastr.success(response.message);
                $('#enquiryForm')[0].reset();
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