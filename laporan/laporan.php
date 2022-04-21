<div class="row">
    <div class="col-sm-12">
    <h4 class="pull-left page-title">Laporan Perpustakaan</h4>
    <ol class="breadcrumb pull-right">
    <li><a href="#">Beranda</a></li>
    <li class="active">Data Laporan Perpustakaan</li>
    </ol>
    </div>
    </div>
<div class='panel panel-default'>
        <div class='panel-heading'> 
            <h3 class='panel-title'><i class='fa fa-clock-o'></i> Laporan Perpustakaan</h3> 
        </div>  <div class='panel-body'> 
	
    <form method="post" target="_blank" action="laporan/data-laporan.php">
  	<table border="0" class="laporan">
    <tr height="30">
      <td colspan="3">
      	&nbsp;&nbsp;&nbsp;<label>
      	  <input name="berdasar" type="radio" value="Semua Data" /><strong> Semua Data</strong>
        </label>
      </td>
      </tr>
     <tr height="30">
      <td>
      	&nbsp;&nbsp;
        <label>
      	<input name="berdasar" type="radio" id="radio2"  value="Pencarian Kata" /><strong> Pencarian Kata</strong>
        </label>
      </td>
      <td><select name="field" id="field" class="select2 form-control">
        <option>Pilih Field</option>
        <option value="transaksi.no_pinjam">No. Pinjam</option>
        <option value="transaksi.status">Status</option>
        <option value="transaksi.nisn">Nisn</option>
        <option value="transaksi.tgl_pinjam">Tgl. Pinjam</option>
        <option value="transaksi.tgl_kembali">Tgl. Kembali</option>
      </select></td>
      <td><input name="kata" type="text" id="kata" class="colorpicker-default form-control" size="12" id="datepicker-multiple1" /></td>
      </tr>
    <tr height="30">
      <td colspan="3">
        <button type="submit" class="btn btn-primary waves-effect waves-light m-b-5">Tampilkan</button>      </td>
      </tr>
  </table>
  	<p>&nbsp;</p>
  <p>&nbsp; </p>
  <p>&nbsp;</p>
</form>


   </div>

   </div>