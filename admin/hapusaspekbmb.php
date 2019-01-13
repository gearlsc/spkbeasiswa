<?php
ini_set( "display_errors", 0);
include "../config/koneksi.php";
$a_bmb=mysql_query("select * from aspek_bmb order by id_aspek asc");
                  	$r_abmb=mysql_fetch_array($a_bmb);		
			     $r=mysql_fetch_array(mysql_query("select * from aspek_bmb where nama_aspek='$_GET[id]'"));

mysql_query("delete from aspek_bmb where nama_aspek='$_GET[id]'");
mysql_query("delete from kriteria_bmb where nama_aspek='$_GET[id]'");
echo "<script>alert('Aspek berhasil dihapus'); location = 'cont.php?hal=bmb';</script>";	

;	



?>