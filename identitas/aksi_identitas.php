<?php
include "../config/koneksi.php";
$p=isset($_GET['act'])?$_GET['act']:null;
switch($p){
default:

break;

case "update":
mysqli_query($db,"UPDATE identitas SET nama_aplikasi ='$_POST[nama_aplikasi]',
								       email         ='$_POST[email]', 
								       tlp           ='$_POST[tlp]',
                                  	   alamat        ='$_POST[alamat]',
								       denda         ='$_POST[denda]'
						         WHERE id_identitas  ='$_POST[id]'");

header('location:../index.php?p=identitas');  
}
?>
      