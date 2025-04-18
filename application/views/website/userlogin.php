<?php include('header.php');?>

<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger">
        <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>


<section class="page-title-section bg-img cover-background top-position1 left-overlay-dark" data-overlay-dark="9" data-background="<?php echo base_url()?>assets/img/bg/bg-04.jpg">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <h1>User's Login</h1>
            </div>
            <div class="col-md-12">
                <ul>
                    <li><a href="<?php echo base_url();?>">Home</a></li>
                    <li><a href="#!">User's Login</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>



<section class="bg-very-light-gray py-md-8 pb-lg-0" style="padding-bottom: 4.5rem !important;">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-4 d-none d-sm-block"></div>
            <div class="col-lg-4">
                <div class="faq-form">
                    <h2 class="mb-4 text-primary">Login Here!</h2>
                    <form class="contact quform" action="<?php echo base_url('student/loginUser'); ?>" method="post" enctype="multipart/form-data" onclick="">
                        <div class="quform-elements">
                            <div class="quform-element form-group">
                                <div class="quform-input">
                                    <input class="form-control" id="name" type="email" name="email" placeholder="Your name here" />
                                </div>
                            </div>
                            <div class="quform-element form-group">
                                <div class="quform-input">
                                    <input class="form-control" id="email" type="password" name="password" placeholder="Enter Password" />
                                </div>
                            </div>
                            <div class="quform-submit-inner">
                                <button class="butn secondary" type="submit"><i class="far fa-paper-plane icon-arrow before"></i><span class="label">Login</span><i class="far fa-paper-plane icon-arrow after"></i></button>
                            </div>
                                <!-- End Submit button -->

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include('footer.php');?>