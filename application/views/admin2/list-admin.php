<!-- TAMBAH MODAL ADMIN -->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">TAMBAH ADMIN</h4>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url()?>index.php/admin2/data_admin/simpan" method="post">
          </div>
          <!-- /.box-header -->
          <div class="box-body" id="view">
            <div class="form-group">
             <div class="input-group">
              <div class="input-group-addon">
                <b>ID ADMIN</b>
              </div>
              <input type="text" class="form-control" name="id_laporan" readonly="readonly" value="<?php echo time() ?><?php echo date('Y') ?>" >
            </div>
          </div>
      <div class="form-group has-feedback">
        <input type="text" focus="true" name="nama" class="form-control" required="required" placeholder="Nama Lengkap">
      </div>
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" required="required" placeholder="Email">
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="Nohp" required="required" placeholder="No Handphone" data-inputmask='"mask": "(999) 999-9999"' data-mask>
      </div>
            
      <div class="form-group has-feedback">
    <select required="required" name="Departemen" class="form-control" >
       <option>Departemen</option>
       <option value="SIAK" >SIAK</option>
       <option value="BINDIK" >BINDIK</option>
       <option value="BIDKUM" >BIDKUM</option>
    </select>
      </div>
      <div class="form-group has-feedback">
    <textarea class="form-control" style="height: 120px" name="Alamat" placeholder="Alamat" ></textarea>
      </div>
    
     <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username">
      </div>
       <div class="form-group has-feedback">
        <input type="Password" name="password" class="form-control" placeholder="Password">
      </div>
      


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <button type="submit" name="register" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- END MODAL TAMBAH ADMIN -->

 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">

          <!--- ADMIN
              
   <button type="button" class="btn btn-success btn-block margin-bottom" data-toggle="modal" data-target="#modal-default">
              <i class="fa fa-plus-circle"></i> Tambah Admin
              </button>
              ----------------->
              
      <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Folders</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                 <li  class="active" ><a href="#"><i class="fa fa-users"></i> ADMIN  <span class="label label-warning pull-right"><?php echo $admin ?></span></a></li>
                </li>
                 <li><a href="<?php echo base_url()?>index.php/admin2/client/client"><i class="fa fa-user-o"></i> CLIENT  <span class="label label-primary pull-right"><?php echo $client ?></span></a></li>
                </li>
                <li><a href="<?php echo base_url()?>index.php/admin2/client/history"><i class="fa fa-trash-o"></i> History  <span class="label label-danger pull-right"><?php echo $history ?></span></a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
         </div>
          
        <!-- /.col -->
    <div class="col-md-9">

<div class="box">
            <div class="box-header">
              <h3 class="box-title">ADMIN</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                  <th>No</th>
                  <th>Id Username</th>
                  <th>NRP</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Departemen</th>
                  <th>Aksi</th>
                </tr>
              </thead>
                <tbody>
    <?php
                    $no =  1 ;
                    foreach ($data->result() as $row) { 
                  ?>
           
                <tr>
                <td><?php echo $no++ ?></td>
              <td><?php echo $row->id?></td>
         <td><span style="width: 80px" class="btn btn-danger"><?php echo $row->username ?></span></td>
              <td><?php echo $row->Nama ?></td>
              <td><?php echo $row->Email ?></td>
         <td><?php echo $row->Nama_Departemen ?></td>
         <td>
<?php
$kode = $this->session->userdata('kode');

  //JIKA MENAMPILKAN DIRINYA SENDIRI
 if(($row->id == $kode)){

        echo "<button class='btn btn-danger'>SAYA</button>";
  ?>
                  
<?php
                }else {
                  echo "<button class='btn btn-warning'>Tidak Punya Akses</button>";
                }

                 ?>
          

        </td>
              
                          
    </tr>
          <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                    <tr>
                  <tr>
                  <th>No</th>
                  <th>Id Username</th>
                  <th>NRP</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Departemen</th>
                  
                  <th>Aksi</th>
                </tr>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </section>
