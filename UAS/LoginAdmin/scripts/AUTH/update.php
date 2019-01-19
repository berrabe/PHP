
<!DOCTYPE html>
<html>
<head>
	<title>..:: Form UPDATE :..</title>
</head>
<body>

	<h2>CRUD FORM USER</h2>
	<br/>
	<input TYPE="button" VALUE="Kembali" onClick="history.go(-1);">
	<br/>
	<br/>
	<h3>UPDATE DATA USER</h3>
	<?php
	include '../DB.php';
	$id = $_GET['id'];
	$data = mysqli_query($conn,"select * from user where id='$id'");
	while($d = mysqli_fetch_array($data)){
		?>
	<form method="post" action="update_aksi.php">
		<table>
			<tr>
				ID &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="id" readonly="readonly" value="<?php echo $d['id']; ?>">	
				<td>Username</td>
				<td><input type="text" name="username" value="<?php echo $d['username']; ?>"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="text" name="password" value="<?php echo $d['password']; ?>"> * Otomatis akan di jadikan hash sha512</td>
			</tr>
			<tr>
				<td>Level</td>
				<td><input type="text" name="level" value="<?php echo $d['level']; ?>"></td>
			</tr>
			<tr>
				<td>TOTP</td>
				<td><input type="text" name="totp" readonly="readonly" value="<?php echo $d['totp']; ?>"> * Gunakan Fitur 'Ganti TOTP' di setiap halaman user</td>
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
