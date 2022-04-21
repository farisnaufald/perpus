<?php
include "../config/koneksi.php";
$p=isset($_GET['act'])?$_GET['act']:null;
switch($p){
default:

break;
case "kembali":	
    $no_pinjam	= isset($_GET['no_pinjam']) ? $_GET['no_pinjam'] : "";
    $judul		= isset($_GET['judul']) ? $_GET['judul'] : "";

	$us=mysqli_query($db,"UPDATE transaksi SET status='Kembali' WHERE no_pinjam='$no_pinjam'")or die ("Gagal update".mysqli_error());
	$uj=mysqli_query($db,"UPDATE katalogbuku SET jum_temp=(jum_temp+1) WHERE judul='$judul'")or die ("Gagal update".mysqli_error());
 
	 if ($us || $uj) {
echo "<script>alert('Berhasil Dikembalikan')</script>";
echo "<meta http-equiv='refresh' content='0; url=../index.php?p=datapeminjaman'>";
	 } else {
echo "<script>alert('Gagal Dikembalikan')</script>";
echo "<meta http-equiv='refresh' content='0; url=../index.php?p=datapeminjaman'>";
	}
}
?>
