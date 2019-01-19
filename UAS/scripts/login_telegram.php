<?php
$apiToken = "795879834:AAEh99eFQIJLHQ2OpV3J_QcQ89vyXT7Wv9o";

$data = [
    'chat_id' => '-1001431066193',
    'text' => 'Hello dila pacar adit!'
];

$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );
// Do what you want with result
?>