<?php
$db['host'] = "localhost"; //host
$db['user'] = "root"; //username database
$db['pass'] = ""; //password database
$db['name'] = "perpus"; //nama database
 
$db = mysqli_connect($db['host'], $db['user'], $db['pass'], $db['name']);

function anti_injection($data){
  global $db;
  $filter = mysqli_real_escape_string($db, stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

function cek_session(){
	if ($_SESSION['level'] == ''){
		echo "<script>document.location='index.php';</script>";
	}
}
?>