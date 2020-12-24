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

          
     <form method="POST" action="<?php echo base_url() ?>index.php/admin2/info/simpan/<?php echo $id ?>" enctype="multipart/form-data" >

              <h3 class="box-title">NO : <?php echo $id ?></b></h3><br>
            </div>
            <div class="form-group">
               <div class="input-group">
                  <div class="input-group-addon">
                    <b>TEMA</b>
                  </div>
                  <input type="text" class="form-control" name="tema"  value="<?php echo $tema ?>" >
                </div>
   

</div>

           <div class="form-group">
                    <textarea  name="info" id="compose-textarea"  class="compose-textarea form-control" style="height: 200px"><?php echo $ino ?>
                    </textarea>
              </div>
              <hr> 
               
            <div class="box-footer">
              <div class="pull-right">
       <a href="javascript:history.back()"  class="btn btn-danger"><li class="fa fa-home" >  Kembali</li></a>     <button class="btn btn-primary" ><i class="fa fa-edit"> Ubah </i> </button>
                </div>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
    </section>
  </form>