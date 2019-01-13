<?php
ini_set( "display_errors", 0);
include "../config/koneksi.php";
$r=mysql_fetch_array(mysql_query("select * from bobot where selisih='$_GET[id]'"));

mysql_query("delete from bobot where selisih='$_GET[id]'");
echo "<script>alert('Bobot berhasil dihapus'); location = 'cont.php?hal=bobot';</script>";
//header ('location:cont.php?hal=kriteria');	

;	



?>