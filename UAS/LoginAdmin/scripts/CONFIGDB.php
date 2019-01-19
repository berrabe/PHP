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

	// $sql = "CREATE TABLE user(
	// id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	// username VARCHAR(30) NOT NULL,
	// password VARCHAR(130) NOT NULL,
	// level VARCHAR(30) NOT NULL,
	// totp VARCHAR(30) NOT NULL,
	// date TIMESTAMP
	// )";

	$sql = "INSERT INTO user (username, password,level,totp) VALUES ('admin','3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2','admin','MZQWW2DSNF5GC3A')";

	if (mysqli_query($conn, $sql)) {
		echo "HORAIIII";
	}else{
		echo "KEPRET : ".mysqli_error($conn);
	}

	mysqli_close($conn);
?>