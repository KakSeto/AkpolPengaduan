<!-- TAMBAH MODAL CLIENT -->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">TAMBAH CLIENT</h4>
        </div>
        <div class="modal-body">
          <form method="POST" action="client/simpan" >
          </div>
          <!-- /.box-header -->
          <div class="box-body" id="view">
            <div class="form-group">
             <div class="input-group">
              <div class="input-group-addon">
                <b>ID CLIENT</b>
              </div>
              <input type="text" class="form-control" name="id_laporan" readonly="readonly" value="<?php echo time() ?><?php echo date('Y') ?>" >
            </div>
          </div>
          <form action="<?php echo base_url()?>index.php/authentication/auth/simpan" method="post">
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
      <select name="Departemen" class="form-control">
                              <?php
                    
                              foreach ($namadepartemen as $row) { 
                

                                echo "<option value='".$row->id_departemen."'>".$row->Nama_Departemen."</option>";
                              }
                              echo"

                              </select>"
                              ?>

        </div>
      
      <div class="form-group has-feedback">
    <textarea class="form-control" style="height: 120px" name="Alamat" placeholder="Alamat" ></textarea>
      </div>
    
     <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="NRP">
      </div>
       <div class="form-group has-feedback">
        <input type="Password" name="password" class="form-control" placeholder="Password">
      </div>
      


            </div>
            <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-close"> Batal</span></button>
            <button type="submit" name="register" class="btn btn-primary"><span class="fa fa-save"> Simpan</span></button>    </div>

          </div>
        </div>
      </div>
    </form>
    <!-- END MODAL TAMBAH CLIENT -->

 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
              
   <button type="button" class="btn btn-danger btn-block margin-bottom" data-toggle="modal" data-target="#modal-default">
              <i class="fa fa-plus-circle"></i> Tambah Client
              </button>
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
                 <li ><a href="<?php echo base_url()?>index.php/admin/data_admin"><i class="fa fa-users"></i> ADMIN  <span class="label label-warning pull-right"><?php echo $admin ?></span></a></li>
                </li>
                 <li  class="active"><a href="#"><i class="fa fa-user-o"></i> CLIENT  <span class="label label-primary pull-right"><?php echo $client ?></span></a></li>
                </li>
                <li><a href="<?php echo base_url()?>index.php/admin/client/history"><i class="fa fa-trash-o"></i> History  <span class="label label-danger pull-right"><?php echo $history ?></span></a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
         </div>
          
        <!-- /.col -->
    <div class="col-md-9">

<div class="box">
            <div class="box-header">
              <h3 class="box-title">CLIENT</h3>
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
         <td><span style="width: 100px" class="btn btn-danger"><?php echo $row->username ?></span></td>
              <td><?php echo $row->Nama ?></td>
              <td><?php echo $row->Email ?></td>
         <td><?php echo $row->Nama_Departemen ?></td>
         <td><a style="width: 80px" class="btn btn-danger" onclick="return confirm('Apa Anda Yakin Hapus Data?')" href="<?php echo base_url()?>index.php/admin/client/hapus/<?php echo $row->id?>"><i class="fa fa-trash-o"> Hapus</i></a>
          <a style="width: 80px" class="btn btn-success" onclick="return"
                   id="edit_user"
                   data-toggle="modal" 
                   data-target="#edit"
                   data-id="<?= $row->id;?>"
                   data-usr="<?= $row->username;?>"
                   data-pass="<?= $row->sandi;?>"
                   data-nm="<?= $row->Nama;?>"
                   data-dep="<?= $row->Departemen;?>"
                   data-nohp="<?= $row->Nohp;?>"
                   data-almt="<?= $row->Alamat;?>"
                   data-email="<?= $row->Email;?>"                

                   <?php echo $row->id?>">  <i class="fa fa-edit"> Edit</i></a>
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


      <!------- MODAL EDIT USER --------------->

      <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Edit User</h4>
        </div>
        <div class="modal-body" id="modal_edit_user">

          <form method="post" action="<?php echo base_url() ?>index.php/admin/client/edit">
                    <div class="form-group">
             <div class="input-group">
              <div class="input-group-addon">
                <b>ID USER</b>
              </div>
              <input type="text" readonly="readonly" class="form-control" id="kode" name="kode" >
            </div>
          </div>
      <div class="form-group has-feedback">
 <label>NRP</label>
              <input type="text" class="form-control" id="username"  name="username"> 
      </div>
       <div class="form-group has-feedback">
 <label>Password</label>
              <input type="text" id="password" name="password" class="form-control">
      </div>

       <div class="form-group has-feedback">
 <label>Nama</label>
              <input type="text" id="nama" name="nama" class="form-control">
      </div>


       <div class="form-group has-feedback">
 <label>Alamat</label>
              <input type="text" id="alamat" name="alamat" class="form-control">
      </div>

       <div class="form-group has-feedback">
 <label>Email</label>
              <input type="text" id="email" name="email" class="form-control">
      </div>

       <div class="form-group has-feedback">
         <label>Departemen</label>
           <select required="required" id="departemen" name="departemen" class="form-control" >
                              <?php
                    
                              foreach ($namadepartemen as $row) { 
                

                                echo "<option value='".$row->id_departemen."'>".$row->Nama_Departemen."</option>";
                              }
                              echo"

                              </select>"
                              ?>

      </div>

       <div class="form-group has-feedback">
 <label>No HP</label>
              <input type="text" id="nohp" name="nohp" class="form-control">
      </div>

      
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-close"> Batal</span></button>
            <button type="submit" class="btn btn-primary"><span class="fa fa-save"> Simpan</span></button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- END EDIT -->
  <script src="<?php echo base_url()?>dist/bower_components/jquery/dist/jquery-1.10.2.js"></script>
<script type="text/javascript">
    $(document).on("click", "#edit_user", function(){
        var id      = $(this).data('id');
        var usr   = $(this).data('usr');
        var pass = $(this).data('pass');
        var email  = $(this).data('email');
        var nohp  = $(this).data('nohp');
        var dep  = $(this).data('dep');
        var almt = $(this).data('almt');
        var nm  = $(this).data('nm');

        
        $(".modal-body#modal_edit_user #kode").val(id);             
        $(".modal-body#modal_edit_user #username").val(usr);
        $(".modal-body#modal_edit_user #password").val(pass);
        $(".modal-body#modal_edit_user #email").val(email);             
        $(".modal-body#modal_edit_user #nohp").val(nohp);
        $(".modal-body#modal_edit_user #departemen").val(dep);
        $(".modal-body#modal_edit_user #alamat").val(almt);             
        $(".modal-body#modal_edit_user #nama").val(nm);
      
       })
</script>
