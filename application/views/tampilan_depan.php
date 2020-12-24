<!DOCTYPE html>
<html>
<?php $this->load->view('head');?>
<body class="hold-transition skin-green sidebar-mini fixed">
  <div class="wrapper">
    <?php $this->load->view('header');?>

    <?php $this->load->view('menu');?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <br>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url()?>index.php/home"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Small boxes (Stat box) -->
     
    <?php $this->load->view($content);?>

      </div>

      <div class="control-sidebar-bg"></div>
    </div>
    <?php $this->load->view('script');?>  

  </body>
  </html>