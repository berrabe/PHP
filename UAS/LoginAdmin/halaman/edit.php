
<!DOCTYPE html>
<html>
<head>
	<title>..:: Form Tambah :..</title>
</head>
<body>

	<h2>CRUD FORM USER</h2>
	<br/>
	<input TYPE="button" VALUE="Kembali" onClick="history.go(-1);">
	<br/>
	<br/>
	<h3>TAMBAH DATA USER</h3>
	<?php
	include 'koneksi.php';
	$id = $_GET['id'];
	$data = mysqli_query($koneksi,"select * from user where id_user='$id'");
	while($d = mysqli_fetch_array($data)){
		?>
	<form method="post" action="tambah_aksi.php">
	<input type="hidden" name="id" value="<?php echo $d['id_user']; ?>">
		<table>
			<tr>			
				<td>Nama</td>
				<td><input type="text" name="nama" value="<?php echo $d['nama']; ?>"></td>
			</tr>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username" value="<?php echo $d['username']; ?>"></td>
			</tr>
			<tr>
				<td>Level</td>
				<td>
				<select name="level">
				
					<option >- Pilih Level Admin -</option>
					<option value="admin">Admin</option>
					<option value="mahasiswa">Mahasiswa</option>
				</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="SIMPAN"></td>
			</tr>		
		</table>
	</form>
			<?php 
	}
	?>
</body>
</html>