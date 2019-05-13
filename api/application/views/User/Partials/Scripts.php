<div class="az-footer">
      <div class="container">
        <span>&copy; 2019 90minbet</span>
        <!-- <span>Designed by: ThemePixels</span> -->
      </div><!-- container -->
    </div><!-- az-footer -->

    
    <script src="<?php echo asset_url('lib/ionicons/ionicons.js') ?>"></script>
    <script src="<?php echo asset_url('lib/select2/js/select2.min.js') ?>"></script>
    <script src="<?php echo asset_url('lib/js/Loading.js') ?>"></script>
    <script src="<?php echo asset_url('lib/js/azia.js') ?>"></script>
    <script src="<?php echo asset_url('lib/js/custom.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script>
     

     $(document).ajaxStart(function () {
      $('body').loading('start');
      });
      $(document).ajaxStop(function () {
        $('body').loading('stop');
        });
    </script>

    

  </body>
</html>
