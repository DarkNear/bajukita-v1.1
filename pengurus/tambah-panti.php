<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
if (!isset($_POST['submit']))
echo"<script>alert('Tambah Data Panti Dahulu');</script>";

if(isset($_POST['submit']))
{
$idp=$_SESSION['id_pengurus'];
$nama_panti=$_POST['nama_panti'];
$telp=$_POST['telp'];
$desk=$_POST['desk'];
$alamat=$_POST['alamat'];
$kota=$_POST['kota'];
$kec=$_POST['kec'];
$kp=$_POST['kodepos'];

$query="insert into  pantiasuhan (id_pengurus,nama_panti,telp,deskripsi,alamat,kecamatan,kota,kodepos) values(?,?,?,?,?,?,?,?)";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('isssssss',$idp,$nama_panti,$telp,$desk,$alamat,$kec,$kota,$kp);
$stmt->execute();
if($rc)
				{
          header("Location:panti-detail.php");   
		
}
			
}

?>
<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title>Tambah Panti Asuhan</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="js/validation.min.js"></script>
</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
					<h2 class="page-title">Tambah Panti Asuhan </h2>
	
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">tambah panti asuhan</div>
				<div class="panel-body">
					<form method="post" class="form-horizontal">
						
						<div class="hr-dashed"></div>
						<div class="form-group">
<label class="col-sm-3 control-label"><h4 style="color: green" align="left">Profil Panti Asuhan </h4> </label>
</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Nama Panti Asuhan</label>
							<div class="col-sm-8">
								<input type="text" value="" name="nama_panti"  class="form-control" required="required"> </div>
						</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Nomor Telepon</label>
												<div class="col-sm-8">
	<input type="text" class="form-control" name="telp"  value="" required="required" >
						 
												</div>
											</div>
											<div class="form-group">
									<label class="col-sm-2 control-label">Deskripsi Panti Asuhan</label>
									<div class="col-sm-8">
									<textarea  rows="5" name="desk"   class="form-control" required="required"></textarea>
									
												</div>
											</div>
<div class="form-group">
<label class="col-sm-3 control-label"><h4 style="color: green" align="left">Alamat Panti Asuhan </h4> </label>
</div>
									<div class="form-group">
									<label class="col-sm-2 control-label">Alamat</label>
									<div class="col-sm-8">
									<textarea  rows="5" name="alamat"   class="form-control" required="required"></textarea>
												</div>
											</div>
											<div class="form-group">
									<label class="col-sm-2 control-label">Kota</label>
									<div class="col-sm-8">
									<input type="text" class="form-control" name="kota"  value="Semarang" required="required" >
												</div>
											</div>
										
											<div class="form-group">
									<label class="col-sm-2 control-label">Kecamatan</label>
									<div class="col-sm-8">
									<input type="text" class="form-control" name="kec"  value="" required="required" >
												</div>
											</div>
											<div class="form-group">
									<label class="col-sm-2 control-label">Kode Pos</label>
									<div class="col-sm-2">
									<input type="text" class="form-control" name="kodepos"  value="" required="required" >
												</div>
											</div>
											

												<div class="col-sm-8 col-sm-offset-2">
													
													<input class="btn btn-primary" type="submit" name="submit" value="Tambah Panti">
												</div>
											</div>

										</form>

									</div>
								</div>
									
							
							</div>
						
									
							

							</div>
						</div>

					</div>
				</div> 	
				

			</div>
		</div>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

</script>
</body>

</html>