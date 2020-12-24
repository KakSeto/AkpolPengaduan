<?php
$lv = $this->session->userdata('level');
if($lv == 'Admin'){

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
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="<?php echo base_url()?>index.php/admin/home"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
       
        <li>
         <a href="<?php echo base_url()?>index.php/admin/client">
            <i class="fa fa-user"></i> <span>Client</span>
            <span class="pull-right-container">
             <small class="label pull-right bg-red"><?php echo $history ?></small>
              <small class="label pull-right bg-blue"><?php echo $client ?></small>
              <small class="label pull-right bg-yellow"><?php echo $admin ?></small>
          </span>
          </a>
        </li>

        <li>
         <a href="<?php echo base_url()?>index.php/admin/laporan">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-blue"><?php echo $pesan_masuk ?></small>
              <small class="label pull-right bg-green"><?php echo $pesan_keluar ?></small>
              <small class="label pull-right bg-red"><?php echo $hapus ?></small>
        
            </span>
          </a>
        </li>

        <!-- SETTING -->
        <li class="header">
            <i class="fa fa-gear"></i> <span> Setting</span>

             <li><a href="<?php echo base_url()?>index.php/admin/teknisi/"><i class="fa fa-circle-o"></i> Teknisi</a></li>

            
            <li><a href="<?php echo base_url()?>index.php/admin/departemen/"><i class="fa fa-circle-o"></i> Departemen </a></li>

            
           <li><a href="<?php echo base_url()?>index.php/admin/gedung/"><i class="fa fa-circle-o"></i> Daftar Gedung</a></li>
           <!---------
           <li><a href="<?php echo base_url()?>index.php/admin/backup/"><i class="fa fa-circle-o"></i> Backup,Restore & Relasi</a></li>

           ------------>
        </li>
      
       
    </section>
    <!-- /.sidebar -->
  </aside>

<?php }else{
 echo "<script> alert('Anda Tidak Punya Akses'); </script>";
    $this->session->sess_destroy ();
    redirect('authentication/auth/login','refresh');

} ?>