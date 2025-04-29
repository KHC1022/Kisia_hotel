<?php

$host = 'mysql';
$user = 'kisia';
$password = 'kisia';
$databaseName = 'kisia_hotel';

$db = new mysqli($host, $user, $password, $databaseName);

if ($db->connect_error) {
    die("DB 연결 실패 : ". $db->connect_error);
}

?>