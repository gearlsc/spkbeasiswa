<?php
session_start();
ini_set( "display_errors", 0);
include "../config/koneksi.php";

$on="Y";
$pengumuman="pengumuman";


mysql_query("update berita set headline='$on' where judul_seo='$pengumuman'"); 

echo "<script>alert('Pengumuman berhasil diaktifkan'); window.location = 'cont.php?hal=beasiswa'</script>"; 

?>