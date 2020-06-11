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

	<title>DashBoard</title>
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
<?php include("includes/header.php");?>
<?php	
$aid=$_SESSION['id_pengurus'];
	$ret="select * from pengurus where id_pengurus=?";
		$stmt= $mysqli->prepare($ret) ;
	 $stmt->bind_param('i',$aid);
	 $stmt->execute() ;//ok
	 $res=$stmt->get_result();
	 //$cnt=1;
	   while($row=$res->fetch_object())
	  {
	  	?>
	<div class="ts-main-content">
		<?php include("includes/sidebar.php");?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title" style="
    margin-top: 50px;" >Dashboard <?php echo $row->name;?></h2>


						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">

<?php
$idp=$_SESSION['id_pengurus'];
$result ="SELECT count(*) FROM donasi where id_pengurus='$idp'";
$stmt = $mysqli->prepare($result);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();
?>

													<div class="stat-panel-number h1 "><?php echo $count;?></div>
													<div class="stat-panel-title text-uppercase"> Permintaan Donasi</div>
												</div>
											</div>
											<a href="kelola-donasi.php" class="block-anchor panel-footer">lihat semua <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
										<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-danger text-light">
												<div class="stat-panel text-center">

<?php
$idp=$_SESSION['id_pengurus'];
$result ="SELECT count(*) FROM laporan where id_pengurus='$idp'";
$stmt = $mysqli->prepare($result);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();
?>

													<div class="stat-panel-number h1 "><?php echo $count;?></div>
													<div class="stat-panel-title text-uppercase"> Donasi Selesai</div>
												</div>
											</div>
											<a href="laporan-donasi.php" class="block-anchor panel-footer">lihat semua <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 ">MY PROFIL</div>
													<div class="stat-panel-title text-uppercase">pengurus panti </div>
												</div>
											</div>
											<a href="pengurus_update.php" class="block-anchor panel-footer text-center">lihat detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
												<div class="stat-panel-number h1 ">PANTI </div>
													<div class="stat-panel-title text-uppercase">ASUHAN </div>
												</div>
											</div>
											<?php

include('includes/config.php');
$idp=$_SESSION['id_pengurus'];
$result ="SELECT count(*) FROM pantiasuhan where id_pengurus='$idp'";
$stmt = $mysqli->prepare($result);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();
if($count==0)
{	?>
<a href="tambah-panti.php" class="block-anchor panel-footer text-center">lihat detail &nbsp; <i class="fa fa-arrow-right"></i></a>
<?php }
else {?>
<a href="panti-detail.php" class="block-anchor panel-footer text-center">lihat detail &nbsp; <i class="fa fa-arrow-right"></i></a>
	
	<?php
}
?>
<div class="col-sm-6 col-sm-offset-4">
													
													
											</div>
											
										</div>
									</div>
									
								</div>
							</div>
						</div>

						
<a href="logout.php"><input type="submit" name="" Value="Keluar" class="btn btn-danger"></a>



					</div>
				</div>

			</div>
		</div>
	</div>
	<?php }  ?>
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

	<script>

	window.onload = function(){

		// Line chart from swirlData for dashReport
		var ctx = document.getElementById("dashReport").getContext("2d");
		window.myLine = new Chart(ctx).Line(swirlData, {
			responsive: true,
			scaleShowVerticalLines: false,
			scaleBeginAtZero : true,
			multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
		});

		// Pie Chart from doughutData
		var doctx = document.getElementById("chart-area3").getContext("2d");
		window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});

		// Dougnut Chart from doughnutData
		var doctx = document.getElementById("chart-area4").getContext("2d");
		window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});

	}
	</script>

</body>



</html>
