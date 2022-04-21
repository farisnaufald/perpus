<?php
$aksi="transaksi/proses.php";
$p=isset($_GET['aksi'])?$_GET['aksi']:null;

switch($p){
default:
		



$pinjam			= date("d-m-Y");
$tuju_hari		= mktime(0,0,0,date("n"),date("j")+7,date("Y"));
$kembali		= date("d-m-Y", $tuju_hari);
?>
<div class="row">
    <div class="col-sm-12">
        <h4 class="pull-left page-title">Transaksi Peminjaman</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Beranda</a></li>
            <li class="active">Transaksi Peminjaman</li>
        </ol>
    </div>
</div>

                        
<div class="col-sm-12">
<div class="panel panel-default">
    <div class="panel-heading"><h3 class="panel-title">Transaksi Peminjaman</h3></div>
    <div class="panel-body">
        <div class="form">

<form method='post' action='transaksi/proses.php?act=input' enctype='multipart/form-data' class="cmxform form-horizontal tasi-form" id="commentForm" >

<input type="hidden" name="pinjam" value="<?php echo $pinjam; ?>">
<input type="hidden" name="kembali" value="<?php echo $kembali; ?>">

<div class="form-group">
<label for="cname" class="control-label col-lg-2">No. Pinjam</label>
<div class="col-lg-10">
<input type="text" name="no_pinjam" class="form-control" value="<?php echo $no_pinjam; ?>" disabled="disabled"/>
<input type="hidden" name="no_pinjam" value="<?php echo $no_pinjam; ?>" />
</div>
</div>

<div class="form-group">
<label for="cname" class="control-label col-lg-2">Nama siswa</label>
<div class="col-lg-10">
<select name="nisn" class="select2 form-control" required>
	 <option value="">-- Pilih Nama siswa --</option>
         
<?php    
	 $query = "SELECT * FROM siswa ORDER BY id"; 
	 $hasil = mysqli_query($db,$query);
	 while($r = mysqli_fetch_array($hasil)){
echo"<option value='$r[nisn]'>( $r[nisn] ) $r[nama]</option>";
	 }
	  ?>
</select>
</div>
</div>

<div class="form-group">
<label for="cname" class="control-label col-lg-2">Judul Buku</label>
<div class="col-lg-10">
<select name="buku" class="select2 form-control" required>
	 <option value="">-- Pilih Judul Buku --</option>
         
<?php    
	$q=mysqli_query($db,"SELECT * FROM katalogbuku ORDER BY id");
while ($buku=mysqli_fetch_array($q)) {
echo"<option value='$buku[0].$buku[1]'>$buku[0]. $buku[1]</option>";
	 }
	  ?>

    
</select>
</div>
</div>


<div class="form-group">
<label for="cname" class="control-label col-lg-2">Tanggal Pinjam</label>
<div class="col-lg-10">
<?php echo $pinjam; ?>
</div>
</div>

<div class="form-group">
<label for="cname" class="control-label col-lg-2">Tanggal Kembali</label>
<div class="col-lg-10">
<?php echo $kembali; ?>
</div>
</div>
 
 
<div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
        <button class="btn btn-primary waves-effect waves-light" type="submit">Kirim</button>
    </div>
</div>
                                                
</form>
</div>								 
</div>	
 </div>    			 
</div> 
         
<?php
	  break;
			}//penutup switch
?>    