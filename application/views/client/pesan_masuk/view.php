<!-- TAMBAH PENGADUAN -->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">TAMBAH PENGADUAN</h4>
        </div>
        <div class="modal-body">
          <form method="POST" action="<?php echo base_url()?>index.php/client/pengaduan/tambah" enctype="multipart/form-data">
          </div>
          <!-- /.box-header -->
          <div class="box-body" id="view">
            <div class="form-group">
             <div class="input-group">
              <div class="input-group-addon">
                <b>NOMOR LAPORAN</b>
              </div>
              <input type="text" class="form-control" name="id_laporan" readonly="readonly" value="<?php echo time() ?><?php echo date('Y') ?>" >
            </div>
          </div>

          <!-- JENIS LAPORAN -->
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
               <b>Lokasi</b>                  
              <div class="form-line">
              <select required="true" name="Lokasi" class="form-control" >
               <?php
                $no =  1 ;
                foreach ($gedung->result() as $row) { 
                  ?>

                  <option value="<?php echo $row->id_gedung?>"><?php echo $row->nama_gedung ?></option>


                  <?php } ?>
              </select>
                </div> 
              </div>

              <div class="form-group">
              <b>Ditujukan Kepada :</b>                   
              <div class="form-line">
              <select required="true" name="Tujuan" class="form-control" >
               <?php
                $no =  1 ;
                foreach ($tujuan->result() as $row) { 
                  ?>

                  <option value="<?php echo $row->id_departemen?>"><?php echo $row->Nama_Departemen ?></option>


                  <?php } ?>
              </select>
                </div> 
              </div>

          <!-- SUBJEK
          <div class="form-group">
            <input class="form-control" name="Subjek" placeholder="Subject:">
          </div>
          --->


          <div class="form-group">
                <textarea  name="Laporan" id="compose-textarea"  class="compose-textarea form-control" style="height: 300px">
                    </textarea>
           </div>

          <?php
          foreach ($valu->result() as $row) { 
            ?>
            <input type="hidden" class="form-control" name="id_client" readonly="readonly" value="<?php echo $row->id ?> " >


            <?php } ?>


          

              <!-- FOTO UPLOAD HILANG 
              <div class="form-group">
                <label for="exampleInputEmail1">Foto</label>
                          <input  type="file" name="userfile">
                              </div>
              -->

            </div>
          
               <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-close"> Batal</span></button>
            <button type="submit" name="simpan" class="btn btn-primary"><span class="fa fa-save"> Simpan</span></button>
          </div>
          </div>
        </div>
      </div>
    </form>
    <!-- END TAMBAH PENGADUAN -->

 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
 <button type="button" class="btn btn-danger btn-block margin-bottom" data-toggle="modal" data-target="#modal-default">
              <i class="fa fa-plus-circle"></i> Tambah Pengaduan
              </button>



                <!------------ CETAK DEPAN
              <a href="<?php echo base_url()?>index.php/client/pengaduan/cetak" target="_BLANK" class="btn btn-primary btn-block margin-bottom">  <i class="fa fa-print"></i> Cetak</a>
              -------------------->

              
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
                 <li class="active"><a href="#"><i class="fa fa-inbox"></i> PENGADUAN KU
                  <span class="label label-primary pull-right"><?php echo $pesan_keluar?></span></a></li>
           <li><a href="<?php echo base_url()?>index.php/client/history"><i class="fa fa-history"></i> HISTORY PESAN
                  <span class="label label-danger pull-right"><?php echo $histori?></span></a></li>
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
          
        <!-- /.col -->
    <div class="col-md-9">
<div class="box">
            <div class="box-header">
              <h3 class="box-title">PENGADUAN KU</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                  <th>No</th>
                  <th>Nomor Laporan</th>
                  <th>Jenis Laporan</th>
                  <th>Tanggal Lapor</th>
                  
                  <th>Status</th>
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
              <td><?php echo $row->id_laporan ?></td>
              <td><?php echo $row->Jenis ?></td>
        <td><?php echo $row->tanggal_lapor  ?></td>
                          <td>
            <?php if(($row->Status =='Belum Dibaca')){
                  echo '<i class="fa fa-remove"></i>';
                }else if(($row->Status =='Sudah Dibaca')) {
                  echo '<i class="fa fa-check"></i>';
                }

                 ?></td>
                  
                      <td><a class="btn btn-danger" href="pengaduan/view/<?php echo $row->id_laporan ?>"> Details</a></td>        
    </tr>
          <?php } ?>
                </tbody>
                <tfoot>
                 <tr>
                  <th>No</th>
                  <th>Nomor Laporan</th>
                  <th>Jenis Laporan</th>
                  <th>Tanggal Lapor</th>
                
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </section>