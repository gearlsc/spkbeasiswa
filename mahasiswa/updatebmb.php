<?php
session_start();
ini_set( "display_errors", 0);
include "../config/koneksi.php";
$nama_mhs=$_POST[nama_mhs];
$nim=$_POST[nim];
$tempat_ttl=$_POST[tempat_ttl];
$tanggal_ttl=$_POST[tanggal_ttl];
$jk=$_POST[jk];
$prodi=$_POST[prodi];
$ipk=$_POST[ipk];
$semester=$_POST[semester];
$no_hp_mhs=$_POST[no_hp_mhs];
$alamat_mhs=$_POST[alamat_mhs];
$organisasi=$_POST[organisasi];
$prestasi=$_POST[prestasi];
$nama_orangtua=$_POST[nama_orangtua];
$alamat_orangtua=$_POST[alamat_orangtua];
$pekerjaan=$_POST[pekerjaan];
$no_hp_orangtua=$_POST[no_hp_orangtua];
$rnim=mysql_num_rows(mysql_query("select * from mahasiswa_bmb where nim='$nim'"));
$rnama=mysql_num_rows(mysql_query("select * from mahasiswa_bmb where nama_mhs='$nama_mhs'"));
if ( $nama_mhs == null or $nim == null or $ipk == null or $prodi == null or $organisasi == null or $prestasi == null  )
{
 echo "<script>alert('isi data dengan lengkap'); window.location = 'index.php?hal=permohonan&nama_mhs=$nama_mhs&nim=$nim&tempat_ttl=$tempat_ttl&tanggal_ttl=$tanggal_ttl&jk=$jk&prodi=$prodi&ipk=$ipk&semester=$semester&no_hp_mhs=$no_hp_mhs&alamat_mhs=$alamat_mhs&organisasi=$organisasi&prestasi=$prestasi&nama_orangtua=$nama_orangtua&alamat_orangtua=$alamat_orangtua&pekerjaan=$pekerjaan&no_hp_orangtua=$no_hp_orangtua'</script>";
}

else
{
mysql_query("update mahasiswa_bmb set nama_mhs='$_POST[nama_mhs]', nim='$_POST[nim]', tempat_ttl='$_POST[tempat_ttl]', tanggal_ttl='$_POST[tanggal_ttl]', jk='$_POST[jk]', prodi='$_POST[prodi]', ipk='$_POST[ipk]', semester='$_POST[semester]', no_hp_mhs='$_POST[no_hp_mhs]', alamat_mhs='$_POST[alamat_mhs]', organisasi='$_POST[organisasi]', prestasi='$_POST[prestasi]', nama_orangtua='$_POST[nama_orangtua]', alamat_orangtua='$_POST[alamat_orangtua]', pekerjaan='$_POST[pekerjaan]', no_hp_orangtua='$_POST[no_hp_orangtua]' where nim='$_POST[nim]'"); 

echo "<script>alert('Data berhasil diupdate  '); window.location = 'contmhs.php?hal=home'</script>"; 

}
?>