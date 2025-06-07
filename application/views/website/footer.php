<!-- FOOTER
        ================================================== -->
        <footer class="bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4 mb-2-5 mb-lg-0">
                        <a href="index.html" class="footer-logo">
                            <img src="<?php echo base_url();?>assets/img/logos/logo.gif" class="mb-4" style="width:120px" alt="Footer Logo">
                        </a>
                        
                    </div>
                    <div class="col-md-6 col-lg-4 mb-2-5 mb-lg-0">
                        <div class="ps-md-1-6 ps-lg-1-9">
                            <h3 class="text-primary h5 mb-2-2">About</h3>
                            <ul class="footer-list">
                                <li><a href="<?php echo base_url('about-us');?>">About Us</a></li>
                                <li><a href="<?php echo base_url('contact');?>">Contact us</a></li>
                                <li><a href="<?php echo base_url('compile-code')?>">Conmpiler</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-2-5 mb-md-0">
                        <div class="ps-lg-1-9 ps-xl-2-5">
                            <h3 class="text-primary h5 mb-2-2">Link</h3>
                            <ul class="footer-list">
                                <li><a href="<?php echo base_url('privacy-policy');?>">Privacy & Policy</a></li>
                                <li><a href="<?php echo base_url('terms-conditions');?>">Terms & conditions</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="col-md-6 col-lg-4">
                        <div class="ps-md-1-9">
                            <h3 class="text-primary h5 mb-2-2">Popular Courses</h3>
                            <div class="media footer-border">
                                <img class="pe-3 border-radius-5" src="assets/img/content/footer-insta-01.jpg" alt="...">
                                <div class="media-body align-self-center">
                                    <h4 class="h6 mb-2"><a href="blog-details.html" class="text-white text-primary-hover">Plan of learning experiences.</a></h4>
                                    <span class="text-white small">Mar. 30, 2023</span>
                                </div>
                            </div>
                            <div class="media">
                                <img class="pe-3 border-radius-5" src="assets/img/content/footer-insta-02.jpg" alt="...">
                                <div class="media-body align-self-center">
                                    <h4 class="h6 mb-2"><a href="blog-details.html" class="text-white text-primary-hover">A supportive learning community</a></h4>
                                    <span class="text-white small">Mar. 28, 2023</span>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- <div class="footer-bar text-center">
                    <p class="mb-0 text-white font-weight-500">&copy; <span class="current-year"></span> BoostingSkills Powered by <a href="#!" class="text-secondary">Boffin Web Technology</a></p>
                </div> -->
            </div>
        </footer>

    </div>

    

    <!-- start scroll to top -->
    <a href="#!" class="scroll-to-top"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
    <!-- end scroll to top -->

    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>

    <!-- popper js -->
    <script src="<?php echo base_url();?>assets/js/popper.min.js"></script>

    <!-- bootstrap -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

    <!-- core.min.js -->
    <script src="<?php echo base_url();?>assets/js/core.min.js"></script>

    <!-- search -->
    <script src="<?php echo base_url();?>assets/js/search.js"></script>

    <!-- custom scripts -->
    <script src="<?php echo base_url();?>assets/js/main.js"></script>

    <!-- form plugins js -->
    <script src="<?php echo base_url();?>assets/js/plugins.js"></script>

    <!-- form scripts js -->
    <script src="<?php echo base_url();?>assets/js/scripts.js"></script>

    <!-- all js include end -->
    
</body>

</html>
<script>
  document.addEventListener('contextmenu', function(e) {
    alert("Right click is disabled on this site.");
    e.preventDefault();
  });
</script>

<!-- Disable Right Click, Copy, Cut, Paste, Text Selection, and Keyboard Shortcuts -->
<style>
  body {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }
</style>

<script>
  // Disable right click
  document.addEventListener('contextmenu', function(e) {
    e.preventDefault();
  });

  // Disable text selection
  document.addEventListener('selectstart', function(e) {
    e.preventDefault();
  });

  // Disable copy, cut, and paste
  document.addEventListener('copy', function(e) {
    e.preventDefault();
  });
  document.addEventListener('cut', function(e) {
    e.preventDefault();
  });
  document.addEventListener('paste', function(e) {
    e.preventDefault();
  });

  // Disable common keyboard shortcuts
  document.onkeydown = function(e) {
    if (e.ctrlKey && ['c', 'u', 's', 'a', 'x', 'p'].includes(e.key.toLowerCase())) {
      e.preventDefault();
      return false;
    }
    if (e.key === 'F12') {
      e.preventDefault();
      return false;
    }
  };
</script>
