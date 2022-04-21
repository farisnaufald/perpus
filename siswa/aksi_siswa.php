<?php
include "../config/koneksi.php";
$p=isset($_GET['act'])?$_GET['act']:null;
switch($p){
default:

break;
case "hapus":
mysqli_query($db,"DELETE FROM siswa WHERE id='$_GET[id]'");
header('location:../index.php?p=siswa&msg=hapus');
break;

case "input":
$tanggal_lahir = "$_POST[thn]-$_POST[bln]-$_POST[tgl]";
 mysqli_query($db,"INSERT INTO siswa(nama,
                                   nisn,
                                   kelas,
								   jk,
                                   alamat,
                                   tanggal_lahir) 
						  VALUES('$_POST[nama]',
						         '$_POST[nisn]',
						         '$_POST[kelas]',
						         '$_POST[jk]',
						         '$_POST[alamat]',
								 '$tanggal_lahir')");
header('location:../index.php?p=siswa&msg=input');
break;


case "update":
$tgllahir = $_POST[thn].'-'.$_POST[bln].'-'.$_POST[tgl];
mysqli_query($db,"UPDATE siswa SET  nama           ='$_POST[nama]',
                                 nisn           ='$_POST[nisn]',
                                 kelas          ='$_POST[kelas]',
                                 alamat         ='$_POST[alamat]',
								 jk             ='$_POST[jk]',
								 tanggal_lahir  ='$tgllahir' 
						   WHERE id         ='$_POST[id]'");

header('location:../index.php?p=siswa&msg=edit');  
}
?>
      