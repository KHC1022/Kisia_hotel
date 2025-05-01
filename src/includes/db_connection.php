<?php
$host = 'mysql';
$user = 'kisia';
$password = 'kisia';
$database = 'kisia_hotel';

$conn = new mysqli($host, $user, $password, $database);

mysqli_set_charset($conn, "utf8mb4");

if ($conn->connect_error) {
    die("DB 연결 실패 : " . $conn->connect_error);
}

?>