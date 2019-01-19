<?php // mengaktifkan session php session_start();
session_start();

$username =  $_SESSION['username'];

$myfile = fopen("../log.txt", "a+") or die("Unable to open file!");
$waktu = date("j/m/Y || H:i:s ");
$ip = " @ $_SERVER[REMOTE_ADDR]";

// menghapus semua session
session_unset(); 
session_destroy();

fwrite($myfile,$waktu.$ip ."\t".$username." telah LOGOUT "."\n\r");
fclose($myfile);

// mengalihkan halaman ke halaman login
header("location:../../index.php");
?>
