  
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
  // document.addEventListener('contextmenu', function(e) {
  //   alert("Right click is disabled on this site.");
  //   e.preventDefault();
  // });
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