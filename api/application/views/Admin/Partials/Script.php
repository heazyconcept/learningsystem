<div class="az-footer">
        <div class="container-fluid">
            <span>&copy; 2019 90minbet</span>
            <!-- <span>Designed by: ThemePixels</span> -->
        </div><!-- container -->
    </div><!-- az-footer -->
</div><!-- az-content -->
<script src="<?php echo asset_url('lib/ionicons/ionicons.js') ?>"></script>
    <script src="<?php echo asset_url('lib/select2/js/select2.min.js') ?>"></script>
    <script src="<?php echo asset_url('lib/js/Loading.js') ?>"></script>
    <script src="<?php echo asset_url('lib/js/azia.js') ?>"></script>
    <script src="<?php echo asset_url('lib/jquery-ui/ui/widgets/datepicker.js') ?>"></script>
    <script src="<?php echo asset_url('lib/js/custom.js') ?>"></script>
    <script src="<?php echo asset_url('lib/chart.js/Chart.bundle.min.js') ?>"></script>
    <script src="<?php echo asset_url('lib/js/bootstrap-datetimepicker.js') ?>"></script>
    <script src="<?php echo asset_url('lib/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?php echo asset_url('lib/datatables.net-dt/js/dataTables.dataTables.min.js') ?>"></script>
    <script src="<?php echo asset_url('lib/datatables.net-responsive/js/dataTables.responsive.min.js') ?>"></script>
    <script src="<?php echo asset_url('lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js') ?>"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script>
     

     $(document).ajaxStart(function () {
      $('body').loading('start');
      });
      $(document).ajaxStop(function () {
        $('body').loading('stop');
        });
    </script>
    
    <script>
      $(function(){
        'use strict'

        $('.az-sidebar .with-sub').on('click', function(e){
          e.preventDefault();
          $(this).parent().toggleClass('show');
          $(this).parent().siblings().removeClass('show');
        })

        $(document).on('click touchstart', function(e){
          e.stopPropagation();

          // closing of sidebar menu when clicking outside of it
          if(!$(e.target).closest('.az-header-menu-icon').length) {
            var sidebarTarg = $(e.target).closest('.az-sidebar').length;
            if(!sidebarTarg) {
              $('body').removeClass('az-sidebar-show');
            }
          }
        });


        $('#azSidebarToggle').on('click', function(e){
          e.preventDefault();

          if(window.matchMedia('(min-width: 992px)').matches) {
            $('body').toggleClass('az-sidebar-hide');
          } else {
            $('body').toggleClass('az-sidebar-show');
          }
        });

        new PerfectScrollbar('.az-sidebar-body', {
          suppressScrollX: true
        });

      });
    </script>
  </body>
</html>