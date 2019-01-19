<?php 
session_start();
include 'koneksi.php';
$username = $_POST['username'];
$password = md5($_POST['password']);

echo $password;

$login = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);

// echo $cek;

if($cek > 0){

	$data = mysqli_fetch_assoc($login);
	if($data['level']=="admin"){

		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		$_SESSION['nama'] =	$data['nama'];
		header("location:halaman_admin.php");

	}else if($data['level']=="mahasiswa"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		$_SESSION['nama'] =	$data['nama'];
		header("location:halaman_mahasiswa.php");

	}else{

		// alihkan ke halaman login kembali
		// header("location:index.php?pesan=gagal");
		echo 'gagal dalam';
	}	
}else{
	// header("location:index.php?pesan=gagal");
	echo 'gagal cek';
}

?>