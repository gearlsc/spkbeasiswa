<?php

session_start();
ini_set( "display_errors", 0);
if ($_SESSION[namauser])
{
include "../config/koneksi.php";
include "../config/seo.php";
               
				$ns=mysql_num_rows(mysql_query("select * from siswa where nim = '$_SESSION[namauser]'"));
				$ns2=mysql_num_rows(mysql_query("select * from mahasiswa_bmb where nim = '$_SESSION[namauser]'"));
				$j=mysql_fetch_array(mysql_query("select * from bobot"));
				$k=mysql_fetch_array(mysql_query("select * from kriteria"));

				  
$nama_kriteria=$_POST[nama_kriteria];
$factor=$_POST[factor];	
			   
	   
if ($_POST[perbaikan])
							   {
								
								mysql_query("update bobot set akademik_bmm='$_POST[akademik_bmm]', financial='$_POST[financial]'");   
								   
							   }
if ($_POST[perbaikan_kriteria])
							   {
								
								mysql_query("insert into kriteria_bmm(nama_kriteria,factor) values('$nama_kriteria','$factor')");   
								   
							   }
if ($_POST[berita])
							   {
								$judul_seo=seo_title($_POST[judul]);
								$isi_berita=$_POST[isi_berita];
								mysql_query("insert into berita (judul,judul_seo,isi_berita,headline) values ('$_POST[judul]','$judul_seo','$_POST[isi_berita]','N')");   
								 echo "<script>alert('berita berhasil ditambah  '); window.location = 'cont.php?hal=berita'</script>";
								 
							   }
if ($_POST[update])
							   {
								$judul_seo=seo_title($_POST[judul]);
								$isi_berita=$_POST[isi_berita];
								mysql_query("update berita set judul='$_POST[judul]', judul_seo='$judul_seo', isi_berita='$isi_berita' where id_berita='$_POST[id]'");   
								 echo "<script>alert('berita berhasil update  '); window.location = 'cont.php?hal=berita'</script>";
								 
							   }
if ($_POST[daftarbmm])
							   {
								echo "<script>alert('Isi Data berikut'); window.location = 'contmhs.php?hal=permohonan'</script>";
								 
							   }


?>

<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title>aplikasi pendukung keputusan penentuan penerima beasiswa di Politeknik Kesehatan Jambi </marque></title>
        <!-- Bootstrap -->
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="../vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="../assets/styles.css" rel="stylesheet" media="screen">
		<link href="../assets/DT_bootstrap.css" rel="stylesheet" media="screen">
		<script src="../tinymcpuk/jscripts/tiny_mce/tiny_mce.js" type="text/javascript"></script>
	    <script src="../tinymcpuk/jscripts/tiny_mce/tiny_travaweb.js" type="text/javascript"></script>
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#"><center>
                    Aplikasi Pendukung keputusan Penentuan Penerima Beasiswa di Politeknik Kesehatan Jambi
                    </center></a>
                    <div class="nav-collapse collapse">
                        
                        
						
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li >
                            <a href="?hal=home"><i class="icon-home"></i> Dashboard</a>
                        </li>
                       <li>
                            <a href="?hal=permohonan"><i class="icon-folder-open"></i> Permohonan BMM</a>
                        </li>
                        <li>
                            <a href="?hal=permohonanbmb"><i class="icon-folder-open"></i> Permohonan BMB</a>
                        </li>
                         
						 <?php 
							   $p=mysql_fetch_array(mysql_query("select * from berita where judul_seo='pengumuman'"));
							   if($p[headline]=="Y")
							   { ?>
								   <li>
                            <a href="?hal=penerima"><i class="icon-folder-open"></i> Daftar Penerima BMM</a>
                        </li>
                        <li>
                            <a href="?hal=penerimabmb"><i class="icon-folder-open"></i> Daftar Penerima BMB</a>
                        </li>
							   <?php
							   }
							   ?>
                        <!-- <li>
                            <a href="?hal=editprofile"><i class="icon-folder-open"></i> Edit Profile</a>
                        </li> -->
                       <li>
                            <a href="logout.php"><i class="icon-off"></i> Logout</a>
                        </li>
                    </ul>
                </div>
                
                <!--/span-->
                <div class="span9" id="content">
                <?php
				if ($_GET[hal] == 'home' )
				{
				
							 
				   
				?>	
						<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Statistics</div>
                                <div class="pull-right">

                                </div>
                            </div>
                            <div class="block-content collapse in">
                                 <div class="span6">
                                 
								 
                                    <div class="chart" data-percent="100">
									<?php 
									if ($ns > 0)
									{echo "Terdaftar";}
									else
									{echo "Belum Daftar";}
									?>
                                    </div>
                                    <div class="chart-bottom-heading"><span class="label label-info">Bantuan Mahasiswa Miskin</span>
                                    <p><p>
									<?php 
									if ($ns < 1)
									{echo " <a href='?hal=permohonan'>Daftar BMM Sekarang</a>";
									}
									else
									{ echo " <a href='?hal=lihatbmm'>Lihat Data Terdaftar</a>";
									}
									?>

                                    </div>
                                </div>
                              <div class="span6">
                                 
								 
                                    <div class="chart" data-percent="100">
									<?php 
									if ($ns2 > 0)
									{echo "Terdaftar";}
									else
									{echo "Belum Daftar";}
									?>
                                    </div>
                                    <div class="chart-bottom-heading"><span class="label label-info">Beasiswa Mahasiswa Berprestasi</span>
                                    <p><p>
									<?php 
									if ($ns2 < 1)
									{echo " <a href='?hal=permohonanbmb'>Daftar BMB Sekarang</a>";
									}
									else
									{ echo " <a href='?hal=lihatbmb'>Lihat Data Terdaftar</a>";
									}
									?>
                                    </div>
                                </div></div>
                               </div>
                               
                               <div class="block">
                            <div class="navbar navbar-inner block-header">
							<div class="muted">
  <div class="span6">
    <h5>BANTUAN MAHASISWA MISKIN</h5>
     
</div>
<div class="span6">
    <h5>BEASISWA MAHASISWA BERPRESTASI</h5>
  
</div>

                                </div>
                            </div>
                            <div class="block-content collapse in">
                                 <div class="span6">
                                 
								 
                                    <h4>Syarat-syarat untuk Permohonan Bantuan Mahasiswa Miskin:</h4>
<br>1) Scan Kartu Keluarga (KK) dan foto copy Elektronik Kartu Tanda Penduduk (E-KTP)
<br>2) Memiliki IPK minimal 2,75
<br>3) Scan Surat pernyataan tidak sedang menerima Beasiswa atau Bantuan Biaya Pendidikan dari Anggaran Pendapatan dan belanja Negara (APBN) atau Anggaran Pendapatan dan Belanja Daerah (APBD)
<br>4) Scan Kartu Mahasiswa
<br>5) Minimal berada di semester 3
<br>6) Scan Surat keterangan masih aktif kuliah dari kampus
<br>7) Scan Transkrip Nilai
<br>8) Scan rekening Bank atas nama Mahasiswa
<br>9) Foto warna ukuran 3 x 4 cm 2 lbr
<br>10) Scan Kartu Keluarga Sejahtera (KKS) jika ada
<br>11) Surat Keterangan Kurang Mampu dari Kepala Desa atau Lurah
<br>12) Scan pembayaran PBB
<br>13) Scan slip gaji orangtua



                                    </div>
                                
                              <div class="span6">
                                 
								 
                                    

<h4>Syarat-syarat untuk Permohonan Beasiswa Mahasiswa Berprestasi:</h4>

<br>1) Scan Kartu Keluarga (KK) dan foto copy Elektronik Kartu Tanda Penduduk (E-KTP)

<br>2) Memiliki IPK minimal 3.25

