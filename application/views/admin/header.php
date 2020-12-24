<!-- MODAL PROFIL -->
<div class="modal fade" id="modal-profilku">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><i class="fa fa-user"></i> PROFIL</h4>
        </div>
        <div class="modal-body">
        

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
<form method="POST" action="<?php echo base_url()?>index.php/admin/home/update">
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>ID :</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa  fa-credit-card"></i>
                  </div>
                  <input type="text" readonly="readonly" value="<?php echo $this->session->userdata('kode');?>"  class="form-control">
                </div>
              
               </div>
              <!-- /.form-group -->
                <div class="form-group">
                <label>Username :</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i>@</i>
                  </div>
                  <input type="text" name="username"  value="<?php echo $this->session->userdata('username');?>"  class="form-control">
                </div>
              </div>
                <div class="form-group">
                <label>Password : <b class="bg bg-red"><?php echo $this->session->userdata('sandi');?></b></label>

                <div class="input-group">
                  <div class="input-group-addon">
                 <i class="fa  fa-circle"></i>
                  </div>
                  <input type="Password" name="password" value="<?php echo $this->session->userdata('sandi');?>"  class="form-control">
                </div>
              </div>
              <!-- /.form-group -->
               </div>
            <div class="col-md-6">
                <div class="form-group">
                <label>Nama Lengkap :</label>

                <div class="input-group">
                  <div class="input-group-addon">
                 <i class="fa fa-user"></i>
                  </div>
                  <input type="text" name="Nama"  value="<?php echo $this->session->userdata('Nama');?>"  class="form-control">
                </div>
              </div>
              <!-- /.form-group -->
             <div class="form-group">
                <label>E-mail :</label>

                <div class="input-group">
                  <div class="input-group-addon">
                 <i class="fa fa-envelope"></i>
                  </div>
                  <input type="text" name="Email" value="<?php echo $this->session->userdata('Email');?>"  class="form-control">
                </div>
              </div>
              <!-- /.form-group -->
            <div class="form-group">
                <label>Telp :</label>

                <div class="input-group">
                  <div class="input-group-addon">
                 <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" name="Nohp" value="<?php echo $this->session->userdata('Nohp');?>"  class="form-control">
                </div>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          (*)Harap Rahasiakan Data Anda Dari Orang Lain.<br>
          (*)Setelah Anda Update , Anda akan Kami Bawa Ke Halaman Masuk.<br>


        </div>
      </div>
      <!-- /.box -->

            </div>
            <div class="modal-footer">
              <button type="submit" name="register" class="btn btn-primary"><span class="fa fa-save"> Simpan</span></button>
         <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-close"> Batal</span></button>
                </div>

          </div>
        </div>
      </div>
    </form>
    <!-- END MODAL -->

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">SPR</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SUPER</b> ADMIN</span>
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
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-danger"><?php echo $pesan_masuk ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <?php echo $pesan_masuk ?> messages</li>
              <li>
               
                <ul class="menu">
               
     <?php
                    $no =  1 ;
                    foreach ($result->result() as $row) { 
                  ?>
     
                 <li>
                    <a href="<?php echo base_url()?>index.php/admin/laporan/view/<?php echo $row->id_laporan ?>">
                      <div class="pull-left">
                        <img src="<?php echo base_url()?>/dist/img/logoadmin.jpg" class="img-circle" alt="User Image">
                      </div>
            <h4><?php echo $row->Nama ?></h4>
            <p><?php echo $row->Subjek ?></p>
                    </a>
                  </li>
                <?php } ?>
                </ul>
              </li>
              
            </ul>

     
          </li>
                <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url()?>/dist/img/logoadmin.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $user = $this->session->userdata('username'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url()?>/dist/img/logoadmin.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo $user = $this->session->userdata('username'); ?> - <?php echo $this->session->userdata('level');?>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-footer">
                <div class="pull-left">

                 <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-profilku">
              <i class="fa fa-user"></i> Profil
              </button>

                </div>
                <div class="pull-right">
            <form method="POST" action="<?php echo base_url()?>index.php/authentication/auth/logout"> 
          <input type="hidden" value="<?php echo $this->session->userdata('username');?>" name="username">
      
         <button class="btn btn-default" type="submit"><i class="fa fa-power-off"></i> Logout</button>
         </form>
              </div>
              </li>
            </ul>
          </li>
       
       
      </div>
    </nav>
  </header>