     <!-- Main row -->
      <div class="row">
        <!-- Left col -->

         <section class="col-lg-7 connectedSortable">
         
         <!-- VISI MISI
          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-graduation-cap"></i>
              <h3 class="box-title">Visi Dan Misi</h3>
              <!-- tools box 
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
              </div>
              <!-- /. tools 
            </div>

            <div class="box-body">
    <?php
                    $no =  1 ;
                    foreach ($data->result() as $row) { 
                  ?>
           
              
   <?php echo $row->Visi_misi ?>
   
                <?php } ?>
           

            </div>
          </div>

          END VISI MISI -->

        
          <!-- INFO AKPOL 
          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-bullhorn"></i>

              <h3 class="box-title">Info Akpol</h3>
              <!-- tools box 
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
              </div>
              <!-- /. tools 
            </div>
            <div class="box-body">
    <marquee onmouseover="this.stop()" height="200px" onmouseout="this.start()" scrollamount="1" direction="up" font face="comic san" align="center" behavior=”alternate”>

 <?php
                    $no =  1 ;
                    foreach ($vale->result() as $row) { 
                  ?>
                  <hr>
           <b> <?php echo $row->tema ?> :</b>
   <?php echo $row->info ?>
   
                <?php } 

                ?>
           


</marquee>  

 

            </div>
          </div>
     
        </section>
        <!-- /.Left col 
        <!-- right col (We are only adding the ID to make the widgets sortable)
        <section class="col-lg-5 connectedSortable">

           END INFO AKPOL -->  
    
          <!-- AKPOL NEWS
          <div class="box box-solid bg-green-gradient">
            <div class="box-header">
              <i class="fa fa-newspaper-o"></i>

              <h3 class="box-title">Akpol News</h3>
              <!-- tools box 
              <div class="pull-right box-tools">
                <!-- button with a dropdown 
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
               </div>
            <!-- /.box-header
            <div class="box-body no-padding">
           
   <div class="bs-example" data-example-id="carousel-with-captions">
    <div id="carousel-example-captions" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-captions" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-captions" data-slide-to="1"></li>
        <li data-target="#carousel-example-captions" data-slide-to="2"></li>
        <li data-target="#carousel-example-captions" data-slide-to="3"></li>
      </ol>

      <div class="carousel-inner" role="listbox">
          <?php
                    $no =  1 ;
                    foreach ($cover->result() as $row) { 
                  ?>
        <div class="item active">
          <img data-src="holder.js/900x500/auto/#777:#777" alt="900x500" src="<?php echo base_url()?>/uploads/<?php echo $row->cover ?>" data-holder-rendered="true">
          <div class="carousel-caption">
            <h3><?php echo $row->tittle ?></h3>
          
          </div>
        </div>

  <?php } ?>

   <?php
                    $no =  1 ;
                    foreach ($vale->result() as $row) { 
                  ?>
        <div class="item">
          <img data-src="holder.js/900x500/auto/#666:#666" alt="900x500" src="<?php echo base_url()?>/uploads/<?php echo $row->gambar ?>" data-holder-rendered="true">
          <div class="carousel-caption">
            <h3><b><?php echo $row->tema ?></b></h3>
         
          </div>
        </div>
         <?php } ?>

      <a class="left carousel-control" href="#carousel-example-captions" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-captions" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</div>
 </div>
</div>
----------------------------------------------END AKPOL NEWS ----->

        <!-------------- ARSIP AKPOL  
          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-bullhorn"></i>

              <h3 class="box-title">Arsip Akpol</h3>
              <!-- tools box 
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
              </div>
              <!-- /. tools 
            </div>
            <div class="box-body">

              ----END ARSIP AKPOL---------->
 



<!-------TABEL AKSI DIBAWAH 
     
<table class="table table-bordered table-striped">
                <thead>
                  <tr>
                  <th>No</th>
                  <th>Tema</th>
                  <th>Aksi</th>
                </tr>
              </thead>
               <?php
                    $no = 1 ;
                    foreach ($info->result() as $row) { 
                  ?>
                <tbody>

          <td><?php echo $no++ ?></td>
          <td><?php echo $row->tema ?></td>
  <td><a href="<?php echo base_url()?>index.php/admin/info/view/<?php echo $row->id ?>" class="btn btn-success"> Lihat</a></td>
        
                      </tbody>

                <?php } ?>
              
              </table>

              --END TABEL ----------------->

         

            </div>
          </div>
    </section>
       </div>
     
    </section>
