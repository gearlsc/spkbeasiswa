<?php

session_start();
ini_set( "display_errors", 0);
if ($_SESSION[namauser])
{
include "../config/koneksi.php";
include "../config/seo.php";
                $ns=mysql_num_rows(mysql_query("select * from siswa"));
				$ns2=mysql_num_rows(mysql_query("select * from mahasiswa_bmb"));
				$j=mysql_fetch_array(mysql_query("select * from bobot"));
				$k=mysql_fetch_array(mysql_query("select * from kriteria_bmm"));
				$k2=mysql_fetch_array(mysql_query("select * from kriteria_bmb"));
				$a_bmm=mysql_fetch_array(mysql_query("select * from aspek_bmm"));

				  //-----hitung bobot
				   $j1=$j[j1];
				   $j2=$j[j2];
				   $j3=$j[j3];
				   $j4=$j[j4];
				   $j5=$j[j5];
				   //-- hitung wj1 => wj2
				   $wj1=$j1 / ($j1+ $j2 + $j3 + $j4 + $j5) ;
				   $wj2=$j2 / ($j1+ $j2 + $j3 + $j4 + $j5) ;
				   $wj3=$j3 / ($j1+ $j2 + $j3 + $j4 + $j5) ;
				   $wj4=$j4 / ($j1+ $j2 + $j3 + $j4 + $j5) ;
				   $wj5=$j5 / ($j1+ $j2 + $j3 + $j4 + $j5) ;
	
$nama_kriteria=$_POST[nama_kriteria];
$factor=$_POST[factor];			   
	   
if ($_POST[perbaikan])
							   { $a_bmm=mysql_query("select * from aspek_bmm order by id_aspek asc");
                  	
				   
										$totalaspekbmm=0;
										while ($r_abmm=mysql_fetch_array($a_bmm))
										{ 
										$aspek = $r_abmm[id_aspek];
										$totalaspekbmm = $totalaspekbmm  + $_POST[$aspek];
										}
							  if ( $totalaspekbmm == 100)
							   { $a_bmm=mysql_query("select * from aspek_bmm order by id_aspek asc");
										while ($r_abmm=mysql_fetch_array($a_bmm))
										{
										$aspek = $r_abmm[id_aspek];
										mysql_query("update aspek_bmm set persentase='$_POST[$aspek]'  where nama_aspek='$r_abmm[nama_aspek]'");
										}
								  }
							   else
							   {
								   echo "<script>alert('Jumlah persentase harus 100%'); window.location = 'cont.php?hal=bmm'</script>";
							   
							   }
							   }
							   
if ($_POST[perbaikanfactor])
							   { $tfactor=mysql_query("select * from factor order by nama_factor asc");
                  				$totalfactor=0;
										while ($dfactor=mysql_fetch_array($tfactor))
										{ 
										$fact = $dfactor[id_factor];
										$totalfactor = $totalfactor  + $_POST[$fact];
										}
							  if ( $totalfactor == 100)
							   { $tfactor=mysql_query("select * from factor order by nama_factor asc");
										while ($dfactor=mysql_fetch_array($tfactor))
										{
										$fact = $dfactor[id_factor];
										mysql_query("update factor set persentase='$_POST[$fact]'  where nama_factor='$dfactor[nama_factor]'");
										}
								  }
							  else
							   {
								   echo "<script>alert('Jumlah persentase harus 100%'); window.location = 'cont.php?hal=home'</script>";
							   
							  }
							   }
							   
if ($_POST[perbaikan2])
							    { $a_bmb=mysql_query("select * from aspek_bmb order by id_aspek asc");
                  	
				   
										$totalaspekbmb=0;
										while ($r_abmb=mysql_fetch_array($a_bmb))
										{ 
										$aspbmb = $r_abmb[id_aspek];
										$totalaspekbmb = $totalaspekbmb  + $_POST[$aspbmb];
										}
							  if ( $totalaspekbmb == 100)
							   { $a_bmb=mysql_query("select * from aspek_bmb order by id_aspek asc");
										while ($r_abmb=mysql_fetch_array($a_bmb))
										{
										$aspbmb = $r_abmb[id_aspek];
										mysql_query("update aspek_bmb set persentase='$_POST[$aspbmb]'  where nama_aspek='$r_abmb[nama_aspek]'");
										}
								  }
							   else
							   {
								   echo "<script>alert('Jumlah persentase harus 100%'); window.location = 'cont.php?hal=bmb'</script>";
							   
							   }
							   }
if ($_POST[backsub])
							   {echo "<script>window.location = 'cont.php?hal=aspekbmm'</script>";}
if ($_POST[backsubbmb])
							   {echo "<script>window.location = 'cont.php?hal=aspekbmb'</script>";}
							   
if ($_POST[perbaikan_kriteria])
							   {if ( $nama_kriteria == null or $factor == null or $_POST[profil_target] == null   )
{
 echo "<script>alert('isi kriteria dengan lengkap'); window.location = 'cont.php?hal=aspekbmm&nama_kriteria=$nama_kriteria&factor=$factor&profil_target=$profil_target'</script>";
}

else
{
								
								mysql_query("insert into kriteria_bmm(nama_aspek,nama_kriteria,factor,profil_target) values('$_POST[nama_aspek]','$nama_kriteria','$factor','$_POST[profil_target]')");
}
								   
							   }
if ($_POST[perbaikan_kriteria_bmb])
							   {if ( $nama_kriteria == null or $factor == null or $_POST[profil_target] == null  )
{
 echo "<script>alert('isi kriteria dengan lengkap'); window.location = 'cont.php?hal=aspekbmb&nama_kriteria=$nama_kriteria&factor=$factor&profil_target=$profil_target'</script>";
}

else
{
								
								mysql_query("insert into kriteria_bmb(nama_aspek,nama_kriteria,factor,profil_target) values('$_POST[nama_aspek]','$nama_kriteria','$factor','$_POST[profil_target]')");;
}
								   
							   }
if ($_POST[submitperiode])
							   {echo "<script>window.location = 'cont.php?hal=semuamahasiswa&id=$_POST[periode]'</script>";}
						   
if ($_POST[submitsubbmb])
							   {$rjenis=mysql_num_rows(mysql_query("select * from kriteria_bmb where nama_kriteria='$_POST[nama_kriteria]'"));
							   
if ( $_POST[jenis] == null  )
{
 echo "<script>alert('Pilih jenis Sub Kriteria'); window.location = 'cont.php?hal=subkriteriabmb&id=$_GET[id]'</script>";
}
else if ( $_POST[subkriteria] > 5  )
{
 echo "<script>alert('Sub Kriteria tidak boleh lebih dari 5');</script>";
}
else if ( $_POST[subkriteria] < 2  )
{
 echo "<script>alert('Sub Kriteria tidak boleh kurang dari 2');</script>";
}
else if ($rjenis > 0)
{ mysql_query("update kriteria_bmb set subkriteria='$_POST[subkriteria]',jenis='$_POST[jenis]' where nama_kriteria='$_POST[nama_kriteria]'"); 

}
else 
{mysql_query("update kriteria_bmb set subkriteria='$_POST[subkriteria]',jenis='$_POST[jenis]' where nama_kriteria='$_POST[nama_kriteria]'");}
}

if ($_POST[submitsubbmm])
							   {$rjenis=mysql_num_rows(mysql_query("select * from kriteria_bmm where nama_kriteria='$_POST[nama_kriteria]'"));
							   
if ( $_POST[jenis] == null  )
{
 echo "<script>alert('Pilih jenis Sub Kriteria'); window.location = 'cont.php?hal=subkriteria&id=$_GET[id]'</script>";
}
else if ( $_POST[subkriteria] > 5  )
{
 echo "<script>alert('Sub Kriteria tidak boleh lebih dari 5');</script>";
}
else if ( $_POST[subkriteria] < 2  )
{
 echo "<script>alert('Sub Kriteria tidak boleh kurang dari 2');</script>";
}
else if ($rjenis > 0)
{ mysql_query("update kriteria_bmm set subkriteria='$_POST[subkriteria]',jenis='$_POST[jenis]' where nama_kriteria='$_POST[nama_kriteria]'"); 

}
else 
{mysql_query("update kriteria_bmm set subkriteria='$_POST[subkriteria]',jenis='$_POST[jenis]' where nama_kriteria='$_POST[nama_kriteria]'");}
}
							   
if ($_POST[berita])
							   {
								$judul_seo=seo_title($_POST[judul]);
								$isi_berita=$_POST[isi_berita];
								$headline=$_POST[headline];
								if ( $judul_seo == null or $isi_berita == null or $headline == null )
{
 echo "<script>alert('isi berita dengan lengkap'); window.location = 'cont.php?module=add&judul=$_POST[judul]&isi_berita=$isi_berita&headline=$headline'</script>";
}

else
{
								mysql_query("insert into berita (judul,judul_seo,isi_berita,headline) values ('$_POST[judul]','$judul_seo','$_POST[isi_berita]','$headline')");   
								 echo "<script>alert('berita berhasil ditambah  '); window.location = 'cont.php?hal=berita'</script>";
								 
							   }}
if ($_POST[bobot])
							   {
								$selisih=$_POST[selisih];
								$nilai=$_POST[nilai];
								$selisihplus="Kompetensi individu kelebihan $selisih tingkat / level";
								$selisihnol="Kompetensi sesuai dengan yang dibutuhkan";
								$selisihmin=$_POST[selisih]* -1;
								$selisihminus="Kompetensi individu kurang $selisihmin tingkat / level";
								if ( $selisih == null or $nilai == null )
{
 echo "<script>alert('isi bobot dengan lengkap'); window.location = 'cont.php?module=addbobot&selisih=$_POST[selisih]&nilai=$nilai'</script>";
}
else if ( $selisih < 0 and $selisih >= -5 )
{
								mysql_query("insert into bobot (selisih,nilai,keterangan) values ('$selisih','$nilai','$selisihminus')");   
								 echo "<script>alert('bobot berhasil ditambah  '); window.location = 'cont.php?hal=bobot'</script>";
								 
							   }
else if ( $selisih ==0 )
{
								mysql_query("insert into bobot (selisih,nilai,keterangan) values ('$selisih','$nilai','$selisihnol')");   
								 echo "<script>alert('bobot berhasil ditambah  '); window.location = 'cont.php?hal=bobot'</script>";
								 
							   }
else if ( $selisih > 0 and $selisih <= 5 )
{
								mysql_query("insert into bobot (selisih,nilai,keterangan) values ('$selisih','$nilai','$selisihplus')");   
								 echo "<script>alert('bobot berhasil ditambah  '); window.location = 'cont.php?hal=bobot'</script>";
								 
							   }
else
{
								echo "<script>alert('isi selisih dengan nilai terkecil -5 dan terbesar 5'); window.location = 'cont.php?module=addbobot&selisih=$_POST[selisih]&nilai=$nilai'</script>";
								 
							   }}
if ($_POST[updatebobot])
							   {$selisih=$_POST[selisih];
								$nilai=$_POST[nilai];
								$selisihplus="Kompetensi individu kelebihan $selisih tingkat / level";
								$selisihnol="Kompetensi sesuai dengan yang dibutuhkan";
								$selisihmin=$_POST[selisih]* -1;
								$selisihminus="Kompetensi individu kurang $selisihmin tingkat / level";
								   if ($selisih == null or $nilai == null )
{
 echo "<script>alert('isi bobot dengan lengkap');</script>";
}
else if ( $selisih < 0 and $selisih >= -5 )
{
								mysql_query("update bobot set selisih='$selisih', nilai='$nilai', keterangan='$selisihminus' where selisih='$_GET[id]'");  
								 echo "<script>alert('bobot berhasil diedit  '); window.location = 'cont.php?hal=bobot'</script>";
								 
							   }
else if ( $selisih ==0 )
{
								mysql_query("update bobot set selisih='$selisih', nilai='$nilai', keterangan='$selisihnol' where selisih='$_GET[id]'");   
								 echo "<script>alert('bobot berhasil diedit  '); window.location = 'cont.php?hal=bobot'</script>";
								 
							   }
else if ( $selisih > 0 and $selisih <= 5 )
{
								mysql_query("update bobot set selisih='$selisih', nilai='$nilai', keterangan='$selisihplus' where selisih='$_GET[id]'");   
								 echo "<script>alert('bobot berhasil diedit  '); window.location = 'cont.php?hal=bobot'</script>";
								 
							   }
else
{
								echo "<script>alert('isi selisih dengan nilai terkecil -5 dan terbesar 5');</script>";
								 
							   }					 
							   }							   
if ($_POST[update])
							   {
								$judul_seo=seo_title($_POST[judul]);
								$isi_berita=$_POST[isi_berita];
								$headline=$_POST[headline];
								mysql_query("update berita set judul='$_POST[judul]', judul_seo='$judul_seo', isi_berita='$isi_berita',headline='$headline' where id_berita='$_POST[id]'");   
								 echo "<script>alert('berita berhasil update  '); window.location = 'cont.php?hal=berita'</script>";
								 
							   }
if ($_POST[updatesubrentang])
							   {$nama_kriteria=$_POST[nama_kriteria];
							   	$subkriteria=$_POST[subkriteria];
								$jenis=$_POST[jenis];
								$rentang_bawah = $_POST['rentang_bawah'];
  								$rentang_atas= $_POST['rentang_atas'];
  								$score= $_POST['score'];
								$nosub= $_POST['nosub'];
								$i=0;
foreach($score as $key => $val){ $keyy = $key + 1;
	$rnosub=mysql_num_rows(mysql_query("select * from subkriteriabmm where no_sub=$keyy and nama_kriteria ='$nama_kriteria' and jenis = '$jenis'"));
	if ($rnosub > 0)
{mysql_query("update subkriteriabmm set rentang_bawah='$rentang_bawah[$key]', rentang_atas='$rentang_atas[$key]',  score='$score[$key]' where no_sub='$keyy' and nama_kriteria ='$nama_kriteria' and jenis = '$jenis'"); }
else{	
mysql_query("insert into subkriteriabmm (rentang_bawah,rentang_atas,score,nama_kriteria,no_sub,jenis) values ('$rentang_bawah[$key]','$rentang_atas[$key]','$score[$key]','$nama_kriteria','.$nosub[$key].','$jenis')");  }								
					}echo "<script>alert('sub kriteria rentang berhasil diupdate  ');</script>";
   }

if ($_POST[updatesubrentangbmb])
							   {$nama_kriteria=$_POST[nama_kriteria];
							   	$subkriteria=$_POST[subkriteria];
								$jenis=$_POST[jenis];
								$rentang_bawah = $_POST['rentang_bawah'];
  								$rentang_atas= $_POST['rentang_atas'];
  								$score= $_POST['score'];
								$nosub= $_POST['nosub'];
								$i=0;
foreach($score as $key => $val){ $keyy = $key + 1;
	$rnosub=mysql_num_rows(mysql_query("select * from subkriteriabmb where no_sub=$keyy and nama_kriteria ='$nama_kriteria' and jenis = '$jenis'"));
	if ($rnosub > 0)
{mysql_query("update subkriteriabmb set rentang_bawah='$rentang_bawah[$key]', rentang_atas='$rentang_atas[$key]',  score='$score[$key]' where no_sub='$keyy' and nama_kriteria ='$nama_kriteria' and jenis = '$jenis'"); }
else{	
mysql_query("insert into subkriteriabmb (rentang_bawah,rentang_atas,score,nama_kriteria,no_sub,jenis) values ('$rentang_bawah[$key]','$rentang_atas[$key]','$score[$key]','$nama_kriteria','.$nosub[$key].','$jenis')");  }								
					}echo "<script>alert('sub kriteria rentang berhasil diupdate  ');</script>";
   }

if ($_POST[updatesubnonrentang])
							   {$nama_kriteria=$_POST[nama_kriteria];
							   	$subkriteria=$_POST['subkriteria'];
								$jenis=$_POST[jenis];
								$rentang_bawah = $_POST['rentang_bawah'];
  								$rentang_atas= $_POST['rentang_atas'];
  								$score= $_POST['score'];
								$nosub= $_POST['nosub'];
								$i=0;
foreach($score as $key => $val){ $keyy = $key + 1;
	$rnosub=mysql_num_rows(mysql_query("select * from subkriteriabmm where no_sub=$keyy and nama_kriteria ='$nama_kriteria' and jenis = '$jenis'"));
	if ($rnosub > 0)
{mysql_query("update subkriteriabmm set subkriteria='$subkriteria[$key]', score='.$score[$key].' where no_sub='$keyy' and nama_kriteria ='$nama_kriteria' and jenis = '$jenis'"); }
else{	
mysql_query("insert into subkriteriabmm (subkriteria,score,nama_kriteria,no_sub,jenis) values ('$subkriteria[$key]','.$score[$key].','$nama_kriteria','.$nosub[$key].','$jenis')");  }								
					}echo "<script>alert('sub kriteria non rentang berhasil diupdate  ');</script>";
   }

if ($_POST[updatesubnonrentangbmb])
							   {$nama_kriteria=$_POST[nama_kriteria];
							   	$subkriteria=$_POST['subkriteria'];
								$jenis=$_POST[jenis];
								$rentang_bawah = $_POST['rentang_bawah'];
  								$rentang_atas= $_POST['rentang_atas'];
  								$score= $_POST['score'];
								$nosub= $_POST['nosub'];
								$i=0;
foreach($score as $key => $val){ $keyy = $key + 1;
	$rnosub=mysql_num_rows(mysql_query("select * from subkriteriabmb where no_sub=$keyy and nama_kriteria ='$nama_kriteria' and jenis = '$jenis'"));
	if ($rnosub > 0)
{mysql_query("update subkriteriabmb set subkriteria='$subkriteria[$key]', score='.$score[$key].' where no_sub='$keyy' and nama_kriteria ='$nama_kriteria' and jenis = '$jenis'"); }
else{	
mysql_query("insert into subkriteriabmb (subkriteria,score,nama_kriteria,no_sub,jenis) values ('$subkriteria[$key]','.$score[$key].','$nama_kriteria','.$nosub[$key].','$jenis')");  }								
					}echo "<script>alert('sub kriteria non rentang berhasil diupdate  ');</script>";
   }

if ($_POST[updatekri])
							   {
								   if ( $nama_kriteria == null or $factor == null or $_POST[profil_target] == null  )
{
 echo "<script>alert('isi kriteria dengan lengkap');</script>";
}

else
{
								$nama_kriteria=($_POST[nama_kriteria]);
								$factor=($_POST[factor]);
								$profil_target=($_POST[profil_target]);								
								mysql_query("update kriteria_bmm set nama_kriteria='$_POST[nama_kriteria]', factor='$factor', profil_target='$profil_target' where nama_kriteria='$_GET[id]'");  
								 echo "<script>alert('Kriteria berhasil diupdate  '); window.location = 'cont.php?hal=aspekbmm'</script>";}
								 
							   }
if ($_POST[updatekri2])
							   {
								   if ( $nama_kriteria == null or $factor == null or $_POST[profil_target] == null  )
{
 echo "<script>alert('isi kriteria dengan lengkap');</script>";
}
else
{
								$nama_kriteria=($_POST[nama_kriteria]);
								$factor=($_POST[factor]);	
								$profil_target=($_POST[profil_target]);							
								mysql_query("update kriteria_bmb set nama_kriteria='$_POST[nama_kriteria]', factor='$factor', profil_target='$profil_target' where nama_kriteria='$_GET[id]'");  
								 echo "<script>alert('Kriteria berhasil diupdate  '); window.location = 'cont.php?hal=aspekbmb'</script>";
}
							   }							   

if ($_POST[tambah_aspek])
							   {
								$nama_aspek=($_POST[nama_aspek]);
								$persentase=$_POST[persentase];
								
								if ( $nama_aspek == null or $persentase == null)
{
 echo "<script>alert('isi aspek dengan lengkap'); window.location = 'cont.php?module=addaspekbmm&nama_aspek=$_POST[nama_aspek]&persentase=$persentase'</script>";
}

else
{
								mysql_query("insert into aspek_bmm (nama_aspek,persentase) values ('$_POST[nama_aspek]','$persentase')");   
								 echo "<script>alert('Aspek berhasil ditambah  '); window.location = 'cont.php?hal=bmm'</script>";
								 
							   }}
							   
if ($_POST[tambah_aspek2])
							   {
								$nama_aspek=($_POST[nama_aspek]);
								$persentase=$_POST[persentase];
								
								if ( $nama_aspek == null or $persentase == null)
{
 echo "<script>alert('isi aspek dengan lengkap'); window.location = 'cont.php?module=addaspekbmb&nama_aspek=$_POST[nama_aspek]&persentase=$persentase'</script>";
}

else
{
								mysql_query("insert into aspek_bmb (nama_aspek,persentase) values ('$_POST[nama_aspek]','$persentase')");   
								 echo "<script>alert('Aspek berhasil ditambah  '); window.location = 'cont.php?hal=bmb'</script>";
								 
							   }}							   

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
                        
                        
                      <li class="dropdown ">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
          <i class="icon-folder-open"></i> 
           Aspek & Kriteria
            <span class="caret"></span>
          </a>

          <ul class="dropdown-menu">
            <li class="dropdown-header"><i class="icon-folder-open"></i>  Aspek & Kriteria BMM<br></li>

            			<li>
                            <a href="?hal=bmm"> <i class="icon-folder-close"></i>Aspek BMM</a>
                        </li>
                        <li>
                            <a href="?hal=aspekbmm"><i class="icon-folder-close"></i> Kriteria BMM</a>
                        </li>
                        
            <li class="dropdown-header"><i class="icon-folder-open"></i>Aspek & Kriteria BMB<br></li>

            			<li>
                            <a href="?hal=bmb"><i class="icon-folder-close"></i> Aspek BMB</a>
                        </li>
                        <li>
                            <a href="?hal=aspekbmb"><i class="icon-folder-close"></i> Kriteria BMB</a>
                        </li>
            
            
          </ul>
        </li>
                       
                        
                         <li>
                            <a href="?hal=bobot"><i class="icon-folder-open"></i> Bobot</a>
                        </li>
                        
                        <li class="dropdown ">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
          <i class="icon-folder-open"></i> 
          Data Mahasiswa
            <span class="caret"></span>
          </a>

          <ul class="dropdown-menu">
            <li class="dropdown-header"><i class="icon-folder-open"></i> Data BMM<br></li>

            			<li>
                            <a href="?hal=mahasiswa"><i class="icon-folder-close"></i> Data Pemohon BMM</a>
                        </li>
                        <li>
                            <a href="?hal=beasiswa"><i class="icon-folder-close"></i> Data Penerima BMM</a>
                        </li>
                        
            <li class="dropdown-header"><i class="icon-folder-open"></i>Data BMB<br></li>

            			<li>
                            <a href="?hal=mahasiswabmb"><i class="icon-folder-close"></i> Data Pemohon BMB</a>
                        </li>
                        <li>
                            <a href="?hal=beasiswabmb"><i class="icon-folder-close"></i> Data Penerima BMB</a>
                        </li>
             
          </ul>
        </li>
                       <li>
                            <a href="cont.php?hal=semuamahasiswa&id="><i class="icon-folder-open"></i> Daftar Seluruh Data Pemohon Beasiswa</a>
                        </li>
                        
                        <li class="dropdown ">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
          <i class="icon-folder-open"></i> 
           Perhitungan
            <span class="caret"></span>
          </a>

          <ul class="dropdown-menu">
            <li class="dropdown-header"><i class="icon-folder-open"></i>  BMM<br></li>

                        <li>
                            <a href="?hal=awalperhitunganbmm"> <i class="icon-folder-close"></i> Daftar Mahasiswa & Kriteria BMM</a>
                        </li>
                        <li>
                            <a href="?hal=langkahbmm1"> <i class="icon-folder-close"></i> Langkah 1</a>
                        </li>
                        <li>
                            <a href="?hal=langkahbmm2"><i class="icon-folder-close"></i> Langkah 2</a>
                        </li>
                        <li>
                            <a href="?hal=langkahbmm3"><i class="icon-folder-close"></i> Langkah 3</a>
                        </li>
                         <li>
                            <a href="?hal=langkahbmm4"><i class="icon-folder-close"></i> Langkah 4</a>
                        </li>
                         <li>
                            <a href="?hal=langkahbmm5"><i class="icon-folder-close"></i> Langkah 5</a>
                        </li>
                        
            <li class="dropdown-header"><i class="icon-folder-open"></i>BMB<br></li>

            			<li>
                            <a href="?hal=awalperhitunganbmb"> <i class="icon-folder-close"></i> Daftar Mahasiswa & Kriteria BMB</a>
                        </li>
                        <li>
                            <a href="?hal=langkahbmb1"> <i class="icon-folder-close"></i> Langkah 1</a>
                        </li>
                        <li>
                            <a href="?hal=langkahbmb2"><i class="icon-folder-close"></i> Langkah 2</a>
                        </li>
                        <li>
                            <a href="?hal=langkahbmb3"><i class="icon-folder-close"></i> Langkah 3</a>
                        </li>
                         <li>
                            <a href="?hal=langkahbmb4"><i class="icon-folder-close"></i> Langkah 4</a>
                        </li>
                         <li>
                            <a href="?hal=langkahbmb5"><i class="icon-folder-close"></i> Langkah 5</a>
                        </li>
            
            
          </ul>
        </li>
         
                       
						<li>
                            <a href="?hal=berita"><i class="icon-folder-open"></i> Kelola Berita</a>
                        </li>
                        
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
                                    <div class="chart" data-percent="100"><?php echo "$ns siswa";?></div>
                                    <div class="chart-bottom-heading"><span class="label label-info">siswa terdaftar </br> Bantuan Mahasiswa Miskin</span>
                                    

                                    </div>
                                </div>
                               <div class="span6">
                                    <div class="chart" data-percent="100"><?php echo "$ns2 siswa";?></div>
                                    <div class="chart-bottom-heading"><span class="label label-info">siswa terdaftar </br> Beasiswa Mahasiswa Berprestasi</span>

                                    </div>
                                </div>
                             </div>
                        </div>
                        <!-- /block -->
                    </div>
					
                    <div class="row-fluid">
                        <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Persentase Core dan Secondary Factor (Dalam persen)</div>
                                <div class="pull-right">
                                  
                                </div>
                            </div>
                            
                            <div class="block-content collapse in">
                               <div class="span13">
                              
							   <form method="post" action="<?php echo $PHP_SELF ?>">
                                    <table class="table">
									
									<thead>
                                    
                                     <?php
							 $tfactor=mysql_query("select * from factor order by nama_factor asc");
                   while ($dfactor=mysql_fetch_array($tfactor))
				   {?><th>
                       <?php echo "$dfactor[nama_factor]";?></th> <?php }?>
                      
									</thead>
									<tbody>
									<tr>
                                    <?php
							 $tfactor=mysql_query("select * from factor order by nama_factor asc");
                   while ($dfactor=mysql_fetch_array($tfactor))
				   {?><td><input type='text' name='<?php echo "$dfactor[id_factor]";?>' placeholder="<?php echo "$dfactor[nama_factor]";?>" class='span5 '></td>
                      <?php              
					  } ?>
                                   	</tr>
									
									</tbody></table>
									<div class="form-actions">
												<input type='submit' name='perbaikanfactor' value="Update Persentase Factor" class="btn btn-primary">
                                                </div>
											</form>
                                            
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                        <thead>
                                            <tr>
                        					<?php
							 				$tfactor=mysql_query("select * from factor order by nama_factor asc");
                   							while ($dfactor=mysql_fetch_array($tfactor))
				   							{?>
                                            <th>
                                    
					 						<?php echo "$dfactor[nama_factor] ";?></th> <?php }?>
                                        	<tbody>
                                            <tr class="success">
										<?php
										$tfactor=mysql_query("select * from factor order by nama_factor asc");
                   						while ($dfactor=mysql_fetch_array($tfactor))
										{
									     ?>
                                            
                                                <td><?php echo "$dfactor[persentase]";?> </td>
                                                <?php
										}
										?>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                        
                    </div>                    
                
                <?php
				}?>
                              
                 <?php
				
				if($_GET[hal]== 'aspekbmm')
				{?>
                
                        <!-- block -->
                        
							 <?php
                             
							 $a_bmm=mysql_query("select * from aspek_bmm order by id_aspek asc");
                   while ($r_abmm=mysql_fetch_array($a_bmm))
				   {?>
                                    
					  <div class="row-fluid">
                      <div class="block">
                            <div class="navbar navbar-inner block-header">
                             <div class="muted pull-left"><?php echo "$r_abmm[nama_aspek]";?>
					  </div>
                      <div class="row-fluid">
                        <!-- block -->
                         
                                </div>
                            </div>
                            <div class="block-content collapse in">
                               <div class="span12">
							   
							   <form method="post" action="<?php echo $PHP_SELF ?>">
                                    <table class="table">
									
									<thead>
									<th>Nama Kriteria</th>
									<th>Jenis Factor</th>
                                    <th>Profil Target</th>
									</thead>
									<tbody >
									<tr>
                                   <input type='hidden' name='nama_aspek' value="<?php echo "$r_abmm[nama_aspek]";?>" class='span3 'readonly hidden='true'>
                                    <td><input type='text' name='nama_kriteria' value="<?php echo"$_GET[nama_kriteria]";?>" class='span3 '></td>
                                    <td><select name='factor'/>
			<option value=''>Pilih Jenis Factor</option>
			<option value='Core'>Core Factor</option>
			<option value='Secondary'>Secondary Factor</option>
			</select></td>
            						<td><input type='text' name='profil_target' value="<?php echo"$_GET[profil_target]";?>" class='span3 '></td>
                                   	</tr>
									
									</tbody></table>
									<div class="form-actions">
												<input type='submit' name='perbaikan_kriteria' value="Tambah Kriteria" class="btn btn-primary">
												
									</div>
											</form>
                                            </div>
                                            
                                            
                                            
                            
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12" >
                                   
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                        <thead>
                                            <tr>
                                                <th>Nama Kriteria</th>
                                                <th>Jenis Factor</th>
                                                <th>Profil Target</th>
                                                <th>Aksi</th>
                                                </tr>
                                        </thead>
                                        <tbody>
										<?php
										$cl=warning;
										$asp=mysql_query("select * from kriteria_bmm where nama_aspek= '$r_abmm[nama_aspek]'");
										while ($r=mysql_fetch_array($asp))
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
                                                <td><?php echo" $r[nama_kriteria]";?> </td>
                                                <td><?php echo" $r[factor]";?> </td>
                                                <td><?php echo" $r[profil_target]";?> </td>
                                                <td class="center">
												<a href="hapuskriteria.php?id=<?php echo "$r[nama_kriteria]";?>"onclick="return confirm('Apakah kamu yakin ingin menghapus kriteria ini ?');"><i class='icon-remove'></i> hapus</a> | 
												<a href="cont.php?hal=editkriteria&id=<?php echo "$r[nama_kriteria]";?>"><i class='icon-edit'></i> edit</a> |
                                                <a href="cont.php?hal=subkriteria&id=<?php echo "$r[nama_kriteria]";?>"><i class="icon-globe"></i>Lihat Sub-Kriteria</a>
												</td>
                                            </tr>
                                            <?php
										}
										?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </div>
                            </div>
				<?php 
				} 
				}?>
                
                <?php
				
				if($_GET[hal]== 'aspekbmb')
				{?>
                
                        <!-- block -->
                        
							 <?php
                             
							 $a_bmb=mysql_query("select * from aspek_bmb order by nama_aspek asc");
                   while ($r_abmb=mysql_fetch_array($a_bmb))
				   {?>
                                    
					  <div class="row-fluid">
                      <div class="block">
                            <div class="navbar navbar-inner block-header">
                             <div class="muted pull-left"><?php echo "$r_abmb[nama_aspek]";?>
					  </div>
                      <div class="row-fluid">
                        <!-- block -->
                         
                                </div>
                            </div>
                            <div class="block-content collapse in">
                               <div class="span12">
							   
							   <form method="post" action="<?php echo $PHP_SELF ?>">
                                    <table class="table">
									
									<thead>
									<th>Nama Kriteria</th>
									<th>Jenis Factor</th>
                                    <th>Profil Target</th>
									</thead>
									<tbody >
									<tr>
                                   <input type='hidden' name='nama_aspek' value="<?php echo "$r_abmb[nama_aspek]";?>" class='span3 'readonly hidden='true'>
                                    <td><input type='text' name='nama_kriteria' value="<?php echo"$_GET[nama_kriteria]";?>" class='span3 '></td>
                                    <td><select name='factor'/>
			<option value=''>Pilih Jenis Factor</option>
			<option value='Core'>Core Factor</option>
			<option value='Secondary'>Secondary Factor</option>
			</select></td>
            						<td><input type='text' name='profil_target' value="<?php echo"$_GET[profil_target]";?>" class='span3 '></td>
                                   	</tr>
									
									</tbody></table>
									<div class="form-actions">
												<input type='submit' name='perbaikan_kriteria_bmb' value="Tambah Kriteria" class="btn btn-primary">
												
									</div>
											</form>
                                            </div>
                                            
                                            
                                            
                            
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12" >
                                   
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                        <thead>
                                            <tr>
                                                <th>Nama Kriteria</th>
                                                <th>Jenis Factor</th>
                                                <th>Profil Target</th>
                                                <th>Aksi</th>
                                                </tr>
                                        </thead>
                                        <tbody>
										<?php
										$cl=warning;
										$asp=mysql_query("select * from kriteria_bmb where nama_aspek= '$r_abmb[nama_aspek]'");
										while ($r=mysql_fetch_array($asp))
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
                                                <td><?php echo" $r[nama_kriteria]";?> </td>
                                                <td><?php echo" $r[factor]";?> </td>
                                                <td><?php echo" $r[profil_target]";?> </td>
                                                <td class="center">
												<a href="hapuskriteriabmb.php?id=<?php echo "$r[nama_kriteria]";?>"onclick="return confirm('Apakah kamu yakin ingin menghapus kriteria ini ?');"><i class='icon-remove'></i> hapus</a> | 
												<a href="cont.php?hal=editkriteriabmb&id=<?php echo "$r[nama_kriteria]";?>"><i class='icon-edit'></i> edit</a> |
                                                <a href="cont.php?hal=subkriteriabmb&id=<?php echo "$r[nama_kriteria]";?>"><i class="icon-globe"></i>Lihat Sub-Kriteria</a>
												</td>
                                            </tr>
                                            <?php
										}
										?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </div>
                            </div>
				<?php 
				} 
				}?>
                
                
				<?php
				if($_GET[hal]== 'mahasiswa')
				{
				 $d=mysql_query("select * from siswa order by nim asc");
                   while ($r=mysql_fetch_array($d))
				   {
					   if ($r[ipk]>=2.75 and $r[ipk]<=2.99)
					   {
					   $gapipk=1;
					   }
					   if ($r[ipk]>=3 and $r[ipk]<=3.24)
					   {
					   $gapipk=2;
					   }
					    if ($r[ipk]>=3.25 and $r[ipk]<=3.49)
					   {
					   $gapipk=3;
					   }
					    if ($r[ipk]>=3.50 and $r[ipk]<=3.74)
					   {
					   $gapipk=4;
					   }
					  if ($r[ipk]>=3.75 and $r[ipk]<=4.00)
					   {
					   $gapipk=5;
					   } 
					   if ($r[semester]==3)
					   {
					   $gapsemester=5;
					   }
					   if ($r[semester]==4)
					   {
					   $gapsemester=4;
					   }
					   if ($r[semester]==5)
					   {
					   $gapsemester=3;
					   }
					   if ($r[semester]==6)
					   {
					   $gapsemester=2;
					   }
					   if ($r[semester]==7)
					   {
					   $gapsemester=1;
					   }
					   if ($r[penghasilan]<400000)
					   {
					   $gappenghasilan=5;
					   }
					   if ($r[penghasilan]>=400000 and $r[penghasilan]<=799999)
					   {
					   $gappenghasilan=4;
					   }
					   if ($r[penghasilan]>=800000 and $r[penghasilan]<=1199999)
					   {
					   $gappenghasilan=3;
					   }
					   if ($r[penghasilan]>=1200000 and $r[penghasilan]<=1599999)
					   {
					   $gappenghasilan=2;
					   }
					   if ($r[penghasilan]>=1600000)
					   {
					   $gappenghasilan=1;
					   }
					   if ($r[status_orangtua]=="Lengkap")
					   {
					   $gapstatus_orangtua=1;
					   }
					   if ($r[status_orangtua]=="Yatim atau Piatu")
					   {
					   $gapstatus_orangtua=2;
					   }
					   if ($r[status_orangtua]=="Yatim Piatu")
					   {
					   $gapstatus_orangtua=3;
					   }
					   if ($r[jenis_tinggal]=="Orangtua")
					   {
					   $gapjenis_tinggal=1;
					   }
					   if ($r[jenis_tinggal]=="Wali")
					   {
					   $gapjenis_tinggal=2;
					   }if ($r[jenis_tinggal]=="Kost")
					   {
					   $gapjenis_tinggal=3;
					   }if ($r[jenis_tinggal]=="Asrama")
					   {
					   $gapjenis_tinggal=4;
					   }if ($r[jenis_tinggal]=="Panti")
					   {
					   $gapjenis_tinggal=5;
					   }
					   if ($r[jenis_tinggal]=="Orangtua")
					   {
					   $gapjenis_tinggal=1;
					   }
					   if ($r[jumlah_tanggungan]==1)
					   {
					   $gapjumlah_tanggungan=1;
					   }
					   else if ($r[jumlah_tanggungan]==2)
					   {
					   $gapjumlah_tanggungan=2;
					   }
					   else if($r[jumlah_tanggungan]>=3)
					   {
					   $gapjumlah_tanggungan=3;
					   }
					   $cv=mysql_fetch_array(mysql_query("select * from profil_target"));
					   $selisihipk= $gapipk - $cv[pt_ipk];
					   $selisihsemester= $gapsemester - $cv[pt_semester];
					   $selisihpenghasilan= $gappenghasilan - $cv[pt_penghasilan];
					   $selisihjumlah_tanggungan= $gapjumlah_tanggungan - $cv[pt_jumlah_tanggungan];
					   $selisihstatus_orangtua= $gapstatus_orangtua - $cv[pt_status_orangtua];
					   $selisihjenis_tinggal= $gapjenis_tinggal - $cv[pt_jenis_tinggal];
					   
					   if ($selisihipk==0)
					   {
					   $bobotipk=5;
					   }
					   if ($selisihipk==1)
					   {
					   $bobotipk=4.5;
					   }
					   if ($selisihipk==-1)
					   {
					   $bobotipk=4;
					   }
					   if ($selisihipk==2)
					   {
					   $bobotipk=3.5;
					   }
					   if ($selisihipk==-2)
					   {
					   $bobotipk=3;
					   }
					   if ($selisihipk==3)
					   {
					   $bobotipk=2.5;
					   }
					   if ($selisihipk==-3)
					   {
					   $bobotipk=2;
					   }
					   if ($selisihipk==4)
					   {
					   $bobotipk=1.5;
					   }
					   if ($selisihipk==-4)
					   {
					   $bobotipk=1;
					   }
					   if ($selisihsemester==0)
					   {
					   $bobotsemester=5;
					   }
					   if ($selisihsemester==1)
					   {
					   $bobotsemester=4.5;
					   }
					   if ($selisihsemester==-1)
					   {
					   $bobotsemester=4;
					   }
					   if ($selisihsemester==2)
					   {
					   $bobotsemester=3.5;
					   }
					   if ($selisihsemester==-2)
					   {
					   $bobotsemester=3;
					   }
					   if ($selisihsemester==3)
					   {
					   $bobotsemester=2.5;
					   }
					   if ($selisihsemester==-3)
					   {
					   $bobotsemester=2;
					   }
					   if ($selisihsemester==4)
					   {
					   $bobotsemester=1.5;
					   }
					   if ($selisihsemester==-4)
					   {
					   $bobotsemester=1;
					   }
					   if ($selisihpenghasilan==0)
					   {
					   $bobotpenghasilan=5;
					   }
					   if ($selisihpenghasilan==1)
					   {
					   $bobotpenghasilan=4.5;
					   }
					   if ($selisihpenghasilan==-1)
					   {
					   $bobotpenghasilan=4;
					   }
					   if ($selisihpenghasilan==2)
					   {
					   $bobotpenghasilan=3.5;
					   }
					   if ($selisihpenghasilan==-2)
					   {
					   $bobotpenghasilan=3;
					   }
					   if ($selisihpenghasilan==3)
					   {
					   $bobotpenghasilan=2.5;
					   }
					   if ($selisihpenghasilan==-3)
					   {
					   $bobotpenghasilan=2;
					   }
					   if ($selisihpenghasilan==4)
					   {
					   $bobotpenghasilan=1.5;
					   }
					   if ($selisihpenghasilan==-4)
					   {
					   $bobotpenghasilan=1;
					   }
					   if ($selisihjumlah_tanggungan==0)
					   {
					   $bobotjumlah_tanggungan=5;
					   }
					   if ($selisihjumlah_tanggungan==1)
					   {
					   $bobotjumlah_tanggungan=4.5;
					   }
					   if ($selisihjumlah_tanggungan==-1)
					   {
					   $bobotjumlah_tanggungan=4;
					   }
					   if ($selisihjumlah_tanggungan==2)
					   {
					   $bobotjumlah_tanggungan=3.5;
					   }
					   if ($selisihjumlah_tanggungan==-2)
					   {
					   $bobotjumlah_tanggungan=3;
					   }
					   if ($selisihjumlah_tanggungan==3)
					   {
					   $bobotjumlah_tanggungan=2.5;
					   }
					   if ($selisihjumlah_tanggungan==-3)
					   {
					   $bobotjumlah_tanggungan=2;
					   }
					   if ($selisihjumlah_tanggungan==4)
					   {
					   $bobotjumlah_tanggungan=1.5;
					   }
					   if ($selisihjumlah_tanggungan==-4)
					   {
					   $bobotjumlah_tanggungan=1;
					   }
					   if ($selisihstatus_orangtua==0)
					   {
					   $bobotstatus_orangtua=5;
					   }
					   if ($selisihstatus_orangtua==1)
					   {
					   $bobotstatus_orangtua=4.5;
					   }
					   if ($selisihstatus_orangtua==-1)
					   {
					   $bobotstatus_orangtua=4;
					   }
					   if ($selisihstatus_orangtua==2)
					   {
					   $bobotstatus_orangtua=3.5;
					   }
					   if ($selisihstatus_orangtua==-2)
					   {
					   $bobotstatus_orangtua=3;
					   }
					   if ($selisihstatus_orangtua==3)
					   {
					   $bobotstatus_orangtua=2.5;
					   }
					   if ($selisihstatus_orangtua==-3)
					   {
					   $bobotstatus_orangtua=2;
					   }
					   if ($selisihstatus_orangtua==4)
					   {
					   $bobotstatus_orangtua=1.5;
					   }
					   if ($selisihstatus_orangtua==-4)
					   {
					   $bobotstatus_orangtua=1;
					   }
					   if ($selisihjenis_tinggal==0)
					   {
					   $bobotjenis_tinggal=5;
					   }
					   if ($selisihjenis_tinggal==1)
					   {
					   $bobotjenis_tinggal=4.5;
					   }
					   if ($selisihjenis_tinggal==-1)
					   {
					   $bobotjenis_tinggal=4;
					   }
					   if ($selisihjenis_tinggal==2)
					   {
					   $bobotjenis_tinggal=3.5;
					   }
					   if ($selisihjenis_tinggal==-2)
					   {
					   $bobotjenis_tinggal=3;
					   }
					   if ($selisihjenis_tinggal==3)
					   {
					   $bobotjenis_tinggal=2.5;
					   }
					   if ($selisihjenis_tinggal==-3)
					   {
					   $bobotjenis_tinggal=2;
					   }
					   if ($selisihjenis_tinggal==4)
					   {
					   $bobotjenis_tinggal=1.5;
					   }
					   if ($selisihjenis_tinggal==-4)
					   {
					   $bobotjenis_tinggal=1;
					   }
					   $cf_akademik_bmm = $bobotipk;
					   $sf_akademik_bmm = $bobotsemester;
					   $cf_finansial_bmm = ($bobotpenghasilan + $bobotjumlah_tanggungan + $bobotstatus_orangtua)/3;
					   $sf_finansial_bmm = $bobotjenis_tinggal;
					   $nf_akademik_bmm = 0.6 * $cf_akademik_bmm + 0.4 * $sf_akademik_bmm;
					   $nf_finansial_bmm = 0.6 * $cf_finansial_bmm + 0.4 * $sf_finansial_bmm;
					   $nilai_akhir_bmm = 0.2 * $nf_akademik_bmm + 0.8 * $nf_finansial_bmm;
				      					  
					   mysql_query("update siswa set preferensi='$nilai_akhir_bmm' where nim='$r[nim]'");
				
				}
				   
				
                ?>		 
				<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Data mahasiswa yang mengajukan Bantuan Mahasiswa Miskin</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12" >
                                   
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered  table-hover table-highlight table-checkable" id="example" data-provide="datatable" 
                data-display-rows="10"
                data-info="true"
                data-search="true"
                data-length-change="true"
                data-paginate="true"
                  >
                                        <thead>
                                            <tr>
                                                <th data-filterable="true" data-sortable="true">Nama</th>
                                                <th data-filterable="true" data-sortable="true">NIM</th>
                                                <th data-filterable="true" data-sortable="true">Tempat, Tanggal Lahir</th>
                                                <th data-filterable="true" data-sortable="true">Jenis Kelamin</th>
                                                <th data-filterable="true" data-sortable="true">Program Studi</th>
                                                <th data-filterable="true" data-sortable="true">IPK</th>
                                                <th data-filterable="true" data-sortable="true">Semester</th>
                                                <th data-filterable="true" data-sortable="true">No. HP</th>
                                                <th data-filterable="true" data-sortable="true">Alamat</th>
                                                <th class="center" data-filterable="true" data-sortable="true">Jenis<br/>Tempat Tinggal</th>
                                                <th class="center" data-filterable="true" data-sortable="true">Status<br/>Orangtua</th>
                                                <th class="center" data-filterable="true" data-sortable="true">Jumlah Tanggungan<br/>Orangtua</th>
                                                <th class="center" data-filterable="true" data-sortable="true">Nama<br/>Orangtua</th>
                                                <th class="center" data-filterable="true" data-sortable="true">Alamat<br/>Orangtua</th>
                                                <th class="center" data-filterable="true" data-sortable="true">Pekerjaan<br/>Orangtua</th>
                                                <th class="center" data-filterable="true" data-sortable="true">Penghasilan<br/>Orangtua</th>
                                                <th class="center" data-filterable="true" data-sortable="true">No. HP<br/>Orangtua</th>
                                                <th class="center" data-filterable="true" data-sortable="true">Berkas</th>
                                                <!--<th class="center"><center>penghasilan orang tua <br/> (kurang dari atau samadengan)</center></th>
                                                <th>yatim</th> -->
                                                
                                                <th data-filterable="true" data-sortable="true">preferensi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
										$cl=warning;
										$sis=mysql_query("select * from siswa order by nim desc");
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
                                                <td><?php echo" $r[tempat_ttl] , $r[tanggal_ttl]";?></td>
                                                <td><?php echo" $r[jk]";?> </td>
                                                <td><?php echo" $r[prodi]";?> </td>
                                                <td><?php echo" $r[ipk]";?></td>
                                                <td><?php echo" $r[semester]";?> </td>
                                                <td><?php echo" $r[no_hp_mhs]";?> </td>
                                                <td><?php echo" $r[alamat_mhs]";?></td>
                                                <td><?php echo" $r[jenis_tinggal]";?> </td>
                                                <td><?php echo" $r[status_orangtua]";?> </td>
                                                <td><?php echo" $r[jumlah_tanggungan]";?></td>
                                                <td><?php echo" $r[nama_orangtua]";?> </td>
                                                <td><?php echo" $r[alamat_orangtua]";?> </td>
                                                <td><?php echo" $r[pekerjaan]";?></td>
                                                <td class="center"> <?php $penghasilan=number_format($r[penghasilan]); echo"Rp. $penghasilan";?></td>
                                                <td><?php echo" $r[no_hp_orangtua]";?></td>
                                                <td><a href="download.php?id=<?php echo "$r[nim]" ?>"><?php echo" $r[berkas1]";?> </a></td>
												     </td>
                                                <td class="center"><?php $p=number_format( $r[preferensi],2); echo"$p";?></td>
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
				if($_GET[hal] == 'beasiswa')
				{
					 $d=mysql_query("select * from siswa order by nim asc");
                   
										
				?>	
				<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><h5>Data mahasiswa yang menerima Bantuan Mahasiswa Miskin</h5></div>
                                <div class="muted pull-right">
								<?php 
							   $p=mysql_fetch_array(mysql_query("select * from berita where judul_seo='pengumuman'"));
							   if($p[headline]=="N")
							   {
							   echo " <form method=post action=pengumumanonbmm.php> "?>
							   <input name='pengumumanon' type='submit' id='submit' value='Aktifkan Pengumuman Penerima' />
							   <?php }
								else if($p[headline]=="Y")
							   {
							   echo " <form method=post action=pengumumanoffbmm.php> "?>
							   <input name='pengumumanoff' type='submit' id='submit' value='Non-Aktifkan Pengumuman Penerima' />
							   <?php }
							   ?>
							   <p><p></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>NIM</th>
                                                <th>Tempat, Tanggal Lahir</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Program Studi</th>
                                                <th>Nilai</th>
                                                
                                                <!--<th class="center"><center>penghasilan orang tua <br/> (kurang dari atau samadengan)</center></th>
                                                <th>yatim</th> -->
                                                
                                                
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
                                                <td><?php echo" $r[tempat_ttl] , $r[tanggal_ttl]";?></td>
                                                <td><?php echo" $r[jk]";?> </td>
                                                <td><?php echo" $r[prodi]";?> </td>
                                               
                                                <td class="center"><?php $p=number_format( $r[preferensi],2); echo"$p";?></td>
                                                
                                            <?php
										}
										?>
                                        </tbody>
                                    </table>
                                    
                                    
                                </div>
                                
                                    <table width="150" border="0" cellspacing="0" cellpadding="0" align="center">
  <tbody>
    <tr>
       <td>&nbsp;</td>
    </tr>
    <tr>
      <td> <input type="button" class="btn btn-success" value="Cetak Laporan" onclick="window.location='cetak-bmm.php'"/></td>
    </tr>
  </tbody>
  
</table>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                <?php
				}
				if($_GET[hal] == 'perhitunganbmm')
				{
	function tampiltabel($arr)
	{
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
			  for ($j=0;$j<count($arr[$i]);$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	

	function tampilbarisfactor($arr)
	{	
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table  table-bordered table-highlight">';
		echo '
		<tr>
		<td rowspan="2" ><h6><center><br><p><p>Nama Factor</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<tr>';
		echo '<tr>
		<td><center>Jenis Factor</center></td>';
			  for ($i=0;$i<count($arr);$i++)
			  {
			    echo '<td>'.$arr[$i].'</td>';
			  }
		echo "</tr>";
		echo '</table> </div></div>';
	}
	function tampilbariskriteria($arr)
	{	
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table  table-bordered table-highlight">';
		echo '
		<tr>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<tr>';
		
		echo '<tr>';
			  for ($i=0;$i<count($arr);$i++)
			  {
			    echo '<td>'.$arr[$i].'</td>';
			  }
		echo "</tr>";
		echo '</table> </div></div>';
	}
	function tampilbarispt($arr)
	{	
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table  table-bordered table-highlight">';
		echo '
		<tr>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<tr>';
		
		echo '<tr>';
			  for ($i=0;$i<count($arr);$i++)
			  {
			    echo '<td>'.$arr[$i].'</td>';
			  }
		echo "</tr>";
		echo '</table> </div></div>';
	}

	function tampilkolom($arr)
	{
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table table-bordered table-highlight">';
	  for ($i=0;$i<count($arr);$i++)
	  {
			echo '<tr>';
			    echo '<td>'.$arr[$i].'</td>';
			echo "</tr>";
	   }
		echo
		 '</table> </div></div>';
	}
	function tampilkolommahasiswa($arr)
	{
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table table-bordered table-highlight">';
		echo '
		<tr><td><h6>Nama Mahasiswa</h6></td>
		<tr>';
	  for ($i=0;$i<count($arr);$i++)
	  {
			echo '<tr>';
			    echo '<td>'.$arr[$i].'</td>';
			echo "</tr>";
	   }
		echo
		 '</table> </div></div>';
	}
    $mhsbmm = array();
	
	$querymhsbmm = mysql_query("SELECT * FROM siswa ORDER BY nim asc");
	$i=0;
	
	while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	{
		$mhsbmm[$i] = $datamhsbmm['nama_mhs'];
		$i++;
	} 
	
	
	
	$kriteriabmm = array(); //array("Harga", "Kualitas", "Fitur", "Populer", "Purna Jual", "Keawetan");
	
	$factorbmm = array(); //array("cost", "benefit", "benefit", "benefit", "benefit", "benefit");
	
	$profil_targetbmm = array(); //array(4, 5, 4, 3, 3, 2);

	$querykriteriabmm = mysql_query("SELECT * FROM kriteria_bmm ORDER BY no asc");
	$i=0;
	while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
	{
		$kriteriabmm[$i] = $datakriteriabmm['nama_kriteria'];
		$factorbmm[$i] = $datakriteriabmm['factor'];
		$profil_targetbmm[$i] = $datakriteriabmm['profil_target'];
		$i++;
	}   
	
	$mhsbmmxkriteria = array();
	$querymhsbmm = mysql_query("SELECT * FROM siswa ORDER BY nim asc");
	$i=0;
	while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	{$querykriteriabmm = mysql_query("SELECT * FROM kriteria_bmm ORDER BY no asc ");
		$j=0;
		while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
		{
			$sub = mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = '$datakriteriabmm[nama_kriteria]'");
			$ssub = mysql_fetch_array($sub);//milih aspek
		
			$querymhsbmm2 = mysql_query("SELECT * FROM siswa WHERE nama_mhs = '$datamhsbmm[nama_mhs]'");
			$datamhsbmm2 = mysql_fetch_array($querymhsbmm2);//milih nama mhs
			
			if ($datakriteriabmm['nama_kriteria'] =="IPK")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmm['subkriteria'];$k++)
			{$kriteria = $datakriteriabmm['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = 'IPK' and no_sub = '$k'"));
			if ($datamhsbmm['ipk'] >= $pilihsub['rentang_bawah'] and $datamhsbmm['ipk'] <= $pilihsub['rentang_atas'])
			{
				$scoreipk = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "IPK")
		
		if ($datakriteriabmm['nama_kriteria'] =="Semester")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmm['subkriteria'];$k++)
			{$kriteria = $datakriteriabmm['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = 'Semester' and no_sub = '$k'"));
			if ($datamhsbmm['semester'] == $pilihsub['subkriteria'])
			{
				$scoresemester = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "Semester")
		if ($datakriteriabmm['nama_kriteria'] =="Penghasilan Orang Tua")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmm['subkriteria'];$k++)
			{$kriteria = $datakriteriabmm['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = 'Penghasilan Orang Tua' and no_sub = '$k'"));
			if ($datamhsbmm['penghasilan'] >= $pilihsub['rentang_bawah'] and $datamhsbmm['penghasilan'] <= $pilihsub['rentang_atas'])
			{
				$scorepenghasilan = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "Semester")
		
		
		if ($datakriteriabmm['nama_kriteria'] =="Jenis Tinggal")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmm['subkriteria'];$k++)
			{$kriteria = $datakriteriabmm['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = 'Jenis Tinggal' and no_sub = '$k'"));
			if ($datamhsbmm['jenis_tinggal'] == $pilihsub['subkriteria'])
			{
				$scorejenistinggal = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "jenistinggal")
		
		if ($datakriteriabmm['nama_kriteria'] =="Jumlah Tanggungan")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmm['subkriteria'];$k++)
			{$kriteria = $datakriteriabmm['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = 'Jumlah Tanggungan' and no_sub = '$k'"));
			if ($datamhsbmm['jumlah_tanggungan'] == $pilihsub['subkriteria'])
			{
				$scorejumlahtanggungan = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			else if($datamhsbmm['jumlah_tanggungan'] > 3)
			{
				$scorejumlahtanggungan = 3;
			}
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "jumlah tanggungan")
		
		if ($datakriteriabmm['nama_kriteria'] =="Status Anak")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmm['subkriteria'];$k++)
			{$kriteria = $datakriteriabmm['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = 'Status Anak' and no_sub = '$k'"));
			if ($datamhsbmm['status_orangtua'] == $pilihsub['subkriteria'])
			{
				$scorestatusanak = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "Status Anak")
		
		
		
			if($j == 0)
			{$jk = $j- 1 ;
			$mhsbmmxkriteria[$i][$jk] = $mhsbmm[$i];
			$mhsbmmxkriteria[$i][$j] = $scoreipk;
			}
			if($j == 1)
			{
			$mhsbmmxkriteria[$i][$j] = $scoresemester;
			}
			if($j == 2)
			{
			$mhsbmmxkriteria[$i][$j] = $scorepenghasilan;
			}
			if($j == 3)
			{
			$mhsbmmxkriteria[$i][$j] = $scorejumlahtanggungan;
			}
			if($j == 4)
			{
			$mhsbmmxkriteria[$i][$j] = $scorestatusanak;
			}
			if($j == 5)
			{
			$mhsbmmxkriteria[$i][$j] = $scorejenistinggal;
			}
		$j++;
			
		} // untuk while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
		 $i++;
	} // untuk while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	    
	function tampiltabelpgap($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	
	for ($i=0;$i<count($mhsbmm);$i++)
	{
		for ($j=0;$j<count($kriteriabmm);$j++)
		{ 	$jk = 0-1 ;
			$selisihbmm[$i][$jk] = $mhsbmm[$i];
			$selisihbmm[$i][$j] = $mhsbmmxkriteria[$i][$j] -  $profil_targetbmm[$j] ;
		
		}
		
	}
	function tampiltabelselisih($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
		
	
	$bobotbmm = array();
	
	for ($i=0;$i<count($mhsbmm);$i++)
	{
		for ($j=0;$j<count($kriteriabmm);$j++)
		{ $querybobotbmm = mysql_query("SELECT * FROM bobot");
	      while ($databobotbmm = mysql_fetch_array($querybobotbmm))
			{ if($selisihbmm[$i][$j] == $databobotbmm['selisih'])
			{
				$jk = 0-1 ;
				$bobotbmm[$i][$jk] = $mhsbmm[$i];
				$bobotbmm[$i][$j] = $databobotbmm['nilai']; 
			}
			}
		}
		
	}
	function tampiltabelbobot($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	
	$pengelompokanbmm = array();
	$querymhsbmm = mysql_query("SELECT * FROM siswa ORDER BY nim asc");
	$i=0;
	while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	{
		$querykriteriabmm1 = mysql_query("SELECT * FROM kriteria_bmm ");
		$jumlah=mysql_num_rows($querykriteriabmm1);
		$jumlahh= $jumlah + 4;
		$cffinfix=0;
		$sffinfix=0;
		for ($j=0;$j<$jumlahh;$j++)
		{$querykriteriabmm1 = mysql_query("SELECT * FROM kriteria_bmm where nama_aspek='Akademik' ");
		 while ($datakriteriabmm1 = mysql_fetch_array($querykriteriabmm1))
			{		
			if ($datakriteriabmm1['factor'] =="Core")  
				{ $jj = $j - 2;
				$cfaka = $bobotbmm[$i][$jj];
				}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			if ($datakriteriabmm1['factor'] =="Secondary")  
			{ $jj = $j - 2;
				$sfaka = $bobotbmm[$i][$jj];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			}
			$querykriteriabmm2 = mysql_query("SELECT * FROM kriteria_bmm where nama_aspek='Finansial' ");
		 while ($datakriteriabmm2 = mysql_fetch_array($querykriteriabmm2))
			{if ($datakriteriabmm2['nama_kriteria'] == "Penghasilan Orang Tua")
			{if ($datakriteriabmm2['factor'] =="Core")  
				{ 
				$cffin1 = $bobotbmm[$i][2];
				}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			if ($datakriteriabmm2['factor'] =="Secondary")  
			{ $jj = $j - 2;
				$sffin1 = $bobotbmm[$i][2];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			}
			if ($datakriteriabmm2['nama_kriteria'] == "Jumlah Tanggungan")
			{if ($datakriteriabmm2['factor'] =="Core")  
				{ 
				$cffin2 = $bobotbmm[$i][3];
				}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			if ($datakriteriabmm2['factor'] =="Secondary")  
			{ $jj = $j - 2;
				$sffin2 = $bobotbmm[$i][3];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			}
			if ($datakriteriabmm2['nama_kriteria'] == "Status Anak")
			{if ($datakriteriabmm2['factor'] =="Core")  
				{ 
				$cffin3 = $bobotbmm[$i][4];
				}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			if ($datakriteriabmm2['factor'] =="Secondary")  
			{ $jj = $j - 2;
				$sffin3 = $bobotbmm[$i][4];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			}
			if ($datakriteriabmm2['nama_kriteria'] == "Jenis Tinggal")
			{if ($datakriteriabmm2['factor'] =="Core")  
				{ 
				$cffin4 = $bobotbmm[$i][5];
				}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			if ($datakriteriabmm2['factor'] =="Secondary")  
			{ $jj = $j - 2;
				$sffin4 = $bobotbmm[$i][5];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			}
			
			}
			$cfactorr = mysql_query("SELECT * FROM kriteria_bmm WHERE nama_aspek= 'Finansial' and factor = 'Core'");
			$jumlahcore=mysql_num_rows($cfactorr);
			$sfactorr = mysql_query("SELECT * FROM kriteria_bmm WHERE nama_aspek= 'Finansial' and factor = 'Secondary'");
			$jumlahsecondary=mysql_num_rows($sfactorr);
			$cffinfix = ($cffin1 + $cffin2 + $cffin3 + $cffin4)/$jumlahcore;
			$sffinfix = ($sffin1 + $sffin2 + $sffin3 + $sffin4)/$jumlahsecondary;
						
			if($j == 0)
			{$jk=$j-1;
			$pengelompokanbmm[$i][$jk] = $mhsbmm[$i];
			$pengelompokanbmm[$i][$j] = $bobotbmm[$i][$j];
			}
			if($j == 1)
			{
			$pengelompokanbmm[$i][$j] = $bobotbmm[$i][$j];
			}
			if($j == 2)
			{
			$pengelompokanbmm[$i][$j] = $cfaka;
			}
			if($j == 3)
			{
			$pengelompokanbmm[$i][$j] = $sfaka;
			}
			if($j == 4)
			{$jj= $j - 2;
			$pengelompokanbmm[$i][$j] = $bobotbmm[$i][$jj];
			}
			if($j == 5)
			{$jj= $j - 2;
			$pengelompokanbmm[$i][$j] = $bobotbmm[$i][$jj];
			}
			if($j == 6)
			{$jj= $j - 2;
			$pengelompokanbmm[$i][$j] = $bobotbmm[$i][$jj];
			}
			if($j == 7)
			{$jj= $j - 2;
			$pengelompokanbmm[$i][$j] = $bobotbmm[$i][$jj];
			}
			if($j == 8)
			{$cffinfixx=number_format( $cffinfix,2);
			$pengelompokanbmm[$i][$j] = $cffinfixx;
			}
			if($j == 9)
			{$sffinfixx=number_format( $sffinfix,2);
			$pengelompokanbmm[$i][$j] = $sffinfix;
			}
			
		} // untuk while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
		 $i++;
	} // untuk while ($datamhsbmm = mysql_fetch_array($querymhsbmm))	
	function tampiltabelpengelompokan($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="4" ><h6><center>Akademik</center></h6></td>
		<td colspan="6"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>Cf</center></h6></td>
		<td><h6><center>Sf</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<td><h6><center>Cf</center></h6></td>
		<td><h6><center>Sf</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	
	$nilaitotalbmm = array();
	$querymhsbmm = mysql_query("SELECT * FROM siswa ORDER BY nim asc");
	$i=0;
	while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	{$querykriteriabmm = mysql_query("SELECT * FROM kriteria_bmm where nama_aspek='Akademik' ");
		for ($j=0;$j<6;$j++)
		{$cfactor = mysql_query("SELECT * FROM factor WHERE nama_factor = 'Core Factor'");
			$cfactorr = mysql_fetch_array($cfactor);//milih aspek
			$sfactor = mysql_query("SELECT * FROM factor WHERE nama_factor = 'Secondary Factor'");
			$sfactorr = mysql_fetch_array($sfactor);
			if($j == 0)
			{$jj= $j + 2;
			$jk=$j-1;
			$nilaitotalbmm[$i][$jk] = $mhsbmm[$i];
			$nilaitotalbmm[$i][$j] = $pengelompokanbmm[$i][$jj];
			}
			if($j == 1)
			{$jj= $j + 2;
			$nilaitotalbmm[$i][$j] = $pengelompokanbmm[$i][$jj];
			}
			if($j == 2)
			{$jj= $j + 1;
			$nilaitotalbmm[$i][$j] = $pengelompokanbmm[$i][$j]*$cfactorr['persentase']/100 + $pengelompokanbmm[$i][$jj]*$sfactorr['persentase']/100;}
			if($j == 3)
			{$jj= $j + 5;
			$nilaitotalbmm[$i][$j] = $pengelompokanbmm[$i][$jj];
			}
			if($j == 4)
			{$jj= $j + 5;
			$nilaitotalbmm[$i][$j] = $pengelompokanbmm[$i][$jj];
			}
			if($j == 5)
			{$jj= $j + 3;
			$jjj= $jj + 1;
			$nilaifinansial=$pengelompokanbmm[$i][$jj]*$cfactorr['persentase']/100 + $pengelompokanbmm[$i][$jjj]*$sfactorr['persentase']/100;;
			$nilaifinansialfix=number_format( $nilaifinansial,1);
			$nilaitotalbmm[$i][$j] = $nilaifinansialfix;
			}
			
			
					
			
		} // untuk while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
		 $i++;
	} // untuk while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	
	function tampiltabelnilaitotal($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="3" ><h6><center>Akademik</center></h6></td>
		<td colspan="3"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>Cf</center></h6></td>
		<td><h6><center>Sf</center></h6></td>
		<td><h6><center>Na</center></h6></td>
		<td><h6><center>Cf</center></h6></td>
		<td><h6><center>Sf</center></h6></td>
		<td><h6><center>Nf</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	
	
	$rangkingbmm = array();
	$querymhsbmm = mysql_query("SELECT * FROM siswa ORDER BY nim asc");
	$i=0;
	while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	{$querykriteriabmm = mysql_query("SELECT * FROM kriteria_bmm where nama_aspek='Akademik' ");
		for ($j=0;$j<6;$j++)
		{$akademik = mysql_query("SELECT * FROM aspek_bmm WHERE nama_aspek = 'Akademik'");
			$pakademik = mysql_fetch_array($akademik);//milih aspek
			$finansial = mysql_query("SELECT * FROM aspek_bmm WHERE nama_aspek = 'Finansial'");
			$pfinansial = mysql_fetch_array($finansial);
			if($j == 0)
			{$jj= $j + 2;
			$jk=$j-1;
			$rangkingbmm[$i][$jk] = $mhsbmm[$i];
			$rangkingbmm[$i][$j] = $nilaitotalbmm[$i][$jj];
			}
			if($j == 1)
			{$jj= $j + 4;
			$rangkingbmm[$i][$j] = $nilaitotalbmm[$i][$jj];
			}
			if($j == 2)
			{$jj= $j + 3;
			$rangkingbmm[$i][$j] = $nilaitotalbmm[$i][$j]*$pakademik['persentase']/100 + $nilaitotalbmm[$i][$jj]*$pfinansial['persentase']/100;}
			$namaa=$datamhsbmm['nama_mhs'];
			 mysql_query("update siswa set perhitungan='$rangkingbmm[$i][3]' where nama_mhs='$namaa'");
		} // untuk while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
		 $i++;
	} // untuk while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	
	function tampiltabelrangking($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
			  echo '
		<tr>
		<td><h6><center>Nama Mahasiswa</center></h6></td>
		<td><h6><center>Na</center></h6></td>
		<td><h6><center>Nf</center></h6></td>
		<td><h6><center>Ranking</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}	


	$mhsbmmrangking = array();
	$hasilrangkingbmm = array();
	
	for ($i=0;$i<count($mhsbmm);$i++)
	{
		$hasilrangkingbmm[$i] = $rangkingbmm[$i][2];
		$mhsbmmrangking[$i] = $mhsbmm[$i];
	}
	
	for ($i=0;$i<count($mhsbmm);$i++)
	{
		for ($j=$i;$j<count($mhsbmm);$j++)
		{
			if ($hasilrangkingbmm[$j] > $hasilrangkingbmm[$i])
			{
				$tmphasilbmm = $hasilrangkingbmm[$i];
				$tmpmhsbmm = $mhsbmmrangking[$i];
				$hasilrangkingbmm[$i] = $hasilrangkingbmm[$j];
				$mhsbmmrangking[$i] = $mhsbmmrangking[$j];
				$hasilrangkingbmm[$j] = $tmphasilbmm;
				$mhsbmmrangking[$j] = $tmpmhsbmm;
			}
		}
	}
	
				?>	
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
<div class="navbar navbar-inner block-header">
<div class="muted pull-left"><h4>Daftar Mahasiswa :</h4></div>
</div>
<?php tampilkolommahasiswa($mhsbmm); ?>

<div class="navbar navbar-inner block-header">
<div class="muted pull-left"><h4>Daftar Kriteria BMM :</h4></div>
</div>
<?php tampilbariskriteria($kriteriabmm); ?>
                
<div class="navbar navbar-inner block-header">
<div class="muted pull-left"><h4>Pemetaan GAP :</h4></div>
</div>
<?php tampiltabelpgap($mhsbmmxkriteria); ?>

<div class="navbar navbar-inner block-header">
<div class="muted pull-left"><h4>Profil Target :</h4></div>
</div>
<?php tampilbarispt($profil_targetbmm); ?>

<div class="navbar navbar-inner block-header">
<div class="muted pull-left"><h4>Selisih Pemetaan GAP dan Profil Target :</h4></div>
</div>
<?php tampiltabelselisih($selisihbmm); ?>

<div class="navbar navbar-inner block-header">
<div class="muted pull-left"><h4>Bobot Nilai GAP :</h4></div>
</div>
<?php tampiltabelbobot($bobotbmm); ?>

<div class="navbar navbar-inner block-header">
<div class="muted pull-left"><h4>Jenis Factor :</h4></div>
</div>
<?php tampilbarisfactor($factorbmm); ?>

<div class="navbar navbar-inner block-header">
<div class="muted pull-left"><h4>Pengelompokan Core dan Secondary Factor :</h4></div>
</div>
<?php tampiltabelpengelompokan($pengelompokanbmm); ?>

<div class="navbar navbar-inner block-header">
<div class="muted pull-left"><h4>Total Nilai Akademik dan Finansial :</h4></div>
</div>
<?php tampiltabelnilaitotal($nilaitotalbmm); ?>

<div class="navbar navbar-inner block-header">
<div class="muted pull-left"><h4>Total Nilai Ranking :</h4></div>
</div>
<?php tampiltabelrangking($rangkingbmm); ?>

 
 <?php for($i=0;$i<count($mhsbmmrangking);$i++)
 { 
 mysql_query("update siswa set perhitungan='$hasilrangkingbmm[$i]' where nama_mhs='$mhsbmmrangking[$i]'"); }?>




				
                            <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left"><h4>Daftar Mahasiswa yang Mendapatkan Bantuan Mahasiswa Miskin</h4>
                            </div>
                            </div>
                            	<div class="block-content collapse in">
                            	<div class="span12">
                                
                                   
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                        <thead>
                                            <tr>
                                            	<th>Nama</th>
                                                <th>Nim</th>
                                                <th>Program Studi</th>
                                                <th>Score</th>
                                            </tr>
                                        </thead>
                                        <?php
										$cl=warning;
										$sis=mysql_query("select * from siswa order by perhitungan desc limit 15");
										while ($datamhsbmm = mysql_fetch_array($sis))
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
                                            <td class="center"><?php echo"$datamhsbmm[nama_mhs]";?></td>
                                            <td class="center"><?php echo"$datamhsbmm[nim]";?></td>
                                            <td class="center"><?php echo"$datamhsbmm[prodi]";?></td>
											<td class="center"><?php $p=number_format( $datamhsbmm[perhitungan],2); echo"$p";?></td>
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
				
				if($_GET[hal] == 'awalperhitunganbmm')
				{
	
	function tampilbariskriteria($arr)
	{	
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table  table-bordered table-highlight">';
		echo '
		<tr>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<tr>';
		
		echo '<tr>';
			  for ($i=0;$i<count($arr);$i++)
			  {
			    echo '<td>'.$arr[$i].'</td>';
			  }
		echo "</tr>";
		echo '</table> </div></div>';
	}
	
	function tampilkolommahasiswa($arr)
	{
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table table-bordered table-highlight">';
		echo '
		<tr><td><h6>Nama Mahasiswa</h6></td>
		<tr>';
	  for ($i=0;$i<count($arr);$i++)
	  {
			echo '<tr>';
			    echo '<td>'.$arr[$i].'</td>';
			echo "</tr>";
	   }
		echo
		 '</table> </div></div>';
	}
    $mhsbmm = array();
	
	$querymhsbmm = mysql_query("SELECT * FROM siswa ORDER BY nim asc");
	$i=0;
	
	while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	{
		$mhsbmm[$i] = $datamhsbmm['nama_mhs'];
		$i++;
	} 
	
	
	
	$kriteriabmm = array(); //array("Harga", "Kualitas", "Fitur", "Populer", "Purna Jual", "Keawetan");
	
	$factorbmm = array(); //array("cost", "benefit", "benefit", "benefit", "benefit", "benefit");
	
	$profil_targetbmm = array(); //array(4, 5, 4, 3, 3, 2);

	$querykriteriabmm = mysql_query("SELECT * FROM kriteria_bmm ORDER BY no asc");
	$i=0;
	while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
	{
		$kriteriabmm[$i] = $datakriteriabmm['nama_kriteria'];
		$factorbmm[$i] = $datakriteriabmm['factor'];
		$profil_targetbmm[$i] = $datakriteriabmm['profil_target'];
		$i++;
	}   
	
	
				?>	
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
<div class="navbar navbar-inner block-header">
<div class="muted pull-left"><h4>Daftar Mahasiswa :</h4></div>
</div>
<?php tampilkolommahasiswa($mhsbmm); ?>

<div class="navbar navbar-inner block-header">
<div class="muted pull-left"><h4>Daftar Kriteria BMM :</h4></div>
</div>
<?php tampilbariskriteria($kriteriabmm); ?>
</div>
<div class="muted pull-right"><input type="button" class="btn btn-success" value="Next" onclick="window.location='cont.php?hal=langkahbmm1'"/><p><p></div>
</div>

                <?php
				}
				
				if($_GET[hal] == 'langkahbmm1')
				{
	
	function tampiltabel($arr)
	{
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
			  for ($j=0;$j<count($arr[$i]);$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	

	function tampilbarisfactor($arr)
	{	
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table  table-bordered table-highlight">';
		echo '
		<tr>
		<td rowspan="2" ><h6><center><br><p><p>Nama Factor</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<tr>';
		echo '<tr>
		<td><center>Jenis Factor</center></td>';
			  for ($i=0;$i<count($arr);$i++)
			  {
			    echo '<td>'.$arr[$i].'</td>';
			  }
		echo "</tr>";
		echo '</table> </div></div>';
	}
	function tampilbariskriteria($arr)
	{	
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table  table-bordered table-highlight">';
		echo '
		<tr>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<tr>';
		
		echo '<tr>';
			  for ($i=0;$i<count($arr);$i++)
			  {
			    echo '<td>'.$arr[$i].'</td>';
			  }
		echo "</tr>";
		echo '</table> </div></div>';
	}
	function tampilbarispt($arr)
	{	
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table  table-bordered table-highlight">';
		echo '
		<tr>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<tr>';
		
		echo '<tr>';
			  for ($i=0;$i<count($arr);$i++)
			  {
			    echo '<td>'.$arr[$i].'</td>';
			  }
		echo "</tr>";
		echo '</table> </div></div>';
	}

	function tampilkolom($arr)
	{
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table table-bordered table-highlight">';
	  for ($i=0;$i<count($arr);$i++)
	  {
			echo '<tr>';
			    echo '<td>'.$arr[$i].'</td>';
			echo "</tr>";
	   }
		echo
		 '</table> </div></div>';
	}
	function tampilkolommahasiswa($arr)
	{
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table table-bordered table-highlight">';
		echo '
		<tr><td><h6>Nama Mahasiswa</h6></td>
		<tr>';
	  for ($i=0;$i<count($arr);$i++)
	  {
			echo '<tr>';
			    echo '<td>'.$arr[$i].'</td>';
			echo "</tr>";
	   }
		echo
		 '</table> </div></div>';
	}
    $mhsbmm = array();
	
	$querymhsbmm = mysql_query("SELECT * FROM siswa ORDER BY nim asc");
	$i=0;
	
	while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	{
		$mhsbmm[$i] = $datamhsbmm['nama_mhs'];
		$i++;
	} 
	
	
	
	$kriteriabmm = array(); //array("Harga", "Kualitas", "Fitur", "Populer", "Purna Jual", "Keawetan");
	
	$factorbmm = array(); //array("cost", "benefit", "benefit", "benefit", "benefit", "benefit");
	
	$profil_targetbmm = array(); //array(4, 5, 4, 3, 3, 2);

	$querykriteriabmm = mysql_query("SELECT * FROM kriteria_bmm ORDER BY no asc");
	$i=0;
	while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
	{
		$kriteriabmm[$i] = $datakriteriabmm['nama_kriteria'];
		$factorbmm[$i] = $datakriteriabmm['factor'];
		$profil_targetbmm[$i] = $datakriteriabmm['profil_target'];
		$i++;
	}   
	
	$mhsbmmxkriteria = array();
	$querymhsbmm = mysql_query("SELECT * FROM siswa ORDER BY nim asc");
	$i=0;
	while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	{$querykriteriabmm = mysql_query("SELECT * FROM kriteria_bmm ORDER BY no asc ");
		$j=0;
		while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
		{
			$sub = mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = '$datakriteriabmm[nama_kriteria]'");
			$ssub = mysql_fetch_array($sub);//milih aspek
		
			$querymhsbmm2 = mysql_query("SELECT * FROM siswa WHERE nama_mhs = '$datamhsbmm[nama_mhs]'");
			$datamhsbmm2 = mysql_fetch_array($querymhsbmm2);//milih nama mhs
			
			if ($datakriteriabmm['nama_kriteria'] =="IPK")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmm['subkriteria'];$k++)
			{$kriteria = $datakriteriabmm['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = 'IPK' and no_sub = '$k'"));
			if ($datamhsbmm['ipk'] >= $pilihsub['rentang_bawah'] and $datamhsbmm['ipk'] <= $pilihsub['rentang_atas'])
			{
				$scoreipk = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "IPK")
		
		if ($datakriteriabmm['nama_kriteria'] =="Semester")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmm['subkriteria'];$k++)
			{$kriteria = $datakriteriabmm['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = 'Semester' and no_sub = '$k'"));
			if ($datamhsbmm['semester'] == $pilihsub['subkriteria'])
			{
				$scoresemester = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "Semester")
		if ($datakriteriabmm['nama_kriteria'] =="Penghasilan Orang Tua")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmm['subkriteria'];$k++)
			{$kriteria = $datakriteriabmm['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = 'Penghasilan Orang Tua' and no_sub = '$k'"));
			if ($datamhsbmm['penghasilan'] >= $pilihsub['rentang_bawah'] and $datamhsbmm['penghasilan'] <= $pilihsub['rentang_atas'])
			{
				$scorepenghasilan = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "Semester")
		
		
		if ($datakriteriabmm['nama_kriteria'] =="Jenis Tinggal")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmm['subkriteria'];$k++)
			{$kriteria = $datakriteriabmm['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = 'Jenis Tinggal' and no_sub = '$k'"));
			if ($datamhsbmm['jenis_tinggal'] == $pilihsub['subkriteria'])
			{
				$scorejenistinggal = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "jenistinggal")
		
		if ($datakriteriabmm['nama_kriteria'] =="Jumlah Tanggungan")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmm['subkriteria'];$k++)
			{$kriteria = $datakriteriabmm['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = 'Jumlah Tanggungan' and no_sub = '$k'"));
			if ($datamhsbmm['jumlah_tanggungan'] == $pilihsub['subkriteria'])
			{
				
				$scorejumlahtanggungan = $pilihsub['score'];
			}
			else if($datamhsbmm['jumlah_tanggungan'] > 3)
			{
				$scorejumlahtanggungan = 3;
			}
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "jumlah tanggungan")
		
		if ($datakriteriabmm['nama_kriteria'] =="Status Anak")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmm['subkriteria'];$k++)
			{$kriteria = $datakriteriabmm['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = 'Status Anak' and no_sub = '$k'"));
			if ($datamhsbmm['status_orangtua'] == $pilihsub['subkriteria'])
			{
				$scorestatusanak = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "Status Anak")
		
		
		
			if($j == 0)
			{$jk = $j- 1 ;
			$mhsbmmxkriteria[$i][$jk] = $mhsbmm[$i];
			$mhsbmmxkriteria[$i][$j] = $scoreipk;
			}
			if($j == 1)
			{
			$mhsbmmxkriteria[$i][$j] = $scoresemester;
			}
			if($j == 2)
			{
			$mhsbmmxkriteria[$i][$j] = $scorepenghasilan;
			}
			if($j == 3)
			{
			$mhsbmmxkriteria[$i][$j] = $scorejumlahtanggungan;
			}
			if($j == 4)
			{
			$mhsbmmxkriteria[$i][$j] = $scorestatusanak;
			}
			if($j == 5)
			{
			$mhsbmmxkriteria[$i][$j] = $scorejenistinggal;
			}
		$j++;
			
		} // untuk while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
		 $i++;
	} // untuk while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	    
	function tampiltabelpgap($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	
	$selisihbmm = array();
	
	for ($i=0;$i<count($mhsbmm);$i++)
	{
		for ($j=0;$j<count($kriteriabmm);$j++)
		{ 	$jk = 0-1 ;
			$selisihbmm[$i][$jk] = $mhsbmm[$i];
			$selisihbmm[$i][$j] = $mhsbmmxkriteria[$i][$j] -  $profil_targetbmm[$j] ;
		
		}
		
	}
	function tampiltabelselisih($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
		
	
				?>	
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">               
<div class="navbar navbar-inner block-header">
<div class="muted pull-left"><h4>Pemetaan GAP :</h4></div>
</div>
<?php tampiltabelpgap($mhsbmmxkriteria); ?>

<div class="navbar navbar-inner block-header">
<div class="muted pull-left"><h4>Profil Target :</h4></div>
</div>
<?php tampilbarispt($profil_targetbmm); ?>

<div class="navbar navbar-inner block-header">
<div class="muted pull-left"><h4>Selisih Pemetaan GAP dan Profil Target :</h4></div>
</div>
<?php tampiltabelselisih($selisihbmm); ?>

                        <!-- /block -->
                    </div>
                    <div class="muted pull-left"><input type="button" class="btn btn-success" value="Back" onclick="window.location='cont.php?hal=awalperhitunganbmm'"/><p><p></div>
                    <div class="muted pull-right"><input type="button" class="btn btn-success" value="Next" onclick="window.location='cont.php?hal=langkahbmm2'"/><p><p></div></div>
				
				<?php
				}
				if($_GET[hal] == 'beasiswabmb')
				{
					 $d=mysql_query("select * from mahasiswa_bmb order by nim asc");
                    
				?>	
				<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><h5>Data mahasiswa yang menerima Beasiswa Mahasiswa Berprestasi</h5></div>
                               <div class="muted pull-right">
							   <?php 
							   $p=mysql_fetch_array(mysql_query("select * from berita where judul_seo='pengumuman'"));
							   if($p[headline]=="N")
							   {
							   echo " <form method=post action=pengumumanon.php> "?>
							   <input name='pengumumanon' type='submit' id='submit' value='Aktifkan Pengumuman Penerima' />
							   <?php }
								else if($p[headline]=="Y")
							   {
							   echo " <form method=post action=pengumumanoff.php> "?>
							   <input name='pengumumanoff' type='submit' id='submit' value='Non-Aktifkan Pengumuman Penerima' />
							   <?php }
							   ?>
							   
							   <p><p></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>NIM</th>
                                                <th>Tempat, Tanggal Lahir</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Program Studi</th>
                                                <th>Nilai</th>
                                            </tr>
                                        </thead>
                                        <?php
										$cl=warning;
										$sis=mysql_query("select * from mahasiswa_bmb order by preferensi desc limit 10");
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
                                                <td><?php echo" $r[tempat_ttl] , $r[tanggal_ttl]";?></td>
                                                <td><?php echo" $r[jk]";?> </td>
                                                <td><?php echo" $r[prodi]";?> </td>
                                                <td class="center"><?php $p=number_format( $r[preferensi],2); echo"$p";?></td>
                                            </tr>
                                            <?php
										}
										?>
                                        </tbody>
                                    </table>
                                </div>
                                <table width="150" border="0" cellspacing="0" cellpadding="0" align="center">
  <tbody>
    <tr>
       <td>&nbsp;</td>
    </tr>
    <tr>
      <td> <input type="button" class="btn btn-success" value="Cetak Laporan" onclick="window.location='cetak-bmb.php'"/></td>
    </tr>
  </tbody>
  
</table>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
				
				
				
				
				
				<?php

				}
				
				if($_GET[hal] == 'semuamahasiswa')
				{
					 $d=mysql_query("select * from siswa order by nim asc");
                    
				?>	
				<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Periode</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                  <form method="post" action="<?php echo $PHP_SELF ?>">
											<label class="control-label">Pilih Periode</label>
											<!--<select name='factor' /> -->
                                           	
											<?php if($_GET[id]=="2017"){
				  echo"
				   <select name='periode'/>
			<option value=''>Pilih Periode</option>
			<option value='2017' selected>2017</option>
			<option value='2018'>2018</option>
			<option value='2019'>2019</option>
			</select>
				  ";
				  
				  }
				  
				 else if($_GET[id]=="2018"){
				  echo"
				   <select name='periode'/>
			<option value=''>Pilih Periode</option>
			<option value='2017'>2017</option>
			<option value='2018' selected>2018</option>
			<option value='2019'>2019</option>
			</select>
				  ";
				  
				  }
				  
				  else if($_GET[id]=="2019"){
				  echo"
				   <select name='periode'/>
			<option value=''>Pilih Periode</option>
			<option value='2017'>2017</option>
			<option value='2018'>2018</option>
			<option value='2019' selected>2019</option>
			</select>
				  ";
				  
				  }
				  
				  else{
					  echo"
					   <select name='periode'/>
			<option value='' selected>Pilih Periode</option>
			<option value='2017'>2017</option>
			<option value='2018'>2018</option>
			<option value='2019'>2019</option>
			</select>
				  ";
					  } ?> 
				  							
											<div class="control-group">
											<input name="submitperiode" type="submit" value="Submit" />
											</div>
									</form>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!-- /block -->
				<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Data seluruh mahasiswa yang mendaftar Beasiswa</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>NIM</th>
                                                <th>Tempat, Tanggal Lahir</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Program Studi</th>
                                                <th>No. HP</th>
                                                <th>Alamat</th>
                                                
                                            </tr>
                                        </thead>
                                        <?php
										$cl=warning;
										$sis=mysql_query("select nama_mhs, nim, tempat_ttl, tanggal_ttl, jk, prodi, no_hp_mhs, alamat_mhs, status from mahasiswa_bmb where tahun='$_GET[id]' union select nama_mhs, nim, tempat_ttl, tanggal_ttl, jk, prodi, no_hp_mhs, alamat_mhs, status from siswa where tahun='$_GET[id]'");
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
                                                <td><?php echo" $r[tempat_ttl] , $r[tanggal_ttl]";?></td>
                                                <td><?php echo" $r[jk]";?> </td>
                                                <td><?php echo" $r[prodi]";?> </td>
                                                <td><?php echo" $r[no_hp_mhs]";?> </td>
                                                <td><?php echo" $r[alamat_mhs]";?></td>
                                               
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
				if($_GET[module] == 'add')
				{
				?>		
			     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">tambah berita </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                  <form method="post" action="<?php echo $PHP_SELF ?>">
											<div class="control-group">
											<label class="control-label">Judul Berita&nbsp;&nbsp;</label>
											<div class="controls">
											<input name="judul" type="text" class="span6 m-wrap" required/>
											</div>
											</div>
                                            <div class="control-group">
											<label class="control-label">Headline&nbsp;&nbsp;</label>
											<div class="controls">
											<select name='headline'/>
			<option value=''>Pilih Headline</option>
			<option value='Y'>Tampilkan di Headline</option>
			<option value='N'>Jangan Tampilkan di Headline</option>
			</select>
											</div>
											</div>
											<div class="control-group">
											<label class="control-label">Isi Berita&nbsp;&nbsp;</label>
											<div class="controls">
											<textarea  id="travaweb" name="isi_berita"  width="100%"/></textarea>
											</div>
											</div>
											<div class="control-group">
											<input name="berita" type="submit" value="simpan berita" />
											</div>
									</form>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                <?php
				}
				
				if($_GET[module] == 'addbobot')
				{
				?>		
			     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">tambah bobot </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                  <form method="post" action="<?php echo $PHP_SELF ?>">
											<div class="control-group">
											<label class="control-label">Selisih&nbsp;&nbsp;</label>
											<div class="controls">
											<input name="selisih" type="text" class="span1 m-wrap" required/>
											</div>
											</div>
                                            <div class="control-group">
											<label class="control-label">Bobot&nbsp;&nbsp;</label>
											<div class="controls">
											<input name="nilai" type="text" class="span1 m-wrap" required/>
											</div>
											</div>
                                            
											<div class="control-group">
											<input name="bobot" type="submit" value="Tambah Bobot" />
											</div>
									</form>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                <?php
				}
				
				if($_GET[module] == 'addaspekbmm')
				{
				?>		
			     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Tambah Aspek BMM </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                  <form method="post" action="<?php echo $PHP_SELF ?>">
											<div class="control-group">
											<label class="control-label">Nama Aspek</label>
											<div class="controls">
											<input name="nama_aspek" type="text" class="span2 m-wrap" required/>
											</div>
											</div>
                                            <div class="control-group">
											<label class="control-label">Persentase</label>
											<div class="controls">
											<input name="persentase" type="text" class="span1 m-wrap" value="0" readonly required/>
											</div>
											</div>
											
											<div class="control-group">
											<input name="tambah_aspek" type="submit" value="Tambah Aspek" />
											</div>
									</form>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                <?php
				}
				
				if($_GET[module] == 'addaspekbmb')
				{
				?>		
			     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Tambah Aspek BMB </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                  <form method="post" action="<?php echo $PHP_SELF ?>">
											<div class="control-group">
											<label class="control-label">Nama Aspek</label>
											<div class="controls">
											<input name="nama_aspek" type="text" class="span2 m-wrap" required/>
											</div>
											</div>
                                            <div class="control-group">
											<label class="control-label">Persentase</label>
											<div class="controls">
											<input name="persentase" type="text" class="span1 m-wrap" value="0" readonly required/>
											</div>
											</div>
											
											<div class="control-group">
											<input name="tambah_aspek2" type="submit" value="Tambah Aspek" />
											</div>
									</form>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                <?php
				}
				
				if($_GET[hal] == 'edit')
				{
			    $e=mysql_fetch_array(mysql_query("select * from berita where id_berita='$_GET[id]'"));
				?>
				  <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">edit berita </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                  <form method="post" action="<?php echo $PHP_SELF ?>">
											<div class="control-group">
											<label class="control-label">judul berita&nbsp;&nbsp;</label>
											<div class="controls">
											<input name="judul" type="text" class="span6 m-wrap" value="<?php echo "$e[judul]";?>" required/>
												<input name="id" type="hidden" class="span6 m-wrap" value="<?php echo "$e[id_berita]";?>" required/>
											</div>
											</div>
                                            <div class="control-group">
											<label class="control-label">Headline&nbsp;&nbsp;</label>
											<div class="controls">
											<?php if($e['headline']=="Y"){
				  echo"
				   <select name='headline'/>
			<option value=''>Pilih Headline</option>
			<option value='Y' selected>Tampilkan di Headline</option>
			<option value='N'>Jangan Tampilkan di Headline</option>
			</select>
				  ";
				  
				  }else{
					  echo"
					   <select name='headline'/>
			<option value=''>Pilih Headline</option>
			<option value='Y'>Tampilkan di Headline</option>
			<option value='N' selected>Jangan Tampilkan di Headline</option>
			</select>";
					  } ?>
											</div>
											</div>
											<div class="control-group">
											<label class="control-label">isi berita&nbsp;&nbsp;</label>
											<div class="controls">
											<textarea  id="travaweb" name="isi_berita"  width="100%"/><?php echo "$e[isi_berita]";?></textarea>
											</div>
											</div>
											<div class="control-group">
											<input name="update" type="submit" value="simpan berita" />
											</div>
									</form>
                                </div>
                            </div>
                        </div>
                         <?php
				}
				if($_GET[hal] == 'editkriteria')
				{
			    $e=mysql_fetch_array(mysql_query("select * from kriteria_bmm where nama_kriteria='$_GET[id]'"));
				?>
				  <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Edit Kriteria</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                  <form method="post" action="<?php echo $PHP_SELF ?>">
											<div class="control-group">
											<label class="control-label">Nama Kriteria</label>
                                            
											<div class="controls">
											<input name="nama_kriteria" type="text" class="span6 m-wrap" value="<?php echo "$e[nama_kriteria]";?>" required/>
                                            <label class="control-label">Factor</label>
											<!--<select name='factor' /> -->
                                            <?php if($e['factor']=="Core"){
				  echo"
				   <select name='factor'/>
			<option value=''>Pilih Jenis Factor</option>
			<option value='Core' selected>Core Factor</option>
			<option value='Secondary'>Secondary Factor</option>
			</select>
				  ";
				  
				  }else{
					  echo"
					   <select name='factor'/>
			<option value=''>Pilih Jenis Factor</option>
			<option value='Core'>Core Factor</option selected>
			<option value='Secondary' selected>Secondary Factor</option>
			</select>";
					  } ?>
											<div class="control-group">
											<label class="control-label">Profil Target</label>
                                            
											<div class="controls">
											<input name="profil_target" type="text" class="span6 m-wrap" value="<?php echo "$e[profil_target]";?>" required/>
											</div>
                                            </div>
                                            </div>
                                            </div>
											
											<div class="control-group">
											<input name="updatekri" type="submit" value="Update" />
											</div>
									</form>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!-- /block -->
               <?php
				}
				
				if($_GET[hal] == 'editbobot')
				{
			    $e=mysql_fetch_array(mysql_query("select * from bobot where selisih='$_GET[id]'"));
				?>
				  <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Edit Bobot</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                  <form method="post" action="<?php echo $PHP_SELF ?>">
											<div class="control-group">
											<label class="control-label">Selisih</label>
                                            
											<div class="controls">
											<input name="selisih" type="text" class="span1 m-wrap" value="<?php echo "$e[selisih]";?>" required/>
                                            <div class="control-group">
											<label class="control-label">Bobot</label>
                                            
											<div class="controls">
											<input name="nilai" type="text" class="span1 m-wrap" value="<?php echo "$e[nilai]";?>" required/>
											</div>
                                            </div>
                                            </div>
                                            </div>
											
											<div class="control-group">
											<input name="updatebobot" type="submit" value="Update" />
											</div>
									</form>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!-- /block -->
               <?php
				}
				if($_GET[hal] == 'langkahbmm3')
				{
	function tampiltabel($arr)
	{
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
			  for ($j=0;$j<count($arr[$i]);$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	

	function tampilbarisfactor($arr)
	{	
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table  table-bordered table-highlight">';
		echo '
		<tr>
		<td rowspan="2" ><h6><center><br><p><p>Nama Factor</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<tr>';
		echo '<tr>
		<td><center>Jenis Factor</center></td>';
			  for ($i=0;$i<count($arr);$i++)
			  {
			    echo '<td>'.$arr[$i].'</td>';
			  }
		echo "</tr>";
		echo '</table> </div></div>';
	}
	function tampilbariskriteria($arr)
	{	
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table  table-bordered table-highlight">';
		echo '
		<tr>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<tr>';
		
		echo '<tr>';
			  for ($i=0;$i<count($arr);$i++)
			  {
			    echo '<td>'.$arr[$i].'</td>';
			  }
		echo "</tr>";
		echo '</table> </div></div>';
	}
	function tampilbarispt($arr)
	{	
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table  table-bordered table-highlight">';
		echo '
		<tr>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<tr>';
		
		echo '<tr>';
			  for ($i=0;$i<count($arr);$i++)
			  {
			    echo '<td>'.$arr[$i].'</td>';
			  }
		echo "</tr>";
		echo '</table> </div></div>';
	}

	function tampilkolom($arr)
	{
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table table-bordered table-highlight">';
	  for ($i=0;$i<count($arr);$i++)
	  {
			echo '<tr>';
			    echo '<td>'.$arr[$i].'</td>';
			echo "</tr>";
	   }
		echo
		 '</table> </div></div>';
	}
	function tampilkolommahasiswa($arr)
	{
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table table-bordered table-highlight">';
		echo '
		<tr><td><h6>Nama Mahasiswa</h6></td>
		<tr>';
	  for ($i=0;$i<count($arr);$i++)
	  {
			echo '<tr>';
			    echo '<td>'.$arr[$i].'</td>';
			echo "</tr>";
	   }
		echo
		 '</table> </div></div>';
	}
    $mhsbmm = array();
	
	$querymhsbmm = mysql_query("SELECT * FROM siswa ORDER BY nim asc");
	$i=0;
	
	while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	{
		$mhsbmm[$i] = $datamhsbmm['nama_mhs'];
		$i++;
	} 
	
	
	
	$kriteriabmm = array(); //array("Harga", "Kualitas", "Fitur", "Populer", "Purna Jual", "Keawetan");
	
	$factorbmm = array(); //array("cost", "benefit", "benefit", "benefit", "benefit", "benefit");
	
	$profil_targetbmm = array(); //array(4, 5, 4, 3, 3, 2);

	$querykriteriabmm = mysql_query("SELECT * FROM kriteria_bmm ORDER BY no asc");
	$i=0;
	while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
	{
		$kriteriabmm[$i] = $datakriteriabmm['nama_kriteria'];
		$factorbmm[$i] = $datakriteriabmm['factor'];
		$profil_targetbmm[$i] = $datakriteriabmm['profil_target'];
		$i++;
	}   
	
	$mhsbmmxkriteria = array();
	$querymhsbmm = mysql_query("SELECT * FROM siswa ORDER BY nim asc");
	$i=0;
	while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	{$querykriteriabmm = mysql_query("SELECT * FROM kriteria_bmm ORDER BY no asc ");
		$j=0;
		while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
		{
			$sub = mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = '$datakriteriabmm[nama_kriteria]'");
			$ssub = mysql_fetch_array($sub);//milih aspek
		
			$querymhsbmm2 = mysql_query("SELECT * FROM siswa WHERE nama_mhs = '$datamhsbmm[nama_mhs]'");
			$datamhsbmm2 = mysql_fetch_array($querymhsbmm2);//milih nama mhs
			
			if ($datakriteriabmm['nama_kriteria'] =="IPK")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmm['subkriteria'];$k++)
			{$kriteria = $datakriteriabmm['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = 'IPK' and no_sub = '$k'"));
			if ($datamhsbmm['ipk'] >= $pilihsub['rentang_bawah'] and $datamhsbmm['ipk'] <= $pilihsub['rentang_atas'])
			{
				$scoreipk = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "IPK")
		
		if ($datakriteriabmm['nama_kriteria'] =="Semester")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmm['subkriteria'];$k++)
			{$kriteria = $datakriteriabmm['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = 'Semester' and no_sub = '$k'"));
			if ($datamhsbmm['semester'] == $pilihsub['subkriteria'])
			{
				$scoresemester = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "Semester")
		if ($datakriteriabmm['nama_kriteria'] =="Penghasilan Orang Tua")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmm['subkriteria'];$k++)
			{$kriteria = $datakriteriabmm['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = 'Penghasilan Orang Tua' and no_sub = '$k'"));
			if ($datamhsbmm['penghasilan'] >= $pilihsub['rentang_bawah'] and $datamhsbmm['penghasilan'] <= $pilihsub['rentang_atas'])
			{
				$scorepenghasilan = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "Semester")
		
		
		if ($datakriteriabmm['nama_kriteria'] =="Jenis Tinggal")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmm['subkriteria'];$k++)
			{$kriteria = $datakriteriabmm['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = 'Jenis Tinggal' and no_sub = '$k'"));
			if ($datamhsbmm['jenis_tinggal'] == $pilihsub['subkriteria'])
			{
				$scorejenistinggal = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "jenistinggal")
		
		if ($datakriteriabmm['nama_kriteria'] =="Jumlah Tanggungan")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmm['subkriteria'];$k++)
			{$kriteria = $datakriteriabmm['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = 'Jumlah Tanggungan' and no_sub = '$k'"));
			if ($datamhsbmm['jumlah_tanggungan'] == $pilihsub['subkriteria'])
			{
				$scorejumlahtanggungan = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			else if($datamhsbmm['jumlah_tanggungan'] > 3)
			{
				$scorejumlahtanggungan = 3;
			}
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "jumlah tanggungan")
		
		if ($datakriteriabmm['nama_kriteria'] =="Status Anak")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmm['subkriteria'];$k++)
			{$kriteria = $datakriteriabmm['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = 'Status Anak' and no_sub = '$k'"));
			if ($datamhsbmm['status_orangtua'] == $pilihsub['subkriteria'])
			{
				$scorestatusanak = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "Status Anak")
		
		
		
			if($j == 0)
			{$jk = $j- 1 ;
			$mhsbmmxkriteria[$i][$jk] = $mhsbmm[$i];
			$mhsbmmxkriteria[$i][$j] = $scoreipk;
			}
			if($j == 1)
			{
			$mhsbmmxkriteria[$i][$j] = $scoresemester;
			}
			if($j == 2)
			{
			$mhsbmmxkriteria[$i][$j] = $scorepenghasilan;
			}
			if($j == 3)
			{
			$mhsbmmxkriteria[$i][$j] = $scorejumlahtanggungan;
			}
			if($j == 4)
			{
			$mhsbmmxkriteria[$i][$j] = $scorestatusanak;
			}
			if($j == 5)
			{
			$mhsbmmxkriteria[$i][$j] = $scorejenistinggal;
			}
		$j++;
			
		} // untuk while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
		 $i++;
	} // untuk while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	    
	function tampiltabelpgap($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	
	$selisihbmm = array();
	
	for ($i=0;$i<count($mhsbmm);$i++)
	{
		for ($j=0;$j<count($kriteriabmm);$j++)
		{ 	$jk = 0-1 ;
			$selisihbmm[$i][$jk] = $mhsbmm[$i];
			$selisihbmm[$i][$j] = $mhsbmmxkriteria[$i][$j] -  $profil_targetbmm[$j] ;
		
		}
		
	}
	function tampiltabelselisih($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
		
	
	$bobotbmm = array();
	
	for ($i=0;$i<count($mhsbmm);$i++)
	{
		for ($j=0;$j<count($kriteriabmm);$j++)
		{ $querybobotbmm = mysql_query("SELECT * FROM bobot");
	      while ($databobotbmm = mysql_fetch_array($querybobotbmm))
			{ if($selisihbmm[$i][$j] == $databobotbmm['selisih'])
			{
				$jk = 0-1 ;
				$bobotbmm[$i][$jk] = $mhsbmm[$i];
				$bobotbmm[$i][$j] = $databobotbmm['nilai']; 
			}
			}
		}
		
	}
	function tampiltabelbobot($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	
	$pengelompokanbmm = array();
	$querymhsbmm = mysql_query("SELECT * FROM siswa ORDER BY nim asc");
	$i=0;
	while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	{
		$querykriteriabmm1 = mysql_query("SELECT * FROM kriteria_bmm ");
		$jumlah=mysql_num_rows($querykriteriabmm1);
		$jumlahh= $jumlah + 4;
		$cffinfix=0;
		$sffinfix=0;
		for ($j=0;$j<$jumlahh;$j++)
		{$querykriteriabmm1 = mysql_query("SELECT * FROM kriteria_bmm where nama_aspek='Akademik' ");
		 while ($datakriteriabmm1 = mysql_fetch_array($querykriteriabmm1))
			{		
			if ($datakriteriabmm1['factor'] =="Core")  
				{ $jj = $j - 2;
				$cfaka = $bobotbmm[$i][$jj];
				}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			if ($datakriteriabmm1['factor'] =="Secondary")  
			{ $jj = $j - 2;
				$sfaka = $bobotbmm[$i][$jj];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			}
			$querykriteriabmm2 = mysql_query("SELECT * FROM kriteria_bmm where nama_aspek='Finansial' ");
		 while ($datakriteriabmm2 = mysql_fetch_array($querykriteriabmm2))
			{if ($datakriteriabmm2['nama_kriteria'] == "Penghasilan Orang Tua")
			{if ($datakriteriabmm2['factor'] =="Core")  
				{ 
				$cffin1 = $bobotbmm[$i][2];
				}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			if ($datakriteriabmm2['factor'] =="Secondary")  
			{ $jj = $j - 2;
				$sffin1 = $bobotbmm[$i][2];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			}
			if ($datakriteriabmm2['nama_kriteria'] == "Jumlah Tanggungan")
			{if ($datakriteriabmm2['factor'] =="Core")  
				{ 
				$cffin2 = $bobotbmm[$i][3];
				}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			if ($datakriteriabmm2['factor'] =="Secondary")  
			{ $jj = $j - 2;
				$sffin2 = $bobotbmm[$i][3];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			}
			if ($datakriteriabmm2['nama_kriteria'] == "Status Anak")
			{if ($datakriteriabmm2['factor'] =="Core")  
				{ 
				$cffin3 = $bobotbmm[$i][4];
				}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			if ($datakriteriabmm2['factor'] =="Secondary")  
			{ $jj = $j - 2;
				$sffin3 = $bobotbmm[$i][4];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			}
			if ($datakriteriabmm2['nama_kriteria'] == "Jenis Tinggal")
			{if ($datakriteriabmm2['factor'] =="Core")  
				{ 
				$cffin4 = $bobotbmm[$i][5];
				}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			if ($datakriteriabmm2['factor'] =="Secondary")  
			{ $jj = $j - 2;
				$sffin4 = $bobotbmm[$i][5];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			}
			
			}
			$cfactorr = mysql_query("SELECT * FROM kriteria_bmm WHERE nama_aspek= 'Finansial' and factor = 'Core'");
			$jumlahcore=mysql_num_rows($cfactorr);
			$sfactorr = mysql_query("SELECT * FROM kriteria_bmm WHERE nama_aspek= 'Finansial' and factor = 'Secondary'");
			$jumlahsecondary=mysql_num_rows($sfactorr);
			$cffinfix = ($cffin1 + $cffin2 + $cffin3 + $cffin4)/$jumlahcore;
			$sffinfix = ($sffin1 + $sffin2 + $sffin3 + $sffin4)/$jumlahsecondary;
						
			if($j == 0)
			{$jk=$j-1;
			$pengelompokanbmm[$i][$jk] = $mhsbmm[$i];
			$pengelompokanbmm[$i][$j] = $bobotbmm[$i][$j];
			}
			if($j == 1)
			{
			$pengelompokanbmm[$i][$j] = $bobotbmm[$i][$j];
			}
			if($j == 2)
			{
			$pengelompokanbmm[$i][$j] = $cfaka;
			}
			if($j == 3)
			{
			$pengelompokanbmm[$i][$j] = $sfaka;
			}
			if($j == 4)
			{$jj= $j - 2;
			$pengelompokanbmm[$i][$j] = $bobotbmm[$i][$jj];
			}
			if($j == 5)
			{$jj= $j - 2;
			$pengelompokanbmm[$i][$j] = $bobotbmm[$i][$jj];
			}
			if($j == 6)
			{$jj= $j - 2;
			$pengelompokanbmm[$i][$j] = $bobotbmm[$i][$jj];
			}
			if($j == 7)
			{$jj= $j - 2;
			$pengelompokanbmm[$i][$j] = $bobotbmm[$i][$jj];
			}
			if($j == 8)
			{$cffinfixx=number_format( $cffinfix,2);
			$pengelompokanbmm[$i][$j] = $cffinfixx;
			}
			if($j == 9)
			{$sffinfixx=number_format( $sffinfix,2);
			$pengelompokanbmm[$i][$j] = $sffinfix;
			}
			
		} // untuk while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
		 $i++;
	} // untuk while ($datamhsbmm = mysql_fetch_array($querymhsbmm))	
	function tampiltabelpengelompokan($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="4" ><h6><center>Akademik</center></h6></td>
		<td colspan="6"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>Cf</center></h6></td>
		<td><h6><center>Sf</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<td><h6><center>Cf</center></h6></td>
		<td><h6><center>Sf</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	
	
				?>	
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">


<div class="navbar navbar-inner block-header">
<div class="muted pull-left"><h4>Jenis Factor :</h4></div>
</div>
<?php tampilbarisfactor($factorbmm); ?>

<div class="navbar navbar-inner block-header">
<div class="muted pull-left"><h4>Pengelompokan Core dan Secondary Factor :</h4></div>
</div>
<?php tampiltabelpengelompokan($pengelompokanbmm); ?></div>
</div>
                    <div class="muted pull-left"><input type="button" class="btn btn-success" value="Back" onclick="window.location='cont.php?hal=langkahbmm2'"/><p><p></div>
                    <div class="muted pull-right"><input type="button" class="btn btn-success" value="Next" onclick="window.location='cont.php?hal=langkahbmm4'"/><p><p></div></div>


                <?php
				}
				if($_GET[hal] == 'langkahbmm2')
				{
	function tampiltabel($arr)
	{
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
			  for ($j=0;$j<count($arr[$i]);$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	

	function tampilbarisfactor($arr)
	{	
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table  table-bordered table-highlight">';
		echo '
		<tr>
		<td rowspan="2" ><h6><center><br><p><p>Nama Factor</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<tr>';
		echo '<tr>
		<td><center>Jenis Factor</center></td>';
			  for ($i=0;$i<count($arr);$i++)
			  {
			    echo '<td>'.$arr[$i].'</td>';
			  }
		echo "</tr>";
		echo '</table> </div></div>';
	}
	function tampilbariskriteria($arr)
	{	
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table  table-bordered table-highlight">';
		echo '
		<tr>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<tr>';
		
		echo '<tr>';
			  for ($i=0;$i<count($arr);$i++)
			  {
			    echo '<td>'.$arr[$i].'</td>';
			  }
		echo "</tr>";
		echo '</table> </div></div>';
	}
	function tampilbarispt($arr)
	{	
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table  table-bordered table-highlight">';
		echo '
		<tr>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<tr>';
		
		echo '<tr>';
			  for ($i=0;$i<count($arr);$i++)
			  {
			    echo '<td>'.$arr[$i].'</td>';
			  }
		echo "</tr>";
		echo '</table> </div></div>';
	}

	function tampilkolom($arr)
	{
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table table-bordered table-highlight">';
	  for ($i=0;$i<count($arr);$i++)
	  {
			echo '<tr>';
			    echo '<td>'.$arr[$i].'</td>';
			echo "</tr>";
	   }
		echo
		 '</table> </div></div>';
	}
	function tampilkolommahasiswa($arr)
	{
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table table-bordered table-highlight">';
		echo '
		<tr><td><h6>Nama Mahasiswa</h6></td>
		<tr>';
	  for ($i=0;$i<count($arr);$i++)
	  {
			echo '<tr>';
			    echo '<td>'.$arr[$i].'</td>';
			echo "</tr>";
	   }
		echo
		 '</table> </div></div>';
	}
    $mhsbmm = array();
	
	$querymhsbmm = mysql_query("SELECT * FROM siswa ORDER BY nim asc");
	$i=0;
	
	while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	{
		$mhsbmm[$i] = $datamhsbmm['nama_mhs'];
		$i++;
	} 
	
	
	
	$kriteriabmm = array(); //array("Harga", "Kualitas", "Fitur", "Populer", "Purna Jual", "Keawetan");
	
	$factorbmm = array(); //array("cost", "benefit", "benefit", "benefit", "benefit", "benefit");
	
	$profil_targetbmm = array(); //array(4, 5, 4, 3, 3, 2);

	$querykriteriabmm = mysql_query("SELECT * FROM kriteria_bmm ORDER BY no asc");
	$i=0;
	while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
	{
		$kriteriabmm[$i] = $datakriteriabmm['nama_kriteria'];
		$factorbmm[$i] = $datakriteriabmm['factor'];
		$profil_targetbmm[$i] = $datakriteriabmm['profil_target'];
		$i++;
	}   
	
	$mhsbmmxkriteria = array();
	$querymhsbmm = mysql_query("SELECT * FROM siswa ORDER BY nim asc");
	$i=0;
	while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	{$querykriteriabmm = mysql_query("SELECT * FROM kriteria_bmm ORDER BY no asc ");
		$j=0;
		while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
		{
			$sub = mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = '$datakriteriabmm[nama_kriteria]'");
			$ssub = mysql_fetch_array($sub);//milih aspek
		
			$querymhsbmm2 = mysql_query("SELECT * FROM siswa WHERE nama_mhs = '$datamhsbmm[nama_mhs]'");
			$datamhsbmm2 = mysql_fetch_array($querymhsbmm2);//milih nama mhs
			
			if ($datakriteriabmm['nama_kriteria'] =="IPK")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmm['subkriteria'];$k++)
			{$kriteria = $datakriteriabmm['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = 'IPK' and no_sub = '$k'"));
			if ($datamhsbmm['ipk'] >= $pilihsub['rentang_bawah'] and $datamhsbmm['ipk'] <= $pilihsub['rentang_atas'])
			{
				$scoreipk = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "IPK")
		
		if ($datakriteriabmm['nama_kriteria'] =="Semester")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmm['subkriteria'];$k++)
			{$kriteria = $datakriteriabmm['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = 'Semester' and no_sub = '$k'"));
			if ($datamhsbmm['semester'] == $pilihsub['subkriteria'])
			{
				$scoresemester = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "Semester")
		if ($datakriteriabmm['nama_kriteria'] =="Penghasilan Orang Tua")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmm['subkriteria'];$k++)
			{$kriteria = $datakriteriabmm['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = 'Penghasilan Orang Tua' and no_sub = '$k'"));
			if ($datamhsbmm['penghasilan'] >= $pilihsub['rentang_bawah'] and $datamhsbmm['penghasilan'] <= $pilihsub['rentang_atas'])
			{
				$scorepenghasilan = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "Semester")
		
		
		if ($datakriteriabmm['nama_kriteria'] =="Jenis Tinggal")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmm['subkriteria'];$k++)
			{$kriteria = $datakriteriabmm['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = 'Jenis Tinggal' and no_sub = '$k'"));
			if ($datamhsbmm['jenis_tinggal'] == $pilihsub['subkriteria'])
			{
				$scorejenistinggal = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "jenistinggal")
		
		if ($datakriteriabmm['nama_kriteria'] =="Jumlah Tanggungan")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmm['subkriteria'];$k++)
			{$kriteria = $datakriteriabmm['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = 'Jumlah Tanggungan' and no_sub = '$k'"));
			if ($datamhsbmm['jumlah_tanggungan'] == $pilihsub['subkriteria'])
			{
				$scorejumlahtanggungan = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			else if($datamhsbmm['jumlah_tanggungan'] > 3)
			{
				$scorejumlahtanggungan = 3;
			}
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "jumlah tanggungan")
		
		if ($datakriteriabmm['nama_kriteria'] =="Status Anak")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmm['subkriteria'];$k++)
			{$kriteria = $datakriteriabmm['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = 'Status Anak' and no_sub = '$k'"));
			if ($datamhsbmm['status_orangtua'] == $pilihsub['subkriteria'])
			{
				$scorestatusanak = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "Status Anak")
		
		
		
			if($j == 0)
			{$jk = $j- 1 ;
			$mhsbmmxkriteria[$i][$jk] = $mhsbmm[$i];
			$mhsbmmxkriteria[$i][$j] = $scoreipk;
			}
			if($j == 1)
			{
			$mhsbmmxkriteria[$i][$j] = $scoresemester;
			}
			if($j == 2)
			{
			$mhsbmmxkriteria[$i][$j] = $scorepenghasilan;
			}
			if($j == 3)
			{
			$mhsbmmxkriteria[$i][$j] = $scorejumlahtanggungan;
			}
			if($j == 4)
			{
			$mhsbmmxkriteria[$i][$j] = $scorestatusanak;
			}
			if($j == 5)
			{
			$mhsbmmxkriteria[$i][$j] = $scorejenistinggal;
			}
		$j++;
			
		} // untuk while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
		 $i++;
	} // untuk while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	    
	function tampiltabelpgap($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	
	$selisihbmm = array();
	
	for ($i=0;$i<count($mhsbmm);$i++)
	{
		for ($j=0;$j<count($kriteriabmm);$j++)
		{ 	$jk = 0-1 ;
			$selisihbmm[$i][$jk] = $mhsbmm[$i];
			$selisihbmm[$i][$j] = $mhsbmmxkriteria[$i][$j] -  $profil_targetbmm[$j] ;
		
		}
		
	}
	function tampiltabelselisih($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
		
	
	$bobotbmm = array();
	
	for ($i=0;$i<count($mhsbmm);$i++)
	{
		for ($j=0;$j<count($kriteriabmm);$j++)
		{ $querybobotbmm = mysql_query("SELECT * FROM bobot");
	      while ($databobotbmm = mysql_fetch_array($querybobotbmm))
			{ if($selisihbmm[$i][$j] == $databobotbmm['selisih'])
			{
				$jk = 0-1 ;
				$bobotbmm[$i][$jk] = $mhsbmm[$i];
				$bobotbmm[$i][$j] = $databobotbmm['nilai']; 
			}
			}
		}
		
	}
	function tampiltabelbobot($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	
				?>	
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">


<div class="navbar navbar-inner block-header">
<div class="muted pull-left"><h4>Bobot Nilai GAP :</h4></div>
</div>
<?php tampiltabelbobot($bobotbmm); ?>

                    </div>
                    
                    <div class="muted pull-left"><input type="button" class="btn btn-success" value="Back" onclick="window.location='cont.php?hal=langkahbmm1'"/><p><p></div>
                    <div class="muted pull-right"><input type="button" class="btn btn-success" value="Next" onclick="window.location='cont.php?hal=langkahbmm3'"/><p><p></div></div>
                <?php
				}
				if($_GET[hal] == 'langkahbmm4')
				{
	function tampiltabel($arr)
	{
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
			  for ($j=0;$j<count($arr[$i]);$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	

	function tampilbarisfactor($arr)
	{	
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table  table-bordered table-highlight">';
		echo '
		<tr>
		<td rowspan="2" ><h6><center><br><p><p>Nama Factor</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<tr>';
		echo '<tr>
		<td><center>Jenis Factor</center></td>';
			  for ($i=0;$i<count($arr);$i++)
			  {
			    echo '<td>'.$arr[$i].'</td>';
			  }
		echo "</tr>";
		echo '</table> </div></div>';
	}
	function tampilbariskriteria($arr)
	{	
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table  table-bordered table-highlight">';
		echo '
		<tr>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<tr>';
		
		echo '<tr>';
			  for ($i=0;$i<count($arr);$i++)
			  {
			    echo '<td>'.$arr[$i].'</td>';
			  }
		echo "</tr>";
		echo '</table> </div></div>';
	}
	function tampilbarispt($arr)
	{	
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table  table-bordered table-highlight">';
		echo '
		<tr>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<tr>';
		
		echo '<tr>';
			  for ($i=0;$i<count($arr);$i++)
			  {
			    echo '<td>'.$arr[$i].'</td>';
			  }
		echo "</tr>";
		echo '</table> </div></div>';
	}

	function tampilkolom($arr)
	{
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table table-bordered table-highlight">';
	  for ($i=0;$i<count($arr);$i++)
	  {
			echo '<tr>';
			    echo '<td>'.$arr[$i].'</td>';
			echo "</tr>";
	   }
		echo
		 '</table> </div></div>';
	}
	function tampilkolommahasiswa($arr)
	{
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table table-bordered table-highlight">';
		echo '
		<tr><td><h6>Nama Mahasiswa</h6></td>
		<tr>';
	  for ($i=0;$i<count($arr);$i++)
	  {
			echo '<tr>';
			    echo '<td>'.$arr[$i].'</td>';
			echo "</tr>";
	   }
		echo
		 '</table> </div></div>';
	}
    $mhsbmm = array();
	
	$querymhsbmm = mysql_query("SELECT * FROM siswa ORDER BY nim asc");
	$i=0;
	
	while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	{
		$mhsbmm[$i] = $datamhsbmm['nama_mhs'];
		$i++;
	} 
	
	
	
	$kriteriabmm = array(); //array("Harga", "Kualitas", "Fitur", "Populer", "Purna Jual", "Keawetan");
	
	$factorbmm = array(); //array("cost", "benefit", "benefit", "benefit", "benefit", "benefit");
	
	$profil_targetbmm = array(); //array(4, 5, 4, 3, 3, 2);

	$querykriteriabmm = mysql_query("SELECT * FROM kriteria_bmm ORDER BY no asc");
	$i=0;
	while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
	{
		$kriteriabmm[$i] = $datakriteriabmm['nama_kriteria'];
		$factorbmm[$i] = $datakriteriabmm['factor'];
		$profil_targetbmm[$i] = $datakriteriabmm['profil_target'];
		$i++;
	}   
	
	$mhsbmmxkriteria = array();
	$querymhsbmm = mysql_query("SELECT * FROM siswa ORDER BY nim asc");
	$i=0;
	while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	{$querykriteriabmm = mysql_query("SELECT * FROM kriteria_bmm ORDER BY no asc ");
		$j=0;
		while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
		{
			$sub = mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = '$datakriteriabmm[nama_kriteria]'");
			$ssub = mysql_fetch_array($sub);//milih aspek
		
			$querymhsbmm2 = mysql_query("SELECT * FROM siswa WHERE nama_mhs = '$datamhsbmm[nama_mhs]'");
			$datamhsbmm2 = mysql_fetch_array($querymhsbmm2);//milih nama mhs
			
			if ($datakriteriabmm['nama_kriteria'] =="IPK")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmm['subkriteria'];$k++)
			{$kriteria = $datakriteriabmm['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = 'IPK' and no_sub = '$k'"));
			if ($datamhsbmm['ipk'] >= $pilihsub['rentang_bawah'] and $datamhsbmm['ipk'] <= $pilihsub['rentang_atas'])
			{
				$scoreipk = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "IPK")
		
		if ($datakriteriabmm['nama_kriteria'] =="Semester")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmm['subkriteria'];$k++)
			{$kriteria = $datakriteriabmm['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = 'Semester' and no_sub = '$k'"));
			if ($datamhsbmm['semester'] == $pilihsub['subkriteria'])
			{
				$scoresemester = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "Semester")
		if ($datakriteriabmm['nama_kriteria'] =="Penghasilan Orang Tua")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmm['subkriteria'];$k++)
			{$kriteria = $datakriteriabmm['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = 'Penghasilan Orang Tua' and no_sub = '$k'"));
			if ($datamhsbmm['penghasilan'] >= $pilihsub['rentang_bawah'] and $datamhsbmm['penghasilan'] <= $pilihsub['rentang_atas'])
			{
				$scorepenghasilan = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "Semester")
		
		
		if ($datakriteriabmm['nama_kriteria'] =="Jenis Tinggal")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmm['subkriteria'];$k++)
			{$kriteria = $datakriteriabmm['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = 'Jenis Tinggal' and no_sub = '$k'"));
			if ($datamhsbmm['jenis_tinggal'] == $pilihsub['subkriteria'])
			{
				$scorejenistinggal = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "jenistinggal")
		
		if ($datakriteriabmm['nama_kriteria'] =="Jumlah Tanggungan")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmm['subkriteria'];$k++)
			{$kriteria = $datakriteriabmm['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = 'Jumlah Tanggungan' and no_sub = '$k'"));
			if ($datamhsbmm['jumlah_tanggungan'] == $pilihsub['subkriteria'])
			{
				$scorejumlahtanggungan = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			else if($datamhsbmm['jumlah_tanggungan'] > 3)
			{
				$scorejumlahtanggungan = 3;
			}
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "jumlah tanggungan")
		
		if ($datakriteriabmm['nama_kriteria'] =="Status Anak")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmm['subkriteria'];$k++)
			{$kriteria = $datakriteriabmm['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = 'Status Anak' and no_sub = '$k'"));
			if ($datamhsbmm['status_orangtua'] == $pilihsub['subkriteria'])
			{
				$scorestatusanak = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "Status Anak")
		
		
		
			if($j == 0)
			{$jk = $j- 1 ;
			$mhsbmmxkriteria[$i][$jk] = $mhsbmm[$i];
			$mhsbmmxkriteria[$i][$j] = $scoreipk;
			}
			if($j == 1)
			{
			$mhsbmmxkriteria[$i][$j] = $scoresemester;
			}
			if($j == 2)
			{
			$mhsbmmxkriteria[$i][$j] = $scorepenghasilan;
			}
			if($j == 3)
			{
			$mhsbmmxkriteria[$i][$j] = $scorejumlahtanggungan;
			}
			if($j == 4)
			{
			$mhsbmmxkriteria[$i][$j] = $scorestatusanak;
			}
			if($j == 5)
			{
			$mhsbmmxkriteria[$i][$j] = $scorejenistinggal;
			}
		$j++;
			
		} // untuk while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
		 $i++;
	} // untuk while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	    
	function tampiltabelpgap($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	
	$selisihbmm = array();
	
	for ($i=0;$i<count($mhsbmm);$i++)
	{
		for ($j=0;$j<count($kriteriabmm);$j++)
		{ 	$jk = 0-1 ;
			$selisihbmm[$i][$jk] = $mhsbmm[$i];
			$selisihbmm[$i][$j] = $mhsbmmxkriteria[$i][$j] -  $profil_targetbmm[$j] ;
		
		}
		
	}
	function tampiltabelselisih($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
		
	
	$bobotbmm = array();
	
	for ($i=0;$i<count($mhsbmm);$i++)
	{
		for ($j=0;$j<count($kriteriabmm);$j++)
		{ $querybobotbmm = mysql_query("SELECT * FROM bobot");
	      while ($databobotbmm = mysql_fetch_array($querybobotbmm))
			{ if($selisihbmm[$i][$j] == $databobotbmm['selisih'])
			{
				$jk = 0-1 ;
				$bobotbmm[$i][$jk] = $mhsbmm[$i];
				$bobotbmm[$i][$j] = $databobotbmm['nilai']; 
			}
			}
		}
		
	}
	function tampiltabelbobot($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	
	$pengelompokanbmm = array();
	$querymhsbmm = mysql_query("SELECT * FROM siswa ORDER BY nim asc");
	$i=0;
	while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	{
		$querykriteriabmm1 = mysql_query("SELECT * FROM kriteria_bmm ");
		$jumlah=mysql_num_rows($querykriteriabmm1);
		$jumlahh= $jumlah + 4;
		$cffinfix=0;
		$sffinfix=0;
		for ($j=0;$j<$jumlahh;$j++)
		{$querykriteriabmm1 = mysql_query("SELECT * FROM kriteria_bmm where nama_aspek='Akademik' ");
		 while ($datakriteriabmm1 = mysql_fetch_array($querykriteriabmm1))
			{		
			if ($datakriteriabmm1['factor'] =="Core")  
				{ $jj = $j - 2;
				$cfaka = $bobotbmm[$i][$jj];
				}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			if ($datakriteriabmm1['factor'] =="Secondary")  
			{ $jj = $j - 2;
				$sfaka = $bobotbmm[$i][$jj];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			}
			$querykriteriabmm2 = mysql_query("SELECT * FROM kriteria_bmm where nama_aspek='Finansial' ");
		 while ($datakriteriabmm2 = mysql_fetch_array($querykriteriabmm2))
			{if ($datakriteriabmm2['nama_kriteria'] == "Penghasilan Orang Tua")
			{if ($datakriteriabmm2['factor'] =="Core")  
				{ 
				$cffin1 = $bobotbmm[$i][2];
				}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			if ($datakriteriabmm2['factor'] =="Secondary")  
			{ $jj = $j - 2;
				$sffin1 = $bobotbmm[$i][2];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			}
			if ($datakriteriabmm2['nama_kriteria'] == "Jumlah Tanggungan")
			{if ($datakriteriabmm2['factor'] =="Core")  
				{ 
				$cffin2 = $bobotbmm[$i][3];
				}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			if ($datakriteriabmm2['factor'] =="Secondary")  
			{ $jj = $j - 2;
				$sffin2 = $bobotbmm[$i][3];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			}
			if ($datakriteriabmm2['nama_kriteria'] == "Status Anak")
			{if ($datakriteriabmm2['factor'] =="Core")  
				{ 
				$cffin3 = $bobotbmm[$i][4];
				}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			if ($datakriteriabmm2['factor'] =="Secondary")  
			{ $jj = $j - 2;
				$sffin3 = $bobotbmm[$i][4];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			}
			if ($datakriteriabmm2['nama_kriteria'] == "Jenis Tinggal")
			{if ($datakriteriabmm2['factor'] =="Core")  
				{ 
				$cffin4 = $bobotbmm[$i][5];
				}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			if ($datakriteriabmm2['factor'] =="Secondary")  
			{ $jj = $j - 2;
				$sffin4 = $bobotbmm[$i][5];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			}
			
			}
			$cfactorr = mysql_query("SELECT * FROM kriteria_bmm WHERE nama_aspek= 'Finansial' and factor = 'Core'");
			$jumlahcore=mysql_num_rows($cfactorr);
			$sfactorr = mysql_query("SELECT * FROM kriteria_bmm WHERE nama_aspek= 'Finansial' and factor = 'Secondary'");
			$jumlahsecondary=mysql_num_rows($sfactorr);
			$cffinfix = ($cffin1 + $cffin2 + $cffin3 + $cffin4)/$jumlahcore;
			$sffinfix = ($sffin1 + $sffin2 + $sffin3 + $sffin4)/$jumlahsecondary;
						
			if($j == 0)
			{$jk=$j-1;
			$pengelompokanbmm[$i][$jk] = $mhsbmm[$i];
			$pengelompokanbmm[$i][$j] = $bobotbmm[$i][$j];
			}
			if($j == 1)
			{
			$pengelompokanbmm[$i][$j] = $bobotbmm[$i][$j];
			}
			if($j == 2)
			{
			$pengelompokanbmm[$i][$j] = $cfaka;
			}
			if($j == 3)
			{
			$pengelompokanbmm[$i][$j] = $sfaka;
			}
			if($j == 4)
			{$jj= $j - 2;
			$pengelompokanbmm[$i][$j] = $bobotbmm[$i][$jj];
			}
			if($j == 5)
			{$jj= $j - 2;
			$pengelompokanbmm[$i][$j] = $bobotbmm[$i][$jj];
			}
			if($j == 6)
			{$jj= $j - 2;
			$pengelompokanbmm[$i][$j] = $bobotbmm[$i][$jj];
			}
			if($j == 7)
			{$jj= $j - 2;
			$pengelompokanbmm[$i][$j] = $bobotbmm[$i][$jj];
			}
			if($j == 8)
			{$cffinfixx=number_format( $cffinfix,2);
			$pengelompokanbmm[$i][$j] = $cffinfixx;
			}
			if($j == 9)
			{$sffinfixx=number_format( $sffinfix,2);
			$pengelompokanbmm[$i][$j] = $sffinfix;
			}
			
		} // untuk while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
		 $i++;
	} // untuk while ($datamhsbmm = mysql_fetch_array($querymhsbmm))	
	function tampiltabelpengelompokan($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="4" ><h6><center>Akademik</center></h6></td>
		<td colspan="6"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>Cf</center></h6></td>
		<td><h6><center>Sf</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<td><h6><center>Cf</center></h6></td>
		<td><h6><center>Sf</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	
	$nilaitotalbmm = array();
	$querymhsbmm = mysql_query("SELECT * FROM siswa ORDER BY nim asc");
	$i=0;
	while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	{$querykriteriabmm = mysql_query("SELECT * FROM kriteria_bmm where nama_aspek='Akademik' ");
		for ($j=0;$j<6;$j++)
		{$cfactor = mysql_query("SELECT * FROM factor WHERE nama_factor = 'Core Factor'");
			$cfactorr = mysql_fetch_array($cfactor);//milih aspek
			$sfactor = mysql_query("SELECT * FROM factor WHERE nama_factor = 'Secondary Factor'");
			$sfactorr = mysql_fetch_array($sfactor);
			if($j == 0)
			{$jj= $j + 2;
			$jk=$j-1;
			$nilaitotalbmm[$i][$jk] = $mhsbmm[$i];
			$nilaitotalbmm[$i][$j] = $pengelompokanbmm[$i][$jj];
			}
			if($j == 1)
			{$jj= $j + 2;
			$nilaitotalbmm[$i][$j] = $pengelompokanbmm[$i][$jj];
			}
			if($j == 2)
			{$jj= $j + 1;
			$nilaitotalbmm[$i][$j] = $pengelompokanbmm[$i][$j]*$cfactorr['persentase']/100 + $pengelompokanbmm[$i][$jj]*$sfactorr['persentase']/100;}
			if($j == 3)
			{$jj= $j + 5;
			$nilaitotalbmm[$i][$j] = $pengelompokanbmm[$i][$jj];
			}
			if($j == 4)
			{$jj= $j + 5;
			$nilaitotalbmm[$i][$j] = $pengelompokanbmm[$i][$jj];
			}
			if($j == 5)
			{$jj= $j + 3;
			$jjj= $jj + 1;
			$nilaifinansial=$pengelompokanbmm[$i][$jj]*$cfactorr['persentase']/100 + $pengelompokanbmm[$i][$jjj]*$sfactorr['persentase']/100;;
			$nilaifinansialfix=number_format( $nilaifinansial,1);
			$nilaitotalbmm[$i][$j] = $nilaifinansialfix;
			}
			
			
					
			
		} // untuk while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
		 $i++;
	} // untuk while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	
	function tampiltabelnilaitotal($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="3" ><h6><center>Akademik</center></h6></td>
		<td colspan="3"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>Cf</center></h6></td>
		<td><h6><center>Sf</center></h6></td>
		<td><h6><center>Na</center></h6></td>
		<td><h6><center>Cf</center></h6></td>
		<td><h6><center>Sf</center></h6></td>
		<td><h6><center>Nf</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	
	

				?>	
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">

<div class="navbar navbar-inner block-header">
<div class="muted pull-left"><h4>Total Nilai Akademik dan Finansial :</h4></div>
</div>
<?php tampiltabelnilaitotal($nilaitotalbmm); ?>

                        </div>
                        <div class="muted pull-left"><input type="button" class="btn btn-success" value="Back" onclick="window.location='cont.php?hal=langkahbmm3'"/><p><p></div>
                    <div class="muted pull-right"><input type="button" class="btn btn-success" value="Next" onclick="window.location='cont.php?hal=langkahbmm5'"/><p><p></div>
                    </div>
                <?php
				}
				
				if($_GET[hal] == 'langkahbmm5')
				{
	function tampiltabel($arr)
	{
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
			  for ($j=0;$j<count($arr[$i]);$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	

	function tampilbarisfactor($arr)
	{	
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table  table-bordered table-highlight">';
		echo '
		<tr>
		<td rowspan="2" ><h6><center><br><p><p>Nama Factor</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<tr>';
		echo '<tr>
		<td><center>Jenis Factor</center></td>';
			  for ($i=0;$i<count($arr);$i++)
			  {
			    echo '<td>'.$arr[$i].'</td>';
			  }
		echo "</tr>";
		echo '</table> </div></div>';
	}
	function tampilbariskriteria($arr)
	{	
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table  table-bordered table-highlight">';
		echo '
		<tr>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<tr>';
		
		echo '<tr>';
			  for ($i=0;$i<count($arr);$i++)
			  {
			    echo '<td>'.$arr[$i].'</td>';
			  }
		echo "</tr>";
		echo '</table> </div></div>';
	}
	function tampilbarispt($arr)
	{	
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table  table-bordered table-highlight">';
		echo '
		<tr>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<tr>';
		
		echo '<tr>';
			  for ($i=0;$i<count($arr);$i++)
			  {
			    echo '<td>'.$arr[$i].'</td>';
			  }
		echo "</tr>";
		echo '</table> </div></div>';
	}

	function tampilkolom($arr)
	{
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table table-bordered table-highlight">';
	  for ($i=0;$i<count($arr);$i++)
	  {
			echo '<tr>';
			    echo '<td>'.$arr[$i].'</td>';
			echo "</tr>";
	   }
		echo
		 '</table> </div></div>';
	}
	function tampilkolommahasiswa($arr)
	{
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table table-bordered table-highlight">';
		echo '
		<tr><td><h6>Nama Mahasiswa</h6></td>
		<tr>';
	  for ($i=0;$i<count($arr);$i++)
	  {
			echo '<tr>';
			    echo '<td>'.$arr[$i].'</td>';
			echo "</tr>";
	   }
		echo
		 '</table> </div></div>';
	}
    $mhsbmm = array();
	
	$querymhsbmm = mysql_query("SELECT * FROM siswa ORDER BY nim asc");
	$i=0;
	
	while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	{
		$mhsbmm[$i] = $datamhsbmm['nama_mhs'];
		$i++;
	} 
	
	
	
	$kriteriabmm = array(); //array("Harga", "Kualitas", "Fitur", "Populer", "Purna Jual", "Keawetan");
	
	$factorbmm = array(); //array("cost", "benefit", "benefit", "benefit", "benefit", "benefit");
	
	$profil_targetbmm = array(); //array(4, 5, 4, 3, 3, 2);

	$querykriteriabmm = mysql_query("SELECT * FROM kriteria_bmm ORDER BY no asc");
	$i=0;
	while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
	{
		$kriteriabmm[$i] = $datakriteriabmm['nama_kriteria'];
		$factorbmm[$i] = $datakriteriabmm['factor'];
		$profil_targetbmm[$i] = $datakriteriabmm['profil_target'];
		$i++;
	}   
	
	$mhsbmmxkriteria = array();
	$querymhsbmm = mysql_query("SELECT * FROM siswa ORDER BY nim asc");
	$i=0;
	while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	{$querykriteriabmm = mysql_query("SELECT * FROM kriteria_bmm ORDER BY no asc ");
		$j=0;
		while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
		{
			$sub = mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = '$datakriteriabmm[nama_kriteria]'");
			$ssub = mysql_fetch_array($sub);//milih aspek
		
			$querymhsbmm2 = mysql_query("SELECT * FROM siswa WHERE nama_mhs = '$datamhsbmm[nama_mhs]'");
			$datamhsbmm2 = mysql_fetch_array($querymhsbmm2);//milih nama mhs
			
			if ($datakriteriabmm['nama_kriteria'] =="IPK")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmm['subkriteria'];$k++)
			{$kriteria = $datakriteriabmm['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = 'IPK' and no_sub = '$k'"));
			if ($datamhsbmm['ipk'] >= $pilihsub['rentang_bawah'] and $datamhsbmm['ipk'] <= $pilihsub['rentang_atas'])
			{
				$scoreipk = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "IPK")
		
		if ($datakriteriabmm['nama_kriteria'] =="Semester")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmm['subkriteria'];$k++)
			{$kriteria = $datakriteriabmm['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = 'Semester' and no_sub = '$k'"));
			if ($datamhsbmm['semester'] == $pilihsub['subkriteria'])
			{
				$scoresemester = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "Semester")
		if ($datakriteriabmm['nama_kriteria'] =="Penghasilan Orang Tua")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmm['subkriteria'];$k++)
			{$kriteria = $datakriteriabmm['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = 'Penghasilan Orang Tua' and no_sub = '$k'"));
			if ($datamhsbmm['penghasilan'] >= $pilihsub['rentang_bawah'] and $datamhsbmm['penghasilan'] <= $pilihsub['rentang_atas'])
			{
				$scorepenghasilan = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "Semester")
		
		
		if ($datakriteriabmm['nama_kriteria'] =="Jenis Tinggal")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmm['subkriteria'];$k++)
			{$kriteria = $datakriteriabmm['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = 'Jenis Tinggal' and no_sub = '$k'"));
			if ($datamhsbmm['jenis_tinggal'] == $pilihsub['subkriteria'])
			{
				$scorejenistinggal = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "jenistinggal")
		
		if ($datakriteriabmm['nama_kriteria'] =="Jumlah Tanggungan")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmm['subkriteria'];$k++)
			{$kriteria = $datakriteriabmm['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = 'Jumlah Tanggungan' and no_sub = '$k'"));
			if ($datamhsbmm['jumlah_tanggungan'] == $pilihsub['subkriteria'])
			{
				$scorejumlahtanggungan = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			else if($datamhsbmm['jumlah_tanggungan'] > 3)
			{
				$scorejumlahtanggungan = 3;
			}
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "jumlah tanggungan")
		
		if ($datakriteriabmm['nama_kriteria'] =="Status Anak")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmm['subkriteria'];$k++)
			{$kriteria = $datakriteriabmm['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmm WHERE nama_kriteria = 'Status Anak' and no_sub = '$k'"));
			if ($datamhsbmm['status_orangtua'] == $pilihsub['subkriteria'])
			{
				$scorestatusanak = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "Status Anak")
		
		
		
			if($j == 0)
			{$jk = $j- 1 ;
			$mhsbmmxkriteria[$i][$jk] = $mhsbmm[$i];
			$mhsbmmxkriteria[$i][$j] = $scoreipk;
			}
			if($j == 1)
			{
			$mhsbmmxkriteria[$i][$j] = $scoresemester;
			}
			if($j == 2)
			{
			$mhsbmmxkriteria[$i][$j] = $scorepenghasilan;
			}
			if($j == 3)
			{
			$mhsbmmxkriteria[$i][$j] = $scorejumlahtanggungan;
			}
			if($j == 4)
			{
			$mhsbmmxkriteria[$i][$j] = $scorestatusanak;
			}
			if($j == 5)
			{
			$mhsbmmxkriteria[$i][$j] = $scorejenistinggal;
			}
		$j++;
			
		} // untuk while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
		 $i++;
	} // untuk while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	    
	function tampiltabelpgap($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	
	$selisihbmm = array();
	
	for ($i=0;$i<count($mhsbmm);$i++)
	{
		for ($j=0;$j<count($kriteriabmm);$j++)
		{ 	$jk = 0-1 ;
			$selisihbmm[$i][$jk] = $mhsbmm[$i];
			$selisihbmm[$i][$j] = $mhsbmmxkriteria[$i][$j] -  $profil_targetbmm[$j] ;
		
		}
		
	}
	function tampiltabelselisih($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
		
	
	$bobotbmm = array();
	
	for ($i=0;$i<count($mhsbmm);$i++)
	{
		for ($j=0;$j<count($kriteriabmm);$j++)
		{ $querybobotbmm = mysql_query("SELECT * FROM bobot");
	      while ($databobotbmm = mysql_fetch_array($querybobotbmm))
			{ if($selisihbmm[$i][$j] == $databobotbmm['selisih'])
			{
				$jk = 0-1 ;
				$bobotbmm[$i][$jk] = $mhsbmm[$i];
				$bobotbmm[$i][$j] = $databobotbmm['nilai']; 
			}
			}
		}
		
	}
	function tampiltabelbobot($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	
	$pengelompokanbmm = array();
	$querymhsbmm = mysql_query("SELECT * FROM siswa ORDER BY nim asc");
	$i=0;
	while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	{
		$querykriteriabmm1 = mysql_query("SELECT * FROM kriteria_bmm ");
		$jumlah=mysql_num_rows($querykriteriabmm1);
		$jumlahh= $jumlah + 4;
		$cffinfix=0;
		$sffinfix=0;
		for ($j=0;$j<$jumlahh;$j++)
		{$querykriteriabmm1 = mysql_query("SELECT * FROM kriteria_bmm where nama_aspek='Akademik' ");
		 while ($datakriteriabmm1 = mysql_fetch_array($querykriteriabmm1))
			{		
			if ($datakriteriabmm1['factor'] =="Core")  
				{ $jj = $j - 2;
				$cfaka = $bobotbmm[$i][$jj];
				}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			if ($datakriteriabmm1['factor'] =="Secondary")  
			{ $jj = $j - 2;
				$sfaka = $bobotbmm[$i][$jj];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			}
			$querykriteriabmm2 = mysql_query("SELECT * FROM kriteria_bmm where nama_aspek='Finansial' ");
		 while ($datakriteriabmm2 = mysql_fetch_array($querykriteriabmm2))
			{if ($datakriteriabmm2['nama_kriteria'] == "Penghasilan Orang Tua")
			{if ($datakriteriabmm2['factor'] =="Core")  
				{ 
				$cffin1 = $bobotbmm[$i][2];
				}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			if ($datakriteriabmm2['factor'] =="Secondary")  
			{ $jj = $j - 2;
				$sffin1 = $bobotbmm[$i][2];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			}
			if ($datakriteriabmm2['nama_kriteria'] == "Jumlah Tanggungan")
			{if ($datakriteriabmm2['factor'] =="Core")  
				{ 
				$cffin2 = $bobotbmm[$i][3];
				}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			if ($datakriteriabmm2['factor'] =="Secondary")  
			{ $jj = $j - 2;
				$sffin2 = $bobotbmm[$i][3];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			}
			if ($datakriteriabmm2['nama_kriteria'] == "Status Anak")
			{if ($datakriteriabmm2['factor'] =="Core")  
				{ 
				$cffin3 = $bobotbmm[$i][4];
				}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			if ($datakriteriabmm2['factor'] =="Secondary")  
			{ $jj = $j - 2;
				$sffin3 = $bobotbmm[$i][4];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			}
			if ($datakriteriabmm2['nama_kriteria'] == "Jenis Tinggal")
			{if ($datakriteriabmm2['factor'] =="Core")  
				{ 
				$cffin4 = $bobotbmm[$i][5];
				}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			if ($datakriteriabmm2['factor'] =="Secondary")  
			{ $jj = $j - 2;
				$sffin4 = $bobotbmm[$i][5];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			}
			
			}
			$cfactorr = mysql_query("SELECT * FROM kriteria_bmm WHERE nama_aspek= 'Finansial' and factor = 'Core'");
			$jumlahcore=mysql_num_rows($cfactorr);
			$sfactorr = mysql_query("SELECT * FROM kriteria_bmm WHERE nama_aspek= 'Finansial' and factor = 'Secondary'");
			$jumlahsecondary=mysql_num_rows($sfactorr);
			$cffinfix = ($cffin1 + $cffin2 + $cffin3 + $cffin4)/$jumlahcore;
			$sffinfix = ($sffin1 + $sffin2 + $sffin3 + $sffin4)/$jumlahsecondary;
						
			if($j == 0)
			{$jk=$j-1;
			$pengelompokanbmm[$i][$jk] = $mhsbmm[$i];
			$pengelompokanbmm[$i][$j] = $bobotbmm[$i][$j];
			}
			if($j == 1)
			{
			$pengelompokanbmm[$i][$j] = $bobotbmm[$i][$j];
			}
			if($j == 2)
			{
			$pengelompokanbmm[$i][$j] = $cfaka;
			}
			if($j == 3)
			{
			$pengelompokanbmm[$i][$j] = $sfaka;
			}
			if($j == 4)
			{$jj= $j - 2;
			$pengelompokanbmm[$i][$j] = $bobotbmm[$i][$jj];
			}
			if($j == 5)
			{$jj= $j - 2;
			$pengelompokanbmm[$i][$j] = $bobotbmm[$i][$jj];
			}
			if($j == 6)
			{$jj= $j - 2;
			$pengelompokanbmm[$i][$j] = $bobotbmm[$i][$jj];
			}
			if($j == 7)
			{$jj= $j - 2;
			$pengelompokanbmm[$i][$j] = $bobotbmm[$i][$jj];
			}
			if($j == 8)
			{$cffinfixx=number_format( $cffinfix,2);
			$pengelompokanbmm[$i][$j] = $cffinfixx;
			}
			if($j == 9)
			{$sffinfixx=number_format( $sffinfix,2);
			$pengelompokanbmm[$i][$j] = $sffinfix;
			}
			
		} // untuk while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
		 $i++;
	} // untuk while ($datamhsbmm = mysql_fetch_array($querymhsbmm))	
	function tampiltabelpengelompokan($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="4" ><h6><center>Akademik</center></h6></td>
		<td colspan="6"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>Cf</center></h6></td>
		<td><h6><center>Sf</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>K5</center></h6></td>
		<td><h6><center>K6</center></h6></td>
		<td><h6><center>Cf</center></h6></td>
		<td><h6><center>Sf</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	
	$nilaitotalbmm = array();
	$querymhsbmm = mysql_query("SELECT * FROM siswa ORDER BY nim asc");
	$i=0;
	while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	{$querykriteriabmm = mysql_query("SELECT * FROM kriteria_bmm where nama_aspek='Akademik' ");
		for ($j=0;$j<6;$j++)
		{$cfactor = mysql_query("SELECT * FROM factor WHERE nama_factor = 'Core Factor'");
			$cfactorr = mysql_fetch_array($cfactor);//milih aspek
			$sfactor = mysql_query("SELECT * FROM factor WHERE nama_factor = 'Secondary Factor'");
			$sfactorr = mysql_fetch_array($sfactor);
			if($j == 0)
			{$jj= $j + 2;
			$jk=$j-1;
			$nilaitotalbmm[$i][$jk] = $mhsbmm[$i];
			$nilaitotalbmm[$i][$j] = $pengelompokanbmm[$i][$jj];
			}
			if($j == 1)
			{$jj= $j + 2;
			$nilaitotalbmm[$i][$j] = $pengelompokanbmm[$i][$jj];
			}
			if($j == 2)
			{$jj= $j + 1;
			$nilaitotalbmm[$i][$j] = $pengelompokanbmm[$i][$j]*$cfactorr['persentase']/100 + $pengelompokanbmm[$i][$jj]*$sfactorr['persentase']/100;}
			if($j == 3)
			{$jj= $j + 5;
			$nilaitotalbmm[$i][$j] = $pengelompokanbmm[$i][$jj];
			}
			if($j == 4)
			{$jj= $j + 5;
			$nilaitotalbmm[$i][$j] = $pengelompokanbmm[$i][$jj];
			}
			if($j == 5)
			{$jj= $j + 3;
			$jjj= $jj + 1;
			$nilaifinansial=$pengelompokanbmm[$i][$jj]*$cfactorr['persentase']/100 + $pengelompokanbmm[$i][$jjj]*$sfactorr['persentase']/100;;
			$nilaifinansialfix=number_format( $nilaifinansial,1);
			$nilaitotalbmm[$i][$j] = $nilaifinansialfix;
			}
			
			
					
			
		} // untuk while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
		 $i++;
	} // untuk while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	
	function tampiltabelnilaitotal($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="3" ><h6><center>Akademik</center></h6></td>
		<td colspan="3"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>Cf</center></h6></td>
		<td><h6><center>Sf</center></h6></td>
		<td><h6><center>Na</center></h6></td>
		<td><h6><center>Cf</center></h6></td>
		<td><h6><center>Sf</center></h6></td>
		<td><h6><center>Nf</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	
	
	$rangkingbmm = array();
	$querymhsbmm = mysql_query("SELECT * FROM siswa ORDER BY nim asc");
	$i=0;
	while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	{$querykriteriabmm = mysql_query("SELECT * FROM kriteria_bmm where nama_aspek='Akademik' ");
		for ($j=0;$j<6;$j++)
		{$akademik = mysql_query("SELECT * FROM aspek_bmm WHERE nama_aspek = 'Akademik'");
			$pakademik = mysql_fetch_array($akademik);//milih aspek
			$finansial = mysql_query("SELECT * FROM aspek_bmm WHERE nama_aspek = 'Finansial'");
			$pfinansial = mysql_fetch_array($finansial);
			if($j == 0)
			{$jj= $j + 2;
			$jk=$j-1;
			$rangkingbmm[$i][$jk] = $mhsbmm[$i];
			$rangkingbmm[$i][$j] = $nilaitotalbmm[$i][$jj];
			}
			if($j == 1)
			{$jj= $j + 4;
			$rangkingbmm[$i][$j] = $nilaitotalbmm[$i][$jj];
			}
			if($j == 2)
			{$jj= $j + 3;
			$rangkingbmm[$i][$j] = $nilaitotalbmm[$i][$j]*$pakademik['persentase']/100 + $nilaitotalbmm[$i][$jj]*$pfinansial['persentase']/100;}
			$namaa=$datamhsbmm['nama_mhs'];
			 mysql_query("update siswa set perhitungan='$rangkingbmm[$i][3]' where nama_mhs='$namaa'");
		} // untuk while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
		 $i++;
	} // untuk while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	
	function tampiltabelrangking($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
			  echo '
		<tr>
		<td><h6><center>Nama Mahasiswa</center></h6></td>
		<td><h6><center>Na</center></h6></td>
		<td><h6><center>Nf</center></h6></td>
		<td><h6><center>Ranking</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}	


	$mhsbmmrangking = array();
	$hasilrangkingbmm = array();
	
	for ($i=0;$i<count($mhsbmm);$i++)
	{
		$hasilrangkingbmm[$i] = $rangkingbmm[$i][2];
		$mhsbmmrangking[$i] = $mhsbmm[$i];
	}
	
	for ($i=0;$i<count($mhsbmm);$i++)
	{
		for ($j=$i;$j<count($mhsbmm);$j++)
		{
			if ($hasilrangkingbmm[$j] > $hasilrangkingbmm[$i])
			{
				$tmphasilbmm = $hasilrangkingbmm[$i];
				$tmpmhsbmm = $mhsbmmrangking[$i];
				$hasilrangkingbmm[$i] = $hasilrangkingbmm[$j];
				$mhsbmmrangking[$i] = $mhsbmmrangking[$j];
				$hasilrangkingbmm[$j] = $tmphasilbmm;
				$mhsbmmrangking[$j] = $tmpmhsbmm;
			}
		}
	}
	
				?>	
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">

<div class="navbar navbar-inner block-header">
<div class="muted pull-left"><h4>Total Nilai Ranking :</h4></div>
</div>
<?php tampiltabelrangking($rangkingbmm); ?>

 
 <?php for($i=0;$i<count($mhsbmmrangking);$i++)
 { 
 mysql_query("update siswa set preferensi='$hasilrangkingbmm[$i]' where nama_mhs='$mhsbmmrangking[$i]'"); }?>

                        </div>
                        <div class="muted pull-left"><input type="button" class="btn btn-success" value="Back" onclick="window.location='cont.php?hal=langkahbmm4'"/><p><p></div>
                    </div>
                <?php
				}
				
				
				 if($_GET[hal] == 'subkriteria')
				{
			    $sub=mysql_fetch_array(mysql_query("select * from kriteria_bmm where nama_kriteria='$_GET[id]'"));
				$sub2=mysql_fetch_array(mysql_query("select * from subkriteriabmm where nama_kriteria='$_GET[id]'"));
				?>
				  <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Sub Kriteria</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                  <form method="post" action="<?php echo $PHP_SELF ?>">
											<label class="control-label">Jenis Sub Kriteria</label>
											<!--<select name='factor' /> -->
                                           	
											<?php if($sub[jenis]=="Ada Rentang"){
				  echo"
				   <select name='jenis'/>
			<option value=''>Pilih Jenis Subkriteria</option>
			<option value='Ada Rentang' selected>Ada Rentang</option>
			<option value='Tidak Ada Rentang'>Tidak Ada Rentang</option>
			</select>
				  ";
				  
				  }
				  
				 else if($sub[jenis]=="Tidak Ada Rentang"){
				  echo"
				   <select name='jenis'/>
			<option value=''>Pilih Jenis Subkriteria</option>
			<option value='Ada Rentang'>Ada Rentang</option>
			<option value='Tidak Ada Rentang' selected>Tidak Ada Rentang</option>
			</select>
				  ";
				  
				  }
				  
				  else{
					  echo"
					   <select name='jenis'/>
			<option value='' selected>Pilih Jenis Subkriteria</option>
			<option value='Ada Rentang'>Ada Rentang</option>
			<option value='Tidak Ada Rentang'>Tidak Ada Rentang</option>
			</select>";
					  } ?> 
				  							<div class="controls">
                                            <label class="control-label">Jumlah Sub Kriteria</label>
											<div class="controls">
											<input  name="subkriteria" type="text" class="span1 m-wrap" value="<?php echo "$sub[subkriteria]";?>" required/>
                                            <input type="hidden" name="nama_kriteria" type="text" class="span6 m-wrap" value="<?php echo "$sub[nama_kriteria]";?>" readonly required/>
											</div>
                                            </div>
                                            
											<div class="control-group">
											<input name="submitsubbmm" type="submit" value="Submit" />
											</div>
									</form>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!-- /block -->
                        
                        <?php if($sub[jenis] == "Ada Rentang")
{?>
                        <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Sub Kriteria (Rentang) </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12" >
                                   <form method="post" action="<?php echo $PHP_SELF ?>">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                        <thead>
                                            <tr>
                                                <th><center>Rentang Bawah</center></th>
                                                <th><center>-</center></th>
                                                <th><center>Rentang Atas</center></th>
                                                <th><center>Score</center></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        
										<?php
										$i=0;
										$cl=warning;
										$e=mysql_fetch_array(mysql_query("select * from subkriteriabmm where nama_kriteria='$_GET[id]'"));
										$sub=mysql_fetch_array(mysql_query("select * from kriteria_bmm where nama_kriteria='$_GET[id]'"));
										while ($i < $sub[subkriteria] )
										{$i++;
										$nosub=mysql_fetch_array(mysql_query("select * from subkriteriabmm where  nama_kriteria='$_GET[id]'and no_sub= '$i' and jenis = '$sub[jenis]' "));
										?> 
                                            <tr>
                                                <td><center><input type='text' name='rentang_bawah[]' placeholder='Masukkan angka' class='span7 ' value="<?php echo "$nosub[rentang_bawah]";?>"></center></td>
                                                <td><center> - </center></td>
                                                <td><center><input type='text' name='rentang_atas[]' placeholder='Masukkan angka' class='span7 'value="<?php echo "$nosub[rentang_atas]";?>"></center></td>
                                                <td><center><input type='text' name='score[]' placeholder='Masukkan angka' class='span7 'value="<?php echo "$nosub[score]";?>"></center></td> 
                                                <input type='hidden' name='nosub[]' class='span7 ' value="<?php echo "$i";?>">                                          
                                            </tr>
                                            <?php
										}
										?>
                                       
                                        </tbody>
                                        </table>
                                    <td><input type='hidden' name='nama_kriteria' class='span7 ' value="<?php echo "$sub[nama_kriteria]";?>"></td>
                                    <td><input type='hidden' name='subkriteria' class='span7 ' value="<?php echo "$sub[subkriteria]";?>"></td>
                                    <td><input type='hidden' name='jenis' class='span7 ' value="<?php echo "$sub[jenis]";?>"></td>
                                    
                                    <div class="control-group">
											<input name="updatesubrentang" type="submit" value="Update" />
											</div>
                                    <div class="control-group">
											<input name="backsub" type="submit" value="Kembali" />
											</div>
                                    
                                            </form>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                <?php  }
                 else
                 { ?> <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Sub Kriteria (Tidak Ada Rentang) </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12" >
                                   <form method="post" action="<?php echo $PHP_SELF ?>">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                        <thead>
                                            <tr>
                                                <th><center>Sub Kriteria</center></th>
                                                <th><center>Score</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
										<?php
										$i=0;
										$cl=warning;
										$e=mysql_fetch_array(mysql_query("select * from subkriteriabmm where nama_kriteria='$_GET[id]'"));
										$sub=mysql_fetch_array(mysql_query("select * from kriteria_bmm where nama_kriteria='$_GET[id]'"));
										while ($i < $sub[subkriteria] )
										{$i++;
										$nosub=mysql_fetch_array(mysql_query("select * from subkriteriabmm where  nama_kriteria='$_GET[id]'and no_sub= '$i'  and jenis = '$sub[jenis]' "));
										?> 
                                            <tr>
                                                <td><center><input type='text' name='subkriteria[]' placeholder='Masukkan Subkriteria' class='span7 ' value="<?php echo "$nosub[subkriteria]";?>"></center></td>
                                                <td><center><input type='text' name='score[]' placeholder='Masukkan angka' class='span7 'value="<?php echo "$nosub[score]";?>"></center></td> 
                                                <input type='hidden' name='nosub[]' class='span7 ' value="<?php echo "$i";?>">                                             
                                            </tr>
                                            <?php
										}
										?>
                                       
                                        </tbody>
                                        </table>
                                    <td><input type='hidden' name='nama_kriteria' class='span7 ' value="<?php echo "$sub[nama_kriteria]";?>"></td>
                                    <td><input type='hidden' name='jumlah' class='span7 ' value="<?php echo "$sub[subkriteria]";?>"></td>
                                    <td><input type='hidden' name='jenis' class='span7 ' value="<?php echo "$sub[jenis]";?>"></td>
                                    
                                    <div class="control-group">
											<input name="updatesubnonrentang" type="submit" value="Update" />
											</div>
                                    <div class="control-group">
											<input name="backsub" type="submit" value="Kembali" />
											</div>
                                    
                                            </form>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>     <?php }
				 ?>
                 
               <?php
				}
				
				 if($_GET[hal] == 'subkriteriabmb')
				{
			    $sub=mysql_fetch_array(mysql_query("select * from kriteria_bmb where nama_kriteria='$_GET[id]'"));
				$sub2=mysql_fetch_array(mysql_query("select * from subkriteriabmb where nama_kriteria='$_GET[id]'"));
				?>
				  <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Sub Kriteria</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                  <form method="post" action="<?php echo $PHP_SELF ?>">
											<label class="control-label">Jenis Sub Kriteria</label>
											<!--<select name='factor' /> -->
                                           	
											<?php if($sub[jenis]=="Ada Rentang"){
				  echo"
				   <select name='jenis'/>
			<option value=''>Pilih Jenis Subkriteria</option>
			<option value='Ada Rentang' selected>Ada Rentang</option>
			<option value='Tidak Ada Rentang'>Tidak Ada Rentang</option>
			</select>
				  ";
				  
				  }
				  
				 else if($sub[jenis]=="Tidak Ada Rentang"){
				  echo"
				   <select name='jenis'/>
			<option value=''>Pilih Jenis Subkriteria</option>
			<option value='Ada Rentang'>Ada Rentang</option>
			<option value='Tidak Ada Rentang' selected>Tidak Ada Rentang</option>
			</select>
				  ";
				  
				  }
				  
				  else{
					  echo"
					   <select name='jenis'/>
			<option value='' selected>Pilih Jenis Subkriteria</option>
			<option value='Ada Rentang'>Ada Rentang</option>
			<option value='Tidak Ada Rentang'>Tidak Ada Rentang</option>
			</select>";
					  } ?> 
				  							<div class="controls">
                                            <label class="control-label">Jumlah Sub Kriteria</label>
											<div class="controls">
											<input  name="subkriteria" type="text" class="span1 m-wrap" value="<?php echo "$sub[subkriteria]";?>" required/>
                                            <input type="hidden" name="nama_kriteria" type="text" class="span6 m-wrap" value="<?php echo "$sub[nama_kriteria]";?>" readonly required/>
											</div>
                                            </div>
                                            
											<div class="control-group">
											<input name="submitsubbmb" type="submit" value="Submit" />
											</div>
									</form>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!-- /block -->
                        
                        <?php if($sub[jenis] == "Ada Rentang")
{?>
                        <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Sub Kriteria (Rentang) </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12" >
                                   <form method="post" action="<?php echo $PHP_SELF ?>">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                        <thead>
                                            <tr>
                                                <th><center>Rentang Bawah</center></th>
                                                <th><center>-</center></th>
                                                <th><center>Rentang Atas</center></th>
                                                <th><center>Score</center></th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
										<?php
										$i=0;
										$cl=warning;
										$e=mysql_fetch_array(mysql_query("select * from subkriteriabmb where nama_kriteria='$_GET[id]'"));
										$sub=mysql_fetch_array(mysql_query("select * from kriteria_bmb where nama_kriteria='$_GET[id]'"));
										while ($i < $sub[subkriteria] )
										{$i++;
										$nosub=mysql_fetch_array(mysql_query("select * from subkriteriabmb where  nama_kriteria='$_GET[id]'and no_sub= '$i' and jenis = '$sub[jenis]' "));
										?> 
                                            <tr>
                                                <td><center><input type='text' name='rentang_bawah[]' placeholder='Masukkan angka' class='span7 ' value="<?php echo "$nosub[rentang_bawah]";?>"></center></td>
                                                <td><center> - </center></td>
                                                <td><center><input type='text' name='rentang_atas[]' placeholder='Masukkan angka' class='span7 'value="<?php echo "$nosub[rentang_atas]";?>"></center></td>
                                                <td><center><input type='text' name='score[]' placeholder='Masukkan angka' class='span7 'value="<?php echo "$nosub[score]";?>"></center></td> 
                                                <input type='hidden' name='nosub[]' class='span7 ' value="<?php echo "$i";?>">                                               
                                            </tr>
                                            <?php
										}
										?>
                                       
                                        </tbody>
                                        </table>
                                    <td><input type='hidden' name='nama_kriteria' class='span7 ' value="<?php echo "$sub[nama_kriteria]";?>"></td>
                                    <td><input type='hidden' name='subkriteria' class='span7 ' value="<?php echo "$sub[subkriteria]";?>"></td>
                                    <td><input type='hidden' name='jenis' class='span7 ' value="<?php echo "$sub[jenis]";?>"></td>
                                    
                                    <div class="control-group">
											<input name="updatesubrentangbmb" type="submit" value="Update" />
											</div>
                                    <div class="control-group">
											<input name="backsubbmb" type="submit" value="Kembali" />
											</div>
                                    
                                            </form>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                <?php  }
                 else
                 { ?> <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Sub Kriteria (Tidak Ada Rentang) </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12" >
                                   <form method="post" action="<?php echo $PHP_SELF ?>">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                        <thead>
                                            <tr>
                                                <th><center>Sub Kriteria</center></th>
                                                <th><center>Score</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
										<?php
										$i=0;
										$cl=warning;
										$e=mysql_fetch_array(mysql_query("select * from subkriteriabmb where nama_kriteria='$_GET[id]'"));
										$sub=mysql_fetch_array(mysql_query("select * from kriteria_bmb where nama_kriteria='$_GET[id]'"));
										while ($i < $sub[subkriteria] )
										{$i++;
										$nosub=mysql_fetch_array(mysql_query("select * from subkriteriabmb where  nama_kriteria='$_GET[id]'and no_sub= '$i'  and jenis = '$sub[jenis]' "));
										?> 
                                            <tr>
                                                <td><center><input type='text' name='subkriteria[]' placeholder='Masukkan Subkriteria' class='span7 ' value="<?php echo "$nosub[subkriteria]";?>"></center></td>
                                                <td><center><input type='text' name='score[]' placeholder='Masukkan angka' class='span7 'value="<?php echo "$nosub[score]";?>"></center></td> 
                                                <input type='hidden' name='nosub[]' class='span7 ' value="<?php echo "$i";?>">                                          
                                            </tr>
                                            <?php
										}
										?>
                                       
                                        </tbody>
                                        </table>
                                    <td><input type='hidden' name='nama_kriteria' class='span7 ' value="<?php echo "$sub[nama_kriteria]";?>"></td>
                                    <td><input type='hidden' name='jumlah' class='span7 ' value="<?php echo "$sub[subkriteria]";?>"></td>
                                    <td><input type='hidden' name='jenis' class='span7 ' value="<?php echo "$sub[jenis]";?>"></td>
                                    
                                    <div class="control-group">
											<input name="updatesubnonrentangbmb" type="submit" value="Update" />
											</div>
                                    <div class="control-group">
											<input name="backsubbmb" type="submit" value="Kembali" />
											</div>
                                    
                                            </form>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>     <?php }
				 ?>
                 
               <?php
				} 
				if($_GET[hal] == 'bmm')
				{
					 
                    
				?>	
				<div class="row-fluid">
                        <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Persentase Aspek Bantuan Mahasiswa Miskin (Dalam persen)</div>
                                <div class="pull-right">
                                  
                                </div>
                            </div>
                            
                            <div class="block-content collapse in">
                               <div class="span13">
                              
							   <form method="post" action="<?php echo $PHP_SELF ?>">
                                    <table class="table">
									
									<thead>
                                    
                                     <?php
							 $a_bmm=mysql_query("select * from aspek_bmm order by id_aspek asc");
                   while ($r_abmm=mysql_fetch_array($a_bmm))
				   {?><th>
                       <?php echo "$r_abmm[nama_aspek]";?><a href="hapusaspekbmm.php?id=<?php echo "$r_abmm[nama_aspek]";?>" onclick="return confirm('Apakah kamu yakin ingin menghapus aspek ini ?');"><?php echo "(";?><i class='icon-remove'></i><?php echo ")";?></a></th> <?php }?>
                      
									</thead>
									<tbody>
									<tr><?php
							 $a_bmm=mysql_query("select * from aspek_bmm order by id_aspek asc");
                   while ($r_abmm=mysql_fetch_array($a_bmm))
				   {?><td><input type='text' name='<?php echo "$r_abmm[id_aspek]";?>' placeholder="<?php echo "$r_abmm[nama_aspek]";?>" class='span5 '></td>
                      <?php              
					  } ?>
                                   	</tr>
									
									</tbody></table>
									<div class="form-actions">
												<input type='submit' name='perbaikan' value="Update Persentase" class="btn btn-primary">
                                                </div>
											</form>
                                            <a href="cont.php?module=addaspekbmm"><i class='icon-plus'></i>  Tambah Aspek</a>
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                        <thead>
                                            <tr>
                        					<?php
							 				$a_bmm=mysql_query("select * from aspek_bmm order by id_aspek asc");
                  							while ($r_abmm=mysql_fetch_array($a_bmm))
				   							{?>
                                            <th>
                                    
					 						<?php echo "$r_abmm[nama_aspek] ";?></th> <?php }?>
                                        	<tbody>
                                            <tr class="success">
										<?php
										$a=mysql_query("select * from aspek_bmm order by id_aspek asc");
										while ($b_bmm=mysql_fetch_array($a))
										{
									     ?>
                                            
                                                <td><?php echo "$b_bmm[persentase]";?> </td>
                                                <?php
										}
										?>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                        
                    </div>
                    <?php
				}
				
				if($_GET[hal] == 'berita')
				{
				
				?>	
				<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Kelola Berita </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <a href="cont.php?module=add"><i class='icon-plus'></i>  Tambah Berita</a>
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                        <thead>
                                            <tr>
                                                <th><center>Judul</center></th>
                                                <th><center>Headline</center></th>
                                                <th><center>Aksi</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
										$cl=warning;
										$sis=mysql_query("select * from berita order by id_berita desc   ");
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
                                               
                                                <td><?php echo" $r[judul]";?> </td>
                                               	<td><center><?php echo" $r[headline]";?></center> </td>
                                                <td class="center">
												<a href="hapus.php?id=<?php echo "$r[id_berita]";?>"onclick="return confirm('Apakah kamu yakin ingin menghapus berita ini ?');"><i class='icon-remove'></i> hapus</a> | 
												<a href="cont.php?hal=edit&id=<?php echo "$r[id_berita]";?>"><i class='icon-edit'></i> edit</a> |
												<a href="../permohonan/index.php?hal=<?php echo"$r[judul_seo]";?>" target="_blank">
												<i class="icon-globe"></i>Lihat</a></td>
												
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
				if($_GET[hal] == 'bobot')
				{
				
				?>	
				<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Tabel Bobot </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <a href="cont.php?module=addbobot"><i class='icon-plus'></i>  Tambah Bobot</a>
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                        <thead>
                                            <tr>
                                                <th><center>Selisih</center></th>
                                                <th><center>Bobot</center></th>
                                                <th><center>Keterangan</center></th>
                                                <th><center>Aksi</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
										$cl=warning;
										$bob=mysql_query("select * from bobot order by selisih desc   ");
										while ($r=mysql_fetch_array($bob))
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
                                               
                                                <td><center><?php echo" $r[selisih]";?></center> </td>
                                               	<td><center><?php echo" $r[nilai]";?></center> </td>
                                                <td><?php echo" $r[keterangan]";?> </td>
                                                <td class="center">
												<a href="hapusbobot.php?id=<?php echo "$r[selisih]";?>"onclick="return confirm('Apakah kamu yakin ingin menghapus bobot ini ?');"><i class='icon-remove'></i> hapus</a> | 
												<a href="cont.php?hal=editbobot&id=<?php echo "$r[selisih]";?>"><i class='icon-edit'></i> edit</a></td>
												
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
				
				if($_GET[hal]== 'mahasiswabmb')
				{
				 $d=mysql_query("select * from mahasiswa_bmb order by nim asc");
                   while ($r=mysql_fetch_array($d))
				   {
					   if ($r[ipk]>=3.25 and $r[ipk]<=3.39)
					   {
					   $gapipk=1;
					   }
					   if ($r[ipk]>=.43 and $r[ipk]<=3.54)
					   {
					   $gapipk=2;
					   }
					    if ($r[ipk]>=3.55 and $r[ipk]<=3.69)
					   {
					   $gapipk=3;
					   }
					    if ($r[ipk]>=3.70 and $r[ipk]<=3.84)
					   {
					   $gapipk=4;
					   }
					  if ($r[ipk]>=3.85 and $r[ipk]<=4.00)
					   {
					   $gapipk=5;
					   } 
					   if ($r[semester]==3)
					   {
					   $gapsemester=5;
					   }
					   if ($r[semester]==4)
					   {
					   $gapsemester=4;
					   }
					   if ($r[semester]==5)
					   {
					   $gapsemester=3;
					   }
					   if ($r[semester]==6)
					   {
					   $gapsemester=2;
					   }
					   if ($r[semester]==7)
					   {
					   $gapsemester=1;
					   }
					   if ($r[organisasi]=="Aktif")
					   {
					   $gaporganisasi=2;
					   }
					   if ($r[organisasi]=="Tidak Aktif")
					   {
					   $gaporganisasi=5;
					   }
					   if ($r[prestasi]=="Ada")
					   {
					   $gapprestasi=2;
					   }
					   if ($r[prestasi]=="Tidak Ada")
					   {
					   $gaporganisasi=5;
					   }
					   
					   $cv=mysql_fetch_array(mysql_query("select * from profil_target_bmb"));
					   $selisihipk= $gapipk - $cv[pt_ipk];
					   $selisihsemester= $gapsemester - $cv[pt_semester];
					   $selisihorganisasi= $gaporganisasi - $cv[pt_organisasi];
					   $selisihprestasi= $gapprestasi - $cv[pt_prestasi];
					   
					   if ($selisihipk==0)
					   {
					   $bobotipk=5;
					   }
					   if ($selisihipk==1)
					   {
					   $bobotipk=4.5;
					   }
					   if ($selisihipk==-1)
					   {
					   $bobotipk=4;
					   }
					   if ($selisihipk==2)
					   {
					   $bobotipk=3.5;
					   }
					   if ($selisihipk==-2)
					   {
					   $bobotipk=3;
					   }
					   if ($selisihipk==3)
					   {
					   $bobotipk=2.5;
					   }
					   if ($selisihipk==-3)
					   {
					   $bobotipk=2;
					   }
					   if ($selisihipk==4)
					   {
					   $bobotipk=1.5;
					   }
					   if ($selisihipk==-4)
					   {
					   $bobotipk=1;
					   }
					   if ($selisihsemester==0)
					   {
					   $bobotsemester=5;
					   }
					   if ($selisihsemester==1)
					   {
					   $bobotsemester=4.5;
					   }
					   if ($selisihsemester==-1)
					   {
					   $bobotsemester=4;
					   }
					   if ($selisihsemester==2)
					   {
					   $bobotsemester=3.5;
					   }
					   if ($selisihsemester==-2)
					   {
					   $bobotsemester=3;
					   }
					   if ($selisihsemester==3)
					   {
					   $bobotsemester=2.5;
					   }
					   if ($selisihsemester==-3)
					   {
					   $bobotsemester=2;
					   }
					   if ($selisihsemester==4)
					   {
					   $bobotsemester=1.5;
					   }
					   if ($selisihsemester==-4)
					   {
					   $bobotsemester=1;
					   }
					   if ($selisihorganisasi==0)
					   {
					   $bobotorganisasi=5;
					   }
					   if ($selisihorganisasi==1)
					   {
					   $bobotorganisasi=4.5;
					   }
					   if ($selisihorganisasi==-1)
					   {
					   $bobotorganisasi=4;
					   }
					   if ($selisihorganisasi==2)
					   {
					   $bobotorganisasi=3.5;
					   }
					   if ($selisihorganisasi==-2)
					   {
					   $bobotorganisasi=3;
					   }
					   if ($selisihorganisasi==3)
					   {
					   $bobotorganisasi=2.5;
					   }
					   if ($selisihorganisasi==-3)
					   {
					   $bobotorganisasi=2;
					   }
					   if ($selisihorganisasi==4)
					   {
					   $bobotorganisasi=1.5;
					   }
					   if ($selisihorganisasi==-4)
					   {
					   $bobotorganisasi=1;
					   }
					   if ($selisihprestasi==0)
					   {
					   $bobotprestasi=5;
					   }
					   if ($selisihprestasi==1)
					   {
					   $bobotprestasi=4.5;
					   }
					   if ($selisihprestasi==-1)
					   {
					   $bobotprestasi=4;
					   }
					   if ($selisihprestasi==2)
					   {
					   $bobotprestasi=3.5;
					   }
					   if ($selisihprestasi==-2)
					   {
					   $bobotprestasi=3;
					   }
					   if ($selisihprestasi==3)
					   {
					   $bobotprestasi=2.5;
					   }
					   if ($selisihprestasi==-3)
					   {
					   $bobotprestasi=2;
					   }
					   if ($selisihprestasi==4)
					   {
					   $bobotprestasi=1.5;
					   }
					   if ($selisihprestasi==-4)
					   {
					   $bobotprestasi=1;
					   }
					   
					   $cf_akademik_bmb = $bobotipk;
					   $sf_akademik_bmb = $bobotsemester;
					   $cf_eskstrakurikuler_bmb = $bobotorganisasi;
					   $sf_eskstrakurikuler_bmb = $bobotprestasi;
					   $nf_akademik_bmb = 0.6 * $cf_akademik_bmb + 0.4 * $sf_akademik_bmb;
					   $nf_ekstrakurikuler_bmb = 0.6 * $cf_ekstrakurikuler_bmb + 0.4 * $sf_ekstrakurikuler_bmb;
					   $nilai_akhir_bmb = 0.75 * $nf_akademik_bmb + 0.25 * $nf_ekstrakurikuler_bmb;
				      					  
					   mysql_query("update mahasiswa_bmb set preferensi='$nilai_akhir_bmb' where nim='$r[nim]'");
				
				}
				   
				
                ?>		 
				<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Data mahasiswa yang mengajukan Beasiswa Mahasiswa Berprestasi</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12" >
                                   
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>NIM</th>
                                                <th>Tempat, Tanggal Lahir</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Program Studi</th>
                                                <th>IPK</th>
                                                <th>Semester</th>
                                                <th>No. HP</th>
                                                <th>Alamat</th>
                                                <th class="center">Keaktifan<br/>Organisasi</th>
                                                <th class="center">Status<br/>Prestasi</th>
                                                <th class="center">Nama<br/>Orangtua</th>
                                                <th class="center">Alamat<br/>Orangtua</th>
                                                <th class="center">Pekerjaan<br/>Orangtua</th>
                                                <th class="center">No. HP<br/>Orangtua</th>   
                                                <th>Preferensi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
										$cl=warning;
										$sis=mysql_query("select * from mahasiswa_bmb order by nim desc");
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
                                                <td><?php echo" $r[tempat_ttl] , $r[tanggal_ttl]";?></td>
                                                <td><?php echo" $r[jk]";?> </td>
                                                <td><?php echo" $r[prodi]";?> </td>
                                                <td><?php echo" $r[ipk]";?></td>
                                                <td><?php echo" $r[semester]";?> </td>
                                                <td><?php echo" $r[no_hp_mhs]";?> </td>
                                                <td><?php echo" $r[alamat_mhs]";?></td>
                                                <td><?php echo" $r[organisasi]";?> </td>
                                                <td><?php echo" $r[prestasi]";?> </td>
                                                <td><?php echo" $r[nama_orangtua]";?> </td>
                                                <td><?php echo" $r[alamat_orangtua]";?> </td>
                                                <td><?php echo" $r[pekerjaan]";?></td>
                                                <td><?php echo" $r[no_hp_orangtua]";?></td>
												     </td>
                                                <td class="center"><?php $p=number_format( $r[preferensi],2); echo"$p";?></td>
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
				if($_GET[hal] == 'awalperhitunganbmb')
				{
	
	function tampilbariskriteria($arr)
	{	
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table  table-bordered table-highlight">';
		echo '
		<tr>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Ekstrakurikuler</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<tr>';
		
		echo '<tr>';
			  for ($i=0;$i<count($arr);$i++)
			  {
			    echo '<td>'.$arr[$i].'</td>';
			  }
		echo "</tr>";
		echo '</table> </div></div>';
	}
	
	function tampilkolommahasiswa($arr)
	{
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table table-bordered table-highlight">';
		echo '
		<tr><td><h6>Nama Mahasiswa</h6></td>
		<tr>';
	  for ($i=0;$i<count($arr);$i++)
	  {
			echo '<tr>';
			    echo '<td>'.$arr[$i].'</td>';
			echo "</tr>";
	   }
		echo
		 '</table> </div></div>';
	}
    $mhsbmb = array();
	
	$querymhsbmb = mysql_query("SELECT * FROM mahasiswa_bmb ORDER BY nim asc");
	$i=0;
	
	while ($datamhsbmb = mysql_fetch_array($querymhsbmb))
	{
		$mhsbmb[$i] = $datamhsbmb['nama_mhs'];
		$i++;
	} 
	
	
	
	$kriteriabmb = array(); //array("Harga", "Kualitas", "Fitur", "Populer", "Purna Jual", "Keawetan");
	
	$factorbmb = array(); //array("cost", "benefit", "benefit", "benefit", "benefit", "benefit");
	
	$profil_targetbmb = array(); //array(4, 5, 4, 3, 3, 2);

	$querykriteriabmb = mysql_query("SELECT * FROM kriteria_bmb ORDER BY nama_aspek asc");
	$i=0;
	while ($datakriteriabmb = mysql_fetch_array($querykriteriabmb))
	{
		$kriteriabmb[$i] = $datakriteriabmb['nama_kriteria'];
		$factorbmb[$i] = $datakriteriabmb['factor'];
		$profil_targetbmb[$i] = $datakriteriabmb['profil_target'];
		$i++;
	}   
	
	
				?>	
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
<div class="navbar navbar-inner block-header">
<div class="muted pull-left"><h4>Daftar Mahasiswa :</h4></div>
</div>
<?php tampilkolommahasiswa($mhsbmb); ?>

<div class="navbar navbar-inner block-header">
<div class="muted pull-left"><h4>Daftar Kriteria BMB :</h4></div>
</div>
<?php tampilbariskriteria($kriteriabmb); ?>
</div>
<div class="muted pull-right"><input type="button" class="btn btn-success" value="Next" onclick="window.location='cont.php?hal=langkahbmb1'"/><p><p></div>
</div>

                <?php
				}
				if($_GET[hal] == 'langkahbmb1')
				{
	
	function tampiltabel($arr)
	{
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
			  for ($j=0;$j<count($arr[$i]);$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	

	function tampilbarisfactor($arr)
	{	
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table  table-bordered table-highlight">';
		echo '
		<tr>
		<td rowspan="2" ><h6><center><br><p><p>Nama Factor</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="2"><h6><center>Ekstrakurikuler</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<tr>';
		echo '<tr>
		<td><center>Jenis Factor</center></td>';
			  for ($i=0;$i<count($arr);$i++)
			  {
			    echo '<td>'.$arr[$i].'</td>';
			  }
		echo "</tr>";
		echo '</table> </div></div>';
	}
	function tampilbariskriteria($arr)
	{	
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table  table-bordered table-highlight">';
		echo '
		<tr>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="2"><h6><center>Ekstrakurikuler</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<tr>';
		
		echo '<tr>';
			  for ($i=0;$i<count($arr);$i++)
			  {
			    echo '<td>'.$arr[$i].'</td>';
			  }
		echo "</tr>";
		echo '</table> </div></div>';
	}
	function tampilbarispt($arr)
	{	
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table  table-bordered table-highlight">';
		echo '
		<tr>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="2"><h6><center>Ekstrakurikuler</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<tr>';
		
		echo '<tr>';
			  for ($i=0;$i<count($arr);$i++)
			  {
			    echo '<td>'.$arr[$i].'</td>';
			  }
		echo "</tr>";
		echo '</table> </div></div>';
	}

	function tampilkolom($arr)
	{
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table table-bordered table-highlight">';
	  for ($i=0;$i<count($arr);$i++)
	  {
			echo '<tr>';
			    echo '<td>'.$arr[$i].'</td>';
			echo "</tr>";
	   }
		echo
		 '</table> </div></div>';
	}
	function tampilkolommahasiswa($arr)
	{
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table table-bordered table-highlight">';
		echo '
		<tr><td><h6>Nama Mahasiswa</h6></td>
		<tr>';
	  for ($i=0;$i<count($arr);$i++)
	  {
			echo '<tr>';
			    echo '<td>'.$arr[$i].'</td>';
			echo "</tr>";
	   }
		echo
		 '</table> </div></div>';
	}
    $mhsbmb = array();
	
	$querymhsbmb = mysql_query("SELECT * FROM mahasiswa_bmb ORDER BY nim asc");
	$i=0;
	
	while ($datamhsbmb = mysql_fetch_array($querymhsbmb))
	{
		$mhsbmb[$i] = $datamhsbmb['nama_mhs'];
		$i++;
	} 
	
	
	
	$kriteriabmb = array(); //array("Harga", "Kualitas", "Fitur", "Populer", "Purna Jual", "Keawetan");
	
	$factorbmb = array(); //array("cost", "benefit", "benefit", "benefit", "benefit", "benefit");
	
	$profil_targetbmb = array(); //array(4, 5, 4, 3, 3, 2);

	$querykriteriabmb = mysql_query("SELECT * FROM kriteria_bmb ORDER BY nama_aspek asc");
	$i=0;
	while ($datakriteriabmb = mysql_fetch_array($querykriteriabmb))
	{
		$kriteriabmb[$i] = $datakriteriabmb['nama_kriteria'];
		$factorbmb[$i] = $datakriteriabmb['factor'];
		$profil_targetbmb[$i] = $datakriteriabmb['profil_target'];
		$i++;
	}     
	
	$mhsbmbxkriteria = array();
	$querymhsbmb = mysql_query("SELECT * FROM mahasiswa_bmb ORDER BY nim asc");
	$i=0;
	while ($datamhsbmb = mysql_fetch_array($querymhsbmb))
	{$querykriteriabmb = mysql_query("SELECT * FROM kriteria_bmb ORDER BY nama_aspek asc ");
		$j=0;
		while ($datakriteriabmb = mysql_fetch_array($querykriteriabmb))
		{
			$sub = mysql_query("SELECT * FROM subkriteriabmb WHERE nama_kriteria = '$datakriteriabmb[nama_kriteria]'");
			$ssub = mysql_fetch_array($sub);//milih aspek
		
			$querymhsbmb2 = mysql_query("SELECT * FROM mahasiswa_bmb WHERE nama_mhs = '$datamhsbmm[nama_mhs]'");
			$datamhsbmb2 = mysql_fetch_array($querymhsbmb2);//milih nama mhs
			
			if ($datakriteriabmb['nama_kriteria'] =="IPK")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmb['subkriteria'];$k++)
			{$kriteria = $datakriteriabmb['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmb WHERE nama_kriteria = 'IPK' and no_sub = '$k'"));
			if ($datamhsbmb['ipk'] >= $pilihsub['rentang_bawah'] and $datamhsbmb['ipk'] <= $pilihsub['rentang_atas'])
			{
				$scoreipk = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "IPK")
		
		if ($datakriteriabmb['nama_kriteria'] =="Semester")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmb['subkriteria'];$k++)
			{$kriteria = $datakriteriabmb['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmb WHERE nama_kriteria = 'Semester' and no_sub = '$k'"));
			if ($datamhsbmb['semester'] == $pilihsub['subkriteria'])
			{
				$scoresemester = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "jenistinggal")
		
		if ($datakriteriabmb['nama_kriteria'] =="Organisasi")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmb['subkriteria'];$k++)
			{$kriteria = $datakriteriabmb['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmb WHERE nama_kriteria = 'Organisasi' and no_sub = '$k'"));
			if ($datamhsbmb['organisasi'] == $pilihsub['subkriteria'])
			{
				$scoreorganisasi = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "jenistinggal")
		
		if ($datakriteriabmb['nama_kriteria'] =="Prestasi Non-Akademik")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmb['subkriteria'];$k++)
			{$kriteria = $datakriteriabmb['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmb WHERE nama_kriteria = 'Prestasi Non-Akademik' and no_sub = '$k'"));
			if ($datamhsbmb['prestasi'] == $pilihsub['subkriteria'])
			{
				$scoreprestasi = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "jenistinggal")
		
		
			if($j == 0)
			{$jk = $j- 1 ;
			$mhsbmbxkriteria[$i][$jk] = $mhsbmb[$i];
			$mhsbmbxkriteria[$i][$j] = $scoreipk;
			}
			if($j == 1)
			{
			$mhsbmbxkriteria[$i][$j] = $scoresemester;
			}
			if($j == 2)
			{
			$mhsbmbxkriteria[$i][$j] = $scoreorganisasi;
			}
			if($j == 3)
			{
			$mhsbmbxkriteria[$i][$j] = $scoreprestasi;
			}
			
		$j++;
			
		} // untuk while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
		 $i++;
	} // untuk while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	    
	function tampiltabelpgap($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="2"><h6><center>Ekstrakurikuler</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	
	$selisihbmb = array();
	
	for ($i=0;$i<count($mhsbmb);$i++)
	{
		for ($j=0;$j<count($kriteriabmb);$j++)
		{ 	$jk = 0-1 ;
			$selisihbmb[$i][$jk] = $mhsbmb[$i];
			$selisihbmb[$i][$j] = $mhsbmbxkriteria[$i][$j] -  $profil_targetbmb[$j] ;
		
		}
		
	}
	function tampiltabelselisih($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="2"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
		
	
				?>	
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">               
<div class="navbar navbar-inner block-header">
<div class="muted pull-left"><h4>Pemetaan GAP :</h4></div>
</div>
<?php tampiltabelpgap($mhsbmbxkriteria); ?>

<div class="navbar navbar-inner block-header">
<div class="muted pull-left"><h4>Profil Target :</h4></div>
</div>
<?php tampilbarispt($profil_targetbmb); ?>

<div class="navbar navbar-inner block-header">
<div class="muted pull-left"><h4>Selisih Pemetaan GAP dan Profil Target :</h4></div>
</div>
<?php tampiltabelselisih($selisihbmb); ?>

                        <!-- /block -->
                    </div>
                    <div class="muted pull-left"><input type="button" class="btn btn-success" value="Back" onclick="window.location='cont.php?hal=awalperhitunganbmb'"/><p><p></div>
                    <div class="muted pull-right"><input type="button" class="btn btn-success" value="Next" onclick="window.location='cont.php?hal=langkahbmb2'"/><p><p></div></div>
				
				<?php
				}
				if($_GET[hal] == 'langkahbmb2')
				{
	
		function tampiltabel($arr)
	{
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
			  for ($j=0;$j<count($arr[$i]);$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	

	function tampilbarisfactor($arr)
	{	
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table  table-bordered table-highlight">';
		echo '
		<tr>
		<td rowspan="2" ><h6><center><br><p><p>Nama Factor</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="2"><h6><center>Ekstrakurikuler</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<tr>';
		echo '<tr>
		<td><center>Jenis Factor</center></td>';
			  for ($i=0;$i<count($arr);$i++)
			  {
			    echo '<td>'.$arr[$i].'</td>';
			  }
		echo "</tr>";
		echo '</table> </div></div>';
	}
	function tampilbariskriteria($arr)
	{	
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table  table-bordered table-highlight">';
		echo '
		<tr>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="2"><h6><center>Ekstrakurikuler</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<tr>';
		
		echo '<tr>';
			  for ($i=0;$i<count($arr);$i++)
			  {
			    echo '<td>'.$arr[$i].'</td>';
			  }
		echo "</tr>";
		echo '</table> </div></div>';
	}
	function tampilbarispt($arr)
	{	
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table  table-bordered table-highlight">';
		echo '
		<tr>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="2"><h6><center>Ekstrakurikuler</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<tr>';
		
		echo '<tr>';
			  for ($i=0;$i<count($arr);$i++)
			  {
			    echo '<td>'.$arr[$i].'</td>';
			  }
		echo "</tr>";
		echo '</table> </div></div>';
	}

	function tampilkolom($arr)
	{
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table table-bordered table-highlight">';
	  for ($i=0;$i<count($arr);$i++)
	  {
			echo '<tr>';
			    echo '<td>'.$arr[$i].'</td>';
			echo "</tr>";
	   }
		echo
		 '</table> </div></div>';
	}
	function tampilkolommahasiswa($arr)
	{
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table table-bordered table-highlight">';
		echo '
		<tr><td><h6>Nama Mahasiswa</h6></td>
		<tr>';
	  for ($i=0;$i<count($arr);$i++)
	  {
			echo '<tr>';
			    echo '<td>'.$arr[$i].'</td>';
			echo "</tr>";
	   }
		echo
		 '</table> </div></div>';
	}
    $mhsbmb = array();
	
	$querymhsbmb = mysql_query("SELECT * FROM mahasiswa_bmb ORDER BY nim asc");
	$i=0;
	
	while ($datamhsbmb = mysql_fetch_array($querymhsbmb))
	{
		$mhsbmb[$i] = $datamhsbmb['nama_mhs'];
		$i++;
	} 
	
	
	
	$kriteriabmb = array(); //array("Harga", "Kualitas", "Fitur", "Populer", "Purna Jual", "Keawetan");
	
	$factorbmb = array(); //array("cost", "benefit", "benefit", "benefit", "benefit", "benefit");
	
	$profil_targetbmb = array(); //array(4, 5, 4, 3, 3, 2);

	$querykriteriabmb = mysql_query("SELECT * FROM kriteria_bmb ORDER BY nama_aspek asc");
	$i=0;
	while ($datakriteriabmb = mysql_fetch_array($querykriteriabmb))
	{
		$kriteriabmb[$i] = $datakriteriabmb['nama_kriteria'];
		$factorbmb[$i] = $datakriteriabmb['factor'];
		$profil_targetbmb[$i] = $datakriteriabmb['profil_target'];
		$i++;
	}     
	
	$mhsbmbxkriteria = array();
	$querymhsbmb = mysql_query("SELECT * FROM mahasiswa_bmb ORDER BY nim asc");
	$i=0;
	while ($datamhsbmb = mysql_fetch_array($querymhsbmb))
	{$querykriteriabmb = mysql_query("SELECT * FROM kriteria_bmb ORDER BY nama_aspek asc ");
		$j=0;
		while ($datakriteriabmb = mysql_fetch_array($querykriteriabmb))
		{
			$sub = mysql_query("SELECT * FROM subkriteriabmb WHERE nama_kriteria = '$datakriteriabmb[nama_kriteria]'");
			$ssub = mysql_fetch_array($sub);//milih aspek
		
			$querymhsbmb2 = mysql_query("SELECT * FROM mahasiswa_bmb WHERE nama_mhs = '$datamhsbmm[nama_mhs]'");
			$datamhsbmb2 = mysql_fetch_array($querymhsbmb2);//milih nama mhs
			
			if ($datakriteriabmb['nama_kriteria'] =="IPK")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmb['subkriteria'];$k++)
			{$kriteria = $datakriteriabmb['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmb WHERE nama_kriteria = 'IPK' and no_sub = '$k'"));
			if ($datamhsbmb['ipk'] >= $pilihsub['rentang_bawah'] and $datamhsbmb['ipk'] <= $pilihsub['rentang_atas'])
			{
				$scoreipk = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "IPK")
		
		if ($datakriteriabmb['nama_kriteria'] =="Semester")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmb['subkriteria'];$k++)
			{$kriteria = $datakriteriabmb['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmb WHERE nama_kriteria = 'Semester' and no_sub = '$k'"));
			if ($datamhsbmb['semester'] == $pilihsub['subkriteria'])
			{
				$scoresemester = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "jenistinggal")
		
		if ($datakriteriabmb['nama_kriteria'] =="Organisasi")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmb['subkriteria'];$k++)
			{$kriteria = $datakriteriabmb['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmb WHERE nama_kriteria = 'Organisasi' and no_sub = '$k'"));
			if ($datamhsbmb['organisasi'] == $pilihsub['subkriteria'])
			{
				$scoreorganisasi = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "jenistinggal")
		
		if ($datakriteriabmb['nama_kriteria'] =="Prestasi Non-Akademik")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmb['subkriteria'];$k++)
			{$kriteria = $datakriteriabmb['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmb WHERE nama_kriteria = 'Prestasi Non-Akademik' and no_sub = '$k'"));
			if ($datamhsbmb['prestasi'] == $pilihsub['subkriteria'])
			{
				$scoreprestasi = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "jenistinggal")
		
		
			if($j == 0)
			{$jk = $j- 1 ;
			$mhsbmbxkriteria[$i][$jk] = $mhsbmb[$i];
			$mhsbmbxkriteria[$i][$j] = $scoreipk;
			}
			if($j == 1)
			{
			$mhsbmbxkriteria[$i][$j] = $scoresemester;
			}
			if($j == 2)
			{
			$mhsbmbxkriteria[$i][$j] = $scoreorganisasi;
			}
			if($j == 3)
			{
			$mhsbmbxkriteria[$i][$j] = $scoreprestasi;
			}
			
		$j++;
			
		} // untuk while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
		 $i++;
	} // untuk while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	    
	function tampiltabelpgap($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="2"><h6><center>Ekstrakurikuler</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	
	$selisihbmb = array();
	
	for ($i=0;$i<count($mhsbmb);$i++)
	{
		for ($j=0;$j<count($kriteriabmb);$j++)
		{ 	$jk = 0-1 ;
			$selisihbmb[$i][$jk] = $mhsbmb[$i];
			$selisihbmb[$i][$j] = $mhsbmbxkriteria[$i][$j] -  $profil_targetbmb[$j] ;
		
		}
		
	}
	function tampiltabelselisih($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="2"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	
	$bobotbmb = array();
	
	for ($i=0;$i<count($mhsbmb);$i++)
	{
		for ($j=0;$j<count($kriteriabmb);$j++)
		{ $querybobotbmb = mysql_query("SELECT * FROM bobot");
	      while ($databobotbmb = mysql_fetch_array($querybobotbmb))
			{ if($selisihbmb[$i][$j] == $databobotbmb['selisih'])
			{
				$jk = 0-1 ;
				$bobotbmb[$i][$jk] = $mhsbmb[$i];
				$bobotbmb[$i][$j] = $databobotbmb['nilai']; 
			}
			}
		}
		
	}
	function tampiltabelbobot($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Ekstrakurikuler</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	
				?>	
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">


<div class="navbar navbar-inner block-header">
<div class="muted pull-left"><h4>Bobot Nilai GAP :</h4></div>
</div>
<?php tampiltabelbobot($bobotbmb); ?>

                    </div>
                    
                    <div class="muted pull-left"><input type="button" class="btn btn-success" value="Back" onclick="window.location='cont.php?hal=langkahbmb1'"/><p><p></div>
                    <div class="muted pull-right"><input type="button" class="btn btn-success" value="Next" onclick="window.location='cont.php?hal=langkahbmb3'"/><p><p></div></div>
                <?php
				}
				if($_GET[hal] == 'langkahbmb3')
				{
		function tampiltabel($arr)
	{
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
			  for ($j=0;$j<count($arr[$i]);$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	

	function tampilbarisfactor($arr)
	{	
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table  table-bordered table-highlight">';
		echo '
		<tr>
		<td rowspan="2" ><h6><center><br><p><p>Nama Factor</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="2"><h6><center>Ekstrakurikuler</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<tr>';
		echo '<tr>
		<td><center>Jenis Factor</center></td>';
			  for ($i=0;$i<count($arr);$i++)
			  {
			    echo '<td>'.$arr[$i].'</td>';
			  }
		echo "</tr>";
		echo '</table> </div></div>';
	}
	function tampilbariskriteria($arr)
	{	
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table  table-bordered table-highlight">';
		echo '
		<tr>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="2"><h6><center>Ekstrakurikuler</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<tr>';
		
		echo '<tr>';
			  for ($i=0;$i<count($arr);$i++)
			  {
			    echo '<td>'.$arr[$i].'</td>';
			  }
		echo "</tr>";
		echo '</table> </div></div>';
	}
	function tampilbarispt($arr)
	{	
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table  table-bordered table-highlight">';
		echo '
		<tr>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="2"><h6><center>Ekstrakurikuler</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<tr>';
		
		echo '<tr>';
			  for ($i=0;$i<count($arr);$i++)
			  {
			    echo '<td>'.$arr[$i].'</td>';
			  }
		echo "</tr>";
		echo '</table> </div></div>';
	}

	function tampilkolom($arr)
	{
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table table-bordered table-highlight">';
	  for ($i=0;$i<count($arr);$i++)
	  {
			echo '<tr>';
			    echo '<td>'.$arr[$i].'</td>';
			echo "</tr>";
	   }
		echo
		 '</table> </div></div>';
	}
	function tampilkolommahasiswa($arr)
	{
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table table-bordered table-highlight">';
		echo '
		<tr><td><h6>Nama Mahasiswa</h6></td>
		<tr>';
	  for ($i=0;$i<count($arr);$i++)
	  {
			echo '<tr>';
			    echo '<td>'.$arr[$i].'</td>';
			echo "</tr>";
	   }
		echo
		 '</table> </div></div>';
	}
    $mhsbmb = array();
	
	$querymhsbmb = mysql_query("SELECT * FROM mahasiswa_bmb ORDER BY nim asc");
	$i=0;
	
	while ($datamhsbmb = mysql_fetch_array($querymhsbmb))
	{
		$mhsbmb[$i] = $datamhsbmb['nama_mhs'];
		$i++;
	} 
	
	
	
	$kriteriabmb = array(); //array("Harga", "Kualitas", "Fitur", "Populer", "Purna Jual", "Keawetan");
	
	$factorbmb = array(); //array("cost", "benefit", "benefit", "benefit", "benefit", "benefit");
	
	$profil_targetbmb = array(); //array(4, 5, 4, 3, 3, 2);

	$querykriteriabmb = mysql_query("SELECT * FROM kriteria_bmb ORDER BY nama_aspek asc");
	$i=0;
	while ($datakriteriabmb = mysql_fetch_array($querykriteriabmb))
	{
		$kriteriabmb[$i] = $datakriteriabmb['nama_kriteria'];
		$factorbmb[$i] = $datakriteriabmb['factor'];
		$profil_targetbmb[$i] = $datakriteriabmb['profil_target'];
		$i++;
	}     
	
	$mhsbmbxkriteria = array();
	$querymhsbmb = mysql_query("SELECT * FROM mahasiswa_bmb ORDER BY nim asc");
	$i=0;
	while ($datamhsbmb = mysql_fetch_array($querymhsbmb))
	{$querykriteriabmb = mysql_query("SELECT * FROM kriteria_bmb ORDER BY nama_aspek asc ");
		$j=0;
		while ($datakriteriabmb = mysql_fetch_array($querykriteriabmb))
		{
			$sub = mysql_query("SELECT * FROM subkriteriabmb WHERE nama_kriteria = '$datakriteriabmb[nama_kriteria]'");
			$ssub = mysql_fetch_array($sub);//milih aspek
		
			$querymhsbmb2 = mysql_query("SELECT * FROM mahasiswa_bmb WHERE nama_mhs = '$datamhsbmm[nama_mhs]'");
			$datamhsbmb2 = mysql_fetch_array($querymhsbmb2);//milih nama mhs
			
			if ($datakriteriabmb['nama_kriteria'] =="IPK")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmb['subkriteria'];$k++)
			{$kriteria = $datakriteriabmb['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmb WHERE nama_kriteria = 'IPK' and no_sub = '$k'"));
			if ($datamhsbmb['ipk'] >= $pilihsub['rentang_bawah'] and $datamhsbmb['ipk'] <= $pilihsub['rentang_atas'])
			{
				$scoreipk = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "IPK")
		
		if ($datakriteriabmb['nama_kriteria'] =="Semester")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmb['subkriteria'];$k++)
			{$kriteria = $datakriteriabmb['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmb WHERE nama_kriteria = 'Semester' and no_sub = '$k'"));
			if ($datamhsbmb['semester'] == $pilihsub['subkriteria'])
			{
				$scoresemester = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "jenistinggal")
		
		if ($datakriteriabmb['nama_kriteria'] =="Organisasi")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmb['subkriteria'];$k++)
			{$kriteria = $datakriteriabmb['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmb WHERE nama_kriteria = 'Organisasi' and no_sub = '$k'"));
			if ($datamhsbmb['organisasi'] == $pilihsub['subkriteria'])
			{
				$scoreorganisasi = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "jenistinggal")
		
		if ($datakriteriabmb['nama_kriteria'] =="Prestasi Non-Akademik")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmb['subkriteria'];$k++)
			{$kriteria = $datakriteriabmb['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmb WHERE nama_kriteria = 'Prestasi Non-Akademik' and no_sub = '$k'"));
			if ($datamhsbmb['prestasi'] == $pilihsub['subkriteria'])
			{
				$scoreprestasi = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "jenistinggal")
		
		
			if($j == 0)
			{$jk = $j- 1 ;
			$mhsbmbxkriteria[$i][$jk] = $mhsbmb[$i];
			$mhsbmbxkriteria[$i][$j] = $scoreipk;
			}
			if($j == 1)
			{
			$mhsbmbxkriteria[$i][$j] = $scoresemester;
			}
			if($j == 2)
			{
			$mhsbmbxkriteria[$i][$j] = $scoreorganisasi;
			}
			if($j == 3)
			{
			$mhsbmbxkriteria[$i][$j] = $scoreprestasi;
			}
			
		$j++;
			
		} // untuk while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
		 $i++;
	} // untuk while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	    
	function tampiltabelpgap($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="2"><h6><center>Ekstrakurikuler</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	
	$selisihbmb = array();
	
	for ($i=0;$i<count($mhsbmb);$i++)
	{
		for ($j=0;$j<count($kriteriabmb);$j++)
		{ 	$jk = 0-1 ;
			$selisihbmb[$i][$jk] = $mhsbmb[$i];
			$selisihbmb[$i][$j] = $mhsbmbxkriteria[$i][$j] -  $profil_targetbmb[$j] ;
		
		}
		
	}
	function tampiltabelselisih($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="2"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	
	$bobotbmb = array();
	
	for ($i=0;$i<count($mhsbmb);$i++)
	{
		for ($j=0;$j<count($kriteriabmb);$j++)
		{ $querybobotbmb = mysql_query("SELECT * FROM bobot");
	      while ($databobotbmb = mysql_fetch_array($querybobotbmb))
			{ if($selisihbmb[$i][$j] == $databobotbmb['selisih'])
			{
				$jk = 0-1 ;
				$bobotbmb[$i][$jk] = $mhsbmb[$i];
				$bobotbmb[$i][$j] = $databobotbmb['nilai']; 
			}
			}
		}
		
	}
	function tampiltabelbobot($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Ekstrakurikuler</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	
	$pengelompokanbmb = array();
	$querymhsbmb = mysql_query("SELECT * FROM mahasiswa_bmb ORDER BY nim asc");
	$i=0;
	while ($datamhsbmb = mysql_fetch_array($querymhsbmb))
	{
		$querykriteriabmb1 = mysql_query("SELECT * FROM kriteria_bmb ");
		$jumlah=mysql_num_rows($querykriteriabmb1);
		$jumlahh= $jumlah + 4;
		$cffinfix=0;
		$sffinfix=0;
		for ($j=0;$j<$jumlahh;$j++)
		{$querykriteriabmb1 = mysql_query("SELECT * FROM kriteria_bmb where nama_aspek='Akademik' ");
		 while ($datakriteriabmb1 = mysql_fetch_array($querykriteriabmb1))
			{		
			if ($datakriteriabmb1['factor'] =="Core")  
				{ $jj = $j - 2;
				$cfaka = $bobotbmb[$i][$jj];
				}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			if ($datakriteriabmb1['factor'] =="Secondary")  
			{ $jj = $j - 2;
				$sfaka = $bobotbmb[$i][$jj];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			}
			$querykriteriabmb2 = mysql_query("SELECT * FROM kriteria_bmb where nama_aspek='Ekstrakurikuler' ");
		 while ($datakriteriabmb2 = mysql_fetch_array($querykriteriabmb2))
			{if ($datakriteriabmb2['nama_kriteria'] == "Organisasi")
			{if ($datakriteriabmb2['factor'] =="Core")  
				{ 
				$cffin1 = $bobotbmb[$i][2];
				}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			if ($datakriteriabmb2['factor'] =="Secondary")  
			{ $jj = $j - 2;
				$sffin1 = $bobotbmb[$i][2];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			}
			if ($datakriteriabmb2['nama_kriteria'] == "Prestasi Non-Akademik")
			{if ($datakriteriabmb2['factor'] =="Core")  
				{ 
				$cffin2 = $bobotbmb[$i][3];
				}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			if ($datakriteriabmb2['factor'] =="Secondary")  
			{ $jj = $j - 2;
				$sffin2 = $bobotbmb[$i][3];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			}
			
			}
			$cfactorr = mysql_query("SELECT * FROM kriteria_bmb WHERE nama_aspek= 'Ekstrakurikuler' and factor = 'Core'");
			$jumlahcore=mysql_num_rows($cfactorr);
			$sfactorr = mysql_query("SELECT * FROM kriteria_bmb WHERE nama_aspek= 'Ekstrakurikuler' and factor = 'Secondary'");
			$jumlahsecondary=mysql_num_rows($sfactorr);
			$cffinfix = ($cffin1 + $cffin2 )/$jumlahcore;
			$sffinfix = ($sffin1 + $sffin2 )/$jumlahsecondary;
						
			if($j == 0)
			{$jk=$j-1;
			$pengelompokanbmb[$i][$jk] = $mhsbmb[$i];
			$pengelompokanbmb[$i][$j] = $bobotbmb[$i][$j];
			}
			if($j == 1)
			{
			$pengelompokanbmb[$i][$j] = $bobotbmb[$i][$j];
			}
			if($j == 2)
			{
			$pengelompokanbmb[$i][$j] = $cfaka;
			}
			if($j == 3)
			{
			$pengelompokanbmb[$i][$j] = $sfaka;
			}
			if($j == 4)
			{$jj= $j - 2;
			$pengelompokanbmb[$i][$j] = $bobotbmb[$i][$jj];
			}
			if($j == 5)
			{$jj= $j - 2;
			$pengelompokanbmb[$i][$j] = $bobotbmb[$i][$jj];
			}
			if($j == 6)
			{
			$pengelompokanbmb[$i][$j] = $cffinfix;
			}
			if($j == 7)
			{
			$pengelompokanbmb[$i][$j] = $sffinfix;
			}
			
		} // untuk while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
		 $i++;
	} // untuk while ($datamhsbmm = mysql_fetch_array($querymhsbmm))	
	function tampiltabelpengelompokan($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="4" ><h6><center>Akademik</center></h6></td>
		<td colspan="6"><h6><center>Ekstrakurikuler</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>Cf</center></h6></td>
		<td><h6><center>Sf</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>Cf</center></h6></td>
		<td><h6><center>Sf</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	
	
				?>	
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">


<div class="navbar navbar-inner block-header">
<div class="muted pull-left"><h4>Jenis Factor :</h4></div>
</div>
<?php tampilbarisfactor($factorbmb); ?>

<div class="navbar navbar-inner block-header">
<div class="muted pull-left"><h4>Pengelompokan Core dan Secondary Factor :</h4></div>
</div>
<?php tampiltabelpengelompokan($pengelompokanbmb); ?></div>
</div>
                    <div class="muted pull-left"><input type="button" class="btn btn-success" value="Back" onclick="window.location='cont.php?hal=langkahbmb2'"/><p><p></div>
                    <div class="muted pull-right"><input type="button" class="btn btn-success" value="Next" onclick="window.location='cont.php?hal=langkahbmb4'"/><p><p></div></div>


                <?php
				}
				if($_GET[hal] == 'langkahbmb4')
				{
					
		function tampiltabel($arr)
	{
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
			  for ($j=0;$j<count($arr[$i]);$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	

	function tampilbarisfactor($arr)
	{	
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table  table-bordered table-highlight">';
		echo '
		<tr>
		<td rowspan="2" ><h6><center><br><p><p>Nama Factor</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="2"><h6><center>Ekstrakurikuler</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<tr>';
		echo '<tr>
		<td><center>Jenis Factor</center></td>';
			  for ($i=0;$i<count($arr);$i++)
			  {
			    echo '<td>'.$arr[$i].'</td>';
			  }
		echo "</tr>";
		echo '</table> </div></div>';
	}
	function tampilbariskriteria($arr)
	{	
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table  table-bordered table-highlight">';
		echo '
		<tr>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="2"><h6><center>Ekstrakurikuler</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<tr>';
		
		echo '<tr>';
			  for ($i=0;$i<count($arr);$i++)
			  {
			    echo '<td>'.$arr[$i].'</td>';
			  }
		echo "</tr>";
		echo '</table> </div></div>';
	}
	function tampilbarispt($arr)
	{	
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table  table-bordered table-highlight">';
		echo '
		<tr>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="2"><h6><center>Ekstrakurikuler</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<tr>';
		
		echo '<tr>';
			  for ($i=0;$i<count($arr);$i++)
			  {
			    echo '<td>'.$arr[$i].'</td>';
			  }
		echo "</tr>";
		echo '</table> </div></div>';
	}

	function tampilkolom($arr)
	{
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table table-bordered table-highlight">';
	  for ($i=0;$i<count($arr);$i++)
	  {
			echo '<tr>';
			    echo '<td>'.$arr[$i].'</td>';
			echo "</tr>";
	   }
		echo
		 '</table> </div></div>';
	}
	function tampilkolommahasiswa($arr)
	{
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table table-bordered table-highlight">';
		echo '
		<tr><td><h6>Nama Mahasiswa</h6></td>
		<tr>';
	  for ($i=0;$i<count($arr);$i++)
	  {
			echo '<tr>';
			    echo '<td>'.$arr[$i].'</td>';
			echo "</tr>";
	   }
		echo
		 '</table> </div></div>';
	}
    $mhsbmb = array();
	
	$querymhsbmb = mysql_query("SELECT * FROM mahasiswa_bmb ORDER BY nim asc");
	$i=0;
	
	while ($datamhsbmb = mysql_fetch_array($querymhsbmb))
	{
		$mhsbmb[$i] = $datamhsbmb['nama_mhs'];
		$i++;
	} 
	
	
	
	$kriteriabmb = array(); //array("Harga", "Kualitas", "Fitur", "Populer", "Purna Jual", "Keawetan");
	
	$factorbmb = array(); //array("cost", "benefit", "benefit", "benefit", "benefit", "benefit");
	
	$profil_targetbmb = array(); //array(4, 5, 4, 3, 3, 2);

	$querykriteriabmb = mysql_query("SELECT * FROM kriteria_bmb ORDER BY nama_aspek asc");
	$i=0;
	while ($datakriteriabmb = mysql_fetch_array($querykriteriabmb))
	{
		$kriteriabmb[$i] = $datakriteriabmb['nama_kriteria'];
		$factorbmb[$i] = $datakriteriabmb['factor'];
		$profil_targetbmb[$i] = $datakriteriabmb['profil_target'];
		$i++;
	}     
	
	$mhsbmbxkriteria = array();
	$querymhsbmb = mysql_query("SELECT * FROM mahasiswa_bmb ORDER BY nim asc");
	$i=0;
	while ($datamhsbmb = mysql_fetch_array($querymhsbmb))
	{$querykriteriabmb = mysql_query("SELECT * FROM kriteria_bmb ORDER BY nama_aspek asc ");
		$j=0;
		while ($datakriteriabmb = mysql_fetch_array($querykriteriabmb))
		{
			$sub = mysql_query("SELECT * FROM subkriteriabmb WHERE nama_kriteria = '$datakriteriabmb[nama_kriteria]'");
			$ssub = mysql_fetch_array($sub);//milih aspek
		
			$querymhsbmb2 = mysql_query("SELECT * FROM mahasiswa_bmb WHERE nama_mhs = '$datamhsbmm[nama_mhs]'");
			$datamhsbmb2 = mysql_fetch_array($querymhsbmb2);//milih nama mhs
			
			if ($datakriteriabmb['nama_kriteria'] =="IPK")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmb['subkriteria'];$k++)
			{$kriteria = $datakriteriabmb['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmb WHERE nama_kriteria = 'IPK' and no_sub = '$k'"));
			if ($datamhsbmb['ipk'] >= $pilihsub['rentang_bawah'] and $datamhsbmb['ipk'] <= $pilihsub['rentang_atas'])
			{
				$scoreipk = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "IPK")
		
		if ($datakriteriabmb['nama_kriteria'] =="Semester")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmb['subkriteria'];$k++)
			{$kriteria = $datakriteriabmb['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmb WHERE nama_kriteria = 'Semester' and no_sub = '$k'"));
			if ($datamhsbmb['semester'] == $pilihsub['subkriteria'])
			{
				$scoresemester = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "jenistinggal")
		
		if ($datakriteriabmb['nama_kriteria'] =="Organisasi")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmb['subkriteria'];$k++)
			{$kriteria = $datakriteriabmb['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmb WHERE nama_kriteria = 'Organisasi' and no_sub = '$k'"));
			if ($datamhsbmb['organisasi'] == $pilihsub['subkriteria'])
			{
				$scoreorganisasi = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "jenistinggal")
		
		if ($datakriteriabmb['nama_kriteria'] =="Prestasi Non-Akademik")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmb['subkriteria'];$k++)
			{$kriteria = $datakriteriabmb['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmb WHERE nama_kriteria = 'Prestasi Non-Akademik' and no_sub = '$k'"));
			if ($datamhsbmb['prestasi'] == $pilihsub['subkriteria'])
			{
				$scoreprestasi = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "jenistinggal")
		
		
			if($j == 0)
			{$jk = $j- 1 ;
			$mhsbmbxkriteria[$i][$jk] = $mhsbmb[$i];
			$mhsbmbxkriteria[$i][$j] = $scoreipk;
			}
			if($j == 1)
			{
			$mhsbmbxkriteria[$i][$j] = $scoresemester;
			}
			if($j == 2)
			{
			$mhsbmbxkriteria[$i][$j] = $scoreorganisasi;
			}
			if($j == 3)
			{
			$mhsbmbxkriteria[$i][$j] = $scoreprestasi;
			}
			
		$j++;
			
		} // untuk while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
		 $i++;
	} // untuk while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	    
	function tampiltabelpgap($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="2"><h6><center>Ekstrakurikuler</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	
	$selisihbmb = array();
	
	for ($i=0;$i<count($mhsbmb);$i++)
	{
		for ($j=0;$j<count($kriteriabmb);$j++)
		{ 	$jk = 0-1 ;
			$selisihbmb[$i][$jk] = $mhsbmb[$i];
			$selisihbmb[$i][$j] = $mhsbmbxkriteria[$i][$j] -  $profil_targetbmb[$j] ;
		
		}
		
	}
	function tampiltabelselisih($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="2"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	
	$bobotbmb = array();
	
	for ($i=0;$i<count($mhsbmb);$i++)
	{
		for ($j=0;$j<count($kriteriabmb);$j++)
		{ $querybobotbmb = mysql_query("SELECT * FROM bobot");
	      while ($databobotbmb = mysql_fetch_array($querybobotbmb))
			{ if($selisihbmb[$i][$j] == $databobotbmb['selisih'])
			{
				$jk = 0-1 ;
				$bobotbmb[$i][$jk] = $mhsbmb[$i];
				$bobotbmb[$i][$j] = $databobotbmb['nilai']; 
			}
			}
		}
		
	}
	function tampiltabelbobot($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Ekstrakurikuler</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	
	$pengelompokanbmb = array();
	$querymhsbmb = mysql_query("SELECT * FROM mahasiswa_bmb ORDER BY nim asc");
	$i=0;
	while ($datamhsbmb = mysql_fetch_array($querymhsbmb))
	{
		$querykriteriabmb1 = mysql_query("SELECT * FROM kriteria_bmb ");
		$jumlah=mysql_num_rows($querykriteriabmb1);
		$jumlahh= $jumlah + 4;
		$cffinfix=0;
		$sffinfix=0;
		for ($j=0;$j<$jumlahh;$j++)
		{$querykriteriabmb1 = mysql_query("SELECT * FROM kriteria_bmb where nama_aspek='Akademik' ");
		 while ($datakriteriabmb1 = mysql_fetch_array($querykriteriabmb1))
			{		
			if ($datakriteriabmb1['factor'] =="Core")  
				{ $jj = $j - 2;
				$cfaka = $bobotbmb[$i][$jj];
				}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			if ($datakriteriabmb1['factor'] =="Secondary")  
			{ $jj = $j - 2;
				$sfaka = $bobotbmb[$i][$jj];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			}
			$querykriteriabmb2 = mysql_query("SELECT * FROM kriteria_bmb where nama_aspek='Ekstrakurikuler' ");
		 while ($datakriteriabmb2 = mysql_fetch_array($querykriteriabmb2))
			{if ($datakriteriabmb2['nama_kriteria'] == "Organisasi")
			{if ($datakriteriabmb2['factor'] =="Core")  
				{ 
				$cffin1 = $bobotbmb[$i][2];
				}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			if ($datakriteriabmb2['factor'] =="Secondary")  
			{ $jj = $j - 2;
				$sffin1 = $bobotbmb[$i][2];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			}
			if ($datakriteriabmb2['nama_kriteria'] == "Prestasi Non-Akademik")
			{if ($datakriteriabmb2['factor'] =="Core")  
				{ 
				$cffin2 = $bobotbmb[$i][3];
				}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			if ($datakriteriabmb2['factor'] =="Secondary")  
			{ $jj = $j - 2;
				$sffin2 = $bobotbmb[$i][3];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			}
			
			}
			$cfactorr = mysql_query("SELECT * FROM kriteria_bmb WHERE nama_aspek= 'Ekstrakurikuler' and factor = 'Core'");
			$jumlahcore=mysql_num_rows($cfactorr);
			$sfactorr = mysql_query("SELECT * FROM kriteria_bmb WHERE nama_aspek= 'Ekstrakurikuler' and factor = 'Secondary'");
			$jumlahsecondary=mysql_num_rows($sfactorr);
			$cffinfix = ($cffin1 + $cffin2 )/$jumlahcore;
			$sffinfix = ($sffin1 + $sffin2 )/$jumlahsecondary;
						
			if($j == 0)
			{$jk=$j-1;
			$pengelompokanbmb[$i][$jk] = $mhsbmb[$i];
			$pengelompokanbmb[$i][$j] = $bobotbmb[$i][$j];
			}
			if($j == 1)
			{
			$pengelompokanbmb[$i][$j] = $bobotbmb[$i][$j];
			}
			if($j == 2)
			{
			$pengelompokanbmb[$i][$j] = $cfaka;
			}
			if($j == 3)
			{
			$pengelompokanbmb[$i][$j] = $sfaka;
			}
			if($j == 4)
			{$jj= $j - 2;
			$pengelompokanbmb[$i][$j] = $bobotbmb[$i][$jj];
			}
			if($j == 5)
			{$jj= $j - 2;
			$pengelompokanbmb[$i][$j] = $bobotbmb[$i][$jj];
			}
			if($j == 6)
			{
			$pengelompokanbmb[$i][$j] = $cffinfix;
			}
			if($j == 7)
			{
			$pengelompokanbmb[$i][$j] = $sffinfix;
			}
			
		} // untuk while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
		 $i++;
	} // untuk while ($datamhsbmm = mysql_fetch_array($querymhsbmm))	
	function tampiltabelpengelompokan($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="4" ><h6><center>Akademik</center></h6></td>
		<td colspan="6"><h6><center>Ekstrakurikuler</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>Cf</center></h6></td>
		<td><h6><center>Sf</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>Cf</center></h6></td>
		<td><h6><center>Sf</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	
	$nilaitotalbmb = array();
	$querymhsbmb = mysql_query("SELECT * FROM mahasiswa_bmb ORDER BY nim asc");
	$i=0;
	while ($datamhsbmb = mysql_fetch_array($querymhsbmb))
	{$querykriteriabmb = mysql_query("SELECT * FROM kriteria_bmb where nama_aspek='Akademik' ");
		for ($j=0;$j<6;$j++)
		{$cfactor = mysql_query("SELECT * FROM factor WHERE nama_factor = 'Core Factor'");
			$cfactorr = mysql_fetch_array($cfactor);//milih aspek
			$sfactor = mysql_query("SELECT * FROM factor WHERE nama_factor = 'Secondary Factor'");
			$sfactorr = mysql_fetch_array($sfactor);
			if($j == 0)
			{$jj= $j + 2;
			$jk=$j-1;
			$nilaitotalbmb[$i][$jk] = $mhsbmb[$i];
			$nilaitotalbmb[$i][$j] = $pengelompokanbmb[$i][$jj];
			}
			if($j == 1)
			{$jj= $j + 2;
			$nilaitotalbmb[$i][$j] = $pengelompokanbmb[$i][$jj];
			}
			if($j == 2)
			{$jj= $j + 1;
			$nilaitotalbmb[$i][$j] = $pengelompokanbmb[$i][$j]*$cfactorr['persentase']/100 + $pengelompokanbmb[$i][$jj]*$sfactorr['persentase']/100;}
			if($j == 3)
			{$jj= $j + 3;
			$nilaitotalbmb[$i][$j] = $pengelompokanbmb[$i][$jj];
			}
			if($j == 4)
			{$jj= $j + 3;
			$nilaitotalbmb[$i][$j] = $pengelompokanbmb[$i][$jj];
			}
			if($j == 5)
			{$jj= $j + 1;
			$jjj= $jj + 1;
			$nilaifinansial=$pengelompokanbmb[$i][$jj]*$cfactorr['persentase']/100 + $pengelompokanbmb[$i][$jjj]*$sfactorr['persentase']/100;;
			$nilaifinansialfix=number_format( $nilaifinansial,1);
			$nilaitotalbmb[$i][$j] = $nilaifinansialfix;
			}
			
			
					
			
		} // untuk while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
		 $i++;
	} // untuk while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	
	function tampiltabelnilaitotal($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="3" ><h6><center>Akademik</center></h6></td>
		<td colspan="3"><h6><center>Ekstrakurikuler</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>Cf</center></h6></td>
		<td><h6><center>Sf</center></h6></td>
		<td><h6><center>Na</center></h6></td>
		<td><h6><center>Cf</center></h6></td>
		<td><h6><center>Sf</center></h6></td>
		<td><h6><center>Ne</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	
	

				?>	
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">

<div class="navbar navbar-inner block-header">
<div class="muted pull-left"><h4>Total Nilai Akademik dan Finansial :</h4></div>
</div>
<?php tampiltabelnilaitotal($nilaitotalbmb); ?>

                        </div>
                        <div class="muted pull-left"><input type="button" class="btn btn-success" value="Back" onclick="window.location='cont.php?hal=langkahbmb3'"/><p><p></div>
                    <div class="muted pull-right"><input type="button" class="btn btn-success" value="Next" onclick="window.location='cont.php?hal=langkahbmb5'"/><p><p></div>
                    </div>
                <?php
				}
				
				
				if($_GET[hal] == 'langkahbmb5')
				{
	function tampiltabel($arr)
	{
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
			  for ($j=0;$j<count($arr[$i]);$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	

	function tampilbarisfactor($arr)
	{	
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table  table-bordered table-highlight">';
		echo '
		<tr>
		<td rowspan="2" ><h6><center><br><p><p>Nama Factor</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="2"><h6><center>Ekstrakurikuler</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<tr>';
		echo '<tr>
		<td><center>Jenis Factor</center></td>';
			  for ($i=0;$i<count($arr);$i++)
			  {
			    echo '<td>'.$arr[$i].'</td>';
			  }
		echo "</tr>";
		echo '</table> </div></div>';
	}
	function tampilbariskriteria($arr)
	{	
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table  table-bordered table-highlight">';
		echo '
		<tr>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="2"><h6><center>Ekstrakurikuler</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<tr>';
		
		echo '<tr>';
			  for ($i=0;$i<count($arr);$i++)
			  {
			    echo '<td>'.$arr[$i].'</td>';
			  }
		echo "</tr>";
		echo '</table> </div></div>';
	}
	function tampilbarispt($arr)
	{	
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table  table-bordered table-highlight">';
		echo '
		<tr>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="2"><h6><center>Ekstrakurikuler</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<tr>';
		
		echo '<tr>';
			  for ($i=0;$i<count($arr);$i++)
			  {
			    echo '<td>'.$arr[$i].'</td>';
			  }
		echo "</tr>";
		echo '</table> </div></div>';
	}

	function tampilkolom($arr)
	{
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table table-bordered table-highlight">';
	  for ($i=0;$i<count($arr);$i++)
	  {
			echo '<tr>';
			    echo '<td>'.$arr[$i].'</td>';
			echo "</tr>";
	   }
		echo
		 '</table> </div></div>';
	}
	function tampilkolommahasiswa($arr)
	{
		echo '
		<div class="block-content collapse in">
        <div class="span12">
		<table class="table table-bordered table-highlight">';
		echo '
		<tr><td><h6>Nama Mahasiswa</h6></td>
		<tr>';
	  for ($i=0;$i<count($arr);$i++)
	  {
			echo '<tr>';
			    echo '<td>'.$arr[$i].'</td>';
			echo "</tr>";
	   }
		echo
		 '</table> </div></div>';
	}
    $mhsbmb = array();
	
	$querymhsbmb = mysql_query("SELECT * FROM mahasiswa_bmb ORDER BY nim asc");
	$i=0;
	
	while ($datamhsbmb = mysql_fetch_array($querymhsbmb))
	{
		$mhsbmb[$i] = $datamhsbmb['nama_mhs'];
		$i++;
	} 
	
	
	
	$kriteriabmb = array(); //array("Harga", "Kualitas", "Fitur", "Populer", "Purna Jual", "Keawetan");
	
	$factorbmb = array(); //array("cost", "benefit", "benefit", "benefit", "benefit", "benefit");
	
	$profil_targetbmb = array(); //array(4, 5, 4, 3, 3, 2);

	$querykriteriabmb = mysql_query("SELECT * FROM kriteria_bmb ORDER BY nama_aspek asc");
	$i=0;
	while ($datakriteriabmb = mysql_fetch_array($querykriteriabmb))
	{
		$kriteriabmb[$i] = $datakriteriabmb['nama_kriteria'];
		$factorbmb[$i] = $datakriteriabmb['factor'];
		$profil_targetbmb[$i] = $datakriteriabmb['profil_target'];
		$i++;
	}     
	
	$mhsbmbxkriteria = array();
	$querymhsbmb = mysql_query("SELECT * FROM mahasiswa_bmb ORDER BY nim asc");
	$i=0;
	while ($datamhsbmb = mysql_fetch_array($querymhsbmb))
	{$querykriteriabmb = mysql_query("SELECT * FROM kriteria_bmb ORDER BY nama_aspek asc ");
		$j=0;
		while ($datakriteriabmb = mysql_fetch_array($querykriteriabmb))
		{
			$sub = mysql_query("SELECT * FROM subkriteriabmb WHERE nama_kriteria = '$datakriteriabmb[nama_kriteria]'");
			$ssub = mysql_fetch_array($sub);//milih aspek
		
			$querymhsbmb2 = mysql_query("SELECT * FROM mahasiswa_bmb WHERE nama_mhs = '$datamhsbmm[nama_mhs]'");
			$datamhsbmb2 = mysql_fetch_array($querymhsbmb2);//milih nama mhs
			
			if ($datakriteriabmb['nama_kriteria'] =="IPK")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmb['subkriteria'];$k++)
			{$kriteria = $datakriteriabmb['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmb WHERE nama_kriteria = 'IPK' and no_sub = '$k'"));
			if ($datamhsbmb['ipk'] >= $pilihsub['rentang_bawah'] and $datamhsbmb['ipk'] <= $pilihsub['rentang_atas'])
			{
				$scoreipk = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "IPK")
		
		if ($datakriteriabmb['nama_kriteria'] =="Semester")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmb['subkriteria'];$k++)
			{$kriteria = $datakriteriabmb['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmb WHERE nama_kriteria = 'Semester' and no_sub = '$k'"));
			if ($datamhsbmb['semester'] == $pilihsub['subkriteria'])
			{
				$scoresemester = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "jenistinggal")
		
		if ($datakriteriabmb['nama_kriteria'] =="Organisasi")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmb['subkriteria'];$k++)
			{$kriteria = $datakriteriabmb['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmb WHERE nama_kriteria = 'Organisasi' and no_sub = '$k'"));
			if ($datamhsbmb['organisasi'] == $pilihsub['subkriteria'])
			{
				$scoreorganisasi = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "jenistinggal")
		
		if ($datakriteriabmb['nama_kriteria'] =="Prestasi Non-Akademik")
			{ 	
			
			for ($k=1; $k <= $datakriteriabmb['subkriteria'];$k++)
			{$kriteria = $datakriteriabmb['nama_kriteria'];
			$pilihsub = mysql_fetch_array( mysql_query("SELECT * FROM subkriteriabmb WHERE nama_kriteria = 'Prestasi Non-Akademik' and no_sub = '$k'"));
			if ($datamhsbmb['prestasi'] == $pilihsub['subkriteria'])
			{
				$scoreprestasi = $pilihsub['score'];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			} // untuk for ($k=0; $k < $datakriteriabmm['subkriteria'];$k++)

		} // ($datakriteriabmm['nama_aspek'] == "jenistinggal")
		
		
			if($j == 0)
			{$jk = $j- 1 ;
			$mhsbmbxkriteria[$i][$jk] = $mhsbmb[$i];
			$mhsbmbxkriteria[$i][$j] = $scoreipk;
			}
			if($j == 1)
			{
			$mhsbmbxkriteria[$i][$j] = $scoresemester;
			}
			if($j == 2)
			{
			$mhsbmbxkriteria[$i][$j] = $scoreorganisasi;
			}
			if($j == 3)
			{
			$mhsbmbxkriteria[$i][$j] = $scoreprestasi;
			}
			
		$j++;
			
		} // untuk while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
		 $i++;
	} // untuk while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	    
	function tampiltabelpgap($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="2"><h6><center>Ekstrakurikuler</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	
	$selisihbmb = array();
	
	for ($i=0;$i<count($mhsbmb);$i++)
	{
		for ($j=0;$j<count($kriteriabmb);$j++)
		{ 	$jk = 0-1 ;
			$selisihbmb[$i][$jk] = $mhsbmb[$i];
			$selisihbmb[$i][$j] = $mhsbmbxkriteria[$i][$j] -  $profil_targetbmb[$j] ;
		
		}
		
	}
	function tampiltabelselisih($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="2"><h6><center>Finansial</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	
	$bobotbmb = array();
	
	for ($i=0;$i<count($mhsbmb);$i++)
	{
		for ($j=0;$j<count($kriteriabmb);$j++)
		{ $querybobotbmb = mysql_query("SELECT * FROM bobot");
	      while ($databobotbmb = mysql_fetch_array($querybobotbmb))
			{ if($selisihbmb[$i][$j] == $databobotbmb['selisih'])
			{
				$jk = 0-1 ;
				$bobotbmb[$i][$jk] = $mhsbmb[$i];
				$bobotbmb[$i][$j] = $databobotbmb['nilai']; 
			}
			}
		}
		
	}
	function tampiltabelbobot($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="2" ><h6><center>Akademik</center></h6></td>
		<td colspan="4"><h6><center>Ekstrakurikuler</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	
	$pengelompokanbmb = array();
	$querymhsbmb = mysql_query("SELECT * FROM mahasiswa_bmb ORDER BY nim asc");
	$i=0;
	while ($datamhsbmb = mysql_fetch_array($querymhsbmb))
	{
		$querykriteriabmb1 = mysql_query("SELECT * FROM kriteria_bmb ");
		$jumlah=mysql_num_rows($querykriteriabmb1);
		$jumlahh= $jumlah + 4;
		$cffinfix=0;
		$sffinfix=0;
		for ($j=0;$j<$jumlahh;$j++)
		{$querykriteriabmb1 = mysql_query("SELECT * FROM kriteria_bmb where nama_aspek='Akademik' ");
		 while ($datakriteriabmb1 = mysql_fetch_array($querykriteriabmb1))
			{		
			if ($datakriteriabmb1['factor'] =="Core")  
				{ $jj = $j - 2;
				$cfaka = $bobotbmb[$i][$jj];
				}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			if ($datakriteriabmb1['factor'] =="Secondary")  
			{ $jj = $j - 2;
				$sfaka = $bobotbmb[$i][$jj];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			
			}
			$querykriteriabmb2 = mysql_query("SELECT * FROM kriteria_bmb where nama_aspek='Ekstrakurikuler' ");
		 while ($datakriteriabmb2 = mysql_fetch_array($querykriteriabmb2))
			{if ($datakriteriabmb2['nama_kriteria'] == "Organisasi")
			{if ($datakriteriabmb2['factor'] =="Core")  
				{ 
				$cffin1 = $bobotbmb[$i][2];
				}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			if ($datakriteriabmb2['factor'] =="Secondary")  
			{ $jj = $j - 2;
				$sffin1 = $bobotbmb[$i][2];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			}
			if ($datakriteriabmb2['nama_kriteria'] == "Prestasi Non-Akademik")
			{if ($datakriteriabmb2['factor'] =="Core")  
				{ 
				$cffin2 = $bobotbmb[$i][3];
				}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			if ($datakriteriabmb2['factor'] =="Secondary")  
			{ $jj = $j - 2;
				$sffin2 = $bobotbmb[$i][3];
			}// untuk if ($datamhsbmm2['$nama_kriteria'] >= 
			}
			
			}
			$cfactorr = mysql_query("SELECT * FROM kriteria_bmb WHERE nama_aspek= 'Ekstrakurikuler' and factor = 'Core'");
			$jumlahcore=mysql_num_rows($cfactorr);
			$sfactorr = mysql_query("SELECT * FROM kriteria_bmb WHERE nama_aspek= 'Ekstrakurikuler' and factor = 'Secondary'");
			$jumlahsecondary=mysql_num_rows($sfactorr);
			$cffinfix = ($cffin1 + $cffin2 )/$jumlahcore;
			$sffinfix = ($sffin1 + $sffin2 )/$jumlahsecondary;
						
			if($j == 0)
			{$jk=$j-1;
			$pengelompokanbmb[$i][$jk] = $mhsbmb[$i];
			$pengelompokanbmb[$i][$j] = $bobotbmb[$i][$j];
			}
			if($j == 1)
			{
			$pengelompokanbmb[$i][$j] = $bobotbmb[$i][$j];
			}
			if($j == 2)
			{
			$pengelompokanbmb[$i][$j] = $cfaka;
			}
			if($j == 3)
			{
			$pengelompokanbmb[$i][$j] = $sfaka;
			}
			if($j == 4)
			{$jj= $j - 2;
			$pengelompokanbmb[$i][$j] = $bobotbmb[$i][$jj];
			}
			if($j == 5)
			{$jj= $j - 2;
			$pengelompokanbmb[$i][$j] = $bobotbmb[$i][$jj];
			}
			if($j == 6)
			{
			$pengelompokanbmb[$i][$j] = $cffinfix;
			}
			if($j == 7)
			{
			$pengelompokanbmb[$i][$j] = $sffinfix;
			}
			
		} // untuk while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
		 $i++;
	} // untuk while ($datamhsbmm = mysql_fetch_array($querymhsbmm))	
	function tampiltabelpengelompokan($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="4" ><h6><center>Akademik</center></h6></td>
		<td colspan="6"><h6><center>Ekstrakurikuler</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>K1</center></h6></td>
		<td><h6><center>K2</center></h6></td>
		<td><h6><center>Cf</center></h6></td>
		<td><h6><center>Sf</center></h6></td>
		<td><h6><center>K3</center></h6></td>
		<td><h6><center>K4</center></h6></td>
		<td><h6><center>Cf</center></h6></td>
		<td><h6><center>Sf</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	
	$nilaitotalbmb = array();
	$querymhsbmb = mysql_query("SELECT * FROM mahasiswa_bmb ORDER BY nim asc");
	$i=0;
	while ($datamhsbmb = mysql_fetch_array($querymhsbmb))
	{$querykriteriabmb = mysql_query("SELECT * FROM kriteria_bmb where nama_aspek='Akademik' ");
		for ($j=0;$j<6;$j++)
		{$cfactor = mysql_query("SELECT * FROM factor WHERE nama_factor = 'Core Factor'");
			$cfactorr = mysql_fetch_array($cfactor);//milih aspek
			$sfactor = mysql_query("SELECT * FROM factor WHERE nama_factor = 'Secondary Factor'");
			$sfactorr = mysql_fetch_array($sfactor);
			if($j == 0)
			{$jj= $j + 2;
			$jk=$j-1;
			$nilaitotalbmb[$i][$jk] = $mhsbmb[$i];
			$nilaitotalbmb[$i][$j] = $pengelompokanbmb[$i][$jj];
			}
			if($j == 1)
			{$jj= $j + 2;
			$nilaitotalbmb[$i][$j] = $pengelompokanbmb[$i][$jj];
			}
			if($j == 2)
			{$jj= $j + 1;
			$nilaitotalbmb[$i][$j] = $pengelompokanbmb[$i][$j]*$cfactorr['persentase']/100 + $pengelompokanbmb[$i][$jj]*$sfactorr['persentase']/100;}
			if($j == 3)
			{$jj= $j + 3;
			$nilaitotalbmb[$i][$j] = $pengelompokanbmb[$i][$jj];
			}
			if($j == 4)
			{$jj= $j + 3;
			$nilaitotalbmb[$i][$j] = $pengelompokanbmb[$i][$jj];
			}
			if($j == 5)
			{$jj= $j + 1;
			$jjj= $jj + 1;
			$nilaifinansial=$pengelompokanbmb[$i][$jj]*$cfactorr['persentase']/100 + $pengelompokanbmb[$i][$jjj]*$sfactorr['persentase']/100;;
			$nilaifinansialfix=number_format( $nilaifinansial,1);
			$nilaitotalbmb[$i][$j] = $nilaifinansialfix;
			}
			
			
					
			
		} // untuk while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
		 $i++;
	} // untuk while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	
	function tampiltabelnilaitotal($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
			  echo '
		<tr>
		<td rowspan="2"><h6><center><br><p><p>Nama Mahasiswa</center></h6></td>
		<td colspan="3" ><h6><center>Akademik</center></h6></td>
		<td colspan="3"><h6><center>Ekstrakurikuler</center></h6></td>
		</tr>
		<tr>
		<td><h6><center>Cf</center></h6></td>
		<td><h6><center>Sf</center></h6></td>
		<td><h6><center>Na</center></h6></td>
		<td><h6><center>Cf</center></h6></td>
		<td><h6><center>Sf</center></h6></td>
		<td><h6><center>Ne</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}
	
	
	
	$rangkingbmb = array();
	$querymhsbmb = mysql_query("SELECT * FROM mahasiswa_bmb ORDER BY nim asc");
	$i=0;
	while ($datamhsbmb = mysql_fetch_array($querymhsbmb))
	{$querykriteriabmb = mysql_query("SELECT * FROM kriteria_bmb where nama_aspek='Akademik' ");
		for ($j=0;$j<6;$j++)
		{$akademik = mysql_query("SELECT * FROM aspek_bmb WHERE nama_aspek = 'Akademik'");
			$pakademik = mysql_fetch_array($akademik);//milih aspek
			$finansial = mysql_query("SELECT * FROM aspek_bmb WHERE nama_aspek = 'Ekstrakurikuler'");
			$pfinansial = mysql_fetch_array($finansial);
			if($j == 0)
			{$jj= $j + 2;
			$jk=$j-1;
			$rangkingbmb[$i][$jk] = $mhsbmb[$i];
			$rangkingbmb[$i][$j] = $nilaitotalbmb[$i][$jj];
			}
			if($j == 1)
			{$jj= $j + 4;
			$rangkingbmb[$i][$j] = $nilaitotalbmb[$i][$jj];
			}
			if($j == 2)
			{$jj= $j + 3;
			$rangkingbmb[$i][$j] = $nilaitotalbmb[$i][$j]*$pakademik['persentase']/100 + $nilaitotalbmb[$i][$jj]*$pfinansial['persentase']/100;}
			$namaa=$datamhsbmb['nama_mhs'];
			 mysql_query("update mahasiswa_bmb set perhitungan='$rangkingbmb[$i][3]' where nama_mhs='$namaa'");
		} // untuk while ($datakriteriabmm = mysql_fetch_array($querykriteriabmm))
		 $i++;
	} // untuk while ($datamhsbmm = mysql_fetch_array($querymhsbmm))
	
	function tampiltabelrangking($arr)
	{ 
		echo '<div class="block-content collapse in">
              <div class="span12">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">';
			  echo '
		<tr>
		<td><h6><center>Nama Mahasiswa</center></h6></td>
		<td><h6><center>Na</center></h6></td>
		<td><h6><center>Ne</center></h6></td>
		<td><h6><center>Ranking</center></h6></td>
		<tr>';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
		  for ($k=-1;$k<0;$k++)
			  {
			    echo '<td>'.$arr[$i][$k].'</td>';
			  }
		  $countt=count($arr[$i]) - 1;
		 //  echo '<td>'.$arr[$i][-1].'</td>';
			  for ($j=0;$j<$countt;$j++)
			  {
			    echo '<td>'.$arr[$i][$j].'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table> </div></div>';
	}	


	$mhsbmbrangking = array();
	$hasilrangkingbmb = array();
	
	for ($i=0;$i<count($mhsbmb);$i++)
	{
		$hasilrangkingbmb[$i] = $rangkingbmb[$i][2];
		$mhsbmbrangking[$i] = $mhsbmb[$i];
	}
	
	for ($i=0;$i<count($mhsbmb);$i++)
	{
		for ($j=$i;$j<count($mhsbmb);$j++)
		{
			if ($hasilrangkingbmb[$j] > $hasilrangkingbmb[$i])
			{
				$tmphasilbmb = $hasilrangkingbmb[$i];
				$tmpmhsbmb = $mhsbmbrangking[$i];
				$hasilrangkingbmb[$i] = $hasilrangkingbmb[$j];
				$mhsbmbrangking[$i] = $mhsbmbrangking[$j];
				$hasilrangkingbmb[$j] = $tmphasilbmb;
				$mhsbmbrangking[$j] = $tmpmhsbmb;
			}
		}
	}
	
				?>	
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">

<div class="navbar navbar-inner block-header">
<div class="muted pull-left"><h4>Total Nilai Ranking :</h4></div>
</div>
<?php tampiltabelrangking($rangkingbmb); ?>

 
 <?php for($i=0;$i<count($mhsbmbrangking);$i++)
 { 
 mysql_query("update mahasiswa_bmb set preferensi='$hasilrangkingbmb[$i]' where nama_mhs='$mhsbmbrangking[$i]'"); }?>

                        </div>
                        <div class="muted pull-left"><input type="button" class="btn btn-success" value="Back" onclick="window.location='cont.php?hal=langkahbmb4'"/><p><p></div>
                    </div>
                <?php
				}
				
				if($_GET[hal] == 'bmb')
				{
					 
                    
				?>	
				<div class="row-fluid">
                        <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Persentase Aspek Beasiswa Mahasiswa Berprestasi (Dalam persen)</div>
                                <div class="pull-right">
                                  
                                </div>
                            </div>
                            
                            <div class="block-content collapse in">
                               <div class="span13">
                              
							   <form method="post" action="<?php echo $PHP_SELF ?>">
                                    <table class="table">
									
									<thead>
                                    
                                     <?php
							 $a_bmb=mysql_query("select * from aspek_bmb order by id_aspek asc");
                   while ($r_abmb=mysql_fetch_array($a_bmb))
				   {?><th>
                       <?php echo "$r_abmb[nama_aspek]";?><a href="hapusaspekbmb.php?id=<?php echo "$r_abmb[nama_aspek]";?>" onclick="return confirm('Apakah kamu yakin ingin menghapus aspek ini ?');"><?php echo "(";?><i class='icon-remove'></i><?php echo ")";?></a></th> <?php }?>
                      
									</thead>
									<tbody>
									<tr><?php
							 $a_bmb=mysql_query("select * from aspek_bmb order by id_aspek asc");
                   while ($r_abmb=mysql_fetch_array($a_bmb))
				   {?><td><input type='text' name='<?php echo "$r_abmb[id_aspek]";?>' placeholder="<?php echo "$r_abmb[nama_aspek]";?>" class='span5 '></td>
                      <?php              
					  } ?>
                                   	</tr>
									
									</tbody></table>
									<div class="form-actions">
												<input type='submit' name='perbaikan2' value="Update Persentase" class="btn btn-primary">
                                                </div>
											</form>
                                            <a href="cont.php?module=addaspekbmb"><i class='icon-plus'></i>  Tambah Aspek</a>
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                        <thead>
                                            <tr>
                        					<?php
							 				$a_bmb=mysql_query("select * from aspek_bmb order by id_aspek asc");
                  							while ($r_abmb=mysql_fetch_array($a_bmb))
				   							{?>
                                            <th>
                                    
					 						<?php echo "$r_abmb[nama_aspek] ";?></th> <?php }?>
                                        	<tbody>
                                            <tr class="success">
										<?php
										$a=mysql_query("select * from aspek_bmb order by id_aspek asc");
										while ($b_bmb=mysql_fetch_array($a))
										{
									     ?>
                                            
                                                <td><?php echo "$b_bmb[persentase]";?> </td>
                                                <?php
										}
										?>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                        
                    </div>
                    <?php
				}
				if($_GET[hal] == 'editkriteriabmb')
								
				{
			    $e=mysql_fetch_array(mysql_query("select * from kriteria_bmb where nama_kriteria='$_GET[id]'"));
				?>
				  <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Edit Kriteria</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                  <form method="post" action="<?php echo $PHP_SELF ?>">
											<div class="control-group">
											<label class="control-label">Nama Kriteria</label>
                                            
											<div class="controls">
											<input name="nama_kriteria" type="text" class="span6 m-wrap" value="<?php echo "$e[nama_kriteria]";?>" required/>
                                            <label class="control-label">Factor</label>
											<!--<select name='factor' /> -->
                                            <?php if($e['factor']=="Core"){
				  echo"
				   <select name='factor'/>
			<option value=''>Pilih Jenis Factor</option>
			<option value='Core' selected>Core Factor</option>
			<option value='Secondary'>Secondary Factor</option>
			</select>
				  ";
				  
				  }else{
					  echo"
					   <select name='factor'/>
			<option value=''>Pilih Jenis Factor</option>
			<option value='Core'>Core Factor</option selected>
			<option value='Secondary' selected>Secondary Factor</option>
			</select>";
					  } ?> 
											<div class="control-group">
											<label class="control-label">Profil Target</label>
                                            
											<div class="controls">
											<input name="profil_target" type="text" class="span6 m-wrap" value="<?php echo "$e[profil_target]";?>" required/>
											</div>
                                            </div>
                                            </div>
											</div>
											
											<div class="control-group">
											<input name="updatekri2" type="submit" value="Update" />
											</div>
									</form>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
				
				<?php
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