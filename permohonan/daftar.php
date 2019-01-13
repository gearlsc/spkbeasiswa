<?php
session_start();
ini_set( "display_errors", 0);
include "../config/koneksi.php";
$nim=$_POST[nim];
$password=$_POST[password];
$nama_mhs=$_POST[nama_mhs];
$rnim=mysql_num_rows(mysql_query("select * from user where nim='$nim'"));
if ($rnim > 0)
{
 echo "<script>alert('NIM sudah ada, mahasiswa dilarang mendaftar lebih dari satu kali '); window.location = 'index.php?hal=daftar&nim=$nim&password=$password'</script>";
}
elseif ( $nim == null or $password == null or $nama_mhs == null)
{
 echo "<script>alert('isi data dengan lengkap'); window.location = 'index.php?hal=daftar&nim=$nim&password=$password&nama_mhs=$nama_mhs'</script>";
}

else
{
mysql_query("insert into user (nim,password,nama_mhs)values('$nim','$password','$nama_mhs')"); 
header ('location:index.php?hal=suksesdaftar');
}
?>