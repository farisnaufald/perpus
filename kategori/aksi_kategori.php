<?php
include "../config/koneksi.php";
$p=isset($_GET['act'])?$_GET['act']:null;
switch($p){
default:

break;
case "hapus":
mysqli_query($db,"DELETE FROM kategori WHERE kd_kategori='$_GET[id]'");
header('location:../index.php?p=kategori&msg=hapus');
break;

case "input":
 mysqli_query($db,"INSERT INTO kategori(kd_kategori,
								   nm_kategori) 
						   VALUES('$_POST[kd_kategori]',
								  '$_POST[nm_kategori]')");
header('location:../index.php?p=kategori&msg=input');
break;


case "update":
mysqli_query($db,"UPDATE kategori SET kd_kategori    ='$_POST[kd_kategori]',
                                 nm_kategori    ='$_POST[nm_kategori]' 
						   WHERE kd_kategori    ='$_POST[id]'");

header('location:../index.php?p=kategori&msg=edit');  
}
?>
      