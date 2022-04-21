<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: Aplikasi Perpustakaan ::.</title>
</head>

<body>
		<?php
		$p=isset($_GET['p'])?$_GET['p']:null;
		switch($p){
		default:
	echo "<div class='row'>
			<div class='col-sm-12'>
			<h4 class='pull-left page-title'>Selamat Datang di Aplikasi $hasil[nama]  Kantor Pertanahan Kota Tangerang</h4>
			<ol class='breadcrumb pull-right'>
			<li><a href='#'>Beranda</a></li>
			<li class='active'>Dashboard</li>
			</ol>
			</div>
			</div>
			<!-- Start Widget -->
			<!--Widget-4 -->
			<div class='row'>
			<div class='col-sm-6 col-lg-3'>
			<div class='mini-stat clearfix bx-shadow bg-white'>
			<span class='mini-stat-icon bg-info'><i class='ion-android-contacts'></i></span>
			<div class='mini-stat-info text-right text-dark'>";
			$jumAng=mysqli_num_rows(mysqli_query($db,"SELECT * FROM siswa "));
			echo "<span class='counter text-dark'>$jumAng</span>
			Total Siswa
			</div>
			</div>
			</div>
			<div class='col-sm-6 col-lg-3'>
			<div class='mini-stat clearfix bx-shadow bg-white'>
			<span class='mini-stat-icon bg-success'><i class='ion-android-book'></i></span>
			<div class='mini-stat-info text-right text-dark'>";
			$jumKatBu=mysqli_num_rows(mysqli_query($db,"SELECT * FROM katalogbuku"));
			echo "<span class='counter text-dark'>$jumKatBu</span>
			Total Buku
			</div>
			</div>
			</div>
			<div class='col-sm-6 col-lg-3'>
			<div class='mini-stat clearfix bx-shadow bg-white'>
			<span class='mini-stat-icon bg-primary'><i class='ion-ios7-bookmarks'></i></span>
			<div class='mini-stat-info text-right text-dark'>";
			$jumPin=mysqli_num_rows(mysqli_query($db,"SELECT * FROM transaksi WHERE status='Pinjam'"));
			echo "<span class='counter text-dark'>$jumPin</span>
			Peminjaman
			</div>
			</div>
			</div>
			<div class='col-sm-6 col-lg-3'>
			<div class='mini-stat clearfix bx-shadow bg-white'>
			<span class='mini-stat-icon bg-purple'><i class='md-my-library-books'></i></span>
			<div class='mini-stat-info text-right text-dark'>";
			$jumKem=mysqli_num_rows(mysqli_query($db,"SELECT * FROM transaksi WHERE status='Kembali'"));
			echo "<span class='counter text-dark'>$jumKem</span>
			Pengembalian
			</div>
			</div>
			</div>
			</div> <!-- End row-->";
			?>
             
		<div class='panel panel-default'>
        <div class='panel-heading'> 
            <h3 class='panel-title'><i class='fa fa-clock-o'></i> Data Siswa</h3> 
        </div>  <div class='panel-body'> 
        <?php
switch($_GET['msg']){
case "input":
	echo "<div class='alert alert-success alert-dismissable'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><b>Order Masuk Berhasil Ditambahkan!</b></h4>
		  </div>";
break;
}
?>
        <table id='datatable' class='table table-hover'>
    <thead>
    <tr>
    <th><i class='icon-terminal'></i> No.</th>
    <th><i class='icon-terminal'></i> NISN</th>
    <th><i class='icon-terminal'></i> Nama</th>
    <th><i class='icon-terminal'></i> Tgl. Lahir</th>
    <th><i class='icon-signal'></i> Kelas</th>
    <th><i class='icon-chevron-right'></i> Aksi</th>
    </tr>
    </thead>
    <tbody>
    <?php
$i=1;
$tp=mysqli_query($db,"SELECT * FROM siswa ORDER BY id DESC");
while($r=mysqli_fetch_array($tp)){

echo"<tr>
    <td>$i</td>
	<td>$r[nisn]</td>
	<td>$r[nama]</td>
	<td>$r[tanggal_lahir]</td>
	<td>$r[kelas]</td>
	<td><a class='on-default edit-row' href='?p=siswa&aksi=edit&id=$r[id]'><i class='fa fa-pencil'></i></a>
	 <a href='$aksi?act=hapus&id=$r[id]' class='on-default remove-row' onClick=\"return confirm('Anda yakin ingin menghapus ini?');\"><i class='fa fa-trash-o'></i></td>
	
	</tr>";
	$i=$i+1;
	}
			?>
    </tbody>
    </table>
         </div><!-- /.box-body -->
          </div><!-- /.box --> 
				<?php		
		break;
		case "identitas":						
		include "identitas/identitas.php";
		
		break;
		case "peminjaman":						
		include "transaksi/peminjaman.php";
		
		break;
		case "datapeminjaman":						
		include "transaksi/datapeminjaman.php";
		
		break;
		case "datapengembalian":						
		include "transaksi/datapengembalian.php";
		
		break;
		case "siswa":						
		include "siswa/siswa.php";
		
		
		break;
		case "administrator":						
		include "administrator/administrator.php";
		
		
		break;
		case "kategori":						
		include "kategori/kategori.php";
		
		break;
		case "katalogbuku":						
		include "katalogbuku/katalogbuku.php";
		
		break;
		case "penerbit":						
		include "penerbit/penerbit.php";
		
		break;
		case "laporan":						
		include "laporan/laporan.php";
		
		
		}
		?>
</body>
</html>