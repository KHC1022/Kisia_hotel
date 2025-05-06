<?php
include_once __DIR__ . '/../includes/db_connection.php';

$inquiry_id = $_GET['inquiry_id'] ?? 0;
$content = $_GET['content'] ?? '';

if ($inquiry_id && $content) {
    $query = "INSERT INTO inquiry_responses (inquiry_id, content, created_at) 
              VALUES ($inquiry_id, '$content', NOW())";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('답변이 등록되었습니다.'); location.href='../inquiry/inquiry_detail.php?inquiry_id=$inquiry_id';</script>";
    } else {
        echo "<script>alert('답변 등록에 실패했습니다.'); history.back();</script>";
    }
} else {
    echo "<script>alert('내용을 입력해주세요.'); history.back();</script>";
}
