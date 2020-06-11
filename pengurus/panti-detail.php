<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
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
	<title>Panti asuhan</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">


</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
			<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				
								
<?php	
$idp=$_SESSION['id_pengurus'];
	$ret="select * from pantiasuhan where id_pengurus=? ";
$stmt= $mysqli->prepare($ret) ;
$stmt->bind_param('i',$idp);
$stmt->execute() ;

$res=$stmt->get_result();

while($row=$res->fetch_object())
	  {
		  $_SESSION['id_panti']=$row->id_panti;
	  	?>
<div class="row">
					<div class="col-md-12">
						<h2 class="page-title" style="
    margin-top: 50px;">Profil <?php echo $row->nama_panti;?> </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading"><a  href="panti-update.php"><button  class="btn btn-black" >Ubah Data Panti</button></a>


</div>
									

<div class="panel-body">
<form  class="form-horizontal" >
								
								

<div class="form-group">
<label class="col-sm-2 control-label"> Nama Panti Asuhan: </label>
<div class="col-sm-8">
<label class=" control-label"><?php echo $row->nama_panti;?></label>
</div>
</div>




<div class="form-group">
<label class="col-sm-2 control-label">Nomor Telepon : </label>
<div class="col-sm-8">
<label class=" control-label"><?php echo $row->telp;?></label>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Alamat Panti : </label>
<div class="col-sm-8">
<label class=" control-label"><?php echo $row->alamat;?> Kota: <?php echo $row->kota;?>, Kec: <?php echo $row->kecamatan;?> Kode pos: <?php echo $row->kodepos;?></label>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Tentang Panti  : </label>
<div class="col-sm-8">
<label class=" control-label"><center><?php echo $row->deskripsi;?></center></label>
</div>
</div>

<?php } ?>

						








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
</div>
</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

</body>

</html>
