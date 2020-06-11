<?php

include('includes/config.php');
$idp=$_SESSION['id_pengurus'];
$result ="SELECT count(*) FROM pantiasuhan where id_pengurus='$idp'";
$stmt = $mysqli->prepare($result);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();
?>
<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
			
				<li class="ts-label">Main</li>
				<li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
					<li><a href=""><i class="fa fa-gift"></i> Donasi</a>
					<ul>
						<?php
					if($count==0)
{	?>
						<li><a href="tambah-panti.php">Tambah Donasi</a></li>
						<?php }
else {?>
<li><a href="tambah-donasi.php">Tambah Donasi</a></li><?php
}
?>
	
						<li><a href="kelola-donasi.php">Kelola Donasi</a></li>
					</ul>
				</li>
				<?php

if($count==0)
{	?>
<li><a href="tambah-panti.php"><i class="fa fa-home"></i>Panti Asuhan</a></li>
<?php }
else {?>

	<li><a href="panti-detail.php"><i class="fa fa-home"></i>Panti Asuhan</a></li>
	
	<?php
}
?>
					<li><a href="laporan-donasi.php"><i class="	fa fa-book"></i>Laporan Donasi</a></li>
				
				<li><a href="pengurus_update.php"><i class="fa fa-user"></i>Kelola Profil Pengurus</a></li>
			
		</nav>