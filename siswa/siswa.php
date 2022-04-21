<?php
$aksi="siswa/aksi_siswa.php";
$p=isset($_GET['aksi'])?$_GET['aksi']:null;
switch($p){
default:
?>
    <div class="row">
    <div class="col-sm-12">
    <h4 class="pull-left page-title">Data Siswa</h4>
    <ol class="breadcrumb pull-right">
    <li><a href="#">Beranda</a></li>
    <li class="active">Data siswa</li>
    </ol>
    </div>
    </div>

    <div class='panel panel-default'>
    <div class='panel-heading'> 
    <h3 class='panel-title'><i class='fa fa-user'></i> Data Siswa</h3> 
    </div>  <div class='panel-body'> 
    <p align='left'><a class='btn btn-primary' href='?p=siswa&aksi=tambah'><i class='icon-plus'></i>Tambah Siswa</a></p>
    <br/>
    <?php
switch($_GET['msg']){
case "input":
	echo "<div class='alert alert-success alert-dismissable'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><b>Siswa Berhasil Ditambahkan!</b></h4>
		  </div>";
break;
case "edit":
	echo "<div class='alert alert-success alert-dismissable'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><b>Siswa Berhasil Diupdate!</b></h4>
		  </div>";
break;
case "hapus":
echo "<div class='alert alert-success alert-dismissable'>
	  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><b>Siswa Berhasil Dihapus!</b></h4>
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
    </div>
    </div>

          
<?php
break;
case "tambah":
echo "<div id='contentwrapper' class='contentwrapper'>
	  <div class='col-sm-12'>
	  <h4 class='pull-left page-title'>Tambah Data Siswa</h4>
	  <ol class='breadcrumb pull-right'>
	  <li><a href='#'>Beranda</a></li>
	  <li class='active'>Tambah Data Siswa</li>
	  </ol>
	  </div>
	  </div>

	  <div class='col-sm-12'>
	  <div class='panel panel-default'>
	  <div class='panel-heading'><h3 class='panel-title'>Tambah Data Siswa</h3></div>
	  <div class='panel-body'>
	  <div class='form'>";
		
									
echo "<form method='post' action='siswa/aksi_siswa.php?act=input' class='cmxform form-horizontal tasi-form' id='commentForm'>
	
     <div class='form-group'>
     <label for='cname' class='control-label col-lg-2'>NISN</label>
     <div class='col-lg-10'>
     <input type='number' class='form-control' name='nisn' placeholder='Masukan NISN' required>
	 </div>
	 </div>
	
     <div class='form-group'>
     <label for='cname' class='control-label col-lg-2'>Nama Lengkap</label>
     <div class='col-lg-10'>
     <input type='text' class='form-control' name='nama' placeholder='Masukan Nama siswa' required>
	 </div>
	 </div>
	
     <div class='form-group'>
     <label for='cname' class='control-label col-lg-2'>Kelas</label>
     <div class='col-lg-10'>
	  <input type='text' class='form-control' name='kelas' placeholder='Masukan Kelas' required>
	  </div>
	  </div>
	
      <div class='form-group'>
      <label for='cname' class='control-label col-lg-2'>Tgl. Lahir</label>";
		
	// Tampilkan pilihan tanggal dari 1 s/d 31 pada ComboBox
echo "<div class='col-lg-3'>
      <select name=tgl required class='select2 form-control'><option value=0>Tanggal</option>";
	  for($tgl=1; $tgl<=31; $tgl++) {
echo "<option value=$tgl>$tgl</option>";
	}
echo "</select></div>";
	
	  // Tampilkan pilihan bulan dalam format Indonesia pada ComboBox
	  $nama_bln=array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
echo "<div class='col-lg-3'><select name=bln required class='select2 form-control'>
	  <option value=0>Bulan</option>";
	  for ($bln=1; $bln<=12; $bln++) {
echo "<option value=$bln>$nama_bln[$bln]</option>";
	}
echo "</select></div>";

	// Tampilkan pilihan tahun dari 1970 s/d saat ini pada ComboBox
	$thn_sekarang=date("Y");
	echo "<div class='col-lg-3'><select name=thn required class='select2 form-control'><option value=0>Tahun</option>";
	for($thn=1970; $thn<=$thn_sekarang;$thn++) {
echo "<option value=$thn>$thn</option>";
	}
echo "</select>
	</div>
	</div>
	
    <div class='form-group'>
    <label for='cname' class='control-label col-lg-2'>Alamat Lengkap</label>
    <div class='col-lg-10'>
    <textarea class='form-control' id='ccomment' name='alamat' required='' aria-required='true' placeholder='Alamat siswa'></textarea>
	</div>
	</div>
	
	 <div class='form-group'>
     <label for='cname' class='control-label col-lg-2'>Jenis Kelamin</label>
     <div class='col-lg-10'>
	 <select class='form-control' name='jk'>
	 <option value='Laki laki'>Laki laki</option>
	 <option value='Perempuan'>Perempuan</option>
	 </select>
	 </div>
	 </div>
	
	
	<div class='form-group'>
	<div class='col-lg-offset-2 col-lg-10'>
	<button class='btn btn-primary waves-effect waves-light' type='submit'>Tambah</button>
	<a class='btn btn-danger' href='?p=siswa'>Batal</a>
	</div>
	</div>
	</form>
	</div>
	</div>
	</div>

	</div>";
	  
	  
break;
case "edit":
	  $edit = mysqli_query($db,"SELECT * FROM siswa WHERE id='$_GET[id]'");
      $r    = mysqli_fetch_array($edit);
      $tanggal_lahir = tgl_indo($r[tanggal_lahir]);
echo "<div id='contentwrapper' class='contentwrapper'>
	  <div class='col-sm-12'>
	  <h4 class='pull-left page-title'>Edit Data Siswa</h4>
	  <ol class='breadcrumb pull-right'>
	  <li><a href='#'>Beranda</a></li>
	  <li class='active'>Edit Data Siswa</li>
	  </ol>
	  </div>
	  </div>


<div class='col-sm-12'>
<div class='panel panel-default'>
    <div class='panel-heading'><h3 class='panel-title'>Edit Data Siswa</h3></div>
    <div class='panel-body'>
        <div class='form'>
		
		<form method='post' action='siswa/aksi_siswa.php?act=update' class='cmxform form-horizontal tasi-form' id='commentForm'>
		<input type='hidden' name='id' value='$r[id]'>
		
	
     <div class='form-group'>
   <label for='cname' class='control-label col-lg-2'>NISN</label>
   <div class='col-lg-10'>
		<input type='text' class='form-control' value='$r[nisn]' name='nisn' placeholder='Masukan NISN' required>
	</div>
	</div>
	
     <div class='form-group'>
   <label for='cname' class='control-label col-lg-2'>Nama Lengkap</label>
   <div class='col-lg-10'>
		<input type='text' class='form-control' value='$r[nama]' name='nama' placeholder='Masukan Nama siswa' required>
	</div>
	</div>
	
	
      <div class='form-group'>
      <label for='cname' class='control-label col-lg-2'>Kelas</label>
      <div class='col-lg-10'>
	  <input type='text' class='form-control' name='kelas'  value='$r[kelas]' placeholder='Masukan Kelas' required>
	  </div>
	  </div>
	
      <div class='form-group'>
      <label for='cname' class='control-label col-lg-2'>Alamat Lengkap</label>
      <div class='col-lg-10'>
      <textarea class='form-control' id='ccomment' name='alamat' required='' aria-required='true' placeholder='Alamat siswa'>$r[alamat]</textarea>
	  </div>
	  </div>
	
	
	  <div class='form-group'>
      <label for='cname' class='control-label col-lg-2'>Tanggal Lahir</label>";
	  $tgl = explode('-',$r[tanggal_lahir]);
	  $tgll = $tgl[2];
	  $blnl = $tgl[1];
	  $thnl = $tgl[0];
	  $thn_sekarang = date("Y");
echo "";
	  combotgl(1,31,'tgl',$tgll);
echo "";
	  combonamabln(1,12,'bln',$blnl);
echo "";
	  combothn(1970,$thn_sekarang,'thn',$thnl);
echo "</div>
	
	  <div class='form-group'>
      <label for='cname' class='control-label col-lg-2'>Jenis Kelamin</label>
      <div class='col-lg-10'> ";
	  if($r[jk] == 'Laki-laki'){
echo "<div class='radio'>
      <div class='col-lg-2'>
      <input type='radio' name='jk' id='radio1' value='Laki-laki' checked> <label for='radio1'>Laki-laki</label></div>
      <input type='radio' name='jk' id='radio2' value='Perempuan'> <label for='radio2'>Perempuan</label>
      </div>";
	  }else{
echo "<div class='radio'>
      <div class='col-lg-2'>
      <input type='radio' name='jk' id='radio1' value='Laki-laki'> <label for='radio1'>Laki-laki</label>
	  </div>
	  <input type='radio' name='jk' id='radio2' value='Perempuan' checked> <label for='radio2'>Perempuan</label>
	  </div>";
		}
echo "</div>
	   </div>
	
       <div class='form-group'>
       <div class='col-lg-offset-2 col-lg-10'>
       <button class='btn btn-primary waves-effect waves-light' type='submit'>Update</button>
	   <a class='btn btn-danger' href='?p=siswa'>Batal</a>
       </div>
       </div>
	   </form>
	   </div>
	   </div>
	   </div>
	
	   </div>";
echo "";
	   break;
		}?>