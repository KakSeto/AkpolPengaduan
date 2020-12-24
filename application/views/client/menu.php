<?php
$lv = $this->session->userdata('level');
if($lv == 'Client'){

 ?>
 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url()?>/dist/img/logoadmin.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">

          <p><?php echo $user = $this->session->userdata('username'); ?></p>

        </div>

        <br>

        <div class="pull-left info">

          <p><?php echo $user = $this->session->userdata('Nama_Departemen'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <br>
      <!-- search form -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

  
        
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="<?php echo base_url()?>index.php/client/home"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
       
        <li>

          <a href="<?php echo base_url()?>index.php/client/pengaduan">
            <i class="fa fa-envelope"></i> <span>Pengaduan Ku</span>
              <small class="label pull-right bg-blue"><?php echo $pesan_masuk ?></small>
              <small class="label pull-right bg-green"><?php echo $pesan_keluar ?></small>
              <small class="label pull-right bg-red"><?php echo $histori ?></small>
             </a>
   
        </li>

       
       
    </section>
    <!-- /.sidebar -->
  </aside>


<?php }else{
 echo "<script> alert('Anda Tidak Punya Akses'); </script>";
    $this->session->sess_destroy ();
    redirect('authentication/auth/login','refresh');

} ?>