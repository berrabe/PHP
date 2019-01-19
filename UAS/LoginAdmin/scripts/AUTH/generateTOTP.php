<?php  
  session_start();
  $username = $_SESSION['username'];

  require '../vendor/autoload.php';
  use OTPHP\TOTP;
  use ParagonIE\ConstantTime\Base32;

  $mySecret = trim(Base32::encodeUpper(random_bytes(10)), '=');
  echo $mySecret."<br>";

  
  $totp = new TOTP("$username @ UAS PHP",$mySecret);

  echo 'The current OTP is: '.$totp->now().'<br>';


  $totp->getProvisioningUri(); // Will return otpauth://totp/alice%40google.com?secret=JBSWY3DPEHPK3PXP

  $googleChartUri = $totp->getQrCodeUri();
  echo "<img src='{$googleChartUri}'>";
?>



<?php 

include '../DB.php';

$sql = "UPDATE user SET totp='$mySecret' WHERE username='$username'";
mysqli_query($conn,$sql);


if (mysqli_query($conn, $sql)) {
    echo "<h1>TOTP berhasil di ganti, silahkan scan QRCode diatas ke aplikasi Google Authenticator, dan login kembali</h1>";

  }else{
    echo "KEPRET : ".mysqli_error($conn);
  }

  mysqli_close($conn);

?>
<br><br>

<?php  
   if ($_SESSION['username'] == 'admin' || $_SESSION['username'] == 'Admin') {
        echo '<a href="halaman_admin.php"><= KEMBALI</a>';
    }else{
        echo '<a href="halaman_user.php"><= KEMBALI</a>';
    }
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


