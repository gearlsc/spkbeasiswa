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
$ktm2=$_POST[ktm2];
$aktifkuliah2=$_POST[aktifkuliah2];
$transkrip2=$_POST[transkrip2];
$ktp2=$_POST[ktp2];
$aktiforganisasi=$_POST[aktiforganisasi];
$sertifikat=$_POST[sertifikat];
$pasfoto2=$_POST[pasfoto2];
$rnim=mysql_num_rows(mysql_query("select * from mahasiswa_bmb where nim='$nim'"));
$rnama=mysql_num_rows(mysql_query("select * from mahasiswa_bmb where nama_mhs='$nama_mhs'"));
if ($rnim > 0)
{
 echo "<script>alert('NIM sudah ada, mahasiswa dilarang mengisi permohonan lebih dari satu kali '); window.location = 'contmhs.php?hal=permohonan&nama_mhs=$nama_mhs&nim=$nim&tempat_ttl=$tempat_ttl&tanggal_ttl=$tanggal_ttl&jk=$jk&prodi=$prodi&ipk=$ipk&semester=$semester&no_hp_mhs=$no_hp_mhs&alamat_mhs=$alamat_mhs&organisasi=$organisasi&prestasi=$prestasi&nama_orangtua=$nama_orangtua&alamat_orangtua=$alamat_orangtua&pekerjaan=$pekerjaan&no_hp_orangtua=$no_hp_orangtua'</script>";
}
elseif ( $nama_mhs == null or $nim == null or $ipk == null or $prodi == null or $organisasi == null or $prestasi == null or $ktm2 == null or $aktifkuliah2 == null or $transkrip2 == null or $ktp2 == null or $aktiforganisasi == null or $sertifikat == null or $pasfoto2 == null )
{
 echo "<script>alert('isi data dengan lengkap'); window.location = 'contmhs.php?hal=permohonanbmb&nama_mhs=$nama_mhs&nim=$nim&tempat_ttl=$tempat_ttl&tanggal_ttl=$tanggal_ttl&jk=$jk&prodi=$prodi&ipk=$ipk&semester=$semester&no_hp_mhs=$no_hp_mhs&alamat_mhs=$alamat_mhs&organisasi=$organisasi&prestasi=$prestasi&nama_orangtua=$nama_orangtua&alamat_orangtua=$alamat_orangtua&pekerjaan=$pekerjaan&no_hp_orangtua=$no_hp_orangtua'</script>";
}

else
{
mysql_query("insert into mahasiswa_bmb (nama_mhs,nim,tempat_ttl,tanggal_ttl,jk,prodi,ipk,semester,no_hp_mhs,alamat_mhs,organisasi,prestasi,nama_orangtua,alamat_orangtua,pekerjaan,no_hp_orangtua)values('$nama_mhs','$nim','$tempat_ttl','$tanggal_ttl','$jk','$prodi','$ipk','$semester','$no_hp_mhs','$alamat_mhs','$organisasi','$prestasi','$nama_orangtua','$alamat_orangtua','$pekerjaan','$no_hp_orangtua')"); 

echo "<script>alert('Data berhasil didaftarkan '); window.location = 'contmhs.php?hal=home'</script>"; 
}
?>