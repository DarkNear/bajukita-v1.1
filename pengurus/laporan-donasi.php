<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if(isset($_GET['del']))
{
	$id=intval($_GET['del']);
	
	$adn="delete from donasi where id_donasi=?";
		$stmt= $mysqli->prepare($adn);
		$stmt->bind_param('i',$id);
        $stmt->execute();
        $stmt->close();	   
        echo "<script>alert('laporan dihapus');</script>" ;
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
	<title>Laporan Donasi</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
	 <link rel="stylesheet" href="css/Table-With-Search.css">
</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
			<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title" style="
    margin-top: 50px;">Laporan Donasi</h2>
						<div class="panel panel-default">
							<div class="panel-heading">Semua Donasi yang selesai</div>
							<div class="panel-body table-responsive table-bordered table table-hover table-bordered results">
							   
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>No.</th>
										
											<th>Jenis Pakaian</th>
											<th>Gender</th>
											<th>Ukuran Pakaian </th>

											<th>Batasan Umur  </th>
											<th>Jumlah </th>
											<th>Keretangan  </th>
											<th>Tanggal Dibuat </th>
											<th>Tanggal Selesai</th>
										
										</tr>
									</thead>
									
									<tbody>
<?php	
$ret="select * from laporan where id_pengurus=?";
$stmt= $mysqli->prepare($ret) ;
$stmt->bind_param('i',$_SESSION['id_pengurus']);
$stmt->execute() ;//ok
$res=$stmt->get_result();
$cnt=1;
while($row=$res->fetch_object())
	  {
	  	?> 
<tr><td><?php echo $cnt;;?></td>
<td><?php echo $row->Jenis_pakaian;?></td>
<td><?php echo $row->gender;?></td>
<td><?php echo $row->ukuran;?></td>
<td><?php echo $row->batasan_umur;?></td>
<td><?php echo $row->jumlah;?></td>
<td><?php echo $row->keterangan;?></td>
<td><?php echo $row->tgl_dibuat;?></td>
<td><?php echo $row->tgl_selesai;?></td>

										</tr>
									<?php
$cnt=$cnt+1;
									 } ?>
											
										
									</tbody>
								</table>

								
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
	<script src="js/Table-With-Search.js"></script>

</body>

</html>
