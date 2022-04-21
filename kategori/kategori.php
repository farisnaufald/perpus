<?php
$aksi="kategori/aksi_kategori.php";
$p=isset($_GET['aksi'])?$_GET['aksi']:null;
switch($p){
default:
echo "<div class='row'>
    <div class='col-sm-12'>
    <h4 class='pull-left page-title'>Kategori</h4>
    <ol class='breadcrumb pull-right'>
    <li><a href='#'>Beranda</a></li>
    <li class='active'>Kategori</li>
    </ol>
    </div>
    </div>

    <div class='panel panel-default'>
    <div class='panel-heading'> 
    <h3 class='panel-title'><i class='fa fa-user'></i> Kategori Buku</h3> 
    </div>  <div class='panel-body'> 
    <p align='left'><a class='btn btn-primary' href='?p=kategori&aksi=tambah'><i class='icon-plus'></i>Tambah Kategori Buku</a></p>
    <br/>";

switch($_GET['msg']){
case "input":
	echo "<div class='alert alert-success alert-dismissable'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><b>Kategori Buku Berhasil Ditambahkan!</b></h4>
		  </div>";
break;
case "edit":
	echo "<div class='alert alert-success alert-dismissable'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><b>Kategori Buku Berhasil Diupdate!</b></h4>
		  </div>";
break;
case "hapus":
	echo "<div class='alert alert-success alert-dismissable'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><b>Kategori Buku Berhasil Dihapus!</b></h4>
		  </div>";
break;
}

echo "<table id='datatable' class='table table-hover'>
	  <thead>
	  <tr>
	  <th><i class='icon-time'></i> No</th>
	  <th><i class='icon-time'></i> Nama Kategori</th>
	  <th><i class='icon-chevron-right'></i> Aksi</th>
	  </tr>
	  </thead>
	  <tbody>";
$i=1;
$tp=mysqli_query($db,"SELECT * FROM kategori ORDER BY kd_kategori DESC");
while($r=mysqli_fetch_array($tp)){
//$hargaa = $r['harga'];
 echo"<tr>
		<td>$i</td>
		<td>$r[nm_kategori]</td>
		<td><a class='on-default edit-row' href='?p=kategori&aksi=edit&id=$r[kd_kategori]'><i class='fa fa-pencil'></i></a>
		 <a class='on-default remove-row' href='$aksi?act=hapus&id=$r[kd_kategori]' onClick=\"return confirm('Anda yakin ingin menghapus ini?');\"><i class='fa fa-trash-o'></i>    </td>
	</tr>";
	$i=$i+1;
    }
   
			
echo"</tbody>
	</table>
	</div>
	</div>";    

break;
case "edit":
	$edit = mysqli_query($db,"SELECT * FROM kategori WHERE kd_kategori='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);
	$dataKode = $r[kd_kategori];

echo "<div id='contentwrapper' class='contentwrapper'>
	  <div class='col-sm-12'>
	  <h4 class='pull-left page-title'>Edit Kategori Buku</h4>
	  <ol class='breadcrumb pull-right'>
	  <li><a href='#'>Beranda</a></li>
	  <li class='active'>Edit Kategori Buku</li>
	  </ol>
	  </div>
	  </div>

	  <div class='col-sm-12'>
	  <div class='panel panel-default'>
	  <div class='panel-heading'><h3 class='panel-title'>Edit Kategori Buku</h3></div>
	  <div class='panel-body'>
	  <div class='form'>";
echo "<form method='post' action='kategori/aksi_kategori.php?act=update' enctype='multipart/form-data'>	   
	  <input type='hidden' name='id' value='$r[kd_kategori]'>
	
	
	<div class='form-group'>
	<label>Kode Kategori</label>
	<div class='span9'><input class='form-control' value='$r[kd_kategori]'  type='text' name='kd_kategori' value='$r[kd_kategori]'/></div>
	</div>	
	
	<div class='form-group'>
	<label>Kategori Buku</label>
	<div class='span9'><input class='form-control' value='$r[nm_kategori]'  type='text' name='nm_kategori' /></div>
	</div>		
	<Br>
	
	<input type='submit' class='btn btn-primary' value='Update'> <a class='btn btn-danger' href='?p=kategori'>Batal</a>
	</form>
	</div> 
		  </div>                
		</div>                  
	</div>";

break;

case "tambah":
echo "<div id='contentwrapper' class='contentwrapper'>
	  <div class='col-sm-12'>
	  <h4 class='pull-left page-title'>Tambah Kategori Buku</h4>
	  <ol class='breadcrumb pull-right'>
	  <li><a href='#'>Beranda</a></li>
	  <li class='active'>Tambah Kategori Buku</li>
	  </ol>
	  </div>
	  </div>

	  <div class='col-sm-12'>
	  <div class='panel panel-default'>
	  <div class='panel-heading'><h3 class='panel-title'>Tambah Kategori Buku</h3></div>
	  <div class='panel-body'>
	  <div class='form'>
		
	  <form method='post' action='kategori/aksi_kategori.php?act=input' class='cmxform form-horizontal tasi-form' id='commentForm'>
	
	
     <div class='form-group'>
     <label for='cname' class='control-label col-lg-2'>Kode Kategori</label>
     <div class='col-lg-10'>
	 <input type='text' class='form-control' name='kd_kategori' placeholder='Masukan Kategori Buku'>
	 </div>
	 </div>
	
     <div class='form-group'>
     <label for='cname' class='control-label col-lg-2'>Kategori Buku</label>
     <div class='col-lg-10'>
	 <input type='text' class='form-control' name='nm_kategori' placeholder='Masukan Kategori Buku' required>
	 </div>
	 </div>
	 
	
	<div class='form-group'>
	<div class='col-lg-offset-2 col-lg-10'>
	<button class='btn btn-primary waves-effect waves-light' type='submit'>Tambah</button>
	<a class='btn btn-danger' href='?p=kategori'>Batal</a>
	</div>
	</div>
	</form>
	</div> 
	</div> 
	</div> 
	</div> ";
echo "";
break;
			}//penutup switch
?>    
</body>

</html>