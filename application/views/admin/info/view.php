<!-- Model Edit Cover -->
        <div class="modal fade" id="modal-cover">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">EDIT COVER</h4>
              </div>
              <div class="modal-body">
             <?php
              $no =  1 ;
              foreach ($cover->result() as $row) { 
                ?>

<form method="POST" action="<?php echo base_url()?>index.php/admin/cover/simpan/<?php echo $row->id_cover ?>" enctype="multipart/form-data">

   <div class="form-group">
               <div class="input-group">
                  <div class="input-group-addon">
                    <b>ID</b>
                  </div>
                  <input type="text" class="form-control" name="id_cover"  value="<?php echo $row->id_cover ?>" >
    </div>
    </div>
   <div class="form-group">
               <div class="input-group">
                  <div class="input-group-addon">
                    <b>TITTLE</b>
                   </div>
              <input type="text" class="form-control" name="tittle"  value="<?php echo $row->tittle ?>" >

      </div>
        </div>

  <div class="form-group">
                <input  type="file" name="userfile">
              </div>
          
                <?php } ?>
   
              </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-close"> Batal</span></button>
            <button type="submit" name="simpan" class="btn btn-primary"><span class="fa fa-save"> Simpan</span></button>
          </div>
            </div>
         </div>
        </div>
      </form>
<!-- End Model -->

<!-- Model Profil -->
        <div class="modal fade" id="modal-profil">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> PROFIL DESA</h4>
              </div>
              <div class="modal-body">
   <form method="POST" action="<?php echo base_url()?>index.php/admin/profil_akpol/simpan?username=<?php echo $user=$this->session->userdata('username'); ?>">

                             <?php
  if($hitung == 0){
              ?>
              <div class="form-group">
                 <label>Nama Desa :</label>
                <input class="form-control" name="Nama_instansi" value="" placeholder="Nama Desa">
              </div>
               <div class="form-group">
                <label>Nomor Handphone :</label>
                <input class="form-control" name="No_hp" value="" placeholder="Nomor Handphone">
              </div>
              <div class="form-group">
                 <label>Website :</label>
                <input class="form-control" value="" name="website" placeholder="Website">
              </div>
              <div class="form-group">
                    <textarea id="compose-textarea" name="Visi_misi" class="form-control" style="height: 300px">
                      
                    </textarea>
              </div>
           <?php } ?>
                             <?php
             
              foreach ($profil->result() as $row) { 
         
              ?>
 

              <div class="form-group">
                 <label>Nama Desa :</label>
                <input class="form-control" name="Nama_instansi" value="<?php echo $row->Nama_instansi ?>" placeholder="Nama Desa">
              </div>
               <div class="form-group">
                <label>Nomor Handphone :</label>
                <input class="form-control" name="No_hp" value="<?php echo $row->No_hp ?>" placeholder="Nomor Handphone">
              </div>
               <div class="form-group">
                 <label>Website :</label>
                <input class="form-control" value="<?php echo $row->website ?>" name="website" placeholder="Website">
              </div>
            
              <div class="form-group">
                    <textarea id="compose-textarea" name="Visi_misi" class="form-control" style="height: 300px">
                      <?php echo $row->Visi_misi ?>
                    </textarea>
              </div>
                     <?php } ?>
              </div>             
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-close"> Batal</span></button>
            <button type="submit" name="register" class="btn btn-primary"><span class="fa fa-save"> Simpan</span></button>
          </div>
            </div>
         </div>
        </div>
      </form>

<!-- End Model -->

<!-- Tambah Info Desa -->
<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">TAMBAH INFO DESA</h4>
              </div>
              <div class="modal-body">
    <form method="POST" action="<?php echo base_url()?>index.php/admin/info/tambah" enctype="multipart/form-data" >
     
            </div>
            <div class="box-body">
            <div class="form-group">
              <input class="form-control" name="tema" placeholder="Tema:">
              </div>
              <div class="form-group">
              <input class="form-control" name="link" placeholder="Link Visit:">
              </div>
              <div class="form-group">
              <textarea id="compose-textarea" name="info" class="form-control" style="height: 200px">
                    </textarea>
              </div>
             <div class="form-group">
                  <label for="exampleInputEmail1">Foto</label>
     <input  type="file" required="true" name="userfile">
             </div>
    
              </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-close"> Batal</span></button>
            <button type="submit" name="register" class="btn btn-primary"><span class="fa fa-save"> Simpan</span></button>
          </div>
            </div>
          </div>
        </div>
      </form>
<!-- End Modal -->

 <!-- Main content -->
 <section class="content">
  <div class="row">

    <div class="col-md-12">
         <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
              <i class="fa fa-plus"></i> Tambah Data
              </button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-cover">
              <i class="fa fa-edit"></i> Edit Cover
              </button>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-profil">
              <i class="fa fa-edit"></i> Edit Profil Desa
              </button>
             

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">DATA INFO DESA</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>ID INFO</th>
                <th>TEMA</th>
                <th>Tanggal Lapor</th>
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
                  <td><?php echo $row->id ?></td>
                  <td><?php echo $row->tema ?></td>
                  <td><?php echo $row->tanggal_info ?></td>
                  <td>
  <a  onclick="return confirm('Apa Anda Yakin Hapus Data?')" class='btn btn-danger' href='<?php echo base_url()?>index.php/admin/info/hapus/<?php echo $row->id ?>' ><i class='fa fa-trash-o' ></i> Hapus </a>
  <a class="btn btn-primary " id="edit_info" data-toggle="modal"
                                        data-target="#edit"
                                        data-id="<?= $row->id;?>"
                                        data-tma="<?= $row->tema;?>"
                                       data-ifo="<?= $row->info;?>"
                                     
                                        ><i class="fa fa-edit">Edit</i></a> 

                  </td>

                </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                <th>No</th>
                <th>ID INFO</th>
                <th>TEMA</th>
                <th>Tanggal Lapor</th>
                <th>Aksi</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
            
        
      </div>
    </section>

      <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Edit Info</h4>
        </div>
        <div class="modal-body" id="modal_edit_info">

          <form method="post" action="<?php echo base_url() ?>index.php/admin/info/simpan">
                    <div class="form-group">
             <div class="input-group">
              <div class="input-group-addon">
                <b>ID INFO</b>
              </div>
              <input type="text" readonly="readonly" class="form-control" id="kode" name="kode" >
            </div>
          </div>
      <div class="form-group has-feedback">
 <label>TEMA</label>
              <input type="text" class="form-control" id="jenis"  name="tema"> 
      </div>
       <div class="form-group has-feedback">
 <label>INFO</label>
              <textarea id="info" name="info" style="height: 300px;" class="form-control"></textarea>
      </div>
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
    $(document).on("click", "#edit_info", function(){
        var idd      = $(this).data('id');
        var tm    = $(this).data('tma');
        var inf    = $(this).data('ifo');
        
        $(".modal-body#modal_edit_info #kode").val(idd);             
        $(".modal-body#modal_edit_info #jenis").val(tm);
        $(".modal-body#modal_edit_info #info").val(inf);
      
       })
</script>