<?php
session_start();
include("pengurus/includes/config.php");
$mysql_hostname = "localhost";
$mysql_user = "id13902220_admin";
$mysql_password = "Barabere123!";
$mysql_database = "id13902220_bajukita";
$prefix = "";
$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysqli_select_db( $bd,$mysql_database) or die("Could not select database");
?>
<script language="javascript" type="text/javascript">
function goBack() {
  window.history.back();
}
function f3()
{
window.print(); 
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Donasi  Informasi</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="baju.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="100%" border="0">
<?php 
		 $ret= mysqli_query($bd,"SELECT * FROM donasi where id_donasi = '".$_GET['id']."'");
			while($row=mysqli_fetch_array($ret))
			{
			?>
			<tr>
			  <td colspan="2" align="center" class="font1">&nbsp;</td>
  </tr>
			<tr>
			  <td colspan="2" align="center" class="font1">DETAIL LAPORAN  DONASI BAJU KITA</td>
  </tr>
			
		
			<tr>
			  <td colspan="2"  class="font">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		      <div align="right">Tanggal Permintaan : <span class="comb-value"><?php echo $row['tgl'];?></span></div></td>
  </tr>	<tr>
			  <td colspan="2"  class="heading" style="color: red;">Informasi Donasi &raquo; </td>
  </tr><?php 
		 $ret1= mysqli_query($bd,"SELECT * FROM pantiasuhan where id_panti = '".$row['id_panti']."'");
			while($row1=mysqli_fetch_array($ret1))
			{
			?>
		
  
  
			<tr>
			  <td colspan="2"  class="font1"><table width="100%" border="0"><tr>
        <td colspan="2"  class="heading" style="color: red;">PANTI ASUHAN &raquo; </td>
  </tr>
                <tr>
                  <td width="32%" valign="top" class="heading">Nama Panti Asuhan :</td>
                  
                      <td class="comb-value1"><span class="comb-value"><?php echo $row1['nama_panti'];?></span></td>
                    </tr>
                  <tr>
                  <td width="22%" valign="top" class="heading">Telepon :</td>
                  
                      <td class="comb-value1"><span class="comb-value"><?php echo $row1['telp'];?></span></td>
                    </tr>
                  
                    <tr>
                    <td width="12%" valign="top" class="heading">Deskripsi: </td>
                      <td class="comb-value1"><?php echo $row1['deskripsi'];?></td>
                    </tr>
                    <tr>
        <td colspan="2"  class="heading" style="color: red;">Alamat Lengkap  &raquo; </td>
  </tr>
<tr>
<td width="12%" valign="top" class="heading">Alamat: </td>
<td class="comb-value1"><?php echo $row1['alamat'];?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">Kota: </td>
<td class="comb-value1"><?php echo $row1['kota'];?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">Kecamatan: </td>
<td class="comb-value1"><?php echo $row1['kecamatan'];?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">Kode POS: </td>
<td class="comb-value1"><?php echo $row1['kodepos'];?></td>
</tr>

                    <?php }?>
                    <?php 
		 $ret2= mysqli_query($bd,"SELECT * FROM pengurus where id_pengurus = '".$row['id_pengurus']."'");
			while($row2=mysqli_fetch_array($ret2))
			{ $nama=$row2['name'];
			$no=$row2['telp'];
			?>
  <tr>
   <td colspan="2" align="left"  class="heading" style="color: red;">Info Pengurus Panti &raquo; </td>
  </tr>
<tr>
<td width="12%" valign="top" class="heading">Nama Pengurus: </td>
<td class="comb-value1"><?php echo $row2['name'];?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">Email: </td>
<td class="comb-value1"><?php echo $row2['email'];?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">Telepon: </td>
<td class="comb-value1"><?php echo $row2['telp'];?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">Alamat: </td>
<td class="comb-value1"><?php echo $row2['alamat'];?></td>
</tr>


 <?php }?>
<tr>
        <td colspan="2"  class="heading" style="color: red;">Permintaan Donasi  &raquo; </td>
  </tr>
<tr>
<td width="12%" valign="top" class="heading">Jenis pakaian: </td>
<td class="comb-value1"><?php echo $row['Jenis_pakaian'];?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">Jenis Kelamin: </td>
<td class="comb-value1"><?php echo $row['gender'];?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">ukuran: </td>
<td class="comb-value1"><?php echo $row['ukuran_pakaian'];?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">Batasan Umur: </td>
<td class="comb-value1"><?php echo $row['batasan_umur'];?> TAHUN</td>
</tr>
<tr>
<td width="12%" valign="top" class="heading">Jumlah: </td>
<td class="comb-value1"><?php echo $row['jumlah'];?> BUAH</td>
</tr>
<tr>
<td width="12%" valign="top" class="heading">Keterangan: </td>
<td class="comb-value1"><?php echo $row['keterangan'];?> </td>
</tr>

 <?php 
		 $ret3= mysqli_query($bd,"SELECT * FROM pantiasuhan where id_panti = '".$row['id_panti']."'");
			while($row3=mysqli_fetch_array($ret3))
			{
			?>
			<tr>
        <td colspan="2"  class="heading" style="color: red;"> --------------------------------------------------------------------------------------------------------------------------</td>
  </tr>
 <tr>
        <td colspan="2"  class="heading" style="color: red;">Alamat Tujuan Donasi  &raquo; </td>
  </tr>
  <tr>
<td width="12%" valign="top" class="heading">Nama Penerima: </td>
<td class="comb-value1"><?php echo $nama;?></td>
</tr>
<tr>
<td width="12%" valign="top" class="heading">NO Telepon/HP: </td>
<td class="comb-value1"><?php echo $no;?></td>
</tr>
<tr>
<td width="12%" valign="top" class="heading">Alamat: </td>
<td class="comb-value1"><?php echo $row3['alamat'];?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">Kota: </td>
<td class="comb-value1"><?php echo $row3['kota'];?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">Kecamatan: </td>
<td class="comb-value1"><?php echo $row3['kecamatan'];?></td>
</tr>

<tr>
<td width="12%" valign="top" class="heading">Kode pos: </td>
<td class="comb-value1"><?php echo $row3['kodepos'];?></td>
</tr>
<tr>
        <td colspan="2"  class="heading" style="color: red;"> --------------------------------------------------------------------------------------------------------------------------</td>
  </tr>
         <?php } ?>   <?php } ?>       
                  </table></td>
                </tr>
               
					
                  </table></td>
                </tr>
              </table></td>
  </tr>
		
           
 
	 
    </table></td>
  </tr>

  
  <tr>
    <td colspan="2" align="right" ><form id="form1" name="form1" method="post" action="">
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="14%">&nbsp;</td>
          <td width="35%" class="comb-value"><label>
            <input name="Submit" type="submit" class="txtbox4" value="Print dokumen donasi " onClick="return f3();" />
          </lbl></td>
          <td width="3%">&nbsp;</td>
          <td width="26%">
           <label>
           <input type="button" class="button_active" value="Kembali " onclick="location.href='table.php';" />
          </label></td>
          <td width="8%">&nbsp;</td>
          <td width="14%">&nbsp;</td>
        </tr>
      </table>
        </form>    </td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</body>
</html>
