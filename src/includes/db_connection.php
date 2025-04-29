<?php

$host = 'mysql';
$user = 'kisia';
$password = 'kisia';
$databaseName = 'kisia_hotel';

$db = new mysqli($host, $user, $password, $databaseName);

if ($db->connect_error) {
    die("DB 연결 실패 : ". $db->connect_error);
}

echo "DB 연결 성공<br>";

// 현재 데이터베이스 확인
$current_db = $db->query("SELECT DATABASE()");
$row = $current_db->fetch_array();
echo "현재 데이터베이스: " . $row[0] . "<br>";

// 테이블 목록 조회
$q = $db->query("SHOW TABLES");

if ($q) {
    echo "<h3>테이블 목록:</h3>";
    $table_count = 0;
    while ($row = $q->fetch_array()) {
        echo $row[0] . "<br>";
        $table_count++;
    }
    if ($table_count == 0) {
        echo "테이블이 없습니다.<br>";
    }
} else {
    echo "테이블 조회 실패: " . $db->error . "<br>";
}

$db->close();

?>