<?php 
// koneksi database
include '../DB.php';

// menangkap data yang di kirim dari form
$id 		= $_POST['id'];
$username 	= $_POST['username'];
$password 	= hash('sha512',$_POST['password']);
$level 		= $_POST['level'];
$totp 		= $_POST['totp'];

// menginput data ke database
// $sql = "INSERT INTO user (`id`, `username`, `password`, `level`, `totp`, `date`) VALUES (NULL, '$username', '$password', '$level', '$totp', CURRENT_TIMESTAMP);";
$sql = "UPDATE user SET username='$username',password='$password',level='$level',totp='$totp' WHERE id='$id'";
mysqli_query($conn,$sql);


if (mysqli_query($conn, $sql)) {
		echo "HORAIIII";
		echo $_POST['id'];
		echo "<script>alert('Data berhasil di tambahkan!');history.go(-2);</script>";

	}else{
		echo "KEPRET : ".mysqli_error($conn);
	}

	mysqli_close($conn);

?>

<!-- INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `level`) VALUES ('1', 'admin', MD5('admin'), 'admin', 'admin'); -->

<?php  
	// $pass = hash('sha512', '123');
	// $passmd5 = md5("123");
	// echo $pass."\t\t\n".strlen($pass)."<br>";
	// echo $passmd5
?>