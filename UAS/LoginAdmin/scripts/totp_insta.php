<?php  
	require 'vendor/autoload.php';
	use OTPHP\TOTP;
	use ParagonIE\ConstantTime\Base32;

	$mySecret = trim(Base32::encodeUpper("fakhrizal"), '=');
	echo $mySecret."<br>";
	$totp = TOTP::create($mySecret); // New TOTP with custom secret
	echo 'The current OTP is: '.$totp->now().'<br>';


	$totp->setLabel('user php'); // The label (string)

	$totp->getProvisioningUri(); // Will return otpauth://totp/alice%40google.com?secret=JBSWY3DPEHPK3PXP

	$googleChartUri = $totp->getQrCodeUri();
	echo "<img src='{$googleChartUri}'>";
?>

<br><br>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Code Token: <input type="text" name="token">
  <input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
    // collect value of input field
    $token = $_POST['token'];
    if ($token == $totp->now()) {
        echo "GOOD";
    } else {
        echo "BAD";
    }
}
?>