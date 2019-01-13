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
$berkas1=$_POST[berkas1];
$ktm=$_POST[ktm];
$aktifkuliah=$_POST[aktifkuliah];
$transkrip=$_POST[transkrip];
$kk=$_POST[kk];
$ktp=$_POST[ktp];
$slipgaji=$_POST[slipgaji];
$pbb=$_POST[pbb];
$suratmiskin=$_POST[suratmiskin];
$pasfoto=$_POST[pasfoto];
$rnim=mysql_num_rows(mysql_query("select * from siswa where nim='$nim'"));
$rnama=mysql_num_rows(mysql_query("select * from siswa where nama_mhs='$nama_mhs'"));
if ($rnim > 0)
{
 echo "<script>alert('NIM sudah ada, mahasiswa dilarang mengajukan permohonan beasiswa yang sama lebih dari satu kali '); window.location = 'contmhs.php?hal=permohonan&nama_mhs=$nama_mhs&nim=$nim&tempat_ttl=$tempat_ttl&tanggal_ttl=$tanggal_ttl&jk=$jk&prodi=$prodi&ipk=$ipk&semester=$semester&no_hp_mhs=$no_hp_mhs&alamat_mhs=$alamat_mhs&jenis_tinggal=$jenis_tinggal&status_orangtua=$status_orangtua&jumlah_tanggungan=$jumlah_tanggungan&nama_orangtua=$nama_orangtua&alamat_orangtua=$alamat_orangtua&pekerjaan=$pekerjaan&penghasilan=$penghasilan&no_hp_orangtua=$no_hp_orangtua'</script>";
}
elseif ( $nama_mhs == null or $nim == null or $ipk == null or $prodi == null or $status_orangtua == null or $penghasilan == null or $ktm == null or $aktifkuliah == null or $transkrip == null or $kk == null or $ktp == null or $slipgaji == null or $suratmiskin == null or $pasfoto == null )
{
 echo "<script>alert('isi data dengan lengkap'); window.location = 'contmhs.php?hal=permohonan&nama_mhs=$nama_mhs&nim=$nim&tempat_ttl=$tempat_ttl&tanggal_ttl=$tanggal_ttl&jk=$jk&prodi=$prodi&ipk=$ipk&semester=$semester&no_hp_mhs=$no_hp_mhs&alamat_mhs=$alamat_mhs&jenis_tinggal=$jenis_tinggal&status_orangtua=$status_orangtua&jumlah_tanggungan=$jumlah_tanggungan&nama_orangtua=$nama_orangtua&alamat_orangtua=$alamat_orangtua&pekerjaan=$pekerjaan&penghasilan=$penghasilan&no_hp_orangtua=$no_hp_orangtua'</script>";
}

else
{
mysql_query("insert into siswa (nama_mhs,nim,tempat_ttl,tanggal_ttl,jk,prodi,ipk,semester,no_hp_mhs,alamat_mhs,jenis_tinggal,status_orangtua,jumlah_tanggungan,nama_orangtua,alamat_orangtua,pekerjaan,penghasilan,no_hp_orangtua,berkas1)values('$nama_mhs','$nim','$tempat_ttl','$tanggal_ttl','$jk','$prodi','$ipk','$semester','$no_hp_mhs','$alamat_mhs','$jenis_tinggal','$status_orangtua','$jumlah_tanggungan','$nama_orangtua','$alamat_orangtua','$pekerjaan','$penghasilan','$no_hp_orangtua','$berkas1')"); 

echo "<script>alert('Data berhasil didaftarkan '); window.location = 'contmhs.php?hal=home'</script>"; 
}
?>