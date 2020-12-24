<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
     <title>PENGADUAN AKPOL | Daftar</title>
    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url()?>/asset/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
 <link rel="stylesheet" href="<?php echo base_url()?>dist/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>dist/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url()?>dist/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Custom Css -->
    <link href="<?php echo base_url()?>/asset/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
           <img style="width: 360px" src="<?php echo base_url()?>dist/img/Akpol.png">
            
        </div>
    <div class="card">      
      <div class="body">
      <div class="msg">
  <form action="<?php echo base_url()?>index.php/authentication/auth/simpan" method="post">
        <div class="input-group">                   
    <div class="form-line">
        <input type="text" name="nama" autofocus required="true" class="form-control" placeholder="Nama Lengkap">
      </div> 
    </div>
       <div class="input-group">                   
    <div class="form-line">
        <input type="email" name="email" required="true" required="true" class="form-control" placeholder="Email">
      </div> 
    </div>
       <div class="input-group">                   
    <div class="form-line">
        <input type="text" class="form-control" required="true" name="Nohp" placeholder="No Handphone" data-inputmask='"mask": "(999) 999-9999"' data-mask>
      </div> 
    </div>
            
       <div class="input-group">                   
       <div class="form-line">
      <select name="Departemen" class="form-control">
                              <?php
                    
                              foreach ($namadepartemen as $row) { 
                

                                echo "<option value='".$row->id_departemen."'>".$row->Nama_Departemen."</option>";
                              }
                              echo"

                              </select>"
                              ?>

          </div>
    </div>
       <div class="input-group">                   
    <div class="form-line">
    <textarea class="form-control" required="true" name="Alamat" placeholder="Alamat" ></textarea>
      </div> 
    </div>
    
      <div class="input-group">                   
    <div class="form-line">
        <input type="text" required="true" name="username" class="form-control" placeholder="NRP">
      </div> 
    </div>
        <div class="input-group">                   
    <div class="form-line">
        <input type="Password" required="true" name="password" class="form-control" placeholder="Password">
      </div> 
    </div>
  <div class="row">
    <div class="col-xs-4">
        <button type="submit" name="register" class="btn btn-primary btn-block btn-flat">Daftar</button>
    </div>
 </div>
    </form>
    <div class="row m-t-15 m-b--20">
   
    <div class="col-xs-12 align-right">
    <a href="<?php echo base_url()?>index.php/authentication/auth/login">Login Sekarang</a><br>
                        </div>
                      </div>
 
<!-- jQuery 3 -->
<script src="<?php echo base_url()?>dist/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url()?>dist/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url()?>dist/plugins/iCheck/icheck.min.js"></script>

</body>
</html>
