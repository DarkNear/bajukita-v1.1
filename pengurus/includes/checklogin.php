<?php
function check_login()
{
if(strlen($_SESSION['id_pengurus'])==0 or empty ($_SESSION['id_pengurus']) or empty(['id_pengurus']))
	{		
		$extra="login.php";
		
		header("Location: https://bajukita-v1.000webhostapp.com/$extra");
	}
	
}
?>