<?php
session_start();
include('pengurus/includes/config.php');
if(isset($_POST['login']))
{
$username=$_POST['username'];
$password=$_POST['password'];
$stmt=$mysqli->prepare("SELECT username,password,id_pengurus FROM pengurus WHERE username=? and password=? ");
				$stmt->bind_param('ss',$username,$password);
				$stmt->execute();
				$stmt -> bind_result($username,$password,$id);
				$rs=$stmt->fetch();
				$stmt->close();
				$_SESSION['id_pengurus']=$id;
				$_SESSION['login']=$username;
				
				if($rs)
				{
                    $result ="SELECT id_panti FROM pantiasuhan where id_pengurus='$id'";
                    $stmt = $mysqli->prepare($result);
                    $stmt->execute();
                    $stmt->bind_result($idpa);
                    $stmt->fetch();
                    $stmt->close();
                    $_SESSION['id_panti']=$idpa;
                    if($idpa==0)
                    {header("location:pengurus/tambah-panti.php");}
                    else {header("location:pengurus/dashboard.php");}
                }
				else
				{
					echo "<script>alert('Invalid Username/Email or password');</script>";
				}
			
         } ?>
 
<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login Pengurus</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Pretty-Footer.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab">
    <link rel="stylesheet" href="assets/css/login-full-page-bs4.css">
    <link rel="stylesheet" href="assets/css/styles.css">
 </head>
    <body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white" id="mainNav">
        <div class="container"><a class="navbar-brand text-dark js-scroll-trigger" href="index.php">BajuKita</a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler text-lowercase text-light bg-dark navbar-toggler-right" type="button" data-toogle="collapse"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto text-uppercase">
                    <li class="nav-item" role="presentation"><a class="nav-link text-info js-scroll-trigger" href="index.php#page-top">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-info js-scroll-trigger" href="index.php#profil">PROFIL</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-info js-scroll-trigger" href="index.php#cara-donasi">SYARAT &amp; CARA</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-info js-scroll-trigger" href="table.php">DONASI</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-info js-scroll-trigger" href="login.php">PENGURUS</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-info js-scroll-trigger" href="index.php#footer">KONTAK</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section id="login" style="padding: 150px;">
    <div class="container-fluid main-panel">
        <div class="row">
            <div class="col d-flex justify-content-center align-items-center">
                <div class="login-panel">
                    <div class="login-user-avatar"></div>
                    <div class="login-form">
                        <form method="POST" action="">
                            <div class="form-group">
                                <div class="input-group"><input class="form-control" type="text" id="login-username" name="username" required="" placeholder="Username"></div>
                            </div>
                            <div class="form-group">
                                <div class="input-group"><input class="form-control" type="password" name="password" required="" placeholder="Password"></div>
                            </div>
                            <div class="form-group"><button type="submit" class="btn btn-primary btn-block" name="login">Login</button></div>
                        </form>
                    </div>
                    <h5 class="text-muted section-subheading " style="padding: 22px;">Buat akun baru disini <a href="register.php">Daftar</a></h5>
                    <div class="login-response has-error"></div>
                </div>
            </div>
        </div>
    </div></section>
  

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/login-full-page-bs4.js"></script>
    <script src="assets/js/login-full-page-bs4-1.js"></script>
