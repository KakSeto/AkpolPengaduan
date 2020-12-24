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
<form method="POST" action="<?php echo base_url()?>index.php/client/home/update">
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
                <label>NRP :</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i>@</i>
                  </div>
                  <input type="text" name="username" readonly="readonly" value="<?php echo $this->session->userdata('username');?>"  class="form-control">
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
                <label>Departemen :</label>

                <div class="input-group">
                  <div class="input-group-addon">
                 <i class="fa fa-envelope"></i>
                  </div>
                  <input type="text" readonly="readonly" name="Email" value="<?php echo $this->session->userdata('Departemen');?>"  class="form-control">
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
   
    <a href="<?php echo base_url()?>index.php/client/home" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">USER</span>
      
      <?php
                    $no =  1 ;
                    foreach ($vale->result() as $row) { 
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
          <form method="POST" action="<?php echo base_url()?>index.php/authentication/auth/logout"> 
          <input type="hidden" value="<?php echo $this->session->userdata('username');?>" name="username">
      
          <li class="dropdown messages-menu">

                 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-profilku">
              <i class="fa fa-user"></i> Profil
              </button>

         <button class="btn btn-danger" type="submit"><i class="fa fa-power-off"></i> Logout</button>
          </li>

         </form>
         
    </ul>    
       
      </div>
    </nav>
  </header>