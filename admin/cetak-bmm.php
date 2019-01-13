<html>
<head>
<title>Print</title>
</head>
<body>

<table border='0' Width='100%'>  
<tr>
      <td align="center"><img src="../images/logo-poltekes.png" alt="Target Admin" width="20%" ></td>
</tr>
<tr>
    <td align="center"> <h4>POLITEKNIK KESEHATAN KOTA JAMBI</h4></td>   
</tr>
<tr>
    <td align="center"> Jl. Haji Agus Salim No.09, Paal Lima, Kota Baru, Kota Jambi.</td>   
</tr>
<tr>
    <td align="center"> Email : poltekk_jambi@yahoo.com | Telp : (0741) 445450 | Kode Pos : 36129</td>   
</tr>
<tr>
    <td align="center">  </td>   
</tr>

	</table>

<hr>
 
<h3 align="center">Daftar Penerima Bantuan Mahasiswa Miskin</h3><!-- /.content-header --><!-- /.content-header -->



<tbody>
<?php
//membuat koneksi ke database
$host = 'localhost';
  $user = 'root';      
  $password = '';      
  $database = 'beasiswa';  
    
  $konek_db = mysql_connect($host, $user, $password);    
  $find_db = mysql_select_db($database) ;
?>

<!-- ///////////////////////////// Script untuk membuat tabel///////////////////////////////// -->

<table border='1' Width='90%' align="center">  
<tr>
    <th> NIM </th>
    <th> Nama </th>
	<th> Program Studi </th>
    
</tr>

<?php  
// Perintah untuk menampilkan data
$queri="select * from siswa order by preferensi desc limit 15" ;  //menampikan SEMUA data dari tabel siswa

$hasil=MySQL_query ($queri);    //fungsi untuk SQL

// perintah untuk membaca dan mengambil data dalam bentuk array
//if($hasil===FALSE){
//	die(mysql_error());
//}
while ($data = mysql_fetch_array ($hasil)){
$id = $data['nim'];
 echo "    
        <tr>
		<td>".$data['nim']."</td>
        <td>".$data['nama_mhs']."</td>
        <td>".$data['prodi']."</td>
                
        </tr> 
        ";
        
}

?>

</table>                                            									
	</tbody>
	
<br>
<br>
<br>
<br>
<br>
<p align="center">Jambi, ..... Maret 2018</p>
<br>
<br>
<p align="center"><u>Rusmimpong, S.Pd, M.Kes</u></p>
<p align="center">NIP. 196703011998031002</p>	
	</table>  
</body>
</html>
<?php
echo
"<script>
window.print();
</script>";
?>