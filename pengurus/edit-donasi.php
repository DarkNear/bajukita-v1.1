<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if(isset($_POST['update']))
{
	$jenis=$_POST['jenis_pakaian'];
	$gender=$_POST['gender'];
	$ukuran=$_POST['ukuran'];
	$batasan=$_POST['batasan'];
	$jumlah=$_POST['jumlah'];
	$keterangan=$_POST['keterangan'];
	
$id=$_GET['id'];
$query="UPDATE donasi SET Jenis_pakaian =?, gender = ?, ukuran_pakaian = ?, batasan_umur =?, jumlah = ?, keterangan = ? WHERE donasi.id_donasi = ?";

$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('ssssisi',$jenis,$gender,$ukuran,$batasan,$jumlah, $keterangan,$id);
$stmt->execute();
echo"<script>alert('Donasi Panti Berhasil diubah');</script>";
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
	<title>Edit Donasi</title>
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
					
						<h2 class="page-title">Edit Permintaan Donasi </h2>
	
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Edit Donasi </div>
									<div class="panel-body">
										<form method="post" class="form-horizontal">
												<?php	
												$id=$_GET['id'];
	$ret="select * from donasi where id_donasi=?";
		$stmt= $mysqli->prepare($ret) ;
	 $stmt->bind_param('i',$id);
	 $stmt->execute() ;//ok
	 $res=$stmt->get_result();
	 //$cnt=1;
	   while($row=$res->fetch_object())
	  {
	  	?>
											
											<div class="hr-dashed"></div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Jenis Pakaian :</label>
												<div class="col-sm-8">
													<input type="text" value="<?php echo $row->Jenis_pakaian;?>" name="jenis_pakaian"  class="form-control" required="required"> </div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Jenis Kelamin</label>
												<div class="col-sm-8">
												<select name="gender"  class="form-control">
													<?php if(($row->gender)=='Laki-laki'){?>

														<option value="Laki-laki">Laki-laki</option>
<option value="Perempuan">Perempuan</option><?php } 
else{?><option value="Perempuan">Perempuan</option>
	<option value="Laki-laki">Laki-laki</option>
<?php }?>

</select>
												</div>
												</div>

												<div class="form-group">
												<label class="col-sm-2 control-label">Ukuran Pakaian </label>
												<div class="col-sm-2">
													<input type="text" value="<?php echo $row->ukuran_pakaian;?>" name="ukuran"  class="form-control" required="required"> </div>
													<span class="help-block m-b-none">
													Ukuran bisa berupa :S,M,L,XL atau berupa angka </span> 
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label">Batasan Umur</label>
												<div class="col-sm-8">
													<input type="text" value="<?php echo $row->batasan_umur;?>" name="batasan"  class="form-control" required="required"> </div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Jumlah Pakaian</label>
												<div class="col-sm-8">
													<input type="number" value="<?php echo $row->jumlah;?>" name="jumlah"  class="form-control" required="required"> </div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Keterangan</label>
												<div class="col-sm-8">
												<textarea  rows="5" name="keterangan"   class="form-control" required="required"><?php echo $row->keterangan;?></textarea>
	  <?php }?>	
											</div></div>
												<div class="col-sm-8 col-sm-offset-2">
													
													<input class="btn btn-primary" type="submit" name="update" value="Edit Donasi">
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