<!DOCTYPE html>
<html>
<?php $this->load->view('client/head');?>
<body class="hold-transition skin-red sidebar-mini fixed">
  <div class="wrapper">
    <?php $this->load->view('client/header');?>

    <?php $this->load->view('client/menu');?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <br>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url()?>index.php/client/home"><i class="fa fa-dashboard"></i> Home</a></li>
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
    <?php $this->load->view('client/script');?>  

  </body>
  </html>