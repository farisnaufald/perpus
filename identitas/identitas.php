<?php
$aksi="identitas/aksi_identitas.php";
$p=isset($_GET['aksi'])?$_GET['aksi']:null;
switch($p){
default:
?>
<div class="row">
    <div class="col-sm-12">
        <h4 class="pull-left page-title">Identitas Aplikasi</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Beranda</a></li>
            <li class="active">Edit Identitas Aplikasi</li>
        </ol>
    </div>
</div>
        <?php


 $edit = mysqli_query($db,"SELECT * FROM identitas WHERE id_identitas");
 $r    = mysqli_fetch_array($edit);

echo "<div class='col-sm-12'>
<div class='panel panel-default'>
    <div class='panel-heading'><h3 class='panel-title'>Edit Identitas Aplikasi</h3></div>
    <div class='panel-body'>
        <div class='form'>
		
		<form method='post' action='identitas/aksi_identitas.php?act=update' class='cmxform form-horizontal tasi-form' id='commentForm'>
		<input type='hidden' name='id' value='$r[id_identitas]'>
		
	
     <div class='form-group'>
   <label for='cname' class='control-label col-lg-2'>Nama Aplikasi</label>
   <div class='col-lg-10'>
		<input type='text' class='form-control' value='$r[nama_aplikasi]' name='nama_aplikasi' placeholder='Masukan Nama Aplikasi' required>
	</div>
	</div>
	
    <div class='form-group'>
   <label for='cname' class='control-label col-lg-2'>Alamat Lengkap</label>
  <div class='col-lg-10'>
  <textarea class='form-control' id='ccomment' name='alamat' required='' aria-required='true' placeholder='Alamat Karyawan'>$r[alamat]</textarea>
	</div>
	</div>
	
     <div class='form-group'>
   <label for='cname' class='control-label col-lg-2'>Email</label>
   <div class='col-lg-10'>
		<input type='text' class='form-control' value='$r[email]' name='email' placeholder='Masukan Email' required>
	</div>
	</div>
	
     <div class='form-group'>
   <label for='cname' class='control-label col-lg-2'>Telephon</label>
   <div class='col-lg-10'>
		<input type='text' class='form-control' value='$r[tlp]' name='tlp' placeholder='Masukan Telphon' required>
	</div>
	</div>
	
     <div class='form-group'>
   <label for='cname' class='control-label col-lg-2'>Denda</label>
   <div class='col-lg-10'>
		<input type='text' class='form-control' value='$r[denda]' name='denda' placeholder='Masukan Denda Buku' required>
	</div>
	</div>
	
	
	
<div class='form-group'>
    <div class='col-lg-offset-2 col-lg-10'>
        <button class='btn btn-primary waves-effect waves-light' type='submit'>Update</button>
		<a class='btn btn-danger' href='?p=customer'>Batal</a>
    </div>
</div>
</form>
</div>
</div>
</div>

</div>";
echo "";
break;
			}
	?>