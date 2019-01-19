<?php
	include '../DB.php';
	$id = $_GET['id'];
	$db = $_GET['db'];

	print_r($_GET);

	if ($db == 'user') {
		$sql = "DELETE FROM user WHERE id='$id'";
	}elseif ($db == 'phishing') {
		$sql = "DELETE FROM phishing WHERE id='$id'";
	}else{
		echo "ERROR DB";
	}

	
	

	if (mysqli_query($conn, $sql)) {
			echo "<script>alert('Data berhasil di DELETE!');history.go(-1);</script>";

		}else{
			echo "KEPRET : ".mysqli_error($conn);
		}

		mysqli_close($conn);
		?>