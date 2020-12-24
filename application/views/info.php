 <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">

            <div class="box-body">
              <div class="form-group">
             <center> <h4><?php echo $tema ?></h4> </center>
             <hr>
              </div>
              <div class="form-group">
             <center> <img src="<?php echo base_url()?>uploads/<?php echo $gambar ?>"> </center>
              </div>
           <div class="form-group">
                    <textarea  name="info" disabled class="compose-textarea form-control" style="height: 300px"><?php echo $info ?>
                    </textarea>
              </div>
            <div class="box-footer">
              <div class="pull-right">
            <a href="javascript:history.back()"   class="btn btn-primary"><li class="fa fa-home" >  Kembali</li></a>
           </div>
            </div>
          </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
    </section>
  </form>