 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">

          
<a target="_BLANK" class="btn btn-danger btn-block margin-bottom" href="<?php echo base_url()?>index.php/admin2/read/cetak"><i class="fa fa-print"></i> Cetak</a>
            

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
                <li><a href="<?php echo base_url()?>index.php/admin2/laporan"><i class="fa fa-inbox"></i> LAPORAN MASUK
                   <span class="label label-primary pull-right"><?php echo $pesan_masuk ?></span></a></li>
                <li  class="active"><a href="#"><i class="fa fa-envelope-o"></i> LAPORAN KELUAR   <span class="label label-success pull-right"><?php echo $pesan_keluar ?></span></a></li>
                </li>
                <li><a href="<?php echo base_url()?>index.php/admin2/hapus"><i class="fa fa-trash-o"></i> Trash <span class="label label-danger pull-right"><?php echo $hapus ?></span></a></li>
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
              <h3 class="box-title">LAPORAN KELUAR</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                  <th>No</th>
                  <th>Nama Pelapor</th>
                  <th>Nomor Laporan</th>
                  <th>Jenis Laporan</th>
                  <th>Tanggal Lapor</th>
                  <th>Departemen</th>
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
              <td><?php echo $row->Nama ?></td>
              <td><?php echo $row->id_laporan ?></td>
              <td><?php echo $row->Jenis ?></td>
              <td><?php echo $row->tanggal_lapor ?></td>
              <td><?php echo $row->Nama_Departemen ?></td>
              <td>
                <!-- JIKA SUDAH DIBACA = CENTANG , JIKE BELUM = SILANG  -->
                <?php if(($row->Status =='Belum Dibaca')){
                          echo '<i class="fa fa-remove"></i>';
                      }else if(($row->Status =='Sudah Dibaca')) {
                        echo '<i class="fa fa-check"></i>';
                }

                 ?>
                   
              </td>
                  
              <!--- AKSI DETAILS ---------->    
              <td>
                  <?php if(($row->Status =='Belum Dibaca')){
                              echo "";
                        }else if(($row->Status =='Sudah Dibaca')) {
                            echo "<a class='btn btn-danger' href='read/read_view/$row->id_laporan' ><i class='fa fa-edit' ></i>Details</a>";
                  }

                   ?>
                   
              </td>
              
          
    </tr>
          <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama Pelapor</th>
                  <th>Nomor Laporan</th>
                  <th>Jenis Laporan</th>
                  <th>Tanggal Lapor</th>
                  <th>Departemen</th>
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