
<!-- TAMBAH MODAL ADMIN -->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">TAMBAH JENIS LAPORAN</h4>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url()?>index.php/admin2/jenis/simpan" method="post">
          </div>
          <!-- /.box-header -->
          <div class="box-body" id="view">
            <div class="form-group">
             <div class="input-group">
              <div class="input-group-addon">
                <b>ID JENIS</b>
              </div>
              <input type="text" class="form-control" name="id_jenis" readonly="readonly" value="<?php echo time() ?>" >
            </div>
          </div>
      <div class="form-group has-feedback">
        <input type="text" focus="true" name="jenis" class="form-control" required="required" placeholder="Jenis Laporan">
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
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
              <i class="fa fa-plus-circle"></i> Tambah Jenis Laporan
              </button>
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">JENIS LAPORAN</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                  <th>No</th>
                  <th>Id Jenis</th>
                  <th>Jenis Laporan</th>
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
              <td><?php echo $row->id_jenis?></td>
              <td><?php echo $row->Jenis?></td>
          <td> <center>
         <a  onclick="return confirm('Apa Anda Yakin Hapus Data?')" href="<?php echo base_url()?>index.php/admin2/jenis/hapus/<?php echo $row->id_jenis?>">  <i class="fa fa-trash-o btn btn-danger"> Hapus</i></a>
<a class="btn btn-primary " id="edit_jenis" data-toggle="modal"
                                        data-target="#jenis"
                                        data-idjns="<?= $row->id_jenis;?>"
                                        data-jns="<?= $row->Jenis;?>"
                                     
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
                  <th>Id Jenis</th>
                  <th>Jenis Laporan</th>
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
  <div class="modal fade" id="jenis" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Edit Jenis Laporan</h4>
        </div>
        <div class="modal-body" id="modal_edit_jenis">
          <form method="post" action="<?php echo base_url();?>index.php/admin2/jenis/simpan">
                    <div class="form-group">
             <div class="input-group">
              <div class="input-group-addon">
                <b>ID JENIS</b>
              </div>
              <input type="text" class="form-control" id="kode" name="id_jenis" >
            </div>
          </div>
      <div class="form-group has-feedback">
 <label>Jenis Laporan</label>
              <input type="text" class="form-control" id="jenis"  name="jenis" 
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
    $(document).on("click", "#edit_jenis", function(){
        var idjnis      = $(this).data('idjns');
        var jnis    = $(this).data('jns');
        
        $(".modal-body#modal_edit_jenis #kode").val(idjnis);             
        $(".modal-body#modal_edit_jenis #jenis").val(jnis);
       })
</script>