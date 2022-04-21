<?php
session_start();
if( isset($_SESSION['userid']) ) {
    header('location:index.php'); 
}
require_once('config/koneksi.php');
$userfail = isset($_GET['userfail']);
$passwordfail = isset($_GET['passwordfail']);
$logout = isset($_GET['logout']);
?>


<!DOCTYPE html>
<html>
    <head>

        <link rel="shortcut icon" href="images/favicon_1.ico">

        <title>.:: Aplikasi Peminjaman Warkah ::.</title>

        <!-- Base Css Files -->
        <link href="css/login.css" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
        <link href="css/material-design-iconic-font.min.css" rel="stylesheet">

        <!-- animate css -->
        <link href="css/animate.css" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="css/waves-effect.css" rel="stylesheet">

        <!-- Custom Files -->
        <link href="css/helper.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        
        <!--Tambahan khusus login -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  
	<title>Animated Login Form</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<img class="wave" src="images/wave.png">
    <div class="container">
        <div class="img">
            <img src="images/bg.svg">
        </div>
        <div class="login-content">
                <img src="images/Logo.png">
                <h3 class="title">Aplikasi Warkah</h3>
                <div class="input-div one">
                   <div class="i">
                        <i class="fas fa-user"></i>
                   </div>

        <div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">
<div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading bg-img"> 
                    <div class="bg-overlay"></div>
                    <h3 class="text-center m-t-10 text-white"><strong>ADMINISTRATOR</strong> </h3>
                </div> 
                <div class="panel-body">

        <?php 
 if ($userfail) {
echo '<div class="alert alert-warning alert-dismissable">
    
    <button class="close" data-dismiss="alert">&times;</button>
    <p>Username / Password Salah !</p>
    </div>';
    }
    else if ($passwordfail) {
echo '<div class="alert alert-warning alert-dismissable">
    
    <button class="close" data-dismiss="alert">&times;</button>
    <p>Username / Password Salah !</p>
    </div>';
    }
    else if ($logout) {
echo '<div class="alert alert-warning alert-dismissable">
    <button class="close" data-dismiss="alert">&times;</button>
    <p>Anda telah berhasil logout</p>
    </div>';
    }

?>



      <form id="form-login" action="proseslogin.php" method="POST">
          
      <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input">
            	   </div>
            	</div>
            	<a href="#">Forgot Password?</a>
            	<input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>



  </body>
</html>