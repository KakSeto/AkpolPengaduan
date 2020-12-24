        <?php
        if(count($cari)>0)
        {
            foreach ($cari as $data) {
            echo '<section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <b>NOMOR PENGADUAN :</b> '.$data->id_laporan.'
        </h2>
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
            <th>ID PELAPOR</th>
            <th>SUBJECT</th>
            <th>JENIS LAPORAN</th>
            <th>STATUS</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>'.$data->id_client.'</td>
            <td>'.$data->Subjek.'</td>
            <td>'.$data->Jenis.'</td>
            <td>'.$data->Status.'</td>
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
      <div class="col-xs-6">
                  <div class="text-muted well well-sm no-shadow" style="padding:3px;overflow:auto;width:auto;height:200px;border:1px solid grey" >
'.$data->Laporan.'
</div>
              </div>

        
      <!-- /.col -->
      <div class="col-xs-6">
    <pre>
<b>PERATIAN</b>
Harap Rahasiakan Nomor Laporan Anda
Kebocoran Laporan Anda Bukan Tanggung Jawab Kami

Karena Kami Telah Memberi Tahu Agar Tidak Di perkenankan
Untuk Memberi Tahu Nomor Laporan Anda    
    </pre>
      </div>
       <div class="col-xs-6">
              <form action="cetak">
      <input type="hidden" name="search" value="'.$data->id_laporan.'"  target="_BLANK" methode="POST">
<button type="submit" class="btn btn-success" ><i class="fa fa-print"></i> PRINT</button>

</form>
      <!-- /.col -->
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
             echo '<section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <b>NOMOR PENGADUAN :</b> '.$d->id_laporan.'
        </h2>
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
            <th>ID PELAPOR</th>
            <th>SUBJECT</th>
            <th>JENIS LAPORAN</th>
            <th>STATUS</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>'.$d->id_client.'</td>
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
      <div class="col-xs-6">
                  <div class="text-muted well well-sm no-shadow" style="padding:3px;overflow:auto;width:auto;height:200px;border:1px solid grey" >
'.$d->Laporan.'
</div>
              </div>

        
      <!-- /.col -->
      <div class="col-xs-6">
    <pre>
<b>PERATIAN</b>
Harap Rahasiakan Nomor Laporan Anda
Kebocoran Laporan Anda Bukan Tanggung Jawab Kami

Karena Kami Telah Memberi Tahu Agar Tidak Di perkenankan
Untuk Memberi Tahu Nomor Laporan Anda    
    </pre>
      </div>
       <div class="col-xs-6">
              <form action="cetak" mey>
      <input type="hidden" name="search" value="'.$d->id_laporan.'"  target="_BLANK" methode="POST">
<button type="submit" class="btn btn-success" ><i class="fa fa-print"></i> PRINT</button>

</form>
      <!-- /.col -->
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

  