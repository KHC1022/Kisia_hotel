<?php

$host = 'mysql';
$user = 'kisia';
$password = 'kisia';
$databaseName = 'kisia_hotel';

$conn = new mysqli($host, $user, $password, $databaseName);

if ($conn->connect_error) {
    die("DB 연결 실패 : ". $conn->connect_error);
}

?>