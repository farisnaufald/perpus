<?php
$aksi="transaksi/aksi_datapeminjaman.php";
$p=isset($_GET['aksi'])?$_GET['aksi']:null;
switch($p){
default:
echo "<div class='row'>
    <div class='col-sm-12'>
    <h4 class='pull-left page-title'>Data Peminjaman</h4>
    <ol class='breadcrumb pull-right'>
    <li><a href='#'>Beranda</a></li>
    <li class='active'>Data Peminjaman</li>
    </ol>
    </div>
    </div>

    <div class='panel panel-default'>
    <div class='panel-heading'> 
    <h3 class='panel-title'><i class='fa fa-user'></i> Data Peminjaman</h3> 
    </div>  <div class='panel-body'> 
    <br/>";

switch($_GET['msg']){
case "input":
	echo "<div class='alert alert-success alert-dismissable'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><b>Katalog Buku Berhasil Ditambahkan!</b></h4>
		  </div>";
break;
case "edit":
	echo "<div class='alert alert-success alert-dismissable'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><b>Katalog Buku Berhasil Diupdate!</b></h4>
		  </div>";
break;
case "hapus":
	echo "<div class='alert alert-success alert-dismissable'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><b>Katalog Buku Berhasil Dihapus!</b></h4>
		  </div>";
break;
}

echo "<table id='datatable' class='table table-hover'>
	  <thead>
	  <tr>
	  <th><i class='icon-time'></i> No.Pinjam</th>
	  <th><i class='icon-time'></i> Judul</th>
	  <th><i class='icon-signal'></i> Nama Siswa</th>
	  <th><i class='icon-signal'></i> Tgl. Pinjam</th>
	  <th><i class='icon-signal'></i> Tgl. Kembali </th>
	  <th><i class='icon-chevron-right'></i> Status</th>
	  </tr>
	  </thead>
	  <tbody>";
$i=1;
$tp=mysqli_query($db,"SELECT * FROM transaksi,siswa WHERE transaksi.nisn=siswa.nisn AND status='Kembali' ORDER BY no_pinjam DESC");
while($r=mysqli_fetch_array($tp)){
//$hargaa = $r['harga'];
 echo"<tr>
		<td>$r[no_pinjam]</td>
		<td>$r[judul]</td>
		<td>$r[nama]</td>
		<td>$r[tgl_pinjam]</td>
		<td>$r[tgl_kembali]</td>
		<td>$r[status] </td>
	</tr>";
	$i=$i+1;
    }
   
			
echo"</tbody>
	</table>
	</div>
	</div>";   

break;
}//penutup switch
?>    
</body>

</html>