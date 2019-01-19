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
	<form method="post" action="tambah_aksi.php">
		<table>
			<tr>			
				<td>Nama</td>
				<td><input type="text" name="nama"></td>
			</tr>
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
</body>
</html>