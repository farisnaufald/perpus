<?php
include "../config/koneksi.php";
$p=isset($_GET['act'])?$_GET['act']:null;
switch($p){
default:

break;

case "perpanjang":

$no_pinjam	    = isset($_GET['no_pinjam']) ? $_GET['no_pinjam'] : "";
$judul			= isset($_GET['judul']) ? $_GET['judul'] : "";
$tgl_kembali	= isset($_GET['kembali']) ? $_GET['kembali'] : "";
$lambat			= isset($_GET['lambat']) ? $_GET['lambat'] : "";

      if($lambat > 7) {
echo "<script>alert('Buku yang dipinjam tidak dapat diperpanjang, karena sudah terlambat lebih dari 7 hari. Kembalikan dahulu, kemudian pinjam kembali !');</script>";
echo "<meta http-equiv='refresh' content='0; url=../index.php?p=datapeminjaman'>";
	  } else {
	  $pecah			= explode("-",$tgl_kembali);
	  $next_7_hari	    = mktime(0,0,0,$pecah[1],$pecah[0]+7,$pecah[2]);
	  $hari_next		= date("d-m-Y", $next_7_hari);


	  $update_tgl_kembali=mysqli_query($db,"UPDATE transaksi SET tgl_kembali='$hari_next' WHERE no_pinjam='$no_pinjam'");

	if ($update_tgl_kembali) {
		echo "<script>alert('Berhasil diperpanjang....');</script>";
		echo "<meta http-equiv='refresh' content='0; url=../index.php?p=datapeminjaman'>";
	} else {
		echo "<script>alert('Gagal diperpanjang');</script>";
		echo "<meta http-equiv='refresh' content='0; url=../index.php?p=datapeminjaman'>";
	}
}
}
?>
