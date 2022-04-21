<?php
session_start();
require_once ('config/koneksi.php');

$user = anti_injection($_POST['username']);
$pass     = anti_injection(md5($_POST['password']));
$cekuser = mysqli_query($db,"SELECT * FROM user WHERE username = '$user' AND password='$pass'");
$jumlah = mysqli_num_rows($cekuser);
$hasil = mysqli_fetch_array($cekuser);

if ( $jumlah == 0 ) {
  session_start();
  $_SESSION[namauser]     = $r[username];
  $_SESSION[passuser]     = $r[password];
  $_SESSION[level]        = $r[level];
header('location:login.php?userfail');
} else {
    if ( $pass <> $hasil['password'] ) {
header('location:login.php?passwordfail');
    } else {
        $_SESSION['username'] = $user;
        header('location:index.php');
    }
}
?>