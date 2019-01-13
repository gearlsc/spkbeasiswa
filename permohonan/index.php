<?php
session_start();
ini_set( "display_errors", 0);
include "../config/koneksi.php";


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Template Name: Education Time
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

 
      <td align="left"></td>


	
<title>POLITEKNIK KESEHATAN JAMBI</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
</head>
<body id="top">
<div class="wrapper row1">
  <div id="header" class="clear">
    <div class="fl_left">
      <h1><a href="#"><img src="../images/logo-poltekes-home.png" alt="Target Admin" width="100%" ></a></h1>
      
    </div>
    <form action="../mahasiswa/cek_loginmhs.php" method="post" id="login">
      <fieldset>
        <legend>Student Login</legend>
        <br>
        <br>
        <input type="password" name="password" placeholder="password"/>
        <input type="text" name="username" placeholder="username"/>
       	<input type="image" src="layout/images/sign_in.gif" id="signin" alt="Sign In"/>
       	
        
      </fieldset>
      
    </form>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     
      <form action="daftar" method="post"><input type="image" src="layout/images/unnamed-2.gif" align= "right" width="10%"/></form>  
  </div>
  
</div>


<!-- ####################################################################################################### -->
<div class="wrapper row2">
  <div id="topnav">
    <ul>
	<?php
	$menu=mysql_query("select judul,judul_seo from berita where headline='Y' order by id_berita asc");
	while ($rm=mysql_fetch_array($menu))
	{
	echo " <li><a href='$rm[judul_seo]'>$rm[judul]</a></li>";
	}
	?>
     
     
    </ul>
    <div  class="clear"></div>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row4">
  <div id="container" class="clear"> 
    <!-- ####################################################################################################### -->
    <?php
	
	$r=mysql_fetch_array(mysql_query("select * from berita where judul_seo='$_GET[hal]'"));
	echo "<h2>$r[judul]</h2>";
	echo "$r[isi_berita]";
	
	?>
    <?php
	
	
	if ($_GET[hal] == 'daftar' )
	{
	echo " 
	
	
			<form method=post action=daftar.php>
			<center><h2>REGISTRASI</h2></center>
			<hr>
			<br>
			
			
			<center>
				<label for='username'><small>USERNAME</small></label>
				<p>
				<input type='text' name='nim' id='nim' value='$_GET[nim]' size='20' placeholder='  Diisi dengan NIM' />
				<p>
				
				<label for='password'><small>PASSWORD</small></label>
				<p>
				<input type='password' name='password' id='password' value='$_GET[password]' size='20' placeholder='          password' />
				<p>
				
				<label for='nama_mhs'><small>NAMA LENGKAP</small></label>
				<p>
				<input type='text' name='nama_mhs' id='nama_mhs' value='$_GET[nama_mhs]' size='35' placeholder='    Diisi dengan Nama Lengkap' />
				<p>
				
				<input name='daftar' type='submit' id='submit' value='DAFTAR' />
				</center>
			
	      	</form>
	
	
	
	";	
		  
	}
	if($_GET[hal] == 'suksesdaftar')
	{
	echo " <li class=comment_odd>
            <div class=author><img class=avatar src=images/doc.png width=32 height=32 alt= /><span class=name>Pendaftaran Berhasil</span> </div>
          
            <p>Silahkan login</p>
            </li>";	
		
	}
	
	?>
    <!-- ####################################################################################################### -->
    <div class="clear"></div>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row5">
  <div id="footer" class="clear"> 
    <!-- ####################################################################################################### -->
    <div class="foot_contact">
      <h2>POLITEKNIK KESEHATAN JAMBI</h2>
      <address>
      Jalan Haji Agus Salim<br />
      No. 09, Paal Lima, Kota Baru<br />
      Jambi, 36129 
      </address>
      <ul>
        <li><strong>Tel:</strong>  0741-445 450 </li>
        <li class="last"><strong>Email:</strong> <a href="#">poltekk_jambi@yahoo.com</a></li>
      </ul>
    </div>
  <div class="footbox">
      <h2>Berita</h2>
      <ul>
	  <?php
	  $b=mysql_query("select * from berita order by id_berita desc limit 10");
	  while ($rb=mysql_fetch_array($b))
	  {
		  
		echo "<li><a href='$rb[judul_seo]'> $rb[judul]</a></li>";  
	  }
	  ?> 
        
        
       
      </ul>
    </div>
   <!-- <div class="footbox">
      <h2>Bantuan Mahasiswa Miskin</h2>
      <ul>
         <?php
	  $b=mysql_query("select * from siswa order by nim desc limit 15");
	  while ($rb=mysql_fetch_array($b))
	  {
		echo "<li>$rb[nim]</li>";  
	  }
	  ?>
      </ul>
    </div>
    <div class="footbox last">
      <h2>Beasiswa Mahasiswa Berprestasi</h2>
      <ul>
       <?php
	  $b=mysql_query("select * from mahasiswa_bmb order by preferensi desc limit 10");
	  while ($rb=mysql_fetch_array($b))
	  {
		  
		echo "<li>$rb[nim]</li>";  
	  }
	  ?>
      </ul>
    </div> -->
    <!-- ####################################################################################################### --> 
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div id="copyright" class="clear">
    <p class="fl_left">Copyright &copy; 2017 - All Rights Reserved <br /> Gea Rulisca Kandora - 8040140214</p>
   
  </div>
</div>
</body>
</html>