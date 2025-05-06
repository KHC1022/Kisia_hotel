<?php
include_once __DIR__ . '/../includes/session.php';
include_once __DIR__ . '/../includes/db_connection.php';

$inquiry_id = $_POST['inquiry_id'] ?? 0;
$category = $_POST['category'] ?? '';
$title = $_POST['title'] ?? '';
$content = $_POST['content'] ?? '';

$sql="select * from inquiries where inquiry_id= $inquiry_id";
$result = mysqli_query($conn,$sql);

$update_sql = "
    UPDATE inquiries
    SET category = '$category',
        title = '$title',
        content = '$content'
    WHERE inquiry_id = $inquiry_id
";
$update_result = mysqli_query($conn, $update_sql);

if ($update_result) {
    echo "<script>alert('수정되었습니다.'); location.href='../inquiry/inquiry_detail.php?inquiry_id=$inquiry_id';</script>";
} else {
    echo "<script>alert('수정 실패'); history.back();</script>";
}
?>