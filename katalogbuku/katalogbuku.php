<?php
$aksi="katalogbuku/aksi_katalogbuku.php";
$p=isset($_GET['aksi'])?$_GET['aksi']:null;
switch($p){
default:
echo "<div class='row'>
    <div class='col-sm-12'>
    <h4 class='pull-left page-title'>Katalog Buku</h4>
    <ol class='breadcrumb pull-right'>
    <li><a href='#'>Beranda</a></li>
    <li class='active'>Katalog Buku</li>
    </ol>
    </div>
    </div>

    <div class='panel panel-default'>
    <div class='panel-heading'> 
    <h3 class='panel-title'><i class='fa fa-user'></i> Katalog Buku</h3> 
    </div>  <div class='panel-body'> 
    <p align='left'><a class='btn btn-primary' href='?p=katalogbuku&aksi=tambah'><i class='icon-plus'></i>Tambah Katalog Buku</a></p>
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
	  <th><i class='icon-time'></i> No</th>
	  <th><i class='icon-time'></i> Judul</th>
	  <th><i class='icon-signal'></i> Pengarang</th>
	  <th><i class='icon-signal'></i> Penerbit</th>
	  <th><i class='icon-signal'></i> Jmlh. Buku</th>
	  <th><i class='icon-chevron-right'></i> Aksi</th>
	  </tr>
	  </thead>
	  <tbody>";
$i=1;
$tp=mysqli_query($db,"SELECT * FROM katalogbuku,penerbit WHERE katalogbuku.kd_penerbit=penerbit.kd_penerbit ORDER BY id DESC");
while($r=mysqli_fetch_array($tp)){
//$hargaa = $r['harga'];
 echo"<tr>
		<td>$i</td>
		<td>$r[judul]</td>
		<td>$r[pengarang]</td>
		<td>$r[nm_penerbit]</td>
		<td>$r[jumlah_buku]</td>
		<td><a class='on-default edit-row' href='?p=katalogbuku&aksi=edit&id=$r[id]'><i class='fa fa-pencil'></i></a>
		 <a class='on-default remove-row' href='$aksi?act=hapus&id=$r[id]' onClick=\"return confirm('Anda yakin ingin menghapus ini?');\"><i class='fa fa-trash-o'></i>    </td>
	</tr>";
	$i=$i+1;
    }
   
			
echo"</tbody>
	</table>
	</div>
	</div>";    

break;
case "edit":
	$edit = mysqli_query($db,"SELECT * FROM katalogbuku WHERE id='$_GET[id]'");
    $r    = mysqli_fetch_array($edit);

echo "<div id='contentwrapper' class='contentwrapper'>
	  <div class='col-sm-12'>
	  <h4 class='pull-left page-title'>Edit Katalog Buku</h4>
	  <ol class='breadcrumb pull-right'>
	  <li><a href='#'>Beranda</a></li>
	  <li class='active'>Edit Katalog Buku</li>
	  </ol>
	  </div>
	  </div>

	  <div class='col-sm-12'>
	  <div class='panel panel-default'>
	  <div class='panel-heading'><h3 class='panel-title'>Edit Katalog Buku</h3></div>
	  <div class='panel-body'>
	  <div class='form'>
	  
	  <form method='post' action='katalogbuku/aksi_katalogbuku.php?act=update' class='cmxform form-horizontal tasi-form' id='commentForm'>
	  <input type='hidden' name='id' value='$r[id]'>
	
	  <div class='form-group'>
      <label for='cname' class='control-label col-lg-2'>Judul Buku</label>
      <div class='col-lg-10'>
	  <input class='form-control' value='$r[judul]'  type='text' name='judul' />
	  </div>	
	  </div>	
				
	  <div class='form-group'>
      <label for='cname' class='control-label col-lg-2'>Kategori Buku</label>
      <div class='col-lg-10'>
	   <select name='kd_kategori' class='select2 form-control'>";
       $tampil=mysqli_query($db,"SELECT * FROM kategori ORDER BY nm_kategori");
       if ($r[kd_kategori]==0){
echo "<option value=0 selected>- Pilih Kategori -</option>";
       }   
       while($w=mysqli_fetch_array($tampil)){
       if ($r[kd_kategori]==$w[kd_kategori]){
 echo "<option value=$w[kd_kategori] selected>$w[nm_kategori]</option>";
       }
       else{
echo "<option value=$w[kd_kategori]>$w[nm_kategori]</option>";
            }
          }

echo "</select>
	  </div>
	  </div>	
				
	  <div class='form-group'>
      <label for='cname' class='control-label col-lg-2'>Penerbit Buku</label>
      <div class='col-lg-10'>
	   <select name='kd_penerbit' class='select2 form-control'>";
       $tampil=mysqli_query($db,"SELECT * FROM penerbit ORDER BY nm_penerbit");
       if ($r[kd_penerbit]==0){
echo "<option value=0 selected>- Pilih Penerbit -</option>";
       }   
       while($w=mysqli_fetch_array($tampil)){
       if ($r[kd_penerbit]==$w[kd_penerbit]){
 echo "<option value=$w[kd_penerbit] selected>$w[nm_penerbit]</option>";
       }
       else{
echo "<option value=$w[kd_penerbit]>$w[nm_penerbit]</option>";
            }
          }

echo "</select>
	  </div>	
	  </div>
				
	  <div class='form-group'>
      <label for='cname' class='control-label col-lg-2'>Pengarang</label>
      <div class='col-lg-10'>
	  <input class='form-control'  type='text' value='$r[pengarang]' name='pengarang' />
	  </div>
	  </div>			
				
	  <div class='form-group'>
      <label for='cname' class='control-label col-lg-2'>Tahun Terbit</label>
      <div class='col-lg-10'>
	  <input class='form-control'  type='text' value='$r[th_terbit]' name='th_terbit' />
	  </div>
	  </div>
				
				
	  <div class='form-group'>
      <label for='cname' class='control-label col-lg-2'>Isbn</label>
      <div class='col-lg-10'>
	  <input class='form-control' type='number' value='$r[isbn]' name='isbn' />
	  </div>
	  </div>	
				
	  <div class='form-group'>
      <label for='cname' class='control-label col-lg-2'>Jumlah Buku</label>
      <div class='col-lg-10'>
	  <div class='span9'><input class='form-control' type='number' value='$r[jumlah_buku]' name='jumlah_buku' /></div>
	  </div>
	  </div>	
				
	  <div class='form-group'>
      <label for='cname' class='control-label col-lg-2'>Rak Buku</label>
      <div class='col-lg-10'>
	  <div class='span9'><input class='form-control' type='text' value='$r[rak_buku]' name='rak_buku' /></div>
	  </div>
	  </div>
	  
	  <Br>
	  <div class='form-group'>
	  <div class='col-lg-offset-2 col-lg-10'>
	  <button class='btn btn-primary waves-effect waves-light' type='submit'>Tambah</button>
	  <a class='btn btn-danger' href='?p=katalogbuku'>Batal</a>
	  </div>
	  </div>
	  </form>
	  </div>                
	  </div>                
	  </div>                  
	  </div>                  
	  </div>";

break;

case "tambah":
echo "<div id='contentwrapper' class='contentwrapper'>
	  <div class='col-sm-12'>
	  <h4 class='pull-left page-title'>Tambah Katalog Buku</h4>
	  <ol class='breadcrumb pull-right'>
	  <li><a href='#'>Beranda</a></li>
	  <li class='active'>Tambah Katalog Buku</li>
	  </ol>
	  </div>
	  </div>

	  <div class='col-sm-12'>
	  <div class='panel panel-default'>
	  <div class='panel-heading'><h3 class='panel-title'>Tambah Katalog Buku</h3></div>
	  <div class='panel-body'>
	  <div class='form'>
		
	  <form method='post' action='katalogbuku/aksi_katalogbuku.php?act=input' class='cmxform form-horizontal tasi-form' id='commentForm'>
	
	
     <div class='form-group'>
     <label for='cname' class='control-label col-lg-2'>Judul Buku</label>
     <div class='col-lg-10'>
	 <input type='text' class='form-control' name='judul' placeholder='Masukan Judul Buku' required>
	 </div>
	 </div>
	
     <div class='form-group'>
     <label for='cname' class='control-label col-lg-2'>Kategori Buku</label>
     <div class='col-lg-10'>
	 <select name='kd_kategori' class='select2 form-control'>
	 <option value=''>-- Pilih Kategori Buku --</option>";
             
	 $query = "SELECT * FROM kategori ORDER BY nm_kategori"; 
	 $hasil = mysqli_query($db,$query);
	 while($r = mysqli_fetch_array($hasil)){
echo"<option value='$r[kd_kategori]'>$r[nm_kategori]</option>";
	 }
echo"</select>
	 </div>
	 </div>
	
     <div class='form-group'>
     <label for='cname' class='control-label col-lg-2'>Penerbit Buku</label>
     <div class='col-lg-10'>
	 <select name='kd_penerbit' class='select2 form-control'>
	 <option value=''>-- Pilih Penerbit Buku --</option>";
             
	 $query = "SELECT * FROM penerbit ORDER BY nm_penerbit"; 
	 $hasil = mysqli_query($db,$query);
	 while($r = mysqli_fetch_array($hasil)){
echo"<option value='$r[kd_penerbit]'>$r[nm_penerbit]</option>";
	 }
echo"</select>
	 </div>
	 </div>
	
     <div class='form-group'>
     <label for='cname' class='control-label col-lg-2'>Pengarang</label>
     <div class='col-lg-10'>
	 <input type='text' class='form-control' name='pengarang' placeholder='Masukan Pengarang' required>
	 </div>
	 </div>
	
     <div class='form-group'>
     <label for='cname' class='control-label col-lg-2'>Tahun Terbit</label>
     <div class='col-lg-10'>
	 <input type='number' class='form-control' name='th_terbit' placeholder='Masukan Tehun Terbit' required>
	 </div>
	 </div>
	
     <div class='form-group'>
     <label for='cname' class='control-label col-lg-2'>Isbn</label>
     <div class='col-lg-10'>
	 <input type='number' class='form-control' name='isbn' placeholder='Masukan ISBN' required>
	 </div>
	 </div>
	
     <div class='form-group'>
     <label for='cname' class='control-label col-lg-2'>Jumlah Buku</label>
     <div class='col-lg-10'>
	 <input type='number' class='form-control' name='jumlah_buku' placeholder='Masukan Jumlah Buku' required>
	 </div>
	 </div>
	
     <div class='form-group'>
     <label for='cname' class='control-label col-lg-2'>Rak Buku</label>
     <div class='col-lg-10'>
	 <input type='text' class='form-control' name='rak_buku' placeholder='Masukan Rak Buku' required>
	 </div>
	 </div>
	
	<div class='form-group'>
	<div class='col-lg-offset-2 col-lg-10'>
	<button class='btn btn-primary waves-effect waves-light' type='submit'>Tambah</button>
	<a class='btn btn-danger' href='?p=katalogbuku'>Batal</a>
	</div>
	</div>
	</form>
	</div> 
	</div> 
	</div> 
	</div>";

break;
}//penutup switch
?>    
</body>

</html>