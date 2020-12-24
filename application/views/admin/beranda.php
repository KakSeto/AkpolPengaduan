<!DOCTYPE html>
<html>
  <?php $this->load->view('admin/head');?>  

<body class="hold-transition skin-red sidebar-mini">
    
  <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"> <?php echo  $label;?>   </ol>
    </section>
<br>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
  <?php $this->load->view($content);?>
  
<!--  -->

        </div>
        <!-- /.col -->
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

      <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
  <?php $this->load->view('admin/script');?>  

</body>
</html>
