<?php

session_start();
include 'scripts/DB.php';

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (empty($_POST["username"])) {
    header ('Location:index.php?pesan=gagal');
  } else {
    $name = test_input($_POST["username"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      header ('Location:index.php?pesan=gagal'); 
  }
}

if (empty($_POST["password"])) {
    header ('Location:index.php?pesan=gagal');
  } else {
    $password = test_input($_POST["password"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$password)) {
      header ('Location:index.php?pesan=gagal');
    }
  }

$username = $_POST["username"];
$passClean = $_POST["password"];
$password = hash('sha512',$_POST['password']);
// echo $password;

$myfile = fopen("scripts/log.txt", "a+") or die("Unable to open file!");
$waktu = date("j/m/Y || H:i:s ");
$ip = " @ $_SERVER[REMOTE_ADDR]";
// file_put_contents('scripts/log.txt', $line . PHP_EOL, FILE_APPEND);

$sql = "SELECT * FROM user WHERE username='$username' and password='$password'";

$login = mysqli_query($conn, $sql);
$cekRecord = mysqli_num_rows($login);


  if ($cekRecord > 0) {
         
    $data = mysqli_fetch_assoc($login);
    // print_r($data);
    
    echo "<h1>Selamat Datang $username</h1>";
    
    fwrite($myfile,$waktu.$ip."\t".$username." BERHASIL Login  [$username => $passClean]"." \n\r");

    $_SESSION['id'] = $data['id'];
    $_SESSION['username'] = $username;
    $_SESSION['level'] = $data['level'];
    $_SESSION['totp'] = $data['totp'];


    header ('Location:TOTP.php');

          
  }else{
  	 echo "<h1>No User Found</h1>";
  	 fwrite($myfile,$waktu.$ip."\t"."Login GAGAL  [$username => $passClean]"."\n\r");
     header ('Location:index.php?pesan=gagal');
  }

  // print_r($_SESSION);

  fclose($myfile);
?>
