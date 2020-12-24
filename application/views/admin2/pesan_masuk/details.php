 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
<a target="_BLANK" class="btn btn-danger btn-block margin-bottom" href="<?php echo base_url()?>index.php/admin2/laporan/struck/<?php echo $id_laporan ?>"><i class="fa fa-print"></i> Cetak  </a>
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
                <li class="active"><a href="<?php echo base_url()?>index.php/admin2/laporan"><i class="fa fa-inbox"></i> LAPORAN MASUK
                  <span class="label label-primary pull-right"><?php echo $pesan_masuk ?></span></a></li>
                <li><a href="<?php echo base_url()?>index.php/admin2/read"><i class="fa fa-envelope-o"></i> LAPORAN KELUAR   <span class="label label-success pull-right"><?php echo $pesan_keluar ?></span></a></li>
        </a></li>
                </li>
                <li><a href="<?php echo base_url()?>index.php/admin2/hapus"><i class="fa fa-trash-o"></i> Trash   <span class="label label-danger pull-right"><span class="label label-danger pull-right"><?php echo $hapus ?></span></a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
      <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Keterangan</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
     <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#"><i class="fa fa-remove"></i> BELUM DIBACA</a></li>
                <li><a href="#"><i class="fa fa-check"></i> SUDAH DIBACA</a></li>
              </ul>
            </div>
            
              </div>
      <!-- /. box -->
         </div>
          
    <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">

          
     <form method="POST" action="<?php echo base_url()?>index.php/admin2/laporan/simpan/<?php echo $id_laporan ?>" >
         <?php
              $no =  1 ;
              foreach ($dataid->result() as $row) { 
                ?>

     <input type="hidden" value="<?php echo $row->id ?>" name="dataid">
<?php } ?>

              <h3 class="box-title">NO : <?php echo $id_laporan ?>| <b><?php echo $Status ?></b>| Tanggal Laporan : <?php echo $tanggal_lapor ?></h3><br>
            </div>
            <div class="box-body">
              <div class="form-group">  
              
              <?php
                        $no =  1 ;
                        foreach ($gedung->result() as $row) { 
                      ?>
             
<h4>Lokasi : <?php echo $row->nama_gedung ?> </h4>  

            <?php } ?>
             
              </div>
           <div class="form-group">
                    <textarea  name="Laporan" id="compose-textarea" disabled class="compose-textarea form-control" style="height: 300px"><?php echo $Laporan ?>
                    </textarea>
              </div>


                         <div class="form-group">
                          <label>Jawaban :</label>

                            <div class="form-group">
                            <b>Teknisi</b>
                            <select name="Teknisi" class="form-control">
                              <?php
                    
                              foreach ($namateknisi as $row) { 
                

                                echo "<option value='".$row->id_teknisi."'>".$row->Nama_Teknisi."</option>";
                              }
                              echo"

                              </select>"
                              ?>

                            </div>

                          
                    <textarea  name="Jawaban" class="compose-textarea form-control" style="height: 300px">
                    </textarea>
              </div>
              
              <!----- BUKTI

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
             
             --------------------------->
               
            <div class="box-footer">
              <div class="pull-right">
           <button type="submit" class="btn btn-success" name="simpan"><i class="fa fa-send"></i>Send</button>
           </div>
            </div>
          </div>
          </div>
        </div>
      </section>
    </form>