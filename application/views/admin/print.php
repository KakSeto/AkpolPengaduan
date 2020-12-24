        <?php
        if(count($cari)>0)
        {
            foreach ($cari as $data) {
            echo '
<script>
window.print();
</script>
            <section class="invoice">
   <center> <img src="'.base_url().'/dist/img/kopsurat.png" width="100%"></center>
 
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
      <br>
          <h4><b>NOMOR PENGADUAN   :</b> '.$data->id_laporan.'</h4>
          <h4><b>TANGGAL PENGADUAN :</b> '.$data->tanggal_lapor.'</h4>
  
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    
    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>NAMA PELAPOR</th>
            <th>DEPARTEMEN</th>
            <th>LOKASI</th>
            <th>JENIS LAPORAN</th>
            <th>NAMA TEKNISI</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>'.$data->Nama.'</td>
            <td>'.$data->Nama_Departemen.'</td>
            <td>'.$data->nama_gedung.'</td>
            <td>'.$data->Jenis.'</td>
            <td>'.$data->Nama_Teknisi.'</td>
           
          </tr>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
<hr>
      <h4>LAPORAN :</h4>
      
    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-12">
                  <div class="text-muted well well-sm no-shadow" style="padding:3px;overflow:auto;width:auto;height:auto;border:1px solid grey" >
'.$data->Laporan.'
</div>
              </div>


              <br>
              <br>
              <hr>
              
              
              <div class="col-xs-12">
              <h4>JAWABAN :</h4>
                          <div class="text-muted well well-sm no-shadow" style="padding:3px;overflow:auto;width:auto;height:auto;border:1px solid grey" >
        '.$data->Jawaban.'
        </div>
                   

        
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
';
            }
        }


else if(count($hapus_lapor)>0)
        {
           foreach ($hapus_lapor as $d) {
             echo '
<script>
window.print();
</script>

    <section class="invoice">
 <center> <img src="'.base_url().'/dist/img/kop.png" width="100%"></center>
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
      <br>
      <h4><b>NOMOR PENGADUAN :</b> '.$d->id_laporan.'</h4>
      
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    
    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>NAMA PELAPOR</th>
            <th>SUBJECT</th>
            <th>JENIS LAPORAN</th>
            <th>STATUS</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>'.$d->Nama.'</td>
            <td>'.$d->Subjek.'</td>
            <td>'.$d->Jenis.'</td>
            <td>'.$d->Status.'</td>
          </tr>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
<hr>
      <h4>LAPORAN :</h4>
      
    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-12">
                  <div class="text-muted well well-sm no-shadow" style="padding:3px;overflow:auto;width:auto;height:auto;border:1px solid grey" >
'.$d->Laporan.'
</div>
              </div>

        
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->

';
            }
        }

        else
        {
            echo '  <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
               Nomor Laporan Yang Anda Cari Tidak Dapat Kami Temukan , Pastikan Kembali Nomor Laporan Anda
 <br><br><a href="javascript:history.back()">return to dashboard</a>
              </div>
            ' ;
        }
        ?>

  