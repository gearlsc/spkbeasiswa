<?php
ini_set( "display_errors", 0);
include "../config/koneksi.php";
$r=mysql_fetch_array(mysql_query("select * from kriteria_bmb where nama_kriteria='$_GET[id]'"));

mysql_query("delete from kriteria_bmb where nama_kriteria='$_GET[id]'");
echo "<script>alert('Kriteria berhasil dihapus'); location = 'cont.php?hal=aspekbmb';</script>";
//header ('location:cont.php?hal=kriteria');	

;	



?>