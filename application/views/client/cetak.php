<script>
window.print();
</script>
<center> <img src="<?php echo base_url()?>/dist/img/kop.png" width="100%"></center>

    <div class="col-md-12">
<div class="box">
            <div class="box-header">
            </div>
            Pelapor : <?php $user = $this->session->userdata('username');
echo $user;
            ?>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                  <th>No</th>
                  <th>Nomor Laporan</th>
                  <th>Jenis Laporan</th>
                  <th>Tanggal Lapor</th>
                  <th>Status</th>
                
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
           <td><?php echo date("d-F-Y",strtotime($row->tanggal_lapor)) ?></td>
                          <td><center>
            <?php if(($row->Status =='Belum Dibaca')){
                  echo '<i class="fa fa-remove"></i>';
                }else if(($row->Status =='Sudah Dibaca')) {
                  echo '<i class="fa fa-check"></i>';
                }

                 ?></center></td>
                  
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
                 
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </section>