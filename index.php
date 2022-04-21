<?php
session_start();
if ( !isset($_SESSION['username']) ) {
    header('location:login.php'); 
}
else { 
    $usr = $_SESSION['username']; 
}
require_once('config/koneksi.php');
require_once('config/library.php');
require_once('config/fungsi_indotgl.php');
require_once('config/fungsi_combobox.php');
require_once('config/fungsi_terlambat.php');


$iden=mysqli_fetch_array(mysqli_query($db,"SELECT * FROM identitas"));

$query = mysqli_query($db,"SELECT * FROM user WHERE username = '$usr'");
$hasil = mysqli_fetch_array($query);
if (empty($hasil['username'])) {
    header('Location: ./login.php');
}

@ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="AnekaStok V.2.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="images/favicon_1.ico">

        <title>.:: Aplikasi Peminjaman Warkah ::.</title>

       <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
        <link href="css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet" />
        <link href="css/waves-effect.css" rel="stylesheet">
        <link href="assets/tagsinput/jquery.tagsinput.css" rel="stylesheet" />
        <link href="assets/toggles/toggles.css" rel="stylesheet" />
        <link href="assets/timepicker/bootstrap-timepicker.min.css" rel="stylesheet" />
        <link href="assets/timepicker/bootstrap-datepicker.min.css" rel="stylesheet" />
        <link href="assets/colorpicker/colorpicker.css" rel="stylesheet" type="text/css" />
        <link href="assets/jquery-multi-select/multi-select.css"  rel="stylesheet" type="text/css" />
        <link href="assets/select2/select2.css" rel="stylesheet" type="text/css" />
        <link href="css/helper.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
		<script src="js/modernizr.min.js"></script>
        <link href="assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

     
 </head>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="index.html" class="logo"><span><?php echo $iden[nama_aplikasi]; ?></span></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>

                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown">
                                    <a href="index.php?p=datapeminjaman" data-target="#" class="dropdown-toggle waves-effect waves-light">
                                     <?php
$jumORDER=mysqli_num_rows(mysqli_query($db,"SELECT * FROM transaksi WHERE status='Pinjam'"));
echo "<i class='md-add-shopping-cart'></i> <span class='badge badge-xs badge-danger'>$jumORDER</span>";
?>
                                    </a>
                                    
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><i class="ion-android-add-contact"></i></a>
                                    <ul class="dropdown-menu">
                                        <?php if ($hasil['level']=='Administrator') { ?>
                                        <li><a href="?p=administrator&aksi=edit&id=<?php echo $hasil[id]; ?>"><i class="md md-face-unlock"></i> Edit Profil</a></li>
										<?php } ?>
                                        <li><a href="logout.php"><i class="md md-settings-power"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <i class="ion-android-contact"></i>
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $hasil['nama']; ?> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <?php if ($hasil['level']=='Administrator') { ?>
                                    <li><a href="?p=administrator&aksi=edit&id=<?php echo $hasil[id]; ?>"><i class="md md-face-unlock"></i> Edit Profil<div class="ripple-wrapper"></div></a></li>
                                    <?php } ?>
                                    <li><a href="logout.php"><i class="md md-settings-power"></i> Logout</a></li>
                                </ul>
                            </div>
                            <p class="text-muted m-0"><?php echo $hasil['level']; ?></p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="?p=home" class="waves-effect"><i class="md md-home"></i><span> Dashboard</a>
                            </li>

							<?php if ($hasil['level']=='Administrator') { ?>
                              <li class="has_sub">
                               <a href="#" class="waves-effect"><i class="md md-pages"></i><span> Master Data</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="?p=siswa">Data Siswa</a></li>
                                    <li><a href="?p=penerbit">Data Penerbit</a></li>
									 <li><a href="?p=administrator">Administrator</a></li>
                                </ul>
                            </li>
                            
                            
                            <li class="has_sub">
                               <a href="#" class="waves-effect"><i class="fa fa-book"></i><span> Katalog Buku</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="?p=katalogbuku">Data Buku</a></li>
									 <li><a href="?p=kategori">Kategori Buku</a></li>
                                </ul>
                            </li>
                            
                            <li class="has_sub">
                               <a href="#" class="waves-effect"><i class="fa fa-money"></i><span> Data Transaksi</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="?p=peminjaman">Peminjaman</a></li>
									 <li><a href="?p=datapeminjaman">Data Peminjaman</a></li>
									 <li><a href="?p=datapengembalian">Data Pengembalian</a></li>
                                </ul>
                            </li>
                            
							<li> <a href="?p=identitas"><i class="fa fa-edit"></i><span>Identitas Aplikasi </span></a></li>
                            <li><a href="?p=laporan"><i class="fa fa-book"></i><span>Laporan</span></a></li>
                            <?php } ?>
                            
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>                    
            <div class="content-page">
             
                <div class="content">
                    <div class="container">

                             <?php include "konten.php"; ?>

                    </div> 
                               
                </div> 

                <footer class="footer text-left">
                    copyright &copy; 2018 Anekaweb.com.
                </footer>

            </div></div>
    
        <script>
            var resizefunc = [];
        </script>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/waves.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="assets/jquery-detectmobile/detect.js"></script>
        <script src="assets/fastclick/fastclick.js"></script>
        <script src="assets/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="assets/jquery-blockui/jquery.blockUI.js"></script>
        <script src="js/jquery.app.js"></script>
        <script src="assets/tagsinput/jquery.tagsinput.min.js"></script>
        <script src="assets/toggles/toggles.min.js"></script>
        <script src="assets/timepicker/bootstrap-timepicker.min.js"></script>
        <script src="assets/timepicker/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="assets/colorpicker/bootstrap-colorpicker.js"></script>
        <script type="text/javascript" src="assets/jquery-multi-select/jquery.multi-select.js"></script>
        <script type="text/javascript" src="assets/jquery-multi-select/jquery.quicksearch.js"></script>
        <script src="assets/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="assets/spinner/spinner.min.js"></script>
        <script src="assets/select2/select2.min.js" type="text/javascript"></script>

        <script src="assets/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/datatables/dataTables.bootstrap.js"></script>


        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
            } );
			
			// Date Picker
                jQuery('#datepicker').datepicker();
                jQuery('#datepicker-inline').datepicker();
                jQuery('#datepicker-multiple1').datepicker();
                jQuery('#datepicker-multiple2').datepicker();
                jQuery('#datepicker-multiple').datepicker({
                    numberOfMonths: 5,
                    showButtonPanel: true
                });
				 // Select2
                jQuery(".select2").select2({
                    width: '100%'
                });


        </script>
    
	</body>
</html>