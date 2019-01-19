<?php 
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$username 	= $_POST['username'];
$password 	= md5($_POST['password']);
$nama 		= 	$_POST['nama'];
$level 		= $_POST['level'];

// menginput data ke database
mysqli_query($koneksi,"insert into user values('','$username','$password','$nama','$level')");

// mengalihkan halaman kembali ke index.php
echo "<script>alert('Data berhasil di tambahkan!');history.go(-2);</script>";

?>

<!-- INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `level`) VALUES ('1', 'admin', MD5('admin'), 'admin', 'admin'); -->