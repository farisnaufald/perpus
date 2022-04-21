<?php
session_start();
unset( $_SESSION['username'] );
?>
<?php
   header('location:login.php?logout');
   ?>