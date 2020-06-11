<?php 
session_start();
$aid=$_SESSION['id_pengurus'];
require_once("includes/config.php");


if(!empty($_POST["oldpassword"])) 
{
$pass=$_POST["oldpassword"];
$result ="SELECT password FROM pengurus WHERE password=?";
$stmt = $mysqli->prepare($result);
$stmt->bind_param('s',$pass);
$stmt->execute();
$stmt -> bind_result($result);
$stmt -> fetch();
$opass=$result;
if($opass==$pass) 
echo "<span style='color:green'> Password  matched .</span>";
else echo "<span style='color:red'> Password Not matched</span>";
}
?>
