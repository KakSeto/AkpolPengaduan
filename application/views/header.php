  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url()?>index.php/home" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">SIAK</span>
      
      <?php
                    $no =  1 ;
                    foreach ($data->result() as $row) { 
                  ?>
           
              
   <span class="logo-lg"><b><?php echo $row->Nama_instansi ?></b></span>
   
                <?php } ?>
      
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="<?php echo base_url()?>index.php/authentication/auth/login">
              <b>LOGIN</b>
            </a>
          </li>
          <li class="dropdown messages-menu">
            <a href="<?php echo base_url()?>index.php/authentication/auth/daftar" >
              <b>DAFTAR</b>
            </a>
          </li>
         
    </ul>    
       
      </div>
    </nav>
  </header>