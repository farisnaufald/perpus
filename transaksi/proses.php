<?php
session_start();
if ( !isset($_SESSION['username']) ) {
    header('location:login.php'); 
}
else { 
    $usr = $_SESSION['username']; 
}

$timezone = "Asia/Jakarta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
include "../config/koneksi.php";
$p=isset($_GET['act'])?$_GET['act']:null;
switch($p){
default:

break;
case "input":				

$tgl_pinjam		= isset($_POST['pinjam']) ? $_POST['pinjam'] : "";
$tgl_kembali	= isset($_POST['kembali']) ? $_POST['kembali'] : "";
$dapat			= isset($_POST['buku']) ? $_POST['buku'] : "";
$pecah			= explode (".", $dapat);
$id				= $pecah[0];
$buku			= $pecah[1];
$nisn			= isset($_POST['nisn']) ? $_POST['nisn'] : "";
$no_pinjam			= isset($_POST['no_pinjam']) ? $_POST['no_pinjam'] : "";

 $sqlCek="SELECT * FROM transaksi WHERE nisn='$nisn' AND status='Pinjam'";
	$qryCek=mysqli_query($db,$sqlCek) or die ("Eror Query".mysqli_error()); 
	if(mysqli_num_rows($qryCek)>=1){
echo "<script>alert('Maaf NISN  $nisn Sudah Pinjam Buku');</script>";
echo "<meta http-equiv='refresh' content='0; url=../index.php?p=peminjaman'>";
	}

elseif($buku == "" || $dapat == "") {
echo "<script>alert('Pilih dulu BUKU Dahulu!!');</script>";
echo "<meta http-equiv='refresh' content='0; url=../index.php?p=peminjaman'>";
} elseif ($nisn=="") {
echo "<script>alert('Pilih dulu PEMINJAM Dahulu!!');</script>";
echo "<meta http-equiv='refresh' content='0; url=../index.php?p=peminjaman'>";
} else {

	$query=mysqli_query($db,"SELECT * FROM katalogbuku WHERE judul = '$buku'");
	while ($hasil=mysqli_fetch_array($query)) {
		$sisa=$hasil['jum_temp'];
	} 
	
	if ($sisa == 0) {
echo "<script>alert('Maaf, Bukunya telah habis...!. Anda tidak bisa melakukan transaksi !');</script>";
echo "<meta http-equiv='refresh' content='0; url=../index.php?p=peminjaman'>";
	} else {
		$qt			= mysqli_query($db,"INSERT INTO transaksi VALUES ('$no_pinjam', '$buku', '$nisn', '$tgl_pinjam', '$tgl_kembali', 'Pinjam')") or die ("Gagal Masuk".mysqli_error());

		$qu			= mysqli_query($db,"UPDATE katalogbuku SET jum_temp=(jum_temp-1) WHERE id=$id ");

		if ($qt&&$qu) {
echo "<script>alert('Transaksi BERHASIL...');</script>";
echo "<meta http-equiv='refresh' content='0; url=../index.php?p=datapeminjaman'>";
		} else {
echo "<script>alert('Transaksi GAGAL...');</script>";
echo "<meta http-equiv='refresh' content='0; url=../index.php?p=peminjaman'>";
		}
	}
}
}
?>
      