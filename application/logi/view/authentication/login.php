<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url()?>dist/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>dist/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url()?>dist/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url()?>dist/plugins/iCheck/square/blue.css">
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="">SELAMAT DATANG</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">SISTEM PENGADUAN DESA</p>
     <?php
      //menampilkan error menggunakan alert javascript
        if(isset($error)){
         echo"<div style='margin-bottom:10px' class='alert alert-danger fade in col-md-12' role='alert'><center>$error</center></div>";
 }
      ?>
 <form method="post" action="<?php echo base_url('index.php/authentication/auth/login'); ?>" role="login">
    <div class="form-group has-feedback">
    <input type="text" class="form-control" name="username" placeholder="Masukan Username" required/>
     </div>
    <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Masukan Password" required/>
   </div>
  <div class="row">
   <div class="col-xs-4">
        <button type="submit" name="submit" class="btn btn-success btn-block btn-flat" value="login">Masuk</button>
    </div>
 </div>
    </form>

    <!-- /.social-auth-links -->
<br><br>
    <a href="<?php echo base_url()?>index.php/authentication/auth/daftar">Anda Belum Mempunyai Akun ?</a><br>
<br><br>
    <a href="<?php echo base_url()?>index.php/"><i class="fa fa-home"></i> Beranda</a><br>
    
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url()?>dist/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url()?>dist/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url()?>dist/plugins/iCheck/icheck.min.js"></script>
</body>
</html>