<br>3) Scan Surat pernyataan tidak sedang menerima Beasiswa atau Bantuan Biaya Pendidikan dari Anggaran Pendapatan dan belanja Negara (APBN) atau Anggaran Pendapatan dan Belanja Daerah (APBD)

<br>4) Scan Kartu Mahasiswa

<br>5) Minimal berada di semester 3

<br>6) Scan Surat keterangan masih aktif kuliah dari kampus

<br>7) Scan Transkrip Nilai

<br>8) Scan rekening Bank atas nama Mahasiswa

<br>9) Foto warna ukuran 3 x 4 cm 2 lbr

<br>10) Scan Kartu Keterangan Aktif Organisasi jika ada

<br>11) Scan Sertifikat Prestasi jika ada

                                    </div>
                                </div></div>
                               </div>
                               </div>
                <?php
				}
				
				
	if ($_GET[hal] == 'permohonan' )
	{ $login=mysql_query("SELECT * FROM user WHERE nim='$username'");
	echo " 
	
	
			<form method=post action=permohonan.php>
			<h2>Bantuan Mahasiswa Miskin</h2>
			<hr>
			<p>
			<p>
			<h3>DATA DIRI</h3>
			<hr>
			<table bgcolor=white><tbody><tr>
			<br>
			<td><label for='nama'><small>Nama lengkap</small></label></td>
			<td> :</td>
            <td><input type='text' name='nama_mhs' id='nama_mhs' value='$_SESSION[namalengkap]' size='50' /></td>
            </tr>
			
			<tr>
			<td><label for='nim'><small>Nomor Induk Mahasiswa</small></label></td>
			<td> :</td>
			<td><input type='text' name='nim' id='nim' value='$_SESSION[namauser]' size='25' readonly/></td>
            </tr>
			
			<tr>
			<td><label for='ttl'><small>Tempat, Tanggal Lahir</small></label></td>
			<td> :</td>
			<td><input type='text' name='tempat_ttl' id='tempat_ttl' value='$_GET[tempat_ttl]' size='15' /> <input type='date' name='tanggal_ttl' id='tanggal_ttl' value='$_GET[tanggal_ttl]' size='78' /></td>
            </tr>
			
			<tr>
			<td><label for='name'><small>Jenis Kelamin</small></label></td>
			<td> :</td>
			<td><select name='jk'  />
			<option value=''>Pilih Jenis Kelamin</option>
			<option value='Laki-Laki'>Laki-Laki</option>
			<option value='Perempuan'>Perempuan</option>
			</select></td>
            </tr>
			
			<tr>
			<td><label for='name'><small>Prodi</small></label></td>
			<td> :</td>
			<td><select name='prodi'  />
			<option value=''>Pilih Prodi</option>
			<option value='DIII Keperawatan'>DIII Keperawatan</option>
			<option value='DIII Kebidanan'>DIII Kebidanan</option>
			<option value='DIII Kesehatan Lingkungan'>DIII Kesehatan Lingkungan</option>
			<option value='DIII Keperawatan Gigi'>DIII Keperawatan Gigi</option>
			<option value='DIV Keperawatan'>DIV Keperawatan</option>
			<option value='DIV Kebidanan'>DIV Kebidanan</option>
			<option value='DIV Keperawatan Gigi'>DIV Keperawatan Gigi</option>
			</select></td>
            </tr>
			
			<tr>
            <td></td>
			<td> </td>
			<td>Upload Kartu Mahasiswa  : <input name='ktm' type='file' size='256'></td>
			</tr>
			
			<tr>
            <td></td>
			<td> </td>
			<td>Upload Surat Keterangan Aktif Kuliah  : <input name='aktifkuliah' type='file' size='256'></td>
			</tr>
			
			<tr>
			<td><label for='ipk'><small>IPK</small></label></td>
			<td> :</td>
            <td><input type='text' name='ipk' id='ipk' value='$_GET[ipk]' size='10' /></td>
			</tr>
			<tr>
			<td><label for='transkrip'><small></small></label></td>
			<td> </td>
			<td>Upload Transkrip Nilai :  <input name='transkrip' type='file' size='256'></td>
			</tr>
			
			<tr>
			<td><label for='semester'><small>Semester</small></label></td>
			<td> :</td>
			<td><input type='text' name='semester' id='semester' value='$_GET[semester]' size='5' /></td>
			</tr>
			
			<tr>
            <td><label for='no_hp_mhs'><small>No. HP</small></label></td>
			<td> :</td>
			<td><input type='text' name='no_hp_mhs' id='no_hp_mhs' value='$_GET[no_hp_mhs]' size='20' /></td>
			</tr>
			
			<tr>
            <td><label for='alamat_mhs'><small>Alamat</small></label></td>
			<td> :</td>
			<td><textarea name='alamat_mhs' id='alamat_mhs' value='$_GET[alamat_mhs]' size='50'></textarea></td>
			</tr>
			
			<tr>
            <td><label for='jenis_tinggal'><small>Jenis Tempat Tinggal</small></label></td>
			<td> :</td>
			<td><select name='jenis_tinggal'/>
			<option value=''>Pilih Jenis Tinggal</option>
			<option value='Orangtua'>Bersama Orangtua</option>
			<option value='Wali'>Bersama Wali</option>
			<option value='Kost'>Kost</option>
			<option value='Asrama'>Asrama</option>
			<option value='Panti'>Panti</option>
			</select></td>
            </tr>
			
			<tr>
            <td><label for='status_orangtua'><small>Status Orangtua</small></label></td>
			<td> :</td>
            <td><select name='status_orangtua'  />
			<option value=''>Pilih Status Orangtua</option>
			<option value='Lengkap'>Lengkap</option>
			<option value='Yatim atau Piatu'>Yatim atau Piatu</option>
			<option value='Yatim Piatu'>Yatim Piatu</option>
			</select></td>
            </tr>
			
			<tr>
            <td><label for='jumlah_tanggungan'><small>Jumlah Tanggungan Orangtua</small></label></td>
			<td> :</td>
			<td><input type='text' name='jumlah_tanggungan' id='jumlah_tanggungan' value='$_GET[jumlah_tanggungan]' size='5' /></td>
			</tr>
			
			<tr>
            <td></td>
			<td> </td>
			<td>Upload Kartu Keluarga  : <input name='kk' type='file' size='256'></td>
			</tr>
			
			<tr>
            <td></td>
			<td> </td>
			<td>Upload Kartu Tanda Penduduk  : <input name='ktp' type='file' size='256'></td>
			</tr>
			
			</tbody></table>
			
			
			<h3>DATA ORANGTUA</h3>
			<hr>
			<br>
			<table bgcolor=white>
			<tr>
            <td><label for='nama_orangtua'><small>Nama Orangtua/Wali</small></label></td>
			<td> :</td>
			<td><input type='text' name='nama_orangtua' id='nama_orangtua' value='$_GET[nama_orangtua]' size='50' /></td>
			</tr>
			
			<tr>
            <td><label for='alamat_orangtua'><small>Alamat</small></label></td>
			<td> :</td>

			<td><textarea name='alamat_orangtua' id='alamat_orangtua' value='$_GET[alamat_orangtua]' size='78'></textarea></td>
			</tr>
			
			<tr>
            <td><label for='pekerjaan'><small>Pekerjaan</small></label></td>
			<td> :</td>
			<td><input type='text' name='pekerjaan' id='pekerjaan' value='$_GET[pekerjaan]' size='25' /></td>
			</tr>
			
            <tr>
            <td><label for='penghasilan'><small>Penghasilan</small></label></td>
			<td> :</td>
			<td>Rp. <input type='text' name='penghasilan' id='penghasilan' value='$_GET[penghasilan]' size='20' /></td>
			</tr>
			
			<tr>
            <td></td>
			<td> </td>
			<td>Upload Slip Gaji  : <input name='slip' type='file' size='256'></td>
			</tr>
			
			<tr>
            <td></td>
			<td> </td>
			<td>Upload PBB  : <input name='pbb' type='file' size='256'></td>
			</tr>
			
			<tr>
            <td></td>
			<td> </td>
			<td>Upload Surat Pernyataan Kurang Mampu  : <input name='suratmiskin' type='file' size='256'></td>
			</tr>
			
			<tr>
            <td><label for='no_hp_orangtua'><small>No. HP</small></label></td>
			<td> :</td>
			<td><input type='text' name='no_hp_orangtua' id='no_hp_orangtua' value='$_GET[no_hp_orangtua]' size='20' /></td>
			</tr>
			
			<tr>
            <td></td>
			<td> </td>
			<td>Upload Pas Foto  : <input name='pasfoto' type='file' size='256'></td>
			</tr>
			
			
					
	      	<tr>
            <td></td>
			<td></td>
			<td><input name='permohonan' type='submit' id='submit' value='Daftar BMM' /></td>
			</tr>
			</table>
	      </form>
	
	
	
	";	
		  
	}
	
	if ($_GET[hal] == 'penerima' )
	{  $d=mysql_query("select * from siswa order by nim asc");
                    
				?>	
				<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><h5>Data siswa yang menerima Bantuan Mahasiswa Miskin</h5></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>NIM</th>
                                                <th>Program Studi</th>
                                                
                                            </tr>
                                        </thead>
                                        <?php
										$cl=warning;
										$sis=mysql_query("select * from siswa order by preferensi desc limit 15");
										while ($r=mysql_fetch_array($sis))
										{
									     if ($cl == 'success')
										 {
										  $cl=warning; 
										 }
										 elseif ($cl == 'warning')
										 {
										  $cl=success;  
										 }
										$no++;
										?>
                                            <tr class="<?php echo "$cl";?>">
                                                <td><?php echo" $r[nama_mhs]";?> </td>
                                                <td><?php echo" $r[nim]";?> </td>
                                                <td><?php echo" $r[prodi]";?> </td>
                                            </tr>
                                            <?php
										}
										?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
	<?php	  
	}
	if ($_GET[hal] == 'penerimabmb' )
	{  $d=mysql_query("select * from mahasiswa_bmb order by nim asc");
                    
				?>	
				<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><h5>Data siswa yang menerima Beasiswa Mahasiswa Berprestasi</h5></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>NIM</th>
                                                <th>Program Studi</th>
                                                
                                            </tr>
                                        </thead>
                                        <?php
										$cl=warning;
										$sis=mysql_query("select * from mahasiswa_bmb order by preferensi desc limit 15");
										while ($r=mysql_fetch_array($sis))
										{
									     if ($cl == 'success')
										 {
										  $cl=warning; 
										 }
										 elseif ($cl == 'warning')
										 {
										  $cl=success;  
										 }
										$no++;
										?>
                                            <tr class="<?php echo "$cl";?>">
                                                <td><?php echo" $r[nama_mhs]";?> </td>
                                                <td><?php echo" $r[nim]";?> </td>
                                                <td><?php echo" $r[prodi]";?> </td>
                                            </tr>
                                            <?php
										}
										?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
	<?php	  
	}
	
	if ($_GET[hal] == 'editbmm' )
	{ $login=mysql_query("SELECT * FROM user WHERE nim='$username'");
	$e=mysql_fetch_array(mysql_query("select * from siswa where nim='$_SESSION[namauser]'"));;
	echo " 
	
	
			<form method=post action=updatebmm.php>
			<h2>Bantuan Mahasiswa Miskin</h2>
			<hr>
			<p>
			<p>
			<h3>DATA DIRI</h3>
			<hr>
			<table bgcolor=white><tbody><tr>
			<br>
			<td><label for='nama'><small>Nama lengkap</small></label></td>
			<td> :</td>
            <td><input type='text' name='nama_mhs' id='nama_mhs' value='$e[nama_mhs]' size='50' /></td>
            </tr>
			
			<tr>
			<td><label for='nim'><small>Nomor Induk Mahasiswa</small></label></td>
			<td> :</td>
			<td><input type='text' name='nim' id='nim' value='$e[nim]' size='25' readonly/></td>
            </tr>
			
			<tr>
			<td><label for='ttl'><small>Tempat, Tanggal Lahir</small></label></td>
			<td> :</td>
			<td><input type='text' name='tempat_ttl' id='tempat_ttl' value='$e[tempat_ttl]' size='15' /> <input type='date' name='tanggal_ttl' id='tanggal_ttl' value='$e[tanggal_ttl]' size='78' /></td>
            </tr>
			
			<tr>
			<td><label for='name'><small>Jenis Kelamin</small></label></td>
			<td> :</td>
			<td> " ?>
			<?php 
			if ($e['jk'] == "Laki-Laki")
			{ echo "
			<select name='jk'  />
			<option value=''>Pilih Jenis Kelamin</option>
			<option value='Laki-Laki' selected>Laki-Laki</option>
			<option value='Perempuan'>Perempuan</option>
			</select>";}
			else { echo"
				<select name='jk'  />
			<option value=''>Pilih Jenis Kelamin</option>
			<option value='Laki-Laki'>Laki-Laki</option>
			<option value='Perempuan' selected>Perempuan</option>
			</select>";}?>
            <?php echo"
			</td>
            </tr>
			
			<tr>
			<td><label for='name'><small>Prodi</small></label></td>
			<td> :</td>
			<td>" ?>
			<?php 
			if ($e['prodi'] == "DIII Keperawatan")
			{ echo "
			<select name='prodi'  />
			<option value=''>Pilih Prodi</option>
			<option value='DIII Keperawatan' selected>DIII Keperawatan</option>
			<option value='DIII Kebidanan'>DIII Kebidanan</option>
			<option value='DIII Kesehatan Lingkungan'>DIII Kesehatan Lingkungan</option>
			<option value='DIII Keperawatan Gigi'>DIII Keperawatan Gigi</option>
			<option value='DIV Keperawatan'>DIV Keperawatan</option>
			<option value='DIV Kebidanan'>DIV Kebidanan</option>
			<option value='DIV Keperawatan Gigi'>DIV Keperawatan Gigi</option>
			</select>";}
			else if ($e['prodi'] == "DIII Kebidanan")
			{ echo"
				<select name='prodi'  />
			<option value=''>Pilih Prodi</option>
			<option value='DIII Keperawatan'>DIII Keperawatan</option>
			<option value='DIII Kebidanan' selected>DIII Kebidanan</option>
			<option value='DIII Kesehatan Lingkungan'>DIII Kesehatan Lingkungan</option>
			<option value='DIII Keperawatan Gigi'>DIII Keperawatan Gigi</option>
			<option value='DIV Keperawatan'>DIV Keperawatan</option>
			<option value='DIV Kebidanan'>DIV Kebidanan</option>
			<option value='DIV Keperawatan Gigi'>DIV Keperawatan Gigi</option>
			</select>";}
			else if ($e['prodi'] == "DIII Kesehatan Lingkungan")
			{ echo"
				<select name='prodi'  />
			<option value=''>Pilih Prodi</option>
			<option value='DIII Keperawatan'>DIII Keperawatan</option>
			<option value='DIII Kebidanan'>DIII Kebidanan</option>
			<option value='DIII Kesehatan Lingkungan' selected>DIII Kesehatan Lingkungan</option>
			<option value='DIII Keperawatan Gigi'>DIII Keperawatan Gigi</option>
			<option value='DIV Keperawatan'>DIV Keperawatan</option>
			<option value='DIV Kebidanan'>DIV Kebidanan</option>
			<option value='DIV Keperawatan Gigi'>DIV Keperawatan Gigi</option>
			</select>";}
			else if ($e['prodi'] == "DIII Keperawatan Gigi")
			{ echo"
				<select name='prodi'  />
			<option value=''>Pilih Prodi</option>
			<option value='DIII Keperawatan'>DIII Keperawatan</option>
			<option value='DIII Kebidanan'>DIII Kebidanan</option>
			<option value='DIII Kesehatan Lingkungan'>DIII Kesehatan Lingkungan</option>
			<option value='DIII Keperawatan Gigi' selected>DIII Keperawatan Gigi</option>
			<option value='DIV Keperawatan'>DIV Keperawatan</option>
			<option value='DIV Kebidanan'>DIV Kebidanan</option>
			<option value='DIV Keperawatan Gigi'>DIV Keperawatan Gigi</option>
			</select>";}
			else if ($e['prodi'] == "DIV Keperawatan")
			{ echo"
				<select name='prodi'  />
			<option value=''>Pilih Prodi</option>
			<option value='DIII Keperawatan'>DIII Keperawatan</option>
			<option value='DIII Kebidanan'>DIII Kebidanan</option>
			<option value='DIII Kesehatan Lingkungan'>DIII Kesehatan Lingkungan</option>
			<option value='DIII Keperawatan Gigi'>DIII Keperawatan Gigi</option>
			<option value='DIV Keperawatan' selected>DIV Keperawatan</option>
			<option value='DIV Kebidanan'>DIV Kebidanan</option>
			<option value='DIV Keperawatan Gigi'>DIV Keperawatan Gigi</option>
			</select>";}
			else if ($e['prodi'] == "DIV Kebidanan")
			{ echo"
				<select name='prodi'  />
			<option value=''>Pilih Prodi</option>
			<option value='DIII Keperawatan'>DIII Keperawatan</option>
			<option value='DIII Kebidanan'>DIII Kebidanan</option>
			<option value='DIII Kesehatan Lingkungan'>DIII Kesehatan Lingkungan</option>
			<option value='DIII Keperawatan Gigi'>DIII Keperawatan Gigi</option>
			<option value='DIV Keperawatan'>DIV Keperawatan</option>
			<option value='DIV Kebidanan' selected>DIV Kebidanan</option>
			<option value='DIV Keperawatan Gigi'>DIV Keperawatan Gigi</option>
			</select>";}
			else if ($e['prodi'] == "DIV Keperawatan Gigi")
			{ echo"
				<select name='prodi'  />
			<option value=''>Pilih Prodi</option>
			<option value='DIII Keperawatan'>DIII Keperawatan</option>
			<option value='DIII Kebidanan'>DIII Kebidanan</option>
			<option value='DIII Kesehatan Lingkungan'>DIII Kesehatan Lingkungan</option>
			<option value='DIII Keperawatan Gigi'>DIII Keperawatan Gigi</option>
			<option value='DIV Keperawatan'>DIV Keperawatan</option>
			<option value='DIV Kebidanan'>DIV Kebidanan</option>
			<option value='DIV Keperawatan Gigi' selected>DIV Keperawatan Gigi</option>
			</select>";}?>
            <?php echo"
			</td>
            </tr>
			
			<tr>
			<td><label for='ipk'><small>IPK</small></label></td>
			<td> :</td>
            <td><input type='text' name='ipk' id='ipk' value='$e[ipk]' size='10' /></td>
			</tr>
			
			<tr>
			<td><label for='semester'><small>Semester</small></label></td>
			<td> :</td>
			<td><input type='text' name='semester' id='semester' value='$e[semester]' size='5' /></td>
			</tr>
			
			<tr>
            <td><label for='no_hp_mhs'><small>No. HP</small></label></td>
			<td> :</td>
			<td><input type='text' name='no_hp_mhs' id='no_hp_mhs' value='$e[no_hp_mhs]' size='20' /></td>
			</tr>
			
			<tr>
            <td><label for='alamat_mhs'><small>Alamat</small></label></td>
			<td> :</td>
			<td><input type='text' name='alamat_mhs' id='alamat_mhs' value='$e[alamat_mhs]' size='20'/></td>
			</tr>
			
			<tr>
            <td><label for='jenis_tinggal'><small>Jenis Tempat Tinggal</small></label></td>
			<td> :</td>
			<td>" ?>
			<?php 
			if ($e['jenis_tinggal'] == "Orangtua")
			{ echo "
			<select name='jenis_tinggal'/>
			<option value=''>Pilih Jenis Tinggal</option>
			<option value='Orangtua' selected>Bersama Orangtua</option>
			<option value='Wali'>Bersama Wali</option>
			<option value='Kost'>Kost</option>
			<option value='Asrama'>Asrama</option>
			<option value='Panti'>Panti</option>
			</select>";}
			else if ($e['jenis_tinggal'] == "Wali")
			{ echo "
			<select name='jenis_tinggal'/>
			<option value=''>Pilih Jenis Tinggal</option>
			<option value='Orangtua'>Bersama Orangtua</option>
			<option value='Wali' selected>Bersama Wali</option>
			<option value='Kost'>Kost</option>
			<option value='Asrama'>Asrama</option>
			<option value='Panti'>Panti</option>
			</select>";}
			else if ($e['jenis_tinggal'] == "Kost")
			{ echo "
			<select name='jenis_tinggal'/>
			<option value=''>Pilih Jenis Tinggal</option>
			<option value='Orangtua'>Bersama Orangtua</option>
			<option value='Wali'>Bersama Wali</option>
			<option value='Kost' selected>Kost</option>
			<option value='Asrama'>Asrama</option>
			<option value='Panti'>Panti</option>
			</select>";}
			else if ($e['jenis_tinggal'] == "Asrama")
			{ echo "
			<select name='jenis_tinggal'/>
			<option value=''>Pilih Jenis Tinggal</option>
			<option value='Orangtua'>Bersama Orangtua</option>
			<option value='Wali'>Bersama Wali</option>
			<option value='Kost'>Kost</option>
			<option value='Asrama' selected>Asrama</option>
			<option value='Panti'>Panti</option>
			</select>";}
			else if ($e['jenis_tinggal'] == "Panti")
			{ echo "
			<select name='jenis_tinggal'/>
			<option value=''>Pilih Jenis Tinggal</option>
			<option value='Orangtua'>Bersama Orangtua</option>
			<option value='Wali'>Bersama Wali</option>
			<option value='Kost'>Kost</option>
			<option value='Asrama'>Asrama</option>
			<option value='Panti' selected>Panti</option>
			</select>";}?>
            <?php echo"
			</td>
            </tr>
			
			<tr>
            <td><label for='status_orangtua'><small>Status Orangtua</small></label></td>
			<td> :</td>
            <td>" ?>
			<?php 
			if ($e['status_orangtua'] == "Lengkap")
			{ echo "
			<select name='status_orangtua'  />
			<option value=''>Pilih Status Orangtua</option>
			<option value='Lengkap' selected>Lengkap</option>
			<option value='Yatim atau Piatu'>Yatim atau Piatu</option>
			<option value='Yatim Piatu'>Yatim Piatu</option>
			</select>";}
			else if ($e['status_orangtua'] == "Yatim atau Piatu")
			{ echo "
			<select name='status_orangtua'  />
			<option value=''>Pilih Status Orangtua</option>
			<option value='Lengkap'>Lengkap</option>
			<option value='Yatim atau Piatu' selected>Yatim atau Piatu</option>
			<option value='Yatim Piatu'>Yatim Piatu</option>
			</select>";}
			else if ($e['status_orangtua'] == "Yatim Piatu")
			{ echo "
			<select name='status_orangtua'  />
			<option value=''>Pilih Status Orangtua</option>
			<option value='Lengkap'>Lengkap</option>
			<option value='Yatim atau Piatu'>Yatim atau Piatu</option>
			<option value='Yatim Piatu' selected>Yatim Piatu</option>
			</select>";}
			?>
            <?php echo"
			</td>
            </tr>
			
			<tr>
            <td><label for='jumlah_tanggungan'><small>Jumlah Tanggungan Orangtua</small></label></td>
			<td> :</td>
			<td><input type='text' name='jumlah_tanggungan' id='jumlah_tanggungan' value='$e[jumlah_tanggungan]' size='5' /></td>
			</tr>
			<tr>
            <td><label for='berkas1'><small>Berkas</small></label></td>
			<td> :</td>
			<td><input name='berkas1' type='file' size='256' value='$f[berkas1]'></td>
			</tr>
			<tr><td>NB: Berkas dijadikan satu file rar<td></tr>
			</tbody></table>
			
			
			<h3>DATA ORANGTUA</h3>
			<hr>
			<br>
			<table bgcolor=white>
			<tr>
            <td><label for='nama_orangtua'><small>Nama Orangtua/Wali</small></label></td>
			<td> :</td>
			<td><input type='text' name='nama_orangtua' id='nama_orangtua' value='$e[nama_orangtua]' size='50' /></td>
			</tr>
			
			<tr>
            <td><label for='alamat_orangtua'><small>Alamat</small></label></td>
			<td> :</td>

			<td><input type='text' name='alamat_orangtua' id='alamat_orangtua' value='$e[alamat_orangtua]' size='78'/></td>
			</tr>
			
			<tr>
            <td><label for='pekerjaan'><small>Pekerjaan</small></label></td>
			<td> :</td>
			<td><input type='text' name='pekerjaan' id='pekerjaan' value='$e[pekerjaan]' size='25' /></td>
			</tr>
			
            <tr>
            <td><label for='penghasilan'><small>Penghasilan</small></label></td>
			<td> :</td>
			<td>Rp. <input type='text' name='penghasilan' id='penghasilan' value='$e[penghasilan]' size='20' /></td>
			</tr>
			
			<tr>
            <td><label for='no_hp_orangtua'><small>No. HP</small></label></td>
			<td> :</td>
			<td><input type='text' name='no_hp_orangtua' id='no_hp_orangtua' value='$e[no_hp_orangtua]' size='20' /></td>
			</tr>
					
	      	<tr>
            <td></td>
			<td></td>
			<td><input name='updatebmm' type='submit' id='submit' value='Update Data BMM' /></td>
			</tr>
			</table>
	      </form>
	
	
	
	";	
		  
	}
	if ($_GET[hal] == 'editprofile' )
	{ $login=mysql_query("SELECT * FROM user WHERE nim='$username'");
	
	echo " 
	
	
			<form method=post action=editprofile.php>
			
			<h3>DATA AKUN</h3>
			<hr>
			<table bgcolor=white><tbody><tr>
			<br>
			<td><label for='nama'><small>Username</small></label></td>
			<td> :</td>
            <td><input type='text' name='username' id='username' value='$_SESSION[namauser]' size='25' /></td>
            </tr>
			
			<tr>
			<td><label for='nim'><small>Password</small></label></td>
			<td> :</td>
			<td><input type='text' name='password' id='password' value='$_SESSION[passuser]' size='25' /></td>
            </tr>
			
			<td><label for='nama'><small>Nama lengkap</small></label></td>
			<td> :</td>
            <td><input type='text' name='nama_mhs' id='nama_mhs' value='$_SESSION[namalengkap]' size='50' /></td>
            </tr>
			
				
	      	<tr>
            <td></td>
			<td></td>
			<td><input name='updateakun' type='submit' id='submit' value='Update Data Akun' /></td>
			</tr>
			</table>
	      </form>
	
	
	
	";	
		  
	}
	
	
	if ($_GET[hal] == 'lihatbmm' )
	{ $login=mysql_query("SELECT * FROM user WHERE nim='$username'");
	$e=mysql_fetch_array(mysql_query("select * from siswa where nim='$_SESSION[namauser]'"));;
	?>
    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><h3>Bantuan Mahasiswa Miskin</h3></div>
                                <div class="muted pull-right"><p><p><input type="button" class="btn btn-success" value="Edit Data" onclick="window.location='contmhs.php?hal=editbmm'"/></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                <?php
	echo " 
	
	
			<form method=post action=updatebmm.php>
			<h4>DATA DIRI</h4>
			<hr>
			<table bgcolor=white><tbody><tr>
			<br>
			<td><label for='nama'>Nama Lengkap</label></td>
			<td> :</td>
            <td>$e[nama_mhs]</td>
            </tr>
			
			<tr>
			<td><label for='nim'>Nomor Induk Mahasiswa</label></td>
			<td> :</td>
			<td>$e[nim]</td>
            </tr>
			
			<tr>
			<td><label for='ttl'>Tempat, Tanggal Lahir</label></td>
			<td> :</td>
			<td>$e[tempat_ttl], $e[tanggal_ttl]</td>
            </tr>
			
			<tr>
			<td><label for='name'>Jenis Kelamin</label></td>
			<td> :</td>
			<td>$e[jk]</td>
            </tr>
			
			<tr>
			<td><label for='name'>Prodi</label></td>
			<td> :</td>
			<td>$e[prodi]</td>
            </tr>
			
			<tr>
			<td><label for='ipk'>IPK</label></td>
			<td> :</td>
            <td>$e[ipk]</td>
			</tr>
			
			<tr>
			<td><label for='semester'>Semester</label></td>
			<td> :</td>
			<td>$e[semester]</td>
			</tr>
			
			<tr>
            <td><label for='no_hp_mhs'>No. HP</label></td>
			<td> :</td>
			<td>$e[no_hp_mhs]</td>
			</tr>
			
			<tr>
            <td><label for='alamat_mhs'>Alamat</label></td>
			<td> :</td>
			<td>$e[alamat_mhs]</td>
			</tr>
			
			<tr>
            <td><label for='jenis_tinggal'>Jenis Tempat Tinggal</label></td>
			<td> :</td>
			<td>$e[jenis_tinggal]</td>
            </tr>
			
			<tr>
            <td><label for='status_orangtua'>Status Orangtua</label></td>
			<td> :</td>
            <td>$e[status_orangtua]</td>
            </tr>
			
			<tr>
            <td><label for='jumlah_tanggungan'>Jumlah Tanggungan Orangtua</label></td>
			<td> :</td>
			<td>$e[jumlah_tanggungan]</td>
			</tr>
			
			<tr>
            <td><label for='berkas1'><small>Berkas</small></label></td>
			<td> :</td>
			<td>$e[berkas1]</td>
			</tr>
			
			</tbody></table>
			
			<hr>
			<h4>DATA ORANGTUA</h4>
			<hr>
			<table bgcolor=white>
			<tr>
            <td><label for='nama_orangtua'>Nama Orangtua/Wali</label></td>
			<td> :</td>
			<td>$e[nama_orangtua]</td>
			</tr>
			
			<tr>
            <td><label for='alamat_orangtua'>Alamat</label></td>
			<td> :</td>
			<td>$e[alamat_orangtua]</td>
			</tr>
			
			<tr>
            <td><label for='pekerjaan'>Pekerjaan</label></td>
			<td> :</td>
			<td>$e[pekerjaan]</td>
			</tr>
			
            <tr>
            <td><label for='penghasilan'>Penghasilan</label></td>
			<td> :</td>
			<td>Rp. $e[penghasilan]</td>
			</tr>
			
			<tr>
            <td><label for='no_hp_orangtua'>No. HP</label></td>
			<td> :</td>
			<td>$e[no_hp_orangtua]</td>
			</tr>
			
			
			</table>
	      </form>
			
	
	
	";	?> </div></div></div></div>
	<?php	  
	}
	
	if ($_GET[hal] == 'permohonanbmb' )
	{
	echo " 
	
	
			<form method=post action=permohonanbmb.php>
			<h2>Beasiswa Mahasiswa Berprestasi</h2>
			<hr>
			<p>
			<p>
			<h3>DATA DIRI</h3>
			<hr>
			<table bgcolor=white><tbody><tr>
			<br>
			<td><label for='nama'><small>Nama lengkap</small></label></td>
			<td> :</td>
            <td><input type='text' name='nama_mhs' id='nama_mhs' value='$_SESSION[namalengkap]' size='50' /></td>
            </tr>
			
			<tr>
			<td><label for='nim'><small>Nomor Induk Mahasiswa</small></label></td>
			<td> :</td>
			<td><input type='text' name='nim' id='nim' value='$_SESSION[namauser]' size='25' readonly/></td>
            </tr>
			
			<tr>
			<td><label for='ttl'><small>Tempat, Tanggal Lahir</small></label></td>
			<td> :</td>
			<td><input type='text' name='tempat_ttl' id='tempat_ttl' value='$_GET[tempat_ttl]' size='15' /> <input type='date' name='tanggal_ttl' id='tanggal_ttl' value='$_GET[tanggal_ttl]' size='78' /></td>
            </tr>
			
			<tr>
			<td><label for='name'><small>Jenis Kelamin</small></label></td>
			<td> :</td>
			<td><select name='jk'  />
			<option value=''>Pilih Jenis Kelamin</option>
			<option value='Laki-Laki'>Laki-Laki</option>
			<option value='Perempuan'>Perempuan</option>
			</select></td>
            </tr>
			
			<tr>
			<td><label for='name'><small>Prodi</small></label></td>
			<td> :</td>
			<td><select name='prodi'  />
			<option value=''>Pilih Prodi</option>
			<option value='DIII Keperawatan'>DIII Keperawatan</option>
			<option value='DIII Kebidanan'>DIII Kebidanan</option>
			<option value='DIII Kesehatan Lingkungan'>DIII Kesehatan Lingkungan</option>
			<option value='DIII Keperawatan Gigi'>DIII Keperawatan Gigi</option>
			<option value='DIV Keperawatan'>DIV Keperawatan</option>
			<option value='DIV Kebidanan'>DIV Kebidanan</option>
			<option value='DIV Keperawatan Gigi'>DIV Keperawatan Gigi</option>
			</select></td>
            </tr>
			
			<tr>
            <td></td>
			<td> </td>
			<td>Upload Kartu Mahasiswa  : <input name='ktm2' type='file' size='256'></td>
			</tr>
			
			<tr>
            <td></td>
			<td> </td>
			<td>Upload Surat Keterangan Aktif Kuliah  : <input name='aktifkuliah2' type='file' size='256'></td>
			</tr>
			
			<tr>
			<td><label for='ipk'><small>IPK</small></label></td>
			<td> :</td>
            <td><input type='text' name='ipk' id='ipk' value='$_GET[ipk]' size='10' /></td>
			</tr>
			
			<tr>
            <td></td>
			<td> </td>
			<td>Upload Transkrip Nilai  : <input name='transkrip2' type='file' size='256'></td>
			</tr>
			
			<tr>
			<td><label for='semester'><small>Semester</small></label></td>
			<td> :</td>
			<td><input type='text' name='semester' id='semester' value='$_GET[semester]' size='5' /></td>
			</tr>
			
			<tr>
            <td><label for='no_hp_mhs'><small>No. HP</small></label></td>
			<td> :</td>
			<td><input type='text' name='no_hp_mhs' id='no_hp_mhs' value='$_GET[no_hp_mhs]' size='20' /></td>
			</tr>
			
			<tr>
            <td><label for='alamat_mhs'><small>Alamat</small></label></td>
			<td> :</td>
			<td><textarea name='alamat_mhs' id='alamat_mhs' value='$_GET[alamat_mhs]' size='50'></textarea></td>
			</tr>
			
			<tr>
            <td></td>
			<td> </td>
			<td>Upload Kartu Tanda Penduduk  : <input name='ktp2' type='file' size='256'></td>
			</tr>
			
			<tr>
            <td><label for='organisasi'><small>Keaktifan Organisasi</small></label></td>
			<td> :</td>
			<td><select name='organisasi'/>
			<option value=''>Pilih Keaktifan</option>
			<option value='Aktif'>Aktif</option>
			<option value='Tidak Aktif'>Tidak Aktif</option>
			</select></td>
            </tr>
			
			<tr>
            <td></td>
			<td> </td>
			<td>Upload Surat Keterangan Aktif Organisasi  : <input name='aktiforganisasi' type='file' size='256'></td>
			</tr>
			
			<tr>
            <td><label for='prestasi'><small>Prestasi Non Akademik</small></label></td>
			<td> :</td>
            <td><select name='prestasi'  />
			<option value=''>Pilih Status Prestasi</option>
			<option value='Ada'>Ada</option>
			<option value='Tidak Ada'>Tidak Ada</option>
			</select></td>
            </tr>
			
			<tr>
            <td></td>
			<td> </td>
			<td>Upload Sertifikat Prestasi  : <input name='setifikats' type='file' size='256'></td>
			</tr>
			
			
			</tbody></table>
			
			
			<h3>DATA ORANGTUA</h3>
			<hr>
			<br>
			<table bgcolor=white>
			<tr>
            <td><label for='nama_orangtua'><small>Nama Orangtua/Wali</small></label></td>
			<td> :</td>
			<td><input type='text' name='nama_orangtua' id='nama_orangtua' value='$_GET[nama_orangtua]' size='50' /></td>
			</tr>
			
			<tr>
            <td><label for='alamat_orangtua'><small>Alamat</small></label></td>
			<td> :</td>

			<td><textarea name='alamat_orangtua' id='alamat_orangtua' value='$_GET[alamat_orangtua]' size='78'></textarea></td>
			</tr>
			
			<tr>
            <td><label for='pekerjaan'><small>Pekerjaan</small></label></td>
			<td> :</td>
			<td><input type='text' name='pekerjaan' id='pekerjaan' value='$_GET[pekerjaan]' size='25' /></td>
			</tr>
			
            <tr>
            <td><label for='no_hp_orangtua'><small>No. HP</small></label></td>
			<td> :</td>
			<td><input type='text' name='no_hp_orangtua' id='no_hp_orangtua' value='$_GET[no_hp_orangtua]' size='20' /></td>
			</tr>
			<tr>
            <td></td>
			<td> </td>
			<td>Upload Pas Foto  : <input name='pasfoto2' type='file' size='256'></td>
			</tr>
					
	      	<tr>
            <td></td>
			<td></td>
			<td><input name='permohonanbmb' type='submit' id='submit' value='Daftar BMB' /></td>
			</tr>
			</table>
	      </form>
	
	
	
	";	
		  
	}
	
	if ($_GET[hal] == 'editbmb' )
	{$f=mysql_fetch_array(mysql_query("select * from mahasiswa_bmb where nim='$_SESSION[namauser]'"));;
	echo " 
	
	
			<form method=post action=updatebmb.php>
			<h2>Beasiswa Mahasiswa Berprestasi</h2>
			<hr>
			<p>
			<p>
			<h3>DATA DIRI</h3>
			<hr>
			<table bgcolor=white><tbody><tr>
			<br>
			<td><label for='nama'><small>Nama lengkap</small></label></td>
			<td> :</td>
            <td><input type='text' name='nama_mhs' id='nama_mhs' value='$f[nama_mhs]' size='50' /></td>
            </tr>
			
			<tr>
			<td><label for='nim'><small>Nomor Induk Mahasiswa</small></label></td>
			<td> :</td>
			<td><input type='text' name='nim' id='nim' value='$f[nim]' size='25' readonly/></td>
            </tr>
			
			<tr>
			<td><label for='ttl'><small>Tempat, Tanggal Lahir</small></label></td>
			<td> :</td>
			<td><input type='text' name='tempat_ttl' id='tempat_ttl' value='$f[tempat_ttl]' size='15' /> <input type='date' name='tanggal_ttl' id='tanggal_ttl' value='$f[tanggal_ttl]' size='78' /></td>
            </tr>
			
			<tr>
			<td><label for='name'><small>Jenis Kelamin</small></label></td>
			<td> :</td>
			<td>" ?>
			<?php 
			if ($f['jk'] == "Laki-Laki")
			{ echo "
			<select name='jk'  />
			<option value=''>Pilih Jenis Kelamin</option>
			<option value='Laki-Laki' selected>Laki-Laki</option>
			<option value='Perempuan'>Perempuan</option>
			</select>";}
			else { echo"
				<select name='jk'  />
			<option value=''>Pilih Jenis Kelamin</option>
			<option value='Laki-Laki'>Laki-Laki</option>
			<option value='Perempuan' selected>Perempuan</option>
			</select>";}?>
            <?php echo"</td>
            </tr>
			
			<tr>
			<td><label for='name'><small>Prodi</small></label></td>
			<td> :</td>
			<td>" ?>
			<?php 
			if ($f['prodi'] == "DIII Keperawatan")
			{ echo "
			<select name='prodi'  />
			<option value=''>Pilih Prodi</option>
			<option value='DIII Keperawatan' selected>DIII Keperawatan</option>
			<option value='DIII Kebidanan'>DIII Kebidanan</option>
			<option value='DIII Kesehatan Lingkungan'>DIII Kesehatan Lingkungan</option>
			<option value='DIII Keperawatan Gigi'>DIII Keperawatan Gigi</option>
			<option value='DIV Keperawatan'>DIV Keperawatan</option>
			<option value='DIV Kebidanan'>DIV Kebidanan</option>
			<option value='DIV Keperawatan Gigi'>DIV Keperawatan Gigi</option>
			</select>";}
			else if ($f['prodi'] == "DIII Kebidanan")
			{ echo"
				<select name='prodi'  />
			<option value=''>Pilih Prodi</option>
			<option value='DIII Keperawatan'>DIII Keperawatan</option>
			<option value='DIII Kebidanan' selected>DIII Kebidanan</option>
			<option value='DIII Kesehatan Lingkungan'>DIII Kesehatan Lingkungan</option>
			<option value='DIII Keperawatan Gigi'>DIII Keperawatan Gigi</option>
			<option value='DIV Keperawatan'>DIV Keperawatan</option>
			<option value='DIV Kebidanan'>DIV Kebidanan</option>
			<option value='DIV Keperawatan Gigi'>DIV Keperawatan Gigi</option>
			</select>";}
			else if ($f['prodi'] == "DIII Kesehatan Lingkungan")
			{ echo"
				<select name='prodi'  />
			<option value=''>Pilih Prodi</option>
			<option value='DIII Keperawatan'>DIII Keperawatan</option>
			<option value='DIII Kebidanan'>DIII Kebidanan</option>
			<option value='DIII Kesehatan Lingkungan' selected>DIII Kesehatan Lingkungan</option>
			<option value='DIII Keperawatan Gigi'>DIII Keperawatan Gigi</option>
			<option value='DIV Keperawatan'>DIV Keperawatan</option>
			<option value='DIV Kebidanan'>DIV Kebidanan</option>
			<option value='DIV Keperawatan Gigi'>DIV Keperawatan Gigi</option>
			</select>";}
			else if ($f['prodi'] == "DIII Keperawatan Gigi")
			{ echo"
				<select name='prodi'  />
			<option value=''>Pilih Prodi</option>
			<option value='DIII Keperawatan'>DIII Keperawatan</option>
			<option value='DIII Kebidanan'>DIII Kebidanan</option>
			<option value='DIII Kesehatan Lingkungan'>DIII Kesehatan Lingkungan</option>
			<option value='DIII Keperawatan Gigi' selected>DIII Keperawatan Gigi</option>
			<option value='DIV Keperawatan'>DIV Keperawatan</option>
			<option value='DIV Kebidanan'>DIV Kebidanan</option>
			<option value='DIV Keperawatan Gigi'>DIV Keperawatan Gigi</option>
			</select>";}
			else if ($f['prodi'] == "DIV Keperawatan")
			{ echo"
				<select name='prodi'  />
			<option value=''>Pilih Prodi</option>
			<option value='DIII Keperawatan'>DIII Keperawatan</option>
			<option value='DIII Kebidanan'>DIII Kebidanan</option>
			<option value='DIII Kesehatan Lingkungan'>DIII Kesehatan Lingkungan</option>
			<option value='DIII Keperawatan Gigi'>DIII Keperawatan Gigi</option>
			<option value='DIV Keperawatan' selected>DIV Keperawatan</option>
			<option value='DIV Kebidanan'>DIV Kebidanan</option>
			<option value='DIV Keperawatan Gigi'>DIV Keperawatan Gigi</option>
			</select>";}
			else if ($f['prodi'] == "DIV Kebidanan")
			{ echo"
				<select name='prodi'  />
			<option value=''>Pilih Prodi</option>
			<option value='DIII Keperawatan'>DIII Keperawatan</option>
			<option value='DIII Kebidanan'>DIII Kebidanan</option>
			<option value='DIII Kesehatan Lingkungan'>DIII Kesehatan Lingkungan</option>
			<option value='DIII Keperawatan Gigi'>DIII Keperawatan Gigi</option>
			<option value='DIV Keperawatan'>DIV Keperawatan</option>
			<option value='DIV Kebidanan' selected>DIV Kebidanan</option>
			<option value='DIV Keperawatan Gigi'>DIV Keperawatan Gigi</option>
			</select>";}
			else if ($f['prodi'] == "DIV Keperawatan Gigi")
			{ echo"
				<select name='prodi'  />
			<option value=''>Pilih Prodi</option>
			<option value='DIII Keperawatan'>DIII Keperawatan</option>
			<option value='DIII Kebidanan'>DIII Kebidanan</option>
			<option value='DIII Kesehatan Lingkungan'>DIII Kesehatan Lingkungan</option>
			<option value='DIII Keperawatan Gigi'>DIII Keperawatan Gigi</option>
			<option value='DIV Keperawatan'>DIV Keperawatan</option>
			<option value='DIV Kebidanan'>DIV Kebidanan</option>
			<option value='DIV Keperawatan Gigi' selected>DIV Keperawatan Gigi</option>
			</select>";}?>
            <?php echo"</td>
            </tr>
			
			<tr>
			<td><label for='ipk'><small>IPK</small></label></td>
			<td> :</td>
            <td><input type='text' name='ipk' id='ipk' value='$f[ipk]' size='10' /></td>
			</tr>
			
			<tr>
			<td><label for='semester'><small>Semester</small></label></td>
			<td> :</td>
			<td><input type='text' name='semester' id='semester' value='$f[semester]' size='5' /></td>
			</tr>
			
			<tr>
            <td><label for='no_hp_mhs'><small>No. HP</small></label></td>
			<td> :</td>
			<td><input type='text' name='no_hp_mhs' id='no_hp_mhs' value='$f[no_hp_mhs]' size='20' /></td>
			</tr>
			
			<tr>
            <td><label for='alamat_mhs'><small>Alamat</small></label></td>
			<td> :</td>
			<td><input type='text' name='alamat_mhs' id='alamat_mhs' value='$f[alamat_mhs]' size='50'/></td>
			</tr>
			
			<tr>
            <td><label for='organisasi'><small>Keaktifan Organisasi</small></label></td>
			<td> :</td>
			<td> " ?>
			<?php 
			if ($f['organisasi'] == "Aktif")
			{ echo "
			<select name='organisasi'/>
			<option value=''>Pilih Keaktifan</option>
			<option value='Aktif' selected>Aktif</option>
			<option value='Tidak Aktif'>Tidak Aktif</option>
			</select>";}
			else { echo"
				<select name='organisasi'/>
			<option value=''>Pilih Keaktifan</option>
			<option value='Aktif'>Aktif</option>
			<option value='Tidak Aktif' selected>Tidak Aktif</option>
			</select>";}?>
            <?php echo"
			</td>
            </tr>
			
			<tr>
            <td><label for='prestasi'><small>Prestasi Non Akademik</small></label></td>
			<td> :</td>
            <td>" ?>
			<?php 
			if ($f['prestasi'] == "Ada")
			{ echo "
			<select name='prestasi'  />
			<option value=''>Pilih Status Prestasi</option>
			<option value='Ada' selected>Ada</option>
			<option value='Tidak Ada'>Tidak Ada</option>
			</select>";}
			else { echo"
				<select name='prestasi'  />
			<option value=''>Pilih Status Prestasi</option>
			<option value='Ada'>Ada</option>
			<option value='Tidak Ada' selected>Tidak Ada</option>
			</select>";}?>
            <?php echo"</td>
            </tr>
			<tr>
            <td><label for='berkas1'><small>Berkas</small></label></td>
			<td> :</td>
			<td><input name='berkas1' type='file' size='256' value='$f[berkas1]'></td>
			</tr>
			<tr><td>NB: Berkas dijadikan satu file rar<td></tr>
			
			</tbody></table>
			
			
			<h3>DATA ORANGTUA</h3>
			<hr>
			<br>
			<table bgcolor=white>
			<tr>
            <td><label for='nama_orangtua'><small>Nama Orangtua/Wali</small></label></td>
			<td> :</td>
			<td><input type='text' name='nama_orangtua' id='nama_orangtua' value='$f[nama_orangtua]' size='50' /></td>
			</tr>
			
			<tr>
            <td><label for='alamat_orangtua'><small>Alamat</small></label></td>
			<td> :</td>

			<td><input type='text' name='alamat_orangtua' id='alamat_orangtua' value='$f[alamat_orangtua]' size='78'/></td>
			</tr>

			
			<tr>
            <td><label for='pekerjaan'><small>Pekerjaan</small></label></td>
			<td> :</td>
			<td><input type='text' name='pekerjaan' id='pekerjaan' value='$f[pekerjaan]' size='25' /></td>
			</tr>
			
            <tr>
            <td><label for='no_hp_orangtua'><small>No. HP</small></label></td>
			<td> :</td>
			<td><input type='text' name='no_hp_orangtua' id='no_hp_orangtua' value='$f[no_hp_orangtua]' size='20' /></td>
			</tr>
					
	      	<tr>
            <td></td>
			<td></td>
			<td><input name='updatebmb' type='submit' id='submit' value='Update Data BMB' /></td>
			</tr>
			</table>
	      </form>
	
	
	
	";	
		  
	}
	
	
	if ($_GET[hal] == 'lihatbmb' )
	{$f=mysql_fetch_array(mysql_query("select * from mahasiswa_bmb where nim='$_SESSION[namauser]'"));;
	?>
    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><h3>Beasiswa Mahasiswa Berprestasi</h3></div>
                                <div class="muted pull-right"><p><p><input type="button" class="btn btn-success" value="Edit Data" onclick="window.location='contmhs.php?hal=editbmb'"/></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                <?php
	echo " 
	
	
			<form method=post action=updatebmb.php>
			<h4>DATA DIRI</h4>
			<hr>
			<table bgcolor=white><tbody><tr>
			<br>
			<td><label for='nama'>Nama lengkap</label></td>
			<td> :</td>
            <td>$f[nama_mhs]</td>
            </tr>
			
			<tr>
			<td><label for='nim'>Nomor Induk Mahasiswa</label></td>
			<td> :</td>
			<td>$f[nim]</td>
            </tr>
			
			<tr>
			<td><label for='ttl'>Tempat, Tanggal Lahir</label></td>
			<td> :</td>
			<td>$f[tempat_ttl], $f[tanggal_ttl]</td>
            </tr>
			
			<tr>
			<td><label for='name'>Jenis Kelamin</label></td>
			<td> :</td>
			<td>$f[jk]</td>
            </tr>
			
			<tr>
			<td><label for='name'>Prodi</label></td>
			<td> :</td>
			<td>$f[prodi]</td>
            </tr>
			
			<tr>
			<td><label for='ipk'>IPK</label></td>
			<td> :</td>
            <td>$f[ipk]</td>
			</tr>
			
			<tr>
			<td><label for='semester'>Semester</label></td>
			<td> :</td>
			<td>$f[semester]</td>
			</tr>
			
			<tr>
            <td><label for='no_hp_mhs'><No. HP</label></td>
			<td> :</td>
			<td>$f[no_hp_mhs]</td>
			</tr>
			
			<tr>
            <td><label for='alamat_mhs'>Alamat</label></td>
			<td> :</td>
			<td>$f[alamat_mhs]</td>
			</tr>
			
			<tr>
            <td><label for='organisasi'><small>Keaktifan Organisasi</small></label></td>
			<td> :</td>
			<td>$f[organisasi]</td>
            </tr>
			
			<tr>
            <td><label for='prestasi'>Prestasi Non Akademik</label></td>
			<td> :</td>
            <td>$f[prestasi]</td>
            </tr>
			<tr>
            <td><label for='berkas1'><small>Berkas</small></label></td>
			<td> :</td>
			<td>$e[berkas1]</td>
			</tr>
			
			</tbody></table>
			
			<hr>
			<h4>DATA ORANGTUA</h4>
			<hr>
			<br>
			<table bgcolor=white>
			<tr>
            <td><label for='nama_orangtua'>Nama Orangtua/Wali</label></td>
			<td> :</td>
			<td>$f[nama_orangtua]</td>
			</tr>
			
			<tr>
            <td><label for='alamat_orangtua'>Alamat</label></td>
			<td> :</td>
			<td>$f[alamat_orangtua]</td>
			</tr>

			
			<tr>
            <td><label for='pekerjaan'>Pekerjaan</label></td>
			<td> :</td>
			<td>$f[pekerjaan]</td>
			</tr>
			
            <tr>
            <td><label for='no_hp_orangtua'>No. HP</label></td>
			<td> :</td>
			<td>$f[no_hp_orangtua]</td>
			</tr>
					
			</table>
	      </form>
		  
	
	
	
	";?></div></div></div></div><?php	
		  
	}
	
	
	if($_GET[hal] == 'sukses')
	{echo "<script>alert('Data berhasil dikirim')</script>";
		('location:contmhs.php?hal=home');
	 
		
	}
	
	?>
               
                               
                       
                </div>
            </div>
            
            <hr>
            <footer>
                <p>&copy; POLITEKNIK KESEHATAN JAMBI</p>
            </footer>
        </div>
											
											</fieldset>
											</form>
											</div>
        <!--/.fluid-container-->
        <script src="../vendors/jquery-1.9.1.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <script src="../vendors/easypiechart/jquery.easy-pie-chart.js"></script>
        <script src="../assets/scripts.js"></script>
        <script>
        $(function() {
            // Easy pie charts
            $('.chart').easyPieChart({animate: 1000});
        });
        </script>
    </body>

</html>
<?php
}
else
{

header('location:login.php');

}


?>