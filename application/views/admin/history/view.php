 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
              
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
                 <li ><a href="<?php echo base_url()?>index.php/admin/data_admin"><i class="fa fa-users"></i> ADMIN  <span class="label label-warning pull-right"><?php echo $admin ?></span></a></li>
                </li>
                 <li><a href="<?php echo base_url()?>index.php/admin/client"><i class="fa fa-user-o"></i> CLIENT  <span class="label label-primary pull-right"><?php echo $client ?></span></a></li>
                </li>
                <li  class="active"><a href="#"><i class="fa fa-trash-o"></i> History  <span class="label label-danger pull-right"><?php echo $history ?></span></a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
         </div>
          
        <!-- /.col -->
    <div class="col-md-9">

<div class="box">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-history"> History</i></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                  <th>No</th>
                  <th>Id Username</th>
                  <th>Username</th>
                  <th>Nama</th>
                  <th>Email</th>
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
              <td><?php echo $row->id?></td>
         <td><span style="width: 80px" class="btn btn-warning"><?php echo $row->username ?></span></td>
              <td><?php echo $row->Nama ?></td>
              <td><?php echo $row->Email ?></td>
         <td><?php echo $row->level ?></td>
         <td><a class="btn btn-danger" href="<?php echo base_url()?>index.php/admin/client/hapus_history/<?php echo $row->id?>"onclick="return confirm('Apa Anda Yakin Hapus Data Secara Permanet ?')"><i class="fa fa-trash-o"> Hapus</i></a>
        <a class="btn btn-success" href="<?php echo base_url()?>index.php/admin/client/restore/<?php echo $row->id?>"><i class="fa fa-history"> Restore</i></a>
         </td>
              
                          
    </tr>
          <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                    <tr>
                  <tr>
                  <th>No</th>
                  <th>Id Username</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Jenis Kelamin</th>
                  <th>Username</th>
                  <th>Aksi</th>
                </tr>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </section>
