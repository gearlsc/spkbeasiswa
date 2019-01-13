<?php
include ("../config/koneksi.php");
 
$data = @mysql_query ("select * from siswa where
        nim=" . $_REQUEST['id']);
 
if ($row = @mysql_fetch_assoc($data))
{
   //$filedata = $row['filedata'];
   //$deskripsi = $row['deskripsi'];
   $filename = $row['berkas1'];
   //$filetype = $row['filetype'];
   //$filesize = $row['filesize'];
}
 
//header('Content-type: ' . $filetype);
//header('Content-length: ' . $filesize);
header("Content-Transfer-Encoding: binarynn");
header("Pragma: no-cache");
header("Expires: 0");
header('Content-Disposition: attachment; filename="' . $filename . '"');
//echo $filedata;
exit();
?>