<?php  
  session_start();
  require 'vendor/autoload.php';
  use OTPHP\TOTP;
  use ParagonIE\ConstantTime\Base32;


  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }

  if (empty($_POST["totp"])) {
      header ('Location:../TOTP.php?pesan=gagal');
    } else {
      $totp = test_input($_POST["totp"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[0-9]*$/",$totp)) {
        header ('Location:../TOTP.php?pesan=gagal'); 
    }
  }


  // $mySecret = trim(Base32::encodeUpper("$_SESSION['totp']"), '=');
  // echo $mySecret."<br>";
  //$totp = TOTP::create($_SESSION['totp']); // New TOTP with custom secret
  $totp = new TOTP('UAS PHP',$_SESSION['totp']);
  echo 'The current OTP is: '.$totp->now().'<br>';


  // $totp->setLabel('UAS php'); // The label (string)

  // $totp->getProvisioningUri(); // Will return otpauth://totp/alice%40google.com?secret=JBSWY3DPEHPK3PXP

  // $googleChartUri = $totp->getQrCodeUri();
  // echo "<img src='{$googleChartUri}'>";
?>



<?php

print_r($_SESSION);

$token = $_POST["token"];
echo $token;

$myfile = fopen("log.txt", "a+") or die("Unable to open file!");
$waktu = date("j/m/Y || H:i:s ");
$ip = " @ $_SERVER[REMOTE_ADDR]";


  if ($token == $totp->now()) {
   
    // curl braces di gunakan untuk specify end of variable name
    // echo "<h1>Selamat Datang {$_SESSION['username']}</h1>";
    fwrite($myfile,$waktu.$ip ."\t".$_SESSION['username']." BERHASIL validasi  [$token]"." \n\r");

    if ($_SESSION['username'] == 'admin' || $_SESSION['username'] == 'Admin') {
      header ('Location:AUTH/halaman_admin.php');
    }else{
      header ('Location:AUTH/halaman_user.php');
    }
    

    
  }else{

  	 // echo "<h1>{$_SESSION['username']} GAGAL validasi</h1>";
  	 fwrite($myfile,$waktu.$ip ."\t".$_SESSION['username']." GAGAL Validasi!!  [$token]\n\r");

     header ('Location:../TOTP.php?pesan=gagal');
  }
  fclose($myfile);
?>


































<!-- ==================================== DATABASE -->

<?php  
  // $servername = 'localhost';
  // $userDB = 'ICall';
  // $passDB = 'rizal123';
  // $dbname = 'UAS';


  // // create conneciion
  // $conn = mysqli_connect($servername, $userDB, $passDB, $dbname);

  // if (!$conn) {
  //   die("Connection Failed : ".mysqli_connect_error());
  // }
  

  // $sql = "INSERT INTO phishing (username, password) VALUES ('$username','$password')";

  // if (mysqli_query($conn, $sql)) {
  //   echo "Insert Values Created Successfully";
  // }else{
  //   echo "Error to Insert Values: ".mysqli_error($conn);
  // }

  // mysqli_close($conn);
?>


