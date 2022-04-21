<?php
include "../config/koneksi.php";
include "../config/library.php";
$p=isset($_GET['act'])?$_GET['act']:null;
switch($p){
default:

break;
case "hapus":
mysqli_query($db,"DELETE FROM katalogbuku WHERE id='$_GET[id]'");
header('location:../index.php?p=katalogbuku&msg=hapus');
break;

case "input":
  mysqli_query($db,"INSERT INTO katalogbuku(judul,
									        pengarang,
									        th_terbit,
									        kd_penerbit,
									        isbn,
										    kd_kategori,
										    jumlah_buku,
										    jum_temp,
										    rak_buku,
										    tgl_masuk) 
								    VALUES('$_POST[judul]',
										   '$_POST[pengarang]',
										   '$_POST[th_terbit]',
										   '$_POST[kd_penerbit]',
										   '$_POST[isbn]',
										   '$_POST[kd_kategori]',
										   '$_POST[jumlah_buku]',
										   '$_POST[jumlah_buku]',
										   '$_POST[rak_buku]',
										   '$tgl_sekarang')");
									 
header('location:../index.php?p=katalogbuku&msg=input');
break;


case "update":
mysqli_query($db,"UPDATE katalogbuku  SET  judul     ='$_POST[judul]',
									  pengarang      ='$_POST[pengarang]',
                                      th_terbit      ='$_POST[th_terbit]',
                                      kd_penerbit    ='$_POST[kd_penerbit]',
                                      isbn           ='$_POST[isbn]',
                                      kd_kategori    ='$_POST[kd_kategori]',
                                      jumlah_buku    ='$_POST[jumlah_buku]',
								      rak_buku       ='$_POST[rak_buku]'
						        WHERE id             ='$_POST[id]'");

header('location:../index.php?p=katalogbuku&msg=edit');  
}
?>
      