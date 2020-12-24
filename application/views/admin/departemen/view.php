
<!-- TAMBAH MODAL ADMIN -->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">TAMBAH DEPARTEMEN</h4>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url()?>index.php/admin/departemen/simpan" method="post">
          </div>
          <!-- /.box-header -->
          <div class="box-body" id="view">
            <div class="form-group">
             <div class="input-group">
              <div class="input-group-addon">
                <b>ID DEPARTEMEN</b>
              </div>
              <input type="text" class="form-control" name="id_departemen" readonly="readonly" value="<?php echo time() ?>" >
            </div>
          </div>


       <div class="form-group has-feedback">
        <input type="text" focus="true" name="Nama_Departemen" class="form-control" required="required" placeholder="Nama Departemen">
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
              <i class="fa fa-plus-circle"></i> Tambah Departemen
              </button>
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">DAFTAR DEPARTEMEN</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                  <th>No</th>
                  <th>Id Departemen</th>
                  <th>Nama Departemen</th>
                  <th>Status Departemen</th>
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
              <td><?php echo $row->id_departemen?></td>
              <td><?php echo $row->Nama_Departemen?></td>
              <td><?php echo $row->status_departemen?></td>
              <td> <center>         
                    <a class="btn btn-danger " id="edit_departemen" data-toggle="modal"
                                        data-target="#departemen"
                                        data-iddep="<?= $row->id_departemen;?>"
                                        data-nmdep="<?= $row->Nama_Departemen;?>"
                                        data-stdep="<?= $row->status_departemen;?>"
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
                  <th>Id Departemen</th>
                  <th>Nama Departemen</th>
                  <th>Status Departemen</th>
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
  <div class="modal fade" id="departemen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Edit Informasi Departemen</h4>
        </div>
        <div class="modal-body" id="modal_edit_departemen">
          <form method="post" action="<?php echo base_url();?>index.php/admin/departemen/edit">
                    <div class="form-group">
             <div class="input-group">
              <div class="input-group-addon">
                <b>ID DEPARTEMEN</b>
              </div>
              <input type="text" readonly="readonly" class="form-control" id="iddep" name="edtid_departemen" >
            </div>
          </div>



      <div class="form-group has-feedback">
                <label>Nama Departemen</label>
              <input type="text" class="form-control" id="nmdep"  name="edtNama_Departemen" >
      </div>

      <div class="form-group has-feedback">
              <label>Status Departemen</label>
              <select class="form-control" id="stdep"  name="edtstatus_departemen" >
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
    $(document).on("click", "#edit_departemen", function(){
        var iddep      = $(this).data('iddep');
        var nmdep    = $(this).data('nmdep');
        var stdep    = $(this).data('stdep');
        
        $(".modal-body#modal_edit_departemen #iddep").val(iddep);             
        $(".modal-body#modal_edit_departemen #nmdep").val(nmdep);
        $(".modal-body#modal_edit_departemen #stdep").val(stdep);
       })
</script>