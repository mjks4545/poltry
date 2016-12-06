 
          			
        <footer>
          <div class="pull-right">
            SS Technologies <a href="#"> link to website</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url();?>theme/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url()?>theme/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url()?>theme/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url();?>theme/vendors/nprogress/nprogress.js"></script>
    <!-- jQuery custom content scroller -->
    <script src="<?php echo base_url();?>theme/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url();?>theme/build/js/custom.min.js"></script>
    <!-- angular js custom files -->
    <script src="<?php echo base_url() ?>js/angular/lib/angular.js"></script>
   <script src="<?php echo base_url('js/angular/controllers/visit/visitCtrl.js');?>"></script>
  <script src="<?php echo base_url('js/angular/controllers/visit/reportCtrl.js');?>"></script>
  <script src="<?php echo base_url('js/angular/controllers/visit/advanceCtrl.js');?>"></script>
  <script src="<?php echo base_url('js/angular/controllers/visit/unpaidCtrl.js');?>"></script>
      <script>
        $(document).ready(function(){
        $("#testing").keyup(function(event){
    if(event.keyCode == 13){
        $("#test").click();
    }
          });
      });
      </script>

  </body>
</html>