<?php  
	$servername = 'localhost';
	$userDB = 'ICall';
	$passDB = 'rizal123';
	$dbname = 'UAS';


	// create conneciion
	$conn = mysqli_connect($servername, $userDB, $passDB, $dbname);

	if (!$conn) {
		die("Connection Failed : ".mysqli_connect_error());
	}
	
?>