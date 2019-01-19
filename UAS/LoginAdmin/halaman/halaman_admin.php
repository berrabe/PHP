<!DOCTYPE html>
<html>
<head>
	<title>Halaman admin </title>
</head>
<body>
	<?php 
	session_start();

	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}

	?>
	<h1>Halaman Admin</h1>

	<p>Halo <?php echo $_SESSION['nama']; ?> anda login sebagai <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p>
	<a href="logout.php">LOGOUT</a>

	<br/>
	<br/>
<hr><hr>



<?php 
	if(isset($_GET['pesan'])){
		$pesan = $_GET['pesan'];
		if($pesan == "input"){
			echo "Data berhasil di input.";
		}else if($pesan == "update"){
			echo "Data berhasil di update.";
		}else if($pesan == "hapus"){
			echo "Data berhasil di hapus.";
		}
	}
	?>
	<br/>
	<a class="tombol" href="input.php">+ Tambah Data Baru</a>
 
	<h3>Data user</h3>
	<table border="1" class="table">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Password</th>
            <th>username</th>
			<th>Opsi</th>		
		</tr>
		<?php 
		include 'koneksi.php';
		$no = 1;
		$data = mysqli_query($koneksi,"select * from user");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['nama']; ?></td>
				<td><?php echo $d['username']; ?></td>
				<td><?php echo $d['level']; ?></td>
				<td>
					<a href="edit.php?id=<?php echo $d['id_user']; ?>">EDIT</a>
					<a href="update.php?id=<?php echo $d['id_user']; ?>">UPDATE</a>
					<a href="hapus.php?id=<?php echo $d['id_user']; ?>">HAPUS</a>
				</td>
			</tr>
			<?php 
		}
		?>

	</table>




</body>
</html>