  <?php

include('pengurus/includes/config.php');
if(isset($_POST['register']))
{
$name=$_POST['name'];
$username=$_POST['username'];
$alamat=$_POST['alamat'];
$email=$_POST['email'];
$telp=$_POST['telp'];
$password=$_POST['password'];
$query="insert into   pengurus (name, username, email, alamat, telp, password) values(?,?,?,?,?,?)";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('ssssss',$name, $username, $email, $alamat, $telp, $password);
$stmt->execute();

if($rc) {
echo"<script>alert('Pengurus berhasil terdaftar');</script>";
} 
else{
    echo"<script>alert('Username sudah digunakan');</script>";
}
}
?>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Daftar pengurus</title>
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
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
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
    <section id="register" >
    <div class="row register-form">
        <div class="col-md-8 offset-md-2">
            <form method="POST" action="" class="border rounded custom-form">
                <h1>Daftar Sebagai Pengurus atau&nbsp;</h1><a class="btn btn-primary text-center border rounded shadow" role="button" href="login.php" style="background-color: rgb(92,166,245);">Login</a>
                
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field" >Nama Pengurus</label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="text" required="required" autofocus="autofocus" placeholder="Nama Pengurus" name="name" ></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="username-input-field">Username</label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="username" required="required" autofocus="autofocus" placeholder="Username" name="username" ></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="email-input-field">Email </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="email" required="required" autofocus="autofocus" placeholder="Email" name="email" ></div>
                </div>
              
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="alamat-input-field" >Alamat</label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="text" required="required" autofocus="autofocus" placeholder="Alamat" name="alamat"></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="nomor-input-field">Nomor Telepon</label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="tel"  required="required" autofocus="autofocus" placeholder="No Telepon" name="telp" ></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="pawssword-input-field">Password </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="password" required="required" autofocus="autofocus" placeholder="Password" name="password"></div>
                </div>
              
               <button type="submit" name="register" class="btn btn-light submit-button" >Daftar</button></form>
        </div>
    </div>
</section>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
