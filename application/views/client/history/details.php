<?php
$info = $this->session->flashdata('info');
if(!empty($info)){
  echo $info;
}
?>

    <section class="content">
      <div class="row">
        <div class="col-md-3">


          <!----- CETAK
      <a target="_BLANK" class="btn btn-primary btn-block margin-bottom" href="<?php echo base_url()?>index.php/client/pengaduan/struck/<?php echo $id_laporan ?>"><i class="fa fa-print"></i> Cetak  </a>
      ------------------>
      
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
                <li><a href="<?php echo base_url()?>index.php/client/pesan_masuk"><i class="fa fa-envelope"></i> PESAN MASUK
                  <span class="label label-success pull-right"><?php echo $pesan_masuk?></span></a></li>
                 <li  class="active"><a href="<?php echo base_url()?>index.php/client/Pengaduan"><i class="fa fa-inbox"></i> PENGADUAN KU
                  <span class="label label-primary pull-right"><?php echo $pesan_keluar?></span></a></li>
<li><a href="<?php echo base_url()?>index.php/client/history"><i class="fa fa-history"></i> HISTORY PESAN
                  <span class="label label-danger pull-right"><?php echo $histori?></span></a></li>          
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /. box -->
         </div>
                  <!-- /. box -->
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">

          
     <form method="POST" action="" enctype="multipart/form-data" >
     
              <h3 class="box-title">NO : <?php echo $id_laporan ?>| <b><?php echo $Status ?></b>| Tanggal Laporan : <?php echo $tanggal_lapor ?></h3><br>
            </div>
            <div class="box-body">
              <div class="form-group">
             
<h4>Subject : <?php echo $Subjek ?> </h4>              
              </div>
           <div class="form-group">
                    <textarea  name="Laporan" id="compose-textarea" disabled class="compose-textarea form-control" style="height: 300px"><?php echo $Laporan ?>
                    </textarea>
              </div>
              <div class="form-group">
                <label>Jawaban :</label>
                    <textarea  name="Laporan" id="compose-textarea" disabled class="compose-textarea form-control" style="height: 300px"><?php echo $Jawaban ?>
                    </textarea>
              </div>
      <div class="form-group">
                  <h4>Bukti Laporan</h4>
                 <label for="exampleInputEmail1">
                    <?php 

                    if ($Bukti == Null){
                      echo "Tidak Melampirkan Bukti";
                    
                    }else{
                      echo "
     
                 <a href='../../../../uploads/$Bukti'> $Bukti</a>" ;
                    }

                    ?> 
</label>
             </div>
               
            <div class="box-footer">
              <div class="pull-right">
            <a href="<?php echo base_url()?>index.php/client/pengaduan"  class="btn btn-primary"><li class="fa fa-home" >  Kembali</li></a>
           </div>
            </div>
          </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
    </section>
  </form>