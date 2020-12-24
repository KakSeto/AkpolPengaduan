
<!-- TAMBAH MODAL ADMIN -->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">TAMBAH INFO GEDUNG</h4>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url()?>index.php/admin/gedung/simpan" method="post">
          </div>
          <!-- /.box-header -->
          <div class="box-body" id="view">
            <div class="form-group">
             <div class="input-group">
              <div class="input-group-addon">
                <b>ID GEDUNG</b>
              </div>
              <input type="text" class="form-control" name="id_gedung" readonly="readonly" value="<?php echo time() ?>" >
            </div>
          </div>


       <div class="form-group has-feedback">
        <input type="text" focus="true" name="nama_gedung" class="form-control" required="required" placeholder="Nama Gedung">
      </div>

      <div class="form-group has-feedback">
        <input type="text" focus="true" name="alamat_gedung" class="form-control" required="required" placeholder="Alamat Gedung">
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
              <i class="fa fa-plus-circle"></i> Tambah Info Gedung
              </button>
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">DAFTAR GEDUNG</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                  <th>No</th>
                  <th>Id Gedung</th>
                  <th>Nama Gedung</th>
                  <th>Alamat Gedung</th>
                  <th>Status Gedung</th>
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
              <td><?php echo $row->id_gedung?></td>
              <td><?php echo $row->nama_gedung?></td>
              <td><?php echo $row->alamat_gedung?></td>
              <td><?php echo $row->status_gedung?></td>
              <td> <center>         
                    <a class="btn btn-danger " id="edit_gedung" data-toggle="modal"
                                        data-target="#gedung"
                                        data-idgedung="<?= $row->id_gedung;?>"
                                        data-nmgedung="<?= $row->nama_gedung;?>"
                                        data-algedung="<?= $row->alamat_gedung;?>"
                                        data-stgedung="<?= $row->status_gedung;?>"
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
                  <th>Id Gedung</th>
                  <th>Nama Gedung</th>
                  <th>Alamat Gedung</th>
                  <th>Status Gedung</th>
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
  <div class="modal fade" id="gedung" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Edit Informasi Gedung</h4>
        </div>
        <div class="modal-body" id="modal_edit_gedung">

          <form method="post" action="<?php echo base_url();?>index.php/admin/gedung/edit">
                    <div class="form-group">
             <div class="input-group">
              <div class="input-group-addon">
                <b>ID Gedung</b>
              </div>
              <input type="text" readonly="readonly" class="form-control" id="idgedung" name="edtid_gedung" >
            </div>
          </div>



      <div class="form-group has-feedback">
                <label>Nama Gedung</label>
              <input type="text" class="form-control" id="nmgedung"  name="edtnama_gedung" >
      </div>

      <div class="form-group has-feedback">
                <label>Alamat Gedung</label>
              <input type="text" class="form-control" id="algedung"  name="edtalamat_gedung" >
      </div>

      <div class="form-group has-feedback">
              <label>Status Gedung</label>
              <select class="form-control" id="stgedung"  name="edtstatus_gedung" >
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
    $(document).on("click", "#edit_gedung", function(){
        var idgedung      = $(this).data('idgedung');
        var nmgedung    = $(this).data('nmgedung');
        var algedung    = $(this).data('algedung');
        var stgedung    = $(this).data('stgedung');
        
        $(".modal-body#modal_edit_gedung #idgedung").val(idgedung);             
        $(".modal-body#modal_edit_gedung #nmgedung").val(nmgedung);
        $(".modal-body#modal_edit_gedung #algedung").val(algedung);
        $(".modal-body#modal_edit_gedung #stgedung").val(stgedung);
       })
</script>