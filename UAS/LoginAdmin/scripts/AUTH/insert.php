<!DOCTYPE html>
<html>
<head>
	<title>..:: Form INSERT :..</title>
</head>
<body>

	<h2>CRUD FORM USER</h2>
	<br/>
	<input TYPE="button" VALUE="Kembali" onClick="history.go(-1);">
	<br/>
	<br/>
	<h3>TAMBAH DATA USER</h3>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<table>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="text" name="password"></td>
			</tr>
			<tr>
				<td>Level</td>
				<td><input type="text" name="level"></td>
			</tr>
			<tr>
				<td>TOTP</td>
				<!-- <td><input type="text" name="totp"></td>
			</tr> -->
						<?php  
						  // session_start();
						  // $username = $_SESSION['username'];

						  require '../vendor/autoload.php';
						  use OTPHP\TOTP;
						  use ParagonIE\ConstantTime\Base32;

						  $mySecret = trim(Base32::encodeUpper('default'), '=');
						  echo "<td>".$mySecret."</td></tr><br>";

						  
						  $totp = new TOTP("default @ UAS PHP",$mySecret);

						  // echo 'The current OTP is: '.$totp->now().'<br>';


						  $totp->getProvisioningUri(); // Will return otpauth://totp/alice%40google.com?secret=JBSWY3DPEHPK3PXP

						  $googleChartUri = $totp->getQrCodeUri();
						  echo "<tr><td></td><td><img src='{$googleChartUri}'></td></tr>";
						?>
			<tr>
				<td></td>
				<td>* Scan Barcode dengan Google Authencticator,<br><b>PERHATIAN</b><br>ini adalah token default,<br> tolong ganti dengan cara login dengan user yang baru ini,<br>verif dengan key default dulu,<br>kemudian di halaman admin klik 'ganti token TOTP',<br>itulah key yang harus kalian pakai</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="SIMPAN"></td>
			</tr>		
		</table>
	</form>
</body>
</html>




<?php 
// koneksi database
include '../DB.php';

// print_r($_POST);
// echo $_SERVER["REQUEST_METHOD"];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
// menangkap data yang di kirim dari form
$username 	= $_POST['username'];
$password 	= hash('sha512',$_POST['password']);
$level 		= $_POST['level'];
// $totp 		= $_POST['totp'];
$totp 		= $mySecret;

// menginput data ke database
$sql = "INSERT INTO user (`id`, `username`, `password`, `level`, `totp`, `date`) VALUES (NULL, '$username', '$password', '$level', '$totp', CURRENT_TIMESTAMP);";



	if (mysqli_query($conn, $sql)) {
			echo "<script>alert('Data berhasil di tambahkan!');history.go(-2);</script>";

		}else{
			echo "KEPRET : ".mysqli_error($conn);
		}

		mysqli_close($conn);
}
?>








<!-- INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `level`) VALUES ('1', 'admin', MD5('admin'), 'admin', 'admin'); -->

<?php  
	// $pass = hash('sha512', '123');
	// $passmd5 = md5("123");
	// echo $pass."\t\t\n".strlen($pass)."<br>";
	// echo $passmd5
?>