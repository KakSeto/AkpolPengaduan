<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
     <title>PENGADUAN AKPOL | Ganti Password </title>
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

     <?php
      //menampilkan error menggunakan alert javascript
        if(isset($error)){
         echo"<div style='margin-bottom:10px' class='alert alert-danger fade in col-md-12' role='alert'><center>$error</center></div>";
 }
      ?>

      <!--- INI NANTI DIGANTI ------->
 <form method="post" action="<?php echo base_url('index.php/authentication/auth/gantipassword'); ?>" role="login">
    <div class="input-group">                   
    <div class="form-line">
    <input type="text" class="form-control" name="username" required="true" autofocus placeholder="Masukan NRP" required/>
     </div>
   </div>
      <div class="input-group">
        <div class="form-line">
        <input type="password" class="form-control" name="password" placeholder="Password Lama" required/>
   </div>
 </div>
 <div class="input-group">
        <div class="form-line">
        <input type="password" class="form-control" name="passwordbaru" placeholder="Password Baru" required/>
   </div>
 </div>
 <div class="input-group">
        <div class="form-line">
        <input type="password" class="form-control" name="passwordbaru2" placeholder="Ulangi Password Baru" required/>
   </div>
 </div>
  <div class="row">
    <div class="col-xs-6">
        <button type="submit" name="gantipass"  class="btn btn-primary btn-block btn-flat">Ganti Password</button>
    </div>
 </div>
    </form>
    <div class="row m-t-15 m-b--20">
    <div class="col-xs-6 align-left">
    <a href="<?php echo base_url()?>index.php/authentication/auth/daftar">Daftar</a>
    </div>
    <div class="col-xs-6 align-right">
    <a href="<?php echo base_url()?>index.php/"> <i class="fa fa-home"></i> Beranda</a><br>
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
