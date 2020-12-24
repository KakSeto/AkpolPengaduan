 <!-- Main content -->
 <section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">


         <form method="POST" action="<?php echo base_url()?>/index.php/admin/laporan/simpan/" >

           <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" placeholder="Username" name="username">
          </div>
           <div class="form-group">
            <label>Jawaban :</label>
            <textarea  name="Jawaban" class="compose-textarea form-control" style="height: 300px">
            </textarea>
          </div>

          <div class="box-footer">
            <div class="pull-right">
             <button type="submit" class="btn btn-success" name="simpan"><i class="fa fa-send"></i>Send</button>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
</form>