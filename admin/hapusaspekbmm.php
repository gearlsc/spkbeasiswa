<?php
ini_set( "display_errors", 0);
include "../config/koneksi.php";
$a_bmm=mysql_query("select * from aspek_bmm order by id_aspek asc");
                  	$r_abmm=mysql_fetch_array($a_bmm);		
			     $r=mysql_fetch_array(mysql_query("select * from aspek_bmm where nama_aspek='$_GET[id]'"));

mysql_query("delete from aspek_bmm where nama_aspek='$_GET[id]'");
mysql_query("delete from kriteria_bmm where nama_aspek='$_GET[id]'");
echo "<script>alert('Aspek berhasil dihapus'); location = 'cont.php?hal=bmm';</script>";	

;	



?>