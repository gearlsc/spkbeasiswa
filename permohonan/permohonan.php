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
$jenis_tinggal=$_POST[jenis_tinggal];
$status_orangtua=$_POST[status_orangtua];
$jumlah_tanggungan=$_POST[jumlah_tanggungan];
$nama_orangtua=$_POST[nama_orangtua];
$alamat_orangtua=$_POST[alamat_orangtua];
$pekerjaan=$_POST[pekerjaan];
$penghasilan=$_POST[penghasilan];
$no_hp_orangtua=$_POST[no_hp_orangtua];
$rnisn=mysql_num_rows(mysql_query("select * from siswa where nim='$nim'"));
$rnama=mysql_num_rows(mysql_query("select * from siswa where nama_mhs='$nama_mhs'"));
if ($rnim > 0)
{
 echo "<script>alert('NIM sudah ada, mahasiswa dilarang mengisi permohonan lebih dari satu kali '); window.location = 'index.php?hal=permohonan&nama_mhs=$nama_mhs&nim=$nim&tempat_ttl=$tempat_ttl&tanggal_ttl=$tanggal_ttl&jk=$jk&prodi=$prodi&ipk=$ipk&semester=$semester&no_hp_mhs=$no_hp_mhs&alamat_mhs=$alamat_mhs&jenis_tinggal=$jenis_tinggal&status_orangtua=$status_orangtua&jumlah_tanggungan=$jumlah_tanggungan&nama_orangtua=$nama_orangtua&alamat_orangtua=$alamat_orangtua&pekerjaan=$pekerjaan&penghasilan=$penghasilan&no_hp_orangtua=$no_hp_orangtua'</script>";
}
elseif ($rnama > 0)
{
 echo "<script>alert('nama sudah ada, mahasiswa dilarang mengisi permohonan lebih dari satu kali '); window.location = 'index.php?hal=permohonannama_mhs=$nama_mhs&nim=$nim&tempat_ttl=$tempat_ttl&tanggal_ttl=$tanggal_ttl&jk=$jk&prodi=$prodi&ipk=$ipk&semester=$semester&no_hp_mhs=$no_hp_mhs&alamat_mhs=$alamat_mhs&jenis_tinggal=$jenis_tinggal&status_orangtua=$status_orangtua&jumlah_tanggungan=$jumlah_tanggungan&nama_orangtua=$nama_orangtua&alamat_orangtua=$alamat_orangtua&pekerjaan=$pekerjaan&penghasilan=$penghasilan&no_hp_orangtua=$no_hp_orangtua'</script>";
}
elseif ( $nama_mhs == null or $nim == null or $ipk == null or $prodi == null or $status_orangtua == null or $penghasilan == null  )
{
 echo "<script>alert('isi data dengan lengkap'); window.location = 'index.php?hal=permohonan&nama_mhs=$nama_mhs&nim=$nim&tempat_ttl=$tempat_ttl&tanggal_ttl=$tanggal_ttl&jk=$jk&prodi=$prodi&ipk=$ipk&semester=$semester&no_hp_mhs=$no_hp_mhs&alamat_mhs=$alamat_mhs&jenis_tinggal=$jenis_tinggal&status_orangtua=$status_orangtua&jumlah_tanggungan=$jumlah_tanggungan&nama_orangtua=$nama_orangtua&alamat_orangtua=$alamat_orangtua&pekerjaan=$pekerjaan&penghasilan=$penghasilan&no_hp_orangtua=$no_hp_orangtua'</script>";
}

else
{
mysql_query("insert into siswa (nama_mhs,nim,tempat_ttl,tanggal_ttl,jk,prodi,ipk,semester,no_hp_mhs,alamat_mhs,jenis_tinggal,status_orangtua,jumlah_tanggungan,nama_orangtua,alamat_orangtua,pekerjaan,penghasilan,no_hp_orangtua)values('$nama_mhs','$nim','$tempat_ttl','$tanggal_ttl','$jk','$prodi','$ipk','$semester','$no_hp_mhs','$alamat_mhs','$jenis_tinggal','$status_orangtua','$jumlah_tanggungan','$nama_orangtua','$alamat_orangtua','$pekerjaan','$penghasilan','$no_hp_orangtua')"); 
header ('location:index.php?hal=sukses');
}
?>