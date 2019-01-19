<?php  
	$pass = hash('sha512', '123');
	$passmd5 = md5("123");
	echo $pass."\t\t\n".strlen($pass)."<br>";
	echo $passmd5
?>


