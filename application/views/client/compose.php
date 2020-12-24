<?php
$info = $this->session->flashdata('info');
if(!empty($info)){
  echo $info;
}
?>

     
    <section class="content">
      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">

     <form method="POST" action="" enctype="multipart/form-data" >
     
              <h3 class="box-title">BUAT LAPORAN BARU</h3>
            </div>
            

           <!-- /.box-header -->
            <div class="box-body">

             <?php
                    $no =  1 ;
                    foreach ($data->result() as $row) { 
                  ?>
<div class="form-group">
               <div class="input-group">
                  <div class="input-group-addon">
                    <b>NOMOR LAPORAN</b>
                  </div>
                  <input type="text" class="form-control" name="id_laporan" readonly="readonly" value="<?php echo time() ?><?php echo date('Y') ?>" >
                </div>
   

</div>
                     

                <?php } ?>
              <!--lallala  -->
                  <?php
                    $no =  1 ;
                    foreach ($data->result() as $row) { 
                  ?>
      <input type="hidden" class="form-control" name="id_client" readonly="readonly" value="<?php echo $row->id_cliet ?> " >
                     

                <?php } ?>

              <div class="form-group">
                <input class="form-control" name="Subjek" placeholder="Subject:">
              </div>

             


              <div class="form-group">
                    <textarea id="compose-textarea" name="Laporan" class="form-control" style="height: 300px">
                    </textarea>
              </div>
              <div class="form-group">
      <b>Jenis Laporan</b>
            <select name="Jenis" class="form-control">
          <?php
                    $no =  1 ;
                    foreach ($jenis->result() as $row) { 
                  ?>
           
           <option value="<?php echo $row->id_jenis?>"><?php echo $row->Jenis ?></option>
              

                <?php } ?>
       
            </select>
              </div>
             <div class="form-group">
                  <label for="exampleInputEmail1">Bukti</label>
     <input  type="file" name="userfile">
             </div>
               
            <div class="box-footer">
              <div class="pull-right">
            <button type="submit" name="register" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
    </section>
  </form>