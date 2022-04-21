<?php
$aksi="transaksi/aksi_kembali.php";
$aksii="transaksi/aksi_perpanjang.php";
$p=isset($_GET['aksi'])?$_GET['aksi']:null;

switch($p){
default:

$iden=mysqli_fetch_array(mysqli_query($db,"SELECT * FROM identitas"));
echo "<div class='row'>
    <div class='col-sm-12'>
    <h4 class='pull-left page-title'>Data peminjaman</h4>
    <ol class='breadcrumb pull-right'>
    <li><a href='#'>Beranda</a></li>
    <li class='active'>Data peminjaman</li>
    </ol>
    </div>
    </div>

    <div class='panel panel-default'>
    <div class='panel-heading'> 
    <h3 class='panel-title'><i class='fa fa-user'></i> Data peminjaman</h3> 
    </div>  <div class='panel-body'> 
    <br/>";


echo "<table id='datatable' class='table table-hover'>
	  <thead>
	  <tr>
	  <th><i class='icon-time'></i> No. Pinjam</th>
	  <th><i class='icon-time'></i> Judul</th>
	  <th><i class='icon-signal'></i> Nama Siswa</th>
	  <th><i class='icon-signal'></i> Tgl. Pinjam</th>
	  <th><i class='icon-signal'></i> Tgl. Kembali </th>
	  <th><i class='icon-chevron-right'></i> Terlambat</th>
	  <th><i class='icon-chevron-right'></i> Kembali</th>
	  <th><i class='icon-chevron-right'></i> Perpanjang</th>
	  </tr>
	  </thead>
	  <tbody>";
$i=1;
$tp=mysqli_query($db,"SELECT * FROM transaksi,siswa WHERE transaksi.nisn=siswa.nisn AND status='Pinjam' ORDER BY no_pinjam DESC");
while($r=mysqli_fetch_array($tp)){
 echo"<tr>
		<td>$r[no_pinjam]</td>
		<td>$r[judul]</td>
		<td>$r[nama]</td>
		<td>$r[tgl_pinjam]</td>
		<td>$r[tgl_kembali]</td>
		<td>";
        $denda1=$iden[denda];
	    $tgl_dateline=$r['tgl_kembali'];
		$tgl_kembali=date('d-m-Y');
		$lambat=terlambat($tgl_dateline, $tgl_kembali);
		$denda=$lambat*$denda1;
		if ($lambat>0) {
		echo "<font color='red'>$lambat hari<br>(Rp $denda)</font>";
		}
		else {
		echo $lambat." hari";
		}
echo "</td>
		<td><a class='on-default edit-row' href='$aksi?act=kembali&no_pinjam=$r[no_pinjam]'><button type='button' class='btn btn-primary waves-effect m-b-5'>Kembali</button></a> </td>
    <td><a class='on-default edit-row' href='$aksii?act=perpanjang&no_pinjam=$r[no_pinjam]&kembali=$r[tgl_kembali]&lambat=$lambat'><button type='button' class='btn btn-success waves-effect m-b-5'>Perpanjang</button></a> </td>
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