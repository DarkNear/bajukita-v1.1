<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if(isset($_GET['del']))
{
	$id=intval($_GET['del']);
	$ret="select * from donasi where id_donasi=?";
$stmts= $mysqli->prepare($ret) ;
$stmts->bind_param('i',$id);
$stmts->execute() ;//ok
$rev=$stmts->get_result();

while($row=$rev->fetch_object())
	  {
	      $idd=$row->id_donasi; 
	      $idps=$row->id_pengurus;
	      $jp=$row->Jenis_pakaian; 
	      $g=$row->gender;
	      $up=$row->ukuran_pakaian;
	      $bu=$row->batasan_umur;
	      $j=$row->jumlah;
	      $k=$row->keterangan;
	      $tgl=$row->tgl;
	      $idp=$row->id_panti;
	 $insert="INSERT INTO laporan (id_donasi, id_panti, id_pengurus, Jenis_pakaian, gender, ukuran, batasan_umur, jumlah, keterangan,  tgl_dibuat) VALUES (?,?,?,?,?,?,?,?,?,?)";
  $stmtins = $mysqli->prepare($insert);
  	$stmtins->bind_param('iiissssiss',$id,$idp,$idps,$jp,$g,$up,$bu,$j,$k,$tgl);
    $res=$stmtins->execute();
	  }
    if($res){
	$adn="delete from donasi where id_donasi=?";
		$stmt= $mysqli->prepare($adn);
		$stmt->bind_param('i',$id);
        $stmt->execute();
        $stmt->close();	   
        echo "<script>alert('Donasi Telah Selesai');</script>" ;
}}
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
	<title>Daftar Donasi</title>
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
    margin-top: 50px;">Donasi Pakaian</h2>
						<div class="panel panel-default">
							<div class="panel-heading">Semua Permintaan Donasi</div>
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
											<th>Tanggal </th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
										<th>No.</th>
										
										<th>Jenis Pakaian</th>
										<th>Gender</th>
										<th>Ukuran Pakaian </th>

										<th>Batasan Umur  </th>
										<th>Jumlah </th>
										<th>Keretangan  </th>
										<th>Tanggal </th>
										<th>Action</th>
										</tr>
									</tfoot>
									<tbody>
<?php	
$ret="select * from donasi where id_pengurus=?";
$stmt= $mysqli->prepare($ret) ;
$stmt->bind_param('i',$_SESSION['id_pengurus']);
$stmt->execute() ;//ok
$res=$stmt->get_result();
$cnt=1;
while($row=$res->fetch_object())
	  {$_SESSION['id_donasi']=$row->id_donasi;
	  	?> 
<tr><td><?php echo $cnt;;?></td>
<td><?php echo $row->Jenis_pakaian;?></td>
<td><?php echo $row->gender;?></td>
<td><?php echo $row->ukuran_pakaian;?></td>
<td><?php echo $row->batasan_umur;?></td>
<td><?php echo $row->jumlah;?></td>
<td><?php echo $row->keterangan;?></td>
<td><?php echo $row->tgl;?></td>
<td><a href="edit-donasi.php?id=<?php echo $row->id_donasi;?>" title="Edit Donasi"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
<a href="kelola-donasi.php?del=<?php echo $row->id_donasi;?>"  title="Donasi Sudah Selesai"><i class="fa fa-check"></i></a></td>
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
