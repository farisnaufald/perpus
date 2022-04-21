<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: LAPORAN PERPUSTAKAAN ::.</title>
<style type="text/css">

#judul {
 width:100%;
 margin-bottom:20px;
 text-align:center;
}

</style>
<link href="../css/style.default.css" rel="stylesheet" type="text/css" />
<?php
include "../config/koneksi.php";
?>
<div id='contentwrapper' class='contentwrapper'>
<div id="judul">
<br />
<br />
<font size="+2">LAPORAN PERPUSTAKAAN </font><br />
JL. Kalibata Selatan No. 36 Jakarta Selatan<br />
Hp.  085694871343 Email : aneka_web@yahoo.co.id Website : www.anekaweb.com

<hr color="#eee" />   </div>
	<?php
    

	if($_POST['berdasar'] == "Semua Data"){
	//modus delete Semua Data
	$sql = "SELECT * FROM transaksi,siswa WHERE transaksi.nisn=siswa.nisn ORDER BY no_pinjam";


}
	else if($_POST['berdasar'] == "Pencarian Kata"){
	//modus berdasarkan kata
	$field = $_POST['field'];
	$kata = $_POST['kata'];
	$sql = "SELECT * FROM transaksi,siswa WHERE transaksi.nisn=siswa.nisn AND $field like '%$kata%'
							ORDER BY no_pinjam";
	
	 }
	else if($_POST['berdasar'] == "Pencarian Kata"){
	//modus berdasarkan kata
	$field = $_POST['field'];
	$kata = $_POST['kata'];
	$sql = "SELECT * FROM transaksi 
	                       left join siswa on transaksi.id=siswa.id 
						   where $field like '%$kata%'
	                       ORDER BY no_pinjam DESC";
	
	 }
	$query = mysqli_query($db,$sql);
      echo "  <table cellpadding='0' cellspacing='0' border='0' class='stdtable' id='dyntable2'>
	  <colgroup>
	  <col class='con0' style='width: 4%' />
	  <col class='con1' />
	  <col class='con0' />
	  <col class='con1' />
	  <col class='con0' />
	  </colgroup>
	  <thead>
      <tr>
	  <th><i class='icon-time'></i> No. Pinjam</th>
	  <th><i class='icon-time'></i> Judul</th>
	  <th><i class='icon-signal'></i> Nama Siswa</th>
	  <th><i class='icon-signal'></i> Tgl. Pinjam</th>
	  <th><i class='icon-signal'></i> Tgl. Kembali </th>
	  <th><i class='icon-chevron-right'></i> Status</th>
      </tr>
        </thead>
        <tbody>";
		
    while ($r = mysqli_fetch_array($query)){
echo "<tr class='gradeX'>
	        <td>$r[no_pinjam]</td>
		<td>$r[judul]</td>
		<td>$r[nama]</td>
		<td>$r[tgl_pinjam]</td>
		<td>$r[tgl_kembali]</td>
		<td>$r[status]</td>
		
		    </tr>";
    }
    echo "</tbody></table>
	  </div></div>";
	
?>
   <center>
		<input type="submit" name="button" id="button" class='stdbtn' value="Print Laporan" onclick="print()" />
        </form>
	</center>
</body>
</html>

