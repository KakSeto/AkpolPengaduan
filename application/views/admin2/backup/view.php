 <!-- Main content -->
    <section class="content">
      <div class="row">
          
    <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">

Backup & Restore          
        </div>
            <div class="box-body">
          
      <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
              <li><a href="#tab_3" data-toggle="tab">Relasi</a></li>
              <li><a href="#tab_2" data-toggle="tab">Restore</a></li>
              <li class="active"><a href="#tab_1" data-toggle="tab"> Bakcup</a></li>
             </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
            <form action="<?php echo site_url('admin/backup/backupin');?>" method="post">
    <select class="form-control" required="required" name="tabel">
        <?php foreach ($tabel as $baris) {  ?>
            <option value="<?php echo $baris->Tables_in_pengaduanakpol; ?>"><?php echo $baris->Tables_in_pengaduanakpol; ?></option>
        <?php } ?>
    </select>
    <br><br>
    <button class="btn btn-primary" type="submit" >Backup Database</button>
</form>
<br>
<br>
 <div class="callout callout-danger">
       
                <h4>PERHATIAN !! </h4>

                <p>MOHON BACKUP DATA SETIAP 1 BULAN SEKALI , UNTUK KEAMANAN DATA !</p>
              </div>


               </div>

              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
<?php echo form_open_multipart('admin/backup/restorein');?>
    <input type="file" name="datafile" id="datafile" /><br><br>
    <button class="btn btn-primary" type="submit" >Upload Database</button>
</form>
<br>
<div class="callout callout-danger">
       
                <h4>PERHATIAN !! </h4>

                <p>FILE YANG DI TERIMA HANYA BERBENTUK .SQL , JIKA INGIN RECOVERY HARAP HAPUS SEMUA DATA YANG INGIN DI RECOVERY</p>
              </div>
              </div>

                 <div class="tab-pane" id="tab_3">
    <a target="_BLANK" href="<?php echo base_url()?>uploads/1a.png">   <img src="<?php echo base_url()?>uploads/1a.png"> </a>


               </div>
       
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->


            </div>               
          
          </div>
          </div>
        </div>
      </section>
    </form>