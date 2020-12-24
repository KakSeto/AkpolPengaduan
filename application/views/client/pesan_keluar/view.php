 <!-- Main content -->
    <section class="content">
      <div class="row">


        <div class="col-md-3">

          <!--- CETAK
                    <a href="<?php echo base_url()?>index.php/client/pesan_masuk/cetak" target="_BLANK" class="btn btn-primary btn-block margin-bottom">  <i class="fa fa-print"></i> Cetak</a>
                    ---END CETAK--->

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
                <li class="active"><a href="#"><i class="fa fa-envelope"></i> PESAN MASUK
                  <span class="label label-success pull-right"><?php echo $pesan_masuk ?></span></a></li>
                 <li><a href="<?php echo base_url()?>index.php/client/pengaduan"><i class="fa fa-inbox"></i> PENGADUAN KU
                  <span class="label label-primary pull-right"><?php echo $pesan_keluar ?></span></a></li>
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
                  <!-- /. box -->
    <div class="col-md-9">
<div class="box">
            <div class="box-header">
              <h3 class="box-title">PESAN MASUK</h3>
              <p>*) Pesan Akan Masuk Ke History Pesan Selama 30 Hari Kedepan</p>
            </div>
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
                
   $tanggal = date("m",strtotime($row->tanggal_lapor ));
                    $date = '1';
                    $hari = date('m');
                    $kode = $row->id_laporan;
                    $sekarang = $tanggal+$date;
                //   echo $sekarang;
                    if ($id = $sekarang == $hari){
                       $this->load->model('admin/model_laporan');
                      $this->model_laporan->hapus_laporan($kode);
                     // echo "2018";
                    }else {

                      // echo "Sekarang bukan 2018";
                    }

                  ?>
           
                <tr>
                <td><?php echo $no++ ?></td>
              <td><?php echo $row->id_laporan ?></td>
              <td><?php echo $row->Jenis ?></td>
              <td><?php echo $row->tanggal_lapor ?></td>
              
                          <td>


                <?php if(($row->Status =='Belum Dibaca')){
                  echo '<i class="fa fa-remove"></i>';
                }else if(($row->Status =='Sudah Dibaca')) {
                  echo '<i class="fa fa-check"></i>';
                }

                 ?></td>

                  <td>
                <?php if(($row->Status =='Belum Dibaca')){
                  // echo "<a class='btn btn-primary' href='view/$row->id_laporan' ><i class='fa fa-edit' ></i> Details </a>";
                }else if(($row->Status =='Sudah Dibaca')) {
                   echo "<a class='btn btn-danger' href='pesan_masuk/view/$row->id_laporan' >Jawaban</a>";
                }

                 ?></td>
                                   
                                   
                    
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
            </div>
          </div>
        </div>
      </section>