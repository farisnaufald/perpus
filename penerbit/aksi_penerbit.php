<?php
include "../config/koneksi.php";
$p=isset($_GET['act'])?$_GET['act']:null;
switch($p){
default:

break;
case "hapus":
mysqli_query($db,"DELETE FROM penerbit WHERE kd_penerbit='$_GET[id]'");
header('location:../index.php?p=penerbit&msg=hapus');
break;

case "input":
 mysqli_query($db,"INSERT INTO penerbit(kd_penerbit,
								   nm_penerbit) 
						   VALUES('$_POST[kd_penerbit]',
								  '$_POST[nm_penerbit]')");
header('location:../index.php?p=penerbit&msg=input');
break;


case "update":
mysqli_query($db,"UPDATE penerbit SET kd_penerbit    ='$_POST[kd_penerbit]',
                                 nm_penerbit    ='$_POST[nm_penerbit]' 
						   WHERE kd_penerbit    ='$_POST[id]'");

header('location:../index.php?p=penerbit&msg=edit');  
}
?>
      