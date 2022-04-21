<?php
include "../config/koneksi.php";
$p=isset($_GET['act'])?$_GET['act']:null;
switch($p){
default:

break;
case "hapus":
mysqli_query($db,"DELETE FROM user WHERE id='$_GET[id]'");
header('location:../index.php?p=administrator');
		
break;
case "input":
$pass=md5($_POST[password]);
mysqli_query($db,"INSERT INTO user(password,
							  username,
							  nama,
							  alamat,
							  telp,
							  gender) 
					  VALUES('$pass',
							 '$_POST[username]',
							 '$_POST[nama]',
							 '$_POST[alamat]',
							 '$_POST[telp]',
							 '$_POST[gender]')");
header('location:../index.php?p=administrator&msg=input');  

break;
case "update":
$pass=md5($_POST[password]);
mysqli_query($db,"UPDATE user SET password  = '$pass',
                                  nama		='$_POST[nama]',
                                  alamat 	='$_POST[alamat]',
								  telp		='$_POST[telp]',
								  gender	='$_POST[gender]' 
						    WHERE id		='$_POST[id]'");

header('location:../index.php?p=administrator&msg=edit');  

}
?>
      