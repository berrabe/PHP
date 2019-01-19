<?php  
	$servername = 'localhost';
	$username = 'ICall';
	$password = 'rizal123';
	$dbname = 'UAS';


	// create conneciion
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if (!$conn) {
		die("Connection Failed : ".mysqli_connect_error());
	}

	$sql = "CREATE TABLE phishing(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(30) NOT NULL,
	password VARCHAR(30) NOT NULL,
	date TIMESTAMP
	)";

	if (mysqli_query($conn, $sql)) {
		echo "HORAIIII";
	}else{
		echo "KEPRET : ".mysqli_error($conn);
	}

	mysqli_close($conn);
?>