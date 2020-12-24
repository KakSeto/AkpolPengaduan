
<!-- TAMBAH MODAL ADMIN -->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">TAMBAH TEKNISI</h4>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url()?>index.php/admin/teknisi/simpan" method="post">
          </div>
          <!-- /.box-header -->
          <div class="box-body" id="view">
            <div class="form-group">
             <div class="input-group">
              <div class="input-group-addon">
                <b>ID TEKNISI</b>
              </div>
              <input type="text" class="form-control" name="id_teknisi" readonly="readonly" value="<?php echo time() ?>" >
            </div>
          </div>
      <div class="form-group has-feedback">
        <input type="text" focus="true" name="NRP" class="form-control" required="required" placeholder="NRP">
      </div>

       <div class="form-group has-feedback">
        <input type="text" focus="true" name="Nama_Teknisi" class="form-control" required="required" placeholder="Nama Teknisi">
      </div>
            </div>
             

          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-close"> Batal</span></button>
            <button type="submit" class="btn btn-primary"><span class="fa fa-save"> Simpan</span></button>
          </div>
          </div>
        </div>
      </div>
    </form>
    <!-- END MODAL TAMBAH ADMIN -->

 
    <section class="content">
      <div class="row">
        <!-- /.col -->
    <div class="col-md-12">
  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default">
              <i class="fa fa-plus-circle"></i> Tambah Teknisi
              </button>
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">DAFTAR TEKNISI</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                  <th>No</th>
                  <th>Id Teknisi</th>
                  <th>NRP</th>
                  <th>Nama</th>
                  <th>Status Teknisi</th>
          
                  <th><center>Aksi</center></th>
                </tr>
              </thead>
                <tbody>
    <?php
                    $no =  1 ;
                    foreach ($data->result() as $row) { 
                  ?>
                <tr>
                <td><?php echo $no++ ?></td>
              <td><?php echo $row->id_teknisi?></td>
              <td><?php echo $row->NRP?></td>
              <td><?php echo $row->Nama_Teknisi?></td>
              <td><?php echo $row->status_teknisi?></td>
              
          <td> <center>
                <a class="btn btn-danger " id="edit_teknisi" data-toggle="modal"
                                        data-target="#teknisi"
                                        data-idtek="<?= $row->id_teknisi;?>"
                                        data-nrptek="<?= $row->NRP;?>"
                                        data-nmtek="<?= $row->Nama_Teknisi;?>"
                                        data-sttek="<?= $row->status_teknisi;?>"
                                     
                                        ><i class="fa fa-edit">Edit</i></a> 
    
                  </center>
          </td>
              
                          
    </tr>
          <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                    <tr>
                  <tr>
                  <th>No</th>
                  <th>Id Teknisi</th>
                  <th>NRP</th>
                  <th>Nama</th>
                  <th>Status Teknisi</th>
                 
                   <th><center>Aksi</center></th>
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
  <div class="modal fade" id="teknisi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Edit Informasi Teknisi</h4>
        </div>
        <div class="modal-body" id="modal_edit_teknisi">
          <form method="post" action="<?php echo base_url();?>index.php/admin/teknisi/edit">
                    <div class="form-group">
             <div class="input-group">
              <div class="input-group-addon">
                <b>ID TEKNISI</b>
              </div>
              <input type="text" class="form-control" id="idtek" name="edtid_teknisi" >
            </div>
          </div>


      <div class="form-group has-feedback">
                <label>NRP</label>
              <input type="text" class="form-control" id="nrptek"  name="edtNRP" >
      </div>

      <div class="form-group has-feedback">
                <label>Nama Teknisi</label>
              <input type="text" class="form-control" id="nmtek"  name="edtNama_Teknisi" >
      </div>

      <div class="form-group has-feedback">
              <label>Status Teknisi</label>
              <select class="form-control" id="sttek"  name="edtstatus_teknisi" >
                <option value="Aktif" >Aktif</option>
                <option value="Tidak Aktif" >Tidak Aktif</option>
              </select>
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
    $(document).on("click", "#edit_teknisi", function(){
        var idtek      = $(this).data('idtek');
        var nrptek    = $(this).data('nrptek');
        var nmtek     = $(this).data('nmtek');
        var sttek     = $(this).data('sttek');
        
        $(".modal-body#modal_edit_teknisi #idtek").val(idtek);             
        $(".modal-body#modal_edit_teknisi #nrptek").val(nrptek);
        $(".modal-body#modal_edit_teknisi #nmtek").val(nmtek);
        $(".modal-body#modal_edit_teknisi #sttek").val(sttek);
       })
</script>